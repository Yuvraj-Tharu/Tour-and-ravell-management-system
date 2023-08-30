<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('signup/style.css') }}" />
</head>

<body>

    <form class="signup-form main_form" method="POST" action="{{ route('checkEmail') }}">
        @csrf
        {{-- <div class="close-icon">&times;</div> --}}
        <h2>Sign Up</h2>
        <label for="username">FirstName</label>
        <input type="text" id="username" name="fname" pattern="^[A-Z][a-z]*" title="First letter must me Capital"
            required />
        <label for="username">LastName</label>
        <input type="text" id="username" name="lname" pattern="^[A-Z][a-z]*" title="First letter must me Capital"
            required />

        <label for="username">Email</label>
        <input type="text" id="username" name="email" pattern="[a-zA-Z0-9]+@[a-zA-Z]+.com"
            title="Email should contain @ and .com" required />

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />

        <label for="password">Confirm Password</label>
        <input type="password" id="password" name="confirmpassword" required />
        <span style="color:#ffa500" class="error-text">{{ $errors->first('email') }}</span>
        {{-- <span style="color: rgb(232, 38, 38)" class="error-text"></span> --}}

        <!-- <button type="submit">Sign Up</button> -->
        <button type="submit" style="margin-bottom: 20px">Sign Up</button>

        <div class="login-link">
            Already have an account? <a href="/">Login</a>
        </div>
    </form>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>


</html>
