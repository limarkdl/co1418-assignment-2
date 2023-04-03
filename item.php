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
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        include 'includes/config.php';
        function fetch_all_products() {
            global $conn;
            $sql = "SELECT * FROM tbl_products";
            $result = mysqli_query($conn, $sql);
            $products = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
            mysqli_free_result($result);
            return $products;
        }
        $products = fetch_all_products();
        foreach ($products as $product) {
            if ($product['product_id'] !== $id) {
                continue;
            }
            echo '
            <div class="container"><div class="card" >
                <img class="card-img-top mx-auto" style="aspect-ratio: 1/1;width:200px;height;200px"src="'. $product['product_image'] .'" alt="Card image cap">
                <div class="card-body mx-auto">
                    <b class="card-title">'. $product['product_type'] .'</b>
                    <p style="font-size: smaller" class="card-title">'. $product['product_title'] .'</p>
                    <p style="font-size: xx-small">'. $product['product_id'].'</p>
                    <p class="card-text">'. $product['product_desc'].'</p>
                    <p class="card-text">'. $product['product_price'].'</p>
                </div>
            </div></div>';
        }
    } else {
        echo "Name parameter not found.";
    }
    ?>
    <h2 class="mt-5">Reviews:</h2>
    <h1>Submit a Review</h1>
    <form action="add_review.php" method="POST">
        <input type="hidden" name="product_id" value="<?php global $id; echo $id; ?>">
        <label for="review_title">Review Title:</label>
        <input type="text" name="review_title" id="review_title" required>
        <br>
        <label for="review_desc">Review Description:</label>
        <textarea name="review_desc" id="review_desc" required></textarea>
        <br>
        <label for="review_rating">Review Rating (1-5):</label>
        <input type="number" name="review_rating" id="review_rating" min="1" max="5" required>
        <br>
        <button type="submit">Submit Review</button>
    </form>
    <ul>
        <?php
        include 'includes/config.php';
        function fetch_all_reviews() {
            global $conn;
            global $id;
            $sql = "SELECT * FROM tbl_reviews WHERE product_id = ". $id;
            $result = mysqli_query($conn, $sql);
            $reviews = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $reviews[] = $row;
            }
            mysqli_free_result($result);
            return $reviews;
        }

        $all_rating = 0;
        $num_of_reviews = 0;
        $reviews = fetch_all_reviews();
        foreach ($reviews as $review) {
            $all_rating += $review['review_rating'];
            $num_of_reviews++;
            echo '<li><h3>'. $review['review_title'] .'</h3>
                        <h2>'. $review['review_rating'] .'</h2>
                      <h4>Anonymous</h4>
                        <p>'. $review['review_desc'].'</p>
                        <p style="font-size:xx-small">'. $review['review_timestamp'].'</p>
                       
</li>';
        }
        if ($all_rating != 0) {
            echo '<h1>AVG: '. $all_rating / $num_of_reviews .'</h1>';
        }

        ?>
    </ul>
</main>
<?php include 'partials/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
