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
    <form method="POST">
        <label>Registration Number</label><br>
        <input type="text" class="form-input" id="reg-no" name="reg-no"><br>
        <label>ISBN</label><br>
        <input type="text" class="form-input" id="isbn" name="isbn"><br>
        <label>Price</label><br>
        <input type="number" class="form-input" id="price" name="price"><br>
        <input type="submit" class="submit" id="submit" name="submit" value="Add Record">
    </form>
	<?php
	session_start();
	include('../scripts/connect.php');
	if(isset($_POST['submit'])){
		$reg=$_POST['reg-no'];
		$isbn=$_POST['isbn'];
		$price=$_POST['price'];
		$sql="INSERT INTO lost VALUES('$reg','$isbn','$price')";
		$result=mysqli_query($conn,$sql);
		if($result){
			echo '<script> alert("Books added to the database!");</script>';
		}
		else{
			echo '<script> alert("Unable to add books to database");</script>';
		}
		
	}
	?>
	</article>
</body>
</html>