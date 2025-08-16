<?php
/* Ensure proper error reporting for debugging (set to 0 for production)
error_reporting(0);
session_start();

// Clear session and destroy it
session_unset();
session_destroy();

// Set headers to prevent browser caching of the page
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
        // Trigger SweetAlert immediately after page loads
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Logged Out!',
                text: 'You have successfully logged out. Redirecting...',
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                // Redirect to index.php after SweetAlert is dismissed
                window.location.href = 'logout.php';
            });
        });
    </script>
</body>
</html>
