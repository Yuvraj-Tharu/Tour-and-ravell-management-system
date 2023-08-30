<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use PDF;

class PDFPayment extends Controller
{
    //
    public function PaymentPDF()
    {
        $users = Order::get();

        $data = [
            'title' => 'Welcome to ',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        $pdf = PDF::loadView('PdfPayment', $data);

        return $pdf->download('Payment.pdf');
    }
}
