<?php
// Check if the requested page exists
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'])) {
    // Set the HTTP response status code to 404 Not Found
    header("HTTP/1.0 404 Not Found");
    // Include the custom 404 error page
    include('404.php');
    // Stop executing the script
    exit();
}
?>