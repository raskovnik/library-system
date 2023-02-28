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
    <div class="container">
        <div class="navbar">
            <form method="POST">
                <input type="text" name="search" style="width: 65%" placeholder="Search Books">
                <input type="submit" name="submit" value="Search" style="width: 30%">
            </form>
            <nav>
                <ul id="MenuItems">
                    <li><a href="index.html">Home</a></li>
                    <!-- <li><a href="index.html">Resources</a></li> -->
                    <li><a href="index.html">Contact</a></li>
                    <li><a href="index.html">About</a></li>
                    <li><a href="login.html">Account</a></li>
                </ul>
            </nav>
        </div>

    </div>
    <?php
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
                while ($ind <= $count) {
                    $book = mysqli_fetch_assoc($result);
                    if ($ind % 4 != 0) {
                        echo '<div class="col-4">';
                            echo '<img src="../images/'.$book["image"].'">';
                            echo '<h4>'.$book["Title"].'</h4>';
                            echo '<span><b>ISBN</b>: '.$book["ISBN"].'</span>';
                            echo '<p><b>Author</b>: '.$book["Author"].'</p>';
                        echo '</div>';
                        $ind += 1;
                    } else {
                        echo '<div class="col-4">';
                            echo '<img src="../images/'.$book["image"].'">';
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
        }
    ?>

    <div class="page-btn">
        <span>1</span>
        <span><a href="#">2</a></span>
        <span><a href="#">3</a></span>
        <span>4</span>
        <span>&#8594;</span>

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