<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--primary-red)">
    <a class="navbar-brand" href="#">
        <img src="./assets/img/logo-uclan.svg" width="200" height="50" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./products.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./cart.php">Cart <span class="badge bg-dark"> 0 </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./verification.php"><?php
                    if ($_SESSION == null) {
                        echo 'Account';
                    } else {
                        echo $_SESSION['username'];
                    }
                    ?></a>
            </li>
        </ul>
    </div>
</nav>