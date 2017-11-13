
CREATE DATABASE IF NOT EXISTS n01388635;

-- the database name is n01388635 
USE n01388635;

CREATE TABLE IF NOT EXISTS `categories` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,	
	PRIMARY KEY (`id`) 
);

CREATE TABLE IF NOT EXISTS `products` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`category_id` INT UNSIGNED NOT NULL,
	`quantity` INT UNSIGNED NOT NULL,
	`name` varchar(255) DEFAULT NULL,
	`price` DECIMAL(10, 2) NOT NULL,
	`shipping` bit NOT NULL DEFAULT 1,
	`status` varchar(100) NOT NULL,
	`description` TEXT NOT NULL,
	`picture` TEXT DEFAULT NULL,
	PRIMARY KEY (`id`),
	CONSTRAINT `category_id` FOREIGN KEY(`category_id`) REFERENCES `n01388635`.`categories`(`id`) ON UPDATE CASCADE 
);



INSERT INTO categories 
	(name) 
VALUES 
	('Sports'),
	('Food'),
	('Vehicles'),
	('Computers'),
	('Furniture');

INSERT INTO products 
(status, name, price, category_id, quantity, shipping, description, picture) 
VALUES 
('New','Aluminum Bat', 120.99, 1, 15, b'1', 'Facing a rough pitcher in the baseballs or trying to fight off a horde of zombies. Then this aluminum bat is the perfect one for you!', 'http://vignette3.wikia.nocookie.net/tlaststand/images/2/25/Aluminium_bat_Short.jpg/revision/latest?cb=20140106153247'),
('New','Twinky', 1.00, 2, 99, b'1', 'This delicious golden fried to perfection cream filled wonder will be sure to send you straight to a sugar comma.', 'https://defconnations.com/uploads/monthly_2016_06/Twinkie-Diet.jpg.bce1239ede79b32e8262b24cab0949a1.jpg'),
('Used','Football', 15.50, 1, 103, b'1', 'The old pig skin is ready for some action. Toss this in the backyard with your friends and/or family in a game of the football.', 'https://cdn.shopify.com/s/files/1/0712/4751/products/F7000D-03D_large.jpg?v=1437409695'),
('New','Motor scooter', 999.99, 3, 5, b'0', 'Get from A to B and over 100miles to the galloon in this stylish scooter 50cc.', 'http://electric-bikes.com/betterbikes/scooter/goldscooter.jpg'),
('New','Smart Car', 20000.00, 3, 2, b'0', 'Want to drive smart? You can\'t go wrong with this smart car. It is the smallest in the business and ready for you and only you to rid in, because no one else can fit.', 'https://images.fastcompany.com/upload/smart_shrunk.jpg'),
('Slightly Used','Great Computers P9000', 1000.00, 4, 50, b'1', 'This powerful PC will do all of your gaming and internet browsing for you!', 'http://cdn1.tekrevue.com/wp-content/uploads/2014/05/old-pc-windows-95.jpg'),
('Average Wear','Comfy Chair', 499.99, 5, 20, b'0', 'This chair is the greatest chair you will ever sit in. You won\'t find a more comfortable seat.', 'https://s-media-cache-ak0.pinimg.com/736x/6a/ed/aa/6aedaa01a25089bc03de477e178a00b4.jpg'),
('Used','Instant Chineasy', 00.99, 2, 1000, b'1', 'This instant ramen noodles will taste delicious just add hot water!', 'https://4.bp.blogspot.com/-ja_NUfL_Cs0/Vw9RTX_ApgI/AAAAAAAAEUY/PCZn_EbxerkhjBs-B3L4KIHB6BSLlALJwCLcB/s1600/ChineseIMG_2327.JPG'),
('New','Gamer Headphones', 10.00, 3, 500, b'1', 'This state of the art headset will give you the advantage in all your call of duty matches because you will hear the enemy before they hear you.', 'http://dash.coolsmartphone.com/wp-content/uploads/2014/10/oldphones.jpg'),
('Slightly Used','Best Area Rug', 49.99, 5, 250, b'1', 'Gorgeously soft, that is how our customers describe this rug. And so appealing. You\'ll want to do your whole house in this carpet', 'https://ak1.ostkcdn.com/images/products/6830591/Hand-Woven-Shagadelic-Orange-Chenille-Shag-Rug-25-x-46-MLA14359628.jpg');
 


