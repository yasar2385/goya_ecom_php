<?php
// Include necessary files
require_once './backend/config.php';
?>
<div class="header">
    <a href="home"><img class="logo" src="<?php echo $base_url; ?>assets/images/header_goya_1.png"></a>
    <div class="header_right" id="headerRight">
        <div class="search-box" id="searchBox" style="display: none;">
            <input type="text" placeholder="Search...">
            <span class="close-icon" onclick="closeSearch()">X</span>
        </div>
        <div id="headbtn">
            <img src="<?php echo $base_url; ?>assets/images/search_svg_01.png" id="searchicon" onclick="toggleSearch()">
            <img style="height: 25px;" src="<?php echo $base_url; ?>assets/images/cart.png" id="carticon" onclick="openCart()">
            <a href="login"><button class="loginBtn">Login/SignUp</button></a>
        </div>
    </div>
</div>