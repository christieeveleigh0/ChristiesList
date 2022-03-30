-- Adminer 4.8.1 MySQL 8.0.28 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `listing`;
CREATE TABLE `listing` (
  `id` int NOT NULL AUTO_INCREMENT,
  `posted_by` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `listing` (`id`, `posted_by`, `name`, `description`, `location`, `date`, `category`, `image`, `price`) VALUES
(1,	4,	'Beautiful table',	'Very attractive table with 4 legs. Made out of wood',	'Cape Town',	'10/12/2021',	'antiques',	'image/listings/table.jpg',	'500'),
(2,	4,	'Vintage Couch',	'Very attractive',	'Sunset Beach',	'10/01/2022',	'furniture',	'image/listings/couch.jpg',	'1500'),
(3,	0,	'B-Grade Zebra Hides',	'Genuine B-Grade Burchell’s Zebra Hide Rugs available at only R3800 each. Also have A-Grades available. We deliver to your door!  ',	'Brackenfell',	'23/03/2022',	'antiques',	'image/listings/zebra.jpg',	'3800'),
(4,	4,	'Plant Collection',	'Lovely plant collection. Very exciting.',	'Stellenbosch',	'10/12/2021',	'collectables',	'image/listings/plant-collection.jpg',	'600'),
(6,	0,	'Dining Room Chairs',	'4 dining room chairs. For collection in Sunset Beach',	'Sunset Beach',	'10/12/2021',	'furniture',	'image/listings/diningchairs.jpg',	'4000'),
(7,	0,	'Vintage Couch',	'Velvet vintage couch. Needs some TLC.',	'City Center',	'10/12/2021',	'furniture',	'image/listings/couch2.jpg',	'4000'),
(8,	4,	'Exquisite Ming Duck',	'Chinese Genuine Ming Blue Duck . Vintage but good condition. Collect in Bothasig',	'Bothasig',	'17/03/2022',	'antiques',	'image/listings/mingduck.jpg',	'4000'),
(9,	0,	'Two Seater Couch x 2 ',	'Two lovely comfortable couches bought in England from MultiYork, a high quality furniture company like Weatherleys. ',	'Cape Town',	'17/03/2022',	'furniture',	'image/listings/redcouch.jpg',	'3000'),
(10,	4,	'8 Mid Century French Style Carved Dining Room Chairs',	'8 Mid Century French Style Carved Dining Room Chairs consisting out of the following. Cell 076 706 4700 Tel 021- 558 7546 www.furnicape.co.za ',	'Bothasig',	'17/03/2022',	'furniture',	'image/listings/dining.jpg',	'16000'),
(11,	0,	'Plant Sale!! Everything must go!! R50 to R1000',	'Plant Sale!! Prices range from R50 to R1000. 2 x wooden plant stands available!! Herb bowls for your kitchen. ',	'Cape Town',	'17/03/2022',	'collectables',	'image/listings/plantsale.jpg',	'50'),
(12,	0,	'Antique brass Flemish wall lights x6',	'Antique  brass Flemish wall lights x6  R300 each or R1500 for all 6  Approximate size:  28 x17 cm long x 9 cm wide  Cash on collection in kraaifontein western cape or collect at Milnerton flea-market on weekends',	'Milnerton',	'17/03/2022',	'antiques',	'image/listings/lights.jpg',	'600'),
(13,	0,	'Floating Shelves',	'Longer custom lengths welcome. Stain add R50/shelf  Paint add R80/shelf (White, black, light grey)  Hand made on order, solid treated pine floating shelves. Collection in Durbanville unless an arrangement is made.',	'Durbanville',	'17/03/2022',	'furniture',	'image/listings/floatingshelve.jpg',	'165'),
(20,	5,	'Swiss Countertop Dishwasher',	'',	'Durbanville',	'2022/03/23',	'appliances',	'image/listings/dishwasher.jpg',	'2800'),
(21,	5,	'Miffy Night Light',	'Excellent condition.Miffy is also made from recyclable plastic.  Composition: polyethylene Color: white Dimensions: 80 x 80 x 40 cm Soft lighting Economical 7-watt bulb Weight: 5,5 kg Dimmable Led Light',	'Parow',	'2022/03/23',	'decor',	'image/listings/miffy.jpg',	'3200');

DROP TABLE IF EXISTS `resets`;
CREATE TABLE `resets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `resetkey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `resets` (`id`, `user`, `resetkey`) VALUES
(4,	'4',	'fa60646ef6d85876fd3f0b3472b037af');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `name`, `number`, `email`, `password`) VALUES
(1,	'',	'',	'christieeveleigh0@gmail.com',	'Eveleigh12%!'),
(4,	'Christie',	'',	'cmarx@student.wethinkcode.co.za',	'$2y$10$xbUnZjxlf1xqS4BjxUZ8z.k4Eqowe63FheQP.NuLWLAR1YFP18EkO'),
(5,	'James Marx',	'0833140990',	'jmarx@james.com',	'$2y$10$DmutIYy1sKOmdVCZnQJ6U.oECdsrL9ayWKJM8ZgLQ6qomcIw/RP06');

-- 2022-03-25 09:56:08
