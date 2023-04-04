<?php
    include "../scripts/connect.php";
    session_start();
    include "access.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Borrow Requests</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style1.css">
    </head>
    <body>
        <?php
            $reg = $_GET["reg"];
            $sql = "SELECT * FROM `lost`  WHERE `reg`=$reg";
        ?>

        <center><h2>Borrow Requests</h2></center>
        <table style="width: auto; height: auto; margin-left: 400px; margin-top: 5px; border-top-left-radius: 15px; border-bottom-left-radius: 15px; border-top-right-radius: 15px; border-bottom-right-radius: 15px; background-color: powderblue; align-items: center; text-align: center; padding:20px;">
            <tr>
                <th>ID</th>
                <th>Registration Number</th>
                <th>ISBN</th>
                <th>Title</th>
                <th>Borrow Date</th>
            </tr>
            <?php
                $sql = "SELECT * FROM `requests`";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $isbn = $row["isbn"];
                        $book = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `books` WHERE ISBN=$isbn"));
                        echo '<tr>';
                            echo '<td><a href="viewrequest.php?reg='.$row["reg"].'">'.$count.'</a></td>';
                            echo '<td>'.$row["reg"].'</td>';
                            echo '<td>'.$row["isbn"].'</td>';
                            echo '<td>'.$book["Title"].'</td>';
                            echo '<td>'.$row["request_date"].'</td>';
                            $count += 1;
                        echo '</tr>';
                    }
                }
            ?>
            <a href="dashboard.php"><button>Back to Dashboard</a>
        </table>
    </body>
</html>