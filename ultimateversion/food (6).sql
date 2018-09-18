-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 08:13 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `adminname` varchar(100) NOT NULL,
  `adminpass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `adminname`, `adminpass`) VALUES
(5, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `com`
--

CREATE TABLE `com` (
  `id` int(11) NOT NULL,
  `forum` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `username` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com`
--

INSERT INTO `com` (`id`, `forum`, `content`, `date`, `username`) VALUES
(105, 20, 'If it is a vegetarian recipe you can try using honey', '2017-11-07', 'marina1'),
(106, 21, 'Nothing that requires lots of sauce or has big chunks (salads)', '2017-11-07', 'marina1'),
(107, 23, 'I recommend the Swedish Ostkaka (translation: Cheesecake)', '2017-11-07', 'marina1'),
(108, 22, 'fork of course :)', '2017-11-07', 'unicorn'),
(109, 20, 'Syrup also works fine', '2017-11-07', 'unicorn'),
(110, 23, 'Don\'t forget the super famous Kanelbulle! You may know them as cinnamon bun ', '2017-11-07', 'unicorn'),
(111, 22, 'Spoon', '2017-11-09', 'Rocket2000');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `recipeid` int(11) NOT NULL,
  `username` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `recipeid`, `username`) VALUES
(9, 234, 'Rocket2000');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `forum_id` int(11) NOT NULL,
  `forum_name` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`forum_id`, `forum_name`, `username`) VALUES
