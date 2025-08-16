<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/logo1.png">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Sign-In</title>
</head>
<body>
<ul class="navbar-nav">
      <!-- <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="bi bi-door-open"></i>BACK</a>
      </li> -->
  </ul>
  <div class="login">
    <div class="login__img">
      <img src="../images/login/signin.png" alt="">
    </div>
        <div class="login-box">
          <form method="post">
            <div class="user-box">
              <input type="text" name="email" required>
              <label><i class="bi bi-envelope-at"></i>&nbsp;&nbsp;E-mail</label>
            </div>
            <div class="user-box">
              <input type="password" name="password" required>
              <label><i class="bi bi-shield-lock"></i>&nbsp;&nbsp;Password</label>
            </div>
            <!-- <a href="forgot-pass.php" class="login__forgot">Forgot password?</a><br><br> -->
            <!-- <span class="login__account">Don't have an Account ?</span> -->
            <!-- <a href="sign-up.php"><span class="login__signup" id="sign-in">Sign Up</span><br><br> -->
            <input type="submit" value="Sign In" name="signin" class="login__button">                    
          </form>
        </div>
  </div>
</body>
</html>
<?php
error_reporting(0);
session_start();
		
		if(isset($_POST['signin']))
		{
            $email=$_POST['email'];
		    $password=$_POST['password'];

        $con=mysqli_connect("localhost","root","","carlux");
        if(!$con)
        {
        die("Failed to coonect");
        }	
            if( empty($email) OR empty($password))
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
                    text: "Enter Email Or Password."
                  });
                </script>
               <?php
            }	
            else
            {
              mysqli_select_db($con, "carlux");
              $q1="select * from admin_detail where email='$email' AND password='$password'";
              $data= mysqli_query($con, $q1);
                if(mysqli_num_rows($data)>0)
                {
                    $_SESSION['email']=$email;
                    $_SESSION['password']=$password;
                      ?>
                      <script>
                          document.addEventListener('DOMContentLoaded', function() {
                              Swal.fire({
                              icon: 'success',
                              title:'Thank You',
                              text: 'Signed in successfully!',
                              showConfirmButton: false,
                              timer: 1500
                              }).then(() => {
                              window.location.href = 'index.php';
                              });
                          });
                      </script>
                      <?php
                }
                else
                {
                      ?>
                      <script>
                              Swal.fire({
                              icon: 'error',
                              title:'Oops!',
                              text: 'Invalid Email Or Password!',
                              showConfirmButton: false,
                              timer:8000
                          });
                      </script>
                      <?php
                }
            }
            mysqli_close($con);
		}
?>