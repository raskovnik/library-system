<!DOCTYPE <!DOCTYPE html>
<?php
  include "../scripts/connect.php";
  session_start();
?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../css/style1.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    </head>
    <body>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#" class="logo">
                        <img src="../images/images.jpeg">
                        <span class="nav-item">Dashboard</span>
                    </a></li>
                    <li><a href="#">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-item">Home</span>
                    </a></li>
                    <li><a href="">
                        <i class="fa fa-user fa-2x"></i>
                        <span class="nav-item">Profile</span>
                    </a></li>
                    <li><a href="">
                        <i class="fa fa-bar-chart fa-2x"></i>
                        <span class="nav-item">Analytics</span>
                    </a></li>
                    <li><a href="">
                        <i class="fa fa-cog fa-2x"></i>
                        <span class="nav-item">Settings</span>
                    </a></li>
                    <li><a href="" class="logout">
                        <i class="fa fa-sign-out fa-2x"></i>
                        <span class="nav-item">Log out</span>
                    </a></li>
                </ul>
            </nav>
            <section class="main">
                <div class="main-top">
                    <h1>Reports & Invoices</h1>
                    <i class="fa fa-user fa-2x"></i>
                </div>
                <div class="book">
                    <div class="card">
                        <i class="fa fa-file fa-2x"></i>
                        <h3>Reports</h3>
                        <p>Generation of reports for books</p>
                        <button>Lost Books</button>
                        <button>All Books</button>
                    </div>
                <div class="card">
                    <i class="fa fa-dollar fa-2x"></i>
                    <h3>Invoices</h3>
                    <p>Issuing invoices to students with lost books</p>
                    <button>Issue invoices</button>
                </div>
                </div>
                <section class="addremove">
                    <h1>Add & Remove</h1>
                    <!-- <div class="addremove1"> -->
                       <!-- <ul> -->
                        <!-- <li class="active">Add</li> -->
                        <!-- <li onclick="">Remove</li> -->
                       <!-- </ul> -->
                       <!-- <div class="col-2">
                       <div class="form-container">
                        <div class="form-btn">
                            <span onclick="form1()">Add</span>
                            <span onclick="form2()">Remove</span>
                            <hr id="Indicator">
                        </div>
                       <form name="form1" id="form1">
                        Subjects: <select name="subject" id="subject">
                          <option value="" selected="selected">Select subject</option>
                        </select>
                        <br><br>
                        Topics: <select name="topic" id="topic">
                          <option value="" selected="selected">Please select subject first</option>
                        </select>
                        <br><br>
                        Chapters: <select name="chapter" id="chapter">
                          <option value="" selected="selected">Please select topic first</option>
                        </select>
                        <br><br>
                        <input type="submit" value="Submit" onclick="alert('Submitted')">
                      </form> 
                      <form name="form2" id="form2">
                        Subjects: <select name="subject" id="subject">
                          <option value="" selected="selected">Select subject</option>
                        </select>
                        <br><br>
                        Topics: <select name="topic" id="topic">
                          <option value="" selected="selected">Please select subject first</option>
                        </select>
                        <br><br>
                        Chapters: <select name="chapter" id="chapter">
                          <option value="" selected="selected">Please select topic first</option>
                        </select>
                        <br><br>
                        <input type="submit" value="Submit" onclick="alert('Submitted')">
                      </form> 
                    </div>
                    </div>
                    </div>
                </section>
            </section>
        </div>
        <script>
            var form1 = document.getElementById("form1");
            var form2 = document.getElementById("form2");
            var Indicator = document.getElementById("Indicator");
        
            function form2()
            {
                form2.style.transform = "translateX(0px)";
                form1.style.transform = "translateX(0px)";
                Indicator.style.transform = "translateX(100px)";
            }
            
            function form1(){
                form1.style.transform = "translateX(300px)";
                form2.style.transform = "translateX(300px)";
                Indicator.style.transform = "translateX(0px)";
            }
        </script> -->
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Add</span>
                            <span onclick="register()">Remove</span>
                            <hr id="Indicator">
                        </div>
                        <form id="LoginForm">
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
                              <!-- <input type="submit" class="submit" name="submit" id="submit" value="Add Book"> -->
                            <!-- Subjects: <select name="subject" id="subject">
                                <option value="" selected="selected">Select subject</option>
                              </select>
                              <br><br>
                              Type: <select name="topic" id="topic">
                                <option value="" selected="selected">Please select subject first</option>
                              </select>
                              <br><br>
                              Kind: <select name="chapter" id="chapter">
                                <option value="" selected="selected">Please select topic first</option>
                            </select>
                            <br><br> -->
                            <input type="submit" value="Submit" onclick="alert('Submitted successfully')">
                        </form>
                        <form id="RegForm" method="POST" action="dashboard.php">
                            <!-- Subjects: <select name="subject" id="subject1">
                                <option value="" selected="selected">Select subject</option>
                              </select>
                              <br><br>
                              Type: <select name="topic" id="topic1">
                                <option value="" selected="selected">Please select subject first</option>
                              </select>
                              <br><br>
                              Kind: <select name="chapter" id="chapter1">
                                <option value="" selected="selected">Please select topic first</option>
                              </select>
                              <br><br> -->
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
                    </div>
                </div>
            </div>
        </div>
        <script>
            var LoginForm = document.getElementById("LoginForm");
            var RegForm = document.getElementById("RegForm");
            var Indicator = document.getElementById("Indicator");
        
            function register()
            {
                RegForm.style.transform = "translateX(0px)";
                LoginForm.style.transform = "translateX(0px)";
                Indicator.style.transform = "translateX(100px)";
            }
            
            function login(){
                RegForm.style.transform = "translateX(300px)";
                LoginForm.style.transform = "translateX(300px)";
                Indicator.style.transform = "translateX(0px)";
            }
            var subjectObject = {
            "Subject": {
              "Maths": ["JKF", "KLB"],
              "English": ["JKF", "KLB", "Progressive"],
              "Kiswahili": ["JKF", "KLB", "Mufti"]
            },
            "Revision book": {
              "KMF": ["Maths", "English", "Kiswahili"],
              "Mirror": ["Maths", "English", "Kiswahili"]
            }
            // "Novels": {
            //   "Harry-Potter": ["Variables", "Strings", "Arrays"],
            //   "Colleen-Hover": ["SELECT", "UPDATE", "DELETE"]
            // }
            // "Story-books": {
            //   "Abunuasi": ["Variables", "Strings", "Arrays"],
            //   "Sungura": ["SELECT", "UPDATE", "DELETE"]
            // }
          }
          window.onload = function() {
            var subjectSel = document.getElementById("subject");
            var topicSel = document.getElementById("topic");
            var chapterSel = document.getElementById("chapter");
            for (var x in subjectObject) {
              subjectSel.options[subjectSel.options.length] = new Option(x, x);
            }
            subjectSel.onchange = function() {
              //empty Chapters- and Topics- dropdowns
              chapterSel.length = 1;
              topicSel.length = 1;
              //display correct values
              for (var y in subjectObject[this.value]) {
                topicSel.options[topicSel.options.length] = new Option(y, y);
              }
            }
            topicSel.onchange = function() {
              //empty Chapters dropdown
              chapterSel.length = 1;
              //display correct values
              var z = subjectObject[subjectSel.value][this.value];
              for (var i = 0; i < z.length; i++) {
                chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
              }
            }
          }
          window.onload = function() {
            var subjectSel = document.getElementById("subject1");
            var topicSel = document.getElementById("topic1");
            var chapterSel = document.getElementById("chapter1");
            for (var x in subjectObject) {
              subjectSel.options[subjectSel.options.length] = new Option(x, x);
            }
            subjectSel.onchange = function() {
              //empty Chapters- and Topics- dropdowns
              chapterSel.length = 1;
              topicSel.length = 1;
              //display correct values
              for (var y in subjectObject[this.value]) {
                topicSel.options[topicSel.options.length] = new Option(y, y);
              }
            }
            topicSel.onchange = function() {
              //empty Chapters dropdown
              chapterSel.length = 1;
              //display correct values
              var z = subjectObject[subjectSel.value][this.value];
              for (var i = 0; i < z.length; i++) {
                chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
              }
            }
          }
        </script>
    </body>
</html>