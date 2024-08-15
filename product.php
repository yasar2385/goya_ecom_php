<?php

include 'backend/temp_config.php';
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="assets/css/product.css">
    <link rel="stylesheet" href="assets/css/head&foot.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <script src="assets/js/cart.js"></script>
    <script src="assets/js/head&foot.js"></script>
</head>

<body>

    <?php
    include 'component/header.php';
    include 'component/navbar.php';
    include 'component/cart.php';
    ?>


    <div class="showcase">
        <div class="w3-content">
            <img class="mySlides" src="assets/images/Rectangle 10.png" style="display:none">
            <img class="mySlides" src="assets/images/Rectangle 13.png">
            <img class="mySlides" src="assets/images/Rectangle 76.png" style="display:none">

            <div class="w3-row-padding w3-section">
                <div class="w3-col s4">
                    <img class="demo d1" src="assets/images/Rectangle 10.png" onclick="currentDiv(1)">
                </div>
                <div class="w3-col s4">
                    <img class="demo d2" src="assets/images/Rectangle 13.png" style="opacity: 100%;" onclick="currentDiv(2)">
                </div>
                <div class="w3-col s4">
                    <img class="demo d3" src="assets/images/Rectangle 76.png" onclick="currentDiv(3)">
                </div>
            </div>
        </div>
        <div class="pinteraction">
            <h1>Photo Frame</h1>
            <img src="assets/images/star_gray.png" alt="" style="display: inline-block;">
            <p style="display: inline-block;">(4.9)</p>
            <h4>Rs. 2096</h4>
            <form action="">
                <label for="">Name</label><br>
                <input type="text" placeholder="Name" class="name"><br><br>
                <label for="">Pictures <span class="picdescrip">To be displayed in frame</span></label><br>
                <label for="fileInput" class="custom-file-upload">
                    <span>Upload Your Picture</span>
                    <input type="file" id="fileInput">
                </label><br>
                <h4>Gift Wrap</h4>
                <input type="checkbox" id="gift">
                <Label for="gift">Yes,wrap it!(+Rs 50.0)</Label><br>
                <button class="add-to-cart" data-product="Fridge Magnet" data-price="1999" data-image="assets/images/Rectangle 13.png">Add To Cart</button><br>
                <a href="checkout.php"><input class="buynow" type="button" value="Buy It Now"></a>
            </form>
            <div class="qtext">
                <p>Quantity</p>
                <div class="qbutton">
                    <button>-</button>
                    <p id="Quantity">1</p>
                    <button>+</button>
                </div>
            </div>
            <div class="description drop">
                <h4>Description</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

                <h1 class="dropicon">^</h1>
            </div>
            <div class="Specialization drop">
                <h4>Product Specialization</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

                <h1 class="dropicon">^</h1>
            </div>
        </div>
    </div>
    <div class="alsolike">
        <h1>You May Also Like</h1>
        <div class="scroll">
            <div class="leftscroll sbtn">
                <h2>
                    << /h2>
            </div>
            <div class="rightscroll sbtn">
                <h2>></h2>
            </div>
        </div>
        <div class="likeproduct">
            <img src="assets/images/Rectangle 10.png" alt="">
            <img src="assets/images/Rectangle 11.png" alt="">
            <img src="assets/images/Rectangle 12.png" alt="">
            <img src="assets/images/Rectangle 13.png" alt="">
            <img src="assets/images/Rectangle 15.png" alt="">
            <img src="assets/images/Rectangle 16.png" alt="">
            <img src="assets/images/Rectangle 9.png" alt="">
        </div>
    </div>
    <div class="review">
        <h1>Reviews</h1>
        <div class="scroll">
            <div class="leftscrollrev sbtn">
                <h2>
                    << /h2>
            </div>
            <div class="rightscrollrev sbtn">
                <h2>></h2>
            </div>
        </div>
        <div class="revdisplay">
            <div class="indiviRev">
                <h2>loreum ipsum</h2>
                <img src="assets/images/star_black.png" alt="">
                <h6>(4.9)</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
            </div>
            <div class="indiviRev">
                <h2>loreum ipsum</h2>
                <img src="assets/images/star_black.png" alt="">
                <h6>(4.9)</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
            </div>
            <div class="indiviRev">
                <h2>loreum ipsum</h2>
                <img src="assets/images/star_black.png" alt="">
                <h6>(4.9)</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
            </div>
            <div class="indiviRev">
                <h2>loreum ipsum</h2>
                <img src="assets/images/star_black.png" alt="">
                <h6>(4.9)</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
            </div>
            <div class="indiviRev">
                <h2>loreum ipsum</h2>
                <img src="assets/images/star_black.png" alt="">
                <h6>(4.9)</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
            </div>
        </div>
    </div>

    <?php
    include 'component/footer.php';
    ?>
