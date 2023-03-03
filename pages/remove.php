<!DOCTYPE>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="RegForm" method="POST" action="dashboard.php">
        ISBN: <input type="text" name="isbn" id="isbn">
        REGISTRATION NUMBER: <input type="text" name="reg-no" id="reg-no">
        <input type="submit" value="Submit" name="submit" onclick="alert('Submitted successfully')">
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
</body>
</html>