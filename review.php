<?php

include 'backend/config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Form</title>
    <link rel="stylesheet" href="assets/css/review.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="review-container">
        <!-- Form submission handled by PHP -->
        <form action="review.php" method="POST">
            <div class="review-avatar">
                <img src="images/product-img2.jpg" alt="User Avatar">
                <span>DEAR</span>
            </div>
            <div class="rating">
                <label for="rating">Overall rating</label>
                <div class="stars">
                    <input type="radio" name="star" id="star1" value="1"><label for="star1"><i class="fas fa-star"></i></label>
                    <input type="radio" name="star" id="star2" value="2"><label for="star2"><i class="fas fa-star"></i></label>
                    <input type="radio" name="star" id="star3" value="3"><label for="star3"><i class="fas fa-star"></i></label>
                    <input type="radio" name="star" id="star4" value="4"><label for="star4"><i class="fas fa-star"></i></label>
                    <input type="radio" name="star" id="star5" value="5"><label for="star5"><i class="fas fa-star"></i></label>
                </div>
            </div>
            <div class="review-text">
                <label for="review">Add a written review</label>
                <textarea id="review" name="review" rows="4" required></textarea>
            </div>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
        <?php
        echo "<script>console.log('before');</script>";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<script>console.log('after');</script>";
            $conn = connect_db();
            // Retrieve the form data
            $rating = isset($_POST['star']) ? (int)$_POST['star'] : null;
            $review = isset($_POST['review']) ? trim($_POST['review']) : null;

            // Check if the rating and review are set
            if ($rating !== null && $review !== null) {
                // Ensure that cust_id and prod_id are valid integers
                $cust_id = 7; // Ensure this is properly retrieved or set
                $prod_id = 1;   // Ensure this is properly retrieved or set
                
                // Insert the data into the database
                $sql = "INSERT INTO reviews (rating, review, cust_id, prod_id) VALUES (:rating, :review, :cust_id, :prod_id)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'rating' => $rating,
                    'review' => $review,
                    'cust_id' => $cust_id,
                    'prod_id' => $prod_id
                ]);
                
                echo "<p>Review submitted successfully!</p>";
            } else {
                echo "<p>Please provide both rating and review.</p>";
            }
        }
        ?>
    </div>
</body>

</html>