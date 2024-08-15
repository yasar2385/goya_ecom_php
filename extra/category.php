<?php

$pageTitle = 'Home';

include 'includes/config.php';
include 'includes/header.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/category_style.css">
    <link rel="stylesheet" href="assets/css/head&foot.css">
    <link rel="stylesheet" href="assets/css/cart.css">
</head>

<body>
    <!-- Placeholder for header -->
    <div class="header"></div>
    <div class="navbar"></div>
    <div class="cart" id="cart"></div>


    <!-- Main content goes here -->
    <section class="product-section">
        <div class="container">
            <div class="left-side">
                <span class="close-btn">&times;</span>
                <h3>SHOP BY PRODUCTS</h3>
                <hr class="head-line">
            </div>

            <div class="right-side">
                <div class="right-head">
                    <h2>Featured Products</h2>
                </div>
                <hr class="right-line">
                <div class="right-btn">
                    <div class="filter-dropdown">
                        <button class="filter-btn">
                            Filter
                            <span class="filter-icon">&#9662;</span>
                        </button>
                        <div class="filter-dropdown-content">
                            <a href="?sort=best-selling" data-sort="best-selling">Best Selling</a>
                            <a href="?sort=alphabetical-asc" data-sort="alphabetical-asc">Alphabetically, A to Z</a>
                            <a href="?sort=alphabetical-desc" data-sort="alphabetical-desc">Alphabetically, Z to A</a>
                            <a href="?sort=price-low-high" data-sort="price-low-high">Price, Low to High</a>
                            <a href="?sort=price-high-low" data-sort="price-high-low">Price, High to Low</a>
                            <a href="?sort=date-old-new" data-sort="date-old-new">Date, Old to New</a>
                            <a href="?sort=date-new-old" data-sort="date-new-old">Date, New to Old</a>
                        </div>
                    </div>

                    <div class="hidden-btn">
                        <button class="hid-btn">
                            Sortby
                        </button>
                        <div class="filter-dropdown-content">
                            <a href="#">Option 1</a>
                            <a href="#">Option 2</a>
                            <a href="#">Option 3</a>
                        </div>
                    </div>
                </div>
                <div class="pro-list"></div>
            </div>
    </section>

    <!-- Placeholder for footer -->
    <div class="footer"></div>

    <!-- script files -->
    <script src="assets/js/cart.js"></script>
    <script src="assets/js/category_script.js"></script>
    <script src="assets/js/sorting_script.js"></script>
    <script src="assets/js/head&foot.js"></script>

    <script>
        // Create an array of fetch promises
        const fetchComponent = [
            fetch('component/header.php').then(response => response.text()).then(data => {
                document.querySelector('.header').innerHTML = data;
            }),
            fetch('component/navbar.php').then(response => response.text()).then(data => {
                document.querySelector('.navbar').innerHTML = data;
            }),
            fetch('component/cart.php').then(response => response.text()).then(data => {
                document.querySelector('#cart').innerHTML = data;
            }),
            fetch('component/footer.php').then(response => response.text()).then(data => {
                document.querySelector('.footer').innerHTML = data;
            })
        ];
        // Execute all promises concurrently
        Promise.all(fetchComponent)
            .then(() => {
                console.log('All components loaded successfully.');
            })
            .catch(error => {
                console.error('Error loading components:', error);
            });
    </script>

</body>

</html>