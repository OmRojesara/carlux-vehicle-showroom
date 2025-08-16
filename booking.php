<?php
error_reporting(0);
session_start();
@include 'config.php';
@include 'sessioncheck.php';
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CSS FILES --> 
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/slick.css"/>
    <link href="css/styles.css" rel="stylesheet">
</head>
<style>
    .form {
    margin-top:8%;
    margin-left:30%;
  display: flex;
  flex-direction: column;
  gap: 10px;
  background-color: #fff;
  padding: 20px;
  border-radius: 20px;
  position: relative;
}
input[type=text]{
    width: 100%;
}

.flex {
  display: flex;
  width: 100%;
  gap: 10px;
}

.submit {
  border: none;
  outline: none;
  width: 70%;
  background-color: #000;
  padding: 10px;
  border-radius: 10px;
  color: #fff;
  font-size: 16px;
  transform: .3s ease;
}

.submit:hover {
  background-color:#FF4400 ;
}

    </style>
<body>
<?php
     if(isset($_GET['edit'])){
        $carname = $_GET['edit'];
        mysqli_select_db($con, "carlux");
        $q1 = "SELECT * FROM `electric_car` where carname='$carname'";
        $result = mysqli_query($con, $q1);
        if(mysqli_num_rows($result) > 0){
        while($fetch_product = mysqli_fetch_assoc($result)){

            $carname=$fetch_product['carname'];
            $brand=$fetch_product['brand'];
            $fueltype=$fetch_product['fueltype'];
        }
        }
        }
        ?>
<?php
     if(isset($_GET['edit'])){
        $carname = $_GET['edit'];
        mysqli_select_db($con, "carlux");
        $q1 = "SELECT * FROM `fuel_car` where carname='$carname'";
        $result = mysqli_query($con, $q1);
        if(mysqli_num_rows($result) > 0){
        while($fetch_product = mysqli_fetch_assoc($result)){

            $carname=$fetch_product['carname'];
            $brand=$fetch_product['brand'];
            $fueltype=$fetch_product['fueltype'];
        }
        }
        }
        ?>
<?php include 'loader.php';?>
<?php include 'header.php';?>
<?php include 'checknetwork.php';?>
<?php
mysqli_select_db($con, "carlux");
    $q1 = "SELECT * FROM `user_detail` where email='$user'";
    $result = mysqli_query($con, $q1);
    if(mysqli_num_rows($result) > 0){
    while($fetch_product = mysqli_fetch_assoc($result)){

        $name=$fetch_product['name'];
        $email=$fetch_product['email'];
        $contact=$fetch_product['contact'];
    }
    }
    ?>
<main>
<form class="form" method="POST">

    <div class="flex">
    <label>
        <lable>Name</lable>
        <input readonly required="" name="name" placeholder="" value="<?php echo $name;?>" type="text" class="input">
    </label> 
        
    <label>
        <lable>E-mail</lable>
        <input readonly required="" placeholder="" name="email"  value="<?php echo $email;?>" type="text" class="input">
    </label>
    </div>

    <div class="flex">
    <label>
        <lable>Contact</lable>
        <input readonly required="" placeholder="" name="contact"  value="<?php echo $contact;?>" type="text" class="input">
    </label> 
        
    <label>
        <lable>City</lable>
        <input required="" placeholder="" name="city" type="text" class="input">
    </label>
    </div>

    <div class="flex">
    <label>
        <lable>State</lable>
        <input required="" placeholder="" name="state" type="text" class="input">
    </label>

    <label>
        <lable>Zip Code</lable>
        <input required="" placeholder="" name="zipcode" type="text" class="input">
    </label>
   
</div>

<div class="flex">
<label>
        <lable>Country</lable>
        <input required="" placeholder="" name="country" type="text" class="input">
    </label>
    

    <label>
        <lable>Car Name</lable>
        <input readonly required="" placeholder="" name="carname" value="<?php echo $carname ;?>" type="text" class="input">
    </label>
</div>

<div class="flex">
<label>
        <lable>Brand</lable>
        <input readonly required="" placeholder="" name="bramd" value="<?php echo $brand;?>"  type="text" class="input">
    </label>
    

    <label>
        <lable>Fueltype</lable>
        <input readonly required="" placeholder="" name="fueltype" value="<?php echo $fueltype;?>" type="text" class="input">
    </label>
</div>
    <input class="submit" type="submit" name="book" value="Book">
</form>
</main>
<?php include 'footer.php';?>
<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/Headroom.js"></script>
<script src="js/jQuery.headroom.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
<?php
error_reporting(0);
if (isset($_POST['book'])){

    $user=$_SESSION['email'];
  $customer_name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zipcode = $_POST['zipcode'];
  $country = $_POST['country'];
  $carname = $_POST['carname'];
  $brand = $_POST['brand'];
  $fueltype = $_POST['fueltype'];
  mysqli_select_db($con, "carlux");
  $q1 = "SELECT * FROM bookings WHERE carname = '$carname' AND email='$user'";
  $result = mysqli_query($con, $q1);
if(mysqli_num_rows($result)>0)
  {
      ?>
      <script>
      const Toast = Swal.mixin({
          toast: true,
          position: "top",
          showConfirmButton: false,
          timer: 4000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          }
        });
        Toast.fire({
          icon: "info",
          title:" You are Already book this Car!",
          //text: "Password Must Be At Least 8 Charactes Long."
        });
        </script>
      <?php
 }
 else {
    $q1="INSERT INTO `bookings`(customer_name,email,contact,city,state,zipcode,country,carname,brand,fueltype) VALUES('$customer_name','$email','$contact','$city','$state','$zipcode','$country','$carname','$brand','$fueltype')";
      mysqli_select_db($con, "carlux");
      $result = mysqli_query($con, $q1);
      if(!$result)
      {
          ?>
          <script>
              Swal.fire({
              icon: 'error',
              title:'Oops!',
              text: 'Something Went Wrong!',
              showConfirmButton: false,
              timer:4000
              });
          </script>
          <?php
      }
      elseif ($result) {
          ?>
          <script>
                  Swal.fire({
                  icon: 'success',
                  text: 'Booking successfully!',
                  showConfirmButton: false,
                  timer: 2000
                  });
          </script>
          <?php
      }
 }  
}
?>
