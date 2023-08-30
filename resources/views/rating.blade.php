<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/rating.css') }}" />
</head>

<body>
    <section class="contact">

        <h1 style="color: #ffa500" class="heading">Leave us a message</h1>

        <div class="row">
            <div class="image">
                <img src="{{ asset('images/review.jpg') }}" alt="" />
            </div>

            <form action="{{ route('rating') }}" method="POST">
                @csrf
                {{-- <div class="inputBox">
                    <input type="text" placeholder="First name" name="fname" />
                    <input type="text" placeholder="Last name" name="lname" />
                </div> --}}

                <div class="inputBox">
                    <input type="number" placeholder="Give us rating" name="rate" min="1" max="5"
                        onkeydown="return false" />
                </div>

                <textarea placeholder="Leave a message" name="message" cols="30" rows="10"></textarea>

                <input type="submit" class="btn" value="send message" />
            </form>
        </div>
    </section>
</body>

</html>
