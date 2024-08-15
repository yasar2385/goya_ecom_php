<h1><?php echo htmlspecialchars($product['name']); ?></h1>
<img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
<p>Price: $<?php echo number_format($product['price'], 2); ?></p>
<p><?php echo htmlspecialchars($product['description']); ?></p>