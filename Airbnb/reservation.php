<?php
    include_once 'admin/include/class.user.php'; 
    $user = new User(); 

    $rooms = [];
    $formSubmitted = false;

    if (isset($_REQUEST['submit'])) { 
        extract($_REQUEST); 
        $result = $user->check_available($checkin, $checkout);

        if ($result && mysqli_num_rows($result) > 0) {
            $formSubmitted = true;

            while ($row = mysqli_fetch_array($result)) {
                $room_cat = $row['room_cat'];
                $sql = "SELECT * FROM room_category WHERE roomname='$room_cat'";
                $query = mysqli_query($user->db, $sql);

                if ($query) {
                    $row2 = mysqli_fetch_array($query);
                    $rooms[] = $row2;
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Booking</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* General Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            background: url('https://images.unsplash.com/photo-1439130490301-25e322d88054?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            height: 100%;
            width: 100%;
            font-family: 'Poppins', sans-serif;
            color: #484848;
            background-size: cover;
            padding-top: 90px;
            /* Offset for fixed navbar */
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar-custom {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #FF385C;
            /* Airbnb coral-pink */
            padding: 15px 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease-in-out;
        }

        .navbar-logo {
            height: 50px;
            margin-left: 20px;
            border-radius: 8px;
        }

        .navbar-nav {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar-nav li {
            margin: 0 15px;
        }

        .navbar-nav li a {
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            padding: 10px 15px;
            display: block;
        }

        .navbar-nav li a:hover {
            color: #FF385C;
            background: #fff;
            border-radius: 5px;
        }

        .navbar-nav a:hover,
        .navbar-nav .active a {
            color: white;
            border-bottom: 2px solid white;
        }

        .navbar-icons {
            margin-right: 20px;
            display: flex;
        }

        .navbar-icons a img {
            width: 35px;
            height: 35px;
            transition: 0.3s;
            margin: 0 5px;
        }

        .navbar-icons a img:hover {
            transform: scale(1.2);
        }

        /* Form Container */
        .container {
            max-width: 800px;
            max-height: 300px;
            margin: 40px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .hidden {
            display: none;

        }


        .form-group {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            /* gap: 15px; */
        }

        label {
            font-weight: 600;
            color: #FF385C;
        }

        input {
            margin-bottom: 20px;
        }

        input.datepicker {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: 0.3s;
        }

        input.datepicker:focus {
            border-color: #FF385C;
            box-shadow: 0 0 8px #FF385C;
        }

        .center {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .btn {
            display: inline-block;
            margin-top: 10px;
            background: #FF385C;
            /* Coral pink button */
            color: #fff;
            font-weight: 600;
            padding: 15px 30px;
            border-radius: 8px;
            transition: 0.3s;
            text-decoration: none;
            font-size: 18px;
            width: 80%;
            border: none;
            cursor: pointer;
            box-shadow: 0 8px 18px rgba(255, 56, 92, 0.5);
        }

        .btn:hover {
            background: #fff;
            color: #FF385C;
            text-decoration: none;
            box-shadow: 0 0 20px #FF385C;
        }

        /* Room Container */
        .room-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin: 140px auto 40px;
            /* Added margin-top to prevent hiding behind navbar */
            max-width: 1200px;
            transition: margin 0.5s;
        }

        .room-card {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 16px;
            padding: 40px;
            width: calc(33% - 20px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            text-align: center;
            cursor: pointer;
        }

        .room-card:hover {
            box-shadow: 0 12px 36px rgba(0, 0, 0, 0.15);
            transform: translateY(-10px);
        }

        .room-card h4 {
            font-size: 22px;
            color: #FF385C;
        }

        .room-card h6 {
            font-size: 16px;
        }

        .book-now-btn {
            background: #FF385C;
            color: white;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 8px;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .book-now-btn:hover {
            background: #fff;
            color: #FF385C;
            text-decoration: none;
            box-shadow: 0 0 20px #FF385C;
        }


        @media (max-width: 1024px) {
            .room-card {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 768px) {
            .room-card {
                width: calc(100% - 20px);
            }
        }
    </style>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar-custom">
        <a href="index.php">
            <img src="images/airbnb_logo.png" class="navbar-logo" alt="Logo">
        </a>

        <ul class="navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="room.php">Room &amp; Facilities</a></li>
            <li class="active"><a href="reservation.php">Online Reservation</a></li>
            <li><a href="admin.php">Admin</a></li>
        </ul>

        <div class="navbar-icons">
            <a href="https://www.instagram.com/airbnb/">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAg5JREFUSEvFlU+IjlEUxn+PP0lKJCkLGyQx/jRjaawsaRZDKTaWJoqFLKRkYaFEjZXtaFhMYiUbyUZsxiQpzWLKymzUUGJmHvfo/b7u3Hnf+r70NWf1vvec8zz3/L2ix6Ie47MyBLZ3AleAo8B+aLyIgY/AG+CepC9lRpZFYPtCGANru0zfH2BE0sPcbwmB7X7gHbCqS/CW+TwwIOlD66AkeAoMdQH+DegDTgGjld+EpOEmghlgRw3BV+A28AnYAuwBrgEzkvpsDwDvK79pSbuaCH4AGwqCl6mQw5LmbG8NnaRZ2/uAF8DPVLNNwLbKb07SxmUEtiPvCwX4LLAbCLCzwDEgOuc1MAasrjood5uX1G6Qdg1sx+HvguCOpKvp5g+A6K5cRiVdtP0cOJEpFiStqYsgDqPVcjkPPKtuHPOQy5Skg7ZvpKzdzBSLkiKyf5JHEN+LBcgI8Dil5hVwoNBNSjps+3pK1a1cJ6mNW7Zp5DeXMUnnbN8HLhW6mNzLtiPCk5muvgZhYLskiIgOAeuBM8BgBRRFHk+tu66myL8khf3SFFUEdW0aszEkaTKPwHbsqUjf9iKy75I2NxHEsmoPSV64NLETxaAdL4Bbv58l7W0ieJJATjc4dnr8SFLMTG2KjgBv/3PZ9UuaqiWo6tC7dd1iLR6c2JZNkj84d1NLT5eGK/NkdlrNTux6HsFfblmsGZDoHZYAAAAASUVORK5CYII=" alt="Instagram logo"/>
            </a>
            <a href="https://www.facebook.com/airbnb/">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPtJREFUSEvtlT1OgkEURc/tbHAFlMaKioLSYCFswB1gSaByA65AYq17sFUSbE2ooDIkVCRswMTyGsh85AOJIc6MsXD6d8/7mfueyPyUWZ/fBdgeAc3Iql4knRcaWxXYdqT4OlzSRjcGsEpmDixCUnWgkgowAS4lzYqKbb8CjRSAd+BU0rLczpSAZ0mtlbjtM+AmdYseJHUC4Bbo736M2CGXAXdANxXgGhgDS0lvoYIToBoAj8BxzJDbkp72+cT2EfCxMdcPffAdoAZMYwFFfLYZ/APWzjxkm/7tGRxycO4lXQWjDYDejjeGki72HpwUx+bL2sghWtbMfvQ/AXhNnBlwviRnAAAAAElFTkSuQmCC" alt="Facebook logo"/>
            </a>
            <a href="https://x.com/Airbnb?">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAbNJREFUSEvd1c2LjXEUB/DPF0WNrFgo8lKSQpIVS1KkvKSJpixYSPZE5A9gY0E2mpSNzSyUsrCRbEQRCysTJUpWUt7q5/7qXl137n1m7tRs5uye55zz/T7ne16emGPLHOObZwSllJEk35tkK6UswxUcwDr8xg1cxEocrM9JSsX5J1EpZSHeYDTJ60EkpZRH2N3H/wGrcTzJvY6/m2AtJvEFh5M87QUppWzHi4YKn+Mx7iZ52VvBEnzDojbAbVxO8qkDWEoZq8kNBFXes0nuTKmgviil1K/e2QPwBPfxDNtwvYFgPMnJbn+3REuxEQ+xfJb7cTXJuUEEq/AeX1tTsGKWBFWem4MIFuAd1swSvKZtSvK2L0G7B0daQXXEOo0ehmsyyfrehCmnopQyikvYMgw6ziS5NROC/XgwJHhdsg1Jfk1L0JaqzvGJGZL8wa4kdYynWN9rWkqpDd+MCzjWQFTvzakk44Ni+vVgBDtwHvsawH9gLMlEU6Xdi7YH17C1+wgOSK7LeLq1tVX7RvuvgvYpPopD2IvFLZl+4jM+ol7SiSSvpgPu+OfZH22mZQ8TN+cS/QWHhHkZrTvZMgAAAABJRU5ErkJggg==" alt="Twitter logo">
            </a>
        </div>
    </nav>

    <!-- Form -->
    <div class="container <?= $formSubmitted ? 'hidden' : '' ?>">
        <form action="" method="post">
            <div class="form-group">
                <label>Check In:</label>
                <input class="datepicker" type="date" name="checkin" required>
                <label>Check Out:</label>
                <input class="datepicker" type="date" name="checkout" required>
            </div>
            <div class="center">
                <button type="submit" name="submit" class="btn">Check Availability</button>
            </div>
        </form>
    </div>

    <!-- Room Results -->
    <div class="room-container">
        <?php foreach ($rooms as $room): ?>
        <div class="room-card">
            <h4>
                <?= $room['roomname'] ?>
            </h4>
            <h6>Facilities:
                <?= $room['facility'] ?>
            </h6>
            <a href="./booknow.php?roomname=" class="book-now-btn">Book Now</a>
        </div>
        <?php endforeach; ?>
    </div>

</body>

</html>