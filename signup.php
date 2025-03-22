<?php
session_start();
include "db.php";
if ($_SESSION) {
    $k = $_SESSION['userName'];
} else {
    $k = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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


        .register-section {
            padding: 100px;
            display: flex;
            justify-content: center;
        }

        .register-container {
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 12px 18px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        .register-form {
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
        }

        .register-button {
            background-color: #009bff;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 24px;
            flex: 1;
        }

        .register-button:hover {
            background-color: #0084d6;
        }

    
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="nav-bar">
        <div class="logo">Library Borrowing System</div>
        <div class="nav-list">
            <a href="homepage.php" class="nav-item">Home</a>
            <a href="login.php" class="nav-item">Login</a>
        </div>
    </div>

    <!-- Register -->
    <section class="register-section">
        <div class="register-container">
            <form action="signUpHandler.php" class="register-form" novalidate method="post">
                <div class="form-group">
                    <label for="userName" class="form-label">Username</label>
                    <input type="text" class="form-input" placeholder="Enter username" name="userName" required></input>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-input" placeholder="Enter password" name="password" required></input>
                </div>
                <div class="form-group">
                    <label for="confirm" class="form-label">Confirm Password</label>
                    <input type="password" class="form-input" placeholder="Confirm password" name="confirm" required></input>
                </div>
                <div class="form-group">
                    <label for="userMail" class="form-label">Email</label>
                    <input type="email" class="form-input" placeholder="Enter email" name="email"></input>
                </div>
                <div class="form-group">
                    <label for="DOB" class="form-label">Date of Birth</label>
                    <input type="date" class="form-input" placeholder="Enter date of birth" name="dob"></input>
                </div>
                <div class="form-group">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-input" placeholder="Enter phone number" name="phone"></input>
                </div>
                <div class="button-group">
                    <button type="submit" class="register-button">Register</button>
                    <button type="reset" class="register-button">Reset</button>
                </div>
            </form>
        </div>

    </section>
</body>
</html>