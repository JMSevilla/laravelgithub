<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class StaticsController extends Controller
{
  public function index() {   
    $arrayStaticsEn = require resource_path().'/lang/en/statics.php';
    $arrayStaticsDe = require resource_path().'/lang/de/statics.php';
    
    return view('admin.statics', [
      'arrayStaticsEn' => $arrayStaticsEn,
      'arrayStaticsDe' => $arrayStaticsDe,
    ]);
  } 
  public function saveStatics(Request $request){
    try{
      $file = resource_path().'/lang/'.$request->input('language-selected').'/statics.php';
      $arrayReceived = $request->all();
      unset($arrayReceived['language-selected']);
      $contents = var_export($arrayReceived, true);
      file_put_contents($file, "<?php\n return {$contents};\n ?>");
      return ['success' => true, 'msg' => 'Changes saved succesfully!!'];
    } catch(Exception $e){
      return ['success' => false, 'msg' => 'Could not save modifications. Please try again!'];
    }
  }
  
}
