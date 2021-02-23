<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;
use App\Account;
use App\Item;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMessageProfile;
use App\Mail\SendProfileContactMail;

class ProfileController extends Controller
{
  public function profile_detail($slug) {   
    $profile = Profile::with('subtype')->where('slug', $slug)->first();
    if($profile->photos){
      $profile->photos = json_decode($profile->photos);
    }
    if($profile->files){
      $profile->files = json_decode($profile->files);
    }
    if($profile->videos){
      $profile->videos = json_decode($profile->videos);
    }
    if($profile->youtube_videos){
      $profile->youtube_videos = json_decode($profile->youtube_videos);
    }
    if($profile->general_tags){
      $profile->general_tags = json_decode($profile->general_tags);
    }
    if($profile->biography){
      $profile->biography = json_decode($profile->biography);
    }
    if($profile->filmography){
      $profile->filmography = json_decode($profile->filmography);
    }
    if($profile->other){
      $profile->other = json_decode($profile->other);
    }
    if($profile->inputs){
      $profile->inputs = json_decode($profile->inputs);
    }
    if($profile->languages){
      $profile->languages = json_decode($profile->languages);
    }
    if($profile->skill_tags){
      $profile->skill_tags = json_decode($profile->skill_tags);
    }
//     dd($profile->toArray());
    return view('pages.profile_detail', [
      'profile' => $profile
    ]);
  }   
  
  public function addEditInformations(Request $request){
    $form_data = $request->only(['language_title', 'subitem_id', 'profile_title', 'profile_location','input_tags', 'input_sports','radio_fee', 'radio_currency', 'fixed_fee', 'subitem_id', 'add_edit_id', 'check_add_edit']);
    $validationRules = [
//       'custom_value.*' => ['required'],
      'language_title' => ['required'],
      'profile_title' => ['required'],
      'profile_location' => ['required'],
      'input_tags'   => ['required'],
      'input_sports'   => ['required'],
      'radio_fee'   => ['required'],
      'radio_currency'   => ['required'],
      'fixed_fee'   => ['required'],
    ];
    $validationMessages = [
//       'custom_value.*.required' => 'Please complete all red fields!',
      'language_title.required' => 'Please add at least one language!',
      'profile_title.required' => 'Please complete the title!',
      'profile_location.required' => 'Please complete the location!',
      'input_tags.required'       => 'You need to select at least one hashtag.',
      'input_sports.required'       => 'You need to select at least one skill.',
      'radio_fee.required'        => 'Please select your fee.',
      'radio_currency.required'   => 'Please select your currency.',
    ];
    
    $validator = Validator::make($form_data, $validationRules, $validationMessages);
    if ($validator->fails()){
      return ['success' => false, 'error_all' => $validator->errors()->toArray()];  
    }
    else {
      $language_values = $request->input('language_value');
      $language_titles = $request->input('language_title');
      $input_values = $request->input('custom_value');
//       dd($input_values);
      $input_description = $request->input('custom_description');
      $input_title = $request->input('custom_title');
      $inputs = [];
      $languages = [];
      if($input_values != null){
        if(count($input_values) > 0){
          foreach($input_values as $key => $input){
            $inputs_created = [
              'title'       => $input_title[$key],
              'description' => $input_description[$key],
              'value'       => $input_values[$key],
            ];
            array_push($inputs, $inputs_created);
          }
        }
      }
      foreach($language_values as $key => $val){
        $inputs_created = [
          'title'       => $language_values[$key],
          'value'       => $language_titles[$key],
        ];
        array_push($languages, $inputs_created);
      }
      if($request->input('custom_title_added') != null){
        $custom_title_added = $request->input('custom_title_added');
        $custom_value_added = $request->input('custom_value_added');
        $is_custom_field_added = $request->input('is_custom_field_added');
        foreach($custom_title_added as $key => $item){
          $added_inputs = [
            'is_custom_field_added' => $is_custom_field_added[$key],
            'custom_title_added'    => $custom_title_added[$key],
            'custom_value_added'    => $custom_value_added[$key],
          ];
          array_push($inputs, $added_inputs);
        }
      }
      
      $profile = new Profile;
      
      $start_fee  = $form_data['fixed_fee'];
      $end_fee    = $form_data['fixed_fee'];
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

      if($request->input('input_sports') != null){
        $input_sports = [];
        $retrieving_sports = explode(',', $form_data['input_sports']);
        if($retrieving_sports){
          foreach($retrieving_sports as $tag){
            if(!empty($tag)){
              array_push($input_sports, $tag);
            }
          }
        }
      }
      if($form_data['add_edit_id'] != null){
        $profile = Profile::find($form_data['add_edit_id']);
      } else{
        $profile = new Profile;
      }
      $profile->general_tags = json_encode(array_unique($input_tags));
      $profile->skill_tags = json_encode(array_unique($input_sports));
      $profile->fee = $form_data['radio_fee'];
      $profile->start_fee = $start_fee;
      $profile->end_fee = $end_fee;
      $profile->currency = $form_data['radio_currency'];
      if($request->input('profile_title') != null){
        $profile->slug = $this->generateCheckSlug($request->input('profile_title'));
      }
      $profile->inputs = json_encode($inputs);
      $profile->languages = json_encode($languages);
      $profile->subitem_id = $request->input('subitem_id');
      $profile->profile_title = $request->input('profile_title');
      $profile->profile_location = $request->input('profile_location');
      $profile->user_id = Session::get('user')['id'];
      
      $profile->save();
      return ['success' => true, 'msg' => 'The informations has been saved successfully!', 'saved_id' => $profile->id];  
    }
  }
  
