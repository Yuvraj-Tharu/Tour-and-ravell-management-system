<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking</title>

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}" />
    {{-- <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script> --}}
</head>

<body>
    <h1 class="heading">
        <span>e</span>
        <span>x</span>
        <span>p</span>
        <span>l</span>
        <span>o</span>
        <span>r</span>
        <span>e</span>
    </h1>
    <section class="book" id="blur">
        <div class="row">
            <div class="image">
                <img src="{{ asset($info['picture_link']) }}" alt="" />
            </div>

            <div class="description">
                <h2>{{ $info['destination'] }}</h2>
                <p>{{ $info['description'] }}</p>
            </div>

            <form action="{{ route('esewa') }}" method="POST" name="add-blog-post-form">
                @csrf
                <input type="text" value="{{ $info['destination'] }}" name="destination" hidden>
                <div class="inputBox">
                    <h3>how many</h3>
                    <input type="number" name="guest" placeholder="number of guests" min="1"
                        max="7"onkeydown="return false" />
                </div>
                <div class="inputBox">
                    <h3>arrivals</h3>
                    <input type="date" id="date-input" name="arrival" />
                </div>

                <div class="inputBox">
                    <h3>leaving</h3>
                    <input type="date" id="date-in" name="leaving" />
                </div>

                <input type="text" name="price" value="{{ $info['pricing'] }}" hidden>
                <button type="button" class="btn" style="margin-bottom: 20px" onclick="showMsg()">book now</button>
        </div>
    </section>
    <div class="payment-container" id="container">
        <div>Esewa ID: <input type="text" name="number" id="number"></div>
        <button class="btn btn-primary" type="submit">Pay By Esewa</button>
        <button class="btn btn-primary" type="button" onclick="showMsg()">Close</button>
    </div>
    </form>
</body>

<script>
    const today = new Date().toISOString().split('T')[0];
    document.getElementById("date-input").setAttribute("min", today);
    const nowday = new Date().toISOString().split('T')[0];
    document.getElementById("date-in").setAttribute("min", today);
    // const maxDate = new Date();
    // maxDate.setDate(maxDate.getDate() + 7);
    // const maxDateFormatted = maxDate.toISOString().split('T')[0];

    // const dateInput = document.getElementById("date-in");
    // const dateInputArrival = document.getElementById("date-input");

    // dateInput.setAttribute("min", today);
    // dateInput.setAttribute("max", maxDateFormatted);

    // dateInputArrival.setAttribute("min", today);
    // dateInputArrival.setAttribute("max", maxDateFormatted);

    function showMsg() {
        var blur = document.getElementById('blur');
        blur.classList.toggle('active');

        var container = document.getElementById('container');
        container.classList.toggle('active');
    }
</script>



</html>

<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Booking - Destination Name</title>
    <link rel="stylesheet" href="booking.css" />
  </head>
  <body>
    <div class="destination">
      <img src="images/p-1.jpg" alt="" />
      <div class="description">
        <h3><i class="fas fa-map-marker-alt"></i>Boudhanath Stupa</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo quae
          dolore rem repellat quam, dolor esse laudantium vel quaerat earum
          labore nobis fuga, fugit unde vero quis? Ab, laudantium perspiciatis..
        </p>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
        </div>
        <div class="price">$90.00 <span>$120.00</span></div>
      </div>
      <div class="form">
        <h3>Book Now - Destination Name</h3>
        <form>

          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required />
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required />
          <label for="date">Date:</label>
          <input type="date" id="date" name="date" required />
          <label for="num-people">Number of People:</label>
          <input type="number" id="num-people" name="num-people" required />
          <button type="submit">Book Now</button>
        </form>
      </div>
    </div>
  </body>
</html> -->
