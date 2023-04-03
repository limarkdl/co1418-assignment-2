<?php
require_once './includes/config.php';
require_once './includes/session.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    /*echo $username;
    echo $password;*/
    function fetch_user() {
        global $conn,$username;
        $sql = "SELECT user_id, user_pass,user_full_name FROM tbl_users WHERE user_email = '$username'";
        $result = mysqli_query($conn, $sql);
        $products = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        mysqli_free_result($result);
        return $products;
    }
    $users = fetch_user();
    $salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
    $hashed_password = password_hash($password . $salt, PASSWORD_BCRYPT);
    /*echo $hashed_password . '<br>';*/
    foreach ($users as $user) {
        echo $user['user_id'] . '<br>' . $user['user_pass'] . '<br>' . $user['user_full_name'] . '<br>';
        if (password_verify($password . $salt, $hashed_password)) {
            echo "Password is correct!";
            $_SESSION["username"] = $user['user_full_name'];
            /*echo $_SESSION["username"];*/
            header("refresh:3; url=index.php");
        } else {
            echo "Password is incorrect.";
        }
}
}