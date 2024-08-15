<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <div class="logo"></div>
        <nav>
            <ul>
                <li>Customized Products</li>
                <li>Ready-made Products</li>
                <li>Contact us</li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="checkout-container">
            <div class="left-container">
                <section class="contact-info">
                    <h2>Contact</h2>
                    <input type="email" placeholder="Email" required>
                    <div class="input-group">
                        <input type="checkbox" id="news-offers">
                        <label for="news-offers">Email me with news and offers</label>
                    </div>
                </section>
                <section class="delivery-info">
                    <h2>Delivery</h2>
                    <div class="input-group">
                        <input type="radio" id="home" name="delivery" checked>
                        <label for="home">Home (Delivery fee $2)</label>
                    </div>
                    <div class="input-group">
                        <input type="radio" id="different-address" name="delivery">
                        <label for="different-address">Use a different delivery address</label>
                    </div>
                    <form>
                        <input type="text" placeholder="Country" required>
                        <input type="text" placeholder="First Name" required>
                        <input type="text" placeholder="Last Name" required>
                        <input type="text" placeholder="Address Line 1" required>
                        <input type="text" placeholder="Address Line 2">
                        <input type="text" placeholder="Mobile number" required>
                    </form>
                </section>
                <section class="payment-info">
                    <h2>Payment</h2>
                    <div class="payment-status">
                        <p>All transactions are secure and encrypted</p>
                        <p>Razorpay Secure (UPI, Cards, Wallets, NetBanking)</p>
                        <p>After clicking "Pay now", you will be redirected to Razorpay to complete your purchase securely.</p>
                    </div>
                    <div class="billing-address">
                        <div class="input-group">
                            <input type="checkbox" id="billing-same">
                            <label for="billing-same">Billing address same as delivery address</label>
                        </div>
                        <div class="input-group">
                            <input type="checkbox" id="billing-different">
                            <label for="billing-different">Use a different billing address</label>
                        </div>
                    </div>
                    <button onclick="payNow()">Pay now</button>
                </section>
            </div>
            <aside class="order-summary">
                <h2>Order Summary</h2>
                <div class="item">
                    <img src="Screenshot 2024-07-15 174353.png" alt="Lorem ipsum">
                    <div>
                        <p>Moon Frame</p>
                        <p>Price</p>
                    </div>
                </div>
                <div class="total">
                    <input type="text" placeholder="Enter coupon code">
                    <button>Apply</button>
                    <p>Subtotal: 1200</p>
                    <p>Shipping: 40</p>
                    <p>Total: 1240</p>
                </div>
            </aside>
        </div>
    </main>
    <script src="assets/js/script.js"></script>
</body>
</html>
