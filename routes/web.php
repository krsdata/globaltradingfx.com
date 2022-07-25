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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();




Route::middleware('auth')->group(function () {
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');
        // Profile
        Route::get('/profile','AdminController@profile')->name('admin-profile');
        Route::post('/profile/{id}','AdminController@profileUpdate')->name('profile-update');

        // Password Change
        Route::get('change-password', 'AdminController@changePassword')->name('change.password.form');
        Route::post('change-password', 'AdminController@changPasswordStore')->name('change.password');

        // Settings
        Route::get('settings','AdminController@settings')->name('settings');
        Route::post('setting/update','AdminController@settingsUpdate')->name('settings.update');

    Route::middleware('role:1')->group(function (){
    
        //  Staff
        Route::get('/position',"StaffController@index")->name('position.index');
        Route::get('/position/{id}',"StaffController@edit")->name('position.edit');

        Route::get('/deposit',"StaffController@addDeposit")->name('deposit.add'); 
        Route::get('/getdeposit',"StaffController@AllDeposit")->name('deposit.getdeposit'); 
        Route::post('/add_deposit',"StaffController@storDeposit")->name('deposit.add_deposit'); 

        Route::get('/withdrawal',"StaffController@addwithdrawal")->name('withdrawal.add'); 
        Route::get('/getwithdrawal',"StaffController@allWithdrawal")->name('withdrawal.getwithdrawal'); 
        Route::post('/add_withdrawal',"StaffController@storWithdrawal")->name('withdrawal.add_withdrawal');

    }); 

    Route::middleware('role:2')->group(function (){

       //
        
       
    });     
});
 