  public function addEditFilmography(Request $request){
    $form_data = $request->only(['filmography_title', 'filmography_short_description', 'subitem_id']);
    $validationRules = [
      'filmography_title' => ['required'],
      'filmography_short_description' => ['required'],
    ];
    $validator = Validator::make($form_data, $validationRules);
    if ($validator->fails()){
      return ['success' => false, 'error_all' => $validator->errors()->toArray()];  
    }
    else {
      $filmography_title = $request->input('filmography_title');
      $filmography_description = $request->input('filmography_short_description');
      
      $inputs_created[] = [
        'filmography_title' => $filmography_title,
        'filmography_short_description' => $filmography_description
      ];
      
      $profile = new Profile;
      $profile->filmography = json_encode($inputs_created);
      $profile->subitem_id = $request->input('subitem_id');
      $profile->user_id = Session::get('user')['id'];
      
//         dd($request->input('add_edit_id'));
      if($request->input('add_edit_id') == null){
        $profile->save();
      } else{
        $already_filmography = [];
        $profile = Profile::find($request->input('add_edit_id'));
        array_push($already_filmography,$inputs_created);
        if($request->input('check_add_edit') == 'edit'){
          $filmography_title_before_edit = $request->input('filmography_title_before_edit');
          $filmography_description_before_edit = $request->input('filmography_description_before_edit');
          $filmography_db = json_decode($profile->filmography,true);
          foreach($filmography_db as &$filmography){
            if($filmography['filmography_title'] == $filmography_title_before_edit && $filmography['filmography_short_description'] == $filmography_description_before_edit){
              $filmography['filmography_title'] = $filmography_title;
              $filmography['filmography_short_description'] = $filmography_description;
            }
          }
          $profile->filmography = json_encode($filmography_db);
        } else{
          // add existing filmography and concatenate with new data received
//           dd($profile->filmography);
          $already_filmography = json_decode($profile->filmography,true);
          if($already_filmography == null || !is_array($already_filmography)){
            $already_filmography = [];
          }
          array_push($already_filmography,$inputs_created[0]);
          $profile->filmography = json_encode($already_filmography);
        }
        $profile->save();
      }
      return ['success' => true, 'msg' => 'The informations has been saved successfully!', 'saved_id' => $profile->id, 'filmography_items' => json_decode($profile->filmography, true)];  
    }
  }
  public function addEditBiography(Request $request){
    $form_data = $request->only(['biography_title', 'biography_short_description', 'subitem_id']);
    $validationRules = [
      'biography_title' => ['required'],
      'biography_short_description' => ['required'],
    ];
    $validator = Validator::make($form_data, $validationRules);
    if ($validator->fails()){
      return ['success' => false, 'error_all' => $validator->errors()->toArray()];  
    }
    else {
      $biography_title = $request->input('biography_title');
      $biography_description = $request->input('biography_short_description');
      
      $inputs_created[] = [
        'biography_title' => $biography_title,
        'biography_short_description' => $biography_description
      ];
      
      $profile = new Profile;
      $profile->biography = json_encode($inputs_created);
      $profile->subitem_id = $request->input('subitem_id');
      $profile->user_id = Session::get('user')['id'];
      
      if($request->input('add_edit_id') == null){
        $profile->save();
      } else{
        $already_biography = [];
        $profile = Profile::find($request->input('add_edit_id'));
        array_push($already_biography,$inputs_created);
        if($request->input('check_add_edit') == 'edit'){
          $biography_title_before_edit = $request->input('biography_title_before_edit');
          $biography_description_before_edit = $request->input('biography_description_before_edit');
          $biography_db = json_decode($profile->biography,true);
          foreach($biography_db as &$biography){
            if($biography['biography_title'] == $biography_title_before_edit && $biography['biography_short_description'] == $biography_description_before_edit){
              $biography['biography_title'] = $biography_title;
              $biography['biography_short_description'] = $biography_description;
            }
          }
          $profile->biography = json_encode($biography_db);
        } else{
          // add existing biography and concatenate with new data received
//           dd($profile->biography);
          $already_biography = json_decode($profile->biography,true);
          if($already_biography == null || !is_array($already_biography)){
            $already_biography = [];
          }
          array_push($already_biography,$inputs_created[0]);
          $profile->biography = json_encode($already_biography);
        }
        $profile->save();
      }
      return ['success' => true, 'msg' => 'The informations has been saved successfully!', 'saved_id' => $profile->id, 'biography_items' => json_decode($profile->biography, true)];  
    }
  }
  
