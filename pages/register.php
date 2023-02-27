<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
<article>
    <form method="POST" action="register.php">
        <label>Name</label><br>
        <input required type="text" clas="form-input" id="name" name="name"><br>
        <label>Registration Number</label><br>
        <input required type="text" clas="form-input" id="reg-no" name="reg-no"><br>
        <label>Password</label><br>
        <input required type="password" class="form-input" id="pwd" name="pwd"><br>
        <label>Confirm Password</label><br>
        <input required type="password" class="form-input" id="cpwd" name="cpwd"><br><br>
        <input type="submit" class="submit" id="submit" value="Create Account" name="submit"><br><br>
        <a href="login.php">Already have an account?Login</a><br><br>
    </form>
	</article>
    <?php
        session_start();
        include "../scripts/connect.php";
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $reg =  $_POST["reg-no"];
            $pwd =  $_POST["pwd"];
            $cpwd =  $_POST["cpwd"];

            if ($pwd == $cpwd) {
                $sql = "SELECT * FROM `users` WHERE reg=$reg";
                if (mysqli_num_rows(mysqli_query($conn, $sql))) {
                    echo "You already have an account";
                } else {
                    $sql = "INSERT INTO `users` VALUES('$reg', '$name', '$pwd')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Record added successfully";
                        $_SESSION["user"] = $reg;
                        header("location:index.php");
                    } else {
                        echo "Error adding record to database";
                    }
                }
            }
        }
    ?>
</body>
</html>