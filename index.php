<?php
error_reporting(0);
session_start();
@include 'config.php';

// Handle logout functionality
if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    session_unset();
    session_destroy();
    header('Location: sign-in.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CarLux - Multi Brand Vehicle Showroom | Premium Cars, Electric Vehicles, Luxury Automobiles">
    <meta name="author" content="CarLux">
    <meta name="keywords" content="cars, vehicles, electric cars, luxury cars, car dealership, CarLux, automobile showroom">
    <title>CarLux - Multi Brand Vehicle Showroom | Premium Cars & Electric Vehicles</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon/logo1.png">
    
    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
    <!-- Local CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/slick.css">
    <link href="css/styles.css" rel="stylesheet">
    
    <!-- Optimized Homepage Styles -->
    <style>
        /* Hero Slideshow */
        .simple-slideshow {
            position: relative;
            width: 100%;
            height: 600px;
            overflow: hidden;
        }
        
        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .slide.active {
            opacity: 1;
        }
        
        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .slide-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.7));
            color: white;
            padding: 50px 0 30px 0;
        }
        
        .slide-content .container {
            position: relative;
            z-index: 2;
        }
        
        .slide-title {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .slide-description {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        
        .slide-link {
            color: white;
            text-decoration: none;
        }
        
        .slide-link:hover {
            color: #ffc107;
        }
        
        /* Navigation Controls */
        .slideshow-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0,0,0,0.5);
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 20px;
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s ease;
        }
        
        .slideshow-nav:hover {
            background: rgba(0,0,0,0.8);
            transform: translateY(-50%) scale(1.1);
        }
        
        .slideshow-nav.prev {
            left: 20px;
        }
        
        .slideshow-nav.next {
            right: 20px;
        }
        
        /* Indicators */
        .slideshow-indicators {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 10;
        }
        
        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255,255,255,0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .indicator.active {
            background: white;
            transform: scale(1.2);
        }
        
        /* Section Styling */
        .section-padding {
            padding: 80px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            position: relative;
        }
        
        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(135deg, #ffc107, #dc3545);
            border-radius: 2px;
        }
        
        .section-title p {
            font-size: 1.1rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }
        
        /* Featured Vehicles */
        .vehicle-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }
        
        .vehicle-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .vehicle-image {
            height: 250px;
            overflow: hidden;
            position: relative;
        }
        
        .vehicle-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .vehicle-card:hover .vehicle-image img {
            transform: scale(1.1);
        }
        
        .vehicle-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #ffc107;
            color: #333;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .vehicle-content {
            padding: 25px;
        }
        
        .vehicle-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        
        .vehicle-brand {
            font-size: 1rem;
            color: #dc3545;
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .vehicle-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffc107;
            margin-bottom: 15px;
        }
        
        .vehicle-features {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 0.9rem;
            color: #666;
        }
        
        .vehicle-feature {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .btn-view-details {
            width: 100%;
            background: #DC6735FF;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-view-details:hover {
            background: #ffc107;
            color: #333;
            text-decoration: none;
        }
        
        /* Services Section */
        .service-card {
            text-align: center;
            padding: 40px 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.12);
        }
        
        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #ffc107, #ff8c00);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2rem;
            color: white;
        }
        
        .service-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }
        
        .service-description {
            color: #666;
            line-height: 1.6;
        }
        
        /* Statistics Section */
        .stats-section {
            background: linear-gradient(135deg, #333, #555);
            color: white;
            padding: 80px 0;
        }
        
        .stat-item {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            color: #ffc107;
            margin-bottom: 10px;
            display: block;
        }
        
        .stat-label {
            font-size: 1.1rem;
            color: #ccc;
        }
        
        /* Testimonials */
        .testimonial-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            text-align: center;
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }
        
        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.12);
        }
        
        .testimonial-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto 20px;
            overflow: hidden;
        }
        
        .testimonial-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .testimonial-text {
            font-style: italic;
            color: #666;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        
        .testimonial-author {
            font-weight: bold;
            color: #333;
        }
        
        .testimonial-position {
            color: #666;
            font-size: 0.9rem;
        }
        
        /* Contact Info Section */
        .contact-info-card {
            background: white;
            padding: 40px 20px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
            margin-bottom: 30px;
        }
        
        .contact-info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.12);
        }
        
        .contact-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #dc3545, #ffc107);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2rem;
            color: white;
        }
        
        .contact-info-card h4 {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }
        
        .contact-info-card p {
            color: #666;
            line-height: 1.6;
            margin: 0;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .simple-slideshow {
                height: 400px;
            }
            
            .slide-title {
                font-size: 2rem;
            }
            
            .slide-description {
                font-size: 1rem;
            }
            
            .slideshow-nav {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }
            
            .slideshow-nav.prev {
                left: 10px;
            }
            
            .slideshow-nav.next {
                right: 10px;
            }
            
            .section-padding {
                padding: 60px 0;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 576px) {
            .simple-slideshow {
                height: 300px;
            }
            
            .slide-title {
                font-size: 1.5rem;
            }
            
            .slide-description {
                font-size: 0.9rem;
            }
            
            .section-padding {
                padding: 40px 0;
            }
            
            .section-title h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>

<?php include 'loader.php';?>
<?php include 'header.php';?>
<?php include 'checknetwork.php';?>

<main>
    <!-- Hero Slideshow Section -->
    <section class="simple-slideshow">
        <!-- Navigation Buttons -->
        <button class="slideshow-nav prev" onclick="changeSlide(-1)">
            <i class="bi bi-chevron-left"></i>
        </button>
        <button class="slideshow-nav next" onclick="changeSlide(1)">
            <i class="bi bi-chevron-right"></i>
        </button>
        
        <!-- Slides -->
        <div class="slide active">
            <img src="images/slideshow/original.jpeg" alt="CarLux Showroom">
            <div class="slide-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-10">
                            <h1 class="slide-title">Welcome To <span class="text-warning">CarLux</span></h1>
                            <p class="slide-description">Thinking of buying a car? Let's Explore Carlux</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="slide">
            <img src="images/slideshow/electric.png" alt="Electric Cars">
            <div class="slide-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-10">
                            <a href="electriccars.php" class="slide-link">
                                <h1 class="slide-title">Electric Cars</h1>
                            </a>
                            <p class="slide-description">Let's Explore Electric Cars!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="slide">
            <img src="images/slideshow/lx.jpg" alt="Trusted Car Dealer">
            <div class="slide-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-10">
                            <p class="slide-description">Most Trusted To Buy Cars With Simple and Transparent Process.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Indicators -->
        <div class="slideshow-indicators">
            <div class="indicator active" onclick="goToSlide(0)"></div>
            <div class="indicator" onclick="goToSlide(1)"></div>
            <div class="indicator" onclick="goToSlide(2)"></div>
        </div>
    </section>

    <!-- Featured Vehicles Section -->
    <section class="section-padding">
        <div class="container">
            <div class="section-title">
                <h2>Featured Vehicles</h2>
                <p>Discover our handpicked selection of premium vehicles from top brands</p>
            </div>
            
            <div class="row">
                <?php
                mysqli_select_db($con, "carlux");
                $q1 = "SELECT * FROM `fuel_car` LIMIT 6";
                $result = mysqli_query($con, $q1);
                if(mysqli_num_rows($result) > 0){
                    while($fetch_product = mysqli_fetch_assoc($result)){
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="vehicle-card">
                        <div class="vehicle-image">
                            <img src="admin/vehicleimg/.<?php echo $fetch_product['image1']; ?>" alt="<?php echo $fetch_product['carname']; ?>">
                            <div class="vehicle-badge">Featured</div>
                        </div>
                        <div class="vehicle-content">
                            <h3 class="vehicle-title"><?php echo $fetch_product['carname']; ?></h3>
                            <div class="vehicle-brand"><?php echo $fetch_product['brand']; ?></div>
                            <div class="vehicle-price">₹<?php echo $fetch_product['price']; ?></div>
                            <div class="vehicle-features">
                                <span class="vehicle-feature"><i class="bi bi-fuel-pump"></i> <?php echo $fetch_product['fueltype']; ?></span>
                                <span class="vehicle-feature"><i class="bi bi-people"></i> <?php echo $fetch_product['seating_capacity']; ?> Seats</span>
                                <span class="vehicle-feature"><i class="bi bi-gear"></i> <?php echo isset($fetch_product['transmission']) ? $fetch_product['transmission'] : 'Auto'; ?></span>
                            </div>
                            <a href="fcardetail.php?edit=<?php echo $fetch_product['id'];?>" class="btn-view-details">View Details</a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
            
            <div class="text-center mt-5">
                <a href="fuelcars.php" class="btn btn-outline-warning btn-lg me-3">View All Vehicles</a>
                <a href="electriccars.php" class="btn btn-warning btn-lg">Electric Cars</a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section-padding bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Our Services</h2>
                <p>Comprehensive automotive services to keep your vehicle in perfect condition</p>
            </div>
            
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-car-front"></i>
                        </div>
                        <h3 class="service-title">Vehicle Sales</h3>
                        <p class="service-description">Wide selection of new and pre-owned vehicles from top brands with competitive pricing.</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-tools"></i>
                        </div>
                        <h3 class="service-title">Maintenance</h3>
                        <p class="service-description">Professional maintenance and repair services by certified technicians using genuine parts.</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h3 class="service-title">Warranty</h3>
                        <p class="service-description">Comprehensive warranty coverage and extended protection plans for peace of mind.</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-credit-card"></i>
                        </div>
                        <h3 class="service-title">Financing</h3>
                        <p class="service-description">Flexible financing options and competitive rates to make your dream car affordable.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Happy Customers</div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Vehicle Models</div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">10+</div>
                        <div class="stat-label">Years Experience</div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Customer Support</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section-padding">
        <div class="container">
            <div class="section-title">
                <h2>What Our Customers Say</h2>
                <p>Real experiences from satisfied customers who chose CarLux</p>
            </div>
            
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-avatar">
                            <img src="images/people/beautiful-woman-face-portrait-brown-background.jpeg" alt="Sarah Johnson">
                        </div>
                        <p class="testimonial-text">"CarLux made buying my first car so easy! The team was professional and helped me find the perfect vehicle within my budget."</p>
                        <div class="testimonial-author">Sarah Johnson</div>
                        <div class="testimonial-position">First-time Buyer</div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-avatar">
                            <img src="images/people/portrait-british-woman.jpeg" alt="Emily Davis">
                        </div>
                        <p class="testimonial-text">"Excellent service and maintenance! My car has never been in better condition. Highly recommend CarLux for all automotive needs."</p>
                        <div class="testimonial-author">Emily Davis</div>
                        <div class="testimonial-position">Regular Customer</div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-avatar">
                            <img src="images/people/senior-man-wearing-white-face-mask-covid-19-campaign-with-design-space.jpeg" alt="Michael Brown">
                        </div>
                        <p class="testimonial-text">"The electric car selection at CarLux is impressive! They helped me transition to an eco-friendly vehicle seamlessly."</p>
                        <div class="testimonial-author">Michael Brown</div>
                        <div class="testimonial-position">EV Enthusiast</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-card text-center">
                        <div class="contact-icon">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <h4>Visit Our Showroom</h4>
                        <p>123 CarLux Street<br>Automotive District<br>City, State 12345</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-card text-center">
                        <div class="contact-icon">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <h4>Call Us Today</h4>
                        <p>+1 (555) 123-4567<br>+1 (555) 987-6543<br>24/7 Support Available</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-card text-center">
                        <div class="contact-icon">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <h4>Email Us</h4>
                        <p>info@carlux.com<br>sales@carlux.com<br>support@carlux.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php';?>

<!-- JavaScript Files -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/Headroom.js"></script>
<script src="js/jQuery.headroom.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/custom.js"></script>

<!-- Optimized Slideshow JavaScript -->
<script>
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const indicators = document.querySelectorAll('.indicator');
let slideInterval;

function showSlide(index) {
    slides.forEach(slide => slide.classList.remove('active'));
    indicators.forEach(indicator => indicator.classList.remove('active'));
    
    if (slides[index]) slides[index].classList.add('active');
    if (indicators[index]) indicators[index].classList.add('active');
    
    currentSlide = index;
}

function changeSlide(direction) {
    const newIndex = (currentSlide + direction + slides.length) % slides.length;
    showSlide(newIndex);
    resetTimer();
}

function goToSlide(index) {
    showSlide(index);
    resetTimer();
}

function resetTimer() {
    clearInterval(slideInterval);
    startAutoPlay();
}

function startAutoPlay() {
    slideInterval = setInterval(() => changeSlide(1), 5000);
}

// Initialize slideshow
startAutoPlay();

// Event listeners
const slideshow = document.querySelector('.simple-slideshow');
slideshow.addEventListener('mouseenter', () => clearInterval(slideInterval));
slideshow.addEventListener('mouseleave', startAutoPlay);

document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') changeSlide(-1);
    else if (e.key === 'ArrowRight') changeSlide(1);
});

// Touch/swipe support
let touchStartX = 0;
slideshow.addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
});

slideshow.addEventListener('touchend', (e) => {
    const touchEndX = e.changedTouches[0].screenX;
    const diff = touchStartX - touchEndX;
    
    if (Math.abs(diff) > 50) {
        changeSlide(diff > 0 ? 1 : -1);
    }
});

// Smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Scroll animations
function animateOnScroll() {
    const elements = document.querySelectorAll('.vehicle-card, .service-card, .testimonial-card');
    
    elements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        if (elementTop < window.innerHeight - 150) {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }
    });
}

window.addEventListener('scroll', animateOnScroll);
window.addEventListener('load', animateOnScroll);
</script>

</body>
</html>
