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

        <title>Carlux</title>

        <!-- CSS FILES -->
        <link rel="icon" type="image/png" href="images/favicon/logo1.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/styles.css" rel="stylesheet">
    </head>
    
    <body>

    <?php include'loader.php';?>
    <?php include'header.php';?>
    <?php include'checknetwork.php';?>
    
        <main> 
            <header class="site-header section-padding-img site-header-image">
                <div class="container">
                    <div class="row">
                        <center>
                        <div class="col-lg-6 col-12 header-info">
                            <h2>
                                <span class="d-block text-primary">Welcome</span>
                                <span class="d-block text-dark">To</span>
                                <span class="d-block text-dark">CarLux</span>
                            </h2>
                        </div>
                        <p class="d-block text-primary">Home / Who We Are?</p>
                        </center>
                    </div>
                </div>
            </header>

            <!-- Introduction Section -->
            <section class="introduction section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto text-center">
                            <h2>About CarLux MultiBrand Vehicle Showroom</h2>
                            <p class="mt-4">
                                Welcome to CarLux, your one-stop destination for premium multi-brand vehicles. 
                                We pride ourselves on offering an extensive collection of top-quality cars 
                                that cater to diverse tastes and preferences. With unparalleled customer service 
                                and a dedication to excellence, we aim to make your vehicle buying experience seamless and enjoyable.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="testimonial section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-9 mx-auto col-11">
                            <h2 class="text-center">Customer's <span>Love</span>, <br> Our Satisfaction!</h2>

                            <div class="slick-testimonial">
                                <div class="slick-testimonial-caption">
                                    <p class="lead">Over three years in business, We’ve had the chance to work on a variety of projects, with companies Lorem ipsum dolor sit amet</p>

                                    <div class="slick-testimonial-client d-flex align-items-center mt-4">
                                        <img src="images/people/senior-man-wearing-white-face-mask-covid-19-campaign-with-design-space.jpeg" class="img-fluid custom-circle-image me-3" alt="">

                                        <span>George, <strong class="text-muted">Digital Art Fashion</strong></span>
                                    </div>
                                </div>

                                <div class="slick-testimonial-caption">
                                    <p class="lead">Over three years in business, We’ve had the chance to work on a variety of projects, with companies Lorem ipsum dolor sit amet</p>

                                    <div class="slick-testimonial-client d-flex align-items-center mt-4">
                                        <img src="images/people/beautiful-woman-face-portrait-brown-background.jpeg" class="img-fluid custom-circle-image me-3" alt="">

                                        <span>Sandar, <strong class="text-muted">Zoom Fashion Idea</strong></span>
                                    </div>
                                </div>

                                <div class="slick-testimonial-caption">
                                    <p class="lead">Over three years in business, We’ve had the chance to work on a variety of projects, with companies Lorem ipsum dolor sit amet</p>

                                    <div class="slick-testimonial-client d-flex align-items-center mt-4">
                                        <img src="images/people/portrait-british-woman.jpeg" class="img-fluid custom-circle-image me-3" alt="">

                                        <span>Marie, <strong class="text-muted">Art Fashion Design</strong></span>
                                    </div>
                                </div>

                                <div class="slick-testimonial-caption">
                                    <p class="lead">Over three years in business, We’ve had the chance to work on a variety of projects, with companies Lorem ipsum dolor sit amet</p>

                                    <div class="slick-testimonial-client d-flex align-items-center mt-4">
                                        <img src="images/people/woman-wearing-mask-face-closeup-covid-19-green-background.jpeg" class="img-fluid custom-circle-image me-3" alt="">

                                        <span>Catherine, <strong class="text-muted">Dress Fashion</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </main>

        <?php include 'footer.php';?>
        
        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>

        <script>
            // Initialize Slick Slider for Testimonials
            $(document).ready(function() {
                $('.slick-testimonial').slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true, // Enable auto-slide
                    autoplaySpeed: 30000, // Set interval in milliseconds
                    arrows: false, // Hide navigation arrows
                    dots: true // Enable dots navigation
                });
            });
        </script>

    </body>
</html>
