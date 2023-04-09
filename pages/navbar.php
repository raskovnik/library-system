<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-wZsYN0TcWbpg8xGy+NTtTzGSLAAsV7/Z8K0TBuV7oLeQJ4fi4ddX4E4zKl+TGPTBwDrM13VpGWjCxuI7VGlGGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
</head>
<body>
    <header>
        <div class="search-bar">
            <form class="search-form" method="POST" action="navbar.php">
                <input required type="text" name="search" placeholder="Search Books" style="width: 50%; border-radius: 10px;">
                <input type="submit" name="submit" value="Search" style="width: 25%; cursor: pointer; border-radius: 10px;">
            </form>      
        </div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

        <nav class="nav-bar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php">Contact</a></li>
                <li><a href="index.php">About</a></li>
                <li>
                    <div class="dropdown">
                        <?php
                            include "../scripts/connect.php";
                            session_start();
                            if (isset($_SESSION["user"])) {
                                $user = $_SESSION["user"];
                                $pending = mysqli_num_rows(
                                    mysqli_query($conn, "SELECT * FROM `borrow` WHERE `reg`=$user")) + 
                                    mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `lost` WHERE `reg`=$user"));
                                if ($pending != 0) {
                                    echo '<a href="#">Account <span class="badge badge-danger"><i class="bi bi-exclamation-circle" style="font-size: 1.3rem;"></i></span></a>';
                                    echo '<div class="dropdown-content" style="text-align: left;">';
                                        echo '<a href="invoice.php?reg='.$_SESSION["user"].'">Lost and Overdue Books</a>';
                                        echo '<a href="logout.php">Log Out</a>';
                                    echo '</div>';
                                } else {
                                    echo '<a href="#">Account</a>';
                                    echo '<div class="dropdown-content" style="text-align: left;">';
                                        echo '<a href="invoice.php?reg='.$_SESSION["user"].'">Lost and Overdue Books</a>';
                                        echo '<a href="logout.php">Log Out</a>';
                                }
                                echo '</div>';
                            } else {
                                echo '<a href="login.php">Account</a>'; 
                            }
                        ?>
                    </div> 
                </li>
            </ul>
        </nav>        
    </header>
    <?php
            include "../scripts/connect.php";
            if (isset($_POST["submit"])) {
                $book = $_POST["search"];
                if (!is_null($book) && $book != "") {
                    header("location:search.php?book=$book&page=1");
                } else {
                    header("location:../pages/index.php");
                }
            }
    ?>

    <script>
        hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function() {
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>
</body>
</html>