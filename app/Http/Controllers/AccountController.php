<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMessageWelcome;
use App\Mail\SendMessageReset;
use App\Mail\SendMessageDocuments;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\AccountType;
use App\AccountSubtype;
use Validator;
use App\Account;
use App\PersonalTag;
use App\Tag;
use App\Job;
use App\Project;
use App\Subitem;
use App\Profile;
use App\ProjectCategory;
use App\ProjectGenere;
use App\IntroVideo;

use Carbon\Carbon;

class AccountController extends Controller
{
  public function about_account_type($type) {   
    // Just for frontend
    return view('pages.about_account', [
      'type' => ucfirst($type)
    ]);
  } 
  public function account_login_page(){
    if(!Session::has('user')){
      $account_types = AccountType::get()->translate(\App::getLocale());
      $current_usertype = null;
      if(isset($_GET['type'])){
        $current_usertype = $_GET['type'];
      }
      return view('pages.account_login_page', [
        'account_types'     => $account_types,
        'current_usertype'  => $current_usertype,
      ]);
    } else{
      return redirect('/user/profiles');
    }
     
  }
  
  public function verifyAccount($etoken){
    if($etoken){
      $check_token = Account::where(['etoken' => $etoken, 'account_verified' => 0])->first();
      if($check_token){
        Account::where(['etoken' => $etoken, 'account_verified' => 0])->update(['etoken' => null, 'account_verified' => 1]);
        return view('pages.account_verified', ['login_url' => url('/').'/account-login']);
      } else{
        return abort('403');
      }
    } else{
      return redirect('/');
    }
  }
  