  public function addEditOtherInfo(Request $request){
    $form_data = $request->only(['other_title', 'other_short_description', 'subitem_id']);
    $validationRules = [
      'other_title' => ['required'],
      'other_short_description' => ['required'],
    ];
    $validator = Validator::make($form_data, $validationRules);
    if ($validator->fails()){
      return ['success' => false, 'error_all' => $validator->errors()->toArray()];  
    }
    else {
      $other_title = $request->input('other_title');
      $other_description = $request->input('other_short_description');
      
      $inputs_created[] = [
        'other_title' => $other_title,
        'other_short_description' => $other_description
      ];
      
      $profile = new Profile;
      $profile->other = json_encode($inputs_created);
      $profile->subitem_id = $request->input('subitem_id');
      $profile->user_id = Session::get('user')['id'];
      
      if($request->input('add_edit_id') == null){
        $profile->save();
      } else{
        $already_other = [];
        $profile = Profile::find($request->input('add_edit_id'));
        array_push($already_other,$inputs_created);
        if($request->input('check_add_edit') == 'edit'){
          $other_title_before_edit = $request->input('other_title_before_edit');
          $other_description_before_edit = $request->input('other_description_before_edit');
          $other_db = json_decode($profile->other,true);
          foreach($other_db as &$other){
            if($other['other_title'] == $other_title_before_edit && $other['other_short_description'] == $other_description_before_edit){
              $other['other_title'] = $other_title;
              $other['other_short_description'] = $other_description;
            }
          }
          $profile->other = json_encode($other_db);
        } else{
          // add existing other and concatenate with new data received
          $already_other = json_decode($profile->other,true);
          if($already_other == null || !is_array($already_other)){
            $already_other = [];
          }
          array_push($already_other,$inputs_created[0]);
          $profile->other = json_encode($already_other);
        }
        $profile->save();
      } 
      return ['success' => true, 'msg' => 'The informations has been saved successfully!', 'saved_id' => $profile->id, 'other_items' => json_decode($profile->other, true)]; 
    }
  }
  
