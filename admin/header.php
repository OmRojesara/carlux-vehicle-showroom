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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css/admin.css">
    <title>CarLux</title>
</head>
<style>
.accordion {
  margin-top:20px;
  background-color: #f6f6f9;
  color: #FF4400;
  cursor: pointer;
  padding: 5px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}
.accordion a{
    width: 100%;
    height: 100%;
    background: #f6f6f9;
    display: flex;
    align-items: center;
    font-size: 16px;
    color: #363949;
    white-space: nowrap;
    overflow-x: hidden;
    transition: all 0.5s ease;
}

.active, .accordion a:hover {
  color: #FF4400; 
}
ion-icon {
  font-size: 30px;
}

.panel{
    padding:10px;
    display: none;
    overflow: hidden;
    animation: slideDown 0.5s ease;
}
.panel .submenu:hover{
    color:#FF4400;
}
@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.dropdown {
    position: relative;
    display: inline-block;
    transition: all 0.5s ease;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    width: 120px;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    border-radius:10px;
    z-index: 1;
    right: 20%;
    transition: all 0.5s ease;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    border-radius:10px;
    display: block;
    transition: all 0.5s ease;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
    color:#FF4400;

}

.dropdown:hover .dropdown-content {
    display: block;
}
.material-symbols-outlined{
    margin-left:10px;
    font-size:25px;
}

</style>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="index.php" class="logo">
        &nbsp;<img src="images/logo1.png" height=50>
        &nbsp;&nbsp;<div class="logo-name"><span>Car</span>Lux</div>
        </a>
        <ul class="side-menu">
        <li>
            <a href="index.php" class="dashbord">&nbsp;
            <span class="material-symbols-outlined">space_dashboard</span>&nbsp;
                Dashboard
            </a>
            </li>
        <button class="accordion"><a>&nbsp;&nbsp;&nbsp;<i class="bi bi-car-front"></i>&nbsp;&nbsp;Cars</a></button>
        <div class="panel">
            <li><a href="viewelectriccar.php" class="submenu"><i class="bi bi-dot"></i>electric Car</a></li>
            <li><a href="viewfuelcar.php" class="submenu"><i class="bi bi-dot"></i>fuel Car</a></li>
        </div>

        <button class="accordion"><a>&nbsp;&nbsp;&nbsp;<i class="bi bi-journal-check"></i>&nbsp;&nbsp;bookings</a></button>
        <div class="panel">
            <li><a href="bookings.php" class="submenu"><i class="bi bi-dot"></i>All bookings</a></li>
       
            <li><a href="pendingbookings.php" class="submenu"><i class="bi bi-dot"></i>Pending bookings</a></li>
            <li><a href="approvedbookings.php" class="submenu"><i class="bi bi-dot"></i>Approved bookings</a></li>
        </div>

        <button class="accordion"><a>&nbsp;&nbsp;&nbsp;<i class="bi bi-person"></i>&nbsp;&nbsp;Login List</a></button>
        <div class="panel">
            <li><a href="admintable.php" class="submenu"><i class="bi bi-dot"></i>Admin</a></li>
        <li><a href="usertable.php" class="submenu"><i class="bi bi-dot"></i>Customer</a></li>
        </div>
        <button class="accordion"><a>&nbsp;&nbsp;&nbsp;<i class="bi bi-gear-wide-connected"></i>&nbsp;&nbsp;Settings</a></button>
        <div class="panel">
            <li><a href="addbrand.php" class="submenu"><i class="bi bi-dot"></i>Add New Brand</a></li>
        </div>
        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class="bx bx-menu bi bi-list-ul"></i>
            <form action="#">
                <div class="form-input">
                    <button></i></button>
                </div>
            </form>
            <div class="dropdown">
                <a href="#" class="profile">
                <span class="material-symbols-outlined">account_circle</span>
                </a>
                <div class="dropdown-content">
                    <a href="adminprofile.php">Profile</a>
                    <a href="#">Logout</a>
                </div>
        </div>
        </nav>
        <!-- End of Navbar -->
    </div>
    <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
        panel.style.display = "none";
        } else {
        panel.style.display = "block";
        }
    });
    }
</script>
    <script src="js/admin.js"></script>
    <script src="js/time.js"></script>
</body>

</html>