  public function user_account(){
    $user = Account::with('usertype')->where(['id' => Session::get('user')['id']])->first();
//       dd($user);
    $avatar = $user->profile_pic;
    $documents = $user->prove_document;
    $validation_status = $user->documents_validated;
    $validation_status = $validation_status == 1 ? __('statics.status_validated') : __('statics.status_pending');  
      
    $profiles_count = $user->usertype['account_subtypes'];
    $profiles_count = json_decode($profiles_count, true);

    $counter_adding = 0;
    foreach($profiles_count as $prof_count){
      if($prof_count['subtype_value'] == null){
        // i have unlimited adding
        $counter_adding = 0;
        break;
      }else if($prof_count['subtype_value'] != -1){
        $counter_adding++;
      }
    }
    
    $account_subtypes = AccountSubtype::with('children')->get();
    foreach($profiles_count as &$prof_count){
      $prof_count['id'] = strtolower((new self())->get_subtype($account_subtypes, $prof_count['subtype_id'])['id']);
      $prof_count['name'] = strtolower((new self())->get_subtype($account_subtypes, $prof_count['subtype_id'])['name']);
      $prof_count['description'] = (new self())->get_subtype($account_subtypes, $prof_count['subtype_id'])['description'];
      $prof_count['icon'] = (new self())->get_subtype($account_subtypes, $prof_count['subtype_id'])['icon'];
      $prof_count['tags'] = json_decode((new self())->get_subtype($account_subtypes, $prof_count['subtype_id'])['tags'],true);
      $prof_count['skills'] = json_decode((new self())->get_subtype($account_subtypes, $prof_count['subtype_id'])['skills'],true);
      $prof_count['default_inputs'] = json_decode((new self())->get_subtype($account_subtypes, $prof_count['subtype_id'])['default_inputs'],true);
      $prof_count['children'] = json_decode((new self())->get_subtype($account_subtypes, $prof_count['subtype_id'])['children'],true);
      // go deep inside children and json_decode every key from this list: tags, skills, default_inputs
      array_walk_recursive(
          $prof_count['children'],
          function (&$value, $key) {
              if ($key == 'tags' || $key == 'skills' || $key == 'default_inputs') {
                  $value = json_decode($value, true);
              }
          }
      );
    }
    arsort($profiles_count);
//     dd($account_subtypes->toArray());
//     dd($profiles_count);
    if($counter_adding == 0){
      $counter_adding = "unlimited";
    }
       
    if($documents){
      $documents = json_decode($documents, true);
      foreach($documents as &$document){
        $document = $document['original_name'];
      }
    }
//     dd(is_array(json_decode($avatar)));
    $avatar = json_decode($avatar);
    if((is_array($avatar) && count($avatar) > 0)){
      $avatar = $avatar[0]->download_link;
    }
    $tags = Tag::get();
    $personal_tags = PersonalTag::where('user_id', $user->id)->get();
    $jobs = Job::where('user_id', $user->id)->orderBy('updated_at', 'desc')->get();
    foreach($jobs as &$job){
      $job->tags = json_decode($job->tags);
      $job->photos = json_decode($job->photos);
      $job->files = json_decode($job->files);
    }
    $projects = Project::where('user_id', $user->id)->orderBy('updated_at', 'desc')->get();
    $project_categories = ProjectCategory::get();
    $project_genres = ProjectGenere::get();
    $current_date = Carbon::now()->format('d M Y');
    if(!($projects)->isEmpty()){
      foreach($projects as &$project){
        $no_jobs = count(json_decode($project->jobs, true));
        $start_date = Carbon::parse($project->start_date)->format('d M Y');
        $project->start_date = $start_date;
        $end_date = Carbon::parse($project->end_date)->format('d M Y');
        $project->end_date = $end_date;
        $project->status = (new self())->checkStatus($current_date, $project->start_date, $project->end_date, $no_jobs);
          
        $project->tags = json_decode($project->tags, true);
        $project->photos = json_decode($project->photos, true);
        $project->files = json_decode($project->files, true);
      }
    }
//     dd($projects->toArray());
    $subitems = Subitem::get();
    if($subitems){
      foreach($subitems as &$subitem){
        $subitem->default_inputs = json_decode($subitem->default_inputs);
        $subitem->tags = json_decode($subitem->tags);
      }
    }
    $actors = [];
    
    // Get all the profiles created by user and send it to view
    $profiles = Profile::where(['user_id' => $user->id])->orderby('updated_at', 'desc')->get();
    if(!($profiles)->isEmpty()){
      foreach($profiles as &$profile){
        $profile->inputs = json_decode($profile->inputs, true);
        $profile->languages = json_decode($profile->languages, true);
        $profile->general_tags = json_decode($profile->general_tags, true);
        $profile->skill_tags = json_decode($profile->skill_tags, true);
        $profile->files = json_decode($profile->files, true);
        $profile->photos = json_decode($profile->photos, true);
        $profile->filmography = json_decode($profile->filmography, true);
        $profile->biography = json_decode($profile->biography, true);
        $profile->other = json_decode($profile->other, true);
        $profile->videos = json_decode($profile->videos, true);
      }
    }
    
    $videos = IntroVideo::where('visible',1)->get();
    $profile_videos = [];
    $profile_youtube_videos = [];
    if($videos){
      foreach($videos as &$video){
        $video->video_upload = json_decode($video->video_upload);
        if($video->video_upload != null && is_array($video->video_upload) && count($video->video_upload) > 0){
          array_push($profile_videos, $video->video_upload[0]->download_link);
        }
        if($video->video_link != null){
          array_push($profile_youtube_videos, $video->video_link);
        }
      }
    }
    return view('user.account', [
      'profiles_count' => $profiles_count,
      'counter_adding' => $counter_adding,
      'avatar' => $avatar,
      'validation_status' => $validation_status,
      'doc_validated' => $user->documents_validated,
      'documents' => $documents,
      'usertype' => Session::get('user')['usertype'],
      'tags' => $tags,
      'personal_tags' => $personal_tags,
      'jobs' => $jobs,
      'projects' => $projects,
      'profiles' => $profiles,
      'project_categories' => $project_categories,
      'project_genres' => $project_genres,
      'subitems' => $subitems,
      'actors' => $actors,
      'profile_videos' => $profile_videos,
      'profile_youtube_videos' => $profile_youtube_videos,
    ]);
  }
  public static function checkStatus($current_date, $start_date, $end_date, $no_jobs){
    $current_date = Carbon::parse($current_date);
    $start_date   = Carbon::parse($start_date);
    $end_date     = Carbon::parse($end_date);
    
    if($current_date->between($start_date, $end_date)){
      $status = 'Active';
    } elseif($current_date > $end_date){
      $status = 'Completed';
    } elseif($current_date->between($start_date, $end_date) && $no_jobs){
      $status = 'In progress';
    } elseif($current_date <= $start_date){
      $status = 'Upcoming';
    }
    return $status;
  }
  public static function get_subtype($account_subtypes, $id){
    foreach($account_subtypes as $acc_sub){
      if($acc_sub['id'] == $id){
        return $acc_sub;
      }
    }
  }
  public function view_document($file_name){
      return Storage::disk('local')->response('producer_documents/'.Session::get('user')['id']."/".$file_name, $file_name);
  }
  public function signUp(Request $request){
        $form_data = $request->only(['name','email', 'phone', 'password', 'accept_therms', 'usertype_id', 'prefix']);
        $validationRules = [
            'name'    => ['required','min:3'],
            'email'   => ['required','email'],
            'phone'   => ['required'],
            'password'   => ['required', 'min:6'],
            'accept_therms'   => ['required'],
        ];
        $validator = Validator::make($form_data, $validationRules);
        if ($validator->fails())
            return ['success' => false, 'error_all' => $validator->errors()->toArray()];  
        else {
            $check_user = Account::where('email', $form_data['email'])->first();
            if($check_user != null){
              return ['success' => false, 'msg_error' => 'An account with this email already exists. Please change the email!'];
            }
           // if there is no user, let's create one and redirect to user main profile
            $form_data_modified = $request->all();
            unset($form_data_modified['accept_therms']);
            unset($form_data_modified['_token']);
            unset($form_data_modified['prefix']);
            $form_data_modified['password'] = Hash::make($request->input('password'));
            $date_de_salvat = Account::firstOrCreate($form_data_modified); 
            
            if($date_de_salvat){
              $date_de_salvat['etoken'] = encrypt(uniqid(rand(123456, 789012).'-'.time().'-'.rand(999999, 99999999).'-pr-'));
              $usertype = AccountType::where('id', $date_de_salvat['usertype_id'])->first()['title'];
              Account::where('id', $date_de_salvat['id'])->update(['logged' => 0, 'etoken' => $date_de_salvat['etoken'], 'account_verified' => 0]);
              if($usertype == 'Profile'){
                $usertype = 'User';
              } 
              if($usertype == 'Profil'){
                $usertype = 'Benutzer';
              }
              Mail::to($form_data['email'])->send(new SendMessageWelcome($date_de_salvat));
              $session_data = array(
                'id'    => $date_de_salvat['id'],
                'email' => $date_de_salvat['email'],
                'name'  => $date_de_salvat['name'],
                'phone' => "+".$form_data['prefix'].$form_data['phone'],
                'location'          => null,
                'short_description' => null,
                'company_name'      => null,
                'company_registration' => null,
                'company_address' => null,
                'usertype' => $usertype,
                'logged'   => 0,
                'account_verified'   => 0,
              );
//               Session::put('user', $session_data);
//               $this->setLogged(Session::get('user')['id'], false);
//               Session::put('remember', false);
              
              return ['success' => true, 'msg' => 'Your account has been created! Please check your email to activate your account!', 'url' => url('/').'/user/main_profile'];
            } else{
              return ['success' => false, 'fail_error' => 'An error occured! Please try again later!'];
            }
      }       
  }
  public function resend_confirmation(Request $request){
    $form_data = $request->only(['email']);
        $validationRules = [
            'email'   => ['required','email'],
        ];
        $validator = Validator::make($form_data, $validationRules);
        if ($validator->fails())
            return ['success' => false, 'error' => 'Please enter a valid email to receive the confirmation email!'];  
        else {
          $user = Account::where('email', $form_data['email'])->first();
           if ($user){
             $prkey = encrypt(uniqid(rand(123456, 789012).'-'.time().'-'.rand(999999, 99999999).'-pr-'));
             $user->etoken = $prkey;
             if ($user->save()){
               Mail::to($form_data['email'])->send(new SendMessageWelcome($user));
               return ['success' => true, 'msg' => 'An email has been sent to '.$request->input('email').'.Please check your email!'];
             }
           } else{
             return ['success' => false, 'error' => 'This email does not exist into the system. Please enter a real email!'];
           }
      }       
  }
  public function login(Request $request){
        $form_data = $request->only(['email', 'password', 'remember']);
        $validationRules = [
            'email'   => ['required','email'],
            'password'   => ['required', 'min:6'],
        ];
        $validator = Validator::make($form_data, $validationRules);
        if ($validator->fails())
            return ['success' => false, 'error_all' => $validator->errors()->toArray()];  
        else {
            $user = Account::where(['email' => $request->input('email')])->first();
            if($user && Hash::check($request->input('password'), $user->password)){
              if($user->account_verified == 0){
                return ['success' => false, 'fail_error' => 'Your account has not been verified. Please check your email address to verify it!<br> Didn\'t receive any email? Enter your email here to resend the activation email', 'account_unverified' => true];
              }
              $usertype = AccountType::where('id', $user->usertype_id)->first()['title'];
              if($usertype == 'Profile'){
                $usertype = 'User';
              } 
              if($usertype == 'Profil'){
                $usertype = 'Benutzer';
              }
              $session_data = array(
                'id' => $user->id,
                'email' => $user->email,
                'name' => $user->name,
                'phone' => $user->phone,
                'location' => $user->location,
                'company_name' => $user->company_name,
                'company_registration' => $user->company_registration,
                'company_address' => $user->company_address,
                'short_description' => $user->short_description,
                'usertype' => $usertype,
                'logged' => 1,
                'account_verified'   => $user->account_verified,
              );
              Session::put('user', $session_data);
              $this->setLogged(Session::get('user')['id'], true);
              if($request->input('remember')){
                Session::put('remember', true);
              } else{
                Session::put('remember', false);
              }
              return ['success' => true, 'msg' => 'Successfully logged!', 'url' => url('/').'/user/main_profile'];
            } else{
              return ['success' => false, 'fail_error' => 'Email or password wrong! Please try again!'];
            }
      }       
  }
  public function forgotPassword(Request $request){
        $form_data = $request->only(['email']);
        $validationRules = [
            'email'   => ['required','email'],
        ];
        $validator = Validator::make($form_data, $validationRules);
        if ($validator->fails())
            return ['success' => false, 'error_all' => $validator->errors()->toArray()];  
        else {
           $user = Account::where(['email' => $request->input('email')])->first();
           if ($user){
             $prkey = encrypt(uniqid(rand(123456, 789012).'-'.time().'-'.rand(999999, 99999999).'-pr-'));
             $user->etoken = $prkey;
             if ($user->save()){
               Mail::to($form_data['email'])->send(new SendMessageReset(['token'=>$prkey, 'email'=> $form_data['email']]));
               return ['success' => true, 'msg' => 'An email has been sent to '.$request->input('email').'.Please check your email!'];
             } else{
               return ['success' => false, 'fail_error' => 'An error occured! Please try again later!'];
             }
           }
           else{
            return ['success' => false, 'fail_error' => 'The email has not been found. Please try again!'];
          }
      }       
  }
  public function resetPasswordFirst($etoken){
    $check_token = Account::where('etoken', $etoken)->first();
    if($check_token){
      return view('pages.reset_password',[
        'etoken' => $etoken,
      ]);
    } else{
      return redirect('/');
    }
  }
  public function resetPasswordForm(Request $request){
      $user = Account::where('etoken', $request->input('etoken-input'))->first();
      if($user != null){
          $form_data = $request->only(['password', 'repeat_password']);
          $validationRules = [
              'password'   => ['required','min:6'],
              'repeat_password'   => ['required','min:6'],
          ];
          $validator = Validator::make($form_data, $validationRules);
          if ($validator->fails()){
              return ['success' => false, 'error_all' =>  $validator->errors()->toArray()];  
          } else{
            if($request->input('password') != $request->input('repeat_password')){
              return ['success' => false, 'fail_error' => 'The two passwords do not match!'];
            } else{
              $password = Hash::make($request->input('password'));
              Account::where('etoken', $user->etoken)->update(['password' => $password, 'etoken' => null]);
              return ['success' => true, 'msg' => 'The password has been changed!', 'url' => url('/').'user/main_profile'];
            }
          }
      } else{
        return ['success' => false, 'fail_error' => 'An error occured! Please try again later!'];
      }
  }
  public function logout(Request $request){
    if(Session::has('user')){
      $this->setLogged(Session::get('user')['id'], false);
      Session::forget('user');
      Session::put('remember', false);
      return ['success' => true, 'url' => url('/')];
    } else{
      return ['success' => false, 'fail_error' => 'An error occured! Please try again later!'];
    }
  }
  public function resetPasswordAccount(Request $request){
      if(Session::has('user')){
          $form_data = $request->only(['password', 'repeat_password']);
          $validationRules = [
              'password'   => ['required','min:6'],
              'repeat_password'   => ['required','min:6'],
          ];
          $validator = Validator::make($form_data, $validationRules);
          if ($validator->fails()){
              return ['success' => false, 'error_all' =>  $validator->errors()->toArray()];  
          } else{
            if($request->input('password') != $request->input('repeat_password')){
              return ['success' => false, 'fail_error' => 'The two passwords do not match!'];
            } else{
              $password = Hash::make($request->input('password'));
              Account::where('email', Session::get('user')['email'])->update(['password' => $password]);
              return ['success' => true, 'msg' => 'The password has been changed!'];
            }
          }
      } else{
        return ['success' => false, 'fail_error' => 'An error occured! Please try again later!'];
      }
  }
  
  private function setLogged($user_id, $logged = false){
    Account::where('id', $user_id)->update(['logged' => $logged]);
  }
  public function deleteDocProve(Request $request){
    if(Session::has('user')){
        $form_data = $request->only(['file_name']);
        $validationRules = [
            'file_name'   => ['required'],
        ];
        $validator = Validator::make($form_data, $validationRules);
        if ($validator->fails()){
            return ['success' => false, 'fail_error' => 'Please select a valid file to delete!'];  
        } else {
            $id_client = Session::get('user')['id'];
            $path = 'producer_documents/'.$id_client.'/';
            $filesPath = [];
            $file_received = $form_data['file_name'];
            $user = Account::where('id', Session::get('user')['id'])->first();
            $current_files = $user->prove_document;
            if($current_files){
                $current_files = json_decode($current_files, true);
                foreach($current_files as $file){
                  if($file['original_name'] != $file_received){
                    array_push($filesPath, [
                      'download_link' => $file['download_link'],
                      'original_name' => $file['original_name'],
                    ]);
                  }
                }
                $path_file = 'producer_documents/'.$id_client.'/'.$file_received;
                Storage::delete($path_file);
                $prove_document = json_encode($filesPath);
                Account::where('id', Session::get('user')['id'])->update(['prove_document' => $prove_document]);
                return ['success' => true, 'msg' => 'The document has been successfully deleted!'];  
            } else{
              return ['success' => false, 'fail_error' => 'An error occured! Please try again later!'];
            }
        }
      } else{
        return ['success' => false, 'fail_error' => 'You are not logged in! Please login and try again!'];
    }
  }
  public function uploadProve(Request $request){
     if(Session::has('user')){
        $form_data = $request->only(['upload_doc_prove']);
        $validationRules = [
            'upload_doc_prove'   => ['required'],
        ];
        $validator = Validator::make($form_data, $validationRules);
        if ($validator->fails()){
            return ['success' => false, 'fail_error' => 'Please upload a valid pdf file!'];  
        } else {
            $allowedfileExtension=['pdf'];
            $documents = $request->file('upload_doc_prove');
          
            $id_client = Session::get('user')['id'];
            $path = 'producer_documents/'.$id_client.'/';
            $filesPath = [];
            foreach($documents as $document){
              $extension = $document->getClientOriginalExtension();
              $check=in_array($extension,$allowedfileExtension);
              if($check){
                $filename = 'producer_doc'.uniqid().'.pdf';
                Storage::disk('local')->put($path.$filename, file_get_contents($document));
                array_push($filesPath, [
                  'download_link' => $path.$filename,
                  'original_name' => $filename,
                ]);
              } else{
                return ['success' => false, 'fail_error' => 'Please upload a valid pdf file!'];  
              }
            }

            $prove_document = json_encode($filesPath);
            Account::where('id', Session::get('user')['id'])->update(['prove_document' => $prove_document]);
            Mail::to(settings('site.email'))->send(new SendMessageDocuments([
              'name'=> Session::get('user')['name'],
              'id'=> Session::get('user')['id'],
              'usertype'=> Session::get('user')['usertype'],
            ]));
            return ['success' => true, 'msg' => 'Documents has been sent for check!'];  
        }
      } else{
        return ['success' => false, 'fail_error' => 'You are not logged in! Please login and try again!'];
      }
  }
  public function changeProfilePic(Request $request){
     if(Session::has('user')){
        $form_data = $request->only(['profile_pic']);
        $validationRules = [
            'profile_pic'   => ['required','image'],
        ];
        $validator = Validator::make($form_data, $validationRules);
        if ($validator->fails()){
            return ['success' => false, 'fail_error' => 'Please upload a valid image file!'];  
        } else {
            $image_avatar = $request->file('profile_pic');
            $id_client = Session::get('user')['id'];
            $path = 'avatars/'.$id_client.'/';
            $filename = 'avatar_'.date('Y-m-d H:i:s').'.'.$image_avatar->extension();
            $filesPath = [];
            $file = new Filesystem;
            $file->cleanDirectory('storage/'.$path);
            Storage::disk('public')->put($path.$filename, file_get_contents($image_avatar));

            array_push($filesPath, [
              'download_link' => $path.$filename,
              'original_name' => $filename,
            ]);
            $avatar = json_encode($filesPath);
            Account::where('id', Session::get('user')['id'])->update(['profile_pic' => $avatar]);
            return ['success' => true, 'msg' => 'Avatar has been changed!']; 
        }
      } else{
        return ['success' => false, 'fail_error' => 'You are not logged in! Please login and try again!'];
      }
  }
  
  public function editProfileInfo(Request $request){
      $form_data = $request->only(['name','email', 'phone', 'location', 'short_description', 'company_name', 'company_registration', 'company_address', 'profile_type', 'prefix']);
      $validationRules = [
          'name'    => ['required','min:3'],
          'email'   => ['required','email'],
          'phone'   => ['required'],
          'location'=> ['required', 'min:6'],
      ];
      if(strpos($request->input('profile_type'),'company') !== false){
        $validationRules['company_name']          = ['required'];
        $validationRules['company_registration']  = ['required'];
        $validationRules['company_address']       = ['required'];
      }
      $validator = Validator::make($form_data, $validationRules);
      if ($validator->fails())
          return ['success' => false, 'error_all' => $validator->errors()->toArray()];  
      else {
            $updated_info = [
              'name'              => $form_data['name'],
              'email'             => $form_data['email'],
              'phone'             => "+".$form_data['prefix'].$form_data['phone'],
              'location'          => $form_data['location'],
              'short_description' => $form_data['short_description'],
            ];
            if(strpos($request->input('profile_type'),'company') !== false){
                $updated_info['company_name']         = $form_data['company_name'];
                $updated_info['company_registration'] = $form_data['company_registration'];
                $updated_info['company_address']      = $form_data['company_address'];
            } else{
                $updated_info['company_name']         = null;
                $updated_info['company_registration'] = null;
                $updated_info['company_address']      = null;
            }
            Account::where(['id' => Session::get('user')['id']])->update($updated_info);
            $session_data = array(
                'id'       => Session::get('user')['id'],
                'email'    => $form_data['email'],
                'name'     => $form_data['name'],
                'phone'    => "+".$form_data['prefix'].$form_data['phone'],
                'location' => $form_data['location'],
                'usertype' => Session::get('user')['usertype'],
                'short_description' => $form_data['short_description'],
                'logged'            => 1,
              );
              if(strpos($request->input('profile_type'),'company') !== false){
                $session_data['company_name'] = $form_data['company_name'];
                $session_data['company_registration'] = $form_data['company_registration'];
                $session_data['company_address'] = $form_data['company_address'];
              } else{
                $session_data['company_name']         = null;
                $session_data['company_registration'] = null;
                $session_data['company_address']      = null;
              }
              Session::put('user', $session_data);
            return ['success' => true, 'msg' => 'Your account info has been updated!'];
      }
        return ['success' => false, 'fail_error' => 'An error occured! Please try again later!'];
  } 
}