  public function addEditFiles(Request $request){
    $form_data = $request->only(['files_uploaded', 'subitem_id']);
    $validationRules = [
        'files_uploaded'   => ['required'],
    ];
    $validator = Validator::make($form_data, $validationRules);
    if ($validator->fails()){
        return ['success' => false, 'fail_error' => 'Please upload a valid file!'];  
    } else {
        $documents = $request->file('files_uploaded');

        $id_client = Session::get('user')['id'];
        $path = 'profiles/files/'.$id_client.'/';
        $filesPath = [];
        foreach($documents as $document){
          $extension = $document->getClientOriginalExtension();
          $filename = 'file'.uniqid().'.'.$extension;
          Storage::disk('public')->put($path.$filename, file_get_contents($document));
          array_push($filesPath, [
            'download_link' => $path.$filename,
            'original_name' => $filename,
          ]);
        }
        $profile = new Profile;
        $profile->subitem_id = $request->input('subitem_id');
        $profile->user_id = Session::get('user')['id'];
        $profile->files = json_encode($filesPath);
      
         if($request->input('add_edit_id') == null){
            $profile->save();
          } else{
            $profile = Profile::find($request->input('add_edit_id'));
            // add existing other and concatenate with new data received
            $already_files = json_decode($profile->files,true);
            if($already_files == null || !is_array($already_files)){
              $already_files = [];
            }
           if(count($already_files) > 0){
             foreach($already_files as $file){
                array_push($filesPath,$file);
             }
           }
            $profile->files = json_encode($filesPath);
            $profile->save();
        }
        return ['success' => true, 'msg' => 'The files has been saved successfully!', 'saved_id' => $profile->id, 'files' => json_decode($profile->files, true)];  
    }
  }
  
 public function addEditVideos(Request $request){
    $form_data = $request->only(['videos_uploaded', 'subitem_id']);
    $validationRules = [
        'videos_uploaded'   => ['required'],
    ];
    $validator = Validator::make($form_data, $validationRules);
    if ($validator->fails()){
        return ['success' => false, 'fail_error' => 'Please upload a valid video file!'];  
    } else {
        $documents = $request->file('videos_uploaded');

        $id_client = Session::get('user')['id'];
        $path = 'profiles/videos/'.$id_client.'/';
        $filesPath = [];
        foreach($documents as $document){
          $extension = $document->getClientOriginalExtension();
          $filename = 'video'.uniqid().'.'.$extension;
          Storage::disk('public')->put($path.$filename, file_get_contents($document));
          array_push($filesPath, [
            'download_link' => $path.$filename,
            'original_name' => $filename,
          ]);
        }
        $profile = new Profile;
        $profile->subitem_id = $request->input('subitem_id');
        $profile->user_id = Session::get('user')['id'];
        $profile->videos = json_encode($filesPath);
      
         if($request->input('add_edit_id') == null){
            $profile->save();
          } else{
            $profile = Profile::find($request->input('add_edit_id'));
            // add existing other and concatenate with new data received
            $already_videos = json_decode($profile->videos,true);
            if($already_videos == null || !is_array($already_videos)){
              $already_videos = [];
            }
           if(count($already_videos) > 0){
             foreach($already_videos as $file){
                array_push($filesPath,$file);
             }
           }
            $profile->videos = json_encode($filesPath);
            $profile->save();
        }
        return ['success' => true, 'msg' => 'The videos has been saved successfully!', 'saved_id' => $profile->id, 'videos' => json_decode($profile->videos, true)];  
    }
  }
  
  public function addEditPhotos(Request $request){
    $form_data = $request->only(['uploaded_photos', 'subitem_id']);
    $validationRules = [
        'uploaded_photos'   => ['required'],
    ];
    $validator = Validator::make($form_data, $validationRules);
    if ($validator->fails()){
        return ['success' => false, 'fail_error' => 'Please upload a valid pdf file!'];  
    } else {
       $id_client    = Session::get('user')['id'];
       $photos       = $request->file('uploaded_photos');
       $images_path  = 'profiles/images/'.$id_client.'/';
       $photosPath   = [];
       foreach($photos as $photo){
          $extension  = $photo->getClientOriginalExtension();
          $filename   = 'image'.uniqid().'.'.$extension;
          Storage::disk('public')->put($images_path.$filename, file_get_contents($photo));
          array_push($photosPath, $images_path.$filename);
       }
       if($request->input('add_edit_id') == null){
         $profile = new Profile;
         $profile->photos = json_encode($photosPath);
         $profile->subitem_id = $request->input('subitem_id');
         $profile->user_id = Session::get('user')['id'];
         $profile->save();
       } else{
         $profile = Profile::find($request->input('add_edit_id'));
         $already_photos = json_decode($profile->photos,true);
         if($already_photos == null || !is_array($already_photos)){
           $already_photos = $photosPath;
         } else{
           foreach($photosPath as $pic){
              array_push($already_photos,$pic);
           }
         }
         $profile->photos = json_encode($already_photos);
         $profile->subitem_id = $request->input('subitem_id');
         $profile->user_id = Session::get('user')['id'];
         $profile->save();
       }
       return ['success' => true, 'msg' => 'Photos added successfully!', 'saved_id' => $profile->id, 'pics' => json_decode($profile->photos, true)];  
    }
  }
  
