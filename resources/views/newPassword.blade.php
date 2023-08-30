<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Password</title>
        <link rel="stylesheet" href="{{asset('css/forgot.css')}}">
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </head>
    <body>
        <div id="container">
            <h2>Password</h2>
            <p>It's quick and easy.</p>
            <div id="line"></div>
            <form action="resetpass" method="POST" class="main_form">
                @csrf
                <input type="password" name="newPassword" placeholder="newPassword" required><br>
                <input type="password" name="confirmPassword" placeholder="ConfirmPassword" required><br>
                <button class="btn0-color" type="submit">Save</button>
            </form>
        </div>
    </body>
</html>
