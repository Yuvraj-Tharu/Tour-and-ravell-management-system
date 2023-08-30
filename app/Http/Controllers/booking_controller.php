<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking_user;
use App\Models\package;

class booking_controller extends Controller
{
    public static function showPackages() {
        $package = package::all();

        return $package;
    }

    public static function totalSales() {
        $package = booking_user::all()->count();

        return $package;
    }

    public function showBookingPage($id) {
        if(!session('id')){
            return redirect('/');;
        }

        $package = package::where('id', $id)->first();

        return view('booking', ['info'=>$package]);
    }

    public function destination(Request $request){
        // $validated = $request->validate([
        //     'guest' => ['min:1'] //number chai ota form ko name hai
        // ]);

        $userdb=new booking_user();
        $userdb->destination=$request->destination;
        $userdb->no_guest=$request->guest;
        $userdb->arrival=$request->arrival;
        $userdb->leaving=$request->leaving;
            // dd($userdb);
        $userdb->save();

        return redirect('add-blog-post-form')->with('status', 'Blog Post Form Data Has Been inserted');
    }
}
