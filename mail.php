<?php
session_start();
include "db.php";
$k = $_SESSION['userName'];

$sql = "select * from mail m, users u where m.receiverid = u.userid and u.username = '$k'";
$result = mysqli_query($conn,$sql);
$numOfRecord = mysqli_num_rows($result);

$mailid = array();
$senderid = array();
$receiverid = array();
$title = array();
$content = array();
$mread = array();

if($numOfRecord <= 0) {
    echo "<tr><td>NO data found</td> </tr>";
} else {
    while ($row = mysqli_fetch_array($result)) {

        $mailid[] = $row["mailid"];
        $senderid[] = $row["senderid"];
        $receiverid[] = $row["receiverid"];
        $title[] = $row["title"];
        $content[] = $row["content"];
        $mread[] = $row["mread"];
           
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mails</title>
    <style>
        .article-title {
            font-size: 24px;
            font-weight: bold;
        }
        .article-content {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <a class="navbar-brand" href="homepage.php">Home</a>
    <a class="navbar-brand" href="mailpage.php"> All Mails</a>
    <?php 
        $count_unread = 0;
        $count_read = 0; // count number of read / unread mails

        $nomail_msg = "";

        foreach ($mailid as $id) {
            $x = count($mailid) - $id;

            // (count($mailid) - $id) to show latest mail

            if ($mread[$x] == 0) {

                echo'<ul class="list-group">';
                echo "<b>Mail ID: </b>" ."<li class='list-group-item col-md-6'>". $mailid[$x] ."</li>". "<br>";
                echo "<b>Sender ID: </b>" ."<li class='list-group-item col-md-6'>". $senderid[$x] ."</li>". "<br>";
                echo "<b>Title: </b>" ."<li class='list-group-item col-md-6'>". $title[$x] ."</li>". "<br>";
                echo "<b>Content: </b>" ."<li class='list-group-item col-md-6'>". $content[$x] ."</li>". "<br>";
                echo'</ul>';
                echo "<u><a href=mailreader.php?mailid=".$mailid[$x].">Change mail read status to read.</a><br>";

                $count_unread += 1;

            } elseif ($mread[$x] == 1) {

                echo "";
                $count_read += 1;

            } else {

                echo "";
                
            }

            if ($count_unread == 0) {
                $nomail_msg = "You have no unread mail.";
            } else {
                $nomail_msg = "";
            }

        }
        echo "<br>$nomail_msg";
    ?>
</body>
</html>