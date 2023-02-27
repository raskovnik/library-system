<?php
    $servername = "localhost";
    $dbname = "lms";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password);
    if (!$conn) {
        die("Error connnecting to database".mysqli_connect_error());
    }
    $db = mysqli_select_db($conn, $dbname);
?>