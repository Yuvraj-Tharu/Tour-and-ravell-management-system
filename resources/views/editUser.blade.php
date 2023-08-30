<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/editpackage.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</head>


<body>
    <div class="main-container">
        <form action="{{ route('updateUser', ['id' => $data['id']]) }}" method="POST">
            @csrf
            <label>First name</label>
            <input id="fname" type="text" name="fname" class="form-control" value="{{ $data['fname'] }}"
                required>

            <label>Last name</label>
            <input id="lname" type="text" name="lname" class="form-control" value="{{ $data['lname'] }}"
                required>

            <label>Contact Number</label>
            <input id="Contact_Number" type="text" name="Contact_Number" class="form-control"
                value="{{ $data['Contact_Number'] }}" required>

            <label>Address</label>
            <input id="address" type="text" name="address" class="form-control" value="{{ $data['address'] }}"
                required>

            <label>Email</label>
            <input id="email" type="text" name="email" class="form-control" value="{{ $data['email'] }}"
                required>

            <label>Password</label>
            <input id="password" type="text" name="password" class="form-control" value="{{ $data['password'] }}"
                required>

            {{-- <label for="image-upload">Upload Image:</label>
            <input type="file" id="image-upload" name="picture_link" value="{{ $data['picture_link'] }}"> --}}

            <button type="submit">Update</button>
        </form>
    </div>
</body>

</html>
