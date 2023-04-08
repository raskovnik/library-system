<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reset Password</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/style.css">

    </head>
    <body>
    <article>
    <form method="POST" action="reset.php">
        <label>Registration Number</label><br>
        <input required type="text" class="form-input" id="reg-no" name="reg-no" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);"><br>
        <label>Password</label><br>
        <input required type="password" class="form-input" id="pwd" name="pwd" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);"><br>
        <label>Confirm Password</label><br>
        <input required type="password" class="form-input" id="cpwd" name="cpwd" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);"><br><br>
        <input type="submit" class="submit" id="submit" value="Reset Password" name="submit" style="width:100%; height: 30px; border-radius:10px; padding: 7px 15px; margin-top: 15px ;cursor: pointer;background-color: rgba(0, 0, 89, 0.452);"><br><br>
        <a href="dashboard.php"><button>Back to Dashboard</a>
    </form>
	</article>
    <?php
        include "../scripts/connect.php";
        include "access.php";
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $reg =  $_POST["reg-no"];
            $pwd =  $_POST["pwd"];
            $cpwd =  $_POST["cpwd"];

            if ($pwd == $cpwd) {
                $sql = "SELECT * FROM `users` WHERE reg=$reg";
                if (mysqli_num_rows(mysqli_query($conn, $sql)) < 1) {
                    echo '<script>window.alert("You don\'t have an account")</script>';
                } else {
                    $sql = "UPDATE `users` SET `password`=$pwd WHERE `reg`=$reg";
                    if (mysqli_query($conn, $sql)) {
                        echo '<script>window.alert("Changed password successfully")</script>';
                    } else {
                        echo '<script>window.alert("Error trying to change password")</script>';
                    }
                }
            }
            else {
                echo '<script>window.alert("Enter matching passwords")</script>';
            }
        }
    ?>
    </body>
</html>