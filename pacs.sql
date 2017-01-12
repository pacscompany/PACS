-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2017 at 09:57 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pacs`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(50) NOT NULL,
  `token_id` varchar(50) NOT NULL,
  `bill_amount` int(100) NOT NULL,
  `location_id` int(50) NOT NULL,
  `loc` int(11) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `servicecharge` int(11) NOT NULL,
  `items` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `token_id`, `bill_amount`, `location_id`, `loc`, `timestamp`, `servicecharge`, `items`) VALUES
(1, '1475', 69, 1, 1, '14572222', 5, 'a:1:{i:0;a:3:{i:0;a:3:{i:0;s:4:"beer";i:1;i:2;i:2;i:15;}i:1;a:3:{i:0;s:4:"vine";i:1;i:1;i:2;i:25;}i:2;a:3:{i:0;s:7:"chicken";i:1;i:2;i:2;i:7;}}}');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `locid` int(11) NOT NULL,
  `loc` int(11) NOT NULL,
  `starttimestamp` text NOT NULL,
  `userid` int(11) NOT NULL,
  `endtimestamp` text NOT NULL,
  `room` int(11) NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `locid`, `loc`, `starttimestamp`, `userid`, `endtimestamp`, `room`, `adults`, `children`) VALUES
(1, 1, 2, '2017-01-03', 1, '2017-01-04', 6, 6, 6),
(2, 1, 2, '', 1, '', 0, 0, 0),
(3, 1, 2, '', 1, '', 0, 0, 0),
(4, 1, 2, '', 1, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `purchase` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `purchase`, `productid`, `quantity`, `userid`) VALUES
(89, 1, 1, 1, 1),
(90, 1, 2, 1, 1),
(91, 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Wiskies'),
(2, 'Vodka');

-- --------------------------------------------------------

--
-- Table structure for table `faviorute`
--

CREATE TABLE `faviorute` (
  `id` int(11) NOT NULL,
  `locid` int(11) NOT NULL,
  `loc` int(11) NOT NULL,
  `fav` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faviorute`
--

INSERT INTO `faviorute` (`id`, `locid`, `loc`, `fav`, `userid`) VALUES
(90, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `game` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `attempts` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `level`, `game`, `score`, `attempts`, `userid`) VALUES
(49, 1, 1, 200, 7, 1),
(50, 2, 1, 500, 1, 1),
(51, 3, 1, 300, 5, 1),
(52, 3, 1, 500, 1, 1),
(53, 4, 1, 100, 9, 1),
(54, 1, 1, 500, 1, 1),
(55, 2, 1, 0, 14, 1),
(56, 3, 1, 350, 4, 1),
(57, 4, 1, 500, 1, 1),
(58, 1, 1, 500, 1, 1),
(59, 2, 1, 500, 1, 1),
(60, 3, 1, 500, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gameflow`
--

CREATE TABLE `gameflow` (
  `id` int(11) NOT NULL,
  `locid` int(11) NOT NULL,
  `loc` int(11) NOT NULL,
  `clues` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gameflow`
--

INSERT INTO `gameflow` (`id`, `locid`, `loc`, `clues`) VALUES
(1, 1, 1, 'The bottle is stolen..!!!\nDetective, Please bring us our priceless artifact back.\nWe have informed the FBI and the CIA of this outrageous robbery.\n They will provide  us with any information they can the have \n already placed several of their top agents and spies on alert \n The thief was first  sighted near where colombus first set foot in sri lanka,  wearing a green cap , a black overcoat and a blue denim \n'),
(2, 2, 1, 'Quick  we have some intel from the FBI The thief was sighted near our restautant in little England inside sri lanka .He has had a gun with him and \nhas threatned the barkeeper to shut him up...!!! Be careful...!!!\n'),
(3, 2, 1, 'Detective,  the thief has left a train ticket on the counter it read " Colombo " there is only one \nrestaurant where he can go in that place go to is near the most complex junction in colombo districtgo there immediately\n'),
(4, 1, 1, 'One of our barman has seen the thief at Where the independace pact was signed he is wearing a whole set of new clothes blue shirt with black trousers ,including a\nside bag which he has hidden the bottle.'),
(5, 2, 2, 'CIA has intel on a hotel reservation in one of our hotels at The most beautiful beachin sri lanka starting with letter "U" and ending with the letter"A" on <DATE > at <TIME>\nyou can catch him quick...!!! be careful he is armed and he is not afraid to use it.This is outr last chance in catching him if you miss this  \nchance he will disppear with the golden bottle \nGO NOW....!!!'),
(6, 2, 2, 'The next location is where the tallest tower in sri\nlanka is under construction there is a \npub near that place and one of \nour barmen has seen the thief\nthere wih another man');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `locid` int(11) NOT NULL,
  `loc` int(11) NOT NULL,
  `billid` int(11) NOT NULL,
  `levelid` int(11) NOT NULL,
  `timestamp` text NOT NULL,
  `userid` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `locid`, `loc`, `billid`, `levelid`, `timestamp`, `userid`, `star`, `score`) VALUES
