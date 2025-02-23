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
    <?php 
        foreach ($mailid as $id) {
            $x = count($mailid) - $id;

            echo'<ul class="list-group">';
            echo "<b>Mail ID: </b>" ."<li class='list-group-item col-md-6'>". $mailid[$x] ."</li>". "<br>";
            echo "<b>Sender ID: </b>" ."<li class='list-group-item col-md-6'>". $senderid[$x] ."</li>". "<br>";
            echo "<b>Title: </b>" ."<li class='list-group-item col-md-6'>". $title[$x] ."</li>". "<br>";
            echo "<b>Content: </b>" ."<li class='list-group-item col-md-6'>". $content[$x] ."</li>". "<br>";
            echo'</ul>';

            // (count($mailid) - $id) to show latest mail

            if ($mread[$x] == 0) {
                echo "<u><a href=mailreader.php?mailid=".$mailid[$x].">Change mail read status to read.</a><br>";
            } elseif ($mread[$x] == 1) {
                echo "<u><a href=mailreader.php?mailid=".$mailid[$x].">Change mail read status to unread.</a><br>";
            } else {
                echo "Mail status error";
            }

            echo " ";
        }
    ?>
</body>
</html>