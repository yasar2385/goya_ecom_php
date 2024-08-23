<h1><?php echo htmlspecialchars($row['name']); ?></h1>
<img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
<p>Price: $<?php echo number_format($row['price'], 2); ?></p>
<p><?php echo htmlspecialchars($row['description']); ?></p>