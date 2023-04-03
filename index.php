<?php
include 'includes/session.php';
include 'includes/config.php';
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
<main class="container">
    <div id="carouselExampleIndicators" class="carousel slide mt-5 mb-5" data-interval="5000" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="./assets/img/banner-top-merch-andise.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./assets/img/banner-top-uclan-photo.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./assets/img/banner-top-discounts.png" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container text-center">
        <h1 class="mt-4 mb-4">Get ready to show off your university pride like never before!</h1>
        <p>Our exclusive collection of university merch is finally here, and it's hotter than ever! With eye-catching designs and high-quality materials,
            you'll be the envy of all your classmates.
            From trendy t-shirts to stylish hoodies, we've got you covered. Show off your school spirit in our bold and vibrant colors that are
            guaranteed to make you stand out in the crowd.
            And don't forget about our must-have accessories like hats, bags, and stickers that will take your university pride to the next level!
            But don't wait too long to grab your favorite pieces, because they're selling like hotcakes!
            Join the thousands of students and alumni who are already rocking our merch and show the world that you bleed your university colors.
            So what are you waiting for? Shop now and join the university merchandise revolution! Hurry, before it's too late!</p>
    </div>
    <h2 class="mt-5 mb-2 ">Offers:</h2>
    <ul>
        <?php

        include 'includes/config.php';
        function fetch_all_offers() {
            global $conn;
            $sql = "SELECT * FROM `tbl_offers`";
            $result = mysqli_query($conn, $sql);
            $offer = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $offer[] = $row;
            }
            mysqli_free_result($result);
            return $offer;
        }
        $offers = fetch_all_offers();
        foreach ($offers as $offer) {
            echo '<div class="card mt-2" >
                <div class="card-body">
                    <b class="card-title" style="color:red">HOT!</b>
                    
                    <p class="card-text">'. $offer['offer_dec'].'</p>
                    
                </div>
            </div>';
        }


        ?>
    </ul>
    <div class="container mt-5 mb-5">
        <img src="./assets/img/banner-bottom.png" class="w-100" alt="Banner">
    </div>

</main>
<?php include 'partials/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>