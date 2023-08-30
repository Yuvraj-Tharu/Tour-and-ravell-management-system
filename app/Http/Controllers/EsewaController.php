<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Order;
use App\Models\user_account;
use App\Models\booking_user;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Session;
use Mail;

// init composer autoloader.
require '../vendor/autoload.php';

use Cixware\Esewa\Client;
use Cixware\Esewa\Config;

class EsewaController extends Controller
{

    //
    public function esewaPay(Request $request) {

        if(session('userType') == 'admin') {
            $msg = 'Can not book';
            $msg1 = 'You are login with Admin account';

            return view('redirect', compact('msg', 'msg1'));
        }

        $pid = uniqid();
        $amount = $request->price;

        $user = user_account::where('id', session('id'))->first();

        Order::insert([
            'user_id' => $user->id,
            'name' => $user->fname." ".$user->lname,
            'email' => $user->email,
            'product_id' => $pid,
            'amount' => $amount,
            'esewa_status' => 'unverified',
            'created_at' => Carbon::now(),
        ]);



        // set success and failure callback urls
        $successUrl = url("/success");
        $failureUrl = url('/failure');

        // config for development
        $config = new Config($successUrl, $failureUrl);

        session()->put("temp_data", [
            "destination"=>$request->destination,
            "no_guest"=>$request->guest,
            "arrival"=>$request->arrival,
            "leaving"=>$request->leaving
        ]);

        // initialize eSewa client
        $esewa = new Client($config);

        $esewa->process($pid, $amount, 0, 0, 0);
    }


    public function esewaPaySuccess(){
        //do when pay success.
        $pid = $_GET['oid'];
        $refId = $_GET['refId'];
        $amount = $_GET['amt'];

        $order = Order::where('product_id', $pid)->first();

        $update_status = Order::find($order->id)->update([
            'esewa_status' => 'verified',
            'updated_at' => Carbon::now(),
        ]);

        if ($update_status) {
            $msg = 'Success';
            $msg1 = 'Payment success. Thank you for booking trip with us.';

            $user = user_account::where('id', session('id'))->first();

            session()->put('email', $user->email);
            $userr['to'] = $email = session()->get('email');

            Mail::send('esewaPayment', ['amount' => $amount], function($messages) use ($userr){
                $messages->to($userr['to']);
                $messages->subject('Booking Confirmation');
            });

            $book = new booking_user();

            $book->guest_id = session('id');
            $book->destination = session('temp_data')['destination'];
            $book->no_guest = session('temp_data')['no_guest'];
            $book->arrival = session('temp_data')['arrival'];
            $book->leaving = session('temp_data')['leaving'];

            $book->save();

            session()->forget('temp_data');

            return view('thankyou', compact('msg', 'msg1'));
        }
    }

    public function esewaPayFailed()
    {
        //do when payment fails.
        $pid = $_GET['pid'];
        $order = Order::where('product_id', $pid)->first();
        //dd($order);
        $update_status = Order::find($order->id)->update([
            'esewa_status' => 'failed',
            'updated_at' => Carbon::now(),
        ]);
        if ($update_status) {
            //send mail,....
            //
            $msg = 'Failed';
            $msg1 = 'Payment is failed. Contact admin for support.';

            session()->forget('temp_data');

            return view('thankyou', compact('msg', 'msg1'));
        }
    }
}
