<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_account;
use Illuminate\Support\Facades\File;

class user_controller extends Controller
{


    public function uploadPicture(Request $request) {
        $file = $request->file('profile_picture');
        $filename = uniqid(). '.' .File::extension($file->getClientOriginalName());
        $file->move(public_path().'/images/userProfilePicture', $filename);

        $user = user_account::where('id', session('id'))->first();
        $user->img_path = 'images/userProfilePicture/'.$filename;

        $user->save();

        return redirect('profile');
    }




    public function checkEmail($email) {
        $existingUser = user_account::where('email',$email)->first();
        // dd( $existingUser);
        return $existingUser;
    }

    public function userSignup(Request $request){

        $existingUser = user_account::where('email', $request->email)->first();
        if ($existingUser) {
            return response()->json([
                'status' => false,
                'message' => 'Users Already Registered with that Email',
                'redirect' => '#'
            ]);
        };

        $userdb=new user_account();
        $userdb->fname=$request->fname;
        $userdb->lname=$request->lname;
        $userdb->email=$request->email;
        $userdb->password=$request->password;

        $userdb->save();

        return response()->json([
            'status' => true,
            'message' => 'Users Registered Successfully',
            'redirect' => 'verify'
        ]);
    }


    public function explore(){
        if(session('id')){
            return redirect()->route('booking');
        } else {
            return redirect('/');;
        }

    }

    public static function totalUser() {
        $package = user_account::all()->count();

        return $package;
    }
}
