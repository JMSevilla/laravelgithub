<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Filesystem\Filesystem;

use App\Mail\SendMessageNewJob;
use App\PersonalTag;
use App\Mail\SendJobMail;
use App\Account;
use App\Tag;
use App\Job;
use Validator;

class JobController extends Controller
{
  public function job_detail($slug) {
    $job = Job::where('slug', $slug)->first();
    if($job != null){
      $job->photos = json_decode($job->photos, true);
      $job->files = json_decode($job->files, true);
      $job->tags = json_decode($job->tags, true);
//       dd($job);
      return view('pages.job_detail', [
        'job' => $job,
      ]);
    } else{
      return redirect('404');
    }
  }   
  
    public function applyToJob(Request $request){
    $form_data = $request->only(['name', 'email', 'phone', 'cv', 'message', 'job_user_id']);
    $validationRules = [
        'name'    => ['required'],
        'email'    => ['required'],
        'phone'    => ['required'],
        'cv'    => ['required'],
        'message'    => ['required'],
        'job_user_id'    => ['required'],
    ];
    $validator = Validator::make($form_data, $validationRules);
    if ($validator->fails()){
        return ['success' => false, 'error_all' => $validator->errors()->toArray()];  
    }
    else {
      try{
        try{
          $user = Account::where('id', $request->input('job_user_id'))->first();
          $date_email = [
            'name' => $form_data['name'],
            'email' => $form_data['email'],
            'phone' => $form_data['phone'],
            'cv' => $request->file('cv'),
            'message' => $form_data['message'],
            'user_email' => $user['email'],
            'user_name' => $user['name'],
          ];
          Mail::to($user['email'])->send(new SendJobMail($date_email));
          return ['success' => true, 'msg' => "Thanks for applying to this job!"];
        } catch(Exception $e){
            return ['success' => false, 'error' => "There was a problem! Please try again later or reload the page and try again!"];
        }
      } catch(Exception $e){
        return ['success' => false, 'error' => "There was a problem! Please try again later or reload the page and try again!"];
      }
    }
  }
  
  public function addJob(Request $request){
      $form_data = $request->only(['job_title','job_location','radio_fee', 'points', 'radio_currency', 'job_description', 'input_tags', 'uploaded_photos', 'uploaded_files', 'input_personal_tags']);
      $validationRules = [
          'job_title'       => ['required','min:3'],
          'job_location'    => ['required'],
          'radio_fee'       => ['required'],
          'points'          => ['required'],
          'radio_currency'  => ['required'],
          'job_description' => ['required'],
          'input_tags'      => ['required'],
          'uploaded_photos' => ['required'],
          'uploaded_files'  => ['required'],
      ];
      $customMessages = [
        'input_tags.required'       => 'You need to select at least one tag.',
        'radio_fee.required'        => 'Please select your fee.',
        'radio_currency.required'   => 'Please select your currency.',
        'uploaded_photos.required'  => 'Please upload at least one photo.',
        'uploaded_files.required'   => 'Please upload at least one file.',
      ];
      $validator = Validator::make($form_data, $validationRules, $customMessages);
      if ($validator->fails()){
        return ['success' => false, 'error_all' => $validator->errors()->toArray()];  
      }
      else {
        $photos       = $request->file('uploaded_photos');
        $files        = $request->file('uploaded_files');
        $id_client    = Session::get('user')['id'];
        $images_path  = 'jobs/images/'.$id_client.'/';
        $files_path   = 'jobs/files/'.$id_client.'/';
        $photosPath   = [];
        $filesPath    = [];
        
        foreach($photos as $photo){
          $extension  = $photo->getClientOriginalExtension();
          $filename   = 'image'.uniqid().'.'.$extension;
          Storage::disk('public')->put($images_path.$filename, file_get_contents($photo));
          array_push($photosPath, $images_path.$filename);
        }
        foreach($files as $file){
          $extension  = $file->getClientOriginalExtension();
          $filename   = 'file'.uniqid().'.'.$extension;
          Storage::disk('public')->put($files_path.$filename, file_get_contents($file));
          array_push($filesPath, [
            'download_link' => $files_path.$filename,
            'original_name' => $filename,
          ]);
        }
        $start_fee  = explode(',', $form_data['points'])[0];
        $end_fee    = explode(',', $form_data['points'])[1];
        $input_tags = [];
        $personal_input_tags = [];
        $current_date = date("Y-m-d H:i:s");
        $retrieving_tags = explode(',', $form_data['input_tags']);
        if($retrieving_tags){
          foreach($retrieving_tags as $tag){
            if(!empty($tag)){
              array_push($input_tags, $tag);
            }
          }
        }
        $personal_retrieving_tags = explode(',', $form_data['input_personal_tags']);
        if($personal_retrieving_tags){
          foreach($personal_retrieving_tags as $tag){
            if(!empty($tag)){
              $personal_input_tags[] = [
                'tag'         => $tag,
                'user_id'     => $id_client,
                'created_at'  => $current_date,
                'updated_at'  => $current_date,
              ];
              if(!in_array($tag, $input_tags)){
                array_push($input_tags, $tag);
              }
            }
          }
        }
        $slug_modified = $slug_original = str_slug($form_data['job_title'], "-");
        $i = 2;
        while(Job::where('slug', $slug_modified)->count() > 0){
          $slug_modified = $slug_original."-".$i;
          $i++;
        }
        
        $job = new Job;
        $job->title       = $form_data['job_title'];
        $job->slug        = $slug_modified;
        $job->location    = $form_data['job_location'];
        $job->fixed_fee   = $form_data['radio_fee'];
        $job->description = $form_data['job_description'];
        $job->tags        = json_encode($input_tags);
        $job->photos      = json_encode($photosPath);
        $job->files       = json_encode($filesPath);
        $job->user_id     = $id_client;
        $job->currency    = $form_data['radio_currency'];
        $job->start_fee   = $start_fee;
        $job->end_fee     = $end_fee;
        $job->created_at  = $current_date;
        $job->updated_at  = $current_date;
        $job->save();
        $personal_tags_filtered = [];
        foreach($personal_input_tags as $tag){
          $check_tag = PersonalTag::where([
             'tag' => $tag['tag'], 
             'user_id' => $tag['user_id']
            ])->first();
          if(!$check_tag){
            array_push($personal_tags_filtered, $tag);
          }
        }
        if(count($personal_tags_filtered) > 0){
          PersonalTag::insert($personal_tags_filtered);
        }
        return ['success' => true, 'msg' => 'The job has been successfully added!'];  
      }
  }
  
