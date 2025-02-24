<?php
session_start();
include "db.php";
if ($_SESSION) {
    $k = $_SESSION['userName'];
} else {
    $k = "";
}
$sql = "select count(*) from mail m, users u where m.receiverid = u.userid and u.username = '$k' and m.mread = '0'";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
        }

        .nav-bar {
            background-color: #009bff;
            height: 120px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;          
        }

        .logo {
            color: white;
            font-size: 36px;
        }

        .nav-list {
            display: flex;
            gap: 40px;
        }

        .nav-item {
            color: white;
            font-size: 24px;
            text-decoration: none;
            padding: 10px 20px;
        }

        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.25)
        }

        .search-section {
            padding: 100px 5%;
            text-align: center;
        }

        .search-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .search-box {
            display: flex;
            gap: 15px;
            background-color: white;
            padding: 15px;
            border-radius: 50px;
            box-shadow: 0  12px 18px rgba(0,0,0,0.1);
        }

        .search-input {
            flex: 1;
            padding: 10px 20px;
            border: none;
            font-size: 24px;
            outline: none;
        }

        .search-button {
            background-color: #009bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 24px;
        }

        .search-button:hover {
            background-color: #0084d6;
        }

        .login-section {
            padding: 100px;
            display: flex;
            justify-content: center;
        }

        .login-container {
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 12px 18px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .form-label {
            font-size: 24px;
        }

        .form-input {
            padding: 15px 25px;
            font-size: 24px;
            border: 2px solid #ddd;
            border-radius: 10px;
            outline: none;
        }

        .form-input:focus {
            border-color: #009bff;
        }

        .button-group {
            display: flex;
            gap: 20px;
        }

        .login-button {
            background-color: #009bff;
            color: white;
            width: 160px;
            height: 60px;
            font-size: 24px;
        }

        .reset-button {
            background-color: #009bff;
            color: white;
            width: 160px;
            height: 60px;
            font-size: 24px;
        }


    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="nav-bar">
        <div class="logo">Library Borrowing System</div>
        <div class="nav-list">
            <a href="homepage.php" class="nav-item">Home</a>
            <?php 
                if($k != null){ ?>
                <a href="mailpage.php" class="nav-item">Mail</a>
            <?php }?>
            <?php if( isset($_SESSION['userName']) && !empty($_SESSION['userName'])){?>
                <a href="logout.php" class="nav-item">Logout</a>
            <?php }else{ ?>
                <a href="login.php" class="nav-item">Login</a>
                <a href="signup.php" class="nav-item">Sign Up</a>
                <?php } ?>
        </div>
    </nav>

    <section class="login-section">
        <div class="login-container">
            <form action="logInHandler.php" class="login-form" method="post">
                <div class="form-group">
                    <lable class="form-label">Username</lable>
                    <input type="text" class="form-input" placeholder="Enter username" name="userName" required>                    
                </div>
                <div class="form-group">
                    <lable class="form-label">Password</lable>
                    <input type="text" class="form-input" placeholder="Enter password" name="password" required>
                </div>
                <div class="button-group">
                    <button type="submit" class="login-button">Login</button>
                    <button type="reset" class="reset-button" value="Reset">Reset</button>
                </div>

                <br><br><a href="signup.php">Click here to sign up</a><br>
            </form>
        </div>
    </section>
</body>
</html>