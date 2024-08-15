Test User 1
test1@gmail.com
Test!1111

Test User 2
test2@gmail.com
Test!2222

Test User 3
test3@gmail.com
Test!3333

Test User 4
test4@gmail.com
Test!4444


Test User 5
test5@gmail.com
Test!5555



https://chatgpt.com/share/9a463b0c-4a7d-4084-b651-6578765999c4


1. Install phpdotenv
First, install the vlucas/phpdotenv library using Composer. If you haven't installed Composer, you'll need to do that first.

bash
Copy code
composer require vlucas/phpdotenv
2. Create a .env File
Create a .env file in the root of your project directory with the following content:

env
Copy code
# Local environment
LOCAL_DB_NAME=local_db
LOCAL_DB_PASSWORD=local_password

# UAT environment
UAT_DB_NAME=uat_db
UAT_DB_PASSWORD=uat_password

# Live environment
LIVE_DB_NAME=live_db
LIVE_DB_PASSWORD=live_password





AFTER LOGIN
    NEED TO SHOW USER NAME & CART COUNT



INSERT INTO categories (title, short_code, sub_items)
VALUES 
('Mugs', 'mug', JSON_ARRAY('Magic Mug', 'Mini Mug', 'Personalized Mug', 'Polymer Mug')),
('Key Chains', 'keychain', JSON_ARRAY('MDF KeyChain', 'Plastic with Metal Sheet (Double Side)', 'Wooden KeyChain')),
('Fridge Magnet', 'fridge_magnet', JSON_ARRAY('Fridge Magnet - Circle', 'Fridge Magnet - Rectangle')),
('Pillows', 'pillow', JSON_ARRAY('LED Pillow - Heart', 'LED Pillow - Square', 'FUR Pillow - Heart', 'FUR Pillow - Square', 'Mini FUR Pillow')),
('Photo Frame', 'frame', JSON_ARRAY('Photo Frame', 'Digital Art Frame', 'Mosaic Frame')),
('Art', 'art', JSON_ARRAY('Art Digital', 'Art Imaginary')),
('Polaroid', 'polaroid', JSON_ARRAY()),
('Puzzle', 'puzzle', JSON_ARRAY()),
('Sipper Bottle', 'sip_bottle', JSON_ARRAY()),
('Polyester T-Shit', 'ploy_t_short', JSON_ARRAY()),
('Clock', 'clock', JSON_ARRAY()),
('Digital Clock', 'digit_clock', JSON_ARRAY()),
('Pop Socket', 'pop_socket', JSON_ARRAY()),
('Rotating Lamp', 'rot_lamp', JSON_ARRAY()),
('Mouse Pad', 'mouse_pad', JSON_ARRAY()),
('MDF Lamp', 'mdf_lamp', JSON_ARRAY('Couple Lamp', 'Alphabet Lamp')),
('MDF Table Frame', 'mdf_tbl_lamp', JSON_ARRAY('Anniversary Table Frame', 'Couple Table Frame', 'Birthday Frame')),
('MDF Collage Wall Frame', 'mdf_clg_wal_lamp', JSON_ARRAY('Couple Collage', 'Moon Collage')),
('MDF Clock', 'mdf_clock', JSON_ARRAY('Heart Clock', '8 Photos Round Clock', '12 Photos Round Clock')),
('Caricature (Acrylic)', 'caricature_acrylic', JSON_ARRAY('Birthday Boy Caricature', 'Birthday Girl Caricature', 'Wedding Caricature', 'Couple Caricature', 'Couple Cycling Caricature')),
('Magic Mirror', 'magic_mirror', JSON_ARRAY('Heart Magic Mirror', 'Round with Clock Magic Mirror', 'Round Magic Mirror')),
('Wallet', 'wallet', JSON_ARRAY('Women''s Wallet', 'Men''s Wallet')),
('3D Crystal Gifts', '3d_cryst_gift', JSON_ARRAY('Cube Shape Crystal', 'Heart Shape Crystal'));


["Magic Mug","Mini Mug","Personalized Mug","Polymer Mug"]
["Cube Shape Crystal","Heart Shape Crystal"]



-- Example for 'Key Chains'
INSERT INTO `products` (`id`, `name`, `short_code`, `category_id`, `price`, `make_time`, `size`, `made`, `quantity`, `specialisation`, `description`) VALUES (NULL, 'Plastic with Metal Sheet (Double Side)', 'plas_metal_sheet_double', '3', '200', '1', '0', 'customized', '10', '', 'Personalized Memories: Turn your favorite photos into a unique keepsake.\nExceptional Print Quality: Vibrant, sharp, and lifelike images on a durable keychain.\nVersatile Use: Perfect for bikes, cars, homes, and offices—customize any space.\nThoughtful Gift: Ideal for all occasions, suitable for girls, boys, women, men, and couples.\nCarry Your Memories: Keep special moments close, wherever you go.');

INSERT INTO `products` (`id`, `name`, `short_code`, `category_id`, `price`, `make_time`, `size`, `made`, `quantity`, `specialisation`, `description`) VALUES (NULL, 'Wooden KeyChain', 'wood_keychain', '3', '200', '1', '0', 'customized', '10', '', '');

INSERT INTO `products` (`id`, `name`, `short_code`, `category_id`, `price`, `make_time`, `size`, `made`, `quantity`, `specialisation`, `description`) VALUES (NULL, '', '', '3', '200', '1', '0', 'customized', '10', '', '');
INSERT INTO `products` (`id`, `name`, `short_code`, `category_id`, `price`, `make_time`, `size`, `made`, `quantity`, `specialisation`, `description`) VALUES (NULL, '', '', '3', '200', '1', '0', 'customized', '10', '', '');