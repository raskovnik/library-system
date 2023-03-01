<!DOCTYPE>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <title>Books</title>
    </head>
    <body>
        <?php
            include "navbar.php";
            $page = $_GET["page"];
            render($page);
            function render($page) {
                session_start();
                include "../scripts/connect.php";
                $sql = "SELECT * FROM `books`";
                $result = mysqli_query($conn, $sql);
                mysqli_data_seek($result, ($page - 1)*8);
                for ($i = 0; $i < 2; $i++) {
                    echo '<div class="row">';
                    try {
                        for ($j = 1; $j <= 4; $j++) {
                            $book = mysqli_fetch_assoc($result);
                            if (!is_null($book)) {
                                if ($j % 4 != 0) {
                                    echo '<div class="col-4">';
                                        echo '<img src="../images/'.$book["image"].'">';
                                        echo '<h4>'.$book["Title"].'</h4>';
                                        echo '<span><b>ISBN</b>: '.$book["ISBN"].'</span>';
                                        echo '<p><b>Author</b>: '.$book["Author"].'</p>';
                                    echo '</div>';
                                } else {
                                    echo '<div class="col-4">';
                                        echo '<img src="../images/'.$book["image"].'">';
                                        echo '<h4>'.$book["Title"].'</h4>';
                                        echo '<span><b>ISBN</b>: '.$book["ISBN"].'</span>';
                                        echo '<p><b>Author</b>: '.$book["Author"].'</p>';
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
                $pages = $page + ($_SESSION["pages"] - $page);
                for ($i = $page - 1; $i <= $pages; $i++) {
                    if ($i == 1) {
                        echo '<span><a href="index.php">'.$i.'</a></span>';
                    } elseif ($i == $page) {
                        echo '<span style="background: #ff523b;"><a href="books.php?page='.$i.'">'.$i.'</a></span>';
                    } else {
                        echo '<span><a href="books.php?page='.$i.'">'.$i.'</a></span>';
                    }
                }
                if ($i < $_SESSION["pages"]) {
                    echo '<span><a href="books.php?page='.$i.'">'.$i.'</a></span>';
                }
            ?>
        </div>
    </body>
</html>