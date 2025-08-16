<?php
error_reporting(0);
session_start();
@include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
        /* Add custom styles for offline message */
        .offline-message {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #f44336;
            color: white;
            text-align: center;
            padding: 10px;
            z-index: 1000;
            transition: all 0.5s ease;
        }

        /* Add custom styles for online message */
        .online-message {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            z-index: 1000;
            transition: all 0.5s ease;
        }
    </style>
<body>
     <!-- Offline message -->
     <div id="offlineMessage" class="offline-message">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-wifi-off" viewBox="0 0 16 16">
    <path d="M10.706 3.294A12.6 12.6 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.52.52 0 0 0 .668.05A11.45 11.45 0 0 1 8 4q.946 0 1.852.148zM8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065 8.45 8.45 0 0 1 3.51-1.27zm2.596 1.404.785-.785q.947.362 1.785.907a.482.482 0 0 1 .063.745.525.525 0 0 1-.652.065 8.5 8.5 0 0 0-1.98-.932zM8 10l.933-.933a6.5 6.5 0 0 1 2.013.637c.285.145.326.524.1.75l-.015.015a.53.53 0 0 1-.611.09A5.5 5.5 0 0 0 8 10m4.905-4.905.747-.747q.886.451 1.685 1.03a.485.485 0 0 1 .047.737.52.52 0 0 1-.668.05 11.5 11.5 0 0 0-1.811-1.07M9.02 11.78c.238.14.236.464.04.66l-.707.706a.5.5 0 0 1-.707 0l-.707-.707c-.195-.195-.197-.518.04-.66A2 2 0 0 1 8 11.5c.374 0 .723.102 1.021.28zm4.355-9.905a.53.53 0 0 1 .75.75l-10.75 10.75a.53.53 0 0 1-.75-.75z"/>
    </svg>
    &nbsp;
    You're offline ! please check your internet connection.
    </div>

    <!-- Online message -->
    <div id="onlineMessage" class="online-message">
    Back To Online !
    </div>

    <script>
    // JavaScript to handle offline detection and scrolling
window.addEventListener('load', function() {
    // Check if online/offline when the page loads
    if (!navigator.onLine) {
        showOfflineMessage();
        disableScroll(); // Call function to disable scrolling
    }

    // Listen for online/offline events
    window.addEventListener('online', function() {
        hideOfflineMessage();
        enableScroll(); // Call function to enable scrolling
        showOnlineMessage();
    });

    window.addEventListener('offline', function() {
        showOfflineMessage();
        disableScroll(); // Call function to disable scrolling
        hideOnlineMessage();
    });

    // Prevent scrolling when offline
    function disableScroll() {
        document.body.style.overflow = 'hidden';
    }

    function enableScroll() {
        document.body.style.overflow = '';
    }

    function showOfflineMessage() {
        document.getElementById('offlineMessage').style.display = 'block';
    }

    function hideOfflineMessage() {
        document.getElementById('offlineMessage').style.display = 'none';
    }

    function showOnlineMessage() {
        document.getElementById('onlineMessage').style.display = 'block';
        setTimeout(function() {
            document.getElementById('onlineMessage').style.display = 'none';
        }, 2000); // Show the message for 2 seconds
    }

    function hideOnlineMessage() {
        document.getElementById('onlineMessage').style.display = 'none';
    }
});
</script></body>
</html>
