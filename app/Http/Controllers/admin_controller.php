<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin_user;
use App\Models\package;
use App\Models\booking_user;
use App\Models\Order;
use Illuminate\Support\Facades\File;
class admin_controller extends Controller
{
    public function redirectToHomepage(){

        return redirect('/');
    }

    public static function totalPackage() {
        $package = package::all()->count();

        return $package;
    }

    public function viewPackages() {
        $package = package::all();

        return view('add', ['data' => $package]);
    }

    public function addPackages(Request $request){
        $file = $request->file('picture_link');
        $filename = uniqid(). '.' .File::extension($file->getClientOriginalName());
        $file->move(public_path().'/images/userProfilePicture', $filename);


        $userdb=new package();

        $userdb->package_name=$request->packagename;
        $userdb->destination=$request->destination;
        $userdb->pricing=$request->pricing;
        $userdb->description=$request->description;
        $userdb->ratings=$request->rating;
        $userdb->discount=$request->discount;
        $userdb->picture_link = 'images/userProfilePicture/'.$filename;

        $userdb->save();

        return redirect('admindashboard');
    }


    public function editPackage($id){
        $package = package::where('id', $id)->first();

        return view('editPackage', ['data' => $package]);
    }

    public function updatePackage(Request $request, $id){
        $package = package::where('id', $id)->first();

        $file = $request->file('picture_link');
        if ($file != null) {
            $filename = uniqid(). '.' .File::extension($file->getClientOriginalName());
            $file->move(public_path().'/images/userProfilePicture', $filename);
            $package->picture_link = 'images/userProfilePicture/'.$filename;
        }

        $package->package_name = $request->packagename;
        $package->destination = $request->destination;
        $package->pricing = $request->pricing;
        $package->description = $request->description;
        $package->ratings = $request->rating;
        $package->discount = $request->discount;

        $package->save();

        return redirect('viewPackage');
    }

    public function deletePackage($id) {
        $package = package::where('id', $id)->delete();

        return redirect('viewPackage');
    }

    public static function recentBooking(){
        $package = booking_user::all();

        return $package;
    }










}

