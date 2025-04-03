<?php
    include_once 'include/class.user.php'; 
    $user = new User(); 

    if (isset($_REQUEST['submit'])) { 
        extract($_REQUEST); 
        $register = $user->reg_user($fullname, $uname, $upass, $uemail); 

        if ($register) { 
            echo "
                <script type='text/javascript'>
                    alert('Manager Added Successfully');
                    window.location.href = '../admin.php';
                </script>";
        } else {
            echo "
                <script type='text/javascript'>
                    alert('Registration failed! Username or email already exists');
                </script>";
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Manager</title>

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
            background: url('https://wallpapercave.com/wp/wp3744429.jpg');
            background-size: cover; /* Airbnb light background */
            color: #484848;
            padding-top: 80px; /* Navbar offset */
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

        /* Form Container */
        .form-container {
            background: rgba(255,255,255,0.8);
            border-radius: 12px;
            box-shadow: 0 12px 36px rgba(0, 0, 0, 0.1);
            padding: 50px;
            max-width: 600px;
            margin: 100px auto;
            text-align: center;
            transition: 0.3s;
        }

        .form-container:hover {
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.15);
        }

        .form-container h2 {
            color: #FF385C;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }

        .form-group label {
            display: block;
            color: #484848;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #FF385C;
            box-shadow: 0 0 10px rgba(255, 56, 92, 0.3);
            outline: none;
        }

        /* Submit Button */
        .submit-btn {
            display: inline-block;
            background: #FF385C; /* Coral pink button */
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

        .submit-btn:hover {
            background: #fff;
            color: #FF385C;
            text-decoration: none;
            box-shadow: 0 0 20px #FF385C;
        }

        /* Back Link */
        #click_here {
            margin-top: 20px;
        }

        #click_here a {
            color: #FF385C;
            text-decoration: none;
            font-weight: 600;
        }

        #click_here a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar-custom {
                flex-direction: column;
                align-items: center;
                padding: 15px 20px;
            }

            .navbar-nav {
                gap: 15px;
            }

            .form-container {
                width: 90%;
                padding: 30px;
            }

            .navbar-icons {
                margin-top: 10px;
            }

            .logout-btn {
                margin-top: 15px;
            }
        }
    </style>

</head>

<body>



<!-- Form Section -->
<div class="form-container">
    <h2>Add Manager</h2>

    <form action="" method="post" name="reg" onsubmit="return submitreg();">
        
        <div class="form-group">
            <label for="fullname">Full Name:</label>
            <input type="text" class="form-control" name="fullname" placeholder="John Doe" required>
        </div>

        <div class="form-group">
            <label for="uname">Username:</label>
            <input type="text" class="form-control" name="uname" placeholder="johndoe" required>
        </div>

        <div class="form-group">
            <label for="uemail">Email:</label>
            <input type="email" class="form-control" name="uemail" placeholder="john@example.com" required>
        </div>

        <div class="form-group">
            <label for="upass">Password:</label>
            <input type="password" class="form-control" name="upass" placeholder="********" required>
        </div>

        <button type="submit" class="submit-btn" name="submit">Submit</button>

        <div id="click_here">
            <a href="../admin.php">Back to Admin Panel</a>
        </div>
    </form>
</div>

</body>
</html>
