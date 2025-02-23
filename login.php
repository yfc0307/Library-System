
<?php
session_start();
include "db.php";
$k = $_SESSION['userName'];
?>



<!doctype html>
<html lang="en">
    <head>
      <title>Title</title>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
      />

      <!-- Bootstrap CSS v5.2.1 -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"  rel="stylesheet"  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"  crossorigin="anonymous"/>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
        <header>
            <!-- place navbar here -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="homepage.php">Library System</a>
        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active"><a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a></li>
              <li class="nav-item"></li>
          </ul>
            <?php if( isset($_SESSION['userName']) && !empty($_SESSION['userName'])){?>
                <ul class='navbar-nav navbar-right'><li class='nav-item'><a class='nav-link' href=logout.php>Log Out</a></li></ul>
               
            <?php }else{ ?>
              <ul class='navbar-nav navbar-right'>
                <li class='nav-item'><a href='signup.php' class='nav-link'>Sign Up</a></li>
         
                </ul>
            <?php } ?>
            
            

        </div>
</nav>

        </header>
        <main>

        <section class="text-center">
  <!-- Background image -->
        <div class="p-5 bg-image" style="
            background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
            height: 275px;">
        </div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-4 shadow-5-strong bg-body-tertiary" style="
        margin-top: -50px;
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
          <h2 class="fw-bold mb-5">Login</h2>

          <form action="logInHandler.php" class="needs-validation" method="post">
        
            <div class="row">
              <div class="form-group">
                <div data-mdb-input-init class="form-outline">
                <label class="form-label" for="userName">User Name :</label>
                  <input type="text" class="form-control" placeholder="Enter user name" name="userName" required/>               
                </div>
              </div>            
            </div>

          

            <!-- Password input -->
            <div class="form-group">
                <label for="password">Password :</label>
                <input type="password" class="form-control"  placeholder="Enter password" name="password" required/>
               
            </div>

            
            
            
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary" name="login" value="Login">Login</button>
            <button type="reset" class="btn btn-danger" value="Reset">Reset</button>

            <br><br><a href="signup.php">Click to sign up</a><br>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>








        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>

       




    </body>
</html>
