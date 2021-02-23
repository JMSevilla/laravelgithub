<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Get routes
Route::get('/', 'IndexController@index');
Route::get('search', 'SearchController@search');
Route::get('pricing', 'PricingController@pricing');
Route::get('therms', 'IndexController@therms');
Route::get('privacy', 'IndexController@privacy');
Route::get('cookies', 'IndexController@cookies');
Route::get('about', 'IndexController@about');
Route::get('contact', 'ContactController@contact');
Route::get('careers', 'IndexController@careers');
Route::get('project/{slug}', 'ProjectController@project_detail');
Route::get('account/{type}', 'AccountController@about_account_type');
Route::get('profile_detail/{slug}', 'ProfileController@profile_detail');
Route::get('product_detail/{slug}', 'ItemController@product_detail');
Route::get('job_detail/{slug}', 'JobController@job_detail');
Route::get('account-login', 'AccountController@account_login_page');
Route::get('reset-password/{etoken}', 'AccountController@resetPasswordFirst');
Route::get('verify-account/{etoken}', 'AccountController@verifyAccount');
Route::get('locale/{locale}', function($locale) {
  Session::put('locale', $locale);
  return redirect()->back();
});
Route::group(['prefix' => 'user'], function () {
  Route::get('profiles', 'AccountController@user_account')->middleware('auth.website');
  Route::get('main_profile', 'AccountController@user_account')->middleware('auth.website');
  Route::get('settings_profile', 'AccountController@user_account')->middleware('auth.website');
  Route::get('projects', 'AccountController@user_account')->middleware('auth.website');
  Route::get('reviews', 'AccountController@user_account')->middleware('auth.website');
  Route::get('files', 'AccountController@user_account')->middleware('auth.website');
  Route::get('items', 'AccountController@user_account')->middleware('auth.website');
  Route::get('jobs', 'AccountController@user_account')->middleware('auth.website');
  Route::get('view_document/{file_name}', 'AccountController@view_document')->middleware('auth.website');
});
// Post routes
Route::post('contact-message', 'ContactController@sendMessage');

Route::post('sign-up', 'AccountController@signUp');
Route::post('login', 'AccountController@login');
Route::post('logout', 'AccountController@logout');
Route::post('reset-password-email', 'AccountController@forgotPassword');
Route::post('reset-password-final', 'AccountController@resetPasswordForm');
Route::post('reset-password-account', 'AccountController@resetPasswordAccount');
Route::post('upload-prove', 'AccountController@uploadProve');
Route::post('delete-prove', 'AccountController@deleteDocProve');
Route::post('change-profile-pic', 'AccountController@changeProfilePic');
Route::post('edit-profile-info', 'AccountController@editProfileInfo');
Route::post('resend-confirmation-email', 'AccountController@resend_confirmation');

Route::post('add-job', 'JobController@addJob');
Route::post('edit-job', 'JobController@editJob');
Route::post('delete-job', 'JobController@deleteJob');
Route::post('apply-top-job', 'JobController@applyToJob');

Route::post('add-project', 'ProjectController@addProject');
Route::post('edit-project', 'ProjectController@editProject');
Route::post('delete-project', 'ProjectController@deleteProject');
Route::post('contact-project-owner', 'ProjectController@contactProjectOwner');

Route::post('add-edit-informations', 'ProfileController@addEditInformations');
Route::post('contact-me', 'ProfileController@contactMe');
Route::post('add-edit-filmography', 'ProfileController@addEditFilmography');
Route::post('delete-filmography', 'ProfileController@deleteFilmography');
Route::post('add-edit-biography', 'ProfileController@addEditBiography');
Route::post('delete-biography', 'ProfileController@deleteBiography');
Route::post('add-edit-other-information', 'ProfileController@addEditOtherInfo');
Route::post('delete-other-information', 'ProfileController@deleteOtherInfo');
Route::post('add-edit-skills', 'ProfileController@addEditSkills');
Route::post('add-edit-files', 'ProfileController@addEditFiles');
Route::post('add-edit-photos', 'ProfileController@addEditPhotos');
Route::post('delete-photos', 'ProfileController@deletePhotos');
Route::post('delete-files', 'ProfileController@deleteFiles');
Route::post('add-edit-videos', 'ProfileController@addEditVideos');
Route::post('add-edit-youtube', 'ProfileController@addEditYoutube');
Route::post('delete-videos', 'ProfileController@deleteVideos');

Route::post('delete-profile', 'ProfileController@deleteProfile');

Route::post('edit-add-items', 'ProfileController@addEditItems');
Route::post('reorder-images', 'ProfileController@reorderImages');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('statics', ['uses' => 'StaticsController@index'])->middleware('admin.user');
    Route::post('save-statics', ['uses' => 'StaticsController@saveStatics'])->middleware('admin.user');
    Route::post('accept-profile', ['uses' => 'ProfileController@acceptProfile'])->middleware('admin.user');
    Route::post('reject-profile', ['uses' => 'ProfileController@rejectProfile'])->middleware('admin.user');
    Route::post('order', ['uses' => 'VoyagerSubTypesController@order_item'])->middleware('admin.user');
    Route::get('view_document/{file_name}', ['uses' => 'AccountController@view_document'])->middleware('admin.user');
});
Route::get('csrf-token', function() {
   return request()->session()->token();
});
