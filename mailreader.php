<?php
include 'db.php';
session_start();
$selected_mail = $_GET['mailid'];
$k=$_SESSION['userName'];
$sql = "select * from mail m, users u where m.receiverid = u.userid and u.username = '$k'";
$result = mysqli_query($conn,$sql);
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
    header('Location: mailpage.php');
    exit;
} elseif ($mread[$selected_mail - 1] == 1) {
    $query = mysqli_query($conn,$sqlunread);
    header('Location: mailpage.php');
    exit;
} else {
    echo "Something went wrong."."<br>"."<u><a href=mailpage.php>Go Back.</a><br>";;
}
?>