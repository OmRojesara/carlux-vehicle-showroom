<?php
error_reporting();
session_start();
$user=$_SESSION['email'];
@include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <title>add review</title>
</head>
<style>
  .account-form {
  margin-top:8%;
  margin-left:25%;
  padding: 10px;
  /* background-color: #f8f8f8; */
  /* border: 1px solid #ddd; */
  border-radius: 5px;
  width: 50%;
  box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.1);
}

.account-form h3 {
  margin-top: 0;
  margin-bottom: 10px;
  color: #333;
}

.account-form .placeholder {
  margin-top: 10px;
  margin-bottom: 5px;
  color: #000;
}

.account-form .box {
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  margin-bottom: 10px;
  width: 100%;
}

.account-form .box:focus,.box:hover {
  outline: none;
  border-color: rgba(92, 76, 234, 0.4);
  background-color: #fff;
  box-shadow: 0 0 0 4px rgba(168, 131, 255, 0.1);
}

.account-form textarea {
  resize: vertical;
}

.account-form select {
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  margin-bottom: 10px;
  width: 100%;
}

.account-form select:focus,select:hover {
  outline: none;
  border-color: rgba(92, 76, 234, 0.4);
  background-color: #fff;
  box-shadow: 0 0 0 4px rgba(168, 131, 255, 0.1);
}

.account-form input[type="submit"] {
  padding: 10px
}
.text{
  color: #FF4400;
  font-size:25px;
  border-bottom: 1px solid #ff4400;
}
.button{
  background: rgba(92, 76, 234, 0.4);
  border: 1px solid rgba(92, 76, 234, 0.4);
  border-radius:10px;
}
.rating{
  margin-right:75%;
}
.rating:not(:checked) > input {
  position: absolute;
  appearance: none;
}

.rating:not(:checked) > label {
  float: right;
  cursor: pointer;
  font-size: 30px;
  color: #666;
}

.rating:not(:checked) > label:before {
  content: '★';
}

.rating > input:checked + label:hover,
.rating > input:checked + label:hover ~ label,
.rating > input:checked ~ label:hover,
.rating > input:checked ~ label:hover ~ label,
.rating > label:hover ~ input:checked ~ label {
  color: #e58e09;
}

.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
  color: #ff9e0b;
}

.rating > input:checked ~ label {
  color: #ffa723;
}
</style>
<body>
<?php
         $user=$_SESSION['email'];
         if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];
         $select_user = mysqli_query($con, "SELECT * FROM `reviews` where user_email='$user' AND carname='$edit_id'");
         if(mysqli_num_rows($select_user) > 0){
            while($fetch_user = mysqli_fetch_assoc($select_user)){
                $title =$fetch_user['title'];
                $description =$fetch_user['description'];
            }
        }
        }
      ?>
<?php include 'loader.php';?>
<?php include 'header.php';?>
<?php include 'checknetwork.php';?>
<section class="account-form">
   <form action="" method="post">
      <center><p class="text">Update Your Review</p></center>
      <p class="placeholder">Review Title <span>*</span></p>
      <input type="text" name="title" required maxlength="50" value="<?php echo $title;?>" class="box">
      <p class="placeholder">Review Description</p>
      <textarea name="description" class="box"  maxlength="100" cols="4" rows="4"><?php echo $description;?></textarea>
      <p class="placeholder">Review Rating <span>*</span></p>
      <!-- <select name="rating" class="box" required>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
      </select> -->
    <div class="rating">
      <input value="5" name="rating" id="star5" type="radio">
      <label title="text" for="star5"></label>
      <input value="4" name="rating" id="star4" type="radio">
      <label title="text" for="star4"></label>
      <input value="3" name="rating" id="star3" type="radio" checked="">
      <label title="text" for="star3"></label>
      <input value="2" name="rating" id="star2" type="radio">
      <label title="text" for="star2"></label>
      <input value="1" name="rating" id="star1" type="radio">
      <label title="text" for="star1"></label>
    </div>
    <br><br>
      <center><input class="button" type="submit" value="Submit Review" name="submit" class="btn"><center>
   </form>
</section>
<br>
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
error_reporting();
session_start();
$user=$_SESSION['email'];
@include 'config.php';
if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
if(isset($_POST['submit'])){
    
      $carname=$_GET['edit'];
      $user=$_SESSION['email'];
      $title = $_POST['title'];
      $description = $_POST['description'];
      $rating = $_POST['rating'];

      $q1 = "UPDATE `reviews` SET rating='$rating', title='$title', description='$description' WHERE user_email='$user' AND carname='$carname'";

        mysqli_select_db($con, "carlux");
        $result = mysqli_query($con, $q1);
        if($result)
        {
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
                        icon: 'success',
                    title:'Thank You !',
                    text: 'We Appreciate For Your Review.',
                    });

                    // Redirect after 4 seconds (same as the timer duration)
                    setTimeout(() => {
                        window.location.href = "updatereview.php";
                    }, 1500);
                </script>
              <?php
        }
      }
    }
?>