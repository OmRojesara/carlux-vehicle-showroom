<?php
error_reporting(0);
session_start();
@include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit();
}

$user = $_SESSION['email'];
$response = ['success' => false, 'message' => 'Invalid action'];

// Handle profile photo change
if (isset($_POST['action']) && $_POST['action'] === 'change_photo') {
    if (isset($_FILES['user_photo']) && $_FILES['user_photo']['error'] === 0) {
        $user_photo = $_FILES['user_photo']['name'];
        $file_local = $_FILES['user_photo']['tmp_name'];
        $folder = "admin/vehicleimg/";
        
        // Validate file type
        $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
        if (!in_array($_FILES['user_photo']['type'], $allowed_types)) {
            $response = ['success' => false, 'message' => 'Invalid file type. Only JPG, PNG, and WebP allowed.'];
        } else {
            // Move uploaded file
            if (move_uploaded_file($file_local, $folder . $user_photo)) {
                mysqli_select_db($con, "carlux");
                $q1 = "UPDATE `user_detail` SET user_photo='$user_photo' WHERE email='$user'";
                $result = mysqli_query($con, $q1);
                
                if ($result) {
                    $response = ['success' => true, 'message' => 'Profile photo updated successfully'];
                } else {
                    $response = ['success' => false, 'message' => 'Database update failed'];
                }
            } else {
                $response = ['success' => false, 'message' => 'File upload failed'];
            }
        }
    } else {
        $response = ['success' => false, 'message' => 'No file uploaded'];
    }
}

// Handle profile photo deletion
elseif (isset($_POST['action']) && $_POST['action'] === 'delete_photo') {
    mysqli_select_db($con, "carlux");
    $q1 = "UPDATE `user_detail` SET user_photo='profile.png' WHERE email='$user'";
    $result = mysqli_query($con, $q1);
    
    if ($result) {
        $response = ['success' => true, 'message' => 'Profile photo removed successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Database update failed'];
    }
}

// Handle profile information update
elseif (isset($_POST['action']) && $_POST['action'] === 'update_profile') {
    $name = $_POST['name'] ?? '';
    $username = $_POST['username'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $city = $_POST['city'] ?? '';
    $state = $_POST['state'] ?? '';
    $country = $_POST['country'] ?? '';
    $pincode = $_POST['pincode'] ?? '';
    
    // Basic validation
    if (empty($name) || empty($contact)) {
        $response = ['success' => false, 'message' => 'Name and contact are required'];
    } else {
        mysqli_select_db($con, "carlux");
        $q1 = "UPDATE `user_detail` SET 
                name='$name', username='$username', gender='$gender', 
                contact='$contact', city='$city', state='$state', 
                country='$country', pincode='$pincode' 
                WHERE email='$user'";
        
        $result = mysqli_query($con, $q1);
        
        if ($result) {
            $response = ['success' => true, 'message' => 'Profile updated successfully'];
        } else {
            $response = ['success' => false, 'message' => 'Database update failed'];
        }
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
