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

use Validator;
use App\Project;
use App\Job;
use App\Account;
use App\ProjectCategory;
use App\Mail\SendProjectMail;
use Carbon\Carbon;

class ProjectController extends Controller
{
  public function project_detail($slug) {   
    $project = Project::where('slug', $slug)->first();
    if($project != null){
      $project->photos = json_decode($project->photos, true);
      $project->files = json_decode($project->files, true);
      $project->tags = json_decode($project->tags, true);
      $jobs = json_decode($project->jobs, true);
      $categories = json_decode($project->categories, true);
      
      $project->jobs = Job::whereIn('id', $jobs)->get();
      $project->categories = ProjectCategory::whereIn('id', $categories)->get();
      if($project->jobs != null){
        foreach($project->jobs as &$job){
          $job->photos = json_decode($job->photos);
        }
      }
      return view('pages.project_detail', [
        'project' => $project
      ]);
    } else{
      return redirect('404');
    }
  } 
  
  public function addProject(Request $request){
      $form_data = $request->only(['project_name','points','input_categories','input_genres', 'storyline', 'director', 'writer', 'start_date', 'end_date', 'step', 'about', 'team', 'uploaded_files', 'uploaded_photos', 'input_jobs', 'input_tags', 'input_personal_tags', 'project_jobs']);
      $validationRules = [
          'project_name'  => ['required','min:3'],
          'input_categories'=> ['required'],
          'input_genres'=> ['required'],
          'storyline'     => ['required'],
          'points'        => ['required'],
          'director'      => ['required'],
          'writer'        => ['required'],
          'start_date'    => ['required'],
          'end_date'      => ['required'],
          'step'          => ['required'],
      ];
    
      $customMessages = [
        'input_tags.required'       => 'You need to select at least one tag.',
        'input_jobs.required'       => 'You need to select at least one job.',
        'input_categories.required' => 'You need to select at least one category.',
        'input_genres.required' => 'You need to select at least one genre.',
        'uploaded_photos.required'  => 'Please upload at least one photo.',
        'uploaded_files.required'   => 'Please upload at least one file.',
//         'project_jobs.required'     => 'Please select a job from the list.',
      ];
      if($request->input('step') == 'step_2'){
        $validationRules['about'] = ['required'];
        $validationRules['team'] = ['required'];
        $validationRules['uploaded_photos'] = ['required'];
        $validationRules['uploaded_files'] = ['required'];
      }
      if($request->input('step') == 'step_3'){
        $validationRules['input_tags'] = ['required'];
//         $validationRules['project_jobs'] = ['required'];
      }
      $validator = Validator::make($form_data, $validationRules, $customMessages);
      if ($validator->fails()){
        return ['success' => false, 'error_all' => $validator->errors()->toArray()];  
      }
      else {
        if($request->input('step') == 'step_1'){
          return ['success' => true, 'step' => 'step_1'];
        }
        if($request->input('step') == 'step_2'){
          return ['success' => true, 'step' => 'step_2'];
        }
        
        $photos       = $request->file('uploaded_photos');
        $files        = $request->file('uploaded_files');
        $id_client    = Session::get('user')['id'];
        $images_path  = 'projects/images/'.$id_client.'/';
        $files_path   = 'projects/files/'.$id_client.'/';
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
              if(!in_array($tag, $input_tags)){
                array_push($input_tags, $tag);
              }
            }
          }
        }
        $categories = [];
        $categories_retrieved = explode(',', $form_data['input_categories']);
        foreach($categories_retrieved as $category){
          if($category != ''){
            array_push($categories, $category);
          }
        }
        $genres = [];
        $genres_retrieved = explode(',', $form_data['input_genres']);
        foreach($genres_retrieved as $genre){
          if($genre != ''){
            array_push($genres, $genre);
          }
        }
        $jobs = [];
        if($form_data['project_jobs'] != null){
          $jobs_retrieved = explode(',', $form_data['project_jobs']);
          foreach($jobs_retrieved as $job){
            if($job != ''){
              array_push($jobs, $job);
            }
          }
        }
        $slug_modified = $slug_original = str_slug($form_data['project_name'], "-");
        $i = 2;
        while(Project::where('slug', $slug_modified)->count() > 0){
          $slug_modified = $slug_original."-".$i;
          $i++;
        }
        $project = new Project;
        $project->title             = $form_data['project_name'];
        $project->slug              = $slug_modified;
        $project->categories        = json_encode($categories);
        $project->genres            = json_encode($genres);
        $project->storyline         = $form_data['storyline'];
        $project->director          = $form_data['director'];
        $project->writer            = $form_data['writer'];
        $project->start_date        = Carbon::parse($form_data['start_date'])->format('Y-m-d');
        $project->end_date          = Carbon::parse($form_data['end_date'])->format('Y-m-d');
        $project->about             = $form_data['about'];
        $project->team_description  = $form_data['team'];
        $project->photos            = json_encode($photosPath);
        $project->files             = json_encode($filesPath);
        $project->user_id           = $id_client;
        $project->jobs              = json_encode($jobs);
        $project->tags              = json_encode($input_tags);
        $project->start_fee         = $start_fee;
        $project->end_fee           = $end_fee;
        $project->created_at        = $current_date;
        $project->updated_at        = $current_date;
        $project->save();
        
        $no_jobs = count(json_decode($project->jobs, true));
        $start_date = Carbon::parse($project->start_date)->format('d M Y');
        $project->start_date = $start_date;
        $end_date = Carbon::parse($project->end_date)->format('d M Y');
        $project->end_date = $end_date;
        $project->status = strtolower(\App\Http\Controllers\AccountController::checkStatus($current_date, $project->start_date, $project->end_date, $no_jobs));
          
        $project->background = url('/').'/storage/'.json_decode($project->photos, true)[0];
        
        return ['success' => true, 'msg' => 'The project has been successfully added!', 'step' => 'final_step_finished', 'project' => $project];  
      }
  }
  
  public function editProject(Request $request){
      $form_data = $request->only(['project_id', 'project_name','points','input_genres','input_categories', 'storyline', 'director', 'writer', 'start_date', 'end_date', 'step', 'about', 'team', 'uploaded_files', 'uploaded_photos', 'input_jobs', 'input_tags', 'input_personal_tags', 'project_jobs', 'images_from_server', 'files_from_server']);
      $validationRules = [
          'project_name'  => ['required','min:3'],
          'input_categories'=> ['required'],
          'input_genres'=> ['required'],
          'storyline'     => ['required'],
          'points'        => ['required'],
          'director'      => ['required'],
          'writer'        => ['required'],
          'start_date'    => ['required'],
          'end_date'      => ['required'],
          'step'          => ['required'],
      ];
    
      $customMessages = [
        'input_tags.required'       => 'You need to select at least one job.',
        'input_jobs.required'       => 'You need to select at least one tag.',
        'input_categories.required' => 'You need to select at least one category.',
        'input_genres.required'     => 'You need to select at least one genre.',
        'uploaded_photos.required'  => 'Please upload at least one photo.',
        'uploaded_files.required'   => 'Please upload at least one file.',
//         'project_jobs.required'     => 'Please select a job from the list.',
      ];
      if($request->input('step') == 'step_2'){
        $validationRules['about'] = ['required'];
        $validationRules['team'] = ['required'];
      }
      if($request->input('step') == 'step_3'){
        $validationRules['input_tags'] = ['required'];
//         $validationRules['project_jobs'] = ['required'];
      }
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
        if($request->input('step') == 'step_1'){
          return ['success' => true, 'step' => 'step_1'];
        }
        if($request->input('step') == 'step_2'){
          return ['success' => true, 'step' => 'step_2'];
        }
        
        $photos       = $request->file('uploaded_photos');
        $files        = $request->file('uploaded_files');
        $id_client    = Session::get('user')['id'];
        $images_path  = 'projects/images/'.$id_client.'/';
        $files_path   = 'projects/files/'.$id_client.'/';
        $photosPath   = [];
        $filesPath   = [];
        
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
              if(!in_array($tag, $input_tags)){
                array_push($input_tags, $tag);
              }
            }
          }
        }
        $categories = [];
        $categories_retrieved = explode(',', $form_data['input_categories']);
        foreach($categories_retrieved as $category){
          if($category != ''){
            array_push($categories, $category);
          }
        }
        $genres = [];
        $genres_retrieved = explode(',', $form_data['input_genres']);
        foreach($genres_retrieved as $genre){
          if($genre != ''){
            array_push($genres, $genre);
          }
        }
        $jobs = [];
        if($form_data['project_jobs'] != null){
          $jobs_retrieved = explode(',', $form_data['project_jobs']);
          foreach($jobs_retrieved as $job){
            if($job != ''){
              array_push($jobs, $job);
            }
          }
        }
        
        $current_project = Project::where('id', $form_data['project_id'])->first();
        $current_files = json_decode($current_project->files, true);
