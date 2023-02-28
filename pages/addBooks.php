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
<body>
<article>
    <form method="POST" target='addBooks.php'>
        <label>ISBN</label><br>
        <input type="text" clas="form-input" id="isbn" name="isbn" required><br>
        <label>Title</label><br>
        <input type="text" class="form-input" id="title" name="title" required><br>
        <label>Author</label><br>
        <input type="text" class="form-input" id="author" name="author" required><br>
        <label>Description</label><br>
        <input type="text" class="form-input" id="description" name="description" required><br>
        <label>Image</label><br>
        <input type="file" class="form-input" id="image" name="image" required><br>
        <label>Category</label><br>
        <input type="text" class="form-input" id="category" name="category" required><br>
        <label>Quantity</label><br>
        <input type="text" class="form-input" id="qty" name="qty" required><br>
        <label>Price</label><br>
        <input type="text" class="form-input" id="price" name="price" required><br>
        <br>
        <input type="submit" class="submit" id="submit" value="Add Book">
    </form>
	</article>
	<?php
	include ('../scripts/connect.php');
	$isbn=$_POST['isbn'];
	$title=$_POST['title'];
	$author=$_POST['author'];
	$description=$_POST['description'];
	$image=$_POST['image'];
	$category=$_POST['category'];
	$qty=$_POST['qty'];
	$price=$_POST['price'];
	$sql="INSERT INTO books(ISBN,Title,Author,Category,Description,Price,Quantity,image) VALUES('$isbn','$title','$author','$category','$description','$price','$qty','$image')";
	$result=mysqli_query($conn,$sql);
	if(($result)){
	echo '<script> alert("Books added to the database!");</script>';
}
else{

    echo '<script> alert("ERROR:Please insert correct values in all fields!!! ");</script>';

}
mysqli_close($con);
 ?>
</body>
</html>