<?php
include_once 'include/class.user.php'; 
$user = new User(); 

if (isset($_REQUEST['submit'])) { 
    extract($_REQUEST); 
    $result = $user->add_room($roomname, $room_qnty, $no_bed, $bedtype, $facility, $price);
    
    if ($result) {
        echo "<script type='text/javascript'>
                alert('Room Added Successfully');
              </script>";
    } else {
        echo $result;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Room Category</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* General Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: url('https://img.freepik.com/free-photo/view-luxurious-hotel-hallway_23-2150683497.jpg'); /* Airbnb light background */
            background-size: cover;
            color: #484848;
            padding-top: 90px; /* Offset for fixed navbar */
        }

        /* Container Styling */
        .container {
            max-width: 900px;
            margin: 60px auto;
            padding: 40px;
            background: rgba(255,255,255,0.8);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            transition: 0.3s;
        }

        h2 {
            color: #FF385C;
            font-size: 32px;
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            font-size: 16px;
            font-weight: 600;
            color: #484848;
            display: block;
            margin-bottom: 8px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            transition: 0.3s;
            font-size: 16px;
            color: #484848;
        }

        input:focus, 
        select:focus, 
        textarea:focus {
            outline: none; 
            border-color: #FF385C;
            box-shadow: 0 0 10px rgba(255, 56, 92, 0.3);
        }

        textarea {
            resize: none;
        }

        .function-btns {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .btn {
            margin-top: 15px;
            background: #FF385C;
            color: white;
            font-weight: 600;
            padding: 14px 40px;
            border: none;
            border-radius: 8px;
            transition: 0.3s;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
            font-size: 18px;
            box-shadow: 0 8px 24px rgba(255, 56, 92, 0.4);
        }

        .btn:hover {
            background: #fff;
            color: #FF385C;
            text-decoration: none;
            box-shadow: 0 0 20px #FF385C;
        }

        /* Back Link */
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #FF385C;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .back-link:hover {
            color: #FF1744;
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<!-- Form Section -->
<div class="container">
    <h2>Add Room Category</h2>
    <form action="" method="post" name="room_category">
        
        <label for="roomname">Room Type Name:</label>
        <input type="text" name="roomname" placeholder="Super Deluxe" required>

        <label for="room_qnty">No of Rooms:</label>
        <select name="room_qnty">
            <?php for ($i = 1; $i <= 10; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor; ?>
        </select>

        <label for="no_bed">No of Beds:</label>
        <select name="no_bed">
            <option value="1">1</option>
            <option value="2">2</option>
        </select>

        <label for="bedtype">Bed Type:</label>
        <select name="bedtype">
            <option value="single">Single</option>
            <option value="double">Double</option>
        </select>

        <label for="facility">Facility:</label>
        <textarea name="facility" rows="5" placeholder="Enter room facilities"></textarea>

        <label for="price">Price Per Night:</label>
        <input type="text" name="price" placeholder="Enter price" required>

        <div class= "function-btns">
            <button type="submit" class="btn" name="submit" value="Add Room">Add Room</button>
            <a href="../admin.php" class="back-link">Back to Admin Panel</a>
        </div>
    </form>
</div>

</body>
</html>
