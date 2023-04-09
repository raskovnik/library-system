<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Return Books</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="form-container">
            <form id="RegForm" method="POST">
                ISBN: <br><input type="text" name="isbn" id="isbn" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);"><br>
                REGISTRATION NUMBER: <br><input type="text" name="reg-no" id="reg-no" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);"><br>
                <button style="width:100%; height: 30px; border-radius:10px; padding: 7px 15px; margin-top: 15px ;cursor: pointer;background-color: rgba(0, 0, 89, 0.452);">Accept</button>
                <button style="width:100%; height: 30px; border-radius:10px; padding: 7px 15px; margin-top: 15px ;cursor: pointer;background-color: rgba(0, 0, 89, 0.452);">Reject</button>
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
        <script src="" async defer></script>
    </body>
</html>