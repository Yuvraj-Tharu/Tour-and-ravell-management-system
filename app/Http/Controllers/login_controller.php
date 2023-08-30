<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin_user;
use App\Models\user_account;

class login_controller extends Controller
{
    public function userlogin(Request $request)
    {
        $admin = admin_user::where('email', $request->email)->where('password', $request->password)->first();
        $user = user_account::where('email', $request->email)->where('password', $request->password)->first();
        // $User_detail = user_account::where('fname', $request->fname)->first();


        if($user){
            session()->put('id', $user->id);
            session()->put('userType','user');

            return response()->json([
                'status' => true,
                'message' => 'login',
                'redirect' => '/'
            ]);
        } elseif($admin) {
            session()->put('id', $admin->id);
            session()->put('userType','admin');

            return response()->json([
                'status' => true,
                'message' => 'login',
                'redirect' => '/'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'wrong password or email!!',
                'redirect' => 'null'
            ]);
        }
    }


    public function userlogout(){
        session()->forget('id');
        session()->forget('userType');
        session()->flush();
        return redirect('/');
    }

}
