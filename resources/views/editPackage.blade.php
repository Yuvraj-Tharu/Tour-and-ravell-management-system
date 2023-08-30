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
    <div class="main-container ">
        <form action="{{ route('updatePackage', ['id' => $data['id']]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Package Name</label>
            <input id="packagename" type="text" name="packagename" class="form-control"
                value="{{ $data['package_name'] }}" required>

            <label>Destination</label>
            <input id="destination" type="text" name="destination" class="form-control"
                value="{{ $data['destination'] }}" required>

            <label>Pricing</label>
            <input id="pricing" type="text" name="pricing" class="form-control" value="{{ $data['pricing'] }}"
                required>

            <label>Description</label>
            <input id="description" type="text" name="description" class="form-control"
                value="{{ $data['package_name'] }}" required>

            <label>Ratings</label>
            <input id="rating" type="text" name="rating" class="form-control" value="{{ $data['ratings'] }}"
                required>

            <label>Discounts %</label>
            <input id="discount" type="text" name="discount" class="form-control" value="{{ $data['discount'] }}"
                required>

            <label for="image-upload">Upload Image:</label>
            <input type="file" id="image-upload" name="picture_link" value="{{ $data['picture_link'] }}">

            <button type="submit">Update</button>
        </form>
    </div>
</body>

</html>
