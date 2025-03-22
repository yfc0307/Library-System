<?php
session_start();
if ($_SESSION) {
    $k = $_SESSION['userName'];
} else {
    $k = "";
}
include "db.php";

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
        }

        .nav-bar {
            background-color: #009bff;
            height: 120px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;          
        }

        .logo {
            color: white;
            font-size: 36px;
        }

        .nav-list {
            display: flex;
            gap: 40px;
        }

        .nav-item {
            color: white;
            font-size: 24px;
            text-decoration: none;
            padding: 10px 20px;
        }

        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.25)
        }

        .search-section {
            padding: 100px;
            text-align: center;
        }

        .search-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .search-box {
            display: flex;
            gap: 15px;
            background-color: white;
            padding: 15px;
            border-radius: 50px;
            box-shadow: 0  12px 18px rgba(0,0,0,0.1);
        }

        .search-input {
            flex: 1;
            padding: 10px 20px;
            border: none;
            font-size: 24px;
            outline: none;
        }

        .search-button {
            background-color: #009bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 24px;
        }

        .search-button:hover {
            background-color: #0084d6;
        }

        .results-container {
            max-width: 1200px;
            margin: 40px auto;
            box-shadow: 0 12px 18px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .results-table {
            width: 100%;
            border-collapse: collapse;
        }

        .results-table thead {
            background-color: #009bff;
            color: white;
        }

        .results-table th, .results-table td {
            padding: 10px 15px;
            text-align: left;
        }

        .results-table th {
            font-size: 20px;
            font-weight: bold;
        }

        .results-table tbody tr {
            border-bottom: 1px solid #eee;
        }

        .results-table tbody tr:hover {
            background-color: #e0e0e0;
        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="nav-bar">
        <div class="logo">Library Borrowing System</div>
        <div class="nav-list">
            <a href="homepage.php" class="nav-item">Home</a>
            <a href="mailpage.php" class="nav-item">Mailbox</a>
            <a href="userinfo.php" class="nav-item">User</a>
            <a href="logout.php" class="nav-item">Logout</a>
        </div>
    </div>

    <!-- Search -->
    <section class="search-section">
        <div class="search-container">
        <form action="searchresult.php" method="GET">
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Search by Book Title" name="search">
                <button type="submit" class="search-button" action="searchresult.php">Search</button>
            </div>
            </form>
        </div>
        <!-- Search results -->
        <div class="results-container">
            <table class="results-table">
                <thead>
                    <tr>
                        <th>BookID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Availability</th>
                    </tr>
                </thead>
                <tbody id="resultsBody">
                    <!-- Dynamic search results will be added here -->                    
                    <?php $count_book = 0;
                    $x_book = 0;
                    if ($bookid){
                        foreach ($bookid as $id) {
                            ?><tr>
                            <td><?php echo $bookid[$x_book] ?></td>
                            <td><?php echo $bookname[$x_book] ?></td>
                            <td><?php echo $author[$x_book] ?></td>
                            <?php $sql_check_if_borrowed = "SELECT COUNT(*) FROM borrow where (returned = 0) and bookid = $bookid[$x_book];";
                            $check_if_borrowed = mysqli_query($conn, $sql_check_if_borrowed);
                            $check_if_borrowed = $check_if_borrowed->fetch_array();
                            $check_if_borrowed = intval($check_if_borrowed[0]);
                            if ($check_if_borrowed == 0) {
                                ?><td>Available</td><?php
                            } else {
                                ?><td>Unavailable</td><?php
                            }?>
                            </tr>
                            <?php $count_book += 1;
                            $x_book += 1; // plus 1 for every book searched
                        }
                    }

                    if ($count_book < 2) {
                        echo $count_book . " Result Displayed";
                    } else {
                        echo $count_book . " Results Displayed";
                    }?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
