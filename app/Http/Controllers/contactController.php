<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
class contactController extends Controller
{
    public function contact(Request $request){

        // $validated = $request->validate([
        //     'number'=>['max:10', 'min:10'] //number chai ota form ko name hai
        // ]);

        $userdb=new contact();
        $userdb->name=$request->name;
        $userdb->email=$request->email;
        $userdb->number=$request->number;
        $userdb->subject=$request->subject;
        $userdb->message=$request->message;
        $userdb->save();
        // dd($userdb);
        return redirect('/');
    }



    public static function feedBack(){
        $user =contact::all();

        return $user;
    }

}
