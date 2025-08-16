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
    <link rel="stylesheet" href="css/brandform.css">
    <title>CarLux</title>
</head>
<style>
    #vehicle-table {
    margin-left:20%;
    border-collapse: collapse;
    overflow:visible;
    width: 75%;
    font-size: 14px;
  }
  
  #vehicle-table th, #vehicle-table td {
    border-bottom: 1px solid #ffd9cc;
    border-top: 1px solid #ffd9cc;
    padding: 10px;
    text-align: center;
  }

  #vehicle-table th {
    background-color: #dddddd;
  }
  
  #vehicle-table tr:nth-child(even) {
    background-color: #f5f5f5;
  }


.delete-btn {
    color:crimson;
    cursor: pointer;
}
 ico:hover {
    animation: vibrate 0.3s ease infinite;
  }

.update-btn{
    color:forestgreen;
    cursor: pointer;
}
</style>
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
                            Settings
                            </a></li>
                        /
                        <li><a href="#" class="active">Add Car brand</a></li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="form-container">

      <form class="form" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Brand name</label>
          <input type="text" name="brandname" placeholder="Enter car brand" >
        </div>
        <input  class="form-submit-btn" type="submit" name="add">
    </form>
    </div>
        </main>
    </div><div class="space">
</div>
<table id="vehicle-table" class="table" >
                <thead>
                  <tr>
                    <th>brand id</th>
                    <th>Car Brands</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                mysqli_select_db($con, "carlux");
                $q1 = "SELECT * FROM `carbrands`";
                $result = mysqli_query($con, $q1);
                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                ?>

                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['brandname']; ?></td>
                    <td>
                        <a href="addbrand.php?delete=<?php echo $row['id']; ?>"  onclick="return confirm('are your sure you want to delete this?');" class="delete-btn" ><ico class="material-symbols-outlined">delete</ico>
                    </td>
                  </tr>
                  <?php
                  }    
                  }
               ?>
                </tbody>
                </table>

    <script src="js/admin.js"></script>
    <script src="js/time.js"></script>
    <script src="js/search.js"></script>
</body>
</html>
<?php
error_reporting(0);
if (isset($_POST['add'])){

  $brandname = $_POST['brandname'];

  mysqli_select_db($con, "carlux");
  $q1 = "SELECT * FROM carbrands WHERE brandname = '$brandname'";
  $result = mysqli_query($con, $q1);
  if(empty($brandname))
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
          text: "field are Required."
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
          title:"brand is Already Added!",
          //text: "Password Must Be At Least 8 Charactes Long."
        });
        </script>
      <?php
 }
 else {
      $q1="INSERT INTO `carbrands`(brandname) VALUES('$brandname')";
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
                  text: 'New Brand Added successfully!',
                  showConfirmButton: false,
                  timer: 2000
                  }).then(() => {
                  window.location.href = 'addbrand.php';
                  });
              });
          </script>
          <?php
      }
 }  
}
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_select_db($con, "carlux");
    $q1 = "DELETE FROM `carbrands` WHERE id = $delete_id ";
    $result = mysqli_query($con, $q1);
    if($result){
        ?>
           <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                    });

                    // Redirect after 4 seconds (same as the timer duration)
                    setTimeout(() => {
                        window.location.href = "addbrand.php";
                    }, 1500);
            </script>
            <?php
    }
 }
?>