<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "../pages/navbar.php";
        $book = $_GET["book"];
        $sql = "SELECT * FROM `books` WHERE `Description` LIKE '%$book%' OR `Category` LIKE '%$book%' OR `Title` LIKE '%$book%'";
        $result = mysqli_query($conn, $sql);;
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $count = mysqli_num_rows($result);
                $ind = 1;
                $rows = ceil($count / 4);
                for ($i = 0; $i < $rows; $i++) {
                    echo '<div class="row">';
                    while ($ind <= $count) {
                        $book = mysqli_fetch_assoc($result);
                        if ($ind % 4 != 0) {
                            echo '<div class="col-4">';
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
                            echo '</div>';
                            $ind += 1;
                        } else {
                            echo '<div class="col-4">';
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
                            echo '</div>';
                            $ind += 1;
                            break;
                        }
                    }
                    echo '</div>';
                }
            } else {
                echo "<div style='height: 200px;
                width: 400px;            
                position: fixed;
                top: 50%;
                left: 50%;
                margin-top: -100px;
                margin-left: -200px;'>No book(s) found</div>";
            }
        }
    ?>
</body>
</html>