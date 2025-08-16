<?php
error_reporting(0);
session_start();
$user = $_SESSION['admin_email'];
if(!isset($user)){
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
            icon: 'warning',
            title:'Sorry !',
            text: 'Please Login First.',
            showConfirmButton: false,
            timer: 4000
            }).then(() => {
            window.location.href = 'sign-in.php';
            });
        });
    </script>
    <?php
}
@include 'include.php';
?>