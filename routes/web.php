<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendorInvoice;
use App\Http\Controllers\LoginController;
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
/*
Route::get('/', function () {
    
   // return view('welcome');
});
*/
# Basic Route
//Route::get('/', "AppController@index");

//Route::get('/', "App\Http\Controllers\AppController@index");

#Route with parameter
//Route::get('/about/{paramname}', "App\Http\Controllers\AppController@about");

 
#Route with optional parameter
/*Route::get('/services/{service_name?}', function () {
    
    return "<h1>Hello from services</h1>";
 });*/

 # Names routes
 //Route::get('/contact',"AppController@function-name")->name('contact');

 //Route::get('/contact', "App\Http\Controllers\AppController@contact")->name('contact');  // Assuming the function is named "contact"

 #Index page
 Route::get('/', "App\Http\Controllers\AppController@index")->name('dashboard');

 //Party routes
  Route::get('/add-party', "App\Http\Controllers\PartyController@addParty")->name('add-party');
  Route::post('/create-party', "App\Http\Controllers\PartyController@createParty")->name('create-party');
  Route::get('/manage-parties', "App\Http\Controllers\PartyController@index")->name('manage-parties');
  Route::get('/edit-party/{id}', "App\Http\Controllers\PartyController@editParty")->name('edit-party');
  Route::put('/update-party/{id}', "App\Http\Controllers\PartyController@updateParty")->name('update-party');
  Route::delete('/delete-party/{party}', "App\Http\Controllers\PartyController@deleteParty")->name('delete-party');

 //GST bill routes
 
   Route::get('/add-gst-bill', "App\Http\Controllers\GstBillController@addGstBill")->name('add-gst-bill');
   Route::get('/manage-gst-bill', "App\Http\Controllers\GstBillController@index")->name('manage-gst-bill');
   Route::get('/print-gst-bill/{id}', "App\Http\Controllers\GstBillController@print")->name('print-gst-bill');
   Route::post('/create-gst-bill', "App\Http\Controllers\GstBillController@createGstBill")->name('create-gst-bill');


   //Soft delete route
   Route::get('/delete/{table}/{id}', "App\Http\Controllers\AppController@delete")->name('delete');

   //Resource controller route
   Route::resource('/vendor-invoice', 'App\Http\Controllers\VendorInvoice');

   Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

   
   

// Define the custom login route
Route::post('/custom-login', function (Request $request) {
    // Hardcoded username and password for testing
    $username = 'fatin@example.com';
    $password = 'password1234';

    // Check if the provided credentials match the hardcoded values
    if ($request->input('email') == $username && $request->input('password') == $password) {
        // Authentication successful, redirect to dashboard or any other page
        return redirect()->route('dashboard');
    } else {
        // Invalid credentials, redirect back to the login page with an error message
        return redirect()->route('login')->withInput()->withErrors(['error' => 'Invalid username or password']);
    }
})->name('custom.login');