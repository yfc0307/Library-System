<?php
session_start();
include "db.php";
if ($_SESSION) {
    $k = $_SESSION['userName'];
} else {
    $k = "";
}

$sql = "select userid, username, dob, phone, email from users where username = '$k'";
$userinfo = mysqli_query($conn,$sql);
$userinfo = mysqli_fetch_array($userinfo);

$userinfo_name = $userinfo["username"];
$userinfo_id = $userinfo["userid"];
$userinfo_dob = $userinfo["dob"];
$userinfo_phone = $userinfo["phone"];
$userinfo_email = $userinfo["email"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info Page</title>
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

        .userInfo-section {
            padding: 100px;
            display: flex;
            justify-content: center;
        }

        .userInfo-container {
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 12px 18px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        .userInfo-form {
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

        .form-select {
            padding: 15px 25px;
            font-size: 24px;
            border: 2px solid #ddd;
            border-radius: 10px;
            outline: none;
        }

        .button-group {
            display: flex;
        }

        .update-button {
            background-color: #009bff;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 24px;            
            flex: 1;
        }

        .update-button:hover {
            background-color: #0084d6;
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
                <a href="mail.php" class="nav-item">Mail</a>
            <?php }?>
            <?php if( isset($_SESSION['userName']) && !empty($_SESSION['userName'])){?>
                <a href="userinfo.php" class="nav-item">User</a>
                <a href="logout.php" class="nav-item">Logout</a>
            <?php }else{ ?>
                <a href="login.php" class="nav-item">Login</a>
                <a href="signup.php" class="nav-item">Sign Up</a>
                <?php } ?>
        </div>
    </nav>

    <!-- User Info -->
    <section class="userInfo-section">
        <div class="userInfo-container">
            <form class="userInfo-form">
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-input" value="<?php echo $userinfo_name ?>" readonly>
                </div>                            
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-input" placeholder="example@domain.com" value="<?php echo $userinfo_email ?>" readonly>
                </div>                
                <div class="form-group">
                    <label class="form-label">Phone number</label>
                    <input type="tel" class="form-input" placeholder="+1 234 567 890" value="<?php echo $userinfo_phone ?>" readonly>
                </div>                
            </form>
        </div>
    </section>
    
</body>
</html>