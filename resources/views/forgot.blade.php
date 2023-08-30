<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Your Password</title>
    <link rel="stylesheet" href="{{asset('css/forgot.css')}}">
    {{-- <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script> --}}
</head>

<body>
    <div id="container">
        <h2>Email Check</h2>
        <p>It's quick and easy.</p>
        <div id="line"></div>
        <form action="{{route('check')}}" method="POST"   >
            @csrf
            <input type="email" name="email" placeholder="Email"><br>
            <input type="submit" name="forgot_password" value="Check">

            <span style="color:#ffa500": @auth

            @endauth" class="error-text"></span>

        </form>


    </div>
</body>

</html>