  public function deletePhotos(Request $request){
    $form_data = $request->only(['add_edit_id', 'img_for_delete']);
    $validationRules = [
        'add_edit_id'   => ['required'],
        'img_for_delete'   => ['required'],
    ];
    $validator = Validator::make($form_data, $validationRules);
    if ($validator->fails()){
        return ['success' => false, 'fail_error' => 'An error occured during deleting this photo! Please try again!'];  
    } else {
      $profile = Profile::find($request->input('add_edit_id'));
      if($profile){
        $photos = json_decode($profile->photos, true);
        foreach($photos as $key => &$pic){
          if($pic == $request->input('img_for_delete')){
            unset($photos[$key]);
          }
        }
        $profile->photos = json_encode($photos);
        $profile->save();
      } else{
        return ['success' => false, 'fail_error' => 'An error occured during deleting this photo! Please try again!'];  
      }
      return ['success' => true, 'msg' => 'Photo successfully deleted!'];  
    }
  }
  public function deleteFiles(Request $request){
    $form_data = $request->only(['add_edit_id', 'file_for_delete']);
    $validationRules = [
        'add_edit_id'   => ['required'],
        'file_for_delete'   => ['required'],
    ];
    $validator = Validator::make($form_data, $validationRules);
    if ($validator->fails()){
        return ['success' => false, 'fail_error' => 'An error occured during deleting this file! Please try again!'];  
    } else {
      $profile = Profile::find($request->input('add_edit_id'));
      if($profile){
        $files = json_decode($profile->files, true);
        foreach($files as $key => &$file){
//           $file = json_decode($file, true);
          if($file['original_name'] == $request->input('file_for_delete')){
            unset($files[$key]);
          }
        }
        $profile->files = json_encode($files);
        $profile->save();
      } else{
        return ['success' => false, 'fail_error' => 'An error occured during deleting this file! Please try again!'];  
      }
      return ['success' => true, 'msg' => 'File successfully deleted!'];  
    }
  }
  
