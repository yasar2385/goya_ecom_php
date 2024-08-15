CREATE TABLE `products` (
	`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
	`name` VARCHAR(255),
	`description` TEXT(65535),
	`price` DOUBLE,
	`category_id` INT,
	PRIMARY KEY(`id`)
);


CREATE TABLE `categories` (
	`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
	`name` VARCHAR(255),
	PRIMARY KEY(`id`)
);


CREATE TABLE `orders` (
	`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
	`date` DATETIME,
	`customer_id` INT,
	`amount` INT,
	`status` ENUM("delivered", "received", "processing"),
	`product_id` INT,
	PRIMARY KEY(`id`)
);


CREATE TABLE `reviews` (
	`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
	`customer_id` INT,
	`product_id` INT,
	`rating` INT,
	`content` VARCHAR(255),
	`date` DATETIME,
	PRIMARY KEY(`id`)
);


CREATE TABLE `customers` (
	`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
	`fullName` VARCHAR(255),
	`address` VARCHAR(255),
	`email` VARCHAR(255),
	`phone` VARCHAR(255),
	`password` VARCHAR(255) NOT NULL;
	PRIMARY KEY(`id`)
);


CREATE TABLE `admin_users` (
	`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
	`username` VARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL DEFAULT 'admin',
	`role` ENUM("admin", "super_admin", "moderator") UNIQUE DEFAULT 'admin',
	`created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(`id`)
);


ALTER TABLE `orders`
ADD FOREIGN KEY(`product_id`) REFERENCES `products`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE `products`
ADD FOREIGN KEY(`category_id`) REFERENCES `categories`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE `reviews`
ADD FOREIGN KEY(`customer_id`) REFERENCES `customers`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE `reviews`
ADD FOREIGN KEY(`product_id`) REFERENCES `products`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE `orders`
ADD FOREIGN KEY(`customer_id`) REFERENCES `customers`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;