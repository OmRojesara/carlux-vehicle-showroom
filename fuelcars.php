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
        <link rel="icon" type="image/png" href="images/favicon/logo1.png">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Carlux</title>

        <!-- CSS FILES -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/styles.css" rel="stylesheet">

    </head>
    <style>
        .brand_text {
            color: red;
            font-size: 30px;
            border-bottom:1px solid red;
        }
        .material-symbols-outlined{
            color: red;
            font-size: 15px;
        }
    </style>
    
    <body>

    <?php include'loader.php';?>
    <?php include'header.php';?>
    
        <main>
            <header class="site-header section-padding d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">
                    <center>
                        <div class="col-lg-10 col-12">
                            <h1>
                                <span class="d-block text-primary">Choose your</span>
                                <span class="d-block text-dark">Dream Car</span>
                            </h1>
                        </div>
                        <p class="d-block text-primary">Home / Fuel Cars</p>
                    <center>
                    </div>
                </div>
            </header>
            <center>

            <div class="group">
            <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
            <input  id="search-input" placeholder="Search By Car name" type="search" class="input">
            </div>

            <section class="products section-padding">
                <div class="container" >
                    <div class="row" id="product-list">
                        <?php
                                mysqli_select_db($con, "carlux");
                                $q1 = "SELECT * FROM `fuel_car`";
                                $result = mysqli_query($con, $q1);
                                if(mysqli_num_rows($result) > 0){
                                while($fetch_product = mysqli_fetch_assoc($result)){
                                ?>
                        <div class="col-lg-4 col-12 mb-3">
                       
                        
                            <div class="product-thumb">
                            <a href="fcardetail.php?edit=<?php echo $fetch_product['id'];?>">
                                <img src="admin/vehicleimg/.<?php echo $fetch_product['image1']; ?>" width="300px">
                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="car_name">
                                        <?php echo $fetch_product['carname']; ?>
                                        </h5>
                                        <h6 class="car_brand"><?php echo $fetch_product['brand']; ?></h6>
                                        </a>
                                        <small class="car_price"><i class="material-symbols-outlined">currency_rupee</i>&nbsp;Price : 
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php echo $fetch_product['price']; ?></small>
                                
                                        <br>
                                        <small class="product-p"><i class="material-symbols-outlined">filter_alt</i>&nbsp;Fuel Type : 
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php echo $fetch_product['fueltype'];?> </small>
                                        <br>
                                        <small class="product-p"><i class="material-symbols-outlined">airline_seat_recline_extra</i>&nbsp;Seating : 
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php echo $fetch_product['seating_capacity']; ?>&nbsp;People</small>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            
                           
                        </div>
                        <?php
                                    };
                                    };
                                ?>
                        </div>
                    </div>
                </div>
            </section>
            <center>

        </main>

        <?php include 'footer.php';?>
        <script src="js/search.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>