  public function deleteVideos(Request $request){
      $form_data = $request->only(['add_edit_id', 'video_for_delete']);
      $validationRules = [
          'add_edit_id'   => ['required'],
          'video_for_delete'   => ['required'],
      ];
      $validator = Validator::make($form_data, $validationRules);
      if ($validator->fails()){
          return ['success' => false, 'fail_error' => 'An error occured during deleting this video! Please try again!'];  
      } else {
        $profile = Profile::find($request->input('add_edit_id'));
        if($profile){
          $videos = json_decode($profile->videos, true);
          foreach($videos as $key => &$video){
//             $video = json_decode($video);
            if($video['original_name'] == $request->input('video_for_delete')){
              unset($videos[$key]);
            }
          }
          $profile->videos = json_encode($videos);
          $profile->save();
        } else{
          return ['success' => false, 'fail_error' => 'An error occured during deleting this video! Please try again!'];  
        }
        return ['success' => true, 'msg' => 'Video successfully deleted!'];  
      }
    }
  
  
    public function deleteFilmography(Request $request){
      $form_data = $request->only(['delete_id', 'description', 'title']);
      $validationRules = [
          'delete_id'   => ['required'],
          'title'   => ['required'],
          'description'   => ['required'],
      ];
      $validator = Validator::make($form_data, $validationRules);
      if ($validator->fails()){
          return ['success' => false, 'fail_error' => 'An error occured during deleting this field! Please try again!'];  
      } else {
        $profile = Profile::find($request->input('delete_id'));
        if($profile){
          $filmography_db = json_decode($profile->filmography,true);
          $title = $request->input('title');
          $description = $request->input('description');
          foreach($filmography_db as $key => &$filmography){
            if($filmography['filmography_title'] == $title && $filmography['filmography_short_description'] == $description){
              unset($filmography_db[$key]);
            }
          }
          $profile->filmography = json_encode(array_values($filmography_db));
          $profile->save();
        } else{
          return ['success' => false, 'fail_error' => 'An error occured during deleting this field! Please try again!'];  
        }
        return ['success' => true, 'msg' => 'Field successfully deleted!', 'filmography_items' => json_decode($profile->filmography, true)];  
      }
    }
    public function deleteBiography(Request $request){
      $form_data = $request->only(['delete_id', 'description', 'title']);
      $validationRules = [
          'delete_id'   => ['required'],
          'title'   => ['required'],
          'description'   => ['required'],
      ];
      $validator = Validator::make($form_data, $validationRules);
      if ($validator->fails()){
          return ['success' => false, 'fail_error' => 'An error occured during deleting this field! Please try again!'];  
      } else {
        $profile = Profile::find($request->input('delete_id'));
        if($profile){
          $biography_db = json_decode($profile->biography,true);
          $title = $request->input('title');
          $description = $request->input('description');
          foreach($biography_db as $key => &$biography){
            if($biography['biography_title'] == $title && $biography['biography_short_description'] == $description){
              unset($biography_db[$key]);
            }
          }
          $profile->biography = json_encode(array_values($biography_db));
          $profile->save();
        } else{
          return ['success' => false, 'fail_error' => 'An error occured during deleting this field! Please try again!'];  
        }
        return ['success' => true, 'msg' => 'Field successfully deleted!', 'biography_items' => json_decode($profile->biography, true)];  
      }
    }
    public function deleteOtherInfo(Request $request){
      $form_data = $request->only(['delete_id', 'description', 'title']);
      $validationRules = [
          'delete_id'   => ['required'],
          'title'   => ['required'],
          'description'   => ['required'],
      ];
      $validator = Validator::make($form_data, $validationRules);
      if ($validator->fails()){
          return ['success' => false, 'fail_error' => 'An error occured during deleting this field! Please try again!'];  
      } else {
        $profile = Profile::find($request->input('delete_id'));
        if($profile){
          $other_db = json_decode($profile->other,true);
          $title = $request->input('title');
          $description = $request->input('description');
          foreach($other_db as $key => &$other){
            if($other['other_title'] == $title && $other['other_short_description'] == $description){
              unset($other_db[$key]);
            }
          }
          $profile->other = json_encode(array_values($other_db));
          $profile->save();
        } else{
          return ['success' => false, 'fail_error' => 'An error occured during deleting this field! Please try again!'];  
        }
        return ['success' => true, 'msg' => 'Field successfully deleted!', 'other_items' => json_decode($profile->other, true)];  
      }
    }
  
