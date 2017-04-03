-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 03, 2017 at 05:28 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `surphs_up`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_finds`
--

CREATE TABLE `food_finds` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `f_about` varchar(255) NOT NULL,
  `f_address` varchar(255) NOT NULL,
  `cuisine` varchar(255) NOT NULL,
  `f_price_range` varchar(255) NOT NULL,
  `spot_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_finds`
--

INSERT INTO `food_finds` (`f_id`, `f_name`, `f_about`, `f_address`, `cuisine`, `f_price_range`, `spot_id`) VALUES
(1, 'Carinderia tapat ng Circle Hostel', 'Probably one of the few places to eat in San Felipe, Zambales, this carinderia has it all: from your morning tapsilog and coffee, to main Filipino dishes. It also doubles as a convenience store! What more can you ask for?', 'San Felipe, Zambales', 'Filipino', 'P25-P150', 1),
(2, 'Choka', 'Cheap, delicious food beautifully prepared; hip, cool ambiance, Choka makes eating more than just a necessity!', '248 National Highway, Urbiztondo, San Juan, La Union', 'Filipino, American', 'P100-P250', 2),
(3, 'The Good Food', 'One of the most popular places to eat when you\'re staying around Sabang Beach, The Good Food truly lives up to its name, and more! All the dishes are beautifully prepared and their tastes do not disappoint! The taco fish is a must try.', 'Buton St, Baler, Aurora', 'Filipino, Mexican, American', 'P75-P200', 3),
(4, 'Kermit Surf Resort and Restaurant', 'Want some Italian by the beach? Look no further! This restaurant offers sumptuous meals and mouth watering desserts.', 'Siargao', 'Italian, American', 'P200-P1000', 4),
(5, 'Art Cafe', 'A family-friendly restaurant that turns into a chill bar with good live music at night. One simply cannot go to El Nido without trying this out.', 'El Nido', 'Filipino, American, Mexican, Turkish', 'P300-P5000', 5),
(13, 'Tambayan', 'Perfect for groups of people, insanely dee-lish Filipino dishes!', 'Somewhere over the rainbow', 'Filipino, American', 'P200-1000', 2),
(14, 'El Union', 'Probably the hippest coffee shop you can find in Elyu, with good food, crazy awesome coffee, and a nice view by the beach.', 'Urbiztondo, San Juan, La Union', 'American, Spanish', 'P150-500', 2),
(15, 'q', 'q', 'q', 'q', 'q', 5);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `g_id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `spot_id` int(11) DEFAULT NULL,
  `nearby_spot_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`g_id`, `img_url`, `spot_id`, `nearby_spot_id`) VALUES
(1, 'gallery/zamba3.jpg', 1, NULL),
(2, 'gallery/lu.jpg', 2, NULL),
(3, 'gallery/baler.jpg', 3, NULL),
(4, 'gallery/siargao.jpg', 4, NULL),
(5, 'gallery/el.jpg', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lodgings`
--

CREATE TABLE `lodgings` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `l_about` varchar(255) NOT NULL,
  `l_address` varchar(255) NOT NULL,
  `l_price_range` varchar(255) NOT NULL,
  `spot_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lodgings`
--

