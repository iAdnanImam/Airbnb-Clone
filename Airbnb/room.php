<?php
    include_once 'admin/include/class.user.php'; 
    $user = new User();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Booking</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        /* General Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background: #FFFCF8;
            /* Airbnb's light background */
            color: #484848;
            margin: 0;
            padding-top: 80px;
            line-height: 1.6;
        }

        .container {
            /* max-width: 1300px; */
            margin: 0 auto;
            padding: 20px;
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

        .navbar-custom.scrolled {
            background: #E12D50;
            /* Darker coral on scroll */
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

        /* Room Container */
        .room-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin: 40px auto;
        }

        .room-card {
            width: 25vw;
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            text-align: center;
            cursor: pointer;
            margin-bottom: 30px;
        }

        .room-card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 15px 35px rgba(0, 0, 0, 0.15);
        }

        .room-card h4 {
            font-size: 24px;
            color: #FF385C;
            /* Coral-pink headings */
            font-weight: 600;
            margin-bottom: 15px;
        }

        .room-card h6 {
            font-size: 18px;
            color: #555;
            font-weight: 500;
            margin: 10px 0;
            line-height: 1.4;
        }

        /* Book Now Button */
        .book-now-btn {
            display: inline-block;
            background: #FF385C;
            /* Airbnb coral-pink */
            color: #fff;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 8px;
            transition: 0.3s ease-in-out;
            text-decoration: none;
            margin-top: 15px;
            box-shadow: 0 5px 15px rgba(255, 56, 92, 0.5);
        }

        .book-now-btn:hover {
            text-decoration: none;
            background: #fff;
            color: #FF385C;
            box-shadow: 0 0 15px #FF385C;
        }

        /* No Data Message */
        .no-data {
            text-align: center;
            font-size: 22px;
            color: #777;
            margin-top: 50px;
        }

        /* Footer Links */
        a {
            color: #FF385C;
            text-decoration: none;
            transition: 0.3s;
        }

        a:hover {
            color: #333;
            text-decoration: underline;
        }

        .navbar-nav .active a {
            color: white;
            border-bottom: 2px solid white;
        }

        /* RESPONSIVENESS */
        @media screen and (max-width: 1024px) {
            .room-card {
                width: calc(50% - 20px);
            }
        }

        @media screen and (max-width: 768px) {
            .navbar-nav {
                flex-direction: column;
                align-items: center;
            }

            .navbar-icons {
                display: none;
            }

            .room-card {
                width: 90%;
            }

            .book-now-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Navbar -->
        <nav class="navbar-custom">
            <a href="index.php">
                <img src="images/airbnb_logo.png" class="navbar-logo" alt="Logo">
            </a>

            <ul class="navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="room.php">Room &amp; Facilities</a></li>
                <li><a href="reservation.php">Online Reservation</a></li>
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

        <!-- Room Container -->
        <div class="room-container">

            <?php
                $sql = "SELECT * FROM room_category";
                $result = mysqli_query($user->db, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "
                            <div class='room-card'>
                                <h4>".$row['roomname']."</h4>
                                <hr>
                                <h6>Number of Rooms: ".$row['room_qnty']."</h6>
                                <h6>No of Beds: ".$row['no_bed']." ".$row['bedtype']." bed</h6>
                                <h6>".$row['facility']."</h6>
                                <a href='./booknow.php?roomname=".$row['roomname']."' class='book-now-btn'>Book Now</a>
                            </div>
                        ";
                    }
                } else {
                    echo "<p class='no-data'>No Data Available</p>";
                }
            ?>

        </div>
    </div>

</body>

</html>