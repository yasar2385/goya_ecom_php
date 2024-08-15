<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="assets/css/cart.css">
</head>
<body>
    <div class="main">
        <div class="product">
            <img src="magic-cup.jpg" alt="Moon Collage" class="product-image">
            <h3>Moon Collage</h3>
            <p>Rs. 2999.00</p>
            <button class="add-to-cart" data-product="Moon Collage" data-price="2999" data-image="magic-cup.jpg">Add to Cart</button>
        </div>
        <div class="product">
            <img src="photo-frame.jpg" alt="Fridge Magnet" class="product-image">
            <h3>Fridge Magnet</h3>
            <p>Rs. 1999.00</p>
            <button class="add-to-cart" data-product="Fridge Magnet" data-price="1999" data-image="photo-frame.jpg">Add to Cart</button>
        </div>
    </div>

    <div class="cart" id="cart">
        <div class="cart-header">
            <h2>Shopping Cart</h2>
            <button id="close-cart">&times;</button>
        </div>
        <div class="cart-container">
            <span class="left">Product</span>
            <span class="right">Price</span>
        </div>
        <hr width="90%" size="2">
        <div class="cart-body">
            <ul id="cart-items"></ul>
        </div>
        <div class="cart-footer">
            <p>Total: Rs.<span id="cart-total">0.00</span></p>
            <button id="checkout">Check Out</button>
        </div>
    </div>

    <script src="assets/js/cart.js"></script>
</body>
</html>