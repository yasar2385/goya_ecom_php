<div class="cart" id="cart">
    <div class="cart-header">
        <h2>Shopping Cart</h2>
        <button id="close-cart" onclick="closeCart();">&times;</button>
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