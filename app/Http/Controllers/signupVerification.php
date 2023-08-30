<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\user_controller;

use Mail;
class signupVerification extends Controller
{
    //
    public function checkEmail(Request $request){
        $user = new user_controller();

        if ($user->checkEmail($request->email)) {
            return response()->json([
                'status' => false,
                'message' => 'Users Already Registered with that Email',
                'redirect' => '#'
            ]);
        } else if ($request->password != $request->confirmpassword) {
            return response()->json([
                'status' => false,
                'message' => 'Password Does Not Match',
                'redirect' => '#'
            ]);
        } else if (strlen($request->password) < 4) {
            return response()->json([
                'status' => false,
                'message' => 'Password Length Should Be More than 4',
                'redirect' => '#'
            ]);
        }

        $userr['to'] = $request->email;
        $otp = mt_rand(100000, 999999);

        Mail::send('mail', ['otp' => $otp],function($messages) use ($userr){
            $messages->to($userr['to']);
            $messages->subject('Your new OTP');
        });

        session()->put('otp', $otp);
        session()->put('data', [
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => $request->password,
            'confirmpassword' => $request->confirmpassword
        ]);

        return response()->json([
            'status' => true,
            'message' => '400',
            'redirect' => 'checkOtp'
        ]);
    }

    public function checkOtp(Request $request){
        // dd(session('otp'));
        $validOTP = session('otp') == $request->OTPverify;

        if($validOTP) {
            $user = new user_controller();
            $user->userSignup($request);

            return redirect('/');
        } else {
            // If OTP does not match, redirect back with error message
            return redirect()->back()->with([
                'error' => 'Invalid OTP'
            ]);
        }
    }
}
