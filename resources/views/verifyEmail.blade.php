<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification Form</title>
    <link rel="stylesheet" href="{{asset('css/otp.css')}}">
    <script src="{{asset('js/main.js')}}"></script>
</head>
<body>
    <div id="container">
        <h2>Enter OTP</h2>
        <p>It's quick and easy.</p>
        <div id="line"></div>
        <form action="{{ route('verify') }}" method="POST" class="main_form">
            @csrf
            <input type="number" name="OTPverify" placeholder="Verification Code" required><br>
            <input type="submit" name="verifyEmail" value="Verify">

            @if(session('error'))
                <div style="color: #ffa500" class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

        </form>
    </div>
</body>
</html>
