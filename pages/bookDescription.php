
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
        <link rel="stylesheet" href="../css/books.css">
</head>
<body>
    <?php
        include "navbar.php";
        include "../scripts/connect.php";
    ?>
    <?php
        $isbn = $_GET["isbn"];
        $sql = "SELECT * FROM `books` WHERE `ISBN`=$isbn";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            echo '<div class="col-4">';
                echo '<div class="flex-container">';
                    echo '<div><img style="width: 75%; padding: auto; margin: auto" src="../images/'.$row["image"].'"></div>';
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
                            echo '<input type="submit" class="btn" name="borrow" id="borrow" value="Borrow Book">';
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
                $sql = "INSERT INTO `requests` VALUES('234', '$isbn', '$date')";
                $query = mysqli_query($conn, $sql);
                if ($query) {
                    echo "added record";
                    header("location:index.php");
                } else {
                    echo "Error adding record to database";
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
                            echo '<img src="../images/'.$book["image"].'">';
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