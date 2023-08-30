<!DOCTYPE html>
<html>

<head>
    <title>PDF of Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <h1>{{ $title }} <span style="color:#ffa500">GhumFHIR</h1>
    <p>{{ $date }}</p>
    <p style="color: #ffa500">Payment Details</p>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Amount</th>
            <th>Esewa Status</th>
            <th>Created At</th>

        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->amount }}</td>
                <td>{{ $user->esewa_status }}</td>
                <td>{{ $user->created_at }}</td>

            </tr>
        @endforeach
    </table>
</body>

</html>