(20, 'Hey! Do you guys know with what sugar can be replaced in a brownie?', 'bunny'),
(21, 'What is the best dish to serve on a date?', 'bunny'),
(22, 'What do you eat pasta with: a spoon or a fork?', 'bunny'),
(23, 'I am looking for a traditional Swedish dessert. What do you guys recommend?', 'bunny');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `recipeid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `recipeid`, `rating`, `username`) VALUES
(44, 234, 1, 'cecilia'),
(45, 234, 5, 'unicorn'),
(47, 239, 2, 'unicorn'),
(49, 237, 1, 'unicorn'),
(50, 238, 4, 'unicorn'),
(52, 235, 1, 'Rocket2000'),
(53, 234, 5, 'Rocket2000'),
(54, 239, 3, 'Rocket2000'),
(55, 237, 3, 'Rocket2000');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `ingredients` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `ratings` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `description`, `ingredients`, `img`, `ratings`, `time`, `type`, `username`) VALUES
(234, 'Brownie with frosting', 'Preheat oven to 350 degrees F (175 degrees C). \r\nGrease and flour an 8-inch square pan. In a large saucepan, melt 1/2 cup butter. \r\nRemove from heat, and stir in sugar, eggs, and 1 teaspoon vanilla. Beat in 1/3 cup cocoa, 1/2 cup flour, salt, and baking powder. \r\nSpread batter into prepared pan.\r\n\r\nBake in preheated oven for 25 to 30 minutes. Do not overcook.\r\n\r\nTo Make Frosting: Combine 3 tablespoons softened butter, 3 tablespoons cocoa, honey, 1 teaspoon vanilla extract, and 1 cup confectioners\' sugar. Stir until smooth. Frost brownies while they are still warm.', '1/2 cup butter \r\n1 cup white sugar \r\n2 eggs \r\n1 teaspoon vanilla extract \r\n1/3 cup unsweetened cocoa powder \r\n1/2 cup all-purpose flour \r\n1/4 teaspoon salt\r\n1/4 teaspoon baking powder \r\n\r\nFrosting: \r\n3 tablespoons butter, softened \r\n3 tablespoons unsweetened cocoa powder \r\n1 tablespoon honey \r\n1 teaspoon vanilla extract \r\n1 cup confectioners\' sugar', 'c95a0455-70d0-4667-bc17-acfaf2894210.jpg', 0, 45, 'Dessert', 'unicorn'),
(235, 'Blody Mary', 'In 11-ounce highball glass, stir together tomato juice, vodka, Worcestershire sauce, horseradish, hot sauce, salt, and pepper. Fill glass with ice, then pour mixture into second glass. Pour back and forth 3 to 4 times to mix well, then sprinkle lemon juice over. Garnish with celery stalk and lemon wedge (if using) and serve.\r\n', '1/4 cup (2 ounces) tomato juice\r\n3 tablespoons (1 1/2 ounces) vodka\r\n1 teaspoon Worcestershire sauce\r\n3/4 teaspoon freshly grated horseradish\r\n3 dashes hot pepper sauce, such as Tabasco\r\n1 pinch salt\r\n1 dash freshly ground black pepper\r\nAbout 1 cup ice cubes\r\n1/4 teaspoon fresh lemon juice\r\n1 stalk celery\r\n1 lemon wedge (optional)', 'Bloody-Mary-Straight-On-1024x762.jpg', 0, 15, 'Drinks', 'unicorn'),
(236, 'Cheeseburger Egg Rolls', 'Step 1\r\nPrepare the Hamburgers: Gently mix together ground beef and next 5 ingredients (through onion powder) in a bowl. Shape mixture into 3 (1/2-inch-thick) patties. Heat a large cast-iron skillet or grill pan over medium-high. Coat with cooking spray. Add patties to pan and cook to desired degree of doneness, about 2 to 3 minutes per side for medium. Remove patties from skillet; let stand until cool enough to handle. \r\n\r\nStep 2\r\nPrepare the Egg Rolls: Break Hamburger patties into 1/2-inch chunks. Toss together Hamburger chunks, lettuce, pickles, mayonnaise, and mustard in a bowl until just combined. \r\n\r\nStep 3\r\nWhisk together egg and water in a small bowl. Place 4 of the egg roll wrappers on a work surface with the point of 1 corner of each facing toward you. Place 1/2 cup Hamburger mixture in center of each wrapper; shape into a 4x1-inch horizontal log. Top each with 1 cheese slice half. Fold bottom point of each wrapper over filling. Fold 2 sides over filling. Brush remaining top point with a small amount of the egg wash. Roll up egg roll from bottom to seal. Lightly dust a tray with cornstarch. Place filled egg rolls on tray. Repeat process with remaning egg roll wrappers, Hamburger filling, cheese slice halves, and egg wash. Cover with plastic wrap, and chill until ready to fry. \r\n\r\nStep 4\r\nWhen ready to fry egg rolls, heat oil in a large stockpot or Dutch oven over high to 360&deg;F. Add egg rolls; cook until golden brown on all sides, 3 to 4 minutes. Transfer to a plate lined with paper towels to drain. Serve with Sweet and Sour Ketchup. \r\n\r\nStep 5\r\nPrepare the Sweet and Sour Ketchup: Stir together cornstarch and 2 tablespoons of the water in a small bowl until cornstarch dissolves. Whisk together cornstarch mixture, ketchup, vinegar, sugar, soy sauce, salt, and remaining 1 cup water in a saucepan. Bring to a boil over medium-high. Reduce heat to medium, and simmer, stirring occasionally, until slightly thickened, 2 to 3 minutes.', 'HAMBURGERS \r\n1 pound 85% lean ground beef \r\n4 teaspoons Worcestershire sauce \r\n1 teaspoon kosher salt \r\n1 teaspoon black pepper \r\n1 teaspoon garlic powder \r\n1 teaspoon onion powder Cooking spray \r\n\r\nEGG ROLLS \r\n4 cups thinly shredded romaine lettuce \r\n1/2 cup finely chopped dill pickles \r\n3 tablespoons mayonnaise \r\n2 teaspoons yellow mustard \r\n1 large egg, lightly beaten \r\n1 tablespoon water \r\n8 (6x6-inch) egg roll wrappers \r\n8 American cheese slices, halved \r\n6 cups peanut oil \r\n2 teaspoons cornstarch \r\n1/2 cup apple cider vinegar \r\n1/2 cup granulated sugar \r\n3 tablespoons soy sauce\r\n2 teaspoons kosher salt', '579x441_CheeseburgerEggRolls_1115.jpg', 0, 60, 'Appetizer', 'marina1'),
(237, 'Homemade aioli', 'Whirl the egg, lemon juice, garlic, and mustard in a blender to combine.\r\nWith blender running on a low speed, drip the oil in slowly, allowing each addition to incorporate into the egg mixture before adding more. As more oil is incorporated, you can add the oil more quickly, working up to a slow stream.\r\n\r\nAs you add the oil, the mixture will thicken. It\'s actually pretty crazy how it goes from a liquidy mix of beaten egg into a creamy-looking spread.\r\n\r\nSeason to taste with salt. If it\'s terribly thick, you can thin it a bit with drops of lemon juice. Don\'t try to thin it with more oil, it will actually make it thicker. Serve immediately or cover and chill for up to two days.', '1 egg\r\n1 tablespoon lemon juice\r\n1 clove garlic (crushed or minced)\r\n1/2 teaspoon â€‹â€‹Dijon-style mustard\r\n1/2 to 3/4 cup olive oil (or mix of  olive oil and canola or vegetable oil)\r\nSalt and black pepper (freshly ground, to taste)', '20150608-foolproof-aioli-thumb-1500xauto-423813.jpg', 0, 15, 'Appetizer', 'marina1'),
(238, 'Chicken Curry', 'Heat olive oil in a skillet over medium heat. Saute onion until lightly browned. Stir in garlic, curry powder, cinnamon, paprika, bay leaf, ginger, sugar and salt. Continue stirring for 2 minutes. Add chicken pieces, tomato paste, yogurt, and coconut milk. Bring to a boil, reduce heat, and simmer for 20 to 25 minutes.\r\n\r\nRemove bay leaf, and stir in lemon juice and cayenne pepper. Simmer 5 more minutes.', '3 tablespoons olive oil \r\n1 small onion, chopped \r\n2 cloves garlic, minced \r\n3 tablespoons curry powder \r\n1 teaspoon ground cinnamon \r\n1 teaspoon paprika 1 bay leaf \r\n1/2 teaspoon grated fresh ginger root \r\n1/2 teaspoon white sugar salt to taste \r\n2 skinless, boneless chicken breast halves - cut into bite-size pieces \r\n1 tablespoon tomato paste \r\n1 cup plain yogurt \r\n3/4 cup coconut milk \r\n1/2 lemon, juiced \r\n1/2 teaspoon cayenne pepper', 'chicken-curry-575x437.jpg', 0, 50, 'Main', 'marina1'),
(239, 'Virgin mojito', 'In a glass, muddle/crush the mint, sugar, lime juice and Simple Syrup.\r\nAdd ice.\r\nTop with the ginger ale/club soda/sparkling water.\r\nFor the sugar conscious, you can exchange the sugar for Splenda (2tsp granulated Splenda) and omit the simple syrup.\r\n\r\nEnjoy!', '15 mint leaves\r\n1 teaspoon raw sugar\r\n1 ounce fresh lime juice\r\n1&frasl;2 ounce simple syrup\r\nIce\r\n4 ounces chilled ginger ale or 4 ounces club soda or 4 ounces sparkling water', 'mojito.jpg', 0, 10, 'Drinks', 'bunny'),
(240, 'Classic hot cacao', 'Combine the cocoa, sugar and pinch of salt in a saucepan. Blend in the boiling water. Bring this mixture to an easy boil while you stir. Simmer and stir for about 2 minutes. Watch that it doesn\'t scorch. Stir in 3 1/2 cups of milk and heat until very hot, but do not boil! Remove from heat and add vanilla. Divide between 4 mugs. Add the cream to the mugs of cocoa to cool it to drinking temperature.', '1/3 cup unsweetened cocoa powder \r\n3/4 cup white sugar \r\n1 pinch salt \r\n1/3 cup boiling water \r\n3 1/2 cups milk \r\n3/4 teaspoon vanilla extract \r\n1/2 cup half-and-half cream', 'bdb690737ca632f5374cb5614cbdfc9b.jpg', 0, 10, 'Drinks', 'bunny'),
(241, 'Apple pie', '1. Heat oven to 425&ordm;F. Prepare Double-Crust Pastry.\r\n\r\n2. Mix sugar, flour, cinnamon, nutmeg and salt in large bowl. Stir in apples. Turn into pastry-lined pie plate. Dot with butter. Trim overhanging edge of pastry 1/2 inch from rim of plate.\r\n\r\n3. Roll other round of pastry. Fold into fourths and cut slits so steam can escape. Unfold top pastry over filling; trim overhanging edge 1 inch from rim of plate. Fold and roll top edge under lower edge, pressing on rim to seal; flute as desired. Cover edge with 3-inch strip of aluminum foil to prevent excessive browning. Remove foil during last 15 minutes of baking.\r\n\r\n4. Bake 40 to 50 minutes or until crust is brown and juice begins to bubble through slits in crust. Serve warm if desired.', '1/3 to 1/2 cup sugar\r\n1/4 cup all-purpose flour\r\n1/2 teaspoon ground cinnamon\r\n1/2 teaspoon ground nutmeg\r\n1/8 teaspoon salt\r\n8 cups thinly sliced peeled tart apples (8 medium)\r\n2 tablespoons butter or margarine', '173da066-c6b4-45dd-9b28-0d459cf6f169.jpg', 0, 45, 'Dessert', 'Rocket2000'),
(242, 'Chocolate ice cream', 'Whip heavy cream to stiff peaks in large bowl. Whisk sweetened condensed milk, butter, cinnamon, and vanilla in large bowl. Mix well. Fold in whipped cream.\r\n\r\nPour into a 2-quart container and cover. Freeze 6 hours or until firm. Store in freezer.', '2 cups heavy cream\r\n1 (14 oz.) Eagle Brand&reg; Sweetened Condensed Milk\r\n3 tablespoons butter, melted\r\n1/2 tsp ground cinnamon\r\n1/2 teaspoon vanilla extract', 'eagle-brand-milk-ice-cream-challenge-giveaway-26.jpg', 0, 360, 'Dessert', 'Rocket2000'),
(243, 'Steamed edamame', 'Bring water and salt to a boil. Add edamame and cook for 5 minutes until edamame are tender and easily release from their pod.\r\n\r\nDrain thoroughly and toss generously with a coarse finishing salt like kosher salt or fleur de sel. Serve warm or cold.', '2 cups frozen or fresh edamame in pods\r\n6 cups water\r\n1 tablespoon salt', 'Simply_Steamed_Edamame_2.jpg', 0, 0, 'Appetizer', 'Rocket2000'),
(244, 'Guacamole', 'Peel and quarter a red onion and place in the bowl of a food processor. Pulse a few times until coarsely chopped. Remove the seeds from a jalapeno, then cut into 4 pieces and add to bowl. Add the cilantro and pulse a few more times until coarsely chopped. Cut the tomatoes in half, remove the seeds, and add to the bowl. Pulse a few more times until finely chopped.\r\n\r\nCut the avocados in half, remove the pits, and scoop out the flesh into a separate bowl. Add the lemon and lime juice, salt, pepper, and cumin if desired.\r\n\r\nAdd all but one cup of the onion mixture to the avocados and stir with a fork until just combined. I prefer to leave my guacamole a little chunky. Add more of the onion mixture if desired. I usually use all but 1/2-1 cup of the mixture. Set out the remaining onion mixture (pico de gallo) for dipping chips or topping on tacos.', '1/2 red onion, peeled and quartered\r\n1 jalapeno, seeds removed\r\n1 cup cilantro, loosely packed\r\n2 plum or roma tomatoes\r\n3 hass avocados\r\n1 tablespoon lemon juice\r\n1 tablespoon lime juice\r\nsalt and pepper to taste (about 1/2 teaspoon each)\r\n1/4 teaspoon cumin (optional)', 'guacamole-horiz-a-1600.jpg', 0, 20, 'Appetizer', 'Rocket2000'),
(245, 'Cupcake', '1. Preheat oven to 300&deg;F (148&deg;C) and prepare a cupcake pan with liners.\r\n2. Add the dry ingredients to a large bowl and whisk together. Set aside.\r\n3. Combine the egg, buttermilk, vegetable oil and vanilla in another medium sized bowl.\r\n4. Add the wet ingredients to the dry ingredients and mix until well combined.\r\n5. Add the water to the batter and mix until well combined. Batter will be thin.\r\n6. Fill the cupcake liners about half way and bake for 18-23 minutes, or until a toothpick comes out with a few moist crumbs.\r\n7. Remove the cupcakes from oven and allow to cool for 2 minutes, then remove to a cooling rack to finish cooling.\r\n8. To make the frosting, beat the butter in a large mixer bowl and mix until smooth.\r\n9. Add the melted chocolate and mix until well combined.\r\n10. Add the cocoa powder and mix until well combined.\r\n11. Add about half of powdered sugar and 2 tablespoons of heavy cream and mix until well combined.\r\n12. Pipe the frosting onto the cupcakes.', '2 cups flour\r\n1&frasl;2 teaspoon salt\r\n2 teaspoons baking powder\r\n1&frasl;2 cup butter, softened\r\n3&frasl;4 cup sugar (if you like your cupcakes very sweet, add a little more.)\r\n2 eggs\r\n1 cup milk\r\n1 teaspoon vanilla essence (optional)', '2517horizontal.jpg', 0, 35, 'Dessert', 'Rocket2000'),
(246, 'Spaghetti carbonara', 'Put the egg yolks into a bowl, finely grate in the Parmesan, season with pepper, then mix well with a fork and put to one side.\r\n\r\nCut any hard skin off the pancetta and set aside, then chop the meat.\r\nCook the spaghetti in a large pan of boiling salted water until al dente.\r\nMeanwhile, rub the pancetta skin, if you have any, all over the base of a medium frying pan (this will add fantastic flavour, or use 1 tablespoon of oil instead), then place over a medium-high heat.\r\nPeel the garlic, then crush with the palm of your hand, add it to the pan and leave it to flavour the fat for 1 minute. Stir in the pancetta, then cook for 4 minutes, or until it starts to crisp up.\r\nPick out and discard the garlic from the pan, then, reserving some of the cooking water, drain and add the spaghetti. Toss well over the heat so it really soaks up all that lovely flavour, then remove the pan from the heat.\r\n\r\nAdd a splash of the cooking water and toss well, season with pepper, then pour in the egg mixture &ndash; the pan will help to cook the egg gently, rather than scrambling it. Toss well, adding more cooking water until it&rsquo;s lovely and glossy.\r\nServe with a grating of Parmesan and an extra twist of pepper.', '3 large free-range egg yolks\r\n40 g Parmesan cheese , plus extra to serve\r\n1 x 150 g piece of higher-welfare pancetta\r\n200 g dried spaghetti\r\n1 clove of garlic\r\nextra virgin olive oil', '1371589446335.jpeg', 0, 45, 'Main', 'Rocket2000'),
(247, 'Veggie pizza', 'Sprinkle yeast over warm water in a small bowl. The water should be no more than 100 degrees F (40 degrees C). Let stand for 5 minutes until yeast softens and begins to form a creamy foam.\r\nSift flour, sugar, 1 tablespoon oregano, and 1 teaspoon salt into a large bowl. \r\n\r\nMix egg and oil into dry ingredients; stir in yeast mixture. When dough has pulled together, turn out onto a lightly floured surface and knead until smooth and elastic, about 8 minutes. Lightly oil a large bowl, then place dough in bowl and turn to coat with oil. Cover with a light cloth and let rise in a warm place (80 to 95 degrees F (27 to 35 degrees C)) until doubled in volume, about 1 hour.\r\n\r\nPreheat oven to 450 degrees F (235 degrees C). Lightly grease a baking sheet.\r\nCook and stir diced tomatoes, tomato paste, onion, 1 tablespoon oregano, garlic, onion powder, 1 teaspoon salt, and pepper in a saucepan over medium heat. Cook until sauce has thickened, 15 to 20 minutes.\r\n\r\nPunch down dough and turn it out onto a lightly floured surface. Use a knife to divide dough into two equal pieces--do not tear. Shape dough into rounds and let rest for 10 minutes. Form dough into rectangles, and place onto prepared baking sheet. Spoon tomato sauce over dough. Sprinkle with 1 1/4 cup mozzarella cheese; top with bell pepper, onion, and mushroom. Sprinkle 1/4 cup mozzarella cheese over top.', '3 cups all-purpose flour \r\n1 tablespoon white sugar \r\n1 tablespoon dried oregano \r\n1 teaspoon salt \r\n1 egg \r\n1 tablespoon extra-virgin olive oil \r\n1 (15 ounce) can diced tomatoes \r\n1 (6 ounce) can tomato paste \r\n1/2 small onion, chopped \r\n1 tablespoon dried oregano \r\n1 clove garlic, finely chopped \r\n1 teaspoon onion powder \r\n1 teaspoon kosher salt \r\n1 pinch ground black pepper', 'Easy-Homemade-Veggie-Pizza_1.jpg', 0, 60, 'Main', 'Rocket2000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(3, 'marina1', 'ac9674cb76153159953dff9d572dc537fa8ddc79', 'l@l.com'),
(6, 'unicorn', '84de6753b298abd027fcd1d790eade2413eafb5a', 'uni@corn.com'),
(7, 'bunny', '8bb4ebd4c9c27c16e5ee58cfb08699048d049fe5', 'bunny@carrot.com'),
(13, 'cecilia', '6e4ca0dced8ff091780a3f13375642645960e0b6', 'cecila@s.s'),
(14, 'Rocket2000', 'f8c06235e20bd319defa3c0450916b2a30ca9ad4', 'rocket@12.se');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `com`
--
ALTER TABLE `com`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum` (`forum`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_ibfk_2` (`recipeid`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`forum_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `com`
--
ALTER TABLE `com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`recipeid`) REFERENCES `recipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_3` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
