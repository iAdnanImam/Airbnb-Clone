<?php
include_once 'include/class.user.php'; 
$user = new User();

$room_cat = $_GET['roomname'];

$sql = "SELECT * FROM room_category WHERE roomname='$room_cat'";
$query = mysqli_query($user->db, $sql);
$row = mysqli_fetch_array($query);

if (isset($_REQUEST['submit'])) { 
    extract($_REQUEST); 
    $result = $user->edit_room_cat($roomname, $room_qnty, $no_bed, $bedtype, $facility, $price, $room_cat);
    
    if ($result) {
        echo "<script type='text/javascript'>
                alert('".$result."');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Room Category</title>
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
            background: url('https://images.unsplash.com/photo-1568495248636-6432b97bd949?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8aG90ZWwlMjByb29tfGVufDB8fDB8fHww') no-repeat center center/cover; /* Background Image */
            background-size: cover; /* Airbnb light background */
            color: #484848;
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

        /* Container Styling */
        .container {
            width: 900px;
            margin: 60px auto;
            padding: 40px;
            background: rgba(255,255,255,0.8);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            transition: 0.3s;
        }

        .container:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
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
    <h2>Edit Room Category</h2>
    <form action="" method="post" name="room_category">
        
        <label for="roomname">Room Type Name:</label>
        <input type="text" name="roomname" value="<?php echo $row['roomname'] ?>" required>

        <label for="room_qnty">No of Rooms:</label>
        <select name="room_qnty">
            <option value="<?php echo $row['room_qnty'] ?>"><?php echo $row['room_qnty'] ?></option>
            <?php for ($i = 1; $i <= 10; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor; ?>
        </select>

        <label for="no_bed">No of Beds:</label>
        <select name="no_bed">
            <option value="<?php echo $row['no_bed'] ?>"><?php echo $row['no_bed'] ?></option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>

        <label for="bedtype">Bed Type:</label>
        <select name="bedtype">
            <option value="<?php echo $row['bedtype'] ?>"><?php echo $row['bedtype'] ?></option>
            <option value="single">Single</option>
            <option value="double">Double</option>
        </select>

        <label for="facility">Facility:</label>
        <textarea name="facility" rows="5"><?php echo $row['facility'] ?></textarea>

        <label for="price">Price Per Night:</label>
        <input type="text" name="price" value="<?php echo $row['price'] ?>" required>

        <div class= "function-btns">
            <button type="submit" class="btn" name="submit">Update</button>
            <a href="../admin.php" class="back-link">Back to Admin Panel</a>
        </div>
    </form>
</div>

</body>
</html>