(54, 1, 1, 1, 1, '1484252864', 1, 1, 400),
(55, 1, 1, 1, 2, '1484252904', 1, 2, 700),
(56, 1, 1, 1, 2, '1484252910', 1, 2, 700),
(57, 1, 1, 1, 3, '1484253056', 1, 2, 500);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `description` text NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `website` text NOT NULL,
  `phonenumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `lat`, `lon`, `description`, `imageurl`, `address`, `website`, `phonenumber`) VALUES
(1, '‘T En Zal', 6.927812, 79.86334, ' Featuring free WiFi and a barbecue, ‘T En Zal offers accommodation in Haputale. The bed and breakfast has a sun terrace and sauna, and guests can enjoy a meal at the restaurant. Free private parking is available on site.\n\nCertain rooms feature a seating area for your convenience. A terrace or balcony are featured in certain rooms.\n\nBike hire and car hire are available at this bed and breakfast and the area is popular for cycling.\n\nNuwara Eliya is 29 km from ‘T En Zal, while Bandarawela is 8 km away. ', '1.jpg', ' Colombo', 'www.tenzal.com', '0112245685'),
(2, 'Saffron & Blue', 6.927875, 79.86398, '\r\nSaffron & Blue is located in Kosgoda, a small town in southern Sri Lanka known for its turtle conservation projects. A 13 m outdoor pool surrounded by gardens is available. Guests can also enjoy free Wi-Fi in public areas.\r\n\r\nThe well-decorated guestrooms all overlook the pool or gardens. A personal safe and free bottled water are included. En suite bathrooms have either a bathtub or a spa bathtub.\r\n\r\nSaffron & Blue is 76 km from Colombo City and 132 km from Bandaranaike International Airport. On-site parking is free.\r\n\r\n01 Restaurant serves both Sri Lankan and Western dishes. \r\n\r\nThis property also has one of the best-rated locations in Kosgoda! Guests are happier about it compared to other properties in the area.\r\n\r\nThis property is also rated for the best value in Kosgoda! Guests are getting more for their money when compared to other properties in this city.\r\n\r\nWe speak your language!\r\n\r\nSaffron & Blue has been welcoming Booking.com guests since 10 Jan 2013.\r\nVillas: 4 , Hotel Chain: Jetwing Hotels Limited', '2.jpg', 'Colombo', 'www.jetwinghotels.com', '0112278523');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(50) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `item_price` double NOT NULL,
  `type` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_description`, `item_price`, `type`, `image`) VALUES
(1, 'Speyside Whisky', ' From the heat of our cubeb berries to the vitality of our \r\n                                    coriander seeds, the spice of our grains of paradise to\r\n                                    the harmony of the cassia bark, each one of our botanicals\r\n     ', 150, '1', '1.png'),
(2, 'Jack Daniels', 'Jack Daniel''s Green Label is a lighter, less mature whiskey with a lighter color and character. The barrels selected for Green Label tend to be on the lower floors and more toward the center of the warehouse where the whiskey matures more slowly', 105, '1', '3.png'),
(3, 'Skyy Vodka', 'SKYY is the leading vodka with a smooth, clean taste. Innovative four column distillation and triple filtration, which SKYY ioneered in 1992, as well as a proprietary reverse-osmosis process, give SKYY this distinctively smooth quality', 205, '2', '2.png');

