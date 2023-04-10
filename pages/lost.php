<!DOCTYPE html>
<?php
    include "../scripts/connect.php";
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">

        <title>Lost Books</title>
    </head>
    <body>
        <center><h2>Lost Books</h2></center>
        <table>
            <tr>
                <th>ID</th>
                <th>Registration Number</th>
                <th>ISBN</th>
                <th>Title</th>
                <th>Price</th>
            </tr>
            <?php
                $sql = "SELECT * FROM `lost`";
                $result = mysqli_query($conn, $sql);
                if ($result) {;
                    $count = 1;
                    $books = 0;
                    $cost = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $isbn = $row["isbn"];
                        $book = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `books` WHERE ISBN=$isbn"));
                        echo '<tr>';
                            echo '<td>'.$row["id"].'</td>';
                            echo '<td>'.$row["reg"].'</td>';
                            echo '<td>'.$row["isbn"].'</td>';
                            echo '<td>'.$book["Title"].'</td>';
                            echo '<td>Ksh. '.number_format($row["price"], 2).'</td>';
                            $count += 1;
                            $books += 1;
                            $cost += $row["price"];
                        echo '</tr>';
                    }
                    echo '<tr>';
                        echo '<td colspan="3"><b>Totals</b></td>';
                        echo '<td><center><b>'.$books.'</b></center></td>';
                        echo '<td><center><b>Ksh. '.number_format($cost, 2).'</b></center></td>';
                }
            ?>
            <a href="dashboard.php"><button>Back to Dashboard</a>
        </table>
        <button onclick="window.print()">Print</button>
    </body>
</html>