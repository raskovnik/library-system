<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body style="margin: auto; vertical-align: middle;">
        <?php
            include "navbar.php";
            include "../scripts/connect.php";
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        ?>
        <center>
            <h2>Languages and Tools Used</h2>
            <ol>
                <li>Javascript</li>
                <li>HTML</li>
                <li>PHP</li>
                <li>CSS</li>
                <li>MySQL</li>
            </ol>
            <br>
            <h2>Contributors</h2>
            <ol>
                <li>Anthony Mwangi</li>
                <li>Braxton Lama</li>
                <li>Maxwell Gacuca</li>
            </ol>
        </center>
    </body>
</html>