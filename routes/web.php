<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user_controller;
use App\Http\Controllers\admin_controller;
use App\Http\Controllers\login_controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\laravelMail;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\signupVerification;
use App\Http\Controllers\booking_controller;
use App\Http\Controllers\EsewaController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\rating_controller;
use App\Http\Controllers\admi_controller;
use App\Http\Controllers\customer;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PDFPayment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




    // Route::get('/user', function () {
        //     return view('user');
        // });



        // !!-------------------------redirect route--------------------------------------------------------------------!!

        Route::view('/signupp', 'signup')->name('signup');
        Route::view('/forget', 'forgot')->name('forgot');
        Route::view('/otp', 'verifyEmail')->name('verifyEmail');
        Route::view('/signup_emailcheck', 'signup_emailVerify')->name('signup_emailcheck');
        Route::view('/Terms-and-condition', 'Terms-and-condition')->name('Terms-and-condition');

        // Route::view('/rate', 'rating')->name('rate');
        Route::view('/', 'dashboard');




        // Route::view('/review', 'review')->name('review');






        // ---------------------------User Profile ----------------------------------------------------------------------

        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'edit');
            Route::post('/password', 'changePassword');
            Route::post('/account', 'update')->name('update');
            Route::post('/delete', 'deleteAccount')->name('AccountDeletation');
        });



        // ----------------------------- Login -----------------------------------------------------------------------------


        Route::controller(login_controller::class)->group(function () {
            Route::post('/user', 'userlogin');
            Route::get('/logout','userlogout');
        });


        //-----------------------------------

        Route::controller(user_controller::class)->group(function () {
            Route::post('/userSignUp', 'userSignup')->name('addUser');
            Route::get('/bookingPage', 'explore')->name('bookingPage');
            Route::post('/changePP', 'uploadPicture')->name('uploadPicture');
        });

        //------------------------------------Forge Password ------------------------------------------------------------

        Route::post('/check', [laravelMail::class, 'check'])->name('check');
        Route::post('/verify', [laravelMail::class, 'verify'])->name('verify');
        Route::post('/newPassword',[laravelMail::class, 'newPassword'])->name('newPassword');
        Route::post('/resetpass', [laravelMail::class, 'resetPassword'])->name('resetpasword');



        Route::get('/otp', function () {
            return view('verifyEmail');
        })->name('verifyemail');

        //------------------------------------Sign up verfification --------------------------------------------------------

        Route::controller(signupVerification::class)->group(function () {
            Route::post('/checkEmail','checkEmail')->name('checkEmail');
            Route::post('/otpCheck','checkOtp')->name('otpCheck');
            //    Route::post('/signupp','signup')->name('signup');
        });



        Route::get('/checkOtp', function () {
            return view('signup-otpCheck');
        })->name('signup-otpCheck');


        // ------------------------booking --------------------------------------------------------------------------------------

        Route::controller(booking_controller::class)->group(function(){

            Route::post('/destination','destination')->name('destination');
            ROute::get('/booking/{id}', 'showBookingPage')->name('showBookingPage');
            // Route::get('/', 'showPackages')->name('/');

});



// -----------------------------CONTACT----------------------------------------------??



Route::view('/queries', 'queries')->name('queries');
Route::controller(contactController::class)->group(function(){

    Route::post('/contact','contact')->name('contact');


});








//-----------------------Payment System----------------------------------


Route::get('/payment', function () {
    return view('esewaPayment');
});

Route::post('/esewa', [EsewaController::class, 'esewaPay'])->name('esewa');
Route::get('/success', [EsewaController::class, 'esewaPaySuccess']);
Route::get('/failure', [EsewaController::class, 'esewaPayFailed']);




Route::get('/review', function () {
    return view('review');
});

// -----------------------------------Rating----------------------------------------


Route::get('/rating', function () {
    return view('rating');
});

Route::controller(rating_controller::class)->group(function(){

    Route::post('/rating','rating')->name('rating');
    // Route::get('/', 'showrate')->name('/');

});





// ------------------------admin dashboard-----------------------------------------------------------

Route::view('/admindashboard', 'admindash')->name('admindashboard');

Route::controller(admin_controller::class)->group(function(){

    Route::get('/viewPackage', 'viewPackages')->name('viewPackage');
    Route::post('/addPackages','addPackages')->name('addPackages');
    Route::get('/editPackage/{id}', 'editPackage')->name('editPackage');
    Route::get('/deletePackage/{id}', 'deletePackage')->name('deletePackage');
    Route::post('/updatePackage/{id}', 'updatePackage')->name('updatePackage');


});

Route::get('/home', [admin_controller::class, 'redirectToHomepage'])->name('home');





// ---------------------customer----------------------
Route::controller(customer::class)->group(function(){

    Route::get('/user', 'viewCustomer')->name('user');
    Route::post('/addUser', 'addUser')->name('addUser');
    // Route::get('/viewCustomer', 'viewCustomer')->name('viewCustomer');
    Route::get('/editUser/{id}', 'editUser')->name('editUser');
    Route::get('/deleteCustomer/{id}', 'deleteCustomer')->name('deleteCustomer');
    Route::post('/updateUser/{id}', 'updateUser')->name('updateUser');

});







// ------------------------Generate PDF--------------------------------


Route::controller(PDFController::class)->group(function(){
    Route::get('/generate-pdf', 'generatePDF')->name('generatePDF');

});

Route::controller(PDFPayment::class)->group(function(){
    Route::get('/Payment-pdf', 'PaymentPDF')->name('Payment-pdf');

});




