<!DOCTYPE>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<bod style="background: url('../images/bg.jpg'); background-size: cover; background-position: center;">
<article>
    <form method="POST" action="login.php">
        <label>Registration Number</label><br>
        <input required type="text" clas="form-input" id="reg-no" name="reg-no" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);"><br>
        <label>Password</label><br>
        <input required type="password" class="form-input" id="pwd" name="pwd" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);"><br><br>
        <input type="submit" class="submit" id="submit" value="Login" name="submit" style="width:100%; height: 30px; border-radius:10px; padding: 7px 15px; margin-top: 15px ;cursor: pointer;background-color: rgba(0, 0, 89, 0.452);"><br><br>
        <a href="forgot.php">Forgot Password</a><br><br>
        <a href="register.php">Create Account</a>
        <?php
            session_start();
            include "../scripts/connect.php";
            if (isset($_POST["submit"])) {
                $reg = $_POST["reg-no"];
                $pwd = $_POST["pwd"];
            }
            if($pwd == "admin" && $reg == "admin") {
                $_SESSION["user"] = "admin";
                header("location:dashboard.php");
            }
            $sql = "SELECT * FROM `users` WHERE reg=$reg";
            if (mysqli_num_rows(mysqli_query($conn, $sql)) >= 1) {
                $details = mysqli_fetch_assoc((mysqli_query($conn, $sql)));
                if ($details["password"] == $pwd) {
                    $_SESSION["user"] = $reg;
                    header("location:index.php");
                } else {
                    echo "Invalid login details";
                }
            } else {
                echo '<script>alert("Invalid login details")</script>';
                echo "Invalid login details";
            } 
        ?>
    </form>
    
	</article>
</body>
</html>