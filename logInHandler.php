<?php
session_start();  
include "db.php";


// 獲取表單數據並防止 SQL 注入
$username = mysqli_real_escape_string($conn, trim($_POST['userName']));
$password_input = $_POST['password'];

// 查詢用戶資料
$sql = "SELECT * FROM users WHERE userName = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 用戶存在，取出資料庫中的哈希密碼
    $row = $result->fetch_assoc();
    $stored_hash = $row['password'];  // 儲存的哈希密碼

    // 驗證用戶輸入的密碼與儲存的哈希密碼是否匹配
    if (password_verify($password_input, $stored_hash)) {
        // 密碼匹配，登入成功
        $_SESSION['userName'] = $row['username'];
        echo "Login successful! Welcome, </br><a type='submit'  class='btn btn-primary btn-block' role='button' href='homepage.php'>Go to HomePage</a>" . $row['username'];
    } else {
        // Debug
        echo    "Password Input: ", $password_input, "</br>", 
                "Hash: ", $stored_hash, "</br>";
        // Debug
        echo "Incorrect password.</br><a type='submit'  class='btn btn-primary btn-block' role='button' href='javascript:history.go(-1)'>Go Back</a>";
    }
} else {
    echo "User not found.</br><a type='submit'  class='btn btn-primary btn-block' role='button' href='javascript:history.go(-1)'>Go Back</a>";
}


?>
