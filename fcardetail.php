<?php
error_reporting(0);
session_start();
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <!-- CSS FILES --> 
        <link rel="icon" type="image/png" href="images/favicon/logo1.png">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="css/slick.css"/>
        <link href="css/styles.css" rel="stylesheet">
        <link href="css/cardetail.css" rel="stylesheet">
    </head>
    <style>
.material-symbols-outlined {
  font-size:20px;
  color:#FF4400;
}
.bi{
    color: #FF4400;
}
.reviews-container {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  width: 100%;
  margin: 0 auto;
  padding: 20px;
  background-color: #f2f2f2;
  border-radius: 5px;
}

.review {
  display: flex;
  flex-direction: column;
  background-color: #fff;
  padding: 1rem;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.review-header {
  display: flex;
  align-items: center;
  margin-top:1%;
}
.review-body {
  /* margin-left:-5%; */
}

.profile {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  object-fit: cover;
  margin-right: 1rem;
}

.username {
  font-weight: bold;
  font-size: 1.1rem;
  color: #484848;
}

.date {
  font-size: 20px;
  color: #9b9b9b;
  margin-left:70%;
}

.rating {
  color: #f7b037;
  font-size: 1.5rem;
  margin-left:-8%;
}

.content {
  font-size: 1.1rem;
  color: #484848;
}
.line{
    border-bottom:1px solid #ffb99f;
    margin-top:1%;
    width:100%;
}
.rbtn{
  margin-top:5px;
}
.reviewbtn{
  padding: 18px;
  background:#000;
  color:#fff;
  border-radius:5px;
}
.reviewbtn:hover{
  background:none;
  border:1px solid #FF4400;
}
.update{
  cursor: pointer;
  color:green;
  font-size:25px;
}
.delete{
  cursor: pointer;
  color:red;
  font-size:25px;
}
</style>
    <body>

    <?php include'loader.php';?>
    <?php include'header.php';?>
    <?php include'checknetwork.php';?>
    <center>
    <div class = "main-wrapper">
        <!--===Fuel cars===-->
        <div class = "container">
        <?php
            if(isset($_GET['edit'])){
                $edit_id = $_GET['edit'];
                $edit_query = mysqli_query($con, "SELECT * FROM `fuel_car` WHERE id = $edit_id");
                if(mysqli_num_rows($edit_query) > 0){
                while($fetch_edit = mysqli_fetch_assoc($edit_query)){
                    $carname=$fetch_edit['carname'];
                
            ?>
            <div class = "product-div">
                <div class = "product-div-left">
                    <div class = "img-container">
                    <img src="admin/vehicleimg/.<?php echo $fetch_edit['image1']; ?>"alt="">
                    </div>
                    <div class = "hover-container">
                        <div><img src="admin/vehicleimg/.<?php echo $fetch_edit['image1']; ?>"alt=""></div>
                        <div><img src="admin/vehicleimg/.<?php echo $fetch_edit['image2']; ?>"alt=""></div>
                        <div><img src="admin/vehicleimg/.<?php echo $fetch_edit['image3']; ?>"alt=""></div>
                        <div><img src="admin/vehicleimg/.<?php echo $fetch_edit['image4']; ?>"alt=""></div>
                        <div><img src="admin/vehicleimg/.<?php echo $fetch_edit['image5']; ?>"alt=""></div>
                    </div>
                </div>
                <div class = "product-div-right">
                    <span class = "product-name"><?php echo $fetch_edit['carname']; ?></span>
                    <span class = "product-price"><?php echo $fetch_edit['price']; ?></span>
                    <span class = "product-price"><?php echo $fetch_edit['brand']; ?></span>
                    <div class = "product-rating">
                    </div>
                    
                    <!-- <p class = "product-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae animi ad minima veritatis dolore. Architecto facere dignissimos voluptate fugit ratione molestias quis quidem exercitationem voluptas.</p> -->
                    <div class = "btn-groups">
                        <a  class="reviewbtn" href="booking.php?edit=<?php echo $fetch_edit['carname'];?>">Book Now</a>
                        <?php if(isset($_SESSION['email'])) { ?>
                        <a  class="reviewbtn" href="addreview.php?edit=<?php echo $fetch_edit['carname'];?>">ADD REVIEW</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table>
    <tr>
        <th><span class="material-symbols-outlined">manufacturing</span>&nbsp;Engine</th>
        <td><?php echo $fetch_edit['engine']; ?></td>
    </tr>
    <tr>
        <th><span class="material-symbols-outlined">auto_transmission</span>&nbsp;Transmission</th>
        <td><?php echo $fetch_edit['transmission']; ?></td>
    </tr>
    <tr>
        <th><span class="material-symbols-outlined">bolt</span>&nbsp;Power</th>
        <td><?php echo $fetch_edit['power']; ?></td>
    </tr>
    <tr>
        <th><span class="material-symbols-outlined">filter_alt</span>&nbsp;Fuel Type</th>
        <td><?php echo $fetch_edit['fueltype']; ?></td>
    </tr>
    <tr>
        <th><span class="material-symbols-outlined">readiness_score</span>&nbsp;Mileage</th>
        <td><?php echo $fetch_edit['mileage']; ?></td>
    </tr>
    <tr>
        <th><span class="material-symbols-outlined">airline_seat_recline_extra</span>&nbsp;Seating Capacity</th>
        <td><?php echo $fetch_edit['seating_capacity']; ?> Peapol</td>
    </tr>
</table>
 <?php
        };
        };
    };
?>

   <br><br><br>
    </center>
        <!-- JAVASCRIPT FILES -->
        <script src = "js/cardetail.js"></script>
        <script src="js/search.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>
        <section>
            <center>
        <h2>Customer Reviews </h2>
        <div class="line"></div>
        <br>

    <div class="reviews-container">

      <?php if(isset($_SESSION['email'])) { ?>
          
        <?php
        $edit_query = mysqli_query($con, "SELECT * FROM `reviews` where user_email='$user' AND carname='$carname'");
        if(mysqli_num_rows($edit_query) > 0){
        while($fetch_edit = mysqli_fetch_assoc($edit_query)){
          $date = DateTimeImmutable::createFromFormat('Y-m-d', $fetch_edit['date']);
        ?>
  <div class="review">
    <div class="review-header">
      <img class="profile" src="admin/vehicleimg/<?php echo $fetch_edit['user_picture']; ?>" alt="Profile" class="d-block ui-w-80">
      <span class="username"><?php echo $fetch_edit['username']; ?></span>
      <span class="date"><?php echo $date->format('d/m/Y'); ?></span>
    </div>
    <div class="review-body">
    <div class="star-rating">
          <ul class="list-inline">
          <?php 
            $start=1;
            while ($start <= 5) 
            {
            if ($fetch_edit['rating'] < $start) 
              {
                ?>
                <li class="list-inline-item"><i class="bi bi-star"></i></li>
                <?php
            }else{
              ?>
                <li class="list-inline-item"><i class="bi bi-star-fill"></i></li>
              <?php
            }
            $start++;
            }
          ?>                
        </ul>
      </div>
      <span class="content"><?php echo $fetch_edit['title']; ?></span>
    </div>
    <div class="edit-review">
      <span class="edit-details"><?php echo $fetch_edit['description']; ?></span><br>
      <div class="rbtn">
        <!-- <a title="Delete Your Review" class="delete" href="ecardetail.php?delete=<?php echo $row['id']; ?>"  onclick="return confirm('are your sure you want to delete this?');"><ion-icon name="trash-outline"></ion-icon></a>&nbsp;&nbsp; -->
        <a title="Update Your Review"class="update" href="updatereview.php?edit=<?php echo $carname;?>" ><ion-icon name="create-outline"></ion-icon></a>
      </div>
    </div>
 <div class="line"></div>
  </div>
  <?php
    }
}
?>
<?php } ?>

      <?php
      $edit_query = mysqli_query($con, "SELECT * FROM `reviews` where carname='$carname'");
      if(mysqli_num_rows($edit_query) > 0){
      while($fetch_edit = mysqli_fetch_assoc($edit_query)){
          $date = DateTimeImmutable::createFromFormat('Y-m-d', $fetch_edit['date']);
        ?>
  <div class="review">
    <div class="review-header">
      <img class="profile" src="admin/vehicleimg/<?php echo $fetch_edit['user_picture']; ?>" alt="Profile" class="d-block ui-w-80">
      <span class="username"><?php echo $fetch_edit['username']; ?></span>
      <span class="date"><?php echo $date->format('d/m/Y'); ?></span>
    </div>
    <div class="review-body"><br>
    <div class="star-rating">
          <ul class="list-inline">
          <?php 
            $start=1;
            while ($start <= 5) 
            {
            if ($fetch_edit['rating'] < $start) 
              {
                ?>
                <li class="list-inline-item"><i class="bi bi-star"></i></li>
                <?php
            }else{
              ?>
                <li class="list-inline-item"><i class="bi bi-star-fill"></i></li>
              <?php
            }
            $start++;
            }
          ?>                
        </ul>
      </div>
      <span class="content"><?php echo $fetch_edit['title']; ?></span>
    </div>
    <div class="edit-review">
      <span class="edit-details"><?php echo $fetch_edit['description']; ?></span>
    </div>
 <div class="line"></div>
  </div>
  <?php
    }
}
?>
</div>
    </section>
</center>
    <?php include 'footer.php';?>
    </body>
</html>
