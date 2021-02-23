<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use App\Project;
use App\Profile;
use App\AccountType;
use App\AccountSubtype;
use Carbon\Carbon;

class SearchController extends Controller
{
  public function search(Request $request) {  
//     $jobs = Job::constrain($constraints)->get();
//           dd($jobs);
    // use only start_fee because now i don't have start and end fee
    $input_search = $request->input('q');
    if($request->input('filters')){
      foreach($request->input('filters') as $filter){
        if($filter != null){
          $input_search .= " ".$filter;
        }
      }
    }
//     dd($input_search);
    if($request->input('start_fee') != null || $request->input('end_fee') != null){
      $start_fee = $request->input('start_fee');
      $end_fee = $request->input('start_fee');
      $jobs = [];
      $projects = [];
      if($request->input('type-item-search') == 'job'){
        $jobs = new Job;
        if($start_fee != null && $end_fee != null){
          $jobs = $jobs->where('start_fee', '>=', $start_fee)->where('start_fee', '<=', $end_fee);
//           dd($jobs);
        } elseif($start_fee != null){
          $jobs = $jobs->where('start_fee', '>=', $start_fee);
        } else{
           $jobs = $jobs->where('start_fee', '<=', $end_fee);
        }
        $constraints = $jobs;
        if($input_search != null){
          $jobs = Job::search($input_search)->constrain($constraints)->get();
        } else{
          $jobs = $constraints->get();
        }
        foreach($jobs as &$job){
          $job->photos = json_decode($job->photos);
          $job->files = json_decode($job->files);
        }
      }
      if($request->input('type-item-search') == 'project'){
        $projects = new Project;
        
        if($start_fee != null && $end_fee != null){
          $projects = $projects->where('start_fee', '>=', $start_fee)->where('start_fee', '<=', $end_fee);
        } elseif($start_fee != null){
          $jobs = $projects->where('start_fee', '>=', $start_fee);
        } else{
           $jobs = $projects->where('start_fee', '<=', $end_fee);
        }
        $constraints = $projects;
        if($input_search != null){
          $projects = Project::search($input_search)->constrain($constraints)->get();
        } else{
          $projects = $constraints->get();
        }
        foreach($projects as &$project){
          $project->photos = json_decode($project->photos);
          $project->files = json_decode($project->files);
          $end_date = Carbon::parse($project->end_date)->format('d M Y');
          $project->end_date = $end_date;
        }
      }
      if($request->input('type-item-search') == 'profile'){
        $profiles = new Profile;
        
        if($start_fee != null && $end_fee != null){
          $profiles = $profiles->where('start_fee', '>=', $start_fee)->where('start_fee', '<=', $end_fee);
        } elseif($start_fee != null){
          $jobs = $profiles->where('start_fee', '>=', $start_fee);
        } else{
           $jobs = $profiles->where('start_fee', '<=', $end_fee);
        }
        $constraints = $profiles;
        if($input_search != null){
          $profiles = Profile::search($input_search)->constrain($constraints)->get();
        } else{
          $profiles = $constraints->get();
        }
        foreach($profiles as &$profil){
          $profil->photos = json_decode($profil->photos);
          $profil->files = json_decode($profil->files);
        }
      }
    } else{
      if($input_search != null){
        $jobs = Job::search($input_search)->get();
        $projects = Project::search($input_search)->get();
        $profiles = Profile::search($input_search)->get();
      } else{
        $jobs = Job::get();
        $projects = Project::get();
        $profiles = Profile::get();
      }
      if($jobs){
        foreach($jobs as &$job){
          $job->photos = json_decode($job->photos);
          $job->files = json_decode($job->files);
        }
      }
      if($projects){        
        foreach($projects as &$project){
          $project->photos = json_decode($project->photos);
          $project->files = json_decode($project->files);
          $end_date = Carbon::parse($project->end_date)->format('d M Y');
          $project->end_date = $end_date;
        }
      }
      if($profiles){        
        foreach($profiles as &$profil){
          $profil->photos = json_decode($profil->photos);
          $profil->files = json_decode($profil->files);
        }
      }
    }
    $types = AccountType::get();
    $subtype_ids = [];
    foreach($types as $type){
      $subtypes = json_decode($type->account_subtypes);
      foreach($subtypes as $subtype){
        array_push($subtype_ids, [
         'type_id' => $type->id, 
         'subtype_id' => $subtype->subtype_id, 
        ]);
      }
    }
    $subtype_ids = array_map("unserialize", array_unique(array_map("serialize", $subtype_ids)));
    $subtypes = [];
    foreach($subtype_ids as $subtype){
      $subtypes[$subtype['type_id']] = [];
    }
    foreach($subtype_ids as $subtype){
      array_push($subtypes[$subtype['type_id']], $subtype['subtype_id']);
    }
    $fields = [];
    $subtypes_retrieved = AccountSubtype::get();
    foreach($subtypes_retrieved as &$item){
      $item->default_inputs = json_decode($item->default_inputs, true);
    }
    
    $account_subtypes = AccountSubtype::with('children')->where('parent_id', null)->get();
//     dd($account_subtypes->toArray());
    
    return view('pages.search', [
      'jobs' => $jobs,
      'projects' => $projects,
      'profiles' => $profiles,
      'filters' => $subtypes_retrieved,
      'account_subtypes' => $account_subtypes,
    ]);
  } 
}
