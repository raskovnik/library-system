<!DOCTYPE html>
<?php
    include "../scripts/connect.php";
    session_start();
    include "access.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style.css">

    <title>All Books Report</title>
</head>
<body>
    <center><h2>All Books</h2></center>
    <table>
        <tr>
            <th>ID</th>
            <th>ISBN</th>
            <th>Title</th>
            <th>Copies Available</th>
            <th>Price</th>
        </tr>
        <?php
            $sql = "SELECT * FROM `books`";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $count = 1;
                $books = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                        echo '<td>'.$count.'</td>';
                        echo '<td>'.$row["ISBN"].'</td>';
                        echo '<td>'.$row["Title"].'</td>';
                        echo '<td>'.$row["Quantity"].'</td>';
                        echo '<td>Ksh. '.number_format($row["Price"], 2).'</td>';
                        $count += 1;
                        $books += $row["Quantity"];
                    echo '</tr>';
                }
                echo '<tr>';
                    echo '<td colspan="3"><b>Total Books</b></td>';
                    echo '<td><center><b>'.$books.'</b></center></td>';
            }
        ?>
        <a href="dashboard.php"><button>Back to Dashboard</a>
    </table>
</body>
</html>