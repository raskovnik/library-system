<!DOCTYPE>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <title>Add Books</title>
    </head>
    <body>
        <article style="margin-top: 20px;">
            <form method="POST" target='addBooks.php' enctype='multipart/form-data'>
                <label>ISBN</label><br>
                <input type="text" clas="form-input" id="isbn" name="isbn" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);" required><br>
                <label>Title</label><br>
                <input type="text" class="form-input" id="title" name="title" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);" required><br>
                <label>Author</label><br>
                <input type="text" class="form-input" id="author" name="author" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);" required><br>
                <label>Description</label><br>
                <input type="text" class="form-input" id="description" name="description" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);" required><br>
                <label>Image</label><br>
                <input type="file" class="form-input" id="image" name="image" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);" required><br>
                <label>Category</label><br>
                <input type="text" class="form-input" id="category" name="category" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);" required><br>
                <label>Quantity</label><br>
                <input type="number" class="form-input" id="qty" name="qty" min="1" style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);" required><br>
                <label>Price</label><br>
                <input type="number" class="form-input" id="price" name="price" min="1"  style="width:100%;height: 30px;border-radius:10px;border-color: rgba(0, 0, 89, 0.452);" required ><br>
                <br>
                <input type="submit" class="submit" name="submit" id="submit" value="Add Book" style="width:100%; height: 30px; border-radius:10px; padding: 7px 15px; margin-top: 15px ;cursor: pointer;background-color: rgba(0, 0, 89, 0.452);">
                <a href="dashboard.php"><button style="background-color: grey; width:100px; height: 35px; border-radius:10px; padding: auto;">Back to Dashboard</a>
            </form>
        </article>
        <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            include ('../scripts/connect.php');
            if(isset($_POST['submit'])){
                $isbn=$_POST['isbn'];
                $title=$_POST['title'];
                $author=$_POST['author'];
                $description=$_POST['description'];
                $image=($_FILES['image']['name']);
                $category=$_POST['category'];
                $qty=$_POST['qty'];
                $price=$_POST['price'];
                $sql="INSERT INTO books(ISBN,Title,Author,Category,Description,Price,Quantity,image) VALUES('$isbn','$title','$author','$category','$description','$price','$qty','$image')";
                $target_dir = "../images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                if (isset($_FILES["image"])) {
                    $target_dir = "/library-system/images/";
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$target_dir.$_FILES['image']['name'])) {
                        echo '<script>window.alert("Added the image successfully")</script>';
                        $result=mysqli_query($conn,$sql);
                        if (($result)) {
                            echo '<script> alert("Books added to the database!");</script>';
                        } else {
                            echo '<script> alert("ERROR:Please insert correct values in all fields!!! ");</script>';
                        }
                        mysqli_close($conn);
                    } else {
                        echo '<script>window.alert("Error uploading image")</script>';
                    }
                }
            }
        ?>
    </body>
</html>
