
<?php
session_start();
include "db.php";
$k = $_SESSION['userName'];
?>

<!doctype html>
<html lang="en">
  <head>
    <title>SignUp</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS 5 &4-->
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
            <li class="nav-item active"><a class="nav-link" href="homepage.php">Home<span class="sr-only">(current)</span></a></li>
          </ul>
            <?php if( isset($_SESSION['userName']) && !empty($_SESSION['userName'])){?>
                <ul class='navbar-nav navbar-right'><li class='nav-item'><a class='nav-link' href=logout.php>Sign Out</a></li></ul>
               
            <?php }else{ ?>
              <ul class='navbar-nav navbar-right'>
                
                <li class='nav-item'><a href='login.php' class='nav-link'>Login</a></li>
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
        height: 275px;
        "></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong bg-body-tertiary" style="
        margin-top: -100px;
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Sign up</h2>

          <form action="signUpHandler.php" class="needs-validation" novalidate method="post">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <!-- User Name input -->
            <div class="form-group">
                <label for="userName">User Name:</label>
                <input type="text" name="userName" id="" class="form-control" placeholder="Enter User Name" required>
              
            </div>

            <!-- Email input -->
            <div class="form-group">
                <label for="userMail">Email:</label>
                <input type="email" name="email" id="" class="form-control" placeholder="Enter email" required>
              
            </div>

            <!-- Date of Birth input -->
            <div class="form-group">
                <label for="DOB">Email:</label>
                <input type="date" name="dob" id="" class="form-control" placeholder="Enter Date of Birth">
              
            </div>

            <!-- Password input -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id=""  placeholder="Enter password" name="password" required>
               
            </div>

            <div class="form-group">
                <label for="confirm">Confirm password:</label>
                <input type="password" class="form-control" id=""  placeholder="Enter Confirm password" name="confirm" required>
                
            </div>

            <!-- phone input -->
            <div class="form-group">
                <label for="phone">Phone number:</label>
                <input type="phone" class="form-control" id="" placeholder="Enter Phone number" name="phone" required>
                
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Sign Up</button>
            <button type="reset" class="btn btn-danger">Reset</button>

         
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
    
    
    <script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>



        


  </body>
  
</html>
