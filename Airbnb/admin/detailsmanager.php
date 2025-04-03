<?php
// Include Database Connection
include_once 'include/class.user.php'; 
$user = new User();

// Fetch all managers
$sql = "SELECT fullname, uname, uemail FROM manager";
$result = mysqli_query($user->db, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Details</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* General Styling */
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 70vw;
            background: white;
            padding: 40px;
            box-shadow: 0 8px 18px rgba(0,0,0,0.1);
            border-radius: 10px;
            text-align: center;
        }

        h2 {
            font-size: 32px;
            color: #FF385C;
            font-weight: 700;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 20px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #FF385C;
            color: #fff;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .back-btn {
            display: inline-block;
            background: #FF385C;
            color: #fff;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 8px;
            transition: 0.3s ease-in-out;
            text-decoration: none;
            margin-top: 15px;
            box-shadow: 0 5px 15px rgba(255, 56, 92, 0.5);
        }

        .back-btn:hover {
            background: #fff;
            color: #FF385C;
            box-shadow: 0 0 15px #FF385C;
        }

        .no-data {
            color: #FF385C;
            font-weight: bold;
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 20px;
            }

            th, td {
                font-size: 14px;
                padding: 15px;
            }
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Manager Details</h2>

    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['uname']; ?></td>
                        <td><?php echo $row['uemail']; ?></td>
                    </tr>
                <?php } 
            } else { ?>
                <tr>
                    <td colspan="3" class="no-data">No Managers Found</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="../admin.php" class="back-btn">Back to Admin Panel</a>
</div>

</body>
</html>