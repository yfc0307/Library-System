<?php
include 'db.php';
session_start();
$k=$_SESSION['userName'];
$sql = "select * from borrow b, users u where b.userid = u.userid and u.username = '$k'";
$result = mysqli_query($conn,$sql);
$d = date("Y/m/d");

while ($row = mysqli_fetch_array($result)) {

    $borrowid[] = $row["borrowid"];
    $userid[] = $row["userid"];
    $bdate[] = $row["bdate"];
    $rdate[] = $row["rdate"];
    $bookid[] = $row["bookid"];
       
}

foreach ($borrowid as $id) {

    $x = $id - 1;

    $d = strtotime($d);
    $d1 = strtotime($rdate[$x]);
    $d2 = ceil(($d1 - $d)/60/60/24);

    if ($d2 < 0) {
        $d2 = abs($d2);
        $mailmsg = "Your book no. $bookid[$x] returning date has expired for $d2 days. Please return as soon as possible.";
    } elseif ($d2 > 0) {
        $mailmsg = "Your book no. $bookid[$x] returning date will expire in $d2 days. Please return before $rdate[$x]";
    } else {
        $mailmsg = "Your book no. $bookid[$x] returning date will expire today.";
    }

    $sql_mailsender = "insert into mail (senderid, receiverid, title, content) values ('0', '$userid[0]', 'Book Return Reminder', '$mailmsg')";
}

////////// The following codes are yet tested (24/2/2025) //////////

// Prevent sending multiple same mail when user login multiple times within a day

$sql_checkmail = "select count(*) from mail m, users u where m.receiverid = u.userid and m.content = '$mailmsg'"; // Check if exist same content mail
if (mysqli_query($conn,$sql_checkmail) == 0) {
    $query = mysqli_query($conn,$sql_mailsender);
}
header('Location: homepage.php');
exit;

////////// The above codes are yet tested (24/2/2025) //////////
?>