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
            $sql = "SELECT * FROM `requests`  WHERE `reg`=$reg";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($query);
        ?>
        <form method="POST" action="viewrequest.php">
            <label>Registration Number</label>
            <input type="text" disabled="true"  name="reg" id="reg" <?php echo 'value='.$result["reg"].''?>>
            <label>ISBN</label>
            <input type="text" disabled="true"  name="isbn" id="isbn" <?php echo 'value='.$result["reg"].''?>>
            <label>Borrow Date</label>
            <input type="text" disabled="true" name="b_date" id="b_date" <?php echo 'value='.$result["request_date"].''?>>
            <label>Return Date</label>
            <input type="text" disabled="true" name="r_date" id="r_date" <?php echo 'value='.date("Y/m/d", strtotime($result["request_date"]."+ 14 days")).''?>>
            <input type="submit" name="approve" id="approve" value="Approve" class="btn" style="width: 25%; background-color: green;">
            <input type="submit" name="reject" id="reject" value="Reject" class="btn" style="width: 25%; background-color: red;">
        </form>
        <a href="dashboard.php"><button>Back to Dashboard</a>
    </body>
</html>