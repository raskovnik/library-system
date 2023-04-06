<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Books</title>
</head>
<body>
    <?php
        include "../pages/navbar.php";
        include "../scripts/connect.php";
        $book = $_GET["book"];
        $sql = "SELECT * FROM `books` WHERE `Description` LIKE '%$book%' OR `Category` LIKE '%$book%' OR `Title` LIKE '%$book%'";
        $result = mysqli_query($conn, $sql);
        $pages = ceil(mysqli_num_rows($result) / 8);
        $page = $_GET["page"];
        render($page, $result);
        function render($page, $result) {
            session_start();
            for ($i = 0; $i < 2; $i++) {
                echo '<div class="row">';
                try {
                    for ($j = 1; $j <= 4; $j++) {
                        $book = mysqli_fetch_assoc($result);
                        if (!is_null($book)) {
                            if ($j % 4 != 0) {
                                echo '<div class="col-4">';
                                    echo '<a href="bookDescription.php?isbn='.$book["ISBN"].'">';
                                    echo '<img src="../images/'.$book["image"].'" style="width: 200px; height: 300px; margin: 3px; background-color: powderblue; text-align: center; border-radius: 20px; padding: 5px; box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);">';
                                    echo '<h4>'.$book["Title"].'</h4>';
                                    echo '<span><b>ISBN</b>: '.$book["ISBN"].'</span>';
                                    echo '<p><b>Author</b>: '.$book["Author"].'</p>';
                                    echo '</a>';
                            echo '</div>';
                            } else {
                                echo '<div class="col-4">';
                                    echo '<a href="bookDescription.php?isbn='.$book["ISBN"].'">';
                                    echo '<img src="../images/'.$book["image"].'" style="width: 200px; height: 300px; margin: 3px; background-color: powderblue; text-align: center; border-radius: 20px; padding: 5px; box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);">';
                                    echo '<h4>'.$book["Title"].'</h4>';
                                    echo '<span><b>ISBN</b>: '.$book["ISBN"].'</span>';
                                    echo '<p><b>Author</b>: '.$book["Author"].'</p>';
                                    echo '</a>';
                            echo '</div>';
                                break;
                            }
                        } else {
                            break;
                        }
                    }
                } catch (Exception) {
                    break;
                }
                echo '</div>';
            }
        }
    ?>
        <div class="page-btn">
            <?php
                for ($i = 1; $i <= $pages; $i++) {
                    if ($i == $page) {
                        echo '<span style="background: #ff523b;"><a href="books.php?page='.$i.'">'.$i.'</a></span>';
                    } else {
                        echo '<span><a href="search.php?book='.$book.'&page='.$i.'">'.$i.'</a></span>';
                    }
                }
                if ($i < $_SESSION["pages"]) {
                    echo '<span><a href="books.php?page='.$i.'">'.$i.'</a></span>';
                }
            ?>
        </div>
</body>
</html>