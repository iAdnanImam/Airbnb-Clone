<?php 
session_start(); 
include_once 'include/class.user.php'; 
$user = new User(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script language="javascript" type="text/javascript">
        function submitlogin() {
            var form = document.login;
            if (form.emailusername.value == "") {
                alert("Enter email or username.");
                return false;
            } else if (form.password.value == "") {
                alert("Enter Password.");
                return false;
            }
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        /* General Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background:url(https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8YWRtaW58ZW58MHx8MHx8fDA%3D);
            color: #484848;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 500px;
            background: rgba(255,255,255,0.8);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: 0.3s;
        }

        h2 {
            color: #FF385C; /* Coral-pink heading */
            font-weight: 700;
            font-size: 32px;
            margin-bottom: 15px;
        }

        hr {
            border: 0;
            height: 2px;
            background: #FF385C; /* Coral-pink line */
            margin: 25px 0;
        }

        /* Form Styling */
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

        .form-control {
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

        .form-control:focus {
            outline: none;
            border-color: #FF385C;
            box-shadow: 0 0 12px rgba(255, 56, 92, 0.5);
        }

        /* Submit Button */
        .btn-primary {
            display: inline-block;
            background: #FF385C; /* Coral-pink button */
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

        .btn-primary:hover {
            background: #fff;
            color: #FF385C;
            box-shadow: 0 0 20px #FF385C;
        }

        /* Error Message */
        #wrong_id {
            color: red;
            font-size: 14px;
            margin-top: 15px;
        }

        /* Back to Home Link */
        a {
            color: #FF385C;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
            display: inline-block;
            margin-top: 15px;
        }

        a:hover {
            text-decoration: underline;
            color: #E12D50; /* Darker coral on hover */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 30px;
            }

            .form-control, .btn-primary {
                font-size: 16px;
                padding: 12px;
            }
        }
    </style>

</head>

<body>

<div class="container">

    <h2>Admin Login</h2>
    <hr>

    <form action="" method="post" name="login" onsubmit="return submitlogin();">
        
        <div class="form-group">
            <label for="emailusername">Username or Email:</label>
            <input type="text" name="emailusername" class="form-control" value="admin" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" value="1234" required>
        </div>

        <!-- Error Message -->
        <p id="wrong_id"></p>

        <button type="submit" name="submit" value="Login" class="btn-primary">Submit</button>

        <a href="../index.php">Back To Home</a>

        <?php 
        if(isset($_REQUEST['submit'])) { 
            extract($_REQUEST); 
            $login = $user->check_login($emailusername, $password); 
            
            if($login) { 
                echo "<script>location='../admin.php'</script>"; 
            } else { 
                ?>
                <script type="text/javascript">
                    document.getElementById("wrong_id").innerHTML = "Wrong username or password";
                </script>
                <?php 
            } 
        }
        ?>

    </form>

</div>

</body>
</html>
