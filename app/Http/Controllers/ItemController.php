<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
  public function product_detail($slug) {   
    // Just for frontend
    return view('pages.product_detail');
  }   
}
