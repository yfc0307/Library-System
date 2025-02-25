<?php
session_start();
include "db.php";
$k = $_SESSION['userName'];

$search = $_GET["search"];

$sql = "select * from books where name like '%$search%'";
$result = mysqli_query($conn,$sql);
$numOfRecord = mysqli_num_rows($result);

$bookid = array();

while ($row = mysqli_fetch_array($result)) {
    $bookid[] = $row["bookid"];
    $bookname[] = $row["name"];
    $genre[] = $row["genre"];
    $author[] = $row["author"];
    $publisher[] = $row["publisher"];
    $language[] = $row["language"];
}

$count_book = 0;

if ($bookid){
    foreach ($bookid as $id) {
        $x_book = 0; // independent counter
        echo "Book ID: " . $bookid[$x_book] . "<br>Name: " . $bookname[$x_book] . "<br>Genre: " . $genre[$x_book] . "<br>Author: " . $author[$x_book] . "<br>Publisher: " . $publisher[$x_book] . "<br>Language: " . $language[$x_book] . "<br><br>";
        $count_book += 1;
        $x_book += 1; // plus 1 for every book searched
    }
}

if ($count_book < 2) {
    echo $count_book . " Result Displayed";
} else {
    echo $count_book . " Results Displayed";
}

?>
