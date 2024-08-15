<?php
// Read the JSON file
$jsonFilePath = './inputs/product_images.json';
$jsonContent = file_get_contents($jsonFilePath);

if ($jsonContent === false) {
    die("Error reading JSON file");
}

$productData = json_decode($jsonContent, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    die("Error decoding JSON: " . json_last_error_msg());
}

$productImages = $productData['images'];
// Function to find image by product name
function findImageByProductName($productName, $productImages, $baseUrl)
{
    foreach ($productImages as $product) {
        if (strtolower($product['name']) === strtolower($productName)) {
            return $product['image'];
        }
    }
    return $baseUrl . 'assets/images/default-product-image.png'; // Default image if not found
}