INSERT INTO `lodgings` (`l_id`, `l_name`, `l_about`, `l_address`, `l_price_range`, `spot_id`) VALUES
(1, 'Circle Hostel', 'Lorem ipsum', 'Zambales', 'P450-1500', 1),
(2, 'Flotsam and Jetsam', 'Beki ipsum', 'La Union', 'P700-P3000', 2),
(3, 'Nalu Surf Camp', 'Ipsum ipsum', 'Baler', 'P2,000-P10,000', 3),
(4, 'Siargao Hostel', 'Blah blah', 'Siargao', 'P200-P700', 4),
(5, 'El Nido Place', 'Hello world', 'El Nido', 'P3,000-P10,000', 5),
(15, 'Circle Hostel', 'Friendly people everywhere, awesome chill vibes, free peanut butter and banana breakfast, perfect place for budget travellers.', 'Urbiztondo, San Juan, La Union', 'P500-P1100', 2),
(16, 'Vessel Hostel', 'Newly-opened, this hostel is made of little rooms that look like shipping containers, so cool.', 'Urbiztondo, San Juan, La Union', 'P500-P2000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nearby_spots`
--

CREATE TABLE `nearby_spots` (
  `n_id` int(11) NOT NULL,
  `n_name` varchar(255) NOT NULL,
  `n_about` varchar(255) NOT NULL,
  `n_address` varchar(255) NOT NULL,
  `spot_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nearby_spots`
--

INSERT INTO `nearby_spots` (`n_id`, `n_name`, `n_about`, `n_address`, `spot_id`) VALUES
(1, 'Magic Left', 'Enjoy long, awesome left rides here especially during the Southwest Monsoon season in the Philippines.', 'Pundaquit, San Antonio, Zambales', 1),
(2, 'San Juan', 'Chill, laidback waves best for beginner to intermediate surfers. Here you can also one of the most popular surfers in town, Luke Landrigan.', 'Urbiztondo, San Juan, MacArthur Highway, San Fernando, La Union', 2),
(3, 'Sabang Beach', 'The most popular place to surf in Baler, it has good waves all year round. Beginner to pro surfers are all welcome here, but it might be too harsh on peak seasons!', 'Poblacion, Baler, Aurora', 3),
(4, 'Cloud 9', 'This spot probably has the best waves the Philippines can offer! If you want action, this is the place for you.', 'General Luna, Surigao del Norte', 4),
(5, 'Nacpan Beach', 'The picturesque view only adds to the feeling of euphoria when you surf here. But waves only peek every now and then.', 'Sitio Calitang, El Nido, Palawan', 5),
(18, 'Monaliza Point', 'Easily everyone’s favorite right-hander in San Juan. Beginners beware: The Point breaks over sharp and rocky reef that can be difficult to navigate so it’s best to paddle out with a dedicated surf instructor.', 'The Little Surfmaid Resort, San Juan, La Union', 2),
(19, 'The Bowl', 'A fast section in the main beach break that offers steeper drops and small barreling sections on the inside. Best to paddle out here if your surf skills are above beginner.', 'Kahuna Beach Resort, San Juan, La Union', 2),
(21, 'w', 'w', 'wwww', 3);

-- --------------------------------------------------------

--
-- Table structure for table `spots`
--

CREATE TABLE `spots` (
  `s_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `directions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spots`
--

INSERT INTO `spots` (`s_id`, `name`, `about`, `directions`) VALUES
(1, 'Zambales', 'About 3-4 hours only away from Manila, this is where a lot of surfers and aspiring ones head to, to just surf, surf surf! Best to go to this place during rainy season, as it is usually flat during summer.', 'Central Luzon &middot; 3-5 hours &middot; 250-400php'),
(2, 'La Union', 'Easily accessible, La Union is probably where all the \"millennials\" go to try out surfing. The area has many cool, hip places to stay and eat, because of the booming tourism industry.', 'Ilocos Region &middot; 5-6 hours &middot; 400-600php'),
(3, 'Baler', 'Considered the birthplace of surfing in the Philippines, Baler enjoys an influx of local and international tourists all year round. Waves can be scary or sweet, depending on the season.', 'Aurora province, Central Luzon &middot; 6 hours &middot; 300-700php'),
(4, 'Siargao', 'This ain\'t called the surfing capital of the Philippines for nothing. During peak season, it boasts massive, majestic waves maybe only pros can surf. Off-season, you can opt for chill rides too.', 'Surigao province &middot; 1 hour flight 2 hours by boat &middot; 1500-5000php from Manila'),
(5, 'El Nido', 'With its pristine beaches and glorious lagoons, El Nido has been dubbed as one of the most beautiful islands worldwide. And not all know this, but you can also actually surf here! Just look for the instructor at Pukka Bar.', 'Palawan province &middot; 1 hour flight to Puerto Princesa, 6 hours van to El Nido proper &middot; 3000-1200php');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `username`, `password`, `role`) VALUES
(24, 'Regine Blanco', 'regineannblanco@yahoo.com', 'regineblanco', '3f2132fc381ee3186016a447d3239d1662d6d65d', 'admin'),
(25, 'Simply Me', 'simplyme@yahoo.com', 'simplyme', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'regular'),
(26, 'Hello World', 'helloworld@msn.com', 'helloworld', 'a9524066475fd91ca30386cfa75b7fa408ff541a', 'regular'),
(28, 'Hotness Overload', 'ho@gmail.com', 'hotnessoverload', '9a76a857ad399b492ba01879d0fa2d717e4430b2', 'regular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_finds`
--
ALTER TABLE `food_finds`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `spot_id` (`spot_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`g_id`),
  ADD KEY `spot_id` (`spot_id`),
  ADD KEY `nearby_spot_id` (`nearby_spot_id`);

--
-- Indexes for table `lodgings`
--
ALTER TABLE `lodgings`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `spot_id` (`spot_id`);

--
-- Indexes for table `nearby_spots`
--
ALTER TABLE `nearby_spots`
  ADD PRIMARY KEY (`n_id`),
  ADD KEY `spot_id` (`spot_id`);

--
-- Indexes for table `spots`
--
ALTER TABLE `spots`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_finds`
--
ALTER TABLE `food_finds`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `lodgings`
--
ALTER TABLE `lodgings`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `nearby_spots`
--
ALTER TABLE `nearby_spots`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `spots`
--
ALTER TABLE `spots`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_finds`
--
ALTER TABLE `food_finds`
  ADD CONSTRAINT `food_finds_ibfk_1` FOREIGN KEY (`spot_id`) REFERENCES `spots` (`s_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_ibfk_1` FOREIGN KEY (`spot_id`) REFERENCES `spots` (`s_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `galleries_ibfk_2` FOREIGN KEY (`nearby_spot_id`) REFERENCES `nearby_spots` (`n_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `lodgings`
--
ALTER TABLE `lodgings`
  ADD CONSTRAINT `lodgings_ibfk_1` FOREIGN KEY (`spot_id`) REFERENCES `spots` (`s_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `nearby_spots`
--
ALTER TABLE `nearby_spots`
  ADD CONSTRAINT `nearby_spots_ibfk_2` FOREIGN KEY (`spot_id`) REFERENCES `spots` (`s_id`) ON DELETE SET NULL ON UPDATE CASCADE;
