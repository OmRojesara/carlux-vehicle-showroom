<?php
error_reporting(0);
session_start();
@include 'config.php';

// Generate arithmetic captcha
if(!isset($_SESSION['captcha_question']) || !isset($_SESSION['captcha_answer'])) {
    $num1 = rand(10, 99);
    $num2 = rand(1, 20);
    $operations = ['+', '-', '*'];
    $operation = $operations[array_rand($operations)];
    
    switch($operation) {
        case '+':
            $_SESSION['captcha_answer'] = $num1 + $num2;
            $_SESSION['captcha_question'] = "$num1 + $num2 = ?";
            break;
        case '-':
            $_SESSION['captcha_answer'] = $num1 - $num2;
            $_SESSION['captcha_question'] = "$num1 - $num2 = ?";
            break;
        case '*':
            $_SESSION['captcha_answer'] = $num1 * $num2;
            $_SESSION['captcha_question'] = "$num1 × $num2 = ?";
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/favicon/logo1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Sign Up - CarLux</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 24px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 600px;
        }

        .illustration {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .illustration::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .illustration-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
        }

        .illustration-content h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .illustration-content p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .form-section {
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 8px;
        }

        .form-header p {
            color: #666;
            font-size: 1rem;
        }

        .back-btn {
            position: absolute;
            top: 30px;
            right: 30px;
            background: #f8f9fa;
            border: none;
            padding: 12px 20px;
            border-radius: 12px;
            color: #666;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .back-btn:hover {
            background: #e9ecef;
            transform: translateY(-2px);
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
            font-size: 0.9rem;
        }

        .input-wrapper {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 16px 20px 16px 50px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .form-input:focus + .input-icon {
            color: #667eea;
        }

        .captcha-section {
            background: #f8f9fa;
            border-radius: 16px;
            padding: 24px;
            margin: 32px 0;
            border: 2px solid #e9ecef;
        }

        .captcha-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .captcha-icon {
            background: #667eea;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .captcha-question {
            background: white;
            padding: 16px 24px;
            border-radius: 12px;
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            text-align: center;
            border: 2px solid #e9ecef;
            margin-bottom: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .captcha-controls {
            display: flex;
            gap: 16px;
            align-items: center;
            flex-wrap: wrap;
        }

        .refresh-btn {
            background: #ff6b6b;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .refresh-btn:hover {
            background: #ff5252;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
        }

        .captcha-input {
            flex: 1;
            min-width: 200px;
        }

        .submit-section {
            text-align: center;
            margin-top: 32px;
        }

        .account-link {
            color: #666;
            margin-bottom: 24px;
            display: block;
        }

        .account-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .account-link a:hover {
            color: #5a6fd8;
        }

        .submit-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 16px 40px;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            max-width: 300px;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
                max-width: 500px;
            }
            
            .illustration {
                display: none;
            }
            
            .form-section {
                padding: 40px 30px;
            }
            
            .captcha-controls {
                flex-direction: column;
                align-items: stretch;
            }
            
            .captcha-input {
                min-width: auto;
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .slide-in {
            animation: slideIn 0.8s ease-out;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }
    </style>
</head>
<body>
    <div class="container fade-in">
        <div class="illustration slide-in">
            <div class="illustration-content">
                <h2>Welcome to CarLux</h2>
                <p>Join thousands of satisfied customers in finding their perfect vehicle</p>
            </div>
        </div>
        
        <div class="form-section slide-in">
            <button class="back-btn" onclick="window.location.href='sign-in.php'">
                <i class="bi bi-arrow-left"></i>
                Back
            </button>
            
            <div class="form-header">
                <h1>Create Account</h1>
                <p>Join the CarLux family today</p>
            </div>
            
            <form method="post" id="signupForm">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <div class="input-wrapper">
                        <input type="text" id="name" name="name" class="form-input" placeholder="Enter your full name" required>
                        <i class="bi bi-person input-icon"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email" required>
                        <i class="bi bi-envelope input-icon"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="contact">Contact Number</label>
                    <div class="input-wrapper">
                        <input type="tel" id="contact" name="contact" class="form-input" placeholder="Enter your contact number" required>
                        <i class="bi bi-telephone input-icon"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password" class="form-input" placeholder="Create a strong password" required>
                        <i class="bi bi-lock input-icon"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="cpassword" name="cpassword" class="form-input" placeholder="Confirm your password" required>
                        <i class="bi bi-shield-lock input-icon"></i>
                    </div>
                </div>
                
                <div class="captcha-section">
                    <div class="captcha-header">
                        <div class="captcha-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <span style="font-weight: 600; color: #333;">Security Verification</span>
                    </div>
                    
                    <div class="captcha-question" id="captchaQuestion">
                        <?php echo $_SESSION['captcha_question']; ?>
                    </div>
                    
                    <div class="captcha-controls">
                        <button type="button" class="refresh-btn" onclick="refreshCaptcha()">
                            <i class="bi bi-arrow-clockwise"></i>
                            New Question
                        </button>
                        <input type="number" name="captcha" class="form-input captcha-input" placeholder="Enter your answer" required>
                    </div>
                </div>
                
                <div class="submit-section">
                    <div class="account-link">
                        Already have an account? <a href="sign-in.php">Sign In</a>
                    </div>
                    <button type="submit" name="signup" class="submit-btn">
                        Create Account
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // AJAX captcha refresh without page reload
        function refreshCaptcha() {
            fetch('refresh_captcha.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('captchaQuestion').textContent = data.question;
                    // Clear the captcha input
                    document.querySelector('input[name="captcha"]').value = '';
                    
                    // Add a subtle animation
                    const question = document.getElementById('captchaQuestion');
                    question.style.transform = 'scale(1.05)';
                    question.style.transition = 'transform 0.2s ease';
                    setTimeout(() => {
                        question.style.transform = 'scale(1)';
                    }, 200);
                }
            })
            .catch(error => {
                console.error('Error refreshing captcha:', error);
                // Fallback to page reload if AJAX fails
                location.reload();
            });
        }

        // Form validation and animations
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-input');
            
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });
        });
    </script>

    <?php
    error_reporting(0);
    session_start();
    $con=mysqli_connect("localhost","root","","carlux");
    if(!$con)
    {
    die("Failed to coonect");
    }	

    if(isset($_POST['signup']))
    { 
        $name=$_POST['name'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $captcha=$_POST['captcha'];
        
        mysqli_select_db($con, "carlux");
        $q1 = "SELECT * FROM user_detail WHERE email = '$email'";
        $result = mysqli_query($con, $q1);
        
        if(empty($name) OR empty($email) OR empty($contact) OR empty($cpassword) OR empty($password) OR empty($captcha))
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
                text: "All Fields Are Required."
              });
              </script>
            <?php
        }
        else if(preg_match('/[0-9]+/', $name))
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
                title:"Invalid!",
                text: "Number Not Allowed In Full Name."
              });
              </script>
            <?php
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
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
                title:"Invalid!",
                text: "Enter Proper Email Address."
              });
              </script>
            <?php
        }
        else if(!filter_var( $contact,FILTER_SANITIZE_NUMBER_INT))
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
                title:"Invalid!",
                text: "Enter Proper Contact Number."
              });
              </script>
            <?php
        }
        else if(strlen($contact)>10)
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
                title:"Invalid!",
                text: "Contact Number Must Be(0-9)"
              });
              </script>
            <?php
        }
        else if(strlen($password)<8)
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
                title:"Invalid!",
                text: "Password Must Be At Least 8 Charactes Long."
              });
              </script>
            <?php
        }
        else if($password!=$cpassword)
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
                title:"Invalid!",
                text: "Password Or Confirm Password Can't Match."
              });
              </script>
            <?php
        }
        else if($captcha != $_SESSION['captcha_answer'])
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
                title:"Invalid Captcha!",
                text: "Please solve the arithmetic problem correctly."
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
                title:"Email is Already Taken!",
              });
              </script>
            <?php
        }
        else{
            if(!$result){
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
            elseif($result){
                $status = "verified";
                $q1="INSERT INTO `user_detail`(name,email,contact,password,status) VALUES('$name','$email','$contact','$password','$status')";
                mysqli_select_db($con, "carlux");
                $result = mysqli_query($con, $q1);
                
                if($result){
                    $_SESSION['email'] = $email;
                    ?>
                    <script>
                    Swal.fire({
                        icon: 'success',
                        title:'Thank You!',
                        text: 'Registration successful! You can now sign in.',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        window.location.href = 'sign-in.php';
                    });
                    </script>
                    <?php
                }else{
                    ?>
                    <script>
                    Swal.fire({
                        icon: 'error',
                        title:'Oops!',
                        text: 'Registration failed! Please try again.',
                        showConfirmButton: false,
                        timer:4000
                    });
                    </script>
                    <?php
                }
            }
        }
    }
    mysqli_close($con);
    ?>
</body>
</html>