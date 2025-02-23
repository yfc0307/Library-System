`<?php
session_start();
include "db.php";
$k = $_SESSION['userName'];
$sql = "select count(*) from mail m, users u where m.receiverid = u.userid and u.username = '$k' and m.mread = '0'";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Library</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

<!--navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="homepage.php">Library System</a>
    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active"><a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a></li>
              <?php 
                if($k != null){
                  echo "<li class='nav-item'><a class='nav-link' href=mailpage.php>Mail</a></li>";
              }?>
              <li class="nav-item"></li>
          </ul>
            <?php if( isset($_SESSION['userName']) && !empty($_SESSION['userName'])){?>
                <ul class='navbar-nav navbar-right'><li class='nav-item'><a class='nav-link' href=logout.php>Log Out</a></li></ul>
               
            <?php }else{ ?>
              <ul class='navbar-nav navbar-right'>
                <li class='nav-item'><a href='signup.php' class='nav-link'> Sign Up</a></li>
                <li class='nav-item'><a href='login.php' class='nav-link'>Login</a></li>
                </ul>
            <?php } ?>
            
            

        </div>
</nav>
        <!--navbar-->

        <!--banner-->
    <section id="banner">
      <div class="jumbotron" style="background:url(assets/img/banner2.png); background-size:cover; color:white; ">
        <?php if( isset($_SESSION['userName']) && !empty($_SESSION['userName'])){?>
          <h1 class="display-3"><b>Welcome, <?php echo $k; ?>.</b></h1>
        <?php }else{ ?>
          <h1 class="display-3"><b>Welcome to HKMU Library.</b></h1>
        <?php } ?>
          <p class="lead">----------------------</p>
            <hr class="my-2">
              <p ><?php 
                if($k != null){
                  $countmail = mysqli_query($conn,$sql);
                  while ($row = mysqli_fetch_array($countmail)) {
                    echo "You have ".$row[0]." unread mails.";
                  }
              }?></p>
                <p class="lead">
                  <a class="btn btn-primary btn-lg" href="" role="button">Search Book</a>
                </p>
      </div>
    </section>
    <!--banner-->

  
<div class="container" >
  
</div>

<!--footer-->
<footer>
    <div class="container">
		        <div class='row'>
					  <div class='col-md-4 text-left'>
						<img src='assets/img/hkmu.png' width='300'>
						  <p><b>Welcome to Library System</b></p>
					  </div>
					  <div class='col-md-4 text-left'>
						  <h4>Useful Links</h4>
						  <ul>
					      	<li><a href="https://www.hkmu.edu.hk/myhkmu">MyHKMU</a></li>
					      	<li><a href="https://ole.hkmu.edu.hk/">OLE</a></li>
						  </ul>
						  <ul>
					      	
						  </ul>						  
					  </div>
		        </div>
            </div>	  
    </footer> 
    
    <!--footer-->
    


</body>
</html>