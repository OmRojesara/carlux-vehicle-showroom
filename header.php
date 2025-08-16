<?php
error_reporting(0);
session_start();
$user=$_SESSION['email'];
$user_photo=$_SESSION['user_photo'];
$name=$_SESSION['name'];
@include 'config.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>CarLux</title>
        
        <link rel="icon" type="image/png" href="images/favicon/logo1.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="css/slick.css"/>
        <link href="css/styles.css" rel="stylesheet">
        <link href="css/cardetail.css" rel="stylesheet">
    </head>
    <style>
       .dropbtn {
    color: #000;
    font-size: 22px;
    border: none;
    cursor: pointer;
  }
  .dropbtn:hover{
    color: #05445e;
    background-color: #f1f1f1;
    transition: .5s;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    border-radius: 10px;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    transition: .5s;
  }
  
  .dropdown-content a:hover {
    color: #FF4400;
    background-color: #f1f1f1;
    border-radius: 10px;
  }
  
  .dropdown:hover .dropdown-content {
    display: block;
  }
  .userprofile{
    width: 25px;
    height: 25px;
    border-radius:100px;
  }
  .bi{
    font-size:20px;
  }
  
  
    </style>
    <body>
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div>
                    <a href="index.php"> <img src="images/logo/logo.png" class="nav__logo"></a>
                    </div>

                    <div class="d-lg-none">
                        <a href="sign-in.php" class="bi-person custom-icon me-3"></a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>


                            <li class="nav__item">
                                <div class="dropdown">
                                    <a  class="nav-link">Explore</a>
                                    <div class="dropdown-content">
                                        <a href="fuelcars.php">Fuel Cars</a>
                                        <a href="electriccars.php">Electric Cars</a>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="about.php">Who We Are?</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Reach Us</a>
                            </li>
                        </ul>

                        <?php
                        mysqli_select_db($con, "carlux");
                        $q1 = "SELECT * FROM `user_detail` where email='$user'";
                        $result = mysqli_query($con, $q1);
                        if(mysqli_num_rows($result) > 0){
                        while($fetch_product = mysqli_fetch_assoc($result)){
                            $user_photo=$fetch_product['user_photo'];
                        }
                        }
                        ?>
                        
                        <div class="d-none d-lg-block">
                            <?php if(isset($_SESSION['email'])) { ?>
                            <center> <a href="userprofile.php"><img class="userprofile" src="admin/vehicleimg/<?php echo $user_photo; ?>" alt="Profile" class="d-block ui-w-80"/></a></center>
                            <?php } else { ?>
                            <a href="sign-in.php" class="bi bi-person custom-icon me-3"></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </nav>
<!-- JAVASCRIPT FILES -->
        <script src="js/slick.min.js"></script>    </body>
</html>
