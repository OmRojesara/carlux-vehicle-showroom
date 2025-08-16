<?php
error_reporting(0);
//session_start();
@include 'config.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Carlux</title>

        <!-- CSS FILES -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="icon" type="image/png" href="images/favicon/logo1.png">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/styles.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    
    <body>

    <?php //include'loader.php';?>
    <?php include'header.php';?>
    <?php include'checknetwork.php';?>
    
        <main>
            <header class="site-header section-padding-img site-header-image">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12 header-info">
                            <h1>
                                <span class="d-block text-primary">Say Hello To Us</span>
                                <span class="d-block text-dark">Love To Hear Your Queries!</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="contact section-padding">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-6 col-12">
                            <h2 class="mb-4">Inquiry <span>Form</span></h2>

                            <form class="contact-form me-lg-5 pe-lg-3" role="form" method="POST">
        <div class="form-floating">
            <input type="text" name="name" id="name" class="form-control" placeholder="Full name" required>
            <label for="name">Full name</label>
        </div>

        <div class="form-floating my-4">
            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
            <label for="email">Email address</label>
        </div>
        
        <div class="form-floating my-4">
            <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required>
            <label for="subject">Subject</label>
        </div>

        <div class="form-floating mb-4">
            <textarea id="message" name="message" class="form-control" placeholder="Leave a comment here" required style="height: 160px"></textarea>
            <label for="message">Tell us about the project</label>
        </div>

        <div class="col-lg-5 col-6">
            <button type="submit" class="form-control">Send</button>
        </div>
    </form>
                        </div>

                        <div class="col-lg-6 col-12 mt-5 ms-auto">
                            <div class="row">
                                <div class="col-6 border-end contact-info">
                                    <h6 class="mb-3">Compony</h6>

                                    <a href="" class="custom-link">
                                        CarLux.com
                                        <i class="bi-arrow-right ms-2"></i>
                                    </a>
                                </div>

                                <div class="col-6 contact-info">
                                	<h6 class="mb-3">E-Mail Id</h6>

                                    <a href="mailto:studio@company.com" class="custom-link">
                                        carlux.vehicles@gmail.com
                                        <i class="bi-arrow-right ms-2"></i>
                                    </a>
                                </div>

                                <div class="col-6 border-top border-end contact-info">
                                    <h6 class="mb-3">Our Office</h6>

                                    <p class="text-muted">2nd Floor, MCA Building, LJ University, Near Sanand-Sarkhej Circle S.G. Road,
                                    Ahmedabad-382210</p>
                                </div>

                                <div class="col-6 border-top contact-info">
                                    <h6 class="mb-3">Our Socials</h6>

                                    <ul class="social-icon">

                                        <li><a href="#" class="social-icon-link bi-messenger"></a></li>

                                        <li><a href="#" class="social-icon-link bi-youtube"></a></li>

                                        <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                                        <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </main>

       <?php include 'footer.php';?>
    </body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $conn = new mysqli('127.0.0.1', 'root', '', 'carlux');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $q1 = "INSERT INTO user_inquiry (fname, email, subject, `desc`) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($q1) === TRUE) {
        echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Your query has been raised successfully! Our representative will call back you shortly.',
                icon: 'success',
                confirmButtonText: 'Thank You!'
            }).then(() => {
                window.location.href = 'contact.php'; // Replace with your desired redirect page
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'There was an issue submitting your query: " . $conn->error . "',
                icon: 'error',
                confirmButtonText: 'Try Again'
            });
        </script>";
    }

    $conn->close();
}
?>