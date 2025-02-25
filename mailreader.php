<?php
include 'db.php';
session_start();
$selected_mail = $_GET['mailid'];
$k=$_SESSION['userName'];
$sql = "select * from mail m, users u where m.receiverid = u.userid and u.username = '$k'";
$result = mysqli_query($conn,$sql);
$previousPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

while ($row = mysqli_fetch_array($result)) {

    $mailid[] = $row["mailid"];
    $senderid[] = $row["senderid"];
    $receiverid[] = $row["receiverid"];
    $title[] = $row["title"];
    $content[] = $row["content"];
    $mread[] = $row["mread"];
       
}

$sqlread = "update mail set mread = 1 where mailid = '$selected_mail'";
$sqlunread = "update mail set mread = 0 where mailid = '$selected_mail'";

if ($mread[$selected_mail - 1] == 0) {
    $query = mysqli_query($conn,$sqlread);
} elseif ($mread[$selected_mail - 1] == 1) {
    $query = mysqli_query($conn,$sqlunread);
} else {
    echo "Something went wrong."."<br>"."<u><a href=javascript:history.go(-1)>Go Back.</a><br>";;
}

if (strpos($previousPage, 'mail.php') !== false) {
    header('Location: mail.php');
} else {
    header('Location: mailpage.php');
}

exit;
?>