  public function addEditItems(Request $request){
    $form_data = $request->only(['add_edit_id', 'profile_title', 'profile_location', 'input_tags', 'uploaded_photos', 'uploaded_files', 'radio_fee', 'fixed_fee', 'short_description', 'long_description', 'custom_value', 'subitem_id', 'check_add_edit', 'radio_currency']);
      $validationRules = [
          'input_tags'   => ['required'],
          'profile_title'   => ['required'],
          'profile_location'   => ['required'],
          'radio_fee'   => ['required'],
          'fixed_fee'   => ['required'],
          'short_description'   => ['required'],
          'long_description'   => ['required'],
          'custom_value.*' => ['required'],
      ];
      $customMessages = [
        'profile_title.required' => 'Please complete the title!',
        'profile_location.required' => 'Please complete the location!',
        'input_tags.required'       => 'You need to select at least one hashtag.',
        'radio_fee.required'        => 'Please select your fee.',
        'radio_currency.required'   => 'Please select your currency.',
        'fixed_fee.required'   => 'Please add your fixed fee.',
        'short_description.required'   => 'Please enter a short description.',
        'long_description.required'   => 'Please enter your long description.',
        'uploaded_photos.required'   => 'Please upload at least one photo.',
        'uploaded_files.required'   => 'Please upload at least one file.',
        'general_information.required'   => 'Please complete the general informations',
        'custom_value.*.required'   => 'Please complete all red fields',
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
      } else {
        $start_fee  = $form_data['fixed_fee'];
        $end_fee    = $form_data['fixed_fee'];
        $input_tags = [];
        
        $retrieving_tags = explode(',', $form_data['input_tags']);
        if($retrieving_tags){
          foreach($retrieving_tags as $tag){
            if(!empty($tag)){
              array_push($input_tags, $tag);
            }
          }
        }
        
        $input_values = $request->input('custom_value');
        $input_description = $request->input('custom_description');
        $input_title = $request->input('custom_title');
        $inputs = [];
        if($input_values != null){
          if(count($input_values) > 0){
            foreach($input_values as $key => $input){
              $inputs_created = [
                'title'       => $input_title[$key],
                'description' => $input_description[$key],
                'value'       => $input_values[$key],
              ];
              array_push($inputs, $inputs_created);
            }
          }
        }
        if($request->input('custom_title_added') != null){
          $custom_title_added = $request->input('custom_title_added');
          $custom_value_added = $request->input('custom_value_added');
          $is_custom_field_added = $request->input('is_custom_field_added');
          foreach($custom_title_added as $key => $item){
            $added_inputs = [
              'is_custom_field_added' => $is_custom_field_added[$key],
              'custom_title_added'    => $custom_title_added[$key],
              'custom_value_added'    => $custom_value_added[$key],
            ];
            array_push($inputs, $added_inputs);
          }
        }
        
        $photos       = $request->file('uploaded_photos');
        $files        = $request->file('uploaded_files');
        $id_client    = Session::get('user')['id'];
        $images_path  = 'items/images/'.$id_client.'/';
        $files_path   = 'items/files/'.$id_client.'/';
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
        $item = new Profile;
        $msg = 'The item has been succesfully added';
        if($form_data['check_add_edit'] == 'edit'){
          $item = Profile::find($form_data['add_edit_id']);
          $msg = 'The item has been succesfully updated';
        }
        $item->profile_title = $form_data['profile_title'];
        if($request->input('profile_title') != null){
          $item->slug = $this->generateCheckSlug($request->input('profile_title'));
        }
        $item->profile_location = $form_data['profile_location'];
        $item->general_tags = json_encode($input_tags);
        $item->inputs = json_encode($inputs);
        $item->files = json_encode($filesPath);
        $item->photos = json_encode($photosPath);
        $item->fee = $form_data['radio_fee'];
        $item->start_fee = $form_data['fixed_fee'];
        $item->end_fee = $form_data['fixed_fee'];
        $item->currency = $form_data['radio_currency'];
        $item->short_description = $form_data['short_description'];
        $item->long_description = $form_data['long_description'];
        $item->user_id = Session::get('user')['id'];
        $item->subitem_id = $form_data['subitem_id'];
//         dd($item);
        $item->save();
        
        return ['success' => true, 'msg' => $msg];
      }
  }
  
  public function acceptProfile(Request $request){
      $form_data = $request->only(['profile_id']);
      $validationRules = [
          'profile_id'    => ['required'],
      ];

      $validator = Validator::make($form_data, $validationRules);
      if ($validator->fails()){
        return ['success' => false, 'msg' => 'An error occured. Please try again later!'];  
      }
      else{
        $profile = Profile::find($request->profile_id);
        if($profile != null){
          $profile->status = 1;
          $profile->reason = null;
          $profile->save();
          $user = Account::where('id', $profile->user_id)->first();
          $email = $user['email'];
          Mail::to($email)->send(new SendMessageprofile($profile));
          return ['success' => true];
        }
        return ['success' => false, 'msg' => 'An error occured. Please try again later!'];
      }
  }
  public function rejectProfile(Request $request){
      $form_data = $request->only(['profile_id', 'reason']);
      $validationRules = [
          'profile_id'    => ['required'],
          'reason'    => ['required'],
      ];

      $validator = Validator::make($form_data, $validationRules);
      if ($validator->fails()){
        return ['success' => false, 'msg' => 'An error occured. Please try again later!'];  
      }
      else{
        $profile = Profile::find($request->profile_id);
        if($profile != null){
          $profile->status = 2;
          $profile->reason = $request->input('reason');
          $profile->save();
          $user = Account::where('id', $profile->user_id)->first();
          $email = $user['email'];
          Mail::to($email)->send(new SendMessageprofile($profile));
          return ['success' => true];
        }
        return ['success' => false, 'msg' => 'An error occured. Please try again later!'];
      }
  }
  
