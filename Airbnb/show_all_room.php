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

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* General Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            width: 100%;
            font-family: 'Poppins', sans-serif;
            color: #484848;
            overflow-x: hidden; /* Prevent horizontal scroll */
        }

        /* Background Image Styling */
        body {
            background: url('https://cdn.pixabay.com/photo/2015/11/06/11/45/interior-1026452_1280.jpg') no-repeat center center fixed; 
            background-size: cover; 
            height: 100vh;
            margin: 0;
            padding-top: 90px; /* Offset for fixed navbar */
        }

        /* Navbar */
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

        /* Room Container */
        .room-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin: 40px auto;
            max-width: 1200px;
        }

        .room-card {
            background: rgba(255, 255, 255, 0.85);
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
            font-size: 26px;
            color: #FF385C;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .room-card h6 {
            font-size: 18px;
            color: #484848;
            margin: 10px 0;
            font-weight: 500;
        }

        .edit-btn {
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

        .edit-btn:hover {
            background: #FF1744;
            box-shadow: 0 8px 32px rgba(255, 56, 92, 0.6);
            transform: scale(1.05);
        }

        /* No Data Styling */
        .no-data {
            text-align: center;
            color: #FF385C;
            font-size: 22px;
            font-weight: 600;
            margin: 40px 0;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .room-card {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 768px) {
            .navbar-custom {
                flex-direction: column;
                align-items: flex-start;
                padding: 20px;
            }

            .navbar-nav {
                flex-direction: column;
                width: 100%;
            }

            .navbar-nav a {
                padding: 15px;
                display: block;
            }

            .room-card {
                width: calc(100% - 20px);
            }

            .logout-btn {
                width: 100%;
                text-align: center;
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
            <li><a href="reservation.php">Online Reservation</a></li>
            <li class="active"><a href="admin.php">Admin</a></li>
        </ul>

        <a href="admin.php?q=logout">
            <button type="button" class="logout-btn">Logout</button>
        </a>
    </nav>

    <!-- Room Display -->
    <div class="room-container">

        <?php
            // Query to fetch all rooms, regardless of booking status
            $sql = "SELECT * FROM rooms";
            $result = mysqli_query($user->db, $sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "
                            <div class='room-card'>
                                <h4>Room: ".$row['room_cat']."</h4>
                                <hr>
                                <h6>Checkin: ".($row['checkin'] ?? 'N/A')."</h6>
                                <h6>Checkout: ".($row['checkout'] ?? 'N/A')."</h6>
                                <h6>Name: ".($row['name'] ?? 'N/A')."</h6>
                                <h6>Phone: ".($row['phone'] ?? 'N/A')."</h6>
                                <a href='edit_all_room.php?id=".$row['room_id']."' class='edit-btn'>Edit</a>
                            </div>
                        ";
                    }
                } else {
                    echo "<div class='no-data'>No Data Exists</div>";
                }
            } else {
                echo "<div class='no-data'>Cannot connect to server</div>";
            }
        ?>

    </div>

</body>

</html>
