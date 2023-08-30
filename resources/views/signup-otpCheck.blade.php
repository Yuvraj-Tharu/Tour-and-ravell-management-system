<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification Form</title>
    <link rel="stylesheet" href="{{asset('css/otp.css')}}">
</head>
<body>
    <div id="container">
        <h2>Enter OTP</h2>
        <p>It's quick and easy.</p>
        <div id="line"></div>
        <form action="{{ route('otpCheck') }}" method="POST">
            @csrf

            <input name="fname" value="{{ session('data.fname') }}" hidden />
            <input name="lname" value="{{ session('data.lname') }}" hidden />
            <input name="email" value="{{ session('data.email') }}" hidden />
            <input value="{{ session('data.password') }}" name="password" hidden />
            <input value="{{ session('data.confirmpassword') }}" name="confirmpassword" hidden />

            <input type="number" name="OTPverify" placeholder="Verification Code" required><br>
            <input type="submit" name="verifyEmail" value="Verify">

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

        </form>
    </div>
</body>
</html>
