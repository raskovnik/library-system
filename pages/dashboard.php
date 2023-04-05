<!DOCTYPE <!DOCTYPE html>
<?php
    include "../scripts/connect.php";
    include "access.php";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../css/style1.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
                    <li><a href="overdue.php">
                        <!-- <i class="fa fa-user fa-2x"></i> -->
                        <i class="bi-alarm" style="font-size: 1rem; text-align: left; color: red;"></i>
                        <span class="nav-item">Overdue Books</span>
                        <?php
                            $overdue = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `borrow` WHERE `return_date`<CURDATE()"));
                        ?>
                        <span class="badge" style="color: cyan; border-radius: 50%;"><?php echo $overdue?></span>
                    </a></li>
                    <li><a href="requests.php">
                        <i class="bi bi-book" style="font-size: 1rem; text-align: left;"></i>
                        <span class="nav-item">Borrow Requests</span>
                        <?php
                            $requests = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `requests`"));
                        ?>
                        <span class="badge" style="color: cyan; border-radius: 50%;"><?php echo $requests?></span>
                    </a></li>
                    <li><a href="reset.php">
                        <i class="bi bi-bootstrap-reboot" style="font-size: 1rem;"></i>
                        <span class="nav-item">Reset Password</span>
                    </a></li>
                    <li><a href="replace.php">
                        <i class="bi bi-journal-plus" style="font-size: 1rem;"></i>
                        <span class="nav-item" style="text-align: left;">Replace Books</span>
                    </a></li>
                    <li><a href="logout.php" class="logout">
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
                            <input type="text" name="reg" id="reg" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);">                        </form>
                        <script>
                            function generateInvoice() {
                                var reg = document.getElementById("reg").value;
                                if (reg) {
                                    location.href="invoice.php?reg="+reg;
                                } else {
                                    window.alert("You need to enter a registration number");
                                }
                            }
                        </script>
                        <button name="gen" id="gen" onclick=generateInvoice()>Issue Invoice</button>
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
                <div class="card" style="position:absolute; right:500px;">
                    <i class="fa fa-remove fa-2x"></i>
                    <h3>Return Books</h3>
                    <p>Accept or Reject Borrowed Books</p>
                    <form id="RegForm" method="POST" action="dashboard.php">
                            ISBN: <input type="text" name="isbn" id="isbn" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);">
                            REGISTRATION NUMBER: <input type="text" name="reg-no" id="reg-no" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);">
                            <button name="accept" id="accept" style="width:100%; height: 30px; border-radius:10px; padding: 7px 15px; margin-top: 15px ;cursor: pointer;background-color: green;">Accept</button>
                            <button name="reject" id="reject" style="width:100%; height: 30px; border-radius:10px; padding: 7px 15px; margin-top: 15px ;cursor: pointer;background-color: red;">Reject</button>                            
                            <?php
                            if (array_key_exists("reject", $_POST)) {
                                $isbn = $_POST["isbn"];
                                $reg = $_POST["reg-no"];
                                $quantity = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `books` WHERE ISBN=$isbn"));
                                $q = $quantity["Quantity"];
                                $p = $quantity["Price"];
                                $updatelost = mysqli_query($conn, "INSERT INTO `lost`(`reg`, `isbn`, `price`) VALUES('$reg', '$isbn', $p)");
                                if ($updatelost) {
                                    $updatebooks = mysqli_query($conn, "UPDATE `books` SET `QUANTITY`=$q - 1  WHERE ISBN=$isbn");
                                    $removeborrow = mysqli_query($conn, "DELETE * FROM `borrow` WHERE reg=$reg");
                                }
                                if ($updatebooks && $updatelost && $removeborrow) {
                                    echo "updated records";
                                } else {
                                    echo "error updating records";
                                }                            
                            }

                            if (array_key_exists("accept", $_POST)) {
                                $isbn = $_POST["isbn"];
                                $reg = $_POST["reg-no"];
                                $quantity = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `books` WHERE ISBN=$isbn"));
                                $q = $quantity["Quantity"];
                                $removeborrow = mysqli_query($conn, "DELETE FROM `borrow` WHERE reg='$reg'");
                                if ($removeborrow) {
                                    $updatecount = mysqli_query($conn, "UPDATE `books` SET `QUANTITY`=$q + 1  WHERE ISBN=$isbn");  
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
                            Quantity: <input type="number" min="1" name="qty" id="qty" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);">
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