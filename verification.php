<?php
include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's Union Shop at UCLan</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/palette.css">
</head>
<body>
<?php include 'partials/header.php'; ?>
<main>
    <?php
    if (session_status() == PHP_SESSION_DISABLED) {
    echo "Sessions are disabled.";
} elseif (session_status() == PHP_SESSION_NONE) {
    echo "Sessions are enabled, but no session exists.";
        echo '<div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Login</h2>
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>';
} elseif (session_status() == PHP_SESSION_ACTIVE) {
        if ($_SESSION == null) {
            echo '<div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Login</h2>
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>';
        } else {
            echo '<h1 class="m-5">HELLO, '. $_SESSION["username"].'</h1>';
        }

    }
 ?>
</main>
<?php include 'partials/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