  public function deleteProfile(Request $request){
    $form_data = $request->only(['profile_id']);
    $validationRules = [
        'profile_id'    => ['required'],
    ];
    $validator = Validator::make($form_data, $validationRules);
    if ($validator->fails())
        return ['success' => false, 'error' => "There was a problem! Please try again later or reload the page and try again!"];  
    else {
      try{
        Profile::where('id', $form_data['profile_id'])->delete();
        return ['success' => true, 'msg' => "The profile has been successfully deleted!"];
      } catch(Exception $e){
        return ['success' => false, 'error' => "There was a problem! Please try again later or reload the page and try again!"];
      }
    } 
  }
  
  // check list TO DO
  public function generateCheckSlug($title){
    $profiles = Profile::where('profile_title', $title)->orderBy('id', 'desc')->get();
    $slug = str_slug($title,'-');
    if($profiles){
      $slug .= '-'.count($profiles)+1;
    }
    return $slug;
  }
  
  public function reorderImages(Request $request){
    $form_data = $request->only(['id', 'images']);
    $validationRules = [
        'id'    => ['required'],
    ];
    $validator = Validator::make($form_data, $validationRules);
    if ($validator->fails())
        return ['success' => false, 'error' => "There was a problem! Please try again later or reload the page and try again!"];  
    else {
      try{
        Profile::where('id', $form_data['id'])->update(['photos' => $form_data['images']]);
        return ['success' => true];
      } catch(Exception $e){
        return ['success' => false, 'error' => "There was a problem! Please try again later or reload the page and try again!"];
      }
    }
  }
  
  public function addEditYoutube(Request $request){
     $form_data = $request->only(['add_edit_id', 'youtube-videos', 'subitem_id']);
     $validationRules = [
         'youtube-videos'    => ['required'],
     ];
     $validator = Validator::make($form_data, $validationRules);
     if ($validator->fails()){
      return ['success' => false, 'error' => "There was a problem! Please try again later or reload the page and try again!1"];  
     } else {
      try{
        $message = 'The profile has been successfully created.';
        $youtube_links = [];
        foreach($form_data['youtube-videos'] as $ylink){
          array_push($youtube_links, $ylink);
        }
        if($form_data['add_edit_id'] != null){
          Profile::where('id', $form_data['add_edit_id'])->update(['youtube_videos' => json_encode($youtube_links)]);
        } else{
          $profile = new Profile;
          $profile->youtube_videos = json_encode($youtube_links);
          $profile->user_id = Session::get('user')['id'];
          $profile->subitem_id = $form_data['subitem_id'];
          $profile->save();
          $message = 'The youtube links has been updated!';
        }
        return ['success' => true, 'msg' => $message];
      } catch(Exception $e){
        return ['success' => false, 'error' => "There was a problem! Please try again later or reload the page and try again!2"];
      }
    }
  }
  
  public function contactMe(Request $request){
    $form_data = $request->only(['name', 'email', 'phone', 'message', 'position', 'profile_id']);
    $validationRules = [
        'name'    => ['required'],
        'email'    => ['required'],
        'phone'    => ['required'],
        'message'    => ['required'],
        'position'    => ['required'],
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
            'message' => $form_data['message'],
            'position' => $form_data['position'],
          ];
          Mail::to($user['email'])->send(new SendProfileContactMail($date_email));
          return ['success' => true, 'msg' => "Thanks for applying to this job!"];
        } catch(Exception $e){
            return ['success' => false, 'error' => "There was a problem! Please try again later or reload the page and try again!"];
        }
      } catch(Exception $e){
        return ['success' => false, 'error' => "There was a problem! Please try again later or reload the page and try again!"];
      }
    }
  }
  
  
}
