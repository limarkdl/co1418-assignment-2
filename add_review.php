<?php
include "includes/session.php";
$user_id = $_SESSION["username"];
$product_id = $_POST["product_id"];
$review_title = $_POST["review_title"];
$review_desc = $_POST["review_desc"];
$review_rating = $_POST["review_rating"];
$review_timestamp = date("Y-m-d H:i:s");
global $conn;
$sql = "INSERT INTO tbl_reviews (user_id, product_id, review_title, review_desc, review_rating, review_timestamp)
            VALUES ('$user_id', '$product_id', '$review_title', '$review_desc', '$review_rating', '$review_timestamp')";
$result = $conn->query($sql);

if ($result) {
    header("refresh:1; url=index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}