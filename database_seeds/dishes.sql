-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Lug 25, 2023 alle 15:22
-- Versione del server: 8.0.33
-- Versione PHP: 8.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deliveboo`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `dishes`
--

CREATE TABLE `dishes` (
  `id` bigint UNSIGNED NOT NULL,
  `restaurant_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `ingredients` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vote` double DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `dishes`
--

INSERT INTO `dishes` (`id`, `restaurant_id`, `name`, `slug`, `image_path`, `price`, `ingredients`, `vote`, `description`, `is_visible`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 39, 'Chelsea Buns', 'chelsea-buns', 'https://www.themealdb.com/images/media/meals/vqpwrv1511723001.jpg', 26.86, 'Farina bianca, Sale, Lievito, Latte', 2, 'descrizione prodotto', 1, '2023-07-25 13:10:18', '2023-07-25 13:10:18', NULL),
(2, 45, 'Cioccolato Caramello Croccante', 'cioccolato-caramello-croccante', 'https://www.themealdb.com/images/media/meals/1550442508.jpg', 1.90, 'Barretta Mars, Burro, Rice Krispies, Cioccolato al latte', 5, 'descrizione prodotto', 1, '2023-07-25 13:10:20', '2023-07-25 13:10:20', NULL),
(3, 46, 'Big Mac', 'big-mac', 'https://www.themealdb.com/images/media/meals/urzj1d1587670726.jpg', 26.45, 'Carni macinate, Olio d\'oliva, Panini per hamburger ai semi di sesamo, Cipolla', 5, 'descrizione prodotto', 1, '2023-07-25 13:10:21', '2023-07-25 13:10:21', NULL),
(4, 20, 'Yaki Udon', 'yaki-udon', 'https://www.themealdb.com/images/media/meals/wrustq1511475474.jpg', 27.07, 'Udon Noodles, olio di sesamo, Cipolla, Verza', 2, 'descrizione prodotto', 1, '2023-07-25 13:10:23', '2023-07-25 13:10:23', NULL),
(5, 16, 'Cassoulet di maiale', 'cassoulet-di-maiale', 'https://www.themealdb.com/images/media/meals/wxuvuv1511299147.jpg', 24.75, 'Grasso d\'oca, Maiale, Cipolla, Aglio', 4, 'descrizione prodotto', 1, '2023-07-25 13:10:25', '2023-07-25 13:10:25', NULL),
(6, 19, 'Polpettone di tacchino', 'polpettone-di-tacchino', 'https://www.themealdb.com/images/media/meals/ypuxtw1511297463.jpg', 1.18, 'Olio d\'oliva, Cipolla, Aglio, Worcestershire Sauce', 2, 'descrizione prodotto', 1, '2023-07-25 13:10:27', '2023-07-25 13:10:27', NULL),
(7, 25, 'Crostate al burro canadesi', 'crostate-al-burro-canadesi', 'https://www.themealdb.com/images/media/meals/wpputp1511812960.jpg', 14.35, 'Frolla, Uova, Zucchero muscovado, uvetta', 5, 'descrizione prodotto', 1, '2023-07-25 13:10:28', '2023-07-25 13:10:28', NULL),
(8, 1, 'Poutine', 'poutine', 'https://www.themealdb.com/images/media/meals/uuyrrx1487327597.jpg', 20.29, 'Olio vegetale, sugo di manzo, Patate, Cagliata di formaggio', 3, 'descrizione prodotto', 1, '2023-07-25 13:10:30', '2023-07-25 13:10:30', NULL),
(9, 43, 'Creme brulee al cioccolato bianco', 'creme-brulee-al-cioccolato-bianco', 'https://www.themealdb.com/images/media/meals/uryqru1511798039.jpg', 10.19, 'Crema densa, scaglie di cioccolato bianco, Vaniglia, Tuorli d\'uovo', 3, 'descrizione prodotto', 1, '2023-07-25 13:10:32', '2023-07-25 13:10:32', NULL),
(10, 28, 'Jerk di pollo con riso e piselli', 'jerk-di-pollo-con-riso-e-piselli', 'https://www.themealdb.com/images/media/meals/tytyxu1515363282.jpg', 16.98, 'Cosce di Pollo, Calce, Cipolline, Zenzero', 4, 'descrizione prodotto', 1, '2023-07-25 13:10:33', '2023-07-25 13:10:33', NULL),
(11, 47, 'Stamppot', 'stamppot', 'https://www.themealdb.com/images/media/meals/hyarod1565090529.jpg', 15.43, 'Patate, Foglia d\'alloro, Scalogni, Burro', 4, 'descrizione prodotto', 1, '2023-07-25 13:10:34', '2023-07-25 13:10:34', NULL),
(12, 32, 'Asado di Manzo', 'asado-di-manzo', 'https://www.themealdb.com/images/media/meals/pkopc31683207947.jpg', 5.19, 'Carne bovina, Concentrato di brodo di manzo, Passata di pomodoro, Acqua', 2, 'descrizione prodotto', 1, '2023-07-25 13:10:36', '2023-07-25 13:10:36', NULL),
(13, 38, 'Mechado di manzo', 'mechado-di-manzo', 'https://www.themealdb.com/images/media/meals/cgl60b1683206581.jpg', 24.46, 'Aglio, Cipolla, Carne bovina, Passata di pomodoro', 2, 'descrizione prodotto', 1, '2023-07-25 13:10:38', '2023-07-25 13:10:38', NULL),
(14, 17, 'Torta di prosciutto e porro di pollo', 'torta-di-prosciutto-e-porro-di-pollo', 'https://www.themealdb.com/images/media/meals/xrrtss1511555269.jpg', 5.36, 'Brodo di pollo, Petto di pollo, Burro, Porro', 2, 'descrizione prodotto', 1, '2023-07-25 13:10:39', '2023-07-25 13:10:39', NULL),
(15, 16, 'Pasticcio di budino natalizio', 'pasticcio-di-budino-natalizio', 'https://www.themealdb.com/images/media/meals/r33cud1576791081.jpg', 6.34, 'Arancia, Zucchero Demerara, Grand Marnier, Pudding Natalizio', 3, 'descrizione prodotto', 1, '2023-07-25 13:10:41', '2023-07-25 13:10:41', NULL),
(16, 16, 'Big Mac', 'big-mac-1', 'https://www.themealdb.com/images/media/meals/urzj1d1587670726.jpg', 16.65, 'Carni macinate, Olio d\'oliva, Panini per hamburger ai semi di sesamo, Cipolla', 1, 'descrizione prodotto', 1, '2023-07-25 13:10:42', '2023-07-25 13:10:42', NULL),
(17, 36, 'Hotpot di fagioli e salsiccia', 'hotpot-di-fagioli-e-salsiccia', 'https://www.themealdb.com/images/media/meals/vxuyrx1511302687.jpg', 30.95, 'Salsicce, Salsa di pomodoro, Fagioli bianchi, Treacle nero', 4, 'descrizione prodotto', 1, '2023-07-25 13:10:43', '2023-07-25 13:10:43', NULL),
(18, 34, 'Torte di roccia', 'torte-di-roccia', 'https://www.themealdb.com/images/media/meals/tqrrsq1511723764.jpg', 11.84, 'farina autolievitante, Zucchero semolato, Lievito alimentare in polvere, Burro', 3, 'descrizione prodotto', 1, '2023-07-25 13:10:45', '2023-07-25 13:10:45', NULL),
(19, 11, 'Manzo alla Borgognona', 'manzo-alla-borgognona', 'https://www.themealdb.com/images/media/meals/vtqxtu1511784197.jpg', 31.41, 'Grasso d\'oca, Stinco di manzo, Bacon, Sfide', 2, 'descrizione prodotto', 1, '2023-07-25 13:10:47', '2023-07-25 13:10:47', NULL),
(20, 46, 'Rappie Pie', 'rappie-pie', 'https://www.themealdb.com/images/media/meals/ruwpww1511817242.jpg', 29.00, 'Burro, Cipolle, Brodo di pollo, Petto di pollo', 4, 'descrizione prodotto', 1, '2023-07-25 13:10:49', '2023-07-25 13:10:49', NULL),
(21, 19, 'Souvlaki agnello e limone', 'souvlaki-agnello-e-limone', 'https://www.themealdb.com/images/media/meals/rjhf741585564676.jpg', 22.32, 'Aglio, Sale marino, Olio d\'oliva, Limone', 3, 'descrizione prodotto', 1, '2023-07-25 13:16:10', '2023-07-25 13:16:10', NULL),
(22, 22, 'Congee di pollo', 'congee-di-pollo', 'https://www.themealdb.com/images/media/meals/1529446352.jpg', 7.21, 'Pollo, Sale, Pepe, Ginger Cordial', 1, 'descrizione prodotto', 1, '2023-07-25 13:16:12', '2023-07-25 13:16:12', NULL),
(23, 27, 'Ciotole di manzo Banh Mi con maionese Sriracha, carota e cetriolo sottaceto', 'ciotole-di-manzo-banh-mi-con-maionese-sriracha-carota-e-cetriolo-sottaceto', 'https://www.themealdb.com/images/media/meals/z0ageb1583189517.jpg', 17.11, 'Riso, Cipolla, Calce, Spicchio d\'aglio', 3, 'descrizione prodotto', 1, '2023-07-25 13:16:14', '2023-07-25 13:16:14', NULL),
(24, 15, 'Insalata piccante di patate nordafricane', 'insalata-piccante-di-patate-nordafricane', 'https://www.themealdb.com/images/media/meals/urtwux1486983078.jpg', 16.88, 'patate piccole, Harissa Spice, olio d\'oliva, Limone', 5, 'descrizione prodotto', 1, '2023-07-25 13:16:16', '2023-07-25 13:16:16', NULL),
(25, 25, 'zuppa con uovo', 'zuppa-con-uovo', 'https://www.themealdb.com/images/media/meals/1529446137.jpg', 20.80, 'Brodo di pollo, Sale, Zucchero, Pepe', 4, 'descrizione prodotto', 1, '2023-07-25 13:16:17', '2023-07-25 13:16:17', NULL),
(26, 70, 'Tourtiere', 'tourtiere', 'https://www.themealdb.com/images/media/meals/ytpstt1511814614.jpg', 11.02, 'Patate, Olio di Girasole, Maiale macinato, Cipolla', 2, 'descrizione prodotto', 1, '2023-07-25 13:16:19', '2023-07-25 13:16:19', NULL),
(27, 49, 'Chakchouka', 'chakchouka', 'https://www.themealdb.com/images/media/meals/gpz67p1560458984.jpg', 13.49, 'Pomodori, Olio d\'oliva, Cipolla, Peperoncino', 3, 'descrizione prodotto', 1, '2023-07-25 13:16:20', '2023-07-25 13:16:20', NULL),
(28, 9, 'Torta all\'arancia tunisina', 'torta-allarancia-tunisina', 'https://www.themealdb.com/images/media/meals/y4jpgq1560459207.jpg', 16.60, 'Arancia, Zucchero semolato, Olio d\'oliva, Farina', 1, 'descrizione prodotto', 1, '2023-07-25 13:16:21', '2023-07-25 13:16:21', NULL),
(29, 42, 'Gamberi Kung Po', 'gamberi-kung-po', 'https://www.themealdb.com/images/media/meals/1525873040.jpg', 4.30, 'Gamberi, Salsa di soia, Passata di pomodoro, Farina di Mais', 5, 'descrizione prodotto', 1, '2023-07-25 13:16:22', '2023-07-25 13:16:22', NULL),
(30, 71, 'Budino di caramelle al caramello appiccicoso Ultimate', 'budino-di-caramelle-al-caramello-appiccicoso-ultimate', 'https://www.themealdb.com/images/media/meals/xrptpq1483909204.jpg', 18.30, '3 datteri medjool, acqua, estratto di vaniglia, farina autolievitante', 4, 'descrizione prodotto', 1, '2023-07-25 13:16:24', '2023-07-25 13:16:24', NULL),
(31, 63, 'Peperoncino affumicato alle lenticchie con zucca', 'peperoncino-affumicato-alle-lenticchie-con-zucca', 'https://www.themealdb.com/images/media/meals/uwxqwy1483389553.jpg', 23.74, 'Olio d\'oliva, Cipolla, Porro, Aglio', 3, 'descrizione prodotto', 1, '2023-07-25 13:16:25', '2023-07-25 13:16:25', NULL),
(32, 33, 'Ciambella Krispy Kreme', 'ciambella-krispy-kreme', 'https://www.themealdb.com/images/media/meals/4i5cnx1587672171.jpg', 33.22, 'Lievito, Acqua, Acqua, Zucchero', 3, 'descrizione prodotto', 1, '2023-07-25 13:16:27', '2023-07-25 13:16:27', NULL),
(33, 21, 'Mee goreng mamak', 'mee-goreng-mamak', 'https://www.themealdb.com/images/media/meals/xquakq1619787532.jpg', 5.74, 'Arachidi, Peperoncino, Gamberi, Olio', 2, 'descrizione prodotto', 1, '2023-07-25 13:16:28', '2023-07-25 13:16:28', NULL),
(34, 18, 'Rotolo Funghi & Castagne', 'rotolo-funghi-castagne', 'https://www.themealdb.com/images/media/meals/ssyqwr1511451678.jpg', 33.73, 'Funghi, Castagne, Sfide, Aglio', 3, 'descrizione prodotto', 1, '2023-07-25 13:16:30', '2023-07-25 13:16:30', NULL),
(35, 67, 'Insalata di avocado e salmone', 'insalata-di-avocado-e-salmone', 'https://www.themealdb.com/images/media/meals/1549542994.jpg', 3.48, 'Salmone, Avocado, Cetriolo, Spinaci', 3, 'descrizione prodotto', 1, '2023-07-25 13:16:33', '2023-07-25 13:16:33', NULL),
(36, 50, 'Chicken Karaage', 'chicken-karaage', 'https://www.themealdb.com/images/media/meals/tyywsw1505930373.jpg', 19.26, 'Cosce di pollo, Zenzero, Aglio, Salsa di soia', 2, 'descrizione prodotto', 1, '2023-07-25 13:16:36', '2023-07-25 13:16:36', NULL),
(37, 7, 'Cioccolato Caramello Croccante', 'cioccolato-caramello-croccante-1', 'https://www.themealdb.com/images/media/meals/1550442508.jpg', 12.10, 'Barretta Mars, Burro, Rice Krispies, Cioccolato al latte', 1, 'descrizione prodotto', 1, '2023-07-25 13:16:37', '2023-07-25 13:16:37', NULL),
(38, 2, 'Hotpot di fagioli e salsiccia', 'hotpot-di-fagioli-e-salsiccia-1', 'https://www.themealdb.com/images/media/meals/vxuyrx1511302687.jpg', 18.38, 'Salsicce, Salsa di pomodoro, Fagioli bianchi, Treacle nero', 2, 'descrizione prodotto', 1, '2023-07-25 13:16:38', '2023-07-25 13:16:38', NULL),
(39, 32, 'Nasi lemak', 'nasi-lemak', 'https://www.themealdb.com/images/media/meals/wai9bw1619788844.jpg', 4.77, 'di cocco dorato, Acqua, Pasta di Zenzero, Zenzero', 3, 'descrizione prodotto', 1, '2023-07-25 13:16:40', '2023-07-25 13:16:40', NULL),
(40, 18, 'Panino di noci Gužvara', 'panino-di-noci-guzvara', 'https://www.themealdb.com/images/media/meals/u9l7k81628771647.jpg', 4.50, 'Farina, Zucchero semolato, Lievito, Sale', 3, 'descrizione prodotto', 1, '2023-07-25 13:16:41', '2023-07-25 13:16:41', NULL),
(41, 48, 'Nasi lemak', 'nasi-lemak-1', 'https://www.themealdb.com/images/media/meals/wai9bw1619788844.jpg', 27.91, 'di cocco dorato, Acqua, Pasta di Zenzero, Zenzero', 3, 'descrizione prodotto', 1, '2023-07-25 13:16:42', '2023-07-25 13:16:42', NULL),
(42, 50, 'Torta di zucchero', 'torta-di-zucchero', 'https://www.themealdb.com/images/media/meals/yrstur1511816601.jpg', 26.91, 'Zucchero di canna, Burro, Uova, Estratto di vaniglia', 3, 'descrizione prodotto', 1, '2023-07-25 13:16:44', '2023-07-25 13:16:44', NULL),
(43, 9, 'Miele Teriyaki Salmone', 'miele-teriyaki-salmone', 'https://www.themealdb.com/images/media/meals/xxyupu1468262513.jpg', 25.74, 'Salmone, Olio d’oliva, Salsa di soia, Sake', 2, 'descrizione prodotto', 1, '2023-07-25 13:16:45', '2023-07-25 13:16:45', NULL),
(44, 31, 'Panino di noci Gužvara', 'panino-di-noci-guzvara-1', 'https://www.themealdb.com/images/media/meals/u9l7k81628771647.jpg', 6.96, 'Farina, Zucchero semolato, Lievito, Sale', 2, 'descrizione prodotto', 1, '2023-07-25 13:16:46', '2023-07-25 13:16:46', NULL),
(45, 50, 'Budino Di Ricotta', 'budino-di-ricotta', 'https://www.themealdb.com/images/media/meals/1549542877.jpg', 15.40, 'Ricotta, Uova, Farina, Zucchero', 3, 'descrizione prodotto', 1, '2023-07-25 13:16:47', '2023-07-25 13:16:47', NULL),
(46, 47, 'Kedgeree', 'kedgeree', 'https://www.themealdb.com/images/media/meals/utxqpt1511639216.jpg', 21.56, 'Eglefino affumicato, Foglie di alloro, Latte, Uova', 4, 'descrizione prodotto', 1, '2023-07-25 13:16:49', '2023-07-25 13:16:49', NULL),
(47, 72, 'Pollo balsamico al miele con broccoli croccanti e patate', 'pollo-balsamico-al-miele-con-broccoli-croccanti-e-patate', 'https://www.themealdb.com/images/media/meals/kvbotn1581012881.jpg', 37.47, 'Patate, Broccoli, Aglio, Petto di pollo', 3, 'descrizione prodotto', 1, '2023-07-25 13:16:50', '2023-07-25 13:16:50', NULL),
(48, 27, 'Tofu Ma Po', 'tofu-ma-po', 'https://www.themealdb.com/images/media/meals/1525874812.jpg', 35.14, 'Tofu, Carni macinate, olio di sesamo, Doubanjiang', 5, 'descrizione prodotto', 1, '2023-07-25 13:16:52', '2023-07-25 13:16:52', NULL),
(49, 54, 'Sushi', 'sushi', 'https://www.themealdb.com/images/media/meals/g046bb1663960946.jpg', 19.27, 'riso per sushi, Vino di Riso, Zucchero semolato, Maionese', 4, 'descrizione prodotto', 1, '2023-07-25 13:16:53', '2023-07-25 13:16:53', NULL),
(50, 15, 'Stufato di gnocco di manzo', 'stufato-di-gnocco-di-manzo', 'https://www.themealdb.com/images/media/meals/uyqrrv1511553350.jpg', 15.43, 'Olio d\'oliva, Burro, Carne bovina, Farina normale', 2, 'descrizione prodotto', 1, '2023-07-25 13:16:54', '2023-07-25 13:16:54', NULL),
(51, 44, 'Fettuccine Alfredo', 'fettuccine-alfredo', 'https://www.themealdb.com/images/media/meals/0jv5gx1661040802.jpg', 2.69, 'Fettuccine, montata, Burro, parmigiano', 2, 'descrizione prodotto', 1, '2023-07-25 13:16:55', '2023-07-25 13:16:55', NULL),
(52, 68, 'Tagliatelle di gamberi reali Laksa', 'tagliatelle-di-gamberi-reali-laksa', 'https://www.themealdb.com/images/media/meals/rvypwy1503069308.jpg', 21.25, 'Olio d\'oliva, Foglie, Pasta di curry rosso tailandese, dado vegetale', 4, 'descrizione prodotto', 1, '2023-07-25 13:16:57', '2023-07-25 13:16:57', NULL),
(53, 3, 'Chocolate Gateau', 'chocolate-gateau', 'https://www.themealdb.com/images/media/meals/tqtywx1468317395.jpg', 15.89, 'Cioccolato semplice, Burro, Latte, Uova', 4, 'descrizione prodotto', 1, '2023-07-25 13:16:59', '2023-07-25 13:16:59', NULL),
(54, 22, 'Hamburger di Tzatziki di agnello', 'hamburger-di-tzatziki-di-agnello', 'https://www.themealdb.com/images/media/meals/k420tj1585565244.jpg', 39.35, 'GRANO SPEZZATO, Tritato di agnello, Cumino, Coriandolo', 5, 'descrizione prodotto', 1, '2023-07-25 13:17:02', '2023-07-25 13:17:02', NULL),
(55, 56, 'Cheesecake al miele e yogurt', 'cheesecake-al-miele-e-yogurt', 'https://www.themealdb.com/images/media/meals/y2irzl1585563479.jpg', 2.29, 'Biscotti digestive, Mandorle, Burro, yogurt greco', 3, 'descrizione prodotto', 1, '2023-07-25 13:17:03', '2023-07-25 13:17:03', NULL),
(56, 56, 'Pollo fritto del Kentucky', 'pollo-fritto-del-kentucky', 'https://www.themealdb.com/images/media/meals/xqusqy1487348868.jpg', 10.15, 'Pollo, Olio, Albume d\'uovo, Farina', 3, 'descrizione prodotto', 1, '2023-07-25 13:17:04', '2023-07-25 13:17:04', NULL),
(57, 4, 'Filetto alla Wellington', 'filetto-alla-wellington', 'https://www.themealdb.com/images/media/meals/vvpprx1487325699.jpg', 39.40, 'funghi, Senape inglese, Olio d\'oliva, Filetto di manzo', 4, 'descrizione prodotto', 1, '2023-07-25 13:17:07', '2023-07-25 13:17:07', NULL),
(58, 56, 'Sunday roast', 'sunday-roast', 'https://www.themealdb.com/images/media/meals/ssrrrs1503664277.jpg', 40.65, 'Carne bovina, Broccoli, Patate, Carote', 3, 'descrizione prodotto', 1, '2023-07-25 13:17:08', '2023-07-25 13:17:08', NULL),
(59, 43, 'Pollo Kung Pao', 'pollo-kung-pao', 'https://www.themealdb.com/images/media/meals/1525872624.jpg', 35.07, 'Sake, Salsa di soia, olio di sesamo, Farina di Mais', 2, 'descrizione prodotto', 1, '2023-07-25 13:17:10', '2023-07-25 13:17:10', NULL),
(60, 4, 'Torta di rabarbaro alla fragola', 'torta-di-rabarbaro-alla-fragola', 'https://www.themealdb.com/images/media/meals/178z5o1585514569.jpg', 30.09, 'Farina, Sale, Zucchero, Burro', 1, 'descrizione prodotto', 1, '2023-07-25 13:17:11', '2023-07-25 13:17:11', NULL),
(61, 53, 'Pizza Express Margherita', 'pizza-express-margherita', 'https://www.themealdb.com/images/media/meals/x0lk931587671540.jpg', 2.94, 'Acqua, Zucchero, Lievito, Farina normale', 5, 'descrizione prodotto', 1, '2023-07-25 13:17:12', '2023-07-25 13:17:12', NULL),
(62, 13, 'Carne di agnello', 'carne-di-agnello', 'https://www.themealdb.com/images/media/meals/yuwtuu1511295751.jpg', 13.27, 'Olio d\'oliva, Cipolla, Carote, Cosciotto di', 5, 'descrizione prodotto', 1, '2023-07-25 13:17:14', '2023-07-25 13:17:14', NULL),
(63, 12, 'Ful', 'ful', 'https://www.themealdb.com/images/media/meals/lvn2d51598732465.jpg', 15.36, 'Fave, Prezzemolo, Olio d\'oliva, Limoni', 2, 'descrizione prodotto', 1, '2023-07-25 13:17:16', '2023-07-25 13:17:16', NULL),
(64, 44, 'Budino natalizio classico', 'budino-natalizio-classico', 'https://www.themealdb.com/images/media/meals/1d85821576790598.jpg', 9.27, 'Mandorle, Mele Bramley, Buccia candita, Noce moscata', 4, 'descrizione prodotto', 1, '2023-07-25 13:17:18', '2023-07-25 13:17:18', NULL),
(65, 16, 'Zuppa di pesce', 'zuppa-di-pesce', 'https://www.themealdb.com/images/media/meals/ysxwuq1487323065.jpg', 9.51, 'Patate Farinate, Olio d\'oliva, Latte parzialmente scremato, Filetti di Pesce Bianco', 3, 'descrizione prodotto', 1, '2023-07-25 13:17:20', '2023-07-25 13:17:20', NULL),
(66, 72, 'Keleya Zaara', 'keleya-zaara', 'https://www.themealdb.com/images/media/meals/8x09hy1560460923.jpg', 13.28, 'Olio d\'oliva, Agnello, Zafferano, Cipolla', 4, 'descrizione prodotto', 1, '2023-07-25 13:17:21', '2023-07-25 13:17:21', NULL),
(67, 3, 'Tagliatelle di gamberi reali Laksa', 'tagliatelle-di-gamberi-reali-laksa-1', 'https://www.themealdb.com/images/media/meals/rvypwy1503069308.jpg', 19.75, 'Olio d\'oliva, Foglie, Pasta di curry rosso tailandese, dado vegetale', 5, 'descrizione prodotto', 1, '2023-07-25 13:17:23', '2023-07-25 13:17:23', NULL),
(68, 4, 'New York cheesecake', 'new-york-cheesecake', 'https://www.themealdb.com/images/media/meals/swttys1511385853.jpg', 34.43, 'Burro, Panna acida, Zucchero, Formaggio spalmabile', 5, 'descrizione prodotto', 1, '2023-07-25 13:17:24', '2023-07-25 13:17:24', NULL),
(69, 47, 'Snert (zuppa olandese di piselli spaccati)', 'snert-zuppa-olandese-di-piselli-spaccati', 'https://www.themealdb.com/images/media/meals/9ptx0a1565090843.jpg', 4.26, 'Acqua, Piselli, Maiale, dado vegetale', 2, 'descrizione prodotto', 1, '2023-07-25 13:17:25', '2023-07-25 13:17:25', NULL),
(70, 1, 'Kapsalon', 'kapsalon', 'https://www.themealdb.com/images/media/meals/sxysrt1468240488.jpg', 33.28, 'Patatine Fritte, Doner Meat, Salsa all\'aglio, Salsa piccante', 3, 'descrizione prodotto', 1, '2023-07-25 13:17:28', '2023-07-25 13:17:28', NULL),
(71, 45, 'New York cheesecake', 'new-york-cheesecake-1', 'https://www.themealdb.com/images/media/meals/swttys1511385853.jpg', 16.35, 'Burro, Panna acida, Zucchero, Formaggio spalmabile', 1, 'descrizione prodotto', 1, '2023-07-25 13:17:29', '2023-07-25 13:17:29', NULL),
(72, 14, 'Budino natalizio classico', 'budino-natalizio-classico-1', 'https://www.themealdb.com/images/media/meals/1d85821576790598.jpg', 10.59, 'Mandorle, Mele Bramley, Buccia candita, Noce moscata', 2, 'descrizione prodotto', 1, '2023-07-25 13:17:30', '2023-07-25 13:17:30', NULL),
(73, 56, 'Torta Parkin', 'torta-parkin', 'https://www.themealdb.com/images/media/meals/qxuqtt1511724269.jpg', 11.15, 'Burro, Uovo, Latte, sciroppo di melassa', 3, 'descrizione prodotto', 1, '2023-07-25 13:17:32', '2023-07-25 13:17:32', NULL),
(74, 20, 'Tarte tatin', 'tarte-tatin', 'https://www.themealdb.com/images/media/meals/rxvxrr1511797671.jpg', 23.16, 'Pere, Zucchero semolato, Burro, Anice stellato', 1, 'descrizione prodotto', 1, '2023-07-25 13:17:33', '2023-07-25 13:17:33', NULL),
(75, 46, 'Bigos (Stufato dei Cacciatori)', 'bigos-stufato-dei-cacciatori', 'https://www.themealdb.com/images/media/meals/md8w601593348504.jpg', 21.94, 'Bacon, Kiełbasa, Maiale, Farina', 5, 'descrizione prodotto', 1, '2023-07-25 13:17:35', '2023-07-25 13:17:35', NULL),
(76, 54, 'Carne di agnello', 'carne-di-agnello-1', 'https://www.themealdb.com/images/media/meals/yuwtuu1511295751.jpg', 5.76, 'Olio d\'oliva, Cipolla, Carote, Cosciotto di', 3, 'descrizione prodotto', 1, '2023-07-25 13:17:38', '2023-07-25 13:17:38', NULL),
(77, 61, 'Bigos (Stufato dei Cacciatori)', 'bigos-stufato-dei-cacciatori-1', 'https://www.themealdb.com/images/media/meals/md8w601593348504.jpg', 39.41, 'Bacon, Kiełbasa, Maiale, Farina', 5, 'descrizione prodotto', 1, '2023-07-25 13:17:40', '2023-07-25 13:17:40', NULL),
(78, 23, 'Pomodoro d\'agnello e spezie dolci', 'pomodoro-dagnello-e-spezie-dolci', 'https://www.themealdb.com/images/media/meals/qtwtss1468572261.jpg', 28.92, 'olio d\'oliva, zenzero, aglio, Pomodori', 2, 'descrizione prodotto', 1, '2023-07-25 13:17:42', '2023-07-25 13:17:42', NULL),
(79, 45, '_Soufflet_ di cioccolata', 'soufflet-di-cioccolata', 'https://www.themealdb.com/images/media/meals/twspvx1511784937.jpg', 33.17, 'Crema magra, Zucchero semolato, Cioccolato fondente, Burro', 2, 'descrizione prodotto', 1, '2023-07-25 13:17:44', '2023-07-25 13:17:44', NULL),
(80, 52, 'Pollo fritto del Kentucky', 'pollo-fritto-del-kentucky-1', 'https://www.themealdb.com/images/media/meals/xqusqy1487348868.jpg', 29.25, 'Pollo, Olio, Albume d\'uovo, Farina', 2, 'descrizione prodotto', 1, '2023-07-25 13:17:45', '2023-07-25 13:17:45', NULL),
(81, 50, 'pad see ew', 'pad-see-ew', 'https://www.themealdb.com/images/media/meals/uuuspp1468263334.jpg', 16.39, 'spaghetti ai bastoncini di riso, Salsa di soia., Salsa di ostriche, salsa di soia', 2, 'descrizione prodotto', 1, '2023-07-25 13:17:46', '2023-07-25 13:17:46', NULL),
(82, 35, 'Torta di prosciutto e porro di pollo', 'torta-di-prosciutto-e-porro-di-pollo-1', 'https://www.themealdb.com/images/media/meals/xrrtss1511555269.jpg', 14.56, 'Brodo di pollo, Petto di pollo, Burro, Porro', 2, 'descrizione prodotto', 1, '2023-07-25 13:17:47', '2023-07-25 13:17:47', NULL),
(83, 53, 'Rocky Road Fudge', 'rocky-road-fudge', 'https://www.themealdb.com/images/media/meals/vtxyxv1483567157.jpg', 4.43, 'Marshmallow in miniatura, Gocce di cioccolato, Burro di arachidi, Estratto di vaniglia', 4, 'descrizione prodotto', 1, '2023-07-25 13:17:49', '2023-07-25 13:17:49', NULL),
(84, 65, 'Katsu Chicken curry', 'katsu-chicken-curry', 'https://www.themealdb.com/images/media/meals/vwrpps1503068729.jpg', 39.91, 'petto di pollo, Farina normale, uovo, breadcrumbs', 4, 'descrizione prodotto', 1, '2023-07-25 13:17:51', '2023-07-25 13:17:51', NULL),
(85, 9, 'Crostata di Frangipani alla Mela', 'crostata-di-frangipani-alla-mela', 'https://www.themealdb.com/images/media/meals/wxywrq1468235067.jpg', 36.25, 'Biscotti digestive, burro, Mele Bramley, burro ammorbidito', 1, 'descrizione prodotto', 1, '2023-07-25 13:17:53', '2023-07-25 13:17:53', NULL),
(86, 60, 'Panino di noci Gužvara', 'panino-di-noci-guzvara-2', 'https://www.themealdb.com/images/media/meals/u9l7k81628771647.jpg', 16.78, 'Farina, Zucchero semolato, Lievito, Sale', 4, 'descrizione prodotto', 1, '2023-07-25 13:17:54', '2023-07-25 13:17:54', NULL),
(87, 60, 'Filetto Stroganoff', 'filetto-stroganoff', 'https://www.themealdb.com/images/media/meals/svprys1511176755.jpg', 3.34, 'Olio d\'oliva, Cipolle, Aglio, Burro', 5, 'descrizione prodotto', 1, '2023-07-25 13:17:55', '2023-07-25 13:17:55', NULL),
(88, 64, 'Riso Gohan giapponese', 'riso-gohan-giapponese', 'https://www.themealdb.com/images/media/meals/kw92t41604181871.jpg', 1.61, 'riso per sushi, Mirin, Succo di sottaceto, Cipolline', 2, 'descrizione prodotto', 1, '2023-07-25 13:17:57', '2023-07-25 13:17:57', NULL),
(89, 37, 'Snert (zuppa olandese di piselli spaccati)', 'snert-zuppa-olandese-di-piselli-spaccati-1', 'https://www.themealdb.com/images/media/meals/9ptx0a1565090843.jpg', 5.77, 'Acqua, Piselli, Maiale, dado vegetale', 4, 'descrizione prodotto', 1, '2023-07-25 13:17:58', '2023-07-25 13:17:58', NULL),
(90, 3, 'Fatteh egiziano', 'fatteh-egiziano', 'https://www.themealdb.com/images/media/meals/rlwcc51598734603.jpg', 2.15, 'Carne bovina, Cipolla, Brodo, Pomodori', 3, 'descrizione prodotto', 1, '2023-07-25 13:17:59', '2023-07-25 13:17:59', NULL),
(91, 7, 'Pancakes', 'pancakes', 'https://www.themealdb.com/images/media/meals/rwuyqx1511383174.jpg', 18.96, 'Farina, Uova, Latte, Olio di Girasole', 1, 'descrizione prodotto', 1, '2023-07-25 13:18:01', '2023-07-25 13:18:01', NULL),
(92, 49, 'Baingan Bharta', 'baingan-bharta', 'https://www.themealdb.com/images/media/meals/urtpqw1487341253.jpg', 11.91, 'Melanzana, Cipolla, Pomodori, Aglio', 5, 'descrizione prodotto', 1, '2023-07-25 13:18:03', '2023-07-25 13:18:03', NULL),
(93, 38, 'Toad in a hole&#10;', 'toad-in-a-hole10', 'https://www.themealdb.com/images/media/meals/ytuvwr1503070420.jpg', 9.76, 'salsicce, olio vegetale, Farina normale, uova', 2, 'descrizione prodotto', 1, '2023-07-25 13:18:04', '2023-07-25 13:18:04', NULL),
(94, 59, 'Torta di tre pesci', 'torta-di-tre-pesci', 'https://www.themealdb.com/images/media/meals/spswqs1511558697.jpg', 17.95, 'Patate, Burro, Latte, Gruyère', 1, 'descrizione prodotto', 1, '2023-07-25 13:18:05', '2023-07-25 13:18:05', NULL),
(95, 26, 'Lancashire hotpot', 'lancashire-hotpot', 'https://www.themealdb.com/images/media/meals/uttrxw1511637813.jpg', 28.83, 'Burro, Agnello, Rene di Agnello, Cipolle', 5, 'descrizione prodotto', 1, '2023-07-25 13:18:07', '2023-07-25 13:18:07', NULL),
(96, 7, 'Curry verde tailandese', 'curry-verde-tailandese', 'https://www.themealdb.com/images/media/meals/sstssx1487349585.jpg', 10.66, 'Patate, fagiolini, olio di semi di girasole, aglio', 1, 'descrizione prodotto', 1, '2023-07-25 13:18:08', '2023-07-25 13:18:08', NULL),
(97, 70, 'Budino di pane e burro', 'budino-di-pane-e-burro', 'https://www.themealdb.com/images/media/meals/xqwwpy1483908697.jpg', 35.07, 'burro, pane, UVA SULTANINA, cannella', 3, 'descrizione prodotto', 1, '2023-07-25 13:18:11', '2023-07-25 13:18:11', NULL),
(98, 49, 'Zuppa cremosa di pomodoro', 'zuppa-cremosa-di-pomodoro', 'https://www.themealdb.com/images/media/meals/stpuws1511191310.jpg', 8.69, 'Olio d\'oliva, Cipolle, Sedano, Carote', 4, 'descrizione prodotto', 1, '2023-07-25 13:18:12', '2023-07-25 13:18:12', NULL),
(99, 40, 'Arrosto in pentola con petto di manzo', 'arrosto-in-pentola-con-petto-di-manzo', 'https://www.themealdb.com/images/media/meals/ursuup1487348423.jpg', 32.18, 'Fesa di Manzo, Sale, Cipolla, Aglio', 2, 'descrizione prodotto', 1, '2023-07-25 13:18:13', '2023-07-25 13:18:13', NULL),
(100, 28, 'Maiale alla brace portoghese (Febras assadas)', 'maiale-alla-brace-portoghese-febras-assadas', 'https://www.themealdb.com/images/media/meals/cybyue1614349443.jpg', 28.05, 'Maiale, Vino bianco, Paprica, Limone', 4, 'descrizione prodotto', 1, '2023-07-25 13:18:15', '2023-07-25 13:18:15', NULL),
(101, 43, 'Battenberg cake', 'battenberg-cake', 'https://www.themealdb.com/images/media/meals/ywwrsp1511720277.jpg', 31.52, 'Burro, Zucchero semolato, farina autolievitante, Mandorle', 4, 'descrizione prodotto', 1, '2023-07-25 13:18:17', '2023-07-25 13:18:17', NULL),
(102, 12, 'Tortang Talong', 'tortang-talong', 'https://www.themealdb.com/images/media/meals/va668f1683209318.jpg', 21.72, 'Piante d\'uovo, Uova, Sale, Olio d\'oliva', 5, 'descrizione prodotto', 1, '2023-07-25 13:18:18', '2023-07-25 13:18:18', NULL),
(103, 33, 'Adobo di melanzane', 'adobo-di-melanzane', 'https://www.themealdb.com/images/media/meals/y7h0lq1683208991.jpg', 34.80, 'Piante d\'uovo, Zucchero, Sale, Pepe', 2, 'descrizione prodotto', 1, '2023-07-25 13:18:20', '2023-07-25 13:18:20', NULL),
(104, 70, 'Budino natalizio classico', 'budino-natalizio-classico-2', 'https://www.themealdb.com/images/media/meals/1d85821576790598.jpg', 19.45, 'Mandorle, Mele Bramley, Buccia candita, Noce moscata', 2, 'descrizione prodotto', 1, '2023-07-25 13:18:21', '2023-07-25 13:18:21', NULL),
(105, 57, 'Zuppa di vongole', 'zuppa-di-vongole', 'https://www.themealdb.com/images/media/meals/rvtvuw1511190488.jpg', 24.28, 'Vongole, Burro, Bacon, Cipolla', 4, 'descrizione prodotto', 1, '2023-07-25 13:18:22', '2023-07-25 13:18:22', NULL),
(106, 18, 'Bistek', 'bistek', 'https://www.themealdb.com/images/media/meals/4pqimk1683207418.jpg', 33.99, 'Carne bovina, Salsa di soia, Limone, Aglio', 2, 'descrizione prodotto', 1, '2023-07-25 13:18:24', '2023-07-25 13:18:24', NULL),
(107, 45, 'Rendang di manzo', 'rendang-di-manzo', 'https://www.themealdb.com/images/media/meals/bc8v651619789840.jpg', 25.68, 'Carne bovina, Olio vegetale, Bastoncino di cannella, Chiodi di garofano', 4, 'descrizione prodotto', 1, '2023-07-25 13:18:26', '2023-07-25 13:18:26', NULL),
(108, 56, 'Patate da colazione', 'patate-da-colazione', 'https://www.themealdb.com/images/media/meals/1550441882.jpg', 33.10, 'Patate, Olio d\'oliva, Bacon, Spicchio d\'aglio', 4, 'descrizione prodotto', 1, '2023-07-25 13:18:27', '2023-07-25 13:18:27', NULL),
(109, 44, 'Torta Bakewell', 'torta-bakewell', 'https://www.themealdb.com/images/media/meals/wyrqqq1468233628.jpg', 19.96, 'Farina normale, burro refrigerato, acqua fredda, marmellata di lamponi', 5, 'descrizione prodotto', 1, '2023-07-25 13:18:30', '2023-07-25 13:18:30', NULL),
(110, 58, 'Torta vegana al cioccolato', 'torta-vegana-al-cioccolato', 'https://www.themealdb.com/images/media/meals/qxutws1486978099.jpg', 6.28, 'farina autolievitante, zucchero di cocco, CACAO, lievito in polvere', 2, 'descrizione prodotto', 1, '2023-07-25 13:18:31', '2023-07-25 13:18:31', NULL),
(111, 16, 'Baingan Bharta', 'baingan-bharta-1', 'https://www.themealdb.com/images/media/meals/urtpqw1487341253.jpg', 26.22, 'Melanzana, Cipolla, Pomodori, Aglio', 4, 'descrizione prodotto', 1, '2023-07-25 13:18:33', '2023-07-25 13:18:33', NULL),
(112, 57, 'Callaloo Giamaican Style', 'callaloo-giamaican-style', 'https://www.themealdb.com/images/media/meals/ussyxw1515364536.jpg', 28.94, 'Cavoli ricci, Bacon, Aglio, Cipolla', 3, 'descrizione prodotto', 1, '2023-07-25 13:18:34', '2023-07-25 13:18:34', NULL),
(113, 75, 'Formaggio spalmabile ', 'formaggio-spalmabile', 'https://www.themealdb.com/images/media/meals/wurrux1468416624.jpg', 32.39, 'Farina, Burro, Uovo, Sale', 5, 'descrizione prodotto', 1, '2023-07-25 13:18:35', '2023-07-25 13:18:35', NULL),
(114, 41, 'Mee goreng mamak', 'mee-goreng-mamak-1', 'https://www.themealdb.com/images/media/meals/xquakq1619787532.jpg', 29.21, 'Arachidi, Peperoncino, Gamberi, Olio', 3, 'descrizione prodotto', 1, '2023-07-25 13:18:36', '2023-07-25 13:18:36', NULL),
(115, 16, 'Budino natalizio classico', 'budino-natalizio-classico-3', 'https://www.themealdb.com/images/media/meals/1d85821576790598.jpg', 9.48, 'Mandorle, Mele Bramley, Buccia candita, Noce moscata', 2, 'descrizione prodotto', 1, '2023-07-25 13:18:37', '2023-07-25 13:18:37', NULL),
(116, 5, 'Kumpir', 'kumpir', 'https://www.themealdb.com/images/media/meals/mlchx21564916997.jpg', 6.40, 'Patate, Burro, Formaggio, Cipolla', 4, 'descrizione prodotto', 1, '2023-07-25 13:18:38', '2023-07-25 13:18:38', NULL),
(117, 19, 'Garides Saganaki', 'garides-saganaki', 'https://www.themealdb.com/images/media/meals/wuvryu1468232995.jpg', 2.95, 'Crudo di gamberoni, Olio d’oliva, cipolla tritata, Prezzemolo tritato fresco', 3, 'descrizione prodotto', 1, '2023-07-25 13:18:40', '2023-07-25 13:18:40', NULL),
(118, 37, 'Rosół (zuppa di pollo polacco)', 'rosol-zuppa-di-pollo-polacco', 'https://www.themealdb.com/images/media/meals/lx1kkj1593349302.jpg', 27.68, 'Quarti posteriori di pollo, Cipolle, Carote, Porro', 3, 'descrizione prodotto', 1, '2023-07-25 13:18:41', '2023-07-25 13:18:41', NULL),
(119, 9, 'Carne di agnello', 'carne-di-agnello-2', 'https://www.themealdb.com/images/media/meals/yuwtuu1511295751.jpg', 25.96, 'Olio d\'oliva, Cipolla, Carote, Cosciotto di', 3, 'descrizione prodotto', 1, '2023-07-25 13:18:43', '2023-07-25 13:18:43', NULL),
(120, 17, 'Hock colcannon al prosciutto', 'hock-colcannon-al-prosciutto', 'https://www.themealdb.com/images/media/meals/n41ny81608588066.jpg', 8.06, 'Patate Farinate, Burro, Spicchio d\'aglio, Verza', 4, 'descrizione prodotto', 1, '2023-07-25 13:18:45', '2023-07-25 13:18:45', NULL);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dishes_slug_unique` (`slug`),
  ADD KEY `dishes_restaurant_id_foreign` (`restaurant_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
