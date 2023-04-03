<!DOCTYPE <!DOCTYPE html>
<?php
  include "../scripts/connect.php";
  session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../css/style1.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-wZsYN0TcWbpg8xGy+NTtTzGSLAAsV7/Z8K0TBuV7oLeQJ4fi4ddX4E4zKl+TGPTBwDrM13VpGWjCxuI7VGlGGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    </head>
    <body>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#" class="logo">
                        <img src="../images/images.jpeg">
                        <span class="nav-item">Dashboard</span>
                    </a></li>
                    <li><a href="">
                        <i class="fa fa-user fa-2x"></i>
                        <span class="nav-item">Home</span>
                    </a></li>
                    <li><a href="requests.php" class="notification">
                        <!-- <i class="fa fa-home fa-2x"></i> -->
                        <span class="nav-item">Borrow Requests</span>
                        <?php
                            $requests = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `requests`"));
                        ?>
                        <span class="badge" style="color: cyan; border-radius: 50%;"><?php echo $requests?></span>
                    </a></li>
                    <li><a href="">
                        <i class="fa fa-bar-chart fa-2x"></i>
                        <span class="nav-item">Analytics</span>
                    </a></li>
                    <li><a href="">
                        <i class="fa fa-cog fa-2x"></i>
                        <span class="nav-item">Settings</span>
                    </a></li>
                    <li><a href="" class="logout">
                        <i class="fa fa-sign-out fa-2x"></i>
                        <span class="nav-item">Log out</span>
                    </a></li>
                </ul>
            </nav>
            <section class="main">
                <div class="main-top">
                    <h1>Reports & Invoices</h1>
                    <i class="fa fa-user fa-2x"></i>
                </div>
                <div class="book">
                    <div class="card">
                        <i class="fa fa-file fa-2x"></i>
                        <h3>Reports</h3>
                        <p>Generation of reports for books</p>
                        <button onclick="location.href='lost.php';">Lost Books</button>
                        <button onclick="location.href='report.php';">All Books</button>
                    </div>
                <div class="card">
                    <i class="fa fa-file fa-2x"></i>
                    <h3>Invoices</h3>
                    <p>Issuing invoices to students with lost books</p>
                    <form method="POST" action="dashboard.php">
                        <label for="reg">Registration Number</label>
                        <input type="text" name="reg" id="reg" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);">
                        <button name="gen" id="name">Issue invoices</button>
                    </form>
                    <?php
                        if (array_key_exists("gen", $_POST)) {
                            $reg = $_POST["reg"];
                            $sql = "SELECT * FROM `lost`  WHERE `reg`=$reg";
                            $res = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res) >= 1) {
                                header("location:invoice.php?reg=$reg");
                            } else {
                                echo "Student has not lost any books";
                            }
                        }
                    ?>
                </div>
                </div>
                <section class="addremove">
                    <h1>Add & Remove</h1>
                    <div class="book">
                    <div class="card">
                        <i class="fa fa-solid fa-book fa-2x"></i>
                        <h3>Add Books</h3>
                        <p>Add new books to the database</p>
                        <button onclick="location.href='addBooks.php';">Add Books</button>                        
                    </div>
                <div class="card" style="position:absolute; right:600px;">
                    <i class="fa fa-remove fa-2x"></i>
                    <h3>Remove Books</h3>
                    <p>Remove lost or damaged books from the database</p>
                    <form id="RegForm" method="POST" action="dashboard.php">
                            ISBN: <input type="text" name="isbn" id="isbn" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);">
                            REGISTRATION NUMBER: <input type="text" name="reg-no" id="reg-no" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);">
                            <input type="submit" value="Submit" name="submit" onclick="alert('Submitted successfully')" style="width:100%; height: 30px; border-radius:10px; padding: 7px 15px; margin-top: 15px ;cursor: pointer;background-color: rgba(0, 0, 89, 0.452);">
                            <?php
                                if (isset($_POST["submit"])) {
                                $isbn = $_POST["isbn"];
                                $reg = $_POST["reg-no"];
                                $quantity = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `books` WHERE ISBN=$isbn"));
                                $q = $quantity["Quantity"];
                                $p = $quantity["Price"];
                                $updatelost = mysqli_query($conn, "INSERT INTO `lost`(`reg`, `isbn`, `price`) VALUES('$reg', '$isbn', $p)");
                                if ($updatelost) {
                                    $updatebooks = mysqli_query($conn, "UPDATE `books` SET `QUANTITY`=$q - 1  WHERE ISBN=$isbn");
                                }
                                if ($updatebooks && $updatelost) {
                                    echo "updated records";
                                } else {
                                    echo "error updating records";
                                }
                                }
                            ?>
                    </form>
                </div>
                <div class="card" style="position:absolute; right:100px;">
                    <i class="fa fa-refresh fa-2x" aria-hidden="true"></i>
                    <h3>Update Books</h3>
                    <p>Add books already existing in the database</p>
                    <form method="POST" action="dashboard.php">
                            ISBN: <input type="text" name="isbn" id="isbn" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);">
                            Quantity: <input type="number" name="qty" id="qty" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);">
                            <input type="submit" value="Submit" name="zubmit" onclick="alert('Submitted successfully')" style="width:100%; height: 30px; border-radius:10px; padding: 7px 15px; margin-top: 15px ;cursor: pointer;background-color: rgba(0, 0, 89, 0.452);">
                            <?php
                                if (isset($_POST["zubmit"])) {
                                    $isbn = $_POST["isbn"];
                                    $qty = $_POST["qty"];
                                    $curr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `books` WHERE ISBN=$isbn"))["Quantity"];
                                    if ($curr) {
                                        $qty+= $curr;
                                        $res = mysqli_query($conn, "UPDATE `books` SET Quantity=$qty WHERE ISBN=$isbn");
                                        if ($res) {
                                            echo "updated books";
                                        } else {
                                            echo "Error updating records";
                                        }
                                    }

                                }
                            ?>
                    </form>
                    
                </div>
                </div>
    </body>
</html>