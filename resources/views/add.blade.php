<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Packages</title>
    {{-- <link rel="stylesheet" href="{{ asset('Admin/Add.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/styleOF.css') }}">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 1em;
            margin-left: -187px;
            margin-right: 18px;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1em;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 0.5em;
        }

        th {
            background-color: #eee;
        }

        h1 {
            font-size: 2em;
            color: #333;
            margin-bottom: 0.5em;
        }

        p {
            margin-bottom: 1em;
        }
    </style>


</head>

<body>
    <div class="main">
        <h1 class="align-heading"> Add Packages </h1>
        <div class="Package">
            <button class="btn" id="Btn"><span>
                    <ion-icon name="add-circle-outline"></ion-icon> Add new Package
                </span>
                <div id="modal" class="modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('addPackages') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Packages</h4>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Package Name<input id="packagename" type="text" name="packagename"
                                                    class="form-control" required></label>
                                            <label>Destination<input id="destination" type="text" name="destination"
                                                    class="form-control" required></label>
                                            <label>Pricing<input id="pricing" type="text" name="pricing"
                                                    class="form-control" required></label>
                                            <label>Description<input id="description" type="text" name="description"
                                                    class="form-control" required></label>
                                            <label>Ratings<input id="rating" type="text" name="rating"
                                                    class="form-control" required></label>
                                            <label>Discounts %<input id="discount" type="text" name="discount"
                                                    class="form-control" required></label>
                                            <label for="image-upload">Upload Image:</label>
                                            <input type="file" id="image-upload" name="picture_link"><br><br>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-info" value="Save">
                                        <input type="button" id="cancel-btn" class="btn-cancel" data-dismiss="modal"
                                            value="Cancel">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true"></button>

                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </button>

            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Package Name</td>
                            <td>Destination</td>
                            <td>Pricing</td>
                            <td>Description</td>
                            <td>Ratings</td>
                            <td>Discounts %</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td> {{ $d['package_name'] }} </td>
                                <td> {{ $d['destination'] }} </td>
                                <td> {{ $d['pricing'] }} </td>
                                <td> {{ $d['description'] }} </td>
                                <td> {{ $d['ratings'] }} </td>
                                <td> {{ $d['discount'] }} </td>


                                <td>
                                    <a class="edit edit_btn" href="{{ route('editPackage', ['id' => $d['id']]) }}">
                                        <ion-icon name="cloud-upload-outline"></ion-icon>Edit
                                    </a>
                                    <a class="delete" href="{{ route('deletePackage', ['id' => $d['id']]) }}">
                                        <ion-icon name="trash-outline"></ion-icon>Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("cancel-btn").addEventListener("click", function() {
            window.location.href = document.referrer;
        });
    </script>


    <script src="{{ asset('Admin/Add.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
