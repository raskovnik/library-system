<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Info</title>
    <link rel="stylesheet" href="../css/books.css">
</head>
<body>
    <?php
        include "navbar.php";
        include "../scripts/connect.php";
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    ?>
    <?php
        $isbn = $_GET["isbn"];
        $pending = 0;
        if (isset($_SESSION["user"])) {
            $user = $_SESSION["user"];
            $pending = mysqli_num_rows(
                mysqli_query($conn, "SELECT * FROM `borrow` WHERE `reg`=$user")) + 
                mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `lost` WHERE `reg`=$user"));
        }
        
        $_SESSION["page"] = "bookDescription.php?isbn=$isbn";
        $sql = "SELECT * FROM `books` WHERE `ISBN`=$isbn";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            echo '<div class="col-4">';
                echo '<div class="flex-container">';
                    echo '<div><img src="../images/'.$row["image"].'" style="width: 180px; width: 100%;
                    margin: 3px;
                    background-color: powderblue;
                    text-align: center;
                    border-radius: 20px;
                    padding: 5px;
                    box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);"></div>';
                    echo '<div>';
                        echo '<p><b>Author</b></p>';
                        echo '<p color="green"><a href="#">'.$row["Author"].'</a></p>';
                        echo '<br>';
                        echo '<p><b>Description</b></p>';
                        echo '<p>'.$row["Description"].'</p>';
                        echo '<br>';
                        echo '<p><b>Category</b></p>';
                        echo '<p>'.$row["Category"].'</p>';
                        echo '<br>';
                        echo '<p><b>Copies Available</b></p>';
                        echo '<p>'.$row["Quantity"].'</p>';
                        echo '<br>';
                        echo '<p><b>Price</b></p>';
                        echo '<p>Ksh. '.number_format($row["Price"], 2).'</p>';
                        echo '<div>';
                        echo '<form method="POST">';
                            if ($pending != 0) {
                                echo '<input type="submit" class="btn1" name="borrow" id="borrow" value="Borrow Book" disabled="true">';
                            } else {
                                echo '<input type="submit" class="btn" name="borrow" id="borrow" value="Borrow Book"">';
                            }
                        echo '</form>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<h3>Similar Books</h3>';
            echo '<br>';
            echo '<br>';

            if (array_key_exists("borrow", $_POST)) {
                $date = date("Y/m/d");
                if (isset($_SESSION["user"])) {
                    $sesh_user = $_SESSION["user"];
                    $sql = "INSERT INTO `requests` VALUES('$sesh_user', '$isbn', '$date')"; 
                    $query = mysqli_query($conn, $sql);
                    if ($query) {
                        $return_date = date("Y/m/d", strtotime($date."+ 14 days"));
                        $borrows = mysqli_query($conn, "INSERT INTO `allborrows`(`reg`, `isbn`, `borrow`, `return_date`) VALUES('$sesh_user','$isbn','$date', '$return_date')");
                        header("location:index.php");
                    } else {
                        echo '<script>window.alert("Can\'t borrow the book at the moment");</script>';
                    }
                } else {
                    echo '<script>alert("You need to Login to borrow a book");</script>';
                }
            }

            $tag = $row["Category"];
            $sql = "SELECT * FROM `books` WHERE Category LIKE '%$tag%' and ISBN!=$isbn";
            $similar = mysqli_query($conn, $sql);

            if ($similar) {
                if (mysqli_num_rows($similar) > 0) {
                    $count = 1;
                    echo '<div class="row">';
                    while ($count <= 4 && $book = mysqli_fetch_assoc($similar)) {
                        echo '<div class="col-4">';
                            echo '<a href="bookDescription.php?isbn='.$book["ISBN"].'">';
                            echo '<img src="../images/'.$book["image"].'" style="width: 180px;
                                        margin: 3px;
                                        background-color: powderblue;
                                        text-align: center;
                                        border-radius: 20px;
                                        padding: 5px;
                                        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);">';
                            echo '<h4>'.$book["Title"].'</h4>';
                            echo '<span><b>ISBN</b>: '.$book["ISBN"].'</span>';
                            echo '<p><b>Author</b>: '.$book["Author"].'</p>';
                        echo '</a>';
                    echo '</div>';
                        $count += 1;
                    }
                    echo '</div>';
                }
            }
            
        } else {
            echo "<div style='height: 200px;
            width: 400px;            
            position: fixed;
            top: 50%;
            left: 50%;
            margin-top: -100px;
            margin-left: -200px;'>Error occurred while fetching item</div>";
        }
        ?>
</body>
</html>