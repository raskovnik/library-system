<!DOCTYPE html>
<html lang="en">
<head>
    <meta chartset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <form method="POST">
                <input type="text" name="search" style="width: 65%" placeholder="Search Books">
                <input type="submit" name="submit" value="Search" style="width: 30%">
            </form>
            <nav>
                <ul id="MenuItems">
                    <li><a href="index.html">Home</a></li>
                    <!-- <li><a href="index.html">Resources</a></li> -->
                    <li><a href="index.html">Contact</a></li>
                    <li><a href="index.html">About</a></li>
                    <li><a href="login.html">Account</a></li>
                </ul>
            </nav>
        </div>

    </div>

<div class="small-container">
  <div class="row">
    <div class="col-4">
        <img src="../images/cos.jpg">
        <h4>Harry Potter and the Chamber of Secrets</h4>
        <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
         </div>
        <p>J. K Rowling</p>
    </div> 
       <div class="col-4">
        <img src="../images/gob.jpg">
        <h4>Harry Potter and the Goblet of Fire</h4>
        <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
       </div>
       <p>J. K Rowling</p>
       </div>
        <div class="col-4">
            <img src="../images/image2.jpg">
            <h4>Harry Potter and the Deathly Hallows</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
    
            </div>
            <p>J. K Rowling</p>
        </div>
 
 <div class="col-4">
    <img src="../images/image3.jpg">
    <h4>Harry Potter and the Order of the Phoenix</h4>
    <div class="rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half-o"></i>

    </div>
    <p>J. K Rowling</p>
</div>
<div class="col-4">
    <img src="../images/images.jpg">
    <h4>Harry Potter and the Sorcerer's Stone</h4>
    <div class="rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half-o"></i>

    </div>
    <p>J. K Rowling</p>
</div>
<div class="col-4">
    <img src="../images/poa.jpg">
    <h4>Harry Potter and the Prisoner of Azkben</h4>
    <div class="rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half-o"></i>
    </div>
    <p>J. K Rowling</p>
</div>
<div class="col-4">
    <img src="../images/image4.jpg">
    <h4>Harry Potter and the Half-Blood Prince</h4>
    <div class="rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half-o"></i>

       </div>
       <p>J. K Rowling</p>
      </div>
   </div>
  <div class="page-btn">
    <span>1</span>
    <span><a href="#">2</a></span>
    <span><a href="#">3</a></span>
    <span>4</span>
    <span>&#8594;</span>

  </div>

</div> 
<!--js for toggle menu-->
<script>
    var MenuItems = document.getElementById("MenuItems")
     MenuItems.style.maxHeight = "0px";

     function menutoggle(){
        if(MenuItems.style.maxHeight == "0px")
            {
                MenuItems.style.maxHeight = "200px";
            }
        else
            {
                MenuItems.style.maxHeight = "0px";
 
            }

     }
</script>

</body>
</html>