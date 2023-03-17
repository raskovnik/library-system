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
        <link href="css/style1.css" rel="stylesheet">
    </head>
    <body>
        <?php
            $reg = $_GET["reg"];
            $sql = "SELECT * FROM `lost`  WHERE `reg`=$reg";
            $res = mysqli_query($conn, $sql);
        ?>
    </body>
</html>