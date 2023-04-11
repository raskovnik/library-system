<?php
    include "../scripts/connect.php";
    session_start();
    include "access.php";
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
            $sql = "SELECT * FROM `requests`  WHERE `reg`=$reg";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($query);
        ?>
        <form method="POST">
            <label>Registration Number</label>
            <input type="text" disabled="true"  name="reg" id="reg" <?php echo 'value='.$result["reg"].''?>>
            <label>ISBN</label>
            <input type="text" disabled="true"  name="isbn" id="isbn" <?php echo 'value='.$result["isbn"].''?>>
            <label>Borrow Date</label>
            <input type="text" disabled="true" name="b_date" id="b_date" <?php echo 'value='.$result["request_date"].''?>>
            <label>Return Date</label>
            <input type="text" disabled="true" name="r_date" id="r_date" <?php echo 'value='.date("Y/m/d", strtotime($result["request_date"]."+ 14 days")).'';?>>
            <input type="submit" name="approve" id="approve" value="Approve" class="btn" style="width: 25%; background-color: green;">
            <input type="submit" name="reject" id="reject" value="Reject" class="btn" style="width: 25%; background-color: red;">
        </form>
        <a href="dashboard.php"><button>Back to Dashboard</a>

        <?php
            if (array_key_exists("approve", $_POST)) {
                $borrow_date = $result["request_date"];
                $return_date = date("Y/m/d", strtotime($result["request_date"]."+ 14 days"));
                $isbn = $result["isbn"];
                $sql = "INSERT INTO `borrow`(`reg`,`isbn`,`borrow`,`return_date`) VALUES('$reg','$isbn','$borrow_date', '$return_date')";
                // $sql = "INSERT INTO `borrow`(`reg`, `isbn`, `borrow`, `return_date`) VALUES('1234', '123455434', '2023/3/21', '2023/4/4')";
                $res = mysqli_query($conn, $sql);
                if ($res) {
                    $sql = "DELETE FROM `requests`  WHERE `reg`=$reg";
                    $del = mysqli_query($conn, $sql);
                    if ($del) {
                        $quantity = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `books` WHERE `isbn`=$isbn"))["Quantity"];
                        $q = $quantity - 1;
                        $upd = mysqli_query($conn, "UPDATE `books` SET `Quantity`=$q WHERE `isbn`=$isbn");
                        if ($upd) {
                            echo "Book approved Successfully. To be returned on '.$return_date.'";
                            header("location:requests.php");
                        }
                    }
                } else {
                    echo "Error approving book borrow";
                }
            }

            if (array_key_exists("reject", $_POST)) {
                $sql = "DELETE FROM `requests`  WHERE `reg`=$reg";
                $del = mysqli_query($conn, $sql);
                if ($del) {
                    header("location:requests.php");
                }
            }
        ?>
    </body>
</html>