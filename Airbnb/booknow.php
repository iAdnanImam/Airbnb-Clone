<?php
include_once 'admin/include/class.user.php'; 
$user = new User(); 

$roomname = $_GET['roomname'];
$isBooked = false;  // Flag to track booking status

if (isset($_REQUEST['submit'])) { 
    extract($_REQUEST);

    // Establish Database Connection
    $conn = new mysqli("localhost", "root", "", "hotel");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and sanitize inputs
    $checkin = $conn->real_escape_string($checkin);
    $checkout = $conn->real_escape_string($checkout);
    $name = $conn->real_escape_string($name);
    $phone = $conn->real_escape_string($phone);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO rooms (checkin, checkout, name, phone, room_cat) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $checkin, $checkout, $name, $phone, $roomname);

    if ($stmt->execute()) {
        $isBooked = true;  // Set booking status to true
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Booking</title>

    <script>
        $(function() {
            $(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        /* General Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background: url('https://images.unsplash.com/photo-1568495248636-6432b97bd949?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8aG90ZWwlMjByb29tfGVufDB8fDB8fHww') no-repeat center center/cover;
            color: #484848; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .booking-container {
            width: 90%;
            max-width: 600px;
            background: rgba(255,255,255, 0.86);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: 0.3s;
        }

        h2 {
            color: #FF385C; 
            font-weight: 700;
            font-size: 32px;
            margin-bottom: 15px;
        }

        hr {
            border: 0;
            height: 2px;
            background: #FF385C; 
            margin: 25px 0;
        }

        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            font-weight: 600;
            color: #FF385C; 
            margin-bottom: 8px;
        }

        .form-group input {
            margin-bottom: 10px;
            width: 96%;
        }

        .form-control, .datepicker {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            background: #f5f5f5;
            color: #333;
            transition: 0.3s;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
        }

        .form-control:focus, .datepicker:focus {
            outline: none;
            border-color: #FF385C;
            box-shadow: 0 0 12px rgba(255, 56, 92, 0.5);
        }

        .book-now-btn {
            display: inline-block;
            background: #FF385C; 
            color: #fff;
            font-weight: 600;
            padding: 15px 30px;
            border-radius: 8px;
            transition: 0.3s;
            text-decoration: none;
            font-size: 18px;
            width: 100%;
            border: none;
            cursor: pointer;
            box-shadow: 0 8px 18px rgba(255, 56, 92, 0.5);
        }

        .book-now-btn:hover {
            background: #fff;
            color: #FF385C;
            text-decoration: none;
            box-shadow: 0 0 20px #FF385C;
        }

        #click_here {
            margin-top: 20px;
        }

        #click_here a {
            color: #FF385C;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        #click_here a:hover {
            text-decoration: underline;
            color: #E12D50;
        }

        @media (max-width: 768px) {
            .booking-container {
                width: 95%;
                padding: 30px;
            }

            .form-control, .book-now-btn {
                font-size: 16px;
                padding: 12px;
            }
        }

    </style>

</head>

<body>

<div class="booking-container">
    <?php if ($isBooked): ?>
        <h2>Your Booking is Successful!</h2>
        <hr>
        <p>Thank you for booking with us. We look forward to your stay!</p>
        <div id="click_here">
            <a href="index.php">Go to Home</a>
        </div>
    <?php else: ?>
        <h2>Book Now: <?php echo htmlspecialchars($roomname); ?></h2>
        <hr>

        <form action="" method="post" name="room_category">
            <div class="form-group">
                <label for="checkin">Check In:</label>
                <input type="text" class="datepicker form-control" name="checkin" placeholder="YYYY-MM-DD" required>

                <label for="checkout">Check Out:</label>
                <input type="text" class="datepicker form-control" name="checkout" placeholder="YYYY-MM-DD" required>

                <label for="name">Full Name:</label>
                <input type="text" class="form-control" name="name" placeholder="John Doe" required>

                <label for="phone">Phone Number:</label>
                <input type="text" class="form-control" name="phone" placeholder="018XXXXXXX" required>
            </div>

            <button type="submit" class="book-now-btn" name="submit">Book Now</button>

            <div id="click_here">
                <a href="room.php">Back to Rooms</a>
            </div>  
        </form>
    <?php endif; ?>
</div>

</body>
</html>
