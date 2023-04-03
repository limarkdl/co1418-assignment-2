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
<main>

    <div class="container">

        <div class="btn-group m-3" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary">All </button>
            <button type="button" class="btn btn-secondary">Hoodies</button>
            <button type="button" class="btn btn-secondary">Jumpers</button>
            <button type="button" class="btn btn-secondary">T-Shirts</button>
        </div>



        <div class="container" >
            <div class="row gap-2 mb-5" id="grid">
                <?php
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
                    echo '
            <div class="col mb-3"><div class="card" >
                <img class="card-img-top" style="aspect-ratio: 1/1" src="'. $product['product_image'] .'" alt="Card image cap">
                <div class="card-body">
                    <b class="card-title">'. $product['product_type'] .'</b>
                    <p style="font-size: smaller" class="card-title">'. $product['product_title'] .'</p>
                    <p class="card-text">'. $product['product_price'].'</p>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" style="height: 50%" class="btn btn-secondary" onclick="showItem('. $product['product_id'] .')">Info</button>
                        <button type="button" style="height: 50%" class="btn text-white bg-success" onclick="addToCart('. $product['product_id'] .')">Add</button>
                    </div>
                </div>
            </div></div>';
                }
                ?>
            </div>
    </div>



    </div>


    </main>
<?php include 'partials/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    function showItem(id) {
        window.location.href = `./item.php?id=` + id;
    }
</script>
</body>
</html>