<?php 
session_start();
include_once 'admin/include/class.user.php';
$user = new User();
$uid = $_SESSION['uid'];

if (!$user->get_session()) { 
    header("location:admin/login.php"); 
} 

if (isset($_GET['q'])) { 
    $user->user_logout();
    header("location:index.php"); 
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        /* General Styling */
        body {
            align-items: center;
            font-family: 'Poppins', sans-serif;
            background: #FFFCF8; /* Airbnb's light background */
            color: #484848;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            /* max-width: 1200px; */
            margin: 0 auto;
            padding-top: 100px;
        }

        /* Navbar Styling */
        .navbar-custom {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #FF385C; /* Airbnb coral-pink */
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

        /* Logout Button with Matching UI */
        .logout-btn {
            margin-right: 2vw;
            background: rgba(255,255,255,0.7);
            color: #FF385C;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 8px 18px rgba(255, 56, 92, 0.3);
            text-decoration: none;
        }

        .logout-btn:hover {
            background: #fff;
            color: #FF385C;
            box-shadow: 0 0 20px #FF385C;
            transform: scale(1.05);
        }

        /* Well Container */
        .well-container {
            margin-top: 10vw;
            gap: 30px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }
        
        /* Well Card Styling */
        .well-card {
            
            background: #FFF;
            border-radius: 15px;
            padding: 40px;
            /* height: 15vw; */
            width: 20vw;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            text-align: center;
        }

        .well-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .well-card h4 {
            font-size: 32px;
            color: #FF385C;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .well-card h6 a {
            display: block;
            color: #484848;
            font-size: 18px;
            text-decoration: none;
            margin-bottom: 40px;
            transition: 0.3s;
        }

        .well-card a:hover {
            color: white;
            background: #FF385C;
            border-radius: 8px;
            padding: 12px 0;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .well-card {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 768px) {
            .navbar-nav {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }

            .navbar-icons a img {
                display: none;
            }

            .well-card {
                width: 100%;
            }
        }

    </style>

</head>

<body>

<!-- Navigation Panel -->
<nav class="navbar-custom">
    <a href="index.php">
        <img src="images/airbnb_logo.png" class="navbar-logo" alt="Logo">
    </a>
    
    <ul class="navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="room.php">Room &amp; Facilities</a></li>
        <li><a href="reservation.php">Online Reservation</a></li>
        <li class="active"><a href="admin.php">Admin</a></li>
    </ul>

    <a href="admin.php?q=logout">
        <button type="button" class="logout-btn">Logout</button>
    </a>
</nav>

<div class="container">

    <div class="well-container">

        <div class="well-card">
            <h4>Room Category</h4>
            <hr>
            <h6><a href="admin/addroom.php">Add Room Category</a></h6>
            <h6><a href="show_room_cat.php">Show All Room Categories</a></h6>
            <h6><a href="show_room_cat.php">Edit Room Category</a></h6>
        </div>

        <div class="well-card">
            <h4>Bookings</h4>
            <hr>
            <h6><a href="room.php">Book Now</a></h6>
            <h6><a href="show_all_room.php">Show All Booked Rooms</a></h6>
            <h6><a href="show_all_room.php">Edit Booked Room</a></h6>
        </div>

        <div class="well-card">
            <h4>Manager</h4>
            <hr>
            <h6><a href="admin/addmanager.php">Add Manager</a></h6>
            <h6><a href="admin/deletemanager.php">Delete Manager</a></h6>
            <h6><a href="admin/detailsmanager.php">Manager Details</a></h6>
        </div>

    </div>
</div>

<script src="my_js/scroll.js"></script>

</body>
</html>