  public function editJob(Request $request){
      $form_data = $request->only(['job_id', 'job_title','job_location','radio_fee', 'points', 'radio_currency', 'job_description', 'input_tags', 'uploaded_photos', 'uploaded_files', 'input_personal_tags', 'images_from_server', 'files_from_server']);
      $validationRules = [
          'job_title'       => ['required','min:3'],
          'job_location'    => ['required'],
          'radio_fee'       => ['required'],
          'points'          => ['required'],
          'radio_currency'  => ['required'],
          'job_description' => ['required'],
          'input_tags'      => ['required'],
      ];
      $customMessages = [
        'input_tags.required'       => 'You need to select at least one tag.',
        'radio_fee.required'        => 'Please select your fee.',
        'radio_currency.required'   => 'Please select your currency.',
        'uploaded_photos.required'  => 'Please upload at least one photo.',
        'uploaded_files.required'   => 'Please upload at least one file.',
      ];
      $images_from_server = $request->input('images_from_server');
      if($images_from_server == null || empty($images_from_server)){
        $validationRules['uploaded_photos'] = 'required';
      }
      $files_from_server = $request->input('files_from_server');
      if($files_from_server == null || empty($files_from_server)){
        $validationRules['uploaded_files'] = 'required';
      }
      $validator = Validator::make($form_data, $validationRules, $customMessages);
      if ($validator->fails()){
        return ['success' => false, 'error_all' => $validator->errors()->toArray()];  
      }
      else {
        $photos       = $request->file('uploaded_photos');
        $files        = $request->file('uploaded_files');
        $id_client    = Session::get('user')['id'];
        $images_path  = 'jobs/images/'.$id_client.'/';
        $files_path   = 'jobs/files/'.$id_client.'/';
        $photosPath   = [];
        $filesPath    = [];
        if($images_from_server != null || !empty($images_from_server)){
          $images_from_server = explode(',', $images_from_server);
          foreach($images_from_server as $img){
            array_push($photosPath, $img);
          }
        }
        if($files_from_server != null || !empty($files_from_server)){
          $files_from_server = explode(',', $files_from_server);
          foreach($files_from_server as $file){
            $file_name = explode('/', $file);
            array_push($filesPath, [
              'download_link' => $file,
              'original_name' => end($file_name),
            ]);
          }
        }
        
        if($photos != null){
          foreach($photos as $photo){
            $extension  = $photo->getClientOriginalExtension();
            $filename   = 'image'.uniqid().'.'.$extension;
            Storage::disk('public')->put($images_path.$filename, file_get_contents($photo));
            array_push($photosPath, $images_path.$filename);
          }
        }
        if($files != null){
          foreach($files as $file){
            $extension  = $file->getClientOriginalExtension();
            $filename   = 'file'.uniqid().'.'.$extension;
            Storage::disk('public')->put($files_path.$filename, file_get_contents($file));
            array_push($filesPath, [
              'download_link' => $files_path.$filename,
              'original_name' => $filename,
            ]);
          }
        }
        $start_fee  = explode(',', $form_data['points'])[0];
        $end_fee    = explode(',', $form_data['points'])[1];
        $input_tags = [];
        $personal_input_tags = [];
        $current_date = date("Y-m-d H:i:s");
        $retrieving_tags = explode(',', $form_data['input_tags']);
        if($retrieving_tags){
          foreach($retrieving_tags as $tag){
            if(!empty($tag)){
              array_push($input_tags, $tag);
            }
          }
        }
        $personal_retrieving_tags = explode(',', $form_data['input_personal_tags']);
        if($personal_retrieving_tags){
          foreach($personal_retrieving_tags as $tag){
            if(!empty($tag)){
              $personal_input_tags[] = [
                'tag'         => $tag,
                'user_id'     => $id_client,
                'created_at'  => $current_date,
                'updated_at'  => $current_date,
              ];
              if(!in_array($tag, $input_tags)){
                array_push($input_tags, $tag);
              }
            }
          }
        }
        $current_job = Job::where('id', $form_data['job_id'])->first();
        $current_files = json_decode($current_job->files, true);
//         dd($current_job);
        $current_files_new = [];
        if($current_files){
          foreach($current_files as $file){
            array_push($current_files_new, $file['download_link']);
          }
        }
        $current_photos = json_decode($current_job->photos, true);
        
        $photos_for_delete = array_diff($current_photos, $photosPath);
//         dd($photos_for_delete);
        if($photos_for_delete && count($photos_for_delete) > 0){
          foreach($photos_for_delete as &$file){
            $file = 'storage/'.$file;
          }
          File::delete($photos_for_delete);
        }
        $newFilePath = [];
        foreach($filesPath as $file){
          array_push($newFilePath, $file['download_link']);
        }
        $files_for_delete = array_diff($current_files_new, $newFilePath);
        if($files_for_delete && count($files_for_delete) > 0){
          foreach($files_for_delete as &$file){
            $file = 'storage/'.$file;
          }
          File::delete($files_for_delete);
        }
        $slug_modified = $slug_original = str_slug($form_data['job_title'], "-");
        $i = 2;
        while(Job::where('slug', $slug_modified)->where('id', '!=', $form_data['job_id'])->count() > 0){
          $slug_modified = $slug_original."-".$i;
          $i++;
        }
        $job = [
          'title'       => $form_data['job_title'],
          'slug'        => $slug_modified,
          'location'    => $form_data['job_location'],
          'fixed_fee'   => $form_data['radio_fee'],
          'description' => $form_data['job_description'],
          'tags'        => json_encode($input_tags),
          'photos'      => json_encode($photosPath),
          'files'       => json_encode($filesPath),
          'user_id'     => $id_client,
          'currency'    => $form_data['radio_currency'],
          'start_fee'   => $start_fee,
          'end_fee'     => $end_fee,
          'updated_at'  => $current_date,
        ];
        $job = Job::find($form_data['job_id']);
        $job->title       = $form_data['job_title'];
        $job->slug        = $slug_modified;
        $job->location    = $form_data['job_location'];
        $job->fixed_fee   = $form_data['radio_fee'];
        $job->description = $form_data['job_description'];
        $job->tags        = json_encode($input_tags);
        $job->photos      = json_encode($photosPath);
        $job->files       = json_encode($filesPath);
        $job->user_id     = $id_client;
        $job->currency    = $form_data['radio_currency'];
        $job->start_fee   = $start_fee;
        $job->end_fee     = $end_fee;
        $job->updated_at  = $current_date;  
        $job->save();
        $personal_tags_filtered = [];
        foreach($personal_input_tags as $tag){
          $check_tag = PersonalTag::where([
             'tag' => $tag['tag'], 
             'user_id' => $tag['user_id']
            ])->first();
          if(!$check_tag){
            array_push($personal_tags_filtered, $tag);
          }
        }
        if(count($personal_tags_filtered) > 0){
          PersonalTag::insert($personal_tags_filtered);
        }
        return ['success' => true, 'msg' => 'The job has been successfully updated!'];  
      }
  }
  
  public function deleteJob(Request $request){
    $form_data = $request->only(['job_id']);
    $validationRules = [
        'job_id'    => ['required'],
    ];
    $validator = Validator::make($form_data, $validationRules);
    if ($validator->fails())
        return ['success' => false, 'error' => "There was a problem! Please try again later or reload the page and try again!"];  
    else {
      try{
        Job::where('id', $form_data['job_id'])->delete();
        return ['success' => true, 'msg' => "The job has been successfully deleted!"];
      } catch(Exception $e){
        return ['success' => false, 'error' => "There was a problem! Please try again later or reload the page and try again!"];
      }
    } 
  }
}
