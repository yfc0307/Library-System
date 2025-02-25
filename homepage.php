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
    <title>Home Page</title>
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
            padding: 0px 30px;          
        }

        .banner {
            background:url(assets/img/banner2.png); 
            height: 400px;
            background-size:cover;
            color:white; 
        }

        .display-3 {
            color: white;
            font-size: 80px;
            padding: 10px 20px;
        }

        .display-4 {
            color: rgb(255, 152, 152);
            font-size: 40px;
            padding: 10px 20px;
        }

        .logo {
            color: white;
            font-size: 36px;
        }

        .nav-list {
            display: flex;
            gap: 10px;
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
            padding: 100px;
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
                <a href="logout.php" class="nav-item">Logout</a>
            <?php }else{ ?>
                <a href="login.php" class="nav-item">Login</a>
                <a href="signup.php" class="nav-item">Sign Up</a>
                <?php } ?>
        </div>
    </nav>

    <!--banner-->
    <section class="banner">
        <?php if( isset($_SESSION['userName']) && !empty($_SESSION['userName'])){?>
          <h1 class="display-3"><b>Welcome, <?php echo $k; ?>.</b></h1>
        <?php }else{ ?>
          <h1 class="display-3"><b>Welcome to Library.</b></h1>
        <?php } ?>
          <p class="lead"></p>
            <hr class="my-2">
              <p class="display-4"><?php 
                if($k != null){
                  $countmail = mysqli_query($conn,$sql);
                  while ($row = mysqli_fetch_array($countmail)) {
                    echo "You have ".$row[0]." unread mails.";
                  }
              }?></p>
    </section>
    <!--banner-->

    <!-- Search -->
    <section class="search-section">
        <div class="search-container">
        <form action="searchresult.php" method="GET">
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Search by title, author or ISBN..." name="search">
                <button type="submit" class="search-button" action="searchresult.php">Search</button>
            </div>
            </form>
        </div>
    </section>

</body>
</html>