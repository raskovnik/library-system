<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
            <div class="navbar">
                <form method="POST" action="navbar.php">
                    <input required type="text" name="search" style="width: 65%" placeholder="Search Books">
                    <input type="submit" name="submit" value="Search" style="width: 30%">
                </form>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php">Home</a></li>
                        <!-- <li><a href="index.html">Resources</a></li> -->
                        <li><a href="index.html">Contact</a></li>
                        <li><a href="index.html">About</a></li>
                        <li><a href="login.php">Account</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <?php
            include "../scripts/connect.php";
            if (isset($_POST["submit"])) {
                $book = $_POST["search"];
                if (!is_null($book) && $book != "") {
                    header("location:search.php?book=$book");
                } else {
                    header("location:../pages/index.php");
                }
            }
        ?>
</body>
</html>