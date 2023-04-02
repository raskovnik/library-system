<?php
    include "../scripts/connect.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style1.css">
    </head>
    <body>
        <?php
            $reg = $_GET["reg"];
            $sql = "SELECT * FROM `lost`  WHERE `reg`=$reg";
        ?>

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
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $count = 1;
                    $books = 0;
                    $cost = 0;
                    echo '<tr>';
                        echo '<td colspan="5"><center>Lost Books</center></td>';
                    echo '</tr>';
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
                    echo '</tr>';
                    $overdue = mysqli_query($conn, "SELECT * FROM `borrow` WHERE `reg`=$reg AND `return_date`<CURDATE()");
                    echo '<tr>';
                        echo '<td colspan="5"><center>Overdue Books</center></td>';
                    echo '</tr>';

                    if ($overdue) {
                        $count = 1;
                        $total_penalty = 0;
                        while ($row = mysqli_fetch_assoc($overdue)) {
                            $isbn = $row["isbn"];
                            $book = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `books` WHERE ISBN=$isbn"));
                            $penalty =  round((time() - strtotime($row["return_date"])) / (60 * 60 * 24)) * 15;
                            $total_penalty+=$penalty;
                            echo '<tr>';
                                echo '<td>'.$count.'</td>';
                                echo '<td>'.$row["reg"].'</td>';
                                echo '<td>'.$row["isbn"].'</td>';
                                echo '<td>'.$book["Title"].'</td>';
                                echo '<td>Ksh. '.number_format($penalty, 2).'</td>';
                                $count += 1;
                            echo '</tr>';
                        }
                        echo '<tr>';
                            echo '<td colspan="4"><b>Totals</b></td>';
                            echo '<td><center><b>Ksh. '.number_format($total_penalty, 2).'</b></center></td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td colspan="4"><b>Grand Total</b></td>';
                        echo '<td><center><b>Ksh. '.number_format($total_penalty + $cost, 2).'</b></center></td>';
                    echo '</tr>';
                    }
                }
            ?>
            <a href="dashboard.php"><button>Back</a>
        </table>
    </body>
</html>