</body>

<script>
    function currentDiv(n) {
        showDivs(slideIndex = n);
        var demos = document.getElementsByClassName("demo");
        for (var i = 0; i < demos.length; i++) {
            demos[i].style.opacity = "50%";
        }
        demos[n - 1].style.opacity = "100%";
    }


    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
        }
        x[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " w3-opacity-off";
    }
    // Get the quantity element
    var quantityElement = document.getElementById('Quantity');

    // Get the buttons for increasing and decreasing the quantity
    var decreaseButton = document.querySelector('.qbutton button:first-of-type');
    var increaseButton = document.querySelector('.qbutton button:last-of-type');

    // Add event listeners to the buttons to update the quantity
    decreaseButton.addEventListener('click', function() {
        var currentQuantity = parseInt(quantityElement.textContent);
        if (currentQuantity > 1) {
            quantityElement.textContent = currentQuantity - 1;
        }
    });

    increaseButton.addEventListener('click', function() {
        var currentQuantity = parseInt(quantityElement.textContent);
        quantityElement.textContent = currentQuantity + 1;
    });
    document.addEventListener('DOMContentLoaded', function() {
        const dropTitles = document.querySelectorAll('.drop h4');
        dropTitles.forEach(title => {
            title.addEventListener('click', function() {
                const paragraph = this.nextElementSibling;
                const h1Tag = this.parentElement.querySelector('h1'); // Select the h1 tag within the same parent as the clicked h4
                if (paragraph.style.display === 'none' || paragraph.style.display === '') {
                    paragraph.style.display = 'block';
                    h1Tag.style.transform = 'rotate(180deg)'; // Rotate the clicked h1 tag to 0 degrees
                } else {
                    paragraph.style.display = 'none';
                    h1Tag.style.transform = 'rotate(0deg)'; // Rotate the clicked h1 tag to 180 degrees
                }
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const dropTitles = document.querySelectorAll('.drop h1');
        dropTitles.forEach(title => {
            title.addEventListener('click', function() {
                const paragraph = this.previousElementSibling;
                const h1Tag = this.parentElement.querySelector('h1'); // Select the h1 tag within the same parent as the clicked h4
                if (paragraph.style.display === 'none' || paragraph.style.display === '') {
                    paragraph.style.display = 'block';
                    h1Tag.style.transform = 'rotate(180deg)'; // Rotate the clicked h1 tag to 0 degrees
                } else {
                    paragraph.style.display = 'none';
                    h1Tag.style.transform = 'rotate(0deg)'; // Rotate the clicked h1 tag to 180 degrees
                }
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const leftScrollBtn = document.querySelector('.leftscroll');
        const rightScrollBtn = document.querySelector('.rightscroll');
        const likeProduct = document.querySelector('.likeproduct');

        leftScrollBtn.addEventListener('click', function() {
            likeProduct.scrollBy({
                left: -200,
                behavior: 'smooth'
            });
        });

        rightScrollBtn.addEventListener('click', function() {
            likeProduct.scrollBy({
                left: 200,
                behavior: 'smooth'
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const leftScrollBtn = document.querySelector('.leftscrollrev');
        const rightScrollBtn = document.querySelector('.rightscrollrev');
        const revdisplay = document.querySelector('.revdisplay');

        leftScrollBtn.addEventListener('click', function() {
            revdisplay.scrollBy({
                left: -200,
                behavior: 'smooth'
            });
        });

        rightScrollBtn.addEventListener('click', function() {
            revdisplay.scrollBy({
                left: 200,
                behavior: 'smooth'
            });
        });
    });
</script>

</html>