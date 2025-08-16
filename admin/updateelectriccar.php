<?php
error_reporting(0);
session_start();
$con=mysqli_connect("localhost","root","","carlux");
if(!$con)
{
die("Failed to coonect");
}	
?>
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
    <link rel="stylesheet" href="css/updateform.css">
    <link rel="stylesheet" href="css/table.css">
    <title>CarLux</title>
</head>
<style>
    table {
  width: 100%;
  margin: 0 auto;
  border-collapse: collapse;
}

td,th {
  padding: 5px;
  border-top: 1px solid #ccc;
  border-bottom: 1px solid #ccc;
}


input[type="file"] {
  width: 100%;
}

.button {
  background-color: #4CAF50;
  color: black;
  border: none;
  padding: 10px;
  cursor: pointer;
}
</style>
<body>
    <?php @include 'header.php';?>

    <!-- Main Content -->
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
                            cars
                            </a></li>
                        /
                        <li><a href="#" class="active">Update Electric Car
                        </a></li>
                    </ul>
                </div>
            </div>
            <br>

    <section class="checkout-form">
        <form method='POST' enctype="multipart/form-data">
        <?php
        if(isset($_GET['edit'])){
        $edit_id = $_GET['edit'];
        $edit_query = mysqli_query($con, "SELECT * FROM `electric_car` WHERE id = $edit_id");
        if(mysqli_num_rows($edit_query) > 0){
        while($fetch_edit = mysqli_fetch_assoc($edit_query)){
        ?>
        <table>
        <tr>
            <th><img src="vehicleimg/.<?php echo $fetch_edit['image1']; ?>" height="70" alt="aks"></th>
            <td><input type="file"  accept="image/png, image/jpg, image/jpeg, image/webp" name="image1"></td>
            <td><input type="submit" name="img1" value="save iamge" class="button"></td>
        </tr>
        <tr>
            <th><img src="vehicleimg/.<?php echo $fetch_edit['image2']; ?>" height="70" alt="aks"></th>
            <td><input type="file"  accept="image/png, image/jpg, image/jpeg, image/webp" name="image2"></td>
            <td><input type="submit" name="img2" value="save iamge" class="button"></td>
        </tr>
        <tr>
            <th><img src="vehicleimg/.<?php echo $fetch_edit['image3']; ?>" height="70" alt="aks"></th>
            <td><input type="file"  accept="image/png, image/jpg, image/jpeg, image/webp" name="image3"></td>
            <td><input type="submit" name="img3" value="save iamge" class="button"></td>
        </tr>
        <tr>
            <th><img src="vehicleimg/.<?php echo $fetch_edit['image4']; ?>" height="70" alt="aks"></th>
            <td><input type="file"  accept="image/png, image/jpg, image/jpeg, image/webp" name="image4"></td>
            <td><input type="submit" name="img4" value="save iamge" class="button"></td>
        </tr>
        <tr>
            <th><img src="vehicleimg/.<?php echo $fetch_edit['image5']; ?>" height="70" alt="aks"></th>
            <td><input type="file"  accept="image/png, image/jpg, image/jpeg, image/webp" name="image5"></td>
            <td><input type="submit" name="img5" value="save iamge" class="button"></td>
        </tr>
</table>
<br><br><br><br><br><br>
      <div class="flex">
         <div class="inputBox">
            <span>car name</span>
            <input  type="text" value=" <?php echo $fetch_edit['carname']; ?>" name="carname" required>
         </div>

         <div class="inputBox">
            <span>Car Brand</span>
            <select  name="brand">
            <?php
                mysqli_select_db($con, "carlux");
                $q1 = "SELECT * FROM `carbrands`";
                $result = mysqli_query($con, $q1);
                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['brandname']; ?>"><?php echo $row['brandname']; ?></option>
               <?php
              }    
              }
            ?>
            </select>
         </div>

         <div class="inputBox">
            <span>Price</span>
            <input  type="price"  value=" <?php echo $fetch_edit['price']; ?>" name="price" required>
         </div>
         
         <div class="inputBox">
            <span>engine</span>
            <input  type="text" value=" <?php echo $fetch_edit['engine']; ?>" name="engine" required>
         </div>

         <div class="inputBox">
            <span>transmission </span>
            <input type="text"  value=" <?php echo $fetch_edit['transmission']; ?>" name="transmission" required>
         </div>

         <div class="inputBox">
            <span>power</span>
            <input type="text" value=" <?php echo $fetch_edit['power']; ?>" name="power" required>
         </div>

         <div class="inputBox">
            <span>fueltype</span>
            <select  name="fueltype">
               <option value=" <?php echo $fetch_edit['fueltype']; ?>" selected><?php echo $fetch_edit['fueltype']; ?></option>
               <option value="Petrol">Petrol</option>
              <option value="Diesel">Diesel</option>
              <option value="Petrol/Diesel">Petrol/Diesel</option>
              <option value="CNG/Petrol">Cng/Petrol</option>
              <option value="CNG/Diesel">Cng/Diesel</option>
            </select>
         </div>

         <div class="inputBox">
            <span>mileage</span>
            <input type="text" value=" <?php echo $fetch_edit['mileage']; ?>" name="mileage" required>
         </div>

         <div class="inputBox">
            <span>seating capacity</span>
            <input type="text"  value=" <?php echo $fetch_edit['seating_capacity']; ?>" name="seating_capacity" required>
         </div>
      </div>
      <input type="submit" value="Save Changes" name="update" class="btn">
      <?php
            };
         };
      };
   ?>
   </form>
        </section>
            
        </main>
    </div>
    <script src="js/admin.js"></script>
    <script src="js/time.js"></script>
    <script src="js/search.js"></script>
</body>
</html>
<?php
error_reporting(0);
session_start();
$con=mysqli_connect("localhost","root","","carlux");
if(!$con)
{
die("Failed to coonect");
}	

    if (isset($_POST['update'])){
        
        if(isset($_GET['edit'])){
        $edit_id = $_GET['edit'];

        $carname = $_POST['carname'];
        $brand = $_POST['brand'];
        $price = $_POST['price'];
        $engine = $_POST['engine'];
        $transmission = $_POST['transmission'];
        $power = $_POST['power'];
        $fueltype = $_POST['fueltype'];
        $mileage = $_POST['mileage'];
        $seating_capacity = $_POST['seating_capacity'];
        
            $q1="update fuel_car set carname='$carname',brand='$brand',price='$price',engine='$engine',transmission='$transmission',power='$power',fueltype='$fueltype',mileage='$mileage',seating_capacity='$seating_capacity' where id='$edit_id'";
            mysqli_select_db($con, "carlux");
            $data=mysqli_query($con, $q1);
            if(!$data)
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
       }  
    }

       if(isset($_POST['img1']))
        {
            if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];

            $image1 = $_FILES['image1']['name'];
            $file_local1 = $_FILES['image1']['tmp_name'];
            $folder="vehicleimg/.";
            move_uploaded_file($file_local1,$folder.$image1);

            if(empty($image1))
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
                  text: "Please Select a Picture."
                });
                </script>
              <?php
          }
          else {
            echo $q1="UPDATE `fuel_car` SET image1='$image1' where id='$edit_id' ";
            mysqli_select_db($con, "carlux");
            $result = mysqli_query($con, $q1);
          }
        }
        }

        if(isset($_POST['img2']))
        {
            if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];

            $image2 = $_FILES['image2']['name'];
            $file_local1 = $_FILES['image2']['tmp_name'];
            $folder="vehicleimg/.";
            move_uploaded_file($file_local1,$folder.$image2);

            if(empty($image2))
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
                  text: "Please Select a Picture."
                });
                </script>
              <?php
          }
          else {
            echo $q1="UPDATE `fuel_car` SET image2='$image2' where id='$edit_id' ";
            mysqli_select_db($con, "carlux");
            $result = mysqli_query($con, $q1);
          }
        }
        }

        if(isset($_POST['img3']))
        {
            if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];

            $image3 = $_FILES['image3']['name'];
            $file_local1 = $_FILES['image3']['tmp_name'];
            $folder="vehicleimg/.";
            move_uploaded_file($file_local1,$folder.$image3);

            if(empty($image3))
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
                  text: "Please Select a Picture."
                });
                </script>
              <?php
          }
          else {
            echo $q1="UPDATE `fuel_car` SET image3='$image3' where id='$edit_id' ";
            mysqli_select_db($con, "carlux");
            $result = mysqli_query($con, $q1);
          }
        }
        }

        if(isset($_POST['img4']))
        {
            if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];

            $image4 = $_FILES['image4']['name'];
            $file_local1 = $_FILES['image4']['tmp_name'];
            $folder="vehicleimg/.";
            move_uploaded_file($file_local1,$folder.$image4);

            if(empty($image4))
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
                  text: "Please Select a Picture."
                });
                </script>
              <?php
          }
          else {
            echo $q1="UPDATE `fuel_car` SET image4='$image4' where id='$edit_id' ";
            mysqli_select_db($con, "carlux");
            $result = mysqli_query($con, $q1);
          }
        }
        }

        if(isset($_POST['img5']))
        {
            if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];

            $image5 = $_FILES['image5']['name'];
            $file_local1 = $_FILES['image5']['tmp_name'];
            $folder="vehicleimg/.";
            move_uploaded_file($file_local1,$folder.$image5);

            if(empty($image5))
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
                  text: "Please Select a Picture."
                });
                </script>
              <?php
          }
          else {
            echo $q1="UPDATE `fuel_car` SET image5='$image5' where id='$edit_id' ";
            mysqli_select_db($con, "carlux");
            $result = mysqli_query($con, $q1);
          }
        }
        }
?>