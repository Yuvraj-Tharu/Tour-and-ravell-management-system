<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\admin_user;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Session;
use Mail;

class laravelMail extends Controller
{


    public function check(Request $request){
        // Check if the email already exists in the database
        $admin = admin_user::where('email', $request->email)->first();
        $user = user_account::where('email', $request->email)->first();


        if($user || $admin){

            $userr['to']=$request->email;
            $otp = mt_rand(100000, 999999);

            Mail::send('mail', ['otp' => $otp],function($messages) use ($userr){
                $messages->to($userr['to']);
                $messages->subject('Your new OTP');
            });

            if ($admin) {
                $admin->otp = $otp;
                $admin->save();
            } else {
                $user->otp = $otp;
                $user->save();
            }

            $admin ? session()->put('admin', true) : session()->put('admin', false);
            session()->put('email', $request->email);

            // Redirect to verifyemail.blade.php with email and OTP data
            return redirect()->route('verifyemail');
        } else {
            return redirect()->back()->with([
                'error' => 'Email does not exist'
            ]);
        }

    }

    public function verify(Request $request){
        // Get the entered email and OTP

        if (session('admin')) {
            $otpCheck = admin_user::where('email', session('email'))->where('otp', $request->OTPverify)->first();
        } else {
            $otpCheck = user_account::where('email', session('email'))->where('otp', $request->OTPverify)->first();
        }

        // Check if the entered OTP matches the generated OTP
        if($otpCheck) {
            // If OTP matches, redirect to newpassword view with email data
            return view('newPassword');
        } else {
            // If OTP does not match, redirect back with error message
            return redirect()->back()->with([
                'error' => 'Invalid OTP'
            ]);
        }


    }


    public function resetPassword(Request $request){


        if (session('admin')) {
            $user = admin_user::where('email', session('email'))->first();
        } else {
            $user = user_account::where('email', session('email'))->first();
        }

        if ($user) {
            if ($request->newPassword == $request->confirmPassword) {
                $user->password =$request->newPassword;
                $user->otp = null;
                $user->save();

                return response()->json([
                    'status' => true,
                    'message' => 'Password Changed Successfully',
                    'redirect' => '/'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Password does not match',
                    'redirect' => '#'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
                'redirect' => '#'
            ]);
        }
    }
}