-- --------------------------------------------------------

--
-- Table structure for table `itembill`
--

CREATE TABLE `itembill` (
  `item_id` int(50) NOT NULL,
  `bill_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `progres_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `location_id` int(50) NOT NULL,
  `bill_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pub`
--

CREATE TABLE `pub` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `description` text NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `website` text NOT NULL,
  `phonenumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pub`
--

INSERT INTO `pub` (`id`, `name`, `lat`, `lon`, `description`, `imageurl`, `address`, `website`, `phonenumber`) VALUES
(1, 'Lion Pub', 6.9271, 79.8622, 'His is a cheap and good place for a hangout. It has a a/c bar which I haven''t been. Try the hot butter cuttlefish dish and you won''t regret. The quantities are larger and will worth the money you pay. Less cocktails but they have good bottles to be purchased. A good place for a beer with some bites and have a chat. Open area and they have take away option too.', '3.jpg', 'Colombo', 'www.lionpub.com', '0112256347'),
(2, 'Cheers Pub', 6.9278, 79.8633, 'One of the best places to hang out in Colombo. Great ambiance and service. Good food to compliment your choice of drink.', '4.jpg', 'Colombo', 'www.cheerpublk', '0112285296'),
(3, 'The Republic', 6.9278, 79.8613, '\nNice bar and tasty food, would have been four stars if they allowed men to wear shorts. This is a tropical country management!', '5.jpg', ' Colombo 04', 'www.republic.com', '0112245638');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `description` text NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `website` text NOT NULL,
  `phonenumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `lat`, `lon`, `description`, `imageurl`, `address`, `website`, `phonenumber`) VALUES
(1, 'The Sizzle', 6.9278, 79.8612, 'Best food ever!!! Superb experience and extremely friendly staff. Definitely one of my favourite places to eat. I cannot emphasis more on how good the food tastes', '6.jpg', 'Colombo', 'www.sizzle.lk', '0112245637');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(50) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `telephone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `lat` text NOT NULL,
  `lon` text NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `points` text NOT NULL,
  `address` text NOT NULL,
  `sub` int(11) NOT NULL DEFAULT '0',
  `session` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `telephone_number`, `email`, `password`, `image_url`, `lat`, `lon`, `score`, `points`, `address`, `sub`, `session`) VALUES
(1, 'Charitha', 'Goonawardana', '0774586122', 'charithagoona34@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '1.jpg', '6.7769786', '79.92659549999999', 15100, '56', 'Piliyandala', 1, 0),
(2, 'Pramod', 'Shehan', '0778916736', 'pramodshehan@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2.jpg', '', '', 120, '', 'Colombo 04', 0, 0),
(3, 'Anjana', 'Zeus', '0712465255', 'anjana234@yahoo.com', '8cb2237d0679ca88db6464eac60da96345513964', '3.jpg', '', '', 230, '', 'Nugegoda', 0, 0),
(4, 'Suharsha ', 'Fonseka', '0774575545', 'suharshafonseka44@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '4.jpg', '', '', 500, '', 'Wennappuwa', 0, 0),
(12, 'Diluna', 'Ashen', '0779393186', 'dilunaash@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '12.jpg', '', '', 20, '', 'Kaluthara', 0, 0),
(13, 'Chathura', 'Madawa', '0778916736', 'chathura@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '5.jpg', '', '', 52, '', 'Ambilipitiya', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faviorute`
--
ALTER TABLE `faviorute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gameflow`
--
ALTER TABLE `gameflow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`progres_id`);

--
-- Indexes for table `pub`
--
ALTER TABLE `pub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faviorute`
--
ALTER TABLE `faviorute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `gameflow`
--
ALTER TABLE `gameflow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `progres_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pub`
--
ALTER TABLE `pub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
