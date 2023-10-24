-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 01:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `price`, `description`, `image_path`) VALUES
(4, 'Egg Steak', 25000.00, 'daging steak yang lembut berpadu dengan telur setengah matang ', 'menu/Egg Stake.jpg'),
(5, 'Pancake', 20000.00, 'pancake tiga Tumpuk dengan es krim diatanya', 'Menu/pancake.jpg'),
(6, 'Matsutake Meat Rolls', 30000.00, 'Dihidangkan bumbu dengan bahan biasa dan sedikit anggur Shaoxing untuk tambahan aroma.', 'menu/matsutake.jpg'),
(7, 'Stir Fried', 27000.00, 'Sayuran dan Daging Sapi yang ditumis dengan Saus Signature', 'Menu/Stir Fried.JPG'),
(8, 'Dim Sum', 30000.00, 'Dim Sum dengan Chilie Sauce', 'Menu/Dim Sum.JPG'),
(9, 'Mint Jelly', 5000.00, 'Jelly hidangan ini menyegarkan karena ditambahkan aroma peppermint.', 'Menu/mint_jelly.jpg'),
(10, 'Jade Parcels', 25000.00, 'Disajikan dengan daging cincang yang dibungkus dengan daun kubis lalu dikukus dalam kaldu.', 'Menu/jade_parcel.jpg'),
(11, 'Invigorating Kitty Meal', 35000.00, 'Invigorating Kitty Meal (Disingkat menjadi Kyabaren) dihidangkan dengan nasi pakai kecap asin, tuna salad dibawah dan dioles kecap asin untuk dagingnya. Detailnya menggunakan rumput laut dan telur.', 'Menu/kyabaren.jpg'),
(12, 'Chicken Nanban', 20000.00, 'Chicken Nanban hidangan ayam goreng dari Kyushu. Dilapisi saus manis asam dan disajikan dengan tartar ala Jepang.', 'Menu/chimken_nanban.jpg'),
(13, 'Soba', 7500.00, 'Soba adalah mie yang terbuat dari tepung soba. Mienya memiliki tekstur dan kenyal yang enak, cocok untuk dinikmati dengan cara \"slurp\"!', 'Menu/soba.jpg'),
(14, 'Okonomiyaki', 25000.00, 'Okonomiyaki, atau \"grilled as you like,\" adalah pancake Jepang dari Osaka/Hiroshima yang terbuat dari tepung dan kol sebagai dasar', 'Menu/okonomiyaki.jpg'),
(15, 'Tricolor Dango', 6500.00, 'Dango berwarna 3 ini bola dumpling kecil terbuat dari tepung beras, teksturnya kenyal dan enak dinikmati dengan teh.', 'Menu/tricolor_dango.jpg'),
(16, 'Mountain Delicacies', 12500.00, 'Hidangan ini berupa saus kaldu ikan dan bumbu seperti daging, jamur, bawang, jahe, kecap, saus tiram, dan air, dimasak hingga kental sebelum dicampur dengan mie.', 'Menu/mountain_delicacies.jpg'),
(17, 'Osmanthus Wine', 10000.00, 'Minuman ini cocok dinikmati dingin atau dengan es di hari panas. Lebih cocok lagi jika anda sedang mencoba mengingat siapa saja yang berbagi kenangan.', 'Menu/osmanthus_wine.jpg'),
(18, 'Saliva Chicken', 15000.00, 'Saliva chicken teknisnya sama dengan ayam suir biasa, tapi yang membedakan adalah, masalah utama dengan hidangan ini, ayamnya dalam keadaan terbakar.', 'Menu/saliva_chicken.jpg'),
(19, 'Chinese Stir Fry', 12500.00, 'Chinese stir fry ini memiliki nama lain \"Flash\" karena seharusnya dimasak cepat seperti yang seharusnya dalam tumis yang baik. Selain itu, hidangan ini merupakan resep original Beidou.', 'Menu/beidou_stir_fry.jpg'),
(20, 'Almond Tofu', 5500.00, 'Almond Tofu tidak terbuat dari Almond. Mereka dibuat dari susu biji aprikot. Dalam bahasa Cina, biji aprikot sering diterjemahkan sebagai Almond. Makanan ini digemari oleh seseorang dengan tinggi yang pendek.', 'Menu/almond_tofu.jpg'),
(21, 'Cream Stew', 15000.00, 'Cream stew, meskipun hidangan ini berasal dari Mondstadt, asalnya berasal dari Jepang. Cream stew adalah jenis masakan berpengaruh Barat yang disebut Yoshoku. Sebuah bentuk Jepang dari hidangan Eropa.', 'Menu/cream-stew.jpg'),
(22, 'Daging Asap', 30000.00, 'Daging asap merupakan teknik lama untuk mengawetkan daging pada masa lalu sebelum adanya pendingin, tetapi asap di dalam ruangan tertutup cukup sulit tanpa memicu alarm kebakaran.', 'Menu/smoked_beef.jpg'),
(23, 'Mysterious Bolognese', 17500.00, 'Mysterious Bolognese merupakan Bolognese khas Lisa menggunakan Cacio e pepe. Artinya hanya keju dan lada.', 'Menu/le_bolognese.jpg'),
(24, 'Lotus Seed Soup', 8500.00, 'Lotus Seed and Bird Egg Soup dapat diberikan topping dengan apa pun yang Anda suka. Kecap, daun bawang, dan sebagainya.', 'Menu/lotus_seed.jpg'),
(25, 'Universal Peace', 11500.00, 'Universal Peace adalah hidangan ketan manis yang umum dinikmati selama musim liburan seperti Tahun Baru Tionghoa.', 'Menu/univ_peace.jpg'),
(26, 'Goulash', 15500.00, 'Goulash berasal dari Hungaria dan sangat umum di Eropa Tengah. Terutama dimakan oleh gembala Hungaria untuk tetap hangat dan sebagai cara untuk menggunakan setiap bagian daging.', 'Menu/goulash.jpg'),
(27, 'Fried Radish Balls', 3500.00, 'Fried Raddish Balls dihidangkan dengan Wortel dan lobak parut dengan daun bawang yang diberi bumbu dengan garam, lada, lima rempah, dan minyak wijen.', 'Menu/balls.jpg'),
(28, 'Zhongyuan Chop Suey', 13500.00, 'Zhongyuan Chop Suey dihidangkan dengan mencampurkan jeroan ayam dengan ikan lalu mengikatnya dengan tepung kanji.', 'Menu/zhongyuan_chop_suey.jpg'),
(29, 'Northern Apple Stew', 27500.00, 'Northern Apple Stew dihidangan dengan memasak daging dalam cider dengan apel caramelized dan bawang.', 'Menu/northern_stew.jpg'),
(30, 'Lighter-Than-Air Pancake', 13500.00, 'Lighter-Than-Air Pancake adalah pancake khas Noelle dengan saus krim vanilla Prancis yang dilapis dengan cokelat yang dilelehkan, dibentuk kembali, dan memiliki detail yang diukir.', 'Menu/pancakes.jpg'),
(31, 'Satisfying Salad', 9500.00, 'Satisfying Salad adalah Salad yang cukup memuaskan karena kentangnya cukup mengenyangkan dan apel menambahkan lapisan rasa manis.', 'Menu/satisfying.jpg'),
(32, 'Chicken Mushroom Skewer', 5500.00, 'Chicken-Mushroom Skewer Daging dan jamur yang ditusukkan ditempatkan di atas panggangan arang.', 'Menu/chimken_mushroom_skewer.jpg'),
(33, 'Mondstadt Grilled Fish', 7500.00, 'Mondstadt Grilled Fish merupakan camilan sederhana namun lezat.', 'Menu/mondstadt_grilled_fish.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `role` enum('Admin','User') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `birth_date`, `gender`, `role`) VALUES
(1, 'lauren', 'elisabeth', 'renw357', '$2y$10$riVj4/QCYIu2Z9qc0.np0usN5A6jvm46iZseyHNPk4FGJk9p5T182', '2023-10-31', 'Female', 'User'),
(2, 'admin', 'utamawan', 'adminis', '$2y$10$Cgd8G.8fJS2xuSiRlZyYc.GMKZVIUtg/2KZsYsabe0RjJtjjkU2bK', '2023-10-01', 'Male', 'Admin'),
(3, 'pp', 'pp', 'pp', '$2y$10$LmPclax6c2/k7nrF4Gqc/OyguJGnW5qn1eUC3m4NdFaWeGyKxMSIO', '2023-10-24', 'Male', 'Admin'),
(4, 'ppp', 'ppp', 'ppp', '$2y$10$ci/VlzEO//jjjrxCFK.2QeiT/3X76xYLGPbJqYgOmOBzUCEEJ6YL6', '2023-10-24', 'Male', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
