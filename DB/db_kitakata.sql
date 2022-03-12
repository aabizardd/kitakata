-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 04:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kitakata`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(250) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_img` varchar(250) NOT NULL,
  `password_account` varchar(250) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`admin_id`, `admin_username`, `admin_name`, `admin_img`, `password_account`, `is_active`) VALUES
(1, 'admin', 'admin', 'admin.jpg', '$2y$10$3RwAR7FHHkfLI4AVAzdRQOypVpJxTqin2VT0F7ckKNKaBH8Wkg9IK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_books`
--

CREATE TABLE `t_books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(250) NOT NULL,
  `book_cover` varchar(250) NOT NULL,
  `book_category` int(11) NOT NULL,
  `book_discount` int(11) DEFAULT 0,
  `book_price` int(11) NOT NULL,
  `book_stock` int(11) NOT NULL,
  `book_synopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_books`
--

INSERT INTO `t_books` (`book_id`, `book_name`, `book_cover`, `book_category`, `book_discount`, `book_price`, `book_stock`, `book_synopsis`) VALUES
(1, ' Mitos-Mitos Legendaris dalam Khazanah Klasik Muslim: Menyingkap Tabir Cerita-Cerita Kuno yang Disakralkan', 'book-cover622cbe1b5cd27.jpg', 1, 0, 60000, 10, '<p><strong>SINOPSIS</strong></p><p>Banyak sekali kisah-kisah populer dan memukau dalam khazanah klasik muslim, seperti kitab-kitab tafsir dan hadis, yang kadung dipercayai sebagai benar tanpa koreksi dan kritik. Misalnya, kisah tentang penciptaan alam, makhluk pertama di bumi, Nabi Idris, Harut dan Marut, Menara Babel dan Raja Namrudz, Nabi Khidir, tongkat ajaib Nabi Musa, raksasa ‘Auj bin ‘Anaq, Baluqiya, perjalanan panjang dan ajaib Zulkarnain, setan-setan di sekeliling Nabi Sulaiman, dan lain-lain.&nbsp; &nbsp;&nbsp;</p><p>Buku ini berupaya menjelaskan hakikat di balik kisah-kisah di atas, apakah benar seperti yang kita ketahui sekarang, atau sebaliknya. Juga menjelaskan bagaimana cerita itu muncul dan menyebar, dari mana asal-usulnya, di mana ditemukan, siapa yang menciptakannya, apa motifnya, dan kenapa begitu populer dan dipercayai begitu saja oleh masyarakat muslim dari generasi ke generasi, dan terus-menerus disampaikan dalam ceramah-ceramah keagamaan atau majelis-majelis taklim.&nbsp;</p><p>Tanpa menghakimi dan merasa paling benar, penulis buku ini yang merupakan penulis buku-buku sejarah klasik Islam, mengajak kita untuk membuka pikiran dan mendorong sikap kritis kita terhadap warisan klasik yang kita baca hari ini. Dengan begitu, kita tidak akan terjebak dalam alam pikiran kuno yang sarat mitos, untuk beralih ke alam pikiran yang lebih rasional dan membuat kita bangkit dan maju.&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p><p>***</p><p>“Yang lebih penting daripada sejarah adalah bagaimana menceritakannya secara objektif dan tidak membosankan. Walid Fikri berhasil dalam hal ini.”</p><p>—Goodreads</p><p>&nbsp;</p><p>PENULIS</p><p>Walid Fikri. Lahir di Alexandria, Mesir, tahun 1980. Kuliah di Collège Saint Marc, Alexandria, dan meneruskan pendidikan di Fakultas Hukum Universitas Alexandria. Dia adalah peneliti dan penulis buku-buku sejarah. Aktif menulis artikel dan makalah ilmiah bertema sejarah sejak 2009 dan menjadi kolumnis di sejumlah media cetak di Mesir. Di antara buku-bukunya yang lain: Târîkh Syakl Tâni (2010), Târîkh fi azh-Zhill (2012), Mishr al-Majhûlah (2015), Dam al-Mamâlik (2016), dan Dam al-Khulafâ’ (2017).&nbsp; &nbsp;&nbsp;</p>'),
(2, 'Berpikir Kritis: Kaidah Penerang untuk Hidup Benar dan Selamat Menghadapi Banjir Informasi dan Hoaks', 'book2.jpg', 2, 20, 67000, 5, '<p><strong>SINOPSIS</strong></p><p>Kita hidup di era ketika kebenaran dan ketidakbenaran tumpang-tindih dan sulit dibedakan. Banjir informasi yang sangat cepat dan tiada henti di ponsel atau di sekitar kita membuat kita merasa tak punya cukup waktu untuk merenung dan memikirkan dengan jernih apakah itu benar atau bohong (hoaks). Ini diperparah dengan ketidaksiapan pikiran kita untuk mencerna dengan baik semua itu, sehingga begitu mudah menerima apa pun yang masuk tanpa seleksi. Kita belum terbiasa mengarahkan dan melatih otak kita untuk berpikir kritis.</p><p>Buku ini hadir tak hanya menjelaskan maksud dari berpikir kritis, tetapi juga bagaimana langkah-langkah praktis untuk berpikir kritis. Hal itu tak hanya membantu kita menemukan hal yang benar dari yang salah, tetapi juga “mencurigai” semua hal yang telah kita anggap benar, entah itu pengetahuan atau fakta di sekitar kita. Jadi, kita tak begitu saja menerima apa pun sebelum mencermatinya dengan baik. Apa yang selama ini kita anggap benar bisa jadi sebaliknya, mengingat keterbatasan indra dan pengetahuan kita.&nbsp;</p><p>Pemaparan di buku sangat detail, mendasar, filosofis, dan runut, tetapi disajikan dengan bahasa populer dan mudah dipahami karena disertai dengan contoh-contoh kasus, sehingga kita bisa mengikutinya tanpa mengernyitkan dahi. Berpikir kritis, seperti ditegaskan di buku ini, akan membawa kita pada hidup yang benar dan selamat.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p>***</p><p>“Dalam buku Berpikir Kritis, Saifur Rohman berhasil membawa filsafat ke ruang tengah untuk mencerdaskan publik. Kita tidak merasa digurui dengan bahasa yang hangat, lincah, dan indah.”</p><p>—Prof. Dr. Jenderal (purn) AM Hendropriyono, Guru Besar Filsafat Intelijen di Sekolah Tinggi Hukum Militer</p><p>“Setiap orang tidak ingin tersedak dan \'kelelep\' ketika banjir informasi menerpa. Salah satu \'solusi\'-nya kita perlu punya pipa udara ketika badai informasi datang. Dan saya menemukan buku ini adalah pipa tersebut.”</p><p>—Hendrik Lim, M.B.A., penulis buku bestseller Selling is Everybody Business dan CEO Defora &amp; Co</p><p>&nbsp;</p><p>PENULIS</p><p>SAIFUR ROHMAN. Pengajar filsafat pada Program Doktor Ilmu Pendidikan di Universitas Negeri Jakarta; Program Doktor Universitas Tanjungpura, Pontianak; Program Pascasarjana Fakultas Psikologi Unika Semarang; dan sejumlah program pascasarjana di Indonesia. Pendidikan yang ditempuh: S1 Ilmu Sastra Undip, S2 Ilmu Budaya UI, S2 Ilmu Psikologi Unika, S3 Ilmu Filsafat UGM, fellowship non-gelar bidang sastra dan filsafat di Timur Tengah (2003), Kuala Lumpur (2006), Singapura (2007), dan Beijing (2008). Di antara karyanya yang telah diterbitkan antara lain: Pembelajaran Cerpen (Bumi Aksara, 2020), Kritik Sastra: Sebuah Pengantar Populer (2017), Filsafat Pendidikan (Pustaka Pelajar, 2016), Teori dan Pengajaran Sastra (Rajagrafindo, 2015), Filsafat dari Titik Nol (Idea Press, 2015), Kritik Sastra Abad XXI (Ombak, 2014), Kelana (Grasindo, 2014), Follow Your Passion (Grasindo 2014), Dekonstruksi: Desain Penafsiran dan Analisis (2014), Hermeneutik: Desain dan Analisis Penelitian (2013), Metodologi Pengajaran Sastra (2012), Pengantar Studi Poskolonial Indonesia (Jalasutra), novel Tragedi Taruhan (Pena, 2001), novel Kawin Kontrak (Grasindo, 2006), Bibirmu Abadi (Pusat Bahasa, 2006), dan Matinya Ilmu (Rumah Kata).</p>'),
(3, 'HumanKind: Changing the World One Small Act At a Time', 'book3.jpg', 3, 20, 95000, 20, '<p><strong>SINOPSIS</strong></p><p>Kehidupan Brad Aronson berubah dalam sekejap ketika istrinya, Mia, didiagnosis menderita leukemia. Brad menghabiskan sebagian besar waktunya selama 2.5 tahun untuk mendampingi istrinya serta merawat putra mereka yang berusia lima tahun, Jack. Di tengah stres dan putus asa menunggu pengobatan serta bekerja, Brad dan Mia selalu mendapat semangat dari teman, keluarga dan bahkan orang asing yang tidak mereka kenal.</p><p>Terinspirasi dari banyak demonstrasi “kemanusiaan” yang mendukung keluarga mereka, Brad mulai menulis tentang orang-orang yang menyelamatkan keluarganya dari masa kelam itu, yang seringkali dengan gerakan terkecil. Tapi dia tidak berhenti di situ. Mengetahui bahwa banyak tindakan kebaikan sederhana yang mengubah kehidupan di seluruh dunia setiap hari, dia mencari cerita-cerita ini dan membagikan beberapa yang terbaik di sini. Brad juga memberikan lusinan cara untuk membuat perubahan melalui kata-kata dan perbuatan paling sederhana.&nbsp;</p><p>HumanKind berisi kisah nyata tentang bagaimana satu perbuatan kecil dapat membuat dunia menjadi lebih baik. Buku ini akan membuat Anda bersyukur atas apa yang Anda miliki dan memberikan perlindungan dari hal-hal negatif yang mengelilingi kita. Buku ini akan menyentuh hati Anda. Anda akan tertawa, Anda akan menangis dan Anda akan diingatkan tentang apa yang benar-benar penting dalam hidup.&nbsp;</p><p>&nbsp;</p><p>***</p><p>“Elegan, buku tentang perwujudan cinta dalam tindakan.” ―Deepak Chopra</p><p>&nbsp;“Buku yang paling membangkitkan semangat dan meneguhkan kehidupan.” ―Forbes</p><p>“Buku paling inspiratif tahun ini.”&nbsp; ―Independent Book Publishers Association&nbsp;</p><p>“Ini mungkin buku terindah yang pernah saya baca. HumanKind telah mengangkat jiwa saya dan membuat saya menangis.” ―Jane Green, penulis 18 buku bestseller New York Times&nbsp;</p><p>“Kisah-kisah yang dibagikan Brad akan menginspirasi Anda.” ―Gabby Bernstein, penulis buku bestseller #1 New York Times&nbsp;</p><p>“HumanKind sangat cocok untuk siapa saja yang sedang merasakan beratnya beban dunia. Buku ini adalah senter kisah inspiratif dan cara khusus untuk membantu Anda.” ―Neil Pasricha, penulis lima buku bestseller #1 New York Times&nbsp;</p><p>“Bacaan yang menyegarkan. Buku ini menawarkan wawasan dan ide-ide segar tentang bagaimana kita bisa menjadi diri kita yang terbaik.” ―Pam Iorio, CEO, Big Brothers Big Sisters of America&nbsp;</p><p>“Saya tidak bisa memberikan cara yang lebih baik untuk memperbaiki diri sendiri dan dunia selain membacakan HumanKind.” ―Tiny Buddha</p><p>&nbsp;</p><p>****</p><p><strong>PENULIS</strong></p><p>Brad Aronson adalah seorang suami dan ayah, dan ketika dia memegang kendali pengasuhan, dia akan melakukan segalanya. Baginya itu berarti memimpin kompetisi menjatuhkan telur dari jendela lantai tiga rumahnya atau memimpin pertandingan bisbol dan hoki di dalam rumah, dan kemudian harus menjelaskan mengapa semuanya menjadi berantakan. Untungnya, istrinya, Mia, sangat pengertian.</p><p>Brad mengajar kewirausahaan untuk kaum muda di Camden, N.J. dan sukarelawan di lembaga nirlaba Big Brothers Big Sisters dan Hopeworks.</p><p>Suatu hari, Brad berharap menjadi terkenal karena ikut mendirikan hari libur nasional yang menampilkan pohon jeruk setinggi tujuh kaki dan dengan hiasan lebih dari 50 boneka monyet (lihat bab 9 HumanKind). Selain itu, ia bekerja di perusahaan startup teknologi dan menulis buku.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `t_book_detail`
--

CREATE TABLE `t_book_detail` (
  `book_detail_id` int(11) NOT NULL,
  `book_writer` varchar(250) DEFAULT NULL,
  `book_publisher` varchar(250) DEFAULT NULL,
  `book_edition` varchar(250) DEFAULT NULL,
  `book_size` varchar(250) DEFAULT NULL,
  `book_thick` varchar(250) DEFAULT NULL,
  `book_weight` int(11) DEFAULT NULL,
  `book_isbn` varchar(250) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_book_detail`
--

INSERT INTO `t_book_detail` (`book_detail_id`, `book_writer`, `book_publisher`, `book_edition`, `book_size`, `book_thick`, `book_weight`, `book_isbn`, `book_id`) VALUES
(1, 'Walid Fikri', 'Kita Kata', 'I, Januari 2022', '13 x 20 cm', '240 halaman (1.3 cm)', 390, '978-623-220-125-5', 1),
(2, 'Dr. Saifur Rohman, M.Hum.', 'Kita Kata', 'I, Desember 2021', '13 x 20 cm', '88 halaman (1,7 cm)', 390, '978-623-220-123-1', 2),
(3, 'Brad Aronson', 'Kita Kata', 'I, November 2021', '13 x 20 cm', '392 halaman (2 cm)', 400, '978-623-220-120-0', 3),
(7, 'Walid Fikri', 'Kita Kata', 'I, Januari 2022', '13 x 20 cm', '240 halaman (1.3 cm)', 390, '978-623-220-125-5', NULL),
(8, 'Walid Fikri', 'Kita Kata', 'I, Januari 2022', '13 x 20 cm', '240 halaman (1.3 cm)', 390, '978-623-220-125-5', NULL),
(9, 'Walid Fikri', 'Kita Kata', 'I, Januari 2022', '13 x 20 cm', '240 halaman (1.3 cm)', 390, '978-623-220-125-5', NULL),
(10, 'Walid Fikri', 'Kita Kata', 'I, Januari 2022', '13 x 20 cm', '240 halaman (1.3 cm)', 390, '978-623-220-125-5', NULL),
(11, 'Walid Fikri', 'Kita Kata', 'I, Januari 2022', '13 x 20 cm', '240 halaman (1.3 cm)', 390, '978-623-220-125-5', NULL),
(12, 'Walid Fikri', 'Kita Kata', 'I, Januari 2022', '13 x 20 cm', '240 halaman (1.3 cm)', 390, '978-623-220-125-5', NULL),
(13, 'Walid Fikri', 'Kita Kata', 'I, Januari 2022', '13 x 20 cm', '240 halaman (1.3 cm)', 390, '978-623-220-125-5', NULL),
(14, 'Walid Fikri', 'Kita Kata', 'I, Januari 2022', '13 x 20 cm', '240 halaman (1.3 cm)', 390, '978-623-220-125-5', NULL),
(15, 'Walid Fikri', 'Kita Kata', 'I, Januari 2022', '13 x 20 cm', '240 halaman (1.3 cm)', 390, '978-623-220-125-5', NULL),
(16, 'Walid Fikri', 'Kita Kata', 'I, Januari 2022', '13 x 20 cm', '240 halaman (1.3 cm)', 390, '978-623-220-125-5', NULL),
(17, 'Walid Fikri', 'Kita Kata', 'I, Januari 2022', '13 x 20 cm', '240 halaman (1.3 cm)', 390, '978-623-220-125-5', NULL),
(18, 'Walid Fikri', 'Kita Kata', 'I, Januari 2022', '13 x 20 cm', '240 halaman (1.3 cm)', 390, '978-623-220-125-5', NULL),
(19, 'Walid Fikri', 'Kita Kata', 'I, Januari 2022', '13 x 20 cm', '240 halaman (1.3 cm)', 390, '978-623-220-125-5', NULL),
(20, 'Walid Fikri', 'Kita Kata', 'I, Januari 2022', '13 x 20 cm', '240 halaman (1.3 cm)', 390, '978-623-220-125-5', NULL),
(21, 'Walid Fikri', 'Kita Kata', 'I, Januari 2022', '13 x 20 cm', '240 halaman (1.3 cm)', 390, '978-623-220-125-5', NULL),
(22, 'Dr. Saifur Rohman, M.Hum.', 'Kita Kata', 'I, Desember 2021', '13 x 20 cm', '88 halaman (1,7 cm)', 390, '978-623-220-123-1', NULL),
(23, 'Brad Aronson', 'Kita Kata', 'I, November 2021', '13 x 20 cm', '392 halaman (2 cm)', 400, '978-623-220-120-0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_categories`
--

CREATE TABLE `t_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_categories`
--

INSERT INTO `t_categories` (`category_id`, `category_name`) VALUES
(1, 'Sejarah'),
(2, 'Pengembangan Diri'),
(3, 'Motivasi/Inspirasi'),
(6, 'Penerbit & Imprint'),
(7, 'Biografi-Memoar'),
(8, 'Bisnis-Ekonomi'),
(9, 'Motivasi Islam'),
(10, 'Novel-Fiksi'),
(11, 'Parenting-Edukasi'),
(12, 'Politik-Hukum'),
(13, 'Sosial Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `t_deliveries`
--

CREATE TABLE `t_deliveries` (
  `delivery_id` int(11) NOT NULL,
  `delivery_name` varchar(250) NOT NULL,
  `delivery_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_deliveries`
--

INSERT INTO `t_deliveries` (`delivery_id`, `delivery_name`, `delivery_img`) VALUES
(1, 'jne', 'jne.png'),
(2, 'jnt', 'jnt.png'),
(3, 'sicepat', 'sicepat.png'),
(4, 'pos', 'pos.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_payments`
--

CREATE TABLE `t_payments` (
  `payment_id` int(11) NOT NULL,
  `payment_name` varchar(250) NOT NULL,
  `payment_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_payments`
--

INSERT INTO `t_payments` (`payment_id`, `payment_name`, `payment_img`) VALUES
(1, 'bca', 'bca.png'),
(2, 'bri', 'bri.png'),
(3, 'dana', 'dana.png'),
(4, 'gopay', 'gopay.png'),
(5, 'ovo', 'ovo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `t_books`
--
ALTER TABLE `t_books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `fk_book_category` (`book_category`);

--
-- Indexes for table `t_book_detail`
--
ALTER TABLE `t_book_detail`
  ADD PRIMARY KEY (`book_detail_id`),
  ADD KEY `fk_book_id` (`book_id`);

--
-- Indexes for table `t_categories`
--
ALTER TABLE `t_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `t_deliveries`
--
ALTER TABLE `t_deliveries`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `t_payments`
--
ALTER TABLE `t_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_books`
--
ALTER TABLE `t_books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_book_detail`
--
ALTER TABLE `t_book_detail`
  MODIFY `book_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `t_categories`
--
ALTER TABLE `t_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `t_deliveries`
--
ALTER TABLE `t_deliveries`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_payments`
--
ALTER TABLE `t_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_books`
--
ALTER TABLE `t_books`
  ADD CONSTRAINT `fk_book_category` FOREIGN KEY (`book_category`) REFERENCES `t_categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_book_detail`
--
ALTER TABLE `t_book_detail`
  ADD CONSTRAINT `fk_book_id` FOREIGN KEY (`book_id`) REFERENCES `t_books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
