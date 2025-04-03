<?php
// Include Database Connection
include_once 'include/class.user.php'; 
$user = new User();

// Handle Deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $uid = $_POST['uid'];

    if ($user->delete_manager($uid)) {
        echo "<script>
                alert('Manager deleted successfully');
                window.location.href = 'deletemanager.php';
              </script>";
    } else {
        echo "<script>
                alert('Failed to delete manager');
                window.location.href = 'deletemanager.php';
              </script>";
    }
}

// Fetch all managers
$sql = "SELECT * FROM manager";
$result = mysqli_query($user->db, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Manager</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* Center the Page */
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
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #FF385C;
            color: #fff;
        }

        tr:hover {
            background: #f1f1f1;
        }

        /* .delete-btn {
            display: inline-block;
            background: #FF385C;
            /* Airbnb coral-pink */
            /* color: #fff;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 8px;
            transition: 0.3s ease-in-out;
            text-decoration: none;
            margin-top: 15px;
            box-shadow: 0 5px 15px rgba(255, 56, 92, 0.5);
        }

        .delete-btn:hover {
            background: #c82333;
        } */

        .delete-btn {
            border: none;
        }

        .back-btn, .delete-btn {
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

        .back-btn:hover, .delete-btn:hover {
            text-decoration: none;
            background: #fff;
            color: #FF385C;
            box-shadow: 0 0 15px #FF385C;
        }

        /* No Data Styling */
        .no-data {
            color: #FF385C;
            font-weight: bold;
            font-size: 18px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 20px;
            }

            th, td {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Delete Manager</h2>

    <table>
        <thead>
            <tr>
                <th>UID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['uid']; ?></td>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['uname']; ?></td>
                        <td><?php echo $row['uemail']; ?></td>
                        <td>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="uid" value="<?php echo $row['uid']; ?>">
                                <button type="submit" class="delete-btn" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } 
            } else { ?>
                <tr>
                    <td colspan="5" class="no-data">No Managers Found</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="../admin.php" class="back-btn">Back to Admin Panel</a>
</div>

</body>
</html>
