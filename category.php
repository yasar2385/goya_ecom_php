<?php

include 'backend/config.php';
include 'backend/images_render.php';

$conn = connect_db();

// Fetch categories and products
$query = "SELECT c.*, p.id AS product_id, p.name AS product_name, p.short_code AS product_code, p.price
          FROM categories c
          LEFT JOIN products p ON c.id = p.category_id
          ORDER BY c.id, p.id";
$stmt = $conn->prepare($query);
$stmt->execute();

$categories = [];
$products = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $category_id = $row['id'];

    // Process category
    if (!isset($categories[$category_id])) {
        $subItems = json_decode($row['sub_items'], true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            error_log("JSON decode error for category {$category_id}: " . json_last_error_msg());
            $subItems = [];
        }

        $categories[$category_id] = [
            'id' => $category_id,
            'name' => $row['name'],
            'short_code' => $row['short_code'],
            'subItems' => $subItems
        ];
    }

    // Process product
    if ($row['product_id']) {
        $productImage = findImageByProductName($row['product_name'], $productImages, $base_url);
        $products[] = [
            'id' => $row['product_id'],
            'name' => $row['product_name'],
            'price' => $row['price'],
            'c_id' => $category_id,
            'short_code' => $row['product_code'],
            'image' => $productImage
        ];
    }
}


// Debug function
function debug_one($var)
{
    echo "<script>console.log(" . json_encode($var) . ");</script>";
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/category_style.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/head&foot.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/cart.css">
</head>

<body>

    <?php
    include 'component/header.php';
    include 'component/navbar.php';
    include 'component/cart.php';
    ?>

    <!-- Main content goes here -->
    <section class="product-section">
        <div class="container">
            <div class="left-side">
                <span class="close-btn">&times;</span>
                <h3>SHOP BY PRODUCTS</h3>
                <hr class="head-line">
                <!-- PRODUCT LIST START -->
                <?php
                $down_icon = '<span class="dropdown-icon">&#9662;</span>';
                foreach ($categories as $category):
                    $subItems = $category['subItems'];
                    $subEmpty = empty($subItems);
                    $name = htmlspecialchars($category['name']);
                    $item = $subEmpty ? "<a href='#'>{$name}</a>" : ($name . $down_icon);
                ?>
                    <div class="dropdown">
                        <button class="<?php echo $subEmpty ? 'button' : 'dropbtn' ?>"><?php echo $item; ?></button>
                        <?php if (!$subEmpty): ?>
                            <div class="dropdown-content">
                                <?php foreach ($subItems as $subItem): ?>
                                    <a href="#"><?php echo htmlspecialchars($subItem); ?></a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <hr class="line">
                <?php endforeach; ?>
                <!-- PRODUCT LIST END -->
            </div>

            <div class="right-side">
                <div class="right-head">
                    <h2>Featured Products</h2>
                </div>
                <hr class="right-line">
                <div class="right-btn">
                    <div class="filter-dropdown">
                        <button class="filter-btn">Filter <span class="filter-icon">&#9662;</span></button>
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
                <!-- PRO LIST START -->
                <div class="pro-list">

                </div>
                <!-- PRO LIST END -->
            </div>
    </section>

    <!-- script files -->
    <script src="<?php echo $base_url; ?>assets/js/cart.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/category_script.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/sorting_script.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/head&foot.js"></script>
    <!-- Placeholder for footer -->

    <?php
    include 'component/footer.php';
    $decode = json_encode($products);
    echo "<script>renderProducts(" . $decode. ", '$base_url');</script>";

    ?>

</body>

</html>