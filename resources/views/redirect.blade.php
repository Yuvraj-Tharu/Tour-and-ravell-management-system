<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>payment {{ $msg }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/payment.css') }}" />
</head>

<body>

    <div class="payment-success">
        <div class="container">
            <div class="head">
                <h1>{{ $msg }} <br>
            </div>

            </h1>
            <p>{{ $msg1 }}</p>
            <a class="button" href="{{ url('/') }}">Go to Home</a>

        </div>
    </div>
</body>

</html>
