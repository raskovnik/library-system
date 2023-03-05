<!DOCTYPE html>
<html lang="en">
    <head>
        <meta chartset="UFT-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Books</title>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        <?php
            include "navbar.php";
            session_start();
            include "../scripts/connect.php";
            $sql = "SELECT * FROM `books`";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $count = mysqli_num_rows($result);
                $ind = 1;
                $rows = ceil($count / 4);
                for ($i = 0; $i < $rows; $i++) {
                    echo '<div class="row">';
                    while ($ind <= 8) {
                        $book = mysqli_fetch_assoc($result);
                        if ($ind % 4 != 0) {
                            echo '<div class="col-4">';
                                echo '<a href="bookDescription.php?isbn='.$book["ISBN"].'">';
                                echo '<img src="../images/'.$book["image"].'">';
                                echo '<h4>'.$book["Title"].'</h4>';
                                echo '<span><b>ISBN</b>: '.$book["ISBN"].'</span>';
                                echo '<p><b>Author</b>: '.$book["Author"].'</p>';
                                echo '</a>';
                            echo '</div>';
                            $ind += 1;
                        } else {
                            echo '<div class="col-4">';
                                echo '<a href="bookDescription.php?isbn='.$book["ISBN"].'">';
                                echo '<img src="../images/'.$book["image"].'">';
                                echo '<h4>'.$book["Title"].'</h4>';
                                echo '<span><b>ISBN</b>: '.$book["ISBN"].'</span>';
                                echo '<p><b>Author</b>: '.$book["Author"].'</p>';
                                echo '</a>';
                            echo '</div>';
                            $ind += 1;
                            break;
                        }
                    }
                    echo '</div>';
                }
            }
        ?>

        <div class="page-btn">
            <?php
                $pages = ceil($count / 8);
                $_SESSION["pages"] = $pages;
                $page = 1;
                $pages = $page + ($_SESSION["pages"] - $page);
                for ($i = $page; $i <= $pages; $i++) {
                    if ($i == 1) {
                        echo '<span style="background: #ff523b;"><a href="index.php">'.$i.'</a></span>';
                    } else {
                        echo '<span><a href="books.php?page='.$i.'">'.$i.'</a></span>';
                    }
                }
                if ($i < $_SESSION["pages"]) {
                    echo '<span><a href="books.php?page='.$i.'">'.$i.'</a></span>';
                }
            ?>
        </div>

        </div> 
        <!--js for toggle menu-->
        <script>
            var MenuItems = document.getElementById("MenuItems")
            MenuItems.style.maxHeight = "0px";

            function menutoggle(){
                if(MenuItems.style.maxHeight == "0px")
                    {
                        MenuItems.style.maxHeight = "200px";
                    }
                else
                    {
                        MenuItems.style.maxHeight = "0px";
        
                    }

            }
        </script>

    </body>
</html>