<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if ($_SESSION["user"] != "admin") {
        $page = $_SESSION["page"];
        if (is_null($page)) {
            header("location:index.php");
        } else {
            header("location:$page");
        }
    }
?>