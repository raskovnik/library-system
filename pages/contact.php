<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
<body>
    <?php
        include "navbar.php";
        include "../scripts/connect.php";
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    ?>
    <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
        Enim, aliquid. Dignissimos, ipsum dicta modi facere molestiae voluptate? 
        Deserunt quibusdam sequi eos. Pariatur atque quae magnam distinctio 
        voluptate ducimus delectus nihil!
    </p>
</body>
</html>