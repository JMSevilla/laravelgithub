<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PricingController extends Controller
{
  public function pricing() {   
    // Just for frontend
    return view('pages.pricing');
  } 
}
