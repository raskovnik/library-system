<?php
    include "../scripts/connect.php";
    session_start();
    include "access.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Overdue Books</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style1.css">
    </head>
    <body>
        <center><h2>Overdue Books</h2></center>
        <table style="width: auto; height: auto; margin-left: 600px; margin-top: 5px; border-top-left-radius: 15px; border-bottom-left-radius: 15px; border-top-right-radius: 15px; border-bottom-right-radius: 15px; background-color: powderblue; align-items: auto; text-align: center; padding:20px;">
        <a href="dashboard.php"><button>Back to Dashboard</a>
            <tr>
                <th>ID</th>
                <th>Registration Number</th>
                <th>ISBN</th>
                <th>Title</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Penalty</th>
            </tr>
            <?php
                $sql = "SELECT * FROM `borrow` WHERE `return_date`<CURDATE()";
                // $sql = "SELECT * FROM `borrow`";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $count = 1;
                    $total_penalty = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $isbn = $row["isbn"];
                        $book = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `books` WHERE ISBN=$isbn"));
                        // $penalty = ((date("Y-m-d") - $row["return_date"]));
                        $penalty =  round((time() - strtotime($row["return_date"])) / (60 * 60 * 24)) * 15;
                        $total_penalty+=$penalty;
                        echo '<tr>';
                            // echo '<td><a href="viewrequest.php?reg='.$row["reg"].'">'.$count.'</a></td>';
                            echo '<td>'.$count.'</td>';
                            echo '<td>'.$row["reg"].'</td>';
                            echo '<td>'.$row["isbn"].'</td>';
                            echo '<td>'.$book["Title"].'</td>';
                            echo '<td>'.$row["borrow"].'</td>';
                            echo '<td>'.$row["return_date"].'</td>';
                            echo '<td>Ksh. '.number_format($penalty, 2).'</td>';
                            $count += 1;
                        echo '</tr>';
                    }
                    echo '<tr>';
                    echo '<td colspan="6"><b>Totals</b></td>';
                    // echo '<td><center><b>'.$books.'</b></center></td>';
                    echo '<td><center><b>Ksh. '.number_format($total_penalty, 2).'</b></center></td>';
                    echo '</tr>';
                }
            ?>
        </table>
    </body>
</html>