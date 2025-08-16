<?php @include 'config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/logo1.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/testform.css">
    <title>CarLux</title>
</head>

<body>

<?php @include 'header.php';?>
    <div class="content">  
        <main>
            <div class="header">
                <div class="left">
                    TIME
                        <div class="digital_clock "></div>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                            <div class="topbar-divider d-none d-sm-block"></div>
                    <ul class="breadcrumb">
                    <li><a href="#">
                        Dashboard
                            </a></li>
                        /
                        <li><a href="#">
                            cars
                            </a></li>
                        /
                        <li><a href="#" class="active">Add fuel Cars</a></li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="form-container">
              
      <!-- <div class="logo-container">
        add new fuel car
      </div> -->

      <form class="form" method="POST" enctype="multipart/form-data">
      <div class="flex">
        <div class="form-group">
          <label>car name</label>
          <input type="text" name="carname" placeholder="Enter car Name" >
        </div>

        <div class="form-group">
          <label>Brand</label>
          <select  name="brand">
          <?php
                mysqli_select_db($con, "carlux");
                $q1 = "SELECT * FROM `carbrands`";
                $result = mysqli_query($con, $q1);
                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                ?>
          <option value="" disabled selected hidden>Select an Brand</option>
          <option value="<?php echo $row['brandname']; ?>"><?php echo $row['brandname']; ?></option>
          <?php
              }    
              }
            ?>
        </select>
        </div>
        </div>

        <div class="flex">
        <div class="form-group">
          <label>Price</label>
          <input type="text" name="price" placeholder="Enter car Price" >
        </div>

        <div class="form-group">
        <label>engine</label>
          <input type="text" name="engine" placeholder="Enter Engine Information">
        </div>
        </div>

        <div class="flex">
        <div class="form-group">
          <label >transmission</label>
          <input type="text"  name="transmission" placeholder="Enter Transmission Type" >
        </div>

        <div class="form-group">
          <label >power</label>
          <input type="text"  name="power" placeholder="Enter Power" >
        </div>
        </div>

        <div class="flex">
        <div class="form-group">
          <label >Seating capacity</label>
          <input type="number"  name="seating_capacity" placeholder="Enter Fuel Type" >
        </div>

        <div class="form-group">
        <label >mileage</label>
          <input type="text"  name="mileage" placeholder="Enter Mileage" >
        </div>
        </div>

        <div class="form-group">       
          <label>fuel type</label>
          <select  name="fueltype">
              <option value="" disabled selected hidden>Select Fuel Type</option>
							<option value="Petrol">Petrol</option>
              <option value="Diesel">Diesel</option>
              <option value="Petrol/Diesel">Petrol/Diesel</option>
              <option value="CNG/Petrol">Cng/Petrol</option>
              <option value="CNG/Diesel">Cng/Diesel</option>
        </select>
        </div>
            <br>
          <label >Choose front Image</label>
          <div class="group_img">
          <input type="file" accept="image/png, image/jpg, image/jpeg, image/webp" name="image1" class="input_img">
        </div>

        <br>
        <label >Choose more Images</label>
        <div class="group_img">
          <input type="file" accept="image/png, image/jpg, image/jpeg, image/webp" name="image2" class="input_img" >
          <input type="file" accept="image/png, image/jpg, image/jpeg, image/webp" name="image3" class="input_img" >
          <input type="file" accept="image/png, image/jpg, image/jpeg, image/webp" name="image4" class="input_img" >
          <input type="file" accept="image/png, image/jpg, image/jpeg, image/webp" name="image5" class="input_img" >
        </div>

        <input  class="form-submit-btn" type="submit" name="add">
    </form>
    </div>
        </main>
    </div><div class="space">
</div>
    <script src="js/admin.js"></script>
    <script src="js/time.js"></script>
    <script src="js/search.js"></script>
</body>
</html>
<?php
error_reporting(0);
if (isset($_POST['add'])){

  $carname = $_POST['carname'];
  $brand = $_POST['brand'];
  $price = $_POST['price'];
  $engine = $_POST['engine'];
  $transmission = $_POST['transmission'];
  $power = $_POST['power'];
  $fueltype = $_POST['fueltype'];
  $mileage = $_POST['mileage'];
  $seating_capacity = $_POST['seating_capacity'];

  $image1 = $_FILES['image1']['name'];
  $file_local1 = $_FILES['image1']['tmp_name'];

  $image2 = $_FILES['image2']['name'];
  $file_local2 = $_FILES['image2']['tmp_name'];
  
  $image3 = $_FILES['image3']['name'];
  $file_local3 = $_FILES['image3']['tmp_name'];

  $image4 = $_FILES['image4']['name'];
  $file_local4 = $_FILES['image4']['tmp_name'];

  $image5 = $_FILES['image5']['name'];
  $file_local5 = $_FILES['image5']['tmp_name'];

  $folder="vehicleimg/.";

  move_uploaded_file($file_local1,$folder.$image1);
  move_uploaded_file($file_local2,$folder.$image2);
  move_uploaded_file($file_local3,$folder.$image3);
  move_uploaded_file($file_local4,$folder.$image4);
  move_uploaded_file($file_local5,$folder.$image5);

  mysqli_select_db($con, "carlux");
  $q1 = "SELECT * FROM fuel_car WHERE carname = '$carname'";
  $result = mysqli_query($con, $q1);
  if(empty($carname) OR empty($brand) OR empty($price) OR empty($engine) OR empty($transmission) OR empty($power) OR empty($fueltype) OR empty($mileage) OR empty($seating_capacity) OR empty($image1) OR empty($image2) OR empty($image3) OR empty($image4) OR empty($image5))
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
          icon: "warning",
          title:"Attention Please!",
          text: "all fields are Required."
        });
        </script>
      <?php
  }
elseif(mysqli_num_rows($result)>0)
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
          title:"Car is Already Added!",
          //text: "Password Must Be At Least 8 Charactes Long."
        });
        </script>
      <?php
 }
 else {
      $q1="INSERT INTO `fuel_car`(carname,brand,price,engine,transmission,power,fueltype,mileage,seating_capacity,image1,image2,image3,image4,image5) VALUES('$carname','$brand','$price','$engine','$transmission','$power','$fueltype','$mileage','$seating_capacity','$image1','$image2','$image3','$image4','$image5')";
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
              document.addEventListener('DOMContentLoaded', function() {
                  Swal.fire({
                  icon: 'success',
                  text: 'New Vehicle Added successfully!',
                  showConfirmButton: false,
                  timer: 2000
                  }).then(() => {
                  window.location.href = 'viewfuelcar.php';
                  });
              });
          </script>
          <?php
      }
 }  
}
?>