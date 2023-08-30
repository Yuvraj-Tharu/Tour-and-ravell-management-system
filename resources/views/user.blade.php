<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('Admin/User.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/styleOF.css') }}">
    <title>Add User</title>
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
        <h1 class="align-heading"> Add User </h1>
        <div class="User">
            <button class="btn" id="Btn"><span>
                    <ion-icon name="add-circle-outline"></ion-icon> Add new User
                </span>
                <div id="modal" class="modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('addUser') }}">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Add User</h4>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>First Name<input type="text" name="fname" class="form-control"
                                                    required></label>
                                            <label>Last Name<input type="text" name="lname" class="form-control"
                                                    required></label>
                                            <label>Contact Number<input type="text" name="Contact_Number"
                                                    class="form-control" required></label>
                                            <label>Address<input type="text" name="address" class="form-control"
                                                    required></label>
                                            <label>Email<input type="text" name="email" class="form-control"
                                                    required></label>
                                            <label>Password<input type="text" name="password" class="form-control"
                                                    required></label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-info" value="Save">
                                        <input type="button" id="cancelBtn" class="btn-cancel" data-dismiss="modal"
                                            value="Cancel">
                                    </div>
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
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Contact Number</td>
                            <td>Address</td>
                            <td>Email</td>
                            <td>Password</td>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($data as $i)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $i['fname'] }}</td>
                                <td>{{ $i['lname'] }}</td>
                                <td>{{ $i['Contact_Number'] }}</td>
                                <td>{{ $i['address'] }}</td>
                                <td>{{ $i['email'] }}</td>

                                <td>
                                    <a class="edit edit_btn" href="{{ route('editUser', ['id' => $i['id']]) }}">
                                        <ion-icon name="cloud-upload-outline"></ion-icon>Edit
                                    </a>
                                    <a class="delete" href="{{ route('deleteCustomer', ['id' => $i['id']]) }}">
                                        <ion-icon name="trash-outline"></ion-icon>Delete
                                    </a>
                                    {{-- <div class="Cancel" id="cancel" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Are you sure you want to delete?</h4>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-info" value="Yes" id="yes">
                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="No" id="no">
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("cancelBtn").addEventListener("click", function() {
            window.history.back();
        });
    </script>


    <script src="{{ asset('Admin/Add.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
