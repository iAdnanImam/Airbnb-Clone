<?php
    include_once 'admin/include/class.user.php'; 
    $user = new User(); 

    $id = $_GET['id'];

    // Fetch Room Details
    $sql = "SELECT * FROM rooms WHERE room_id='$id'";
    $query = mysqli_query($user->db, $sql);
    $row = mysqli_fetch_array($query);

    // Update Room Details
    if (isset($_REQUEST['submit'])) { 
        extract($_REQUEST); 
        $result = $user->edit_all_room($checkin, $checkout, $name, $phone, $id);
        
        if ($result) {
            echo "<script>
                    alert('Room details updated successfully.');
                    window.location.href = 'admin.php'; 
                  </script>";
        } else {
            echo "<script>alert('Failed to update room details.');</script>";
        }
    }

    // Delete Room Booking
    if (isset($_REQUEST['delete'])) {
        $delete_sql = "DELETE FROM rooms WHERE room_id='$id'";
        $delete_query = mysqli_query($user->db, $delete_sql);

        if ($delete_query) {
            echo "<script>
                    alert('Room booking deleted successfully.');
                    window.location.href = 'admin.php'; 
                  </script>";
        } else {
            echo "<script>alert('Failed to delete room booking.');</script>";
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
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: url('https://images.unsplash.com/photo-1568495248636-6432b97bd949?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8aG90ZWwlMjByb29tfGVufDB8fDB8fHww') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 80px;
            position: relative;
        }

        /* Overlay Effect */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        /* Form Container */
        .booking-container {
            width: 90%;
            max-width: 500px;
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }

        .booking-container h2 {
            text-align: center;
            color: #FF385C;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            font-weight: 600;
            color: #FF385C;
            margin-bottom: 5px;
        }

        .form-control, .datepicker {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ddd;
            outline: none;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.95);
            color: #333;
            transition: all 0.3s ease-in-out;
            margin-bottom: 10px;
        }

        .form-control:focus, .datepicker:focus {
            border-color: #FF385C;
            box-shadow: 0 0 8px rgba(255, 56, 92, 0.5);
            transform: scale(1.02);
        }

        /* Buttons */
        .btn-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .button, .delete-btn {
            display: inline-block;
            text-align: center;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            border: none;
            transition: 0.3s;
            box-shadow: 0 8px 18px rgba(255, 56, 92, 0.5);
            width: 48%;
        }

        .button {
            background: #FF385C;
            color: #fff;
        }

        .button:hover {
            background: #fff;
            color: #FF385C;
            box-shadow: 0 0 20px #FF385C;
        }

        .delete-btn {
            background: #FF385C;
            color: #fff;
        }

        .delete-btn:hover {
            background: #fff;
            color: #FF385C;
            box-shadow: 0 0 20px #D80040;
        }

        #click_here{
            margin-top: 20px;
            text-align: center;
        }

        #click_here a {
            text-decoration: none;
            color: #FF385C;
            font-weight: 600;
        }

        #click_here a:hover {
            text-decoration: underline;
            color: #D80040;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .btn-container {
                flex-direction: column;
            }

            .button, .delete-btn {
                width: 100%;
            }
        }
    </style>

    <script>
        $(function() {
            $(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>

</head>

<body>

<div class="booking-container">
    <h2>EDIT ROOM DETAILS</h2>
    <h2><?php echo $row['room_cat']; ?></h2>
    <hr>

    <!-- Form -->
    <form action="" method="post">
        <div class="form-group">
            <label for="checkin">Check In:</label>
            <input type="text" class="form-control datepicker" name="checkin" 
                   value="<?php echo $row['checkin']; ?>" required>

            <label for="checkout">Check Out:</label>
            <input type="text" class="form-control datepicker" name="checkout" 
                   value="<?php echo $row['checkout']; ?>" required>

            <label for="name">Full Name:</label>
            <input type="text" class="form-control" name="name" 
                   value="<?php echo $row['name']; ?>" required>

            <label for="phone">Phone Number:</label>
            <input type="text" class="form-control" name="phone" 
                   value="<?php echo $row['phone']; ?>" required>
        </div>

        <div class="btn-container">
            <!-- Update Button -->
            <button type="submit" class="button" name="submit">Update</button>
            
            <!-- Delete Button -->
            <button type="submit" class="delete-btn" name="delete" 
                    onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
        </div>

        <div id="click_here">
            <a href="admin.php">Back to Admin Panel</a>
        </div>
    </form>
</div>

</body>
</html>
