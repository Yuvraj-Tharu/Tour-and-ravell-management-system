<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/payment.css') }}" />
    <title>Esewa</title>

</head>

<body class="antialiased">


    <form action="{{ route('esewa') }}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="1221">
        <input type="hidden" name="name" value="kailaba">
        <input type="hidden" name="email" value="kailaba@kailaba.com">
        <input type="hidden" name="amount" value="99">

        {{-- <input type="submit" value="Pay With Esewa"> --}}


    </form>


    <p>Dear Customer</p>

    <p>Your payment is Sucessful <br>Amount Rs {{ $amount }} withdrawl from your account <br>

        Thank you for booking a package with <b><span style="color: #ffa500">Ghum</span><span>FHIR</span></b> </p>

    <p>Best regards,<br>
        <b> Yuvraj Tharu <br>
            GhumFHIR Admin </b>
    </p>








</body>

</html>
