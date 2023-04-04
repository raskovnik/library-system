<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if ($_SESSION["user"] != "admin") {
        // header('WWW-Authenticate: Basic realm=“Test restricted area”');
        $page = $_SESSION["page"];
        if (is_null($page)) {
            header("location:index.php");
        } else {
            header("location:$page");
        }
    }
?>