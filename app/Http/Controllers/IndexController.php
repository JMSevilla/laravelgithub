<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use App\Tag;
use App\Profile;
use App\AccountType;

class IndexController extends Controller
{  
  public function index() {   
    $jobs = Job::take(8)->get();
    if($jobs != null && count($jobs) > 0){
      foreach($jobs as $job){
        $job->photos = json_decode($job->photos, true);
        $job->files = json_decode($job->files, true);
        $job->tags = json_decode($job->tags, true);
      }
    }
    $account_types = AccountType::get()->translate(\App::getLocale());
    $job_tags = Tag::get()->translate(\App::getLocale());
    $profiles = Profile::with('subtype')->where('status', 1)->get();
    if($profiles != null){
      foreach($profiles as &$profile){
        $profile->photos = json_decode($profile->photos, true);
      }
    }
//     dd($profiles->toArray());
    return view('pages.index', [
      'jobs' => $jobs,
      'account_types' => $account_types,
      'job_tags' => $job_tags,
      'profiles' => $profiles,
    ]);
  } 
  public function therms() {   
    // Just for frontend
    return view('pages.therms');
  }   
  public function privacy() {   
    // Just for frontend
    return view('pages.privacy');
  }   
  public function cookies() {   
    // Just for frontend
    return view('pages.cookies');
  }   
  public function about() {   
    // Just for frontend
    return view('pages.about');
  }   
  public function careers() {   
    // Just for frontend
    return view('pages.careers');
  }
}
