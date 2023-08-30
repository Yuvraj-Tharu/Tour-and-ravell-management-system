@routes
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Project-Ghumfhir</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

    <!-- custom css file link -->

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
</head>

<body>
    <!-- header section starts -->

    <header>
        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="#" class="logo"><span>Ghum</span>Fhir</a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#packages">packages</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
        </nav>

        <div class="icons " id="search-btn">
            {{-- <i class="fas fa-search " ></i> --}}

            @if (!session()->has('userType'))
                <i class="fas fa-user" id="login-btn"></i>
            @endif

            @if (session()->has('userType'))
                @if (session('userType') == 'user')
                    <h1 class="userlogin-Class">User Login</h1>
                @endif
                @if (session('userType') == 'admin')
                    <h1 class="userlogin-Class">Admin Login</h1>
                @endif
                <div class="dropdown">
                    <i class="fas fa-cog" id="setting-btn"></i>
                    <div id="setting-menu" class="dropdown-menu">
                        <!-- <a href="#">Profile </a> -->


                        @if (session('userType') == 'user')
                            <a href="/profile">Profile</a>
                        @endif

                        {{-- <a href="#">Notification </a> --}}

                        @if (session('userType') == 'admin')
                            <a href="{{ route('admindashboard') }}">Admin Dashboard </a>
                        @endif


                        <a onclick="showLogoutConfirmation()">Logout</a>
                    </div>
                </div>
            @endif

            <div id="logout-confirmation" class="dialog-box">
                <p>Are you sure you want to logout?</p>

                <div class="button-container">
                    <a class="btn-confirm" href="/logout">Yes</a>
                    <button class="btn-cancel" onclick="hideLogoutConfirmation()">Cancel</button>
                </div>
            </div>
        </div>


    </header>
    <!-- header section ends -->

    <!-- login form container -->

    <div class="login-form-container">
        <i class="fas fa-times" id="form-close"></i>

        <form action="user" method="POST" class="main_form">
            @csrf
            <h3>login</h3>

            <input type="email" name="email" class="box" placeholder="enter your email" />

            <input type="password" name="password" class="box" placeholder="enter your password" />
            <span style="color: #ffa500" class="error-text"> </span>
            <input type="submit" value="login now" class="btn" />



            <p>forgot password? <a href="{{ route('forgot') }}">click here</a></p>

            <p>don't have an account? <a href="{{ route('signup') }}">Register now</a></p>
        </form>
    </div>

    <!-- login form container ends here -->

    <!-- home section starts here -->

    <section class="home" id="home">
        <div class="content">
            <h3>adventure is worthwhile</h3>
            <p>discover new places with us, adventure awaits</p>
            <a href="#" class="btn">discover more</a>
        </div>

        <div class="controls">
            <span class="vid-btn active" data-src="{{ asset('images/vid-1.mp4') }}"> </span>
            <span class="vid-btn" data-src="{{ asset('images/vid-2.mp4') }}"> </span>
            <span class="vid-btn" data-src="{{ asset('images/vid-3.mp4') }}"> </span>
            <span class="vid-btn" data-src="{{ asset('images/vid-4.mp4') }}"> </span>
            <span class="vid-btn" data-src="{{ asset('images/vid-5.mp4') }}"> </span>
        </div>

        <div class="video-container">
            <video src="{{ asset('images/vid-1.mp4') }}" id="video-slider" loop autoplay muted></video>
        </div>
    </section>




    <section class="packages" id="packages">
        <h1 class="heading">
            <span>p</span>
            <span>a</span>
            <span>c</span>
            <span>k</span>
            <span>a</span>
            <span>g</span>
            <span>e</span>
            <span>s</span>
        </h1>

        @php
            $package = App\Http\Controllers\booking_controller::showPackages();
            $rate = App\Http\Controllers\rating_controller::showRate();
        @endphp

        @foreach ($package as $i)
            <div class="box-container">
                <div class="box">
                    <img src="{{ asset($i['picture_link']) }}" alt="" />
                    <div class="content">
                        <h3><i class="fas fa-map-marker-alt"></i> {{ $i['destination'] }}</h3>
                        <p>{{ $i['description'] }}</p>
                        <div class="stars">
                            @for ($j = 0; $j < $i['ratings']; $j++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </div>
                        @if ($i['discount'] > 0)
                            <div class="price">Discounted Price :
                                Rs.{{ $i['pricing'] - $i['pricing'] * ($i['discount'] / 100) }}
                                <br>
                                Original Price : Rs.<span> {{ $i['pricing'] }} </span>
                            </div>
                        @else
                            <div class="price">Rs.{{ $i['pricing'] }}
                            </div>
                        @endif

                        <a href="{{ route('showBookingPage', ['id' => $i['id']]) }}" class="btn">explore more</a>
                    </div>
                </div>
            </div>
        @endforeach


    </section>



    <!-- packages section ends -->
    <!-- review section starts -->
    <section class="review" id="review">
        <h1 class="heading">
            <span>r</span>
            <span>e</span>
            <span>v</span>
            <span>i</span>
            <span>e</span>
            <span>w</span>
        </h1>

        @foreach ($rate as $r)
            <div class="swiper review-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="box">
                            <img src="{{ asset($r['img_path']) }}" alt="" />
                            <h3>{{ $r['fname'] . ' ' . $r['lname'] }}</h3>
                            <p>
                                {{ $r['message'] }}
                            </p>
                            <div class="stars">
                                @for ($j = 0; $j < $r['rate']; $j++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- <div class="swiper-slide">
                    <div class="box">
                        <img src="images/r-1.jpg" alt="" />
                        <h3>John deo</h3>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Accusantium quos eius deserunt aut quasi magnam possimus, atque
                            asperiores, tempore numquam itaque, repellendus nulla accusamus
                            quaerat voluptates obcaecati vitae quae qui.
                        </p>

                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/r-1.jpg" alt="" />
                        <h3>John deo</h3>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Accusantium quos eius deserunt aut quasi magnam possimus, atque
                            asperiores, tempore numquam itaque, repellendus nulla accusamus
                            quaerat voluptates obcaecati vitae quae qui.
                        </p>

                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/r-1.jpg" alt="" />
                        <h3>John deo</h3>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Accusantium quos eius deserunt aut quasi magnam possimus, atque
                            asperiores, tempore numquam itaque, repellendus nulla accusamus
                            quaerat voluptates obcaecati vitae quae qui.
                        </p>

                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div> --}}
        </div>
        </div>
    </section>

    <!-- review section ends here -->



    {{-- contact section  --}}
    @if (session('userType') != 'admin')
        @if (session('userType') == 'user')
            <section class="contact" id="contact">
                <h1 class="heading">
                    <span>c</span>
                    <span>o</span>
                    <span>n</span>
                    <span>t</span>
                    <span>a</span>
                    <span>c</span>
                    <span>t</span>
                </h1>

                <div class="row">
                    <div class="image">
                        <img src="{{ asset('images/c-1.jpg') }}" alt="" />
                    </div>

                    <form action="{{ route('contact') }}" method="POST">
                        @csrf
                        @error('number')
                            <div class="text-danger">
                                Phone number must be 10 digit...
                            </div>
                        @enderror
                        <div class="inputBox">
                            <input type="text" placeholder="name" name="name"
                                pattern="^[A-Za-z]+(\s[A-Za-z]+)*$" title="First letter must me Capital" />
                            <input type="email" placeholder="email" name="email"
                                pattern="[a-zA-Z0-9]+@[a-zA-Z]+.com" title="Email should contain @ and .com"
                                required />
                        </div>

                        <div class="inputBox">
                            <input id="number-input" type="number" placeholder="number" name="number"
                                pattern="\d{10}" required minlength="10" maxlength="10"
                                title="number must be 10 digits"
                                oninput="javascript: if (this.value.length != this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                maxlength="10" />


                            <span class="error-text" style="color:#ffa500"></span>
                            <input type="text" placeholder="subject" name="subject" />
                        </div>
                        <p id="error-message" style="color: #ffa500; display: none;">Please enter a 10-digit
                            number.
                        </p>

                        <textarea placeholder="message" name="message" cols="30" rows="10"></textarea>

                        <input type="submit" class="btn" value="send message" />
                    </form>
                </div>
            </section>
        @endif
    @endif

    <!-- footer section starts here -->


    <div class="footer">
        <div class="box-container" style="padding-left: 8px">
            <div class="box">
                <h3>about us</h3>
                <p class="align-ment">
                    Welcome to <b class="coo-coo">GhumFHIR</b> We are a team of passionate travel enthusiasts who
                    believe that
                    exploring the world should be accessible to everyone. Our mission is to help our clients create
                    unforgettable travel experiences, one trip at a time.
                </p>
            </div>


            <div class="box">
                <h3>quick links</h3>
                <a href="#">home</a>
                <a id="packages" href="#packages">packages</a>
                <a id="review" href="#review">review</a>
                <a id="contact" href="#contact">contact</a>
            </div>


            @if (session('userType') == 'user')
                <div class="box">
                    <h3>Rate us</h3>
                    <a href="{{ route('rating') }}">Review</a>

                </div>
            @endif

            <div class="box">
                <h3>Term and Condition</h3>
                <a href="{{ route('Terms-and-condition') }}">Term and condition</a>

            </div>

        </div>
    </div>

    <script>
        const numberInput = document.getElementById('number-input');
        const errorMessage = document.getElementById('error-message');

        numberInput.addEventListener('input', function() {
            const value = numberInput.value.trim();
            if (value.length !== 10) {
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
        });
    </script>

    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
