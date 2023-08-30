@php
    $user = App\Http\Controllers\customer::adminPannel();
    $recentBooking = App\Http\Controllers\admin_controller::recentBooking();
    $totalSales = App\Http\Controllers\booking_controller::totalSales();
    $totalPackage = App\Http\Controllers\admin_controller::totalPackage();
    $totalUser = App\Http\Controllers\user_controller::totalUser();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('Admin/Admin.css') }}">
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="User">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Admin</span>
                    </a>
                    <a href="#">
                        <span class="Online">
                            <ion-icon name="ellipse"></ion-icon>
                        </span>
                        <span class="title">Online</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-microsoft"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="copy"></ion-icon>
                        </span>
                        <span class="title">Category</span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('viewPackage') }}">
                        <span class='icon'>
                            <ion-icon name="cube"></ion-icon>
                        </span>
                        <span class="title">Packages</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user') }}">
                        <span class='icon'>
                            <ion-icon name="person-add"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('queries') }}">
                        <span class='icon'>
                            <ion-icon name="people"></ion-icon>
                        </span>
                        <span class="title">User Contact</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('home') }}">
                        <span class='icon'>
                            <ion-icon name="business"></ion-icon>
                        </span>
                        <span class="title">Home Page</span>
                    </a>
                </li>




                {{-- <li>
                    <a href="#}">
                        <span class='icon'>
                            <ion-icon name="business"></ion-icon>
                        </span>
                        <span class="title">Hotels</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class='icon'>
                            <ion-icon name="bag-check"></ion-icon>
                        </span>
                        <span class="title">Sold Packages</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class='icon'>
                            <ion-icon name="person-add"></ion-icon>
                        </span>
                        <span class="title">System Users</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>

    <div class="main">
        <div class="topbar">
            {{-- <div class="toggle"> --}}
            {{-- <span class="menu-outline"> --}}
            {{-- <ion-icon name="menu-outline"></ion-icon> --}}
            {{-- </span> --}}
            {{-- </div> --}}

            {{-- <div class="search">
                <label>
                    <ion-icon name="search-outline"></ion-icon>
                    <input type="text" placeholder="Search...">
                </label>
            </div> --}}
            {{-- <div class="notification">
                <ion-icon name="notifications-outline"></ion-icon>
                <span class="badge">5</span>
            </div> --}}
            {{-- <div class="message">
                <ion-icon name="mail-unread-outline"></ion-icon>
                <span class="badge">8</span>
            </div> --}}

            {{-- <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjR8fHBlcnNvbnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                alt=""> --}}
            <div class="wrap" id="subMenu">
                <div class="menu">
                    <div class="info">
                        <a href="#" class="link" onclick="goToProfileSettings()">
                            <ion-icon name="person-circle-outline" class="name">

                            </ion-icon>
                            <p>Profile</p>
                            <span>></span>
                        </a>

                        <a href="#" class="link">
                            <ion-icon name="settings-outline" class="name">

                            </ion-icon>
                            <p>Settings</p>
                            <span>></span>
                        </a>

                        <a href="#" class="link" onclick="showLogoutConfirmation()">
                            <ion-icon name="exit-outline" class="name">

                            </ion-icon>
                            <p>Logout</p>
                            <span>></span>
                        </a>
                    </div>
                </div>
                <div id="logout-confirmation" class="dialog-box">
                    <p>Are you sure you want to logout?</p>

                    <div class="button-container">
                        <button class="btn-confirm" onclick="logout()">Yes</button>
                        <button class="btn-cancel" onclick="hideLogoutConfirmation()">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="cardName">Total packages</div>
                        <div class="numbers" style="text-align: center">{{ $totalPackage }}</div>
                    </div>
                    <div class="iconBox">
                        {{-- <ion-icon name="eye-outline"></ion-icon> --}}
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="cardName">Total Sales</div>
                        <div class="numbers" style="text-align: center">{{ $totalSales }}</div>
                    </div>
                    <div class="iconBox">
                        {{-- <ion-icon name="bar-chart-outline"></ion-icon> --}}
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="cardName">Total Users</div>
                        <div class="numbers" style="text-align: center">{{ $totalUser }}</div>
                    </div>
                    <div class="iconBox">
                        {{-- <ion-icon name="chatbubble-ellipses-outline"></ion-icon> --}}
                    </div>
                </div>

                {{-- <div class="card">
                    <div>

                    </div>
                </div> --}}
                <div class="iconBox">
                    {{-- <ion-icon name="logo-bitcoin"></ion-icon> --}}
                </div>
            </div>

        </div>
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <a href="{{ route('Payment-pdf') }}">

                        <p class="cardName">Download Payment PDF</p>
                    </a>
                    <h2>Recent Bookings</h2>
                    {{-- <a href="#" class="btn">View All</a> --}}
                </div>



                <table>
                    <thead>
                        <tr>
                            <td>Destination</td>
                            <td>Number of guest</td>

                            <td>Arrival</td>
                            <td>leaving</td>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentBooking as $i)
                            <tr>
                                <td>{{ $i['destination'] }}</td>
                                <td>{{ $i['no_guest'] }}</td>
                                <td>{{ $i['arrival'] }}</td>
                                <td>{{ $i['leaving'] }}</td>

                                {{-- <td>Paid</td> --}}
                                {{-- <td><span class="status received">Payment Successful</span></td> --}}
                            </tr>
                        @endforeach


                        {{-- <tr>
                                <td>Room Booking</td>
                                <td>$50</td>
                                <td>Verifying</td>
                                <td><span class="status pending">Booked</span></td>
                            </tr>

                            <tr>
                                <td>Gosaikunda Hike</td>
                                <td>$30</td>
                                <td>Cancelled</td>
                                <td><span class="status cancelled">Refund</span></td>
                            </tr>

                            <tr>
                                <td>Pokhara Tour</td>
                                <td>$40</td>
                                <td>Cancelled</td>
                                <td><span class="status cancelled">Refund</span></td>
                            </tr>

                            <tr>
                                <td>Manakamana Package</td>
                                <td>$90</td>
                                <td>Due</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr> --}}
                    </tbody>
                </table>
            </div>

        </div>

        <div class="details">

            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Customers</h2>
                </div>

                @foreach ($user as $i)
                    <table>
                        <tr>

                            <td width="60px">
                                <div class="imgBox"><img src="{{ asset($i['img_path']) }}" alt="">
                                </div>
                            </td>
                            <td>
                                <h4>{{ $i['fname'] . ' ' . $i['lname'] }} <br><span>{{ $i['address'] }}</span>
                                </h4>
                            </td>
                        </tr>
                    </table>
                @endforeach
            </div>

        </div>
    </div>
    </div>

    <script src="{{ asset('Admin/Admin.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
