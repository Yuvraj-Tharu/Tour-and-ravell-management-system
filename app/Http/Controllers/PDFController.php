<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking_user;
use App\Models\user_account;
use App\Models\Order;
use PDF;

class PDFController extends Controller
{
    //
    public function generatePDF()
    {
        // $users = booking_user::get();
        $payment = Order::orderBy('id', 'desc')->first();
        $users = booking_user::orderBy('id', 'desc')->first();


        $data = [
            'title' => 'Welcome to ',
            'date' => date('m/d/Y'),
            'name' => $payment->name,
            'users' => $users,
            'amount' => $payment->amount
        ];



        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('UserBooking.pdf');
    }
}