//         dd($current_project);
        $current_files_new = [];
        if($current_files){
          foreach($current_files as $file){
            array_push($current_files_new, $file['download_link']);
          }
        }
        $current_photos = json_decode($current_project->photos, true);
        
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
        $slug_modified = $slug_original = str_slug($form_data['project_name'], "-");
        $i = 2;
        while(Project::where('slug', $slug_modified)->where('id', '!=', $form_data['project_id'])->count() > 0){
          $slug_modified = $slug_original."-".$i;
          $i++;
        }
        $project = Project::find($form_data['project_id']);
        $project->title             = $form_data['project_name'];
        $project->slug              = $slug_modified;
        $project->categories        = json_encode($categories);
        $project->genres            = json_encode($genres);
        $project->storyline         = $form_data['storyline'];
        $project->director          = $form_data['director'];
        $project->writer            = $form_data['writer'];
        $project->start_date        = Carbon::parse($form_data['start_date'])->format('Y-m-d');
        $project->end_date          = Carbon::parse($form_data['end_date'])->format('Y-m-d');
        $project->about             = $form_data['about'];
        $project->team_description  = $form_data['team'];
        $project->photos            = json_encode($photosPath);
        $project->files             = json_encode($filesPath);
        $project->user_id           = $id_client;
        $project->jobs              = json_encode($jobs);
        $project->tags              = json_encode($input_tags);
        $project->start_fee         = $start_fee;
        $project->end_fee           = $end_fee;
        $project->created_at        = $current_date;
        $project->updated_at        = $current_date;
        $project->save();
        return ['success' => true, 'msg' => 'The project has been successfully updated!'];  
      }
  }
  
  public function deleteProject(Request $request){
    $form_data = $request->only(['project_id']);
    $validationRules = [
        'project_id'    => ['required'],
    ];
    $validator = Validator::make($form_data, $validationRules);
    if ($validator->fails())
        return ['success' => false, 'error' => "There was a problem! Please try again later or reload the page and try again!"];  
    else {
      try{
        Project::where('id', $form_data['project_id'])->delete();
        return ['success' => true, 'msg' => "The project has been successfully deleted!"];
      } catch(Exception $e){
        return ['success' => false, 'error' => "There was a problem! Please try again later or reload the page and try again!"];
      }
    } 
  }
  
  public function contactProjectOwner(Request $request){
    $form_data = $request->only(['name', 'email', 'phone', 'location', 'message', 'project_user_id']);
    $validationRules = [
        'name'    => ['required'],
        'email'    => ['required'],
        'phone'    => ['required'],
        'location'    => ['required'],
        'message'    => ['required'],
        'project_user_id'    => ['required'],
    ];
    $validator = Validator::make($form_data, $validationRules);
    if ($validator->fails()){
        return ['success' => false, 'error_all' => $validator->errors()->toArray()];  
    }
    else {
      try{
        try{
          $user = Account::where('id', $request->input('project_user_id'))->first();
          $date_email = [
            'name' => $form_data['name'],
            'email' => $form_data['email'],
            'phone' => $form_data['phone'],
            'location' => $form_data['location'],
            'message' => $form_data['message'],
            'user_email' => $user['email'],
            'user_name' => $user['name'],
          ];
          Mail::to($user['email'])->send(new SendProjectMail($date_email));
          return ['success' => true, 'msg' => "The message was successfully sent to the project owner!"];
        } catch(Exception $e){
            return ['success' => false, 'error' => "There was a problem! Please try again later or reload the page and try again!"];
        }
      } catch(Exception $e){
        return ['success' => false, 'error' => "There was a problem! Please try again later or reload the page and try again!"];
      }
    }
  }
}
