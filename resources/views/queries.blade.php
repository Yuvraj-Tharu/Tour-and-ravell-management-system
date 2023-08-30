<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Style the card header */
        .cardHeader {
            background-color: #ffa500;
            color: #fff;
            padding: 20px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            margin-bottom: 30px;
            margin-left: 3px;
            margin-right: 1px;

        }

        .cardHeader h2 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        /* Style the table */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        thead tr {
            background-color: #ffa500;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Style the table cells */
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        td:first-child {
            font-weight: bold;
        }

        .card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 100px;
            margin-bottom: 20px;
            margin-top: 69px;
            margin-left: 104px;
            margin-right: 100px;

        }

        .card-header {
            font-weight: bold;
            margin-bottom: 10px;

        }

        .card-body {
            line-height: 1.5;
        }

        .card-footer {
            margin-top: 10px;
            font-size: 14px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            background-color: #ffa500;
            color: #fff;
            border: none;
        }

        .btn:hover {
            background-color: #ff7f00;
        }

        .btn:active {
            background-color: #ff6600;
        }

        .btn-secondary {
            background-color: #ddd;
            color: #333;
        }

        .btn-secondary:hover {
            background-color: #ccc;
        }

        .btn-secondary:active {
            background-color: #bbb;
        }
    </style>

</head>

<body>
    <div class="card">
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>User Messages</h2>

                </div>



                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>

                            <td>Number</td>
                            <td>Subject</td>
                            <td>Message</td>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $user = App\Http\Controllers\contactController::feedBack();
                            
                        @endphp
                        @foreach ($user as $i)
                            <tr>
                                <td>{{ $i['name'] }}</td>
                                <td>{{ $i['email'] }}</td>
                                <td>{{ $i['number'] }}</td>
                                <td>{{ $i['subject'] }}</td>
                                <td>{{ $i['message'] }}</td>


                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>

    </div>

</body>

</html>
