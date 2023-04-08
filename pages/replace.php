<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style.css">

    <title>Replace Lost Books</title>
</head>
<body>
    <form id="RegForm" method="POST" action="replace.php">
        ISBN: <input type="text" name="isbn" id="isbn" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);">
        REGISTRATION NUMBER: <input type="text" name="reg-no" id="reg-no" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);">
        <button name="accept" id="accept" style="width:100%; height: 30px; border-radius:10px; padding: 7px 15px; margin-top: 15px ;cursor: pointer;background-color: green;">Accept</button>        
        <a href="dashboard.php"><button>Back to Dashboard</a>
        <?php
            include "../scripts/connect.php";
            include "access.php";
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if (array_key_exists("accept", $_POST)) {
                $isbn = $_POST["isbn"];
                $reg = $_POST["reg-no"];
                $sql = "DELETE FROM `lost` WHERE `reg`=$reg AND `isbn`=$isbn";
                if (mysqli_query($conn, $sql)) {
                    echo '<script>window.alert("Updated records successfully")</script>';
                }
            }
        ?>
    </form>
</body>
</html>