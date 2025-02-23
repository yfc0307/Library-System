<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  </head>
  <body>

<div class="container">
  <div class="jumbotron">
    <?php
      include 'db.php';

      $username = $_POST['userName'];
      $email = $_POST['email'];
      $dob = $_POST['dob'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm'];
      $phone_number = $_POST['phone'];

      //check pw
      if ($password !== $confirm_password) {
          die("<div class='container mt-5 text-center'>Passwords do not match</div> </br>  <a type='submit'  class='btn btn-primary btn-block' role='button' href='javascript:history.go(-1)'>Go Back</a>");
      }

      // 檢查 userName 和 userMail 是否已存在
      $sql_check = "SELECT * FROM users WHERE username = '$username' or email = '$email'";
      $result = $conn->query($sql_check);

      if ($result->num_rows > 0) {
          die("<div class='text-center '>User Name or Email already exists</div></br>  <a type='submit'  class='btn btn-primary btn-block'  role='button' href='javascript:history.go(-1)'>Go Back</a>");
          
      }

// 哈希密碼
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// 插入數據 (`userName`, `userMail`, `userPhone`)
$sql_insert = "INSERT INTO users (username, email, phone, dob, password) 
               VALUES ('$username', '$email', '$phone_number', '$dob', '$hashed_password')";

if ($conn->query($sql_insert) === TRUE) {
  die("<div class='text-center '>Sign Up successful!</div></br>  <a type='submit'  class='btn btn-primary btn-block'  role='button' href='login.php'>Go to Login</a>");
} else {
    echo "Error: " . $conn->error;
}



?>
</div>
</div>
</body>
