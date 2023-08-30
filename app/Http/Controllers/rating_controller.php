<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rating;
use Illuminate\Support\Facades\DB;

class rating_controller extends Controller
{
    public static function showrate() {
        $rate = DB::table('rating')
                    ->join('user_accounts', 'rating.id', '=', 'user_accounts.id')
                    ->select('user_accounts.*', 'rating.*')->get();

        return json_decode($rate, true);


    }

    public function rating(Request $request){
        $userdb = new rating();

        $userdb->id = session('id');
        $userdb->rate = $request->rate;
        $userdb->message = $request->message;

        $userdb->save();

        return redirect('/');
    }

}
