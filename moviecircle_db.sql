-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost
-- Timp de generare: sept. 09, 2020 la 12:48 PM
-- Versiune server: 5.7.31-0ubuntu0.16.04.1
-- Versiune PHP: 7.3.6-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `moviecircle_db`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci,
  `usertype_id` int(11) DEFAULT NULL,
  `logged` int(11) DEFAULT NULL,
  `etoken` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci,
  `profile_pic` text COLLATE utf8mb4_unicode_ci,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `documents_validated` int(11) DEFAULT NULL,
  `prove_document` text COLLATE utf8mb4_unicode_ci,
  `company_name` text COLLATE utf8mb4_unicode_ci,
  `company_registration` text COLLATE utf8mb4_unicode_ci,
  `company_address` text COLLATE utf8mb4_unicode_ci,
  `account_verified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `email`, `phone`, `location`, `usertype_id`, `logged`, `etoken`, `created_at`, `updated_at`, `password`, `profile_pic`, `short_description`, `documents_validated`, `prove_document`, `company_name`, `company_registration`, `company_address`, `account_verified`) VALUES
(17, 'Petrica Closcaru', 'petryca.95@gmail.com', '0747193218', 'Constanta, Romania', 1, 1, NULL, '2020-04-28 09:52:15', '2020-08-19 11:27:25', '$2y$10$nArW05.wo5bBaJN8qLK5DuNuZp8UuT7swlSjdN60alqH9Bxjnke0e', '[{\"download_link\":\"avatars\\/17\\/avatar_2020-05-07 10:24:48.jpeg\",\"original_name\":\"avatar_2020-05-07 10:24:48.jpeg\"}]', 'This is just a short description!', 1, '[{\"download_link\":\"producer_documents\\/17\\/producer_doc5ec5146262e3a.pdf\",\"original_name\":\"producer_doc5ec5146262e3a.pdf\"}]', 'TouchMedia', 'RO1231234', 'Bdul Mamaia nr 152', 1),
(18, 'Alexandru Angheliu', 'office@touch-media.ro', '0755690002', NULL, 3, 1, NULL, '2020-04-30 13:20:27', '2020-05-06 08:10:34', '$2y$10$.W2RAmjxuu.caLRvNcgIr.NqCClraAnzZEkeIbk580lrXdq1DieOe', '[]', NULL, 0, '[{\"download_link\":\"accounts\\/May2020\\/7jzrm8K948q38Yt3LXzw.pdf\",\"original_name\":\"declaratie_nebifata_Petrica (1).pdf\"}]', NULL, NULL, NULL, 1),
(19, 'John Stephan', 'petrica@touch-media.ro', '++1231231234', 'Constanța, România', 3, 1, NULL, '2020-05-18 12:24:10', '2020-09-08 06:33:21', '$2y$10$xqB0DVlG21f1N5SvbR5iKuRpZo5qfceLoitxeYw9HsioZaiCihAeC', '[{\"download_link\":\"avatars\\/19\\/avatar_2020-09-08 05:40:20.jpeg\",\"original_name\":\"avatar_2020-09-08 05:40:20.jpeg\"}]', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(20, 'Philip Perez', 'philippereztrade@gmail.com', '+49 15154875048', 'Düsseldorf', 3, 1, NULL, '2020-06-09 16:25:20', '2020-08-26 13:55:47', '$2y$10$nixTWmJicnU1pucjZaUW9OaNjSVbscigbL/alumu7y2h3mXPgJoty', '[{\"download_link\":\"avatars\\/20\\/avatar_2020-08-26 13:54:05.jpeg\",\"original_name\":\"avatar_2020-08-26 13:54:05.jpeg\"}]', 'Hello!\r\n\r\nim Philip Perez. Co-Owner of Movie Circle Ltd. and YAVU GmbH. I really passioned about music and martial arts. I love to build ideas.', NULL, NULL, NULL, NULL, NULL, 1),
(21, 'Ira Yasmin Lehmann', 'info@yavu.de', '0049157-30226070', 'Düsseldorf, Germany', 3, 0, NULL, '2020-06-09 16:39:15', '2020-09-03 14:30:39', '$2y$10$Lc65Kjjha6HCcjP6HClxz.U2RzyG8UEA.gM/GhCuGxGkZd9oLmOcK', '[{\"download_link\":\"avatars\\/21\\/avatar_2020-08-26 09:01:31.png\",\"original_name\":\"avatar_2020-08-26 09:01:31.png\"}]', 'Test', NULL, NULL, NULL, NULL, NULL, 1),
(22, 'Ira Yasmin Lehmann', 'office@yavu.de', '0157-30226070', NULL, 1, 0, NULL, '2020-06-09 17:09:58', '2020-06-23 20:58:58', '$2y$10$EmtJVDksZWabKS2hZ97Ose6a5zMJ.tgQg7mAMLEInqsSXqM6MHatq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(23, 'TEST', 'biwatic877@uxdes54.com', '015154875048', NULL, 1, 0, NULL, '2020-06-10 17:03:59', '2020-07-11 08:48:41', '$2y$10$T0YMwmfQrW9UrFkY2l9WPuS5T2NYYpBHJfn9mo8Gflw9MmHY1M2WC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(24, 'Max', 'yfoiuavowabp@dropmail.me', '015154875048', NULL, 2, 0, NULL, '2020-06-10 17:11:06', '2020-06-24 14:59:30', '$2y$10$a9KdP8PLRoN7QXqdNG8lhOoJc22H9QsQ4BnFyPKmNu6mtDqFf/IBy', '[{\"download_link\":\"avatars\\/24\\/avatar_2020-06-23 21:03:25.png\",\"original_name\":\"avatar_2020-06-23 21:03:25.png\"}]', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(33, 'Philip Perez', 'philipperetrade@gmail.com', '015154875048', NULL, 3, 0, 'eyJpdiI6IlBhY3FzUmllUjM2UElmZThUdmpsQ1E9PSIsInZhbHVlIjoiOHVNL1Q0ZFA2aFNOY3lzeU80VjNVZUNZL0pQbUoybUxCZmNORWV5eWhCU0xuRjNwNWcyU0pqcG50STk2TjFzLzRvaVFuVzY5S055eklmU2lvSE14V1E9PSIsIm1hYyI6IjZkODg2MDc0YTAxMjM3NzgyOTM3Nzc2NjNkNGNkYWRjMjY4NWJkN2RlMGE1MDRlNTdmMmE5NDBlNmMyMjhhYjUifQ==', '2020-06-22 11:29:02', '2020-06-22 11:29:02', '$2y$10$gYLdoWM6jRl7laQk5f0I4uQ33Bc.mJU0XD9iMDTXI984FLyHcz9G6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(35, 'Petrica Closcaru', 'petrica@touch-media.ro', '1231231234', NULL, 2, 1, NULL, '2020-06-23 11:17:54', '2020-09-07 15:01:15', '$2y$10$FMQD7KLr2fUsIdceQY9lleJx7KK4HKfqUOQOOS3NvifZU.tjss3Ai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(36, 'default', 'wapiti2019@mailinator.com', 'default', NULL, 3, 0, 'eyJpdiI6Ik4ybUZxQmlZMjU5RVQySmhGTUJ4UWc9PSIsInZhbHVlIjoidU9wRCtCWmQ4ay9nUkhtT3dHQTArc2NheG9aS3hCRlNFSGZKM1NqdnVlWCsyYjZBNDVLdzB0b1UwaWFjalNmb0VabnA1bnBKWnU0ak5MbmJ0Uit4dWc9PSIsIm1hYyI6Ijg2Mzg1ODA3NzJhYzhmNzQ1NzE5ODYzZjllMTA3NGIwNjQxMTA0Zjk0YzZjMGE5ZjJkYWVjZWQyNTQ0MmNjNTEifQ==', '2020-07-29 17:38:04', '2020-07-29 17:38:04', '$2y$10$GODXa15UWLSpTD8d63SJ6.lIOD1JfGDz2yjdsEvO3RvBciQrr/hCO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(37, 'dasdasdasd', 'test@test.com123', '7483123123', NULL, 3, 0, 'eyJpdiI6Im5wb1pXVkkzRTc4Vm9FYUh5UnZ6WGc9PSIsInZhbHVlIjoiZGpkYzZWVWJISjducWtkV0hqdVJIZElKRzJ2QUdXazF4MXJsRWJaeWlHUkVvTHRTZ1Y5VlNQanI1NlliNEhIa3F1TFg3bDQ5bmdWWE9wSU9OQ3cxQXc9PSIsIm1hYyI6ImVmMDZhOWM4NmI0ZjgxNWZkZDgyZDA4MjliYjUyOWZlZmQyYTczZGUzYzA1YWM0NWIxMTk2ZGQxOGJkOWMyMGYifQ==', '2020-08-27 15:32:23', '2020-08-27 15:32:23', '$2y$10$ykAxjt55mT.FFItzSkt5guXqE.YVOg1SV2dK3Ngaik4Z2GjMRa5Au', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(38, 'Nero Latin', 'kal-lvi@hotmail.com', '015154875048', NULL, 3, 0, NULL, '2020-08-28 11:29:09', '2020-08-28 11:36:13', '$2y$10$F9Xi4aZkDtHL0FCR2yGCjOcTwmhtuBs8wihsTe79ykTvGllr28pzK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(39, 'Patrick Heimansberg', 'patrick.heimansberg@gmail.com', '++4915730199294', 'Düsseldorf, Germany', 3, 1, NULL, '2020-09-02 08:11:35', '2020-09-09 07:41:39', '$2y$10$/Bw/vs371XVx6IBdT.cHHeP1lTh5okIqbNaiZdqCBFwYWlszgv40W', NULL, 'Komischer Dude.', NULL, NULL, NULL, NULL, NULL, 1),
(40, 'Musa Güresin', 'gueresinmusa@outlook.de', '017662029295', NULL, 3, 0, 'eyJpdiI6IjlzaTd5UVIzMzd2MHZYa1lMODlNY3c9PSIsInZhbHVlIjoiTWNiZFhvRDNyNmhZRmdQTHlOWW9sbFRrM0hLNjdoeGlZTEdJZXpSYlMxemJiNnJCQ2xJdmZTKzhuOFMwanNGbnFoSTU1dm1WSnRnWmlMYVZOa3Jlamc9PSIsIm1hYyI6IjI0ZGUxMmEyNTgyYzE5MDE5ZDNmNzA3ODgxNDI2NWFiYmI2NjU1MmY4MTgyMDIzMzMwNjAwMjc1YWI5MzkyZTEifQ==', '2020-09-03 15:21:21', '2020-09-03 15:21:21', '$2y$10$1WxrAXvA4P6QIvGL2pBJeenkk/KQTsvzlaQgYK0mRXyD003mpQ9Ty', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `account_subtypes`
--

CREATE TABLE `account_subtypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `default_inputs` text COLLATE utf8mb4_unicode_ci,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `skills` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `background_image` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `account_subtypes`
--

INSERT INTO `account_subtypes` (`id`, `name`, `created_at`, `updated_at`, `description`, `icon`, `default_inputs`, `tags`, `skills`, `order`, `parent_id`, `background_image`) VALUES
(1, 'Item', '2020-05-12 13:03:00', '2020-09-08 13:50:01', 'We are sure that in this field of services there are a lot of other items. Add here.', 'account-subtypes/May2020/nOmhWmFmOXranDDjOexK.png', '[]', '[\"Clothing\",\"Countrywear\",\"Footwear\",\"Accessories\",\"Hats\",\"Umbrellas\",\"Shoes\",\"Headdress\",\"Wigs\",\"Snow Machine\",\"Fog Machine\",\"Cars\",\"Flowers\",\"Drinks\",\"Food\",\"Furniture\",\"Gituar\",\"musical instrument\",\"Piano\",\"Catering\",\"Shuttle Service\",\"Taxi\",\"Hostels\",\"Hotel\"]', '[]', 2, NULL, 'account-subtypes/July2020/L5atqVX08eKLNpF4gROB.png'),
(2, 'Crew', '2020-05-12 13:03:00', '2020-08-25 16:28:00', 'Tehnicians, camera man,and other important resources.', 'account-subtypes/May2020/8eiC3X9BXpo5qckLO187.png', '[]', '[\"camera assistants\",\"cinematographers\",\"Production Directories\",\"The Filmmaker\\u2019s Handbook\",\"The Grip Book\",\"Line producer\",\"Production assistant\",\"Production manager\",\"Assistant production manager\",\"Unit manager\",\"Production coordinator\",\"First assistant director\",\"Second assistant director\",\"Other assistant directors\",\"Production accountant\",\"Location manager\",\"Assistant location manager\",\"Location scout\",\"Location assistant\",\"Location production assistant\",\"Unit publicist\",\"Legal counsel\",\"System administrator\",\"Script supervisor\",\"Camera operator\",\"First assistant camera\",\"Second assistant camera\",\"Film loader\",\"Camera production assistant\",\"Steadicam operator\",\"Motion control technician\\/Operator\",\"Gaffer\",\"Dolly grip\",\"Production sound mixer\",\"Boom operator\",\"Second assistant sound\",\"Production designer\",\"Assistant art director\",\"Set decorator\",\"Set dresser\",\"Construction coordinator\",\"Propmaster\",\"Costume designer\",\"Costume supervisor\",\"Key costumer\",\"Costume standby\",\"Key make-up artist\",\"Stunt coordinator\",\"Film editor\",\"Negative cutterVisual effects producer\",\"Compositor\",\"Sound designer\",\"Sound editorDialogue editor\",\"Conductor\\/ orchestrator\"]', '[]', 6, NULL, 'account-subtypes/July2020/wOBmw4HFz0oxfqk2PIkb.png'),
(3, 'Animal', '2020-05-12 13:03:00', '2020-08-25 16:28:00', 'Birds,  wild animals, pets,strange animals, reptiles and more.', 'account-subtypes/May2020/nzSt4wv76odrYyjzQcYv.png', '[{\"title\":\"Hight\",\"description\":\"Size in cm\",\"value\":\"\"},{\"title\":\"Species\",\"description\":\"e.g. dog, cat, bird\",\"value\":\"\"},{\"title\":\"Breed\",\"description\":\"e.g. shepherd for dogs\",\"value\":\"\"},{\"title\":\"Color\",\"description\":\"e.g. black, white\",\"value\":\"\"},{\"title\":\"Age\",\"description\":\"How old is your animal?\",\"value\":\"\"},{\"title\":\"Acting experience\",\"description\":\"How many Projects?\",\"value\":\"\"},{\"title\":\"Mind\",\"description\":\"Whats the character?\",\"value\":\"\"},{\"title\":\"Talents & Skills\",\"description\":\"e.g. dancing\",\"value\":\"\"},{\"title\":\"Others\",\"description\":\"Anything that comes to your mind\",\"value\":\"\"},{\"title\":\"Spezies\",\"description\":\"z.b Hund, Pferd, Kamel\",\"value\":\"\"},{\"title\":\"Rasse\",\"description\":\"z.b Sch\\u00e4ferhund, Vollblut\",\"value\":\"\"}]', '[\"Tiger\",\"Cats\",\"Dogs\",\"Lion\",\"Giraffe\",\"Hamster\",\"Mouse\",\"Panda\",\"Chimpanzee\",\"Squirrel\",\"Walrus\",\"Kangaroo\",\"Horse\",\"Monkey\",\"Cow\",\"Koala\",\"Leopard\",\"Sheep\",\"Deer\",\"Pig\",\"Crow\",\"Peacock\",\"Sparrow\",\"Goose\",\"Raven\",\"Flamingo\",\"Seagull\",\"Penguin\",\"Robin\",\"Swan\",\"Bear\",\"Snake\",\"Gorilla\",\"Badger\",\"Lizard\",\"Rabbit\",\"Antelope\",\"Shark\",\"Goldfish\",\"Zebra\",\"Elk\",\"Octopus\"]', '[\"Jumping\",\"Performing\",\"Balancing\",\"Tricks\",\"Nonagression\",\"Sozializated\",\"Dog Sports\",\"Training techniques\",\"Vocalization\",\"Canine\",\"Equine\",\"Wild\",\"Special\",\"Competing\",\"Animal agility\",\"Horse training\",\"Equestrian\",\"Horse showing\",\"Operant conditioning\",\"Clicker training\",\"Positive reinforcement\",\"Companion bird training\",\"Circus elephant training\",\"Dressage horse training\",\"Show dog training\",\"Companion dog training\",\"Service animals\"]', 5, NULL, 'account-subtypes/July2020/dVpoPBKRKV1IHwCTO8B6.png'),
(4, 'Actor', '2020-05-12 13:03:00', '2020-08-25 16:28:00', 'You can add an actor or if you are one you can build your profile.', 'account-subtypes/May2020/QKHu8RjxQ4DNkO1k7UaG.png', '[{\"title\":\"Body height\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"Weight\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"Stature\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"Ethn. appearance\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"Hair color\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"Hair length\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"Eyes color\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"Nationality\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"Skin Color\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"Dialects\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"Pitch of the voice\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"Singing\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"Instruments\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"Preffered work area\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"Immediate place of work\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"Federal state (1st residence)\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"2nd residence\",\"description\":\"complete for better results\",\"value\":\"\"},{\"title\":\"Accommodation\",\"description\":\"complete for better results\",\"value\":\"\"}]', '[\"Horror\",\"Karate movies\",\"ZEN\",\"Comedy\",\"Animation\",\"Drama\",\"Hero\",\"Innocent\",\"Regular Guy\",\"The Explorer\",\"The Outlaw\",\"The Magician\",\"The Lover\",\"THE CAREGIVER\",\"THE CREATOR\",\"THE JESTER\",\"THE RULER\",\"Absurdist\\/surreal\\/whimsical\",\"Action\",\"Adventure\",\"Crime\",\"Fantasy\",\"Historical\",\"Historical fiction\",\"Magical realism\",\"Mystery\",\"Paranoid fiction\",\"Philosophical\",\"Political\",\"Romance\",\"Saga\",\"Satire\",\"Science fiction\",\"Social\",\"Speculative\",\"Thriller\",\"Urban\",\"Western\"]', '[\"Swimming\",\"Kyokushin Karate\",\"Judo\",\"Fitness instructor\",\"Running\"]', 1, NULL, 'account-subtypes/July2020/Gp6PoeaeEq56Dc707b9O.png'),
(5, 'Profile', '2020-05-12 13:03:00', '2020-08-25 16:28:00', 'You can add an profile.', 'account-subtypes/May2020/aAwNdh01xGEIY816X0zl.png', '[]', '[]', '[]', 4, NULL, 'account-subtypes/July2020/z6wJBqGjJVbgwgCoSlwK.png'),
(6, 'Project', '2020-05-12 13:03:00', '2020-08-25 16:28:00', 'You can add an project.', 'account-subtypes/May2020/opSiLYQVnHtJXFjOHxoo.png', '[]', '[]', '[]', 3, NULL, 'account-subtypes/July2020/i9fTU8qB388oVk8VSfja.png'),
(7, 'Location', '2020-05-18 09:10:00', '2020-08-25 16:28:06', 'Add an Location.', 'account-subtypes/May2020/P1iPA239lBYbk2SUMPVM.png', '[]', '[\"Penthouse\",\"House\",\"Flat\",\"Maisonette\",\"Castle\",\"Vila\",\"Farm\",\"Ranch\",\"Sea\",\"Field\",\"Flowerfield\",\"Skyscratcher\",\"Apartment\",\"Loft\",\"Atelier\",\"Plant\",\"Mill\",\"Factory\",\"Hospital\",\"Clinic\",\"Praxis\",\"Studio\",\"Office\",\"Wood\",\"River\",\"Boat\",\"Coast\"]', '[\"Nature\",\"Dark\",\"Sunny\",\"Luxury\",\"Production\",\"Open\",\"Historical\",\"Modern\",\"New\",\"Fresh\"]', 1, 1, 'account-subtypes/July2020/09rcUhPctawDXJGRj4rC.png'),
(8, 'Vehicle', '2020-07-24 10:05:00', '2020-08-25 16:28:06', 'This is just a short description', 'account-subtypes/July2020/1GkEDgQRy0kOZG6jyxXL.png', '[]', '[\"test\",\"testare\"]', '[]', 2, 1, 'account-subtypes/July2020/9mfFZWTkfhACCEMJrnaS.png'),
(9, 'Influencer', '2020-07-27 14:12:00', '2020-09-03 12:47:05', '', NULL, '[{\"title\":\"hgf\",\"description\":\"jhgfd\",\"value\":\"hgf\"}]', '[]', '[]', 1, 4, NULL),
(10, 'Villa', '2020-07-27 14:16:05', '2020-07-27 14:16:14', '', NULL, '[]', '[]', '[]', 1, 7, NULL),
(11, 'Boot', '2020-08-25 16:27:26', '2020-08-25 16:28:06', '', NULL, '[]', '[]', '[]', 1, 8, NULL),
(13, 'Bikes', '2020-08-26 08:40:00', '2020-08-26 10:44:20', '', NULL, '[{\"title\":\"Englsich\",\"description\":\"Deutsch\",\"value\":\"Deutsch\"}]', '[]', '[]', 2, 8, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `account_tags`
--

CREATE TABLE `account_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_subtype_id` int(11) DEFAULT NULL,
  `customtag_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `account_tags`
--

INSERT INTO `account_tags` (`id`, `account_subtype_id`, `customtag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 1, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `account_types`
--

CREATE TABLE `account_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `video` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_subtypes` text COLLATE utf8mb4_unicode_ci,
  `icon` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `account_types`
--

INSERT INTO `account_types` (`id`, `title`, `description`, `video`, `created_at`, `updated_at`, `account_subtypes`, `icon`) VALUES
(1, 'Producer', '<p>Search in the biggest #hashtag based film platform and organize your team.</p>', '[{\"download_link\":\"account-types\\/May2020\\/abi7yLlSbwRzrf4Lfif1.mp4\",\"original_name\":\"y2mate.com - Cinematic Company Profile Business Video introduction_7tz4Ya6gzG4_360p.mp4\"}]', '2020-04-27 06:54:47', '2020-06-25 09:22:43', '[{\"subtype_id\":\"1\",\"subtype_value\":\"-1\"},{\"subtype_id\":\"2\",\"subtype_value\":\"-1\"},{\"subtype_id\":\"6\",\"subtype_value\":null},{\"subtype_id\":\"7\",\"subtype_value\":null}]', 'account-types/June2020/ByABnZ4rhMTXmvnk2JbC.png'),
(2, 'Agency', '<p>Are you an agent looking for actors, models, locations, animals and much more for a production?</p>', '[{\"download_link\":\"account-types\\/May2020\\/FV7I2QjeI3hYLeyAWaiS.mp4\",\"original_name\":\"y2mate.com - Innova Digital Group - The Creative Ad Agency (Promo Video)_AT6oSIDbGkw_360p.mp4\"}]', '2020-04-27 06:55:21', '2020-06-25 09:17:58', '[{\"subtype_id\":\"1\",\"subtype_value\":null},{\"subtype_id\":\"5\",\"subtype_value\":null},{\"subtype_id\":\"6\",\"subtype_value\":null},{\"subtype_id\":\"7\",\"subtype_value\":null}]', 'account-types/June2020/zHiPoIhrOFveIzMRUFT6.png'),
(3, 'Profile', '<p>Are you looking for a job in the film industry? Or would you like to present your child, house, location, animal, special car and much more?</p>', '[{\"download_link\":\"account-types\\/May2020\\/suhHJxFoKPtQ41LNqQkk.mp4\",\"original_name\":\"y2mate.com - Cinematic Company Profile Business Video introduction_7tz4Ya6gzG4_360p.mp4\"}]', '2020-04-27 06:55:40', '2020-06-25 09:23:57', '[{\"subtype_id\":\"1\",\"subtype_value\":\"1\"},{\"subtype_id\":\"2\",\"subtype_value\":\"1\"},{\"subtype_id\":\"3\",\"subtype_value\":\"1\"},{\"subtype_id\":\"4\",\"subtype_value\":\"1\"}]', 'account-types/June2020/ZhEOFfIGl75xwwALaLPK.png');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(2, NULL, 1, 'Category 2', 'category-2', '2020-03-12 09:32:06', '2020-03-12 09:32:06');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `customtags`
--

CREATE TABLE `customtags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `customtags`
--

INSERT INTO `customtags` (`id`, `name`, `tags`, `created_at`, `updated_at`, `lang`) VALUES
(3, '#Tags', '[\"filmography\",\"biography\"]', '2020-07-23 11:23:28', '2020-07-24 10:22:28', 'de'),
(4, 'New tags', '[\"test\",\"testing\",\"new tag\"]', '2020-07-23 11:24:10', '2020-07-24 10:22:21', 'en'),
(5, 'Please select your skills', '[\"sport\",\"football\"]', '2020-09-08 12:32:23', '2020-09-08 12:32:23', 'en');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 7, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(58, 7, 'email', 'text', 'Email', 0, 1, 1, 1, 1, 1, '{}', 3),
(59, 7, 'location', 'text', 'Location', 0, 1, 1, 1, 1, 1, '{}', 5),
(60, 7, 'phone', 'text', 'Phone', 0, 1, 1, 1, 1, 1, '{}', 4),
(61, 7, 'message', 'text', 'Message', 0, 1, 1, 1, 1, 1, '{}', 6),
(62, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 7),
(63, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(71, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(72, 10, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(73, 10, 'email', 'text', 'Email', 0, 1, 1, 1, 1, 1, '{}', 3),
(74, 10, 'phone', 'text', 'Phone', 0, 1, 1, 1, 1, 1, '{}', 4),
(75, 10, 'location', 'text', 'Location', 0, 1, 1, 1, 1, 1, '{}', 8),
(76, 10, 'usertype_id', 'text', 'Usertype Id', 0, 1, 1, 1, 1, 1, '{}', 5),
(77, 10, 'logged', 'checkbox', 'Logged', 0, 1, 1, 1, 1, 1, '{\"on\":\"Yes\",\"off\":\"No\",\"checked\":\"false\"}', 9),
(78, 10, 'etoken', 'text', 'Etoken', 0, 0, 0, 0, 0, 0, '{}', 11),
(79, 10, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 12),
(80, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 13),
(81, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(82, 11, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 2),
(83, 11, 'description', 'rich_text_box', 'Description', 0, 1, 1, 1, 1, 1, '{}', 3),
(84, 11, 'video', 'file', 'Video', 0, 1, 1, 1, 1, 1, '{}', 4),
(85, 11, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 5),
(86, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(87, 10, 'password', 'text', 'Password', 0, 0, 0, 0, 0, 0, '{}', 14),
(88, 10, 'account_belongsto_account_type_relationship', 'relationship', 'Account Type', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\AccountType\",\"table\":\"account_types\",\"type\":\"belongsTo\",\"column\":\"usertype_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"account_types\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(89, 10, 'profile_pic', 'image', 'Profile Pic', 0, 1, 1, 1, 1, 1, '{}', 7),
(90, 10, 'short_description', 'text_area', 'Short Description', 0, 0, 1, 1, 1, 1, '{}', 15),
(91, 10, 'documents_validated', 'checkbox', 'Documents validated?', 0, 1, 1, 1, 1, 1, '{\"on\":\"Yes\",\"off\":\"No\",\"checked\":\"false\"}', 10),
(92, 10, 'prove_document', 'file', 'Prove Document', 0, 0, 1, 1, 1, 1, '{}', 15),
(93, 10, 'company_name', 'text', 'Company Name', 0, 0, 1, 1, 1, 1, '{}', 16),
(94, 10, 'company_registration', 'text', 'Company Registration', 0, 0, 1, 1, 1, 1, '{}', 17),
(95, 10, 'company_address', 'text', 'Company Address', 0, 0, 1, 1, 1, 1, '{}', 18),
(104, 16, 'id', 'text', 'Id', 1, 1, 0, 0, 0, 0, '{}', 1),
(105, 16, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(106, 16, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 0, '{}', 5),
(107, 16, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(108, 11, 'account_subtypes', 'text', 'Account Subtypes', 0, 0, 0, 0, 0, 0, '{}', 7),
(109, 16, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 3),
(110, 16, 'icon', 'image', 'Icon', 0, 1, 1, 1, 1, 1, '{}', 4),
(111, 17, 'id', 'text', 'Id', 1, 1, 1, 0, 0, 0, '{}', 1),
(113, 17, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 3),
(114, 17, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(115, 18, 'id', 'text', 'Id', 1, 1, 1, 0, 0, 0, '{}', 1),
(116, 18, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 2),
(117, 18, 'location', 'text', 'Location', 0, 0, 1, 1, 1, 1, '{}', 3),
(119, 18, 'description', 'text', 'Description', 0, 0, 1, 1, 1, 1, '{}', 5),
(120, 18, 'tags', 'text', 'Tags', 0, 0, 1, 1, 1, 1, '{}', 7),
(121, 18, 'photos', 'multiple_images', 'Photos', 0, 1, 1, 1, 1, 1, '{}', 8),
(122, 18, 'files', 'file', 'Files', 0, 1, 1, 1, 1, 1, '{\"accept\":\"video\\/mp4,video\\/x-m4v,video\\/*\"}', 9),
(123, 18, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 10),
(124, 18, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(125, 18, 'job_belongsto_account_relationship', 'relationship', 'User', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Account\",\"table\":\"accounts\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"account_subtypes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(126, 18, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 12),
(127, 17, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(128, 18, 'fixed_fee', 'text', 'Fixed Fee', 0, 1, 1, 1, 1, 1, '{}', 4),
(129, 18, 'currency', 'text', 'Currency', 0, 1, 1, 1, 1, 1, '{}', 12),
(130, 18, 'start_fee', 'text', 'Start Fee', 0, 1, 1, 1, 1, 1, '{}', 13),
(131, 18, 'end_fee', 'text', 'End Fee', 0, 1, 1, 1, 1, 1, '{}', 14),
(132, 19, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(133, 19, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 2),
(134, 19, 'start_fee', 'text', 'Start Fee', 0, 1, 1, 1, 1, 1, '{}', 3),
(135, 19, 'end_fee', 'text', 'End Fee', 0, 1, 1, 1, 1, 1, '{}', 4),
(136, 19, 'categories', 'text', 'Categories', 0, 0, 1, 1, 1, 1, '{}', 5),
(137, 19, 'storyline', 'text_area', 'Storyline', 0, 1, 1, 1, 1, 1, '{}', 6),
(138, 19, 'director', 'text', 'Director', 0, 1, 1, 1, 1, 1, '{}', 7),
(139, 19, 'writer', 'text', 'Writer', 0, 1, 1, 1, 1, 1, '{}', 8),
(140, 19, 'start_date', 'timestamp', 'Start Date', 0, 1, 1, 1, 1, 1, '{}', 9),
(141, 19, 'end_date', 'timestamp', 'End Date', 0, 1, 1, 1, 1, 1, '{}', 10),
(142, 19, 'about', 'text_area', 'About', 0, 0, 1, 1, 1, 1, '{}', 11),
(143, 19, 'team_description', 'text_area', 'Team Description', 0, 0, 1, 1, 1, 1, '{}', 12),
(144, 19, 'files', 'file', 'Files', 0, 1, 1, 1, 1, 1, '{}', 13),
(145, 19, 'photos', 'multiple_images', 'Photos', 0, 0, 1, 1, 1, 1, '{}', 14),
(147, 19, 'tags', 'text', 'Tags', 0, 1, 1, 1, 1, 1, '{}', 16),
(148, 19, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 0, '{}', 17),
(149, 19, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 18),
(150, 19, 'jobs', 'text', 'Jobs', 0, 0, 1, 1, 1, 1, '{}', 15),
(151, 19, 'project_belongsto_account_relationship', 'relationship', 'accounts', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Account\",\"table\":\"accounts\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"account_subtypes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 19),
(152, 19, 'user_id', 'text', 'User', 0, 1, 1, 1, 1, 1, '{}', 19),
(153, 20, 'id', 'text', 'Id', 1, 1, 0, 0, 0, 0, '{}', 1),
(154, 20, 'name', 'text', 'Category Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(155, 20, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 3),
(156, 20, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(157, 18, 'slug', 'text', 'Slug', 0, 0, 0, 0, 0, 0, '{}', 15),
(158, 19, 'slug', 'text', 'Slug', 0, 0, 0, 0, 0, 0, '{}', 20),
(159, 21, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(160, 21, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(161, 21, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 4),
(162, 21, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(163, 21, 'description', 'text_area', 'Description', 0, 1, 1, 1, 1, 1, '{}', 3),
(164, 21, 'icon', 'image', 'Icon', 0, 1, 1, 1, 1, 1, '{}', 6),
(165, 21, 'tags', 'select_multiple', 'Tags', 0, 0, 1, 1, 1, 1, '{}', 7),
(166, 21, 'default_inputs', 'text', 'Default Inputs', 0, 0, 1, 1, 1, 1, '{\"description\":\"Add name of the field and a short description\"}', 8),
(167, 16, 'default_inputs', 'text', 'Default Inputs', 0, 0, 1, 1, 1, 1, '{\"description\":\"Add name of the field and a short description\"}', 9),
(168, 16, 'tags', 'select_multiple', 'Tags', 0, 0, 1, 1, 1, 1, '{}', 6),
(169, 23, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(170, 23, 'inputs', 'text', 'Inputs', 0, 0, 1, 1, 1, 1, '{}', 9),
(171, 23, 'languages', 'text', 'Languages', 0, 0, 1, 1, 1, 1, '{}', 10),
(172, 23, 'general_tags', 'text', 'General Tags', 0, 0, 1, 1, 1, 1, '{}', 11),
(173, 23, 'skill_tags', 'text', 'Skill Tags', 0, 0, 1, 1, 1, 1, '{}', 12),
(174, 23, 'fee', 'text', 'Fee type', 0, 0, 1, 1, 1, 1, '{}', 13),
(175, 23, 'start_fee', 'text', 'Fee', 0, 0, 1, 1, 1, 1, '{}', 14),
(176, 23, 'end_fee', 'text', 'End Fee', 0, 0, 1, 1, 1, 1, '{}', 15),
(177, 23, 'currency', 'text', 'Currency', 0, 0, 1, 1, 1, 1, '{}', 16),
(178, 23, 'files', 'file', 'Files', 0, 0, 1, 1, 1, 1, '{}', 17),
(179, 23, 'photos', 'multiple_images', 'Photos', 0, 0, 1, 1, 1, 1, '{}', 18),
(180, 23, 'filmography', 'text', 'Filmography', 0, 0, 1, 1, 1, 1, '{}', 19),
(181, 23, 'biography', 'text', 'Biography', 0, 0, 1, 1, 1, 1, '{}', 20),
(182, 23, 'other', 'text', 'Other', 0, 0, 1, 1, 1, 1, '{}', 21),
(183, 23, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 22),
(184, 23, 'subitem_id', 'text', 'Subitem Id', 0, 1, 1, 1, 1, 1, '{}', 23),
(185, 23, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 24),
(186, 23, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 25),
(187, 16, 'skills', 'select_multiple', 'Skills', 0, 0, 1, 1, 1, 1, '{\"description\":\"Add skills only for actor and leave empty for the other subtypes\"}', 7),
(188, 11, 'icon', 'image', 'Icon', 0, 1, 1, 1, 1, 1, '{}', 8),
(189, 24, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(190, 24, 'tags', 'text', 'Tags', 0, 0, 1, 1, 1, 1, '{}', 2),
(191, 24, 'inputs', 'text', 'Inputs', 0, 0, 1, 1, 1, 1, '{}', 3),
(192, 24, 'files', 'file', 'Files', 0, 0, 1, 1, 1, 1, '{}', 4),
(193, 24, 'photos', 'multiple_images', 'Photos', 0, 1, 1, 1, 1, 1, '{}', 5),
(194, 24, 'fee', 'text', 'Fee', 0, 1, 1, 1, 1, 1, '{}', 6),
(195, 24, 'start_fee', 'text', 'Start Fee', 0, 1, 1, 1, 1, 1, '{}', 7),
(196, 24, 'end_fee', 'text', 'End Fee', 0, 1, 1, 1, 1, 1, '{}', 8),
(197, 24, 'currency', 'text', 'Currency', 0, 1, 1, 1, 1, 1, '{}', 9),
(198, 24, 'short_description', 'text', 'Short Description', 0, 1, 1, 1, 1, 1, '{}', 10),
(199, 24, 'long_description', 'text', 'Long Description', 0, 1, 1, 1, 1, 1, '{}', 11),
(200, 24, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 12),
(201, 24, 'subitem_id', 'text', 'Subitem Id', 0, 1, 1, 1, 1, 1, '{}', 13),
(202, 24, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 14),
(203, 24, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 15),
(218, 23, 'profile_title', 'text', 'Profile Title', 0, 1, 1, 1, 1, 1, '{}', 3),
(219, 23, 'profile_location', 'text', 'Profile Location', 0, 1, 1, 1, 1, 1, '{}', 4),
(220, 23, 'videos', 'file', 'Videos', 0, 0, 1, 1, 1, 1, '{}', 26),
(221, 23, 'profile_belongsto_account_type_relationship', 'relationship', 'Profile type', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\AccountSubtype\",\"table\":\"account_subtypes\",\"type\":\"belongsTo\",\"column\":\"subitem_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"account_subtypes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(222, 23, 'profile_belongsto_account_relationship', 'relationship', 'User creator', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Account\",\"table\":\"accounts\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"account_subtypes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(223, 23, 'profile_belongsto_account_relationship_1', 'relationship', 'Usr.email', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Account\",\"table\":\"accounts\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"email\",\"pivot_table\":\"account_subtypes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(224, 23, 'profile_belongsto_account_relationship_2', 'relationship', 'Usr.phone', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Account\",\"table\":\"accounts\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"phone\",\"pivot_table\":\"account_subtypes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(225, 23, 'profile_belongsto_account_relationship_3', 'relationship', 'Usr.location', 0, 0, 1, 1, 1, 1, '{\"model\":\"App\\\\Account\",\"table\":\"accounts\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"location\",\"pivot_table\":\"account_subtypes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8),
(226, 27, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(227, 27, 'name', 'text', 'Genre', 0, 1, 1, 1, 1, 1, '{}', 2),
(228, 27, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 3),
(229, 27, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(230, 19, 'genres', 'text', 'Genres', 0, 1, 1, 1, 1, 1, '{}', 21),
(231, 23, 'status', 'checkbox', 'Status', 0, 1, 1, 1, 1, 1, '{\"on\":\"Active\",\"off\":\"Inactive\",\"checked\":false}', 22),
(238, 16, 'order', 'text', 'Order', 0, 0, 0, 0, 0, 0, '{}', 10),
(240, 30, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(241, 30, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(242, 30, 'tags', 'select_multiple', 'Tags or #tags', 0, 1, 1, 1, 1, 1, '{}', 3),
(243, 30, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 4),
(244, 30, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(245, 16, 'parent_id', 'text', 'Parent Id', 0, 0, 0, 0, 0, 0, '{}', 11),
(246, 16, 'background_image', 'image', 'Background Image', 0, 1, 1, 1, 1, 1, '{}', 12),
(247, 32, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(248, 32, 'name', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 2),
(249, 32, 'tags', 'select_multiple', 'Tags', 0, 0, 0, 1, 1, 1, '{}', 3),
(250, 32, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 5),
(251, 32, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(252, 32, 'lang', 'select_dropdown', 'Language', 0, 1, 1, 1, 1, 1, '{\"default\":\"en\",\"options\":{\"en\":\"en\",\"de\":\"de\"}}', 4),
(253, 33, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(254, 33, 'id_user', 'text', 'Id User', 0, 1, 1, 1, 1, 1, '{}', 2),
(255, 33, 'id_profile', 'text', 'Id Profile', 0, 1, 1, 1, 1, 1, '{}', 3),
(256, 33, 'stars', 'text', 'Stars', 0, 1, 1, 1, 1, 1, '{}', 6),
(257, 33, 'message', 'text_area', 'Message', 0, 1, 1, 1, 1, 1, '{}', 7),
(258, 33, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 8),
(259, 33, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(260, 33, 'rating_profile_belongsto_account_relationship', 'relationship', 'User', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Account\",\"table\":\"accounts\",\"type\":\"belongsTo\",\"column\":\"id_user\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"account_subtypes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(261, 33, 'rating_profile_belongsto_profile_relationship', 'relationship', 'Profile rated', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Profile\",\"table\":\"profiles\",\"type\":\"belongsTo\",\"column\":\"id_profile\",\"key\":\"id\",\"label\":\"profile_title\",\"pivot_table\":\"account_subtypes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(262, 23, 'short_description', 'text', 'Short Description', 0, 0, 1, 1, 1, 1, '{}', 23),
(263, 23, 'long_description', 'text', 'Long Description', 0, 0, 1, 1, 1, 1, '{}', 24),
(264, 23, 'slug', 'text', 'Slug', 0, 0, 1, 1, 1, 1, '{\"disabled\":true}', 25),
(266, 23, 'reason', 'text', 'Reason', 0, 0, 1, 1, 1, 1, '{}', 26),
(267, 16, 'account_subtype_belongstomany_customtag_relationship', 'relationship', 'customtags', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Customtag\",\"table\":\"customtags\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"account_tags\",\"pivot\":\"1\",\"taggable\":null}', 13);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(7, 'messages', 'messages', 'Message', 'Messages', 'voyager-mail', 'App\\Message', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-04-24 10:17:42', '2020-04-24 10:17:42'),
(10, 'accounts', 'accounts', 'Account', 'Accounts', 'voyager-person', 'App\\Account', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-04-27 06:52:34', '2020-05-12 13:37:07'),
(11, 'account_types', 'account-types', 'Account Type', 'Account Types', 'voyager-group', 'App\\AccountType', NULL, 'App\\Http\\Controllers\\VoyagerAccountTypesController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-04-27 06:53:55', '2020-06-11 10:49:20'),
(16, 'account_subtypes', 'account-subtypes', 'Account Subtype', 'Account Subtypes', 'voyager-people', 'App\\AccountSubtype', NULL, 'App\\Http\\Controllers\\VoyagerSubTypesController', NULL, 1, 0, '{\"order_column\":\"order\",\"order_display_column\":\"name\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-12 13:34:47', '2020-09-04 15:04:59'),
(17, 'tags', 'tags', 'Tag', 'Tags', 'voyager-tag', 'App\\Tag', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-19 10:52:23', '2020-05-25 12:54:31'),
(18, 'jobs', 'jobs', 'Job', 'Jobs', 'voyager-tools', 'App\\Job', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-19 11:44:39', '2020-08-19 10:20:45'),
(19, 'projects', 'projects', 'Project', 'Projects', 'voyager-leaf', 'App\\Project', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-25 11:51:43', '2020-07-06 10:29:24'),
(20, 'project_categories', 'project-categories', 'Project Category', 'Project Categories', 'voyager-tree', 'App\\ProjectCategory', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-05-25 13:00:50', '2020-05-25 13:00:50'),
(21, 'subitems', 'subitems', 'Subitem', 'Subitems', 'voyager-truck', 'App\\Subitem', NULL, 'App\\Http\\Controllers\\VoyagerSubitemController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-06-03 08:27:43', '2020-06-03 12:45:31'),
(23, 'profiles', 'profiles', 'Profile', 'Profiles', 'voyager-people', 'App\\Profile', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-06-04 11:16:07', '2020-09-07 13:47:58'),
(24, 'items', 'items', 'Item', 'Items', 'voyager-browser', 'App\\Item', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-06-18 12:26:48', '2020-06-18 12:26:48'),
(27, 'project_generes', 'project-generes', 'Project Genere', 'Project Generes', 'voyager-meh', 'App\\ProjectGenere', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-07-06 09:45:11', '2020-07-06 09:53:55'),
(30, 'entags', 'entags', 'English tag', 'English tags', 'voyager-file-text', 'App\\Entag', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-07-23 10:58:54', '2020-07-23 11:23:11'),
(32, 'customtags', 'customtags', 'Customtag', 'Customtags', NULL, 'App\\Customtag', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-07-24 10:21:34', '2020-09-04 14:38:45'),
(33, 'rating_profiles', 'rating-profiles', 'Rating Profile', 'Rating Profiles', 'voyager-star-half', 'App\\RatingProfile', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-08-21 08:12:00', '2020-08-21 08:17:14');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `inputs` text COLLATE utf8mb4_unicode_ci,
  `files` text COLLATE utf8mb4_unicode_ci,
  `photos` text COLLATE utf8mb4_unicode_ci,
  `fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `long_description` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `subitem_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `items`
--

INSERT INTO `items` (`id`, `tags`, `inputs`, `files`, `photos`, `fee`, `start_fee`, `end_fee`, `currency`, `short_description`, `long_description`, `user_id`, `subitem_id`, `created_at`, `updated_at`) VALUES
(1, '[\"test\",\"testare\"]', '[{\"title\":\"testare\",\"description\":\"test\",\"value\":\"testare\"},{\"title\":\"another\",\"description\":\"this\",\"value\":\"testare\"},{\"is_custom_field_added\":\"true\",\"custom_title_added\":\"new field\",\"custom_value_added\":\"new value\"}]', '[{\"download_link\":\"items\\/files\\/19\\/file5eeb84ce52878.xlsx\",\"original_name\":\"file5eeb84ce52878.xlsx\"}]', '[\"items\\/images\\/19\\/image5eeb84ce5261d.png\"]', 'day', '122', '122', 'dollar', 'sdasdasd', '1111111fsfdffsdfeart234234234fsfdffsdfeart234234234fsfdffsdfeart234234234fsfdffsdfeart2342134234fsfdffsdfeart234234234fsfdffsdfeart234234234', 19, NULL, '2020-06-18 15:14:22', '2020-06-18 15:14:22'),
(2, '[\"test\",\"testare\"]', '[{\"title\":\"testare\",\"description\":\"test\",\"value\":\"te\"},{\"title\":\"another\",\"description\":\"this\",\"value\":\"testad\"},{\"is_custom_field_added\":\"true\",\"custom_title_added\":\"ads\",\"custom_value_added\":\"adasd\"}]', '[{\"download_link\":\"items\\/files\\/19\\/file5eeb864668cef.xlsx\",\"original_name\":\"file5eeb864668cef.xlsx\"}]', '[\"items\\/images\\/19\\/image5eeb864668a60.png\"]', 'hourly', '123', '123', 'euro', 'asdasda', 's123123123qewsdasdasdasd', 19, NULL, '2020-06-18 15:20:38', '2020-06-18 15:20:38'),
(3, '[\"testare\"]', '[{\"title\":\"testare\",\"description\":\"test\",\"value\":\"ad\"},{\"title\":\"another\",\"description\":\"this\",\"value\":\"sadsd\"}]', '[{\"download_link\":\"items\\/files\\/19\\/file5eeb867d87414.xlsx\",\"original_name\":\"file5eeb867d87414.xlsx\"}]', '[\"items\\/images\\/19\\/image5eeb867d8710c.png\"]', 'hourly', '123', '123', 'dollar', 'dasdas', 'sdasdasdasdasd', 19, NULL, '2020-06-18 15:21:33', '2020-06-18 15:21:33'),
(4, '[\"testare\",\"new_itm\"]', '[{\"title\":\"testare\",\"description\":\"test\",\"value\":\"asdas\"},{\"title\":\"another\",\"description\":\"this\",\"value\":\"dasdasd\"}]', '[{\"download_link\":\"items\\/files\\/19\\/file5eeb86b51a206.xlsx\",\"original_name\":\"file5eeb86b51a206.xlsx\"}]', '[\"items\\/images\\/19\\/image5eeb86b519d49.png\",\"items\\/images\\/19\\/image5eeb86b519fb2.png\",\"items\\/images\\/19\\/image5eeb86b51a088.png\",\"items\\/images\\/19\\/image5eeb86b51a157.png\"]', 'day', '300', '300', 'dollar', 'adsdasd', '12312asdasdasdasd', 19, 1, '2020-06-18 15:22:29', '2020-06-18 15:22:29'),
(5, '[\"new_itm\",\"te\"]', '[{\"title\":\"testare\",\"description\":\"test\",\"value\":\"adsd\"},{\"title\":\"another\",\"description\":\"this\",\"value\":\"sdasa\"},{\"is_custom_field_added\":\"true\",\"custom_title_added\":\"test\",\"custom_value_added\":\"testare\"}]', '[{\"download_link\":\"items\\/files\\/19\\/file5eec646e33d2c.xlsx\",\"original_name\":\"file5eec646e33d2c.xlsx\"}]', '[\"items\\/images\\/19\\/image5eec646e338ed.png\",\"items\\/images\\/19\\/image5eec646e33c7d.png\"]', 'hourly', '123', '123', 'euro', 'dasdasd', 'asdasd123123123', 19, 1, '2020-06-19 07:08:30', '2020-06-19 07:08:30'),
(6, '[\"#Penthouse\",\"#House\"]', '[{\"is_custom_field_added\":\"true\",\"custom_title_added\":\"test\",\"custom_value_added\":\"testare\"}]', '[{\"download_link\":\"items\\/files\\/19\\/file5f3ce6e4a9e94.jpg\",\"original_name\":\"file5f3ce6e4a9e94.jpg\"}]', '[\"items\\/images\\/19\\/image5f3ce6e4a929c.png\"]', 'hourly', '100', '100', 'euro', 'This is a short description', 'This is a long description added by me', 19, 7, '2020-08-19 08:46:28', '2020-08-19 08:46:28');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `location` text COLLATE utf8mb4_unicode_ci,
  `fixed_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `photos` text COLLATE utf8mb4_unicode_ci,
  `files` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_fee` int(11) DEFAULT NULL,
  `end_fee` int(11) DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `location`, `fixed_fee`, `description`, `tags`, `photos`, `files`, `created_at`, `updated_at`, `user_id`, `currency`, `start_fee`, `end_fee`, `slug`) VALUES
(6, 'This is a new job', 'test', 'hourly', 'test', '[\"Artefacts\",\"Arms\"]', '[\"jobs\\/images\\/17\\/image5ed6340e80ded.png\",\"jobs\\/images\\/17\\/image5ed6340e8202f.png\",\"jobs\\/images\\/17\\/image5ed6340e829cd.png\"]', '[{\"download_link\":\"jobs\\/files\\/17\\/file5ed6340e82ff1.png\",\"original_name\":\"file5ed6340e82ff1.png\"},{\"download_link\":\"jobs\\/files\\/17\\/file5ed6340e830a7.png\",\"original_name\":\"file5ed6340e830a7.png\"}]', '2020-06-02 11:12:14', '2020-08-12 06:57:16', 17, 'dollar', 0, 0, 'this-is-a-new-job'),
(7, 'Cameraman John full stack', 'Constanta, Romania', 'hourly', 'testare', '[\"Artefacts\",\"Vehicules\",\"Arms\"]', '[\"jobs\\/images\\/17\\/image5ed634696b4a6.png\",\"jobs\\/images\\/17\\/image5ed634696cc06.png\",\"jobs\\/images\\/17\\/image5ed634696d7bd.png\"]', '[{\"download_link\":\"jobs\\/files\\/17\\/file5ed634696dce0.png\",\"original_name\":\"file5ed634696dce0.png\"},{\"download_link\":\"jobs\\/files\\/17\\/file5ed634696e250.png\",\"original_name\":\"file5ed634696e250.png\"}]', '2020-06-02 11:13:45', '2020-08-12 06:59:36', 17, 'euro', 0, 0, 'cameraman-john-full-stack'),
(8, 'sound ingineer', 'London, Uk', 'hourly', 'tdesa', '[\"Arms\",\"Pets\",\"Kids\"]', '[\"jobs\\/images\\/17\\/image5ed6349f0cc78.png\",\"jobs\\/images\\/17\\/image5ed6349f0d246.png\"]', '[{\"download_link\":\"jobs\\/files\\/17\\/file5ed6349f0d868.png\",\"original_name\":\"file5ed6349f0d868.png\"},{\"download_link\":\"jobs\\/files\\/17\\/file5ed6349f0d925.png\",\"original_name\":\"file5ed6349f0d925.png\"}]', '2020-06-02 11:14:39', '2020-08-12 06:52:26', 17, 'dollar', 0, 0, 'sound-ingineer'),
(9, 'petrica instalator', 'test', 'hourly', 'test', '[\"Places\",\"testare\",\"dasda\",\"tyrdf\"]', '[\"jobs\\/images\\/17\\/image5ed79e6fab636.png\",\"jobs\\/images\\/17\\/image5ed79e6fad038.png\"]', '[{\"download_link\":\"jobs\\/files\\/17\\/file5ed79e6fad40f.png\",\"original_name\":\"file5ed79e6fad40f.png\"},{\"download_link\":\"jobs\\/files\\/17\\/file5ed79e6fae58a.png\",\"original_name\":\"file5ed79e6fae58a.png\"}]', '2020-06-03 12:58:23', '2020-06-03 12:58:23', 17, 'dollar', 491400, 0, 'petrica-instalator'),
(10, 'Werbefilm für ZDF Schauspieler gesucht', 'Köln', 'day', 'Wir suchen für unsere neue Werbeproduktion zwei Schauspieler in blond.', '[\"Animals\",\"Places\",\"Schauspieler\",\"ZDF\"]', '[\"jobs\\/images\\/22\\/image5edfc3e3a49bf.jpg\"]', '[{\"download_link\":\"jobs\\/files\\/22\\/file5edfc36252605.jpg\",\"original_name\":\"file5edfc36252605.jpg\"}]', '2020-06-09 17:14:10', '2020-06-09 17:16:19', 22, 'euro', 0, 0, 'werbefilm-fur-zdf-schauspieler-gesucht'),
(11, 'Test nou acum', 'Constanța, România', 'hourly', 'this is a short description', '[\"Animals\",\"Places\"]', '[\"jobs\\/images\\/17\\/image5f02f7092992f.png\",\"jobs\\/images\\/17\\/image5f02f70929f6b.png\"]', '[{\"download_link\":\"jobs\\/files\\/17\\/file5f02f7092a32d.sql\",\"original_name\":\"file5f02f7092a32d.sql\"}]', '2020-07-06 10:03:53', '2020-07-06 10:03:53', 17, 'dollar', 0, 0, 'test-nou-acum'),
(12, 'dasda', 'sdasdasdasd, 154th Place, Calumet City, Illinois, Statele Unite ale Americii', 'day', 'dasdasd', '[\"Artefacts\",\"Animals\",\"testare\"]', '[\"jobs\\/images\\/17\\/image5f32a1734333e.png\"]', '[{\"download_link\":\"jobs\\/files\\/17\\/file5f32a173442e0.png\",\"original_name\":\"file5f32a173442e0.png\"}]', '2020-08-11 13:47:31', '2020-08-12 06:56:43', 17, 'dollar', 0, 0, 'dasda'),
(13, 'This is a new job', 'Romanian Navy Museum, Strada Traian, Constanța, România', 'hourly', 'This is just a short job description', '[\"Artefacts\",\"Animals\",\"Places\"]', '[\"jobs\\/images\\/17\\/image5f3393b9a02c5.png\",\"jobs\\/images\\/17\\/image5f3393b9a1737.png\",\"jobs\\/images\\/17\\/image5f3393b9a1feb.png\"]', '[{\"download_link\":\"jobs\\/files\\/17\\/file5f3393b9a2367.png\",\"original_name\":\"file5f3393b9a2367.png\"}]', '2020-08-12 07:01:13', '2020-08-19 11:28:23', 17, 'dollar', 0, 0, 'this-is-a-new-job-2');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-03-12 09:32:06', '2020-03-12 09:32:06');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2020-03-12 09:32:06', '2020-07-24 09:21:29', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 4, '2020-03-12 09:32:06', '2020-07-24 22:20:43', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2020-03-12 09:32:06', '2020-07-24 22:20:43', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2020-03-12 09:32:06', '2020-07-24 09:57:04', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 6, '2020-03-12 09:32:06', '2020-07-24 22:20:43', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2020-03-12 09:32:06', '2020-04-23 19:05:47', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2020-03-12 09:32:06', '2020-07-24 06:21:11', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2020-03-12 09:32:06', '2020-07-24 06:21:11', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2020-03-12 09:32:06', '2020-07-24 06:21:12', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 7, '2020-03-12 09:32:06', '2020-07-24 22:20:43', 'voyager.settings.index', NULL),
(14, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2020-03-12 09:32:06', '2020-07-24 06:21:12', 'voyager.hooks', NULL),
(15, 1, 'Static texts', 'admin/statics', '_self', 'voyager-window-list', '#000000', NULL, 5, '2020-04-23 19:05:25', '2020-07-24 22:20:43', NULL, ''),
(16, 1, 'Messages', '', '_self', 'voyager-mail', NULL, NULL, 8, '2020-04-24 10:17:42', '2020-07-24 22:20:43', 'voyager.messages.index', NULL),
(19, 1, 'Accounts', '', '_self', 'voyager-person', NULL, NULL, 9, '2020-04-27 06:52:34', '2020-07-24 22:20:43', 'voyager.accounts.index', NULL),
(20, 1, 'Account Types', '', '_self', 'voyager-group', NULL, 19, 1, '2020-04-27 06:53:55', '2020-05-14 15:59:39', 'voyager.account-types.index', NULL),
(23, 1, 'Account Subtypes', '', '_self', 'voyager-people', '#000000', 19, 2, '2020-05-12 13:34:47', '2020-05-14 15:59:45', 'voyager.account-subtypes.index', 'null'),
(24, 1, 'Jobs Tags', '', '_self', 'voyager-tag', '#000000', 40, 2, '2020-05-19 10:52:23', '2020-08-19 10:26:13', 'voyager.tags.index', 'null'),
(25, 1, 'Jobs', '', '_self', 'voyager-tools', NULL, 40, 1, '2020-05-19 11:44:39', '2020-08-19 10:26:10', 'voyager.jobs.index', NULL),
(26, 1, 'Projects', '', '_self', 'voyager-leaf', NULL, 42, 1, '2020-05-25 11:51:43', '2020-08-22 21:40:55', 'voyager.projects.index', NULL),
(27, 1, 'Project Categories', '', '_self', 'voyager-tree', NULL, 42, 2, '2020-05-25 13:00:50', '2020-08-22 21:40:58', 'voyager.project-categories.index', NULL),
(28, 1, 'Subitems', '', '_self', 'voyager-truck', NULL, 19, 3, '2020-06-03 08:27:43', '2020-06-03 08:32:07', 'voyager.subitems.index', NULL),
(29, 1, 'Profiles', '', '_self', 'voyager-people', NULL, NULL, 12, '2020-06-04 11:16:07', '2020-08-22 21:40:59', 'voyager.profiles.index', NULL),
(30, 1, 'Items', '', '_self', 'voyager-browser', NULL, NULL, 13, '2020-06-18 12:26:48', '2020-08-22 21:40:59', 'voyager.items.index', NULL),
(33, 1, 'Project Generes', '', '_self', 'voyager-smile', '#000000', 42, 3, '2020-07-06 09:45:11', '2020-08-22 21:40:59', 'voyager.project-generes.index', 'null'),
(39, 1, 'Customtags', '', '_self', 'voyager-list', '#000000', NULL, 14, '2020-07-24 10:21:34', '2020-08-22 21:40:59', 'voyager.customtags.index', 'null'),
(40, 1, 'Jobs & Tags', '', '_self', 'voyager-rocket', '#000000', NULL, 10, '2020-08-19 10:25:54', '2020-08-19 10:26:09', NULL, ''),
(41, 1, 'Rating Profiles', '', '_self', 'voyager-star-half', NULL, NULL, 15, '2020-08-21 08:12:00', '2020-08-22 21:40:59', 'voyager.rating-profiles.index', NULL),
(42, 1, 'Projects list', '', '_self', 'voyager-pie-chart', '#000000', NULL, 11, '2020-08-22 21:40:47', '2020-08-22 21:40:55', NULL, '');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `location`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Petrica Closcaru1', 'petryca.95@gmail.com', 'testare', '0747193218', 'testare mesaj petrica', '2020-04-24 10:21:11', '2020-04-24 10:21:11'),
(2, 'Petrica Closcaru1', 'petryca.95@gmail.com', 'testare', '0747193218', 'testare mesaj petrica', '2020-04-24 10:21:39', '2020-04-24 10:21:39'),
(3, 'Petrica Closcaru', 'petryca.95@gmail.com', 'testare', '0747193218', 'mesaj din nout', '2020-04-24 10:29:12', '2020-04-24 10:29:12'),
(4, 'Petrica Closcaru', 'petryca.95@gmail.com', 'ty', '0747193218', 'dasdadsdasdasd', '2020-04-24 10:30:00', '2020-04-24 10:30:00'),
(5, 'testare', 'da@da.com', NULL, '123123', NULL, '2020-04-27 14:41:34', '2020-04-27 14:41:34');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2016_01_01_000000_add_voyager_user_fields', 1),
(3, '2016_01_01_000000_create_data_types_table', 1),
(4, '2016_05_19_173453_create_menu_table', 1),
(5, '2016_10_21_190000_create_roles_table', 1),
(6, '2016_10_21_190000_create_settings_table', 1),
(7, '2016_11_30_135954_create_permission_table', 1),
(8, '2016_11_30_141208_create_permission_role_table', 1),
(9, '2016_12_26_201236_data_types__add__server_side', 1),
(10, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(11, '2017_01_14_005015_create_translations_table', 1),
(12, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(13, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(14, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(15, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(16, '2017_08_05_000000_add_group_to_settings_table', 1),
(17, '2017_11_26_013050_add_user_role_relationship', 1),
(18, '2017_11_26_015000_create_user_roles_table', 1),
(19, '2018_03_11_000000_add_user_settings', 1),
(20, '2018_03_14_000000_add_details_to_data_types_table', 1),
(21, '2018_03_16_000000_make_settings_value_nullable', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2016_01_01_000000_create_pages_table', 2),
(24, '2016_01_01_000000_create_posts_table', 2),
(25, '2016_02_15_204651_create_categories_table', 2),
(26, '2017_04_11_000000_alter_post_nullable_fields_table', 2);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2020-03-12 09:32:06', '2020-03-12 09:32:06');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(2, 'browse_bread', NULL, '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(3, 'browse_database', NULL, '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(4, 'browse_media', NULL, '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(5, 'browse_compass', NULL, '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(6, 'browse_menus', 'menus', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(7, 'read_menus', 'menus', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(8, 'edit_menus', 'menus', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(9, 'add_menus', 'menus', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(10, 'delete_menus', 'menus', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(11, 'browse_roles', 'roles', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(12, 'read_roles', 'roles', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(13, 'edit_roles', 'roles', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(14, 'add_roles', 'roles', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(15, 'delete_roles', 'roles', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(16, 'browse_users', 'users', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(17, 'read_users', 'users', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(18, 'edit_users', 'users', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(19, 'add_users', 'users', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(20, 'delete_users', 'users', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(21, 'browse_settings', 'settings', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(22, 'read_settings', 'settings', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(23, 'edit_settings', 'settings', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(24, 'add_settings', 'settings', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(25, 'delete_settings', 'settings', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(26, 'browse_categories', 'categories', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(27, 'read_categories', 'categories', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(28, 'edit_categories', 'categories', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(29, 'add_categories', 'categories', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(30, 'delete_categories', 'categories', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(31, 'browse_posts', 'posts', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(32, 'read_posts', 'posts', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(33, 'edit_posts', 'posts', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(34, 'add_posts', 'posts', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(35, 'delete_posts', 'posts', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(36, 'browse_pages', 'pages', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(37, 'read_pages', 'pages', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(38, 'edit_pages', 'pages', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(39, 'add_pages', 'pages', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(40, 'delete_pages', 'pages', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(41, 'browse_hooks', NULL, '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(42, 'browse_messages', 'messages', '2020-04-24 10:17:42', '2020-04-24 10:17:42'),
(43, 'read_messages', 'messages', '2020-04-24 10:17:42', '2020-04-24 10:17:42'),
(44, 'edit_messages', 'messages', '2020-04-24 10:17:42', '2020-04-24 10:17:42'),
(45, 'add_messages', 'messages', '2020-04-24 10:17:42', '2020-04-24 10:17:42'),
(46, 'delete_messages', 'messages', '2020-04-24 10:17:42', '2020-04-24 10:17:42'),
(57, 'browse_accounts', 'accounts', '2020-04-27 06:52:34', '2020-04-27 06:52:34'),
(58, 'read_accounts', 'accounts', '2020-04-27 06:52:34', '2020-04-27 06:52:34'),
(59, 'edit_accounts', 'accounts', '2020-04-27 06:52:34', '2020-04-27 06:52:34'),
(60, 'add_accounts', 'accounts', '2020-04-27 06:52:34', '2020-04-27 06:52:34'),
(61, 'delete_accounts', 'accounts', '2020-04-27 06:52:34', '2020-04-27 06:52:34'),
(62, 'browse_account_types', 'account_types', '2020-04-27 06:53:55', '2020-04-27 06:53:55'),
(63, 'read_account_types', 'account_types', '2020-04-27 06:53:55', '2020-04-27 06:53:55'),
(64, 'edit_account_types', 'account_types', '2020-04-27 06:53:55', '2020-04-27 06:53:55'),
(65, 'add_account_types', 'account_types', '2020-04-27 06:53:55', '2020-04-27 06:53:55'),
(66, 'delete_account_types', 'account_types', '2020-04-27 06:53:55', '2020-04-27 06:53:55'),
(77, 'browse_account_subtypes', 'account_subtypes', '2020-05-12 13:34:47', '2020-05-12 13:34:47'),
(78, 'read_account_subtypes', 'account_subtypes', '2020-05-12 13:34:47', '2020-05-12 13:34:47'),
(79, 'edit_account_subtypes', 'account_subtypes', '2020-05-12 13:34:47', '2020-05-12 13:34:47'),
(80, 'add_account_subtypes', 'account_subtypes', '2020-05-12 13:34:47', '2020-05-12 13:34:47'),
(81, 'delete_account_subtypes', 'account_subtypes', '2020-05-12 13:34:47', '2020-05-12 13:34:47'),
(82, 'browse_tags', 'tags', '2020-05-19 10:52:23', '2020-05-19 10:52:23'),
(83, 'read_tags', 'tags', '2020-05-19 10:52:23', '2020-05-19 10:52:23'),
(84, 'edit_tags', 'tags', '2020-05-19 10:52:23', '2020-05-19 10:52:23'),
(85, 'add_tags', 'tags', '2020-05-19 10:52:23', '2020-05-19 10:52:23'),
(86, 'delete_tags', 'tags', '2020-05-19 10:52:23', '2020-05-19 10:52:23'),
(87, 'browse_jobs', 'jobs', '2020-05-19 11:44:39', '2020-05-19 11:44:39'),
(88, 'read_jobs', 'jobs', '2020-05-19 11:44:39', '2020-05-19 11:44:39'),
(89, 'edit_jobs', 'jobs', '2020-05-19 11:44:39', '2020-05-19 11:44:39'),
(90, 'add_jobs', 'jobs', '2020-05-19 11:44:39', '2020-05-19 11:44:39'),
(91, 'delete_jobs', 'jobs', '2020-05-19 11:44:39', '2020-05-19 11:44:39'),
(92, 'browse_projects', 'projects', '2020-05-25 11:51:43', '2020-05-25 11:51:43'),
(93, 'read_projects', 'projects', '2020-05-25 11:51:43', '2020-05-25 11:51:43'),
(94, 'edit_projects', 'projects', '2020-05-25 11:51:43', '2020-05-25 11:51:43'),
(95, 'add_projects', 'projects', '2020-05-25 11:51:43', '2020-05-25 11:51:43'),
(96, 'delete_projects', 'projects', '2020-05-25 11:51:43', '2020-05-25 11:51:43'),
(97, 'browse_project_categories', 'project_categories', '2020-05-25 13:00:50', '2020-05-25 13:00:50'),
(98, 'read_project_categories', 'project_categories', '2020-05-25 13:00:50', '2020-05-25 13:00:50'),
(99, 'edit_project_categories', 'project_categories', '2020-05-25 13:00:50', '2020-05-25 13:00:50'),
(100, 'add_project_categories', 'project_categories', '2020-05-25 13:00:50', '2020-05-25 13:00:50'),
(101, 'delete_project_categories', 'project_categories', '2020-05-25 13:00:50', '2020-05-25 13:00:50'),
(102, 'browse_subitems', 'subitems', '2020-06-03 08:27:43', '2020-06-03 08:27:43'),
(103, 'read_subitems', 'subitems', '2020-06-03 08:27:43', '2020-06-03 08:27:43'),
(104, 'edit_subitems', 'subitems', '2020-06-03 08:27:43', '2020-06-03 08:27:43'),
(105, 'add_subitems', 'subitems', '2020-06-03 08:27:43', '2020-06-03 08:27:43'),
(106, 'delete_subitems', 'subitems', '2020-06-03 08:27:43', '2020-06-03 08:27:43'),
(107, 'browse_profiles', 'profiles', '2020-06-04 11:16:07', '2020-06-04 11:16:07'),
(108, 'read_profiles', 'profiles', '2020-06-04 11:16:07', '2020-06-04 11:16:07'),
(109, 'edit_profiles', 'profiles', '2020-06-04 11:16:07', '2020-06-04 11:16:07'),
(110, 'add_profiles', 'profiles', '2020-06-04 11:16:07', '2020-06-04 11:16:07'),
(111, 'delete_profiles', 'profiles', '2020-06-04 11:16:07', '2020-06-04 11:16:07'),
(112, 'browse_items', 'items', '2020-06-18 12:26:48', '2020-06-18 12:26:48'),
(113, 'read_items', 'items', '2020-06-18 12:26:48', '2020-06-18 12:26:48'),
(114, 'edit_items', 'items', '2020-06-18 12:26:48', '2020-06-18 12:26:48'),
(115, 'add_items', 'items', '2020-06-18 12:26:48', '2020-06-18 12:26:48'),
(116, 'delete_items', 'items', '2020-06-18 12:26:48', '2020-06-18 12:26:48'),
(127, 'browse_project_generes', 'project_generes', '2020-07-06 09:45:11', '2020-07-06 09:45:11'),
(128, 'read_project_generes', 'project_generes', '2020-07-06 09:45:11', '2020-07-06 09:45:11'),
(129, 'edit_project_generes', 'project_generes', '2020-07-06 09:45:11', '2020-07-06 09:45:11'),
(130, 'add_project_generes', 'project_generes', '2020-07-06 09:45:11', '2020-07-06 09:45:11'),
(131, 'delete_project_generes', 'project_generes', '2020-07-06 09:45:11', '2020-07-06 09:45:11'),
(142, 'browse_entags', 'entags', '2020-07-23 10:58:54', '2020-07-23 10:58:54'),
(143, 'read_entags', 'entags', '2020-07-23 10:58:54', '2020-07-23 10:58:54'),
(144, 'edit_entags', 'entags', '2020-07-23 10:58:54', '2020-07-23 10:58:54'),
(145, 'add_entags', 'entags', '2020-07-23 10:58:54', '2020-07-23 10:58:54'),
(146, 'delete_entags', 'entags', '2020-07-23 10:58:54', '2020-07-23 10:58:54'),
(147, 'browse_customtags', 'customtags', '2020-07-24 10:21:34', '2020-07-24 10:21:34'),
(148, 'read_customtags', 'customtags', '2020-07-24 10:21:34', '2020-07-24 10:21:34'),
(149, 'edit_customtags', 'customtags', '2020-07-24 10:21:34', '2020-07-24 10:21:34'),
(150, 'add_customtags', 'customtags', '2020-07-24 10:21:34', '2020-07-24 10:21:34'),
(151, 'delete_customtags', 'customtags', '2020-07-24 10:21:34', '2020-07-24 10:21:34'),
(152, 'browse_rating_profiles', 'rating_profiles', '2020-08-21 08:12:00', '2020-08-21 08:12:00'),
(153, 'read_rating_profiles', 'rating_profiles', '2020-08-21 08:12:00', '2020-08-21 08:12:00'),
(154, 'edit_rating_profiles', 'rating_profiles', '2020-08-21 08:12:00', '2020-08-21 08:12:00'),
(155, 'add_rating_profiles', 'rating_profiles', '2020-08-21 08:12:00', '2020-08-21 08:12:00'),
(156, 'delete_rating_profiles', 'rating_profiles', '2020-08-21 08:12:00', '2020-08-21 08:12:00');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(3, 1),
(4, 1),
(4, 3),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(21, 3),
(22, 1),
(22, 3),
(23, 1),
(23, 3),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(42, 1),
(42, 3),
(43, 1),
(43, 3),
(44, 1),
(44, 3),
(45, 1),
(45, 3),
(46, 1),
(46, 3),
(57, 1),
(57, 3),
(58, 1),
(58, 3),
(59, 1),
(59, 3),
(60, 1),
(60, 3),
(61, 1),
(61, 3),
(62, 1),
(62, 3),
(63, 1),
(63, 3),
(64, 1),
(64, 3),
(65, 1),
(77, 1),
(77, 3),
(78, 1),
(78, 3),
(79, 1),
(79, 3),
(80, 1),
(80, 3),
(81, 3),
(82, 1),
(82, 3),
(83, 1),
(83, 3),
(84, 1),
(84, 3),
(85, 1),
(85, 3),
(86, 1),
(86, 3),
(87, 1),
(87, 3),
(88, 1),
(88, 3),
(89, 1),
(89, 3),
(90, 1),
(90, 3),
(91, 1),
(91, 3),
(92, 1),
(92, 3),
(93, 1),
(93, 3),
(94, 1),
(94, 3),
(95, 1),
(95, 3),
(96, 1),
(96, 3),
(97, 1),
(97, 3),
(98, 1),
(98, 3),
(99, 1),
(99, 3),
(100, 1),
(100, 3),
(101, 1),
(101, 3),
(102, 1),
(102, 3),
(103, 1),
(103, 3),
(104, 1),
(104, 3),
(105, 1),
(105, 3),
(106, 1),
(106, 3),
(107, 1),
(107, 3),
(108, 1),
(108, 3),
(109, 1),
(109, 3),
(110, 1),
(110, 3),
(111, 1),
(111, 3),
(112, 1),
(112, 3),
(113, 1),
(113, 3),
(114, 1),
(114, 3),
(115, 1),
(115, 3),
(116, 1),
(116, 3),
(127, 1),
(127, 3),
(128, 1),
(128, 3),
(129, 1),
(129, 3),
(130, 1),
(130, 3),
(131, 1),
(131, 3),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `personal_tags`
--

CREATE TABLE `personal_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `personal_tags`
--

INSERT INTO `personal_tags` (`id`, `tag`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'testare', 17, '2020-05-20 08:09:11', '2020-05-20 08:09:11'),
(2, 'dasda', 17, '2020-05-20 08:17:16', '2020-05-20 08:17:16'),
(3, 'tyrdf', 17, '2020-05-20 11:42:24', '2020-05-20 11:42:24'),
(4, 'fdsdf', 17, '2020-05-20 11:42:24', '2020-05-20 11:42:24'),
(5, 'test', 17, '2020-06-02 11:07:49', '2020-06-02 11:07:49'),
(6, 'Schauspieler', 22, '2020-06-09 17:14:10', '2020-06-09 17:14:10'),
(7, 'ZDF', 22, '2020-06-09 17:14:10', '2020-06-09 17:14:10');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2020-03-12 09:32:06', '2020-03-12 09:32:06');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `inputs` text COLLATE utf8mb4_unicode_ci,
  `languages` text COLLATE utf8mb4_unicode_ci,
  `general_tags` text COLLATE utf8mb4_unicode_ci,
  `skill_tags` text COLLATE utf8mb4_unicode_ci,
  `fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_fee` float DEFAULT NULL,
  `end_fee` float DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `files` text COLLATE utf8mb4_unicode_ci,
  `photos` text COLLATE utf8mb4_unicode_ci,
  `filmography` text COLLATE utf8mb4_unicode_ci,
  `biography` text COLLATE utf8mb4_unicode_ci,
  `other` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `subitem_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videos` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT '0',
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `long_description` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `youtube_videos` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `profiles`
--

INSERT INTO `profiles` (`id`, `inputs`, `languages`, `general_tags`, `skill_tags`, `fee`, `start_fee`, `end_fee`, `currency`, `files`, `photos`, `filmography`, `biography`, `other`, `user_id`, `subitem_id`, `created_at`, `updated_at`, `profile_title`, `profile_location`, `videos`, `status`, `short_description`, `long_description`, `slug`, `reason`, `youtube_videos`) VALUES
(1, '[{\"title\":\"Body height\",\"description\":\"complete for better results\",\"value\":\"185\"},{\"title\":\"Weight\",\"description\":\"complete for better results\",\"value\":\"80\"},{\"title\":\"Stature\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Ethn. appearance\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Hair color\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Hair length\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Eyes color\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Nationality\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Skin Color\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Dialects\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Pitch of the voice\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Singing\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Instruments\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Preffered work area\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Immediate place of work\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Federal state (1st residence)\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"2nd residence\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Accommodation\",\"description\":\"complete for better results\",\"value\":null}]', '[{\"title\":\"Beginner\",\"value\":\"English\"},{\"title\":\"Medium\",\"value\":\"French\"}]', '[\"Horror\",\"Karate movies\",\"ZEN\"]', '[\"Horror\"]', 'hourly', 100, 100, 'dollar', '[{\"download_link\":\"profiles\\/files\\/19\\/file5ef1bfd6e53a3.xlsx\",\"original_name\":\"file5ef1bfd6e53a3.xlsx\"}]', '[\"profiles\\/images\\/19\\/image5ef1bfe944a31.png\",\"profiles\\/images\\/19\\/image5ef1bfe94538b.jpeg\",\"profiles\\/images\\/19\\/image5ef1bfe94560f.jpeg\"]', '[{\"filmography_title\":\"This is an example of filmography title\",\"filmography_short_description\":\"This is a short example of filmography description, but not long enough to describe all my skills and all my movies.\"}]', '[{\"biography_title\":\"This is an example of biography title\",\"biography_short_description\":\"This is a short example of biography description, but not long enough to describe all my skills and all my movies.\"}]', '[{\"other_title\":\"This is an example of other info title\",\"other_short_description\":\"This is a short example of other info description, but not long enough to describe all my skills and all my movies.\"}]', 19, 4, '2020-06-23 08:38:16', '2020-06-23 08:55:09', 'Simple actor title', 'Constanta, Romania', '[{\"download_link\":\"profiles\\/videos\\/19\\/video5ef1c35fb0aeb.mp4\",\"original_name\":\"video5ef1c35fb0aeb.mp4\"}]', 1, NULL, NULL, 'test-3', NULL, NULL),
(3, '[{\"title\":\"Hight\",\"description\":\"Size in cm\",\"value\":null},{\"title\":\"Species\",\"description\":\"e.g. dog, cat, bird\",\"value\":null},{\"title\":\"Breed\",\"description\":\"e.g. shepherd for dogs\",\"value\":null},{\"title\":\"Color\",\"description\":\"e.g. black, white\",\"value\":null},{\"title\":\"Age\",\"description\":\"How old is your animal?\",\"value\":null},{\"title\":\"Acting experience\",\"description\":\"How many Projects?\",\"value\":null},{\"title\":\"Mind\",\"description\":\"Whats the character?\",\"value\":null},{\"title\":\"Talents & Skills\",\"description\":\"e.g. dancing\",\"value\":null},{\"title\":\"Others\",\"description\":\"Anything that comes to your mind\",\"value\":null},{\"title\":\"Spezies\",\"description\":\"z.b Hund, Pferd, Kamel\",\"value\":null},{\"title\":\"Rasse\",\"description\":\"z.b Sch\\u00e4ferhund, Vollblut\",\"value\":null}]', '[{\"title\":\"ro\",\"value\":\"Beginner\"}]', '[\"Goose\",\"Raven\"]', '[\"Mouse\",\"Panda\"]', 'hourly', 50, 50, 'dollar', NULL, '[\"profiles\\/images\\/21\\/image5ef215733e381.jpg\",\"profiles\\/images\\/21\\/image5ef215733e5cb.png\",\"profiles\\/images\\/21\\/image5ef215733e771.png\",\"profiles\\/images\\/21\\/image5ef215733f102.png\",\"profiles\\/images\\/21\\/image5ef215733fa67.png\",\"profiles\\/images\\/21\\/image5ef215733fdb7.png\",\"profiles\\/images\\/21\\/image5ef2157340f4f.png\"]', NULL, NULL, NULL, 19, 3, '2020-06-23 14:41:47', '2020-08-21 12:02:42', 'asdxc', 'Constanța, România', NULL, 0, NULL, NULL, 'test-4', NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"profiles\\/images\\/19\\/image5efdc714193ac.jpg\",\"profiles\\/images\\/19\\/image5efdc71419b82.jpg\",\"profiles\\/images\\/19\\/image5efdc71419c90.jpg\"]', NULL, NULL, NULL, 19, 4, '2020-07-02 11:37:56', '2020-07-02 11:37:56', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, '[\"test\"]', '[\"Horror\"]', 'hourly', 12, 12, 'dollar', NULL, NULL, NULL, NULL, NULL, 19, 4, '2020-07-07 06:44:47', '2020-07-07 12:11:57', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[{\"filmography_title\":\"test123\",\"filmography_short_description\":\"testare\"},{\"filmography_title\":\"sdasd123\",\"filmography_short_description\":\"asda\"}]', NULL, NULL, 19, 4, '2020-07-07 07:45:01', '2020-07-07 12:24:16', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[{\"filmography_title\":\"test\",\"filmography_short_description\":\"test\"},{\"filmography_title\":\"testare\",\"filmography_short_description\":\"test\"}]', '[{\"biography_title\":\"test\",\"biography_short_description\":\"asdas\"}]', NULL, 19, 4, '2020-07-13 05:26:05', '2020-07-13 05:26:12', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(13, '[{\"title\":\"Body height\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Weight\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Stature\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Ethn. appearance\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Hair color\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Hair length\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Eyes color\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Nationality\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Skin Color\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Dialects\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Pitch of the voice\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Singing\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Instruments\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Preffered work area\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Immediate place of work\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Federal state (1st residence)\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"2nd residence\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Accommodation\",\"description\":\"complete for better results\",\"value\":null}]', '[{\"title\":\"Beginner\",\"value\":\"English\"}]', '[\"ZEN\",\"Comedy\",\"testare\"]', '[\"Karate movies\",\"test\"]', 'hourly', 125, 125, 'dollar', NULL, NULL, NULL, NULL, NULL, 19, 4, '2020-07-13 06:37:15', '2020-07-13 06:37:15', 'ggdfgdf', 'Romanina, Provincia Roma, Italia', NULL, 0, NULL, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"profiles\\/images\\/19\\/image5f0c52207dfff.png\"]', NULL, NULL, NULL, 19, 4, '2020-07-13 12:22:56', '2020-07-13 12:22:56', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(23, '[{\"title\":\"Hight\",\"description\":\"Size in cm\",\"value\":\"120\"},{\"title\":\"Species\",\"description\":\"e.g. dog, cat, bird\",\"value\":\"Dog\"},{\"title\":\"Breed\",\"description\":\"e.g. shepherd for dogs\",\"value\":\"shepherd for dogs\"},{\"title\":\"Color\",\"description\":\"e.g. black, white\",\"value\":\"red\"},{\"title\":\"Age\",\"description\":\"How old is your animal?\",\"value\":\"12\"},{\"title\":\"Acting experience\",\"description\":\"How many Projects?\",\"value\":\"123\"},{\"title\":\"Mind\",\"description\":\"Whats the character?\",\"value\":\"test\"},{\"title\":\"Talents & Skills\",\"description\":\"e.g. dancing\",\"value\":\"test\"},{\"title\":\"Others\",\"description\":\"Anything that comes to your mind\",\"value\":\"test\"},{\"title\":\"Spezies\",\"description\":\"z.b Hund, Pferd, Kamel\",\"value\":\"test\"},{\"title\":\"Rasse\",\"description\":\"z.b Sch\\u00e4ferhund, Vollblut\",\"value\":\"test\"}]', '[{\"title\":\"none\",\"value\":\"Beginner\"}]', '[\"Tiger\",\"Cats\"]', '[\"Tiger\",\"Dogs\"]', 'hourly', 10, 10, 'dollar', NULL, NULL, NULL, NULL, NULL, 19, 3, '2020-08-13 16:14:29', '2020-08-21 12:20:01', 'Animal Dog', 'Constanța, Strada Gării, Constanța, România', NULL, 0, NULL, NULL, 'animal-dog0', NULL, NULL),
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[{\"filmography_title\":\"test\",\"filmography_short_description\":\"testare\"}]', NULL, NULL, 19, 4, '2020-08-17 06:44:29', '2020-08-17 06:44:29', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(27, '[{\"title\":\"Body height\",\"description\":\"complete for better results\",\"value\":\"120\"},{\"title\":\"Weight\",\"description\":\"complete for better results\",\"value\":\"80\"},{\"title\":\"Stature\",\"description\":\"complete for better results\",\"value\":\"medium\"},{\"title\":\"Ethn. appearance\",\"description\":\"complete for better results\",\"value\":\"ro\"},{\"title\":\"Hair color\",\"description\":\"complete for better results\",\"value\":\"brown\"},{\"title\":\"Hair length\",\"description\":\"complete for better results\",\"value\":\"long\"},{\"title\":\"Eyes color\",\"description\":\"complete for better results\",\"value\":\"brown\"},{\"title\":\"Nationality\",\"description\":\"complete for better results\",\"value\":\"Dac\"},{\"title\":\"Skin Color\",\"description\":\"complete for better results\",\"value\":\"pink\"},{\"title\":\"Dialects\",\"description\":\"complete for better results\",\"value\":\"romanian\"},{\"title\":\"Pitch of the voice\",\"description\":\"complete for better results\",\"value\":\"test\"},{\"title\":\"Singing\",\"description\":\"complete for better results\",\"value\":\"test\"},{\"title\":\"Instruments\",\"description\":\"complete for better results\",\"value\":\"guitar\"},{\"title\":\"Preffered work area\",\"description\":\"complete for better results\",\"value\":\"office\"},{\"title\":\"Immediate place of work\",\"description\":\"complete for better results\",\"value\":\"don\'t know\"},{\"title\":\"Federal state (1st residence)\",\"description\":\"complete for better results\",\"value\":\"Constanta\"},{\"title\":\"2nd residence\",\"description\":\"complete for better results\",\"value\":\"Constanta\"},{\"title\":\"Accommodation\",\"description\":\"complete for better results\",\"value\":\"Constanta\"},{\"is_custom_field_added\":\"true\",\"custom_title_added\":\"testdadada\",\"custom_value_added\":\"dadadadatest\"},{\"is_custom_field_added\":\"true\",\"custom_title_added\":\"testdadada\",\"custom_value_added\":\"dadadadatest\"}]', '[{\"title\":\"Beginner\",\"value\":\"English\"}]', '[\"Social\",\"new_hash\"]', '[\"Animation\",\"##new_sport\"]', 'day', 123, 123, 'euro', '[{\"download_link\":\"profiles\\/files\\/19\\/file5f3b7794412d6.PNG\",\"original_name\":\"file5f3b7794412d6.PNG\"},{\"download_link\":\"profiles\\/files\\/19\\/file5f3b77815be83.jpg\",\"original_name\":\"file5f3b77815be83.jpg\"}]', '[\"profiles\\/images\\/19\\/image5f3b77d0a6ed8.png\",\"profiles\\/images\\/19\\/image5f3b77d0a778b.jpg\",\"profiles\\/images\\/19\\/image5f3b77d0a7935.jpg\",\"profiles\\/images\\/19\\/image5f3b9aef3b88d.jpg\"]', '[{\"filmography_title\":\"This is an example of filmography title\",\"filmography_short_description\":\"This is a short example of filmography description, but not long enough to describe all my skills and all my movies.\"}]', '[{\"biography_title\":\"test\",\"biography_short_description\":\"asdas\"},{\"biography_title\":\"testaree\",\"biography_short_description\":\"adsdasd\"}]', '[{\"other_title\":\"This is an example of other info title\",\"other_short_description\":\"This is a short example of other info description, but not long enough to describe all my skills and all my movies.\"}]', 19, 4, '2020-08-17 06:51:52', '2020-08-21 12:19:20', 'dsada', 'sdasdasdasd, 154th Place, Calumet City, Illinois, Statele Unite ale Americii', '[{\"download_link\":\"profiles\\/videos\\/19\\/video5f3b779a6a064.mp4\",\"original_name\":\"video5f3b779a6a064.mp4\"}]', 0, NULL, NULL, 'dsada1', NULL, NULL),
(55, '[{\"title\":\"Hight\",\"description\":\"Size in cm\",\"value\":\"120\"},{\"title\":\"Species\",\"description\":\"e.g. dog, cat, bird\",\"value\":\"Dog\"},{\"title\":\"Breed\",\"description\":\"e.g. shepherd for dogs\",\"value\":\"dogs\"},{\"title\":\"Color\",\"description\":\"e.g. black, white\",\"value\":null},{\"title\":\"Age\",\"description\":\"How old is your animal?\",\"value\":null},{\"title\":\"Acting experience\",\"description\":\"How many Projects?\",\"value\":null},{\"title\":\"Mind\",\"description\":\"Whats the character?\",\"value\":null},{\"title\":\"Talents & Skills\",\"description\":\"e.g. dancing\",\"value\":null},{\"title\":\"Others\",\"description\":\"Anything that comes to your mind\",\"value\":null},{\"title\":\"Spezies\",\"description\":\"z.b Hund, Pferd, Kamel\",\"value\":null},{\"title\":\"Rasse\",\"description\":\"z.b Sch\\u00e4ferhund, Vollblut\",\"value\":null}]', '[{\"title\":\"Ham ham\",\"value\":\"Beginner\"}]', '[\"Giraffe\",\"Hamster\"]', '[\"Giraffe\",\"Hamster\"]', 'hourly', 120, 120, 'euro', NULL, '[\"profiles/images/19/image5f4e446715d6e.jpg\",\"profiles/images/19/image5f4e4813851dc.png\",\"profiles/images/19/image5f3c3351e232a.jpg\",\"profiles/images/19/image5f3c3351e273a.jpg\",\"profiles/images/19/image5f4e2e19b331f.png\"]', '[{\"filmography_title\":\"test\",\"filmography_short_description\":\"this is a short test description\"},{\"filmography_title\":\"another test title edited again edited\",\"filmography_short_description\":\"this is anther test title\"}]', '[{\"biography_title\":\"title biography edit\",\"biography_short_description\":\"test biography\"}]', '[{\"other_title\":\"test1234\",\"other_short_description\":\"test\"}]', 19, 3, '2020-08-18 20:00:01', '2020-09-01 13:26:38', 'teasdasd', 'Constanța, România', NULL, 0, NULL, NULL, 'test-4', NULL, NULL),
(56, '[]', '[{\"title\":\"Beginner\",\"value\":\"test\"}]', '[\"Assistant location manager\",\"Location scout\",\"Location assistant\",\"Costume standby\",\"Conductor\\/ orchestrator\"]', '[\"test\"]', 'day', 120, 120, 'dollar', NULL, NULL, NULL, NULL, NULL, 19, 2, '2020-08-19 08:59:16', '2020-08-21 11:29:04', 'asdasdasd', 'Adrenalin Quarry Ltd, Lower Clicker Road, Menheniot, Liskeard, Regatul Unit', NULL, 0, NULL, NULL, 'test-2', NULL, NULL),
(58, '[]', NULL, '[\"test\"]', NULL, 'hourly', 100, 100, 'dollar', '[{\"download_link\":\"items\\/files\\/19\\/file5f3cec209311e.txt\",\"original_name\":\"file5f3cec209311e.txt\"}]', '[\"items\\/images\\/19\\/image5f3cec2092d94.jpg\"]', NULL, NULL, NULL, 19, 10, '2020-08-19 09:08:48', '2020-08-21 09:56:25', 'asdasdasd', 'Rte 17, Paramus, New Jersey, Statele Unite ale Americii', NULL, 0, 'Short desc', 'Long desc Long desc Long desc Long desc Long desc Long desc Long desc Long desc Long desc Long desc Long desc Long desc Long desc Long desc', 'test-1', NULL, NULL),
(59, '[]', NULL, '[\"Clothing\",\"Countrywear\",\"Footwear\",\"Accessories\",\"Hats\"]', NULL, 'hourly', 50, 50, 'euro', '[{\"download_link\":\"items\\/files\\/19\\/file5f3cef439623d.css\",\"original_name\":\"file5f3cef439623d.css\"}]', '[\"items\\/images\\/19\\/image5f3cef4395eea.jpg\"]', NULL, NULL, NULL, 19, 1, '2020-08-19 09:22:11', '2020-08-21 12:02:27', 'adsdasd', 'Texas, Statele Unite ale Americii', NULL, 0, 'testeasdasd', 'testarerasdasd', 'test-4', NULL, NULL),
(61, '[]', NULL, '[\"Countrywear\",\"Snow Machine\",\"Gituar\",\"Hostels\",\"Hotel\"]', NULL, 'hourly', 12, 12, 'euro', '[{\"download_link\":\"items\\/files\\/19\\/file5f3d14c33d0c0.css\",\"original_name\":\"file5f3d14c33d0c0.css\"}]', '[\"items\\/images\\/19\\/image5f3d14c33cb57.jpg\",\"items\\/images\\/19\\/image5f3d15770efe8.jpg\"]', NULL, NULL, NULL, 19, 1, '2020-08-19 12:02:11', '2020-08-21 11:37:46', 'testare nou test', 'Tessenderlo, Belgia', '[{\"download_link\":\"profiles\\/videos\\/19\\/video5f3b779a6a064.mp4\",\"original_name\":\"video5f3b779a6a064.mp4\"},{\"download_link\":\"profiles\\/videos\\/19\\/video5f3b779a6a064.mp4\",\"original_name\":\"video5f3b779a6a064.mp4\"}]', 1, 'dasdas', 'dasdasd', 'testare-nou', NULL, '[\"https:\\/\\/www.youtube.com\\/watch?v=V-_Y5sCaLpE\",\"https:\\/\\/www.youtube.com\\/watch?v=s8FvrjilgyU\",\"https:\\/\\/www.youtube.com\\/watch?v=sZj4au4VdsM\",\"testare\"]'),
(65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"profiles/images/21/image5f4632e7ca4d2.png\",\"profiles/images/21/image5f4632e7c6027.png\",\"profiles/images/21/image5f4632e7c7896.png\"]', '[{\"filmography_title\":\"dlnfdnkldfgklnd\",\"filmography_short_description\":\"dfnldfgnlkdfgnkdglmkklk\"}]', NULL, NULL, 21, 4, '2020-08-26 09:49:00', '2020-09-07 13:55:17', '123TEST123', NULL, NULL, 0, NULL, NULL, NULL, 'The profile was not accepted because is not complete.', NULL),
(66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[{\"filmography_title\":\"dasd\",\"filmography_short_description\":\"asddasd\"},{\"filmography_title\":\"gdfgdfgdfgd\",\"filmography_short_description\":\"fgdfgdfgdfg\"}]', NULL, NULL, 19, 4, '2020-08-28 07:43:44', '2020-08-28 07:44:28', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[{\"filmography_title\":\"dasdasd\",\"filmography_short_description\":\"asdasddasd\"},{\"filmography_title\":\"dasgsdfgdf\",\"filmography_short_description\":\"gsdawfsdf\"},{\"filmography_title\":\"adsda\",\"filmography_short_description\":\"sdasd\"}]', NULL, NULL, 19, 4, '2020-08-28 07:46:53', '2020-08-28 07:47:09', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(68, '[{\"title\":\"Body height\",\"description\":\"complete for better results\",\"value\":\"1,28\"},{\"title\":\"Weight\",\"description\":\"complete for better results\",\"value\":\"250\"},{\"title\":\"Stature\",\"description\":\"complete for better results\",\"value\":\"not-so-slim\"},{\"title\":\"Ethn. appearance\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Hair color\",\"description\":\"complete for better results\",\"value\":\"Brown\"},{\"title\":\"Hair length\",\"description\":\"complete for better results\",\"value\":\"as(s) long (as you can see)\"},{\"title\":\"Eyes color\",\"description\":\"complete for better results\",\"value\":\"White!\"},{\"title\":\"Nationality\",\"description\":\"complete for better results\",\"value\":\"German\"},{\"title\":\"Skin Color\",\"description\":\"complete for better results\",\"value\":\"browner than brown\"},{\"title\":\"Dialects\",\"description\":\"complete for better results\",\"value\":\"K\\u00f6lsch\"},{\"title\":\"Pitch of the voice\",\"description\":\"complete for better results\",\"value\":\"high\"},{\"title\":\"Singing\",\"description\":\"complete for better results\",\"value\":\"terrible\"},{\"title\":\"Instruments\",\"description\":\"complete for better results\",\"value\":\"Guitar, Piano, Mayonaise\"},{\"title\":\"Preffered work area\",\"description\":\"complete for better results\",\"value\":\"Hinter der Kamera\"},{\"title\":\"Immediate place of work\",\"description\":\"complete for better results\",\"value\":\"Yavu GbR, Duesseldorf\"},{\"title\":\"Federal state (1st residence)\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"2nd residence\",\"description\":\"complete for better results\",\"value\":null},{\"title\":\"Accommodation\",\"description\":\"complete for better results\",\"value\":null}]', '[{\"title\":\"Advanced\",\"value\":\"English\"},{\"title\":\"Medium\",\"value\":\"French\"},{\"title\":\"German\",\"value\":\"Beginner\"}]', '[\"Comedy\",\"Drama\",\"Innocent\",\"Regular Guy\",\"THE CREATOR\",\"Action\",\"Crime\",\"Satire\",\"Science fiction\",\"Western\"]', '[\"Animation\",\"####Climbing\",\"####Running\",\"####Swimming\",\"#Eating\"]', 'hourly', 1.5e15, 1.5e15, 'euro', NULL, '[\"profiles\\/images\\/39\\/image5f5102e7a2517.jpg\"]', '[{\"filmography_title\":\"Der wei\\u00dfe Hai\",\"filmography_short_description\":\"Ich war der Stein der in der ersten Szene weggekickt wurde.\"}]', '[{\"biography_title\":\"Regular Guy\",\"biography_short_description\":\"I\\u00b4m just a regular, everyday, normal guy!\"}]', '[{\"other_title\":\"Arbeit\",\"other_short_description\":\"Arbeit diese gut!\"}]', 39, 4, '2020-09-03 14:48:07', '2020-09-04 09:06:19', 'Patrick Heimansberg', 'Düsseldorf, Deutschland', NULL, 0, NULL, NULL, 'patrick-heimansberg0', NULL, NULL),
(69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[{\"download_link\":\"profiles\\/files\\/19\\/file5f573c5f82608.jpg\",\"original_name\":\"file5f573c5f82608.jpg\"},{\"download_link\":\"profiles\\/files\\/19\\/file5f573c5f830cd.jpg\",\"original_name\":\"file5f573c5f830cd.jpg\"},{\"download_link\":\"profiles\\/files\\/19\\/file5f573c5f83464.jpg\",\"original_name\":\"file5f573c5f83464.jpg\"},{\"download_link\":\"profiles\\/files\\/19\\/file5f573c5f8373d.jpg\",\"original_name\":\"file5f573c5f8373d.jpg\"},{\"download_link\":\"profiles\\/files\\/19\\/file5f573c5f83a0c.jpg\",\"original_name\":\"file5f573c5f83a0c.jpg\"}]', NULL, NULL, '[]', NULL, 19, 4, '2020-09-07 13:50:43', '2020-09-08 10:34:15', '123test123', NULL, '[{\"download_link\":\"profiles\\/videos\\/19\\/video5f573c69caf22.mp4\",\"original_name\":\"video5f573c69caf22.mp4\"}]', 2, NULL, NULL, NULL, 'All informations must be completed!', '[\"https:\\/\\/www.youtube.com\\/watch?v=V-_Y5sCaLpE\",\"https:\\/\\/www.youtube.com\\/watch?v=s8FvrjilgyU\",\"https:\\/\\/www.youtube.com\\/watch?v=sZj4au4VdsM\",\"testare\"]'),
(75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 4, '2020-09-08 10:40:11', '2020-09-08 12:30:34', NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Complete all your info to place it on the search', '[\"https:\\/\\/www.youtube.com\\/watch?v=V-_Y5sCaLpE\"]');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories` text COLLATE utf8mb4_unicode_ci,
  `storyline` text COLLATE utf8mb4_unicode_ci,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `writer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `team_description` text COLLATE utf8mb4_unicode_ci,
  `files` text COLLATE utf8mb4_unicode_ci,
  `photos` text COLLATE utf8mb4_unicode_ci,
  `jobs` text COLLATE utf8mb4_unicode_ci,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `genres` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `projects`
--

INSERT INTO `projects` (`id`, `title`, `start_fee`, `end_fee`, `categories`, `storyline`, `director`, `writer`, `start_date`, `end_date`, `about`, `team_description`, `files`, `photos`, `jobs`, `tags`, `created_at`, `updated_at`, `user_id`, `slug`, `genres`) VALUES
(4, 'Hindenburg', '3600', '800000', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\"]', 'Hindenburg ist ein historischer Film aus 1958', 'Sebastian Wiedel', 'Delia Eick', '2020-05-27 00:00:00', '2020-05-27 00:00:00', 'Dieser Film wird ein historischer Blockbuster', 'besteht aus vielen kompetenten Filmschaffenden', '[{\"download_link\":\"projects\\/files\\/22\\/file5edfc535b9458.jpg\",\"original_name\":\"file5edfc535b9458.jpg\"}]', '[\"projects\\/images\\/22\\/image5edfc535b8ace.jpg\",\"projects\\/images\\/22\\/image5ee3458a6c701.png\",\"projects\\/images\\/22\\/image5ee345e6340d5.jpg\"]', '[\"10\"]', '[\"Places\",\"Boats\",\"Costumes\",\"Equipment\",\"Schauspieler\"]', '2020-06-12 09:07:50', '2020-06-12 09:07:50', 22, 'hindenburg', NULL),
(27, 'dsadas', '3600', '800000', '[\"14\",\"16\"]', 'dasd', 'dasd', 'asd', '2020-08-12 00:00:00', '2020-09-01 00:00:00', 'dsada', 'sdasd', '[{\"download_link\":\"projects\\/files\\/17\\/file5f328cb8360da.png\",\"original_name\":\"file5f328cb8360da.png\"}]', '[\"projects\\/images\\/17\\/image5f328cb8349d7.png\"]', '[\"6\",\"7\",\"8\",\"9\",\"11\"]', '[\"Artefacts\",\"Vehicules\",\"Arms\",\"Pets\",\"fdsdf\"]', '2020-08-11 12:19:04', '2020-08-11 12:19:04', 17, 'dsadas', '[\"3\",\"5\"]'),
(29, 'tsdfsdf', '3600', '800000', '[\"13\",\"16\",\"19\"]', 'sdfsdf', 'sdfsd', 'fsdf', '2020-08-11 00:00:00', '2020-08-31 00:00:00', 'dasdas', 'dasdasd', '[{\"download_link\":\"projects\\/files\\/17\\/file5f32939697760.png\",\"original_name\":\"file5f32939697760.png\"}]', '[\"projects\\/images\\/17\\/image5f32939696045.png\"]', '[\"6\",\"7\",\"8\",\"9\",\"11\"]', '[\"Places\",\"Boats\",\"Pets\",\"Kids\"]', '2020-08-11 12:48:22', '2020-08-11 12:48:22', 17, 'tsdfsdf', '[\"1\",\"2\"]');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `project_categories`
--

CREATE TABLE `project_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `project_categories`
--

INSERT INTO `project_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(12, 'Commercial', '2020-06-24 13:39:49', '2020-06-24 13:40:16'),
(13, 'Ads', '2020-06-24 13:40:23', '2020-06-24 13:40:23'),
(14, 'Audio', '2020-06-24 13:40:45', '2020-06-24 13:40:45'),
(15, 'Cinema', '2020-06-24 13:41:02', '2020-06-24 13:41:02'),
(16, 'Television', '2020-06-24 13:41:10', '2020-06-24 13:41:10'),
(17, 'Theater', '2020-06-24 13:41:17', '2020-06-24 13:41:17'),
(18, 'Documentary', '2020-06-24 13:41:30', '2020-06-24 13:41:30'),
(19, 'Others', '2020-06-24 13:42:29', '2020-06-24 13:42:29');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `project_generes`
--

CREATE TABLE `project_generes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `project_generes`
--

INSERT INTO `project_generes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Biography', '2020-07-06 09:56:51', '2020-07-06 09:56:51'),
(2, 'Animation', '2020-07-06 09:56:55', '2020-07-06 09:56:55'),
(3, 'Adventure', '2020-07-06 09:57:00', '2020-07-06 09:57:00'),
(4, 'Cartoon', '2020-07-06 09:57:13', '2020-07-06 09:57:13'),
(5, 'Cabaret', '2020-07-06 09:57:17', '2020-07-06 09:57:17');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `rating_profiles`
--

CREATE TABLE `rating_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_profile` int(11) DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(2, 'user', 'Normal User', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(3, 'Admin MovieCircle', 'Administrator Website', '2020-06-09 13:25:21', '2020-06-09 13:27:00');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Moviecircle', '', 'text', 1, 'Site'),
(3, 'site.logo', 'Site Logo', 'settings/June2020/QVz7yraTSQ8kitFrVpVd.png', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', 'settings/April2020/icKEXiC1EgMftVJvpyrM.png', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'MovieCircle', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to MovieCircle AdminPanel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', 'settings/April2020/S26ywwwgqOEMIGKOtpZP.png', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin'),
(11, 'site.description_en', 'Site Description en', 'This is a short description for the website', '', 'text', 2, 'Site'),
(12, 'site.description_de', 'Site Description de', 'Dies ist eine Beschreibung für die Website', '', 'text', 2, 'Site'),
(15, 'statics.about_en', 'About us description en', '<p>EN Aliquam tempus nibh quis justo maximus hendrerit.</p>\r\n<p>Quisque nec risus cursus mauris sagittis semper eu eu turpis. Praesent sit amet metus pharetra ex blandit laoreet. Pellentesque lobortis, libero eget viverra pellentesque, sem odio semper justo, a ornare odio purus et ex. Pellentesque vitae sodales neque, sed cursus orci. Nunc ex neque, aliquam in massa in, laoreet commodo augue. Aenean viverra dui turpis. Pellentesque ultrices dui vel tristique consequat. Fusce at nunc ex. Vestibulum et efficitur risus. Vestibulum vel mauris justo. Curabitur iaculis egestas enim, ut luctus elit facilisis non. Suspendisse vel ipsum sed massa gravida varius. Praesent pulvinar, leo et fringilla efficitur, sapien est pharetra elit, vitae sodales leo augue quis felis.</p>\r\n<p>&nbsp;</p>\r\n<p>Morbi sem mi, tincidunt id imperdiet a, condimentum nec lorem.&nbsp;</p>\r\n<p>Sed vel lorem ac libero blandit pellentesque. Etiam condimentum, elit consequat venenatis faucibus, elit lacus vestibulum ex, nec faucibus lorem nisi sit amet urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque ipsum erat, tincidunt id facilisis a, ullamcorper sed lacus. Aenean lectus magna, rutrum eu massa sed, convallis vehicula ante. Sed laoreet tincidunt lacus, non dignissim leo ultrices venenatis.</p>\r\n<p>&nbsp;</p>\r\n<p>Duis et velit sit amet ex euismod rutrum.&nbsp;</p>\r\n<p>Duis ultrices a ex non maximus. Maecenas in neque sollicitudin, consectetur urna vel, varius ipsum. Maecenas non pulvinar mauris, nec lacinia dolor. Nunc consequat orci at felis suscipit lobortis. Donec egestas ac libero at dapibus. Mauris at sem tristique, euismod urna mattis, facilisis orci. Nam hendrerit condimentum nibh quis efficitur. Nunc tincidunt malesuada nunc, at eleifend libero maximus nec.</p>\r\n<p>&nbsp;</p>\r\n<p>Aliquam ac enim non nunc malesuada luctus eu eget diam.&nbsp;</p>\r\n<p>Nulla mollis enim vel cursus aliquet. Sed at fringilla urna. Suspendisse porttitor, elit at iaculis porttitor, risus elit molestie dolor, eu volutpat dui eros ut mi. Mauris orci orci, sollicitudin at odio et, aliquam auctor neque. Cras efficitur erat sed fermentum facilisis. Quisque semper pellentesque enim, at dapibus velit volutpat ut. Aliquam et sagittis orci. Nulla facilisi. Sed in libero vel massa ultricies egestas. Aenean ac massa nisi. Vestibulum pharetra orci quam, non finibus purus sodales at. In vestibulum sem sed sem eleifend facilisis et vitae ex. Fusce nulla ligula, facilisis interdum felis sit amet, blandit facilisis eros. Phasellus ullamcorper vitae leo quis euismod. Curabitur eu lacus nunc.</p>\r\n<p>&nbsp;</p>\r\n<p>Nam bibendum lacus lorem, eleifend accumsan diam vehicula in. Cras consequat, metus ac tempus rhoncus, tortor mauris tristique diam, sit amet accumsan dui metus at ex. Nam molestie mauris eget efficitur scelerisque. Suspendisse ac lectus et eros vulputate tempus eget vel orci. Fusce laoreet sagittis est vel consectetur. Suspendisse quis pulvinar velit. Aenean vel eros ultricies, congue mi ut, fringilla nibh. Mauris consequat scelerisque odio at euismod.</p>\r\n<p>&nbsp;</p>\r\n<p>Donec ut erat hendrerit, varius est vel, ultricies lorem.&nbsp;</p>\r\n<p>Maecenas purus metus, molestie sit amet tincidunt vel, tempus et velit. Aliquam eleifend, magna in interdum gravida, urna libero euismod nibh, non maximus urna arcu ac leo. Suspendisse varius vel dui non imperdiet. Integer sed nulla sit amet ex condimentum eleifend. Etiam vitae arcu a arcu facilisis luctus. Nam varius ex eget diam facilisis, id tempus arcu pellentesque. Sed a tortor maximus, varius nisi quis, lacinia est. Cras vulputate convallis eros quis vulputate. Nam volutpat est nec eros semper, pellentesque ultrices magna dictum.</p>\r\n<p>&nbsp;</p>\r\n<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec ultrices vel turpis eu sodales. Donec aliquet tristique quam vel gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis molestie dui et tincidunt pretium. Pellentesque pharetra auctor faucibus. Duis ultricies ante nibh, rutrum aliquet lectus porta vitae. Fusce rutrum ac tellus non sodales. Ut vitae lacus eu sapien interdum mattis ut condimentum eros. Aenean accumsan tincidunt egestas.</p>\r\n<p>&nbsp;</p>\r\n<p>Nulla eu feugiat enim, sit amet congue mauris. Vivamus tortor est, tristique eget sapien at, malesuada auctor tellus. Etiam at nulla eu nisi tincidunt ultricies. Ut finibus nibh nisi, sed accumsan ligula consequat ac. Nulla quis ante turpis. Ut commodo quam non tellus pellentesque elementum. Phasellus ac purus in risus luctus laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum luctus arcu nulla, tincidunt vehicula lacus ultricies eget. Nullam vitae malesuada leo. Nulla sed purus risus. Cras vehicula in quam vel aliquam. Suspendisse eu purus fringilla, efficitur felis sollicitudin, fermentum sem. Quisque sed nisl eu enim accumsan scelerisque. Cras aliquam egestas orci in tincidunt.</p>\r\n<p>&nbsp;</p>\r\n<p>Fusce id consectetur turpis.&nbsp;</p>\r\n<p>Cras imperdiet et dui et auctor. In eu eleifend nisi. Donec nec iaculis velit. Vestibulum mollis blandit ex, quis ultrices ex laoreet a. Ut lectus purus, gravida a fringilla in, sagittis at magna. Suspendisse et pharetra risus, ut condimentum risus. Aliquam erat volutpat. Fusce rhoncus maximus mi, nec ornare ligula maximus eu. Morbi in mattis ligula. Integer porttitor mi eu luctus ullamcorper.</p>\r\n<p>&nbsp;</p>\r\n<p>Suspendisse in luctus ex, vel egestas eros. Donec eget diam vitae mi tincidunt dictum. Suspendisse maximus in lacus non semper. In faucibus justo quis augue consequat, eu laoreet ipsum sagittis. Proin quis vulputate elit, in tristique elit. Nulla a posuere dolor, a tempus quam. Sed non venenatis nulla, ac molestie est. Phasellus aliquam, ligula sagittis pellentesque egestas, mi arcu cursus orci, sed tristique turpis metus in urna. Morbi convallis, tellus vel ullamcorper commodo, velit massa semper leo, vitae commodo sapien sem eget augue. Etiam auctor convallis tellus eget lacinia. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi bibendum sed tortor vitae auctor. Nulla facilisis justo sit amet nulla lobortis suscipit.</p>\r\n<p>&nbsp;</p>\r\n<p>Nam nulla nisi, fermentum a orci eu, dapibus molestie libero.&nbsp;</p>\r\n<p>Etiam quam nisi, euismod eget tempor eget, euismod sed arcu. Maecenas scelerisque at diam sit amet porttitor. In auctor lobortis quam iaculis aliquet. Proin nec turpis mi. Nam dui ex, laoreet vel facilisis in, iaculis id odio. Vestibulum ex dolor, blandit eu tortor ac, ullamcorper faucibus libero. Duis gravida commodo lacus at maximus. Aliquam erat volutpat. Morbi id lorem accumsan nunc commodo pharetra. Suspendisse potenti. Nunc vestibulum posuere mauris, in rhoncus augue consequat in. Integer ultrices vitae eros et efficitur. Suspendisse potenti. Morbi faucibus leo sit amet lacus posuere, et accumsan nunc sollicitudin. Sed in purus at metus euismod aliquam.</p>', '', 'rich_text_box', 6, 'Statics'),
(16, 'statics.about_de', 'About us description de', '<p>DE Aliquam tempus nibh quis justo maximus hendrerit.</p>\r\n<p>Quisque nec risus cursus mauris sagittis semper eu eu turpis. Praesent sit amet metus pharetra ex blandit laoreet. Pellentesque lobortis, libero eget viverra pellentesque, sem odio semper justo, a ornare odio purus et ex. Pellentesque vitae sodales neque, sed cursus orci. Nunc ex neque, aliquam in massa in, laoreet commodo augue. Aenean viverra dui turpis. Pellentesque ultrices dui vel tristique consequat. Fusce at nunc ex. Vestibulum et efficitur risus. Vestibulum vel mauris justo. Curabitur iaculis egestas enim, ut luctus elit facilisis non. Suspendisse vel ipsum sed massa gravida varius. Praesent pulvinar, leo et fringilla efficitur, sapien est pharetra elit, vitae sodales leo augue quis felis.</p>\r\n<p>&nbsp;</p>\r\n<p>Morbi sem mi, tincidunt id imperdiet a, condimentum nec lorem.&nbsp;</p>\r\n<p>Sed vel lorem ac libero blandit pellentesque. Etiam condimentum, elit consequat venenatis faucibus, elit lacus vestibulum ex, nec faucibus lorem nisi sit amet urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque ipsum erat, tincidunt id facilisis a, ullamcorper sed lacus. Aenean lectus magna, rutrum eu massa sed, convallis vehicula ante. Sed laoreet tincidunt lacus, non dignissim leo ultrices venenatis.</p>\r\n<p>&nbsp;</p>\r\n<p>Duis et velit sit amet ex euismod rutrum.&nbsp;</p>\r\n<p>Duis ultrices a ex non maximus. Maecenas in neque sollicitudin, consectetur urna vel, varius ipsum. Maecenas non pulvinar mauris, nec lacinia dolor. Nunc consequat orci at felis suscipit lobortis. Donec egestas ac libero at dapibus. Mauris at sem tristique, euismod urna mattis, facilisis orci. Nam hendrerit condimentum nibh quis efficitur. Nunc tincidunt malesuada nunc, at eleifend libero maximus nec.</p>\r\n<p>&nbsp;</p>\r\n<p>Aliquam ac enim non nunc malesuada luctus eu eget diam.&nbsp;</p>\r\n<p>Nulla mollis enim vel cursus aliquet. Sed at fringilla urna. Suspendisse porttitor, elit at iaculis porttitor, risus elit molestie dolor, eu volutpat dui eros ut mi. Mauris orci orci, sollicitudin at odio et, aliquam auctor neque. Cras efficitur erat sed fermentum facilisis. Quisque semper pellentesque enim, at dapibus velit volutpat ut. Aliquam et sagittis orci. Nulla facilisi. Sed in libero vel massa ultricies egestas. Aenean ac massa nisi. Vestibulum pharetra orci quam, non finibus purus sodales at. In vestibulum sem sed sem eleifend facilisis et vitae ex. Fusce nulla ligula, facilisis interdum felis sit amet, blandit facilisis eros. Phasellus ullamcorper vitae leo quis euismod. Curabitur eu lacus nunc.</p>\r\n<p>&nbsp;</p>\r\n<p>Nam bibendum lacus lorem, eleifend accumsan diam vehicula in. Cras consequat, metus ac tempus rhoncus, tortor mauris tristique diam, sit amet accumsan dui metus at ex. Nam molestie mauris eget efficitur scelerisque. Suspendisse ac lectus et eros vulputate tempus eget vel orci. Fusce laoreet sagittis est vel consectetur. Suspendisse quis pulvinar velit. Aenean vel eros ultricies, congue mi ut, fringilla nibh. Mauris consequat scelerisque odio at euismod.</p>\r\n<p>&nbsp;</p>\r\n<p>Donec ut erat hendrerit, varius est vel, ultricies lorem.&nbsp;</p>\r\n<p>Maecenas purus metus, molestie sit amet tincidunt vel, tempus et velit. Aliquam eleifend, magna in interdum gravida, urna libero euismod nibh, non maximus urna arcu ac leo. Suspendisse varius vel dui non imperdiet. Integer sed nulla sit amet ex condimentum eleifend. Etiam vitae arcu a arcu facilisis luctus. Nam varius ex eget diam facilisis, id tempus arcu pellentesque. Sed a tortor maximus, varius nisi quis, lacinia est. Cras vulputate convallis eros quis vulputate. Nam volutpat est nec eros semper, pellentesque ultrices magna dictum.</p>\r\n<p>&nbsp;</p>\r\n<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec ultrices vel turpis eu sodales. Donec aliquet tristique quam vel gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis molestie dui et tincidunt pretium. Pellentesque pharetra auctor faucibus. Duis ultricies ante nibh, rutrum aliquet lectus porta vitae. Fusce rutrum ac tellus non sodales. Ut vitae lacus eu sapien interdum mattis ut condimentum eros. Aenean accumsan tincidunt egestas.</p>\r\n<p>&nbsp;</p>\r\n<p>Nulla eu feugiat enim, sit amet congue mauris. Vivamus tortor est, tristique eget sapien at, malesuada auctor tellus. Etiam at nulla eu nisi tincidunt ultricies. Ut finibus nibh nisi, sed accumsan ligula consequat ac. Nulla quis ante turpis. Ut commodo quam non tellus pellentesque elementum. Phasellus ac purus in risus luctus laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum luctus arcu nulla, tincidunt vehicula lacus ultricies eget. Nullam vitae malesuada leo. Nulla sed purus risus. Cras vehicula in quam vel aliquam. Suspendisse eu purus fringilla, efficitur felis sollicitudin, fermentum sem. Quisque sed nisl eu enim accumsan scelerisque. Cras aliquam egestas orci in tincidunt.</p>\r\n<p>&nbsp;</p>\r\n<p>Fusce id consectetur turpis.&nbsp;</p>\r\n<p>Cras imperdiet et dui et auctor. In eu eleifend nisi. Donec nec iaculis velit. Vestibulum mollis blandit ex, quis ultrices ex laoreet a. Ut lectus purus, gravida a fringilla in, sagittis at magna. Suspendisse et pharetra risus, ut condimentum risus. Aliquam erat volutpat. Fusce rhoncus maximus mi, nec ornare ligula maximus eu. Morbi in mattis ligula. Integer porttitor mi eu luctus ullamcorper.</p>\r\n<p>&nbsp;</p>\r\n<p>Suspendisse in luctus ex, vel egestas eros. Donec eget diam vitae mi tincidunt dictum. Suspendisse maximus in lacus non semper. In faucibus justo quis augue consequat, eu laoreet ipsum sagittis. Proin quis vulputate elit, in tristique elit. Nulla a posuere dolor, a tempus quam. Sed non venenatis nulla, ac molestie est. Phasellus aliquam, ligula sagittis pellentesque egestas, mi arcu cursus orci, sed tristique turpis metus in urna. Morbi convallis, tellus vel ullamcorper commodo, velit massa semper leo, vitae commodo sapien sem eget augue. Etiam auctor convallis tellus eget lacinia. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi bibendum sed tortor vitae auctor. Nulla facilisis justo sit amet nulla lobortis suscipit.</p>\r\n<p>&nbsp;</p>\r\n<p>Nam nulla nisi, fermentum a orci eu, dapibus molestie libero.&nbsp;</p>\r\n<p>Etiam quam nisi, euismod eget tempor eget, euismod sed arcu. Maecenas scelerisque at diam sit amet porttitor. In auctor lobortis quam iaculis aliquet. Proin nec turpis mi. Nam dui ex, laoreet vel facilisis in, iaculis id odio. Vestibulum ex dolor, blandit eu tortor ac, ullamcorper faucibus libero. Duis gravida commodo lacus at maximus. Aliquam erat volutpat. Morbi id lorem accumsan nunc commodo pharetra. Suspendisse potenti. Nunc vestibulum posuere mauris, in rhoncus augue consequat in. Integer ultrices vitae eros et efficitur. Suspendisse potenti. Morbi faucibus leo sit amet lacus posuere, et accumsan nunc sollicitudin. Sed in purus at metus euismod aliquam.</p>', '', 'rich_text_box', 6, 'Statics'),
(18, 'statics.account_type_en', 'Description account type en', 'EN Donec vulputate enim ut magna aliquam, vel iaculis eros tempor. Vivamus tempor fermentum felis, accumsan blandit urna porta vel. Aliquam elementum mollis odio, ut pellentesque lectus feugiat vitae. Nam ut nisi velit. Donec ac ornare diam.', NULL, 'text', 7, 'Statics'),
(19, 'statics.account_type_de', 'Description account type de', 'DE Donec vulputate enim ut magna aliquam, vel iaculis eros tempor. Vivamus tempor fermentum felis, accumsan blandit urna porta vel. Aliquam elementum mollis odio, ut pellentesque lectus feugiat vitae. Nam ut nisi velit. Donec ac ornare diam.', NULL, 'text', 7, 'Statics'),
(23, 'statics.distribute_text_en', 'Distribute text en', 'Share your prototypes, files or flexi folders with your team, hire actors or crews for you project and stay in touch at a click-distance.', NULL, 'text', 8, 'Statics'),
(24, 'statics.distribute_text_de', 'Distribute text de', 'Teilen Sie Ihre Prototypen, Dateien oder Flexi-Ordner mit Ihrem Team, stellen Sie Schauspieler oder Crews für Ihr Projekt ein und bleiben Sie mit einem Klick in Kontakt.', NULL, 'text', 8, 'Statics'),
(25, 'statics.manage_text_en', 'Manage text en', 'You get to manage your sub-profiles and the team on your projects. Movie Circle platform helps you stay organized and updated with what is going on.', NULL, 'text', 9, 'Statics'),
(26, 'statics.manage_text_de', 'Manage text de', 'Sie können Ihre Unterprofile und das Team für Ihre Projekte verwalten. Mit der Movie Circle-Plattform bleiben Sie organisiert und auf dem Laufenden.', NULL, 'text', 9, 'Statics'),
(27, 'statics.create_text_en', 'Create text en', 'Make your ideas come to reality with our key feature Flexi Folder, and create astoning and fast projects is two simple steps: drag & drop.', NULL, 'text', 10, 'Statics'),
(28, 'statics.create_text_de', 'Create text de', 'Verwirklichen Sie Ihre Ideen mit unserer Schlüsselfunktion Flexi Folder und erstellen Sie erstaunliche und schnelle Projekte in zwei einfachen Schritten: Drag & Drop.', NULL, 'text', 10, 'Statics'),
(33, 'statics.producer_short_de', 'Producer account short desc de', 'DELorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam imperdiet est eget congue.', NULL, 'text', 11, 'Statics'),
(35, 'statics.agency_short_de', 'Agency account short desc de', 'DELorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam imperdiet est eget congue.', NULL, 'text', 12, 'Statics'),
(37, 'statics.profile_short_de', 'Profile account short desc de', 'DELorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam imperdiet est eget congue.', NULL, 'text', 13, 'Statics'),
(40, 'statics.index_join_text_en', 'Homepage bottom text en', 'Take a seat as a Producer, Agency, Crew or User and make your spark in the movie world!', NULL, 'text', 15, 'Statics'),
(41, 'statics.index_join_text_de', 'Homepage bottom text de', 'Nehmen Sie Platz als Produzent, Agentur, Crew oder User und machen Sie Ihren Funken in der Filmwelt!', NULL, 'text', 15, 'Statics'),
(42, 'statics.index_join_title_en', 'Homepage bottom title en', 'Join the ultimate Movie Casting and take advantage for newcomers.', NULL, 'text', 14, 'Statics'),
(43, 'statics.index_join_title_de', 'Homepage bottom title de', 'Nehmen Sie am ultimativen Movie Casting teil und profitieren Sie von Neulingen.', NULL, 'text', 14, 'Statics'),
(44, 'statics.careers_marketing_desc', 'Careers marketing short desc', 'Quisque nec risus cursus mauris sagittis semper eu eu turpis. Praesent sit amet metus pharetra ex blandit laoreet.', NULL, 'text', 16, 'Statics'),
(45, 'statics.careers_sales_desc', 'Careers Sales short desc', 'Quisque nec risus cursus mauris sagittis semper eu eu turpis. Praesent sit amet metus pharetra ex blandit laoreet.', NULL, 'text', 16, 'Statics'),
(46, 'statics.careers_generalmanager_desc', 'Careers General Manager short desc', 'Quisque nec risus cursus mauris sagittis semper eu eu turpis. Praesent sit amet metus pharetra ex blandit laoreet.', NULL, 'text', 16, 'Statics'),
(48, 'contact.contact_info_email', 'Information email', 'info@moviecircle.com', NULL, 'text', 17, 'Contact'),
(49, 'contact.contact_info_phone', 'Information phone', '+41 07665 3232', NULL, 'text', 18, 'Contact'),
(50, 'contact.contact_info_address', 'Information address', 'Belsstrade, 12, Munich, DE', NULL, 'text', 19, 'Contact'),
(51, 'contact.contact_marketing_email', 'Marketing email', 'info@movieircle.com', NULL, 'text', 20, 'Contact'),
(52, 'contact.contact_marketing_phone', 'Marketing phone', '+41 07665 3232', NULL, 'text', 21, 'Contact'),
(53, 'contact.contact_therms_en', 'Contact therms and conditions en', 'By completing this form, I agree that MC and the project owner will revice all my datas and they can use them only with the scope of contacting me.', NULL, 'text', 16, 'Contact'),
(54, 'contact.contact_therms_de', 'Contact therms and conditions de', 'Durch das Ausfüllen dieses Formulars erkläre ich mich damit einverstanden, dass MC und der Projektbesitzer alle meine Daten erhalten und sie nur verwenden können, wenn sie mich kontaktieren.', NULL, 'text', 16, 'Contact'),
(56, 'therms.privacy_policy_en', 'Privacy policy text en', '<p>EN Aliquam tempus nibh quis justo maximus hendrerit.</p>\r\n<p>Quisque nec risus cursus mauris sagittis semper eu eu turpis. Praesent sit amet metus pharetra ex blandit laoreet. Pellentesque lobortis, libero eget viverra pellentesque, sem odio semper justo, a ornare odio purus et ex. Pellentesque vitae sodales neque, sed cursus orci. Nunc ex neque, aliquam in massa in, laoreet commodo augue. Aenean viverra dui turpis. Pellentesque ultrices dui vel tristique consequat. Fusce at nunc ex. Vestibulum et efficitur risus. Vestibulum vel mauris justo. Curabitur iaculis egestas enim, ut luctus elit facilisis non. Suspendisse vel ipsum sed massa gravida varius. Praesent pulvinar, leo et fringilla efficitur, sapien est pharetra elit, vitae sodales leo augue quis felis.</p>\r\n<p>&nbsp;</p>\r\n<p>Morbi sem mi, tincidunt id imperdiet a, condimentum nec lorem.&nbsp;</p>\r\n<p>Sed vel lorem ac libero blandit pellentesque. Etiam condimentum, elit consequat venenatis faucibus, elit lacus vestibulum ex, nec faucibus lorem nisi sit amet urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque ipsum erat, tincidunt id facilisis a, ullamcorper sed lacus. Aenean lectus magna, rutrum eu massa sed, convallis vehicula ante. Sed laoreet tincidunt lacus, non dignissim leo ultrices venenatis.</p>\r\n<p>&nbsp;</p>\r\n<p>Duis et velit sit amet ex euismod rutrum.&nbsp;</p>\r\n<p>Duis ultrices a ex non maximus. Maecenas in neque sollicitudin, consectetur urna vel, varius ipsum. Maecenas non pulvinar mauris, nec lacinia dolor. Nunc consequat orci at felis suscipit lobortis. Donec egestas ac libero at dapibus. Mauris at sem tristique, euismod urna mattis, facilisis orci. Nam hendrerit condimentum nibh quis efficitur. Nunc tincidunt malesuada nunc, at eleifend libero maximus nec.</p>\r\n<p>&nbsp;</p>\r\n<p>Aliquam ac enim non nunc malesuada luctus eu eget diam.&nbsp;</p>\r\n<p>Nulla mollis enim vel cursus aliquet. Sed at fringilla urna. Suspendisse porttitor, elit at iaculis porttitor, risus elit molestie dolor, eu volutpat dui eros ut mi. Mauris orci orci, sollicitudin at odio et, aliquam auctor neque. Cras efficitur erat sed fermentum facilisis. Quisque semper pellentesque enim, at dapibus velit volutpat ut. Aliquam et sagittis orci. Nulla facilisi. Sed in libero vel massa ultricies egestas. Aenean ac massa nisi. Vestibulum pharetra orci quam, non finibus purus sodales at. In vestibulum sem sed sem eleifend facilisis et vitae ex. Fusce nulla ligula, facilisis interdum felis sit amet, blandit facilisis eros. Phasellus ullamcorper vitae leo quis euismod. Curabitur eu lacus nunc.</p>\r\n<p>&nbsp;</p>\r\n<p>Nam bibendum lacus lorem, eleifend accumsan diam vehicula in. Cras consequat, metus ac tempus rhoncus, tortor mauris tristique diam, sit amet accumsan dui metus at ex. Nam molestie mauris eget efficitur scelerisque. Suspendisse ac lectus et eros vulputate tempus eget vel orci. Fusce laoreet sagittis est vel consectetur. Suspendisse quis pulvinar velit. Aenean vel eros ultricies, congue mi ut, fringilla nibh. Mauris consequat scelerisque odio at euismod.</p>\r\n<p>&nbsp;</p>\r\n<p>Donec ut erat hendrerit, varius est vel, ultricies lorem.&nbsp;</p>\r\n<p>Maecenas purus metus, molestie sit amet tincidunt vel, tempus et velit. Aliquam eleifend, magna in interdum gravida, urna libero euismod nibh, non maximus urna arcu ac leo. Suspendisse varius vel dui non imperdiet. Integer sed nulla sit amet ex condimentum eleifend. Etiam vitae arcu a arcu facilisis luctus. Nam varius ex eget diam facilisis, id tempus arcu pellentesque. Sed a tortor maximus, varius nisi quis, lacinia est. Cras vulputate convallis eros quis vulputate. Nam volutpat est nec eros semper, pellentesque ultrices magna dictum.</p>\r\n<p>&nbsp;</p>\r\n<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec ultrices vel turpis eu sodales. Donec aliquet tristique quam vel gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis molestie dui et tincidunt pretium. Pellentesque pharetra auctor faucibus. Duis ultricies ante nibh, rutrum aliquet lectus porta vitae. Fusce rutrum ac tellus non sodales. Ut vitae lacus eu sapien interdum mattis ut condimentum eros. Aenean accumsan tincidunt egestas.</p>\r\n<p>&nbsp;</p>\r\n<p>Nulla eu feugiat enim, sit amet congue mauris. Vivamus tortor est, tristique eget sapien at, malesuada auctor tellus. Etiam at nulla eu nisi tincidunt ultricies. Ut finibus nibh nisi, sed accumsan ligula consequat ac. Nulla quis ante turpis. Ut commodo quam non tellus pellentesque elementum. Phasellus ac purus in risus luctus laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum luctus arcu nulla, tincidunt vehicula lacus ultricies eget. Nullam vitae malesuada leo. Nulla sed purus risus. Cras vehicula in quam vel aliquam. Suspendisse eu purus fringilla, efficitur felis sollicitudin, fermentum sem. Quisque sed nisl eu enim accumsan scelerisque. Cras aliquam egestas orci in tincidunt.</p>\r\n<p>&nbsp;</p>\r\n<p>Fusce id consectetur turpis.&nbsp;</p>\r\n<p>Cras imperdiet et dui et auctor. In eu eleifend nisi. Donec nec iaculis velit. Vestibulum mollis blandit ex, quis ultrices ex laoreet a. Ut lectus purus, gravida a fringilla in, sagittis at magna. Suspendisse et pharetra risus, ut condimentum risus. Aliquam erat volutpat. Fusce rhoncus maximus mi, nec ornare ligula maximus eu. Morbi in mattis ligula. Integer porttitor mi eu luctus ullamcorper.</p>\r\n<p>&nbsp;</p>\r\n<p>Suspendisse in luctus ex, vel egestas eros. Donec eget diam vitae mi tincidunt dictum. Suspendisse maximus in lacus non semper. In faucibus justo quis augue consequat, eu laoreet ipsum sagittis. Proin quis vulputate elit, in tristique elit. Nulla a posuere dolor, a tempus quam. Sed non venenatis nulla, ac molestie est. Phasellus aliquam, ligula sagittis pellentesque egestas, mi arcu cursus orci, sed tristique turpis metus in urna. Morbi convallis, tellus vel ullamcorper commodo, velit massa semper leo, vitae commodo sapien sem eget augue. Etiam auctor convallis tellus eget lacinia. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi bibendum sed tortor vitae auctor. Nulla facilisis justo sit amet nulla lobortis suscipit.</p>\r\n<p>&nbsp;</p>\r\n<p>Nam nulla nisi, fermentum a orci eu, dapibus molestie libero.&nbsp;</p>\r\n<p>Etiam quam nisi, euismod eget tempor eget, euismod sed arcu. Maecenas scelerisque at diam sit amet porttitor. In auctor lobortis quam iaculis aliquet. Proin nec turpis mi. Nam dui ex, laoreet vel facilisis in, iaculis id odio. Vestibulum ex dolor, blandit eu tortor ac, ullamcorper faucibus libero. Duis gravida commodo lacus at maximus. Aliquam erat volutpat. Morbi id lorem accumsan nunc commodo pharetra. Suspendisse potenti. Nunc vestibulum posuere mauris, in rhoncus augue consequat in. Integer ultrices vitae eros et efficitur. Suspendisse potenti. Morbi faucibus leo sit amet lacus posuere, et accumsan nunc sollicitudin. Sed in purus at metus euismod aliquam.</p>', NULL, 'rich_text_box', 16, 'Therms'),
(57, 'therms.privacy_policy_de', 'Privacy policy text de', '<p>DE Aliquam tempus nibh quis justo maximus hendrerit.</p>\r\n<p>Quisque nec risus cursus mauris sagittis semper eu eu turpis. Praesent sit amet metus pharetra ex blandit laoreet. Pellentesque lobortis, libero eget viverra pellentesque, sem odio semper justo, a ornare odio purus et ex. Pellentesque vitae sodales neque, sed cursus orci. Nunc ex neque, aliquam in massa in, laoreet commodo augue. Aenean viverra dui turpis. Pellentesque ultrices dui vel tristique consequat. Fusce at nunc ex. Vestibulum et efficitur risus. Vestibulum vel mauris justo. Curabitur iaculis egestas enim, ut luctus elit facilisis non. Suspendisse vel ipsum sed massa gravida varius. Praesent pulvinar, leo et fringilla efficitur, sapien est pharetra elit, vitae sodales leo augue quis felis.</p>\r\n<p>&nbsp;</p>\r\n<p>Morbi sem mi, tincidunt id imperdiet a, condimentum nec lorem.&nbsp;</p>\r\n<p>Sed vel lorem ac libero blandit pellentesque. Etiam condimentum, elit consequat venenatis faucibus, elit lacus vestibulum ex, nec faucibus lorem nisi sit amet urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque ipsum erat, tincidunt id facilisis a, ullamcorper sed lacus. Aenean lectus magna, rutrum eu massa sed, convallis vehicula ante. Sed laoreet tincidunt lacus, non dignissim leo ultrices venenatis.</p>\r\n<p>&nbsp;</p>\r\n<p>Duis et velit sit amet ex euismod rutrum.&nbsp;</p>\r\n<p>Duis ultrices a ex non maximus. Maecenas in neque sollicitudin, consectetur urna vel, varius ipsum. Maecenas non pulvinar mauris, nec lacinia dolor. Nunc consequat orci at felis suscipit lobortis. Donec egestas ac libero at dapibus. Mauris at sem tristique, euismod urna mattis, facilisis orci. Nam hendrerit condimentum nibh quis efficitur. Nunc tincidunt malesuada nunc, at eleifend libero maximus nec.</p>\r\n<p>&nbsp;</p>\r\n<p>Aliquam ac enim non nunc malesuada luctus eu eget diam.&nbsp;</p>\r\n<p>Nulla mollis enim vel cursus aliquet. Sed at fringilla urna. Suspendisse porttitor, elit at iaculis porttitor, risus elit molestie dolor, eu volutpat dui eros ut mi. Mauris orci orci, sollicitudin at odio et, aliquam auctor neque. Cras efficitur erat sed fermentum facilisis. Quisque semper pellentesque enim, at dapibus velit volutpat ut. Aliquam et sagittis orci. Nulla facilisi. Sed in libero vel massa ultricies egestas. Aenean ac massa nisi. Vestibulum pharetra orci quam, non finibus purus sodales at. In vestibulum sem sed sem eleifend facilisis et vitae ex. Fusce nulla ligula, facilisis interdum felis sit amet, blandit facilisis eros. Phasellus ullamcorper vitae leo quis euismod. Curabitur eu lacus nunc.</p>\r\n<p>&nbsp;</p>\r\n<p>Nam bibendum lacus lorem, eleifend accumsan diam vehicula in. Cras consequat, metus ac tempus rhoncus, tortor mauris tristique diam, sit amet accumsan dui metus at ex. Nam molestie mauris eget efficitur scelerisque. Suspendisse ac lectus et eros vulputate tempus eget vel orci. Fusce laoreet sagittis est vel consectetur. Suspendisse quis pulvinar velit. Aenean vel eros ultricies, congue mi ut, fringilla nibh. Mauris consequat scelerisque odio at euismod.</p>\r\n<p>&nbsp;</p>\r\n<p>Donec ut erat hendrerit, varius est vel, ultricies lorem.&nbsp;</p>\r\n<p>Maecenas purus metus, molestie sit amet tincidunt vel, tempus et velit. Aliquam eleifend, magna in interdum gravida, urna libero euismod nibh, non maximus urna arcu ac leo. Suspendisse varius vel dui non imperdiet. Integer sed nulla sit amet ex condimentum eleifend. Etiam vitae arcu a arcu facilisis luctus. Nam varius ex eget diam facilisis, id tempus arcu pellentesque. Sed a tortor maximus, varius nisi quis, lacinia est. Cras vulputate convallis eros quis vulputate. Nam volutpat est nec eros semper, pellentesque ultrices magna dictum.</p>\r\n<p>&nbsp;</p>\r\n<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec ultrices vel turpis eu sodales. Donec aliquet tristique quam vel gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis molestie dui et tincidunt pretium. Pellentesque pharetra auctor faucibus. Duis ultricies ante nibh, rutrum aliquet lectus porta vitae. Fusce rutrum ac tellus non sodales. Ut vitae lacus eu sapien interdum mattis ut condimentum eros. Aenean accumsan tincidunt egestas.</p>\r\n<p>&nbsp;</p>\r\n<p>Nulla eu feugiat enim, sit amet congue mauris. Vivamus tortor est, tristique eget sapien at, malesuada auctor tellus. Etiam at nulla eu nisi tincidunt ultricies. Ut finibus nibh nisi, sed accumsan ligula consequat ac. Nulla quis ante turpis. Ut commodo quam non tellus pellentesque elementum. Phasellus ac purus in risus luctus laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum luctus arcu nulla, tincidunt vehicula lacus ultricies eget. Nullam vitae malesuada leo. Nulla sed purus risus. Cras vehicula in quam vel aliquam. Suspendisse eu purus fringilla, efficitur felis sollicitudin, fermentum sem. Quisque sed nisl eu enim accumsan scelerisque. Cras aliquam egestas orci in tincidunt.</p>\r\n<p>&nbsp;</p>\r\n<p>Fusce id consectetur turpis.&nbsp;</p>\r\n<p>Cras imperdiet et dui et auctor. In eu eleifend nisi. Donec nec iaculis velit. Vestibulum mollis blandit ex, quis ultrices ex laoreet a. Ut lectus purus, gravida a fringilla in, sagittis at magna. Suspendisse et pharetra risus, ut condimentum risus. Aliquam erat volutpat. Fusce rhoncus maximus mi, nec ornare ligula maximus eu. Morbi in mattis ligula. Integer porttitor mi eu luctus ullamcorper.</p>\r\n<p>&nbsp;</p>\r\n<p>Suspendisse in luctus ex, vel egestas eros. Donec eget diam vitae mi tincidunt dictum. Suspendisse maximus in lacus non semper. In faucibus justo quis augue consequat, eu laoreet ipsum sagittis. Proin quis vulputate elit, in tristique elit. Nulla a posuere dolor, a tempus quam. Sed non venenatis nulla, ac molestie est. Phasellus aliquam, ligula sagittis pellentesque egestas, mi arcu cursus orci, sed tristique turpis metus in urna. Morbi convallis, tellus vel ullamcorper commodo, velit massa semper leo, vitae commodo sapien sem eget augue. Etiam auctor convallis tellus eget lacinia. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi bibendum sed tortor vitae auctor. Nulla facilisis justo sit amet nulla lobortis suscipit.</p>\r\n<p>&nbsp;</p>\r\n<p>Nam nulla nisi, fermentum a orci eu, dapibus molestie libero.&nbsp;</p>\r\n<p>Etiam quam nisi, euismod eget tempor eget, euismod sed arcu. Maecenas scelerisque at diam sit amet porttitor. In auctor lobortis quam iaculis aliquet. Proin nec turpis mi. Nam dui ex, laoreet vel facilisis in, iaculis id odio. Vestibulum ex dolor, blandit eu tortor ac, ullamcorper faucibus libero. Duis gravida commodo lacus at maximus. Aliquam erat volutpat. Morbi id lorem accumsan nunc commodo pharetra. Suspendisse potenti. Nunc vestibulum posuere mauris, in rhoncus augue consequat in. Integer ultrices vitae eros et efficitur. Suspendisse potenti. Morbi faucibus leo sit amet lacus posuere, et accumsan nunc sollicitudin. Sed in purus at metus euismod aliquam.</p>', NULL, 'rich_text_box', 16, 'Therms'),
(59, 'therms.therms_condition_en', 'Therms and conditions text en', '<p>EN Aliquam tempus nibh quis justo maximus hendrerit.</p>\r\n<p>Quisque nec risus cursus mauris sagittis semper eu eu turpis. Praesent sit amet metus pharetra ex blandit laoreet. Pellentesque lobortis, libero eget viverra pellentesque, sem odio semper justo, a ornare odio purus et ex. Pellentesque vitae sodales neque, sed cursus orci. Nunc ex neque, aliquam in massa in, laoreet commodo augue. Aenean viverra dui turpis. Pellentesque ultrices dui vel tristique consequat. Fusce at nunc ex. Vestibulum et efficitur risus. Vestibulum vel mauris justo. Curabitur iaculis egestas enim, ut luctus elit facilisis non. Suspendisse vel ipsum sed massa gravida varius. Praesent pulvinar, leo et fringilla efficitur, sapien est pharetra elit, vitae sodales leo augue quis felis.</p>\r\n<p>&nbsp;</p>\r\n<p>Morbi sem mi, tincidunt id imperdiet a, condimentum nec lorem.&nbsp;</p>\r\n<p>Sed vel lorem ac libero blandit pellentesque. Etiam condimentum, elit consequat venenatis faucibus, elit lacus vestibulum ex, nec faucibus lorem nisi sit amet urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque ipsum erat, tincidunt id facilisis a, ullamcorper sed lacus. Aenean lectus magna, rutrum eu massa sed, convallis vehicula ante. Sed laoreet tincidunt lacus, non dignissim leo ultrices venenatis.</p>\r\n<p>&nbsp;</p>\r\n<p>Duis et velit sit amet ex euismod rutrum.&nbsp;</p>\r\n<p>Duis ultrices a ex non maximus. Maecenas in neque sollicitudin, consectetur urna vel, varius ipsum. Maecenas non pulvinar mauris, nec lacinia dolor. Nunc consequat orci at felis suscipit lobortis. Donec egestas ac libero at dapibus. Mauris at sem tristique, euismod urna mattis, facilisis orci. Nam hendrerit condimentum nibh quis efficitur. Nunc tincidunt malesuada nunc, at eleifend libero maximus nec.</p>\r\n<p>&nbsp;</p>\r\n<p>Aliquam ac enim non nunc malesuada luctus eu eget diam.&nbsp;</p>\r\n<p>Nulla mollis enim vel cursus aliquet. Sed at fringilla urna. Suspendisse porttitor, elit at iaculis porttitor, risus elit molestie dolor, eu volutpat dui eros ut mi. Mauris orci orci, sollicitudin at odio et, aliquam auctor neque. Cras efficitur erat sed fermentum facilisis. Quisque semper pellentesque enim, at dapibus velit volutpat ut. Aliquam et sagittis orci. Nulla facilisi. Sed in libero vel massa ultricies egestas. Aenean ac massa nisi. Vestibulum pharetra orci quam, non finibus purus sodales at. In vestibulum sem sed sem eleifend facilisis et vitae ex. Fusce nulla ligula, facilisis interdum felis sit amet, blandit facilisis eros. Phasellus ullamcorper vitae leo quis euismod. Curabitur eu lacus nunc.</p>\r\n<p>&nbsp;</p>\r\n<p>Nam bibendum lacus lorem, eleifend accumsan diam vehicula in. Cras consequat, metus ac tempus rhoncus, tortor mauris tristique diam, sit amet accumsan dui metus at ex. Nam molestie mauris eget efficitur scelerisque. Suspendisse ac lectus et eros vulputate tempus eget vel orci. Fusce laoreet sagittis est vel consectetur. Suspendisse quis pulvinar velit. Aenean vel eros ultricies, congue mi ut, fringilla nibh. Mauris consequat scelerisque odio at euismod.</p>\r\n<p>&nbsp;</p>\r\n<p>Donec ut erat hendrerit, varius est vel, ultricies lorem.&nbsp;</p>\r\n<p>Maecenas purus metus, molestie sit amet tincidunt vel, tempus et velit. Aliquam eleifend, magna in interdum gravida, urna libero euismod nibh, non maximus urna arcu ac leo. Suspendisse varius vel dui non imperdiet. Integer sed nulla sit amet ex condimentum eleifend. Etiam vitae arcu a arcu facilisis luctus. Nam varius ex eget diam facilisis, id tempus arcu pellentesque. Sed a tortor maximus, varius nisi quis, lacinia est. Cras vulputate convallis eros quis vulputate. Nam volutpat est nec eros semper, pellentesque ultrices magna dictum.</p>\r\n<p>&nbsp;</p>\r\n<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec ultrices vel turpis eu sodales. Donec aliquet tristique quam vel gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis molestie dui et tincidunt pretium. Pellentesque pharetra auctor faucibus. Duis ultricies ante nibh, rutrum aliquet lectus porta vitae. Fusce rutrum ac tellus non sodales. Ut vitae lacus eu sapien interdum mattis ut condimentum eros. Aenean accumsan tincidunt egestas.</p>\r\n<p>&nbsp;</p>\r\n<p>Nulla eu feugiat enim, sit amet congue mauris. Vivamus tortor est, tristique eget sapien at, malesuada auctor tellus. Etiam at nulla eu nisi tincidunt ultricies. Ut finibus nibh nisi, sed accumsan ligula consequat ac. Nulla quis ante turpis. Ut commodo quam non tellus pellentesque elementum. Phasellus ac purus in risus luctus laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum luctus arcu nulla, tincidunt vehicula lacus ultricies eget. Nullam vitae malesuada leo. Nulla sed purus risus. Cras vehicula in quam vel aliquam. Suspendisse eu purus fringilla, efficitur felis sollicitudin, fermentum sem. Quisque sed nisl eu enim accumsan scelerisque. Cras aliquam egestas orci in tincidunt.</p>\r\n<p>&nbsp;</p>\r\n<p>Fusce id consectetur turpis.&nbsp;</p>\r\n<p>Cras imperdiet et dui et auctor. In eu eleifend nisi. Donec nec iaculis velit. Vestibulum mollis blandit ex, quis ultrices ex laoreet a. Ut lectus purus, gravida a fringilla in, sagittis at magna. Suspendisse et pharetra risus, ut condimentum risus. Aliquam erat volutpat. Fusce rhoncus maximus mi, nec ornare ligula maximus eu. Morbi in mattis ligula. Integer porttitor mi eu luctus ullamcorper.</p>\r\n<p>&nbsp;</p>\r\n<p>Suspendisse in luctus ex, vel egestas eros. Donec eget diam vitae mi tincidunt dictum. Suspendisse maximus in lacus non semper. In faucibus justo quis augue consequat, eu laoreet ipsum sagittis. Proin quis vulputate elit, in tristique elit. Nulla a posuere dolor, a tempus quam. Sed non venenatis nulla, ac molestie est. Phasellus aliquam, ligula sagittis pellentesque egestas, mi arcu cursus orci, sed tristique turpis metus in urna. Morbi convallis, tellus vel ullamcorper commodo, velit massa semper leo, vitae commodo sapien sem eget augue. Etiam auctor convallis tellus eget lacinia. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi bibendum sed tortor vitae auctor. Nulla facilisis justo sit amet nulla lobortis suscipit.</p>\r\n<p>&nbsp;</p>\r\n<p>Nam nulla nisi, fermentum a orci eu, dapibus molestie libero.&nbsp;</p>\r\n<p>Etiam quam nisi, euismod eget tempor eget, euismod sed arcu. Maecenas scelerisque at diam sit amet porttitor. In auctor lobortis quam iaculis aliquet. Proin nec turpis mi. Nam dui ex, laoreet vel facilisis in, iaculis id odio. Vestibulum ex dolor, blandit eu tortor ac, ullamcorper faucibus libero. Duis gravida commodo lacus at maximus. Aliquam erat volutpat. Morbi id lorem accumsan nunc commodo pharetra. Suspendisse potenti. Nunc vestibulum posuere mauris, in rhoncus augue consequat in. Integer ultrices vitae eros et efficitur. Suspendisse potenti. Morbi faucibus leo sit amet lacus posuere, et accumsan nunc sollicitudin. Sed in purus at metus euismod aliquam.</p>', NULL, 'rich_text_box', 22, 'Therms'),
(60, 'therms.therms_condition_de', 'Therms and conditions text de', '<p>DE Aliquam tempus nibh quis justo maximus hendrerit.</p>\r\n<p>Quisque nec risus cursus mauris sagittis semper eu eu turpis. Praesent sit amet metus pharetra ex blandit laoreet. Pellentesque lobortis, libero eget viverra pellentesque, sem odio semper justo, a ornare odio purus et ex. Pellentesque vitae sodales neque, sed cursus orci. Nunc ex neque, aliquam in massa in, laoreet commodo augue. Aenean viverra dui turpis. Pellentesque ultrices dui vel tristique consequat. Fusce at nunc ex. Vestibulum et efficitur risus. Vestibulum vel mauris justo. Curabitur iaculis egestas enim, ut luctus elit facilisis non. Suspendisse vel ipsum sed massa gravida varius. Praesent pulvinar, leo et fringilla efficitur, sapien est pharetra elit, vitae sodales leo augue quis felis.</p>\r\n<p>&nbsp;</p>\r\n<p>Morbi sem mi, tincidunt id imperdiet a, condimentum nec lorem.&nbsp;</p>\r\n<p>Sed vel lorem ac libero blandit pellentesque. Etiam condimentum, elit consequat venenatis faucibus, elit lacus vestibulum ex, nec faucibus lorem nisi sit amet urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque ipsum erat, tincidunt id facilisis a, ullamcorper sed lacus. Aenean lectus magna, rutrum eu massa sed, convallis vehicula ante. Sed laoreet tincidunt lacus, non dignissim leo ultrices venenatis.</p>\r\n<p>&nbsp;</p>\r\n<p>Duis et velit sit amet ex euismod rutrum.&nbsp;</p>\r\n<p>Duis ultrices a ex non maximus. Maecenas in neque sollicitudin, consectetur urna vel, varius ipsum. Maecenas non pulvinar mauris, nec lacinia dolor. Nunc consequat orci at felis suscipit lobortis. Donec egestas ac libero at dapibus. Mauris at sem tristique, euismod urna mattis, facilisis orci. Nam hendrerit condimentum nibh quis efficitur. Nunc tincidunt malesuada nunc, at eleifend libero maximus nec.</p>\r\n<p>&nbsp;</p>\r\n<p>Aliquam ac enim non nunc malesuada luctus eu eget diam.&nbsp;</p>\r\n<p>Nulla mollis enim vel cursus aliquet. Sed at fringilla urna. Suspendisse porttitor, elit at iaculis porttitor, risus elit molestie dolor, eu volutpat dui eros ut mi. Mauris orci orci, sollicitudin at odio et, aliquam auctor neque. Cras efficitur erat sed fermentum facilisis. Quisque semper pellentesque enim, at dapibus velit volutpat ut. Aliquam et sagittis orci. Nulla facilisi. Sed in libero vel massa ultricies egestas. Aenean ac massa nisi. Vestibulum pharetra orci quam, non finibus purus sodales at. In vestibulum sem sed sem eleifend facilisis et vitae ex. Fusce nulla ligula, facilisis interdum felis sit amet, blandit facilisis eros. Phasellus ullamcorper vitae leo quis euismod. Curabitur eu lacus nunc.</p>\r\n<p>&nbsp;</p>\r\n<p>Nam bibendum lacus lorem, eleifend accumsan diam vehicula in. Cras consequat, metus ac tempus rhoncus, tortor mauris tristique diam, sit amet accumsan dui metus at ex. Nam molestie mauris eget efficitur scelerisque. Suspendisse ac lectus et eros vulputate tempus eget vel orci. Fusce laoreet sagittis est vel consectetur. Suspendisse quis pulvinar velit. Aenean vel eros ultricies, congue mi ut, fringilla nibh. Mauris consequat scelerisque odio at euismod.</p>\r\n<p>&nbsp;</p>\r\n<p>Donec ut erat hendrerit, varius est vel, ultricies lorem.&nbsp;</p>\r\n<p>Maecenas purus metus, molestie sit amet tincidunt vel, tempus et velit. Aliquam eleifend, magna in interdum gravida, urna libero euismod nibh, non maximus urna arcu ac leo. Suspendisse varius vel dui non imperdiet. Integer sed nulla sit amet ex condimentum eleifend. Etiam vitae arcu a arcu facilisis luctus. Nam varius ex eget diam facilisis, id tempus arcu pellentesque. Sed a tortor maximus, varius nisi quis, lacinia est. Cras vulputate convallis eros quis vulputate. Nam volutpat est nec eros semper, pellentesque ultrices magna dictum.</p>\r\n<p>&nbsp;</p>\r\n<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec ultrices vel turpis eu sodales. Donec aliquet tristique quam vel gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis molestie dui et tincidunt pretium. Pellentesque pharetra auctor faucibus. Duis ultricies ante nibh, rutrum aliquet lectus porta vitae. Fusce rutrum ac tellus non sodales. Ut vitae lacus eu sapien interdum mattis ut condimentum eros. Aenean accumsan tincidunt egestas.</p>\r\n<p>&nbsp;</p>\r\n<p>Nulla eu feugiat enim, sit amet congue mauris. Vivamus tortor est, tristique eget sapien at, malesuada auctor tellus. Etiam at nulla eu nisi tincidunt ultricies. Ut finibus nibh nisi, sed accumsan ligula consequat ac. Nulla quis ante turpis. Ut commodo quam non tellus pellentesque elementum. Phasellus ac purus in risus luctus laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum luctus arcu nulla, tincidunt vehicula lacus ultricies eget. Nullam vitae malesuada leo. Nulla sed purus risus. Cras vehicula in quam vel aliquam. Suspendisse eu purus fringilla, efficitur felis sollicitudin, fermentum sem. Quisque sed nisl eu enim accumsan scelerisque. Cras aliquam egestas orci in tincidunt.</p>\r\n<p>&nbsp;</p>\r\n<p>Fusce id consectetur turpis.&nbsp;</p>\r\n<p>Cras imperdiet et dui et auctor. In eu eleifend nisi. Donec nec iaculis velit. Vestibulum mollis blandit ex, quis ultrices ex laoreet a. Ut lectus purus, gravida a fringilla in, sagittis at magna. Suspendisse et pharetra risus, ut condimentum risus. Aliquam erat volutpat. Fusce rhoncus maximus mi, nec ornare ligula maximus eu. Morbi in mattis ligula. Integer porttitor mi eu luctus ullamcorper.</p>\r\n<p>&nbsp;</p>\r\n<p>Suspendisse in luctus ex, vel egestas eros. Donec eget diam vitae mi tincidunt dictum. Suspendisse maximus in lacus non semper. In faucibus justo quis augue consequat, eu laoreet ipsum sagittis. Proin quis vulputate elit, in tristique elit. Nulla a posuere dolor, a tempus quam. Sed non venenatis nulla, ac molestie est. Phasellus aliquam, ligula sagittis pellentesque egestas, mi arcu cursus orci, sed tristique turpis metus in urna. Morbi convallis, tellus vel ullamcorper commodo, velit massa semper leo, vitae commodo sapien sem eget augue. Etiam auctor convallis tellus eget lacinia. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi bibendum sed tortor vitae auctor. Nulla facilisis justo sit amet nulla lobortis suscipit.</p>\r\n<p>&nbsp;</p>\r\n<p>Nam nulla nisi, fermentum a orci eu, dapibus molestie libero.&nbsp;</p>\r\n<p>Etiam quam nisi, euismod eget tempor eget, euismod sed arcu. Maecenas scelerisque at diam sit amet porttitor. In auctor lobortis quam iaculis aliquet. Proin nec turpis mi. Nam dui ex, laoreet vel facilisis in, iaculis id odio. Vestibulum ex dolor, blandit eu tortor ac, ullamcorper faucibus libero. Duis gravida commodo lacus at maximus. Aliquam erat volutpat. Morbi id lorem accumsan nunc commodo pharetra. Suspendisse potenti. Nunc vestibulum posuere mauris, in rhoncus augue consequat in. Integer ultrices vitae eros et efficitur. Suspendisse potenti. Morbi faucibus leo sit amet lacus posuere, et accumsan nunc sollicitudin. Sed in purus at metus euismod aliquam.</p>', NULL, 'rich_text_box', 22, 'Therms');
INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(62, 'therms.cookies_policy_en', 'Cookies policy text en', '<p>EN Aliquam tempus nibh quis justo maximus hendrerit.</p>\r\n<p>Quisque nec risus cursus mauris sagittis semper eu eu turpis. Praesent sit amet metus pharetra ex blandit laoreet. Pellentesque lobortis, libero eget viverra pellentesque, sem odio semper justo, a ornare odio purus et ex. Pellentesque vitae sodales neque, sed cursus orci. Nunc ex neque, aliquam in massa in, laoreet commodo augue. Aenean viverra dui turpis. Pellentesque ultrices dui vel tristique consequat. Fusce at nunc ex. Vestibulum et efficitur risus. Vestibulum vel mauris justo. Curabitur iaculis egestas enim, ut luctus elit facilisis non. Suspendisse vel ipsum sed massa gravida varius. Praesent pulvinar, leo et fringilla efficitur, sapien est pharetra elit, vitae sodales leo augue quis felis.</p>\r\n<p>&nbsp;</p>\r\n<p>Morbi sem mi, tincidunt id imperdiet a, condimentum nec lorem.&nbsp;</p>\r\n<p>Sed vel lorem ac libero blandit pellentesque. Etiam condimentum, elit consequat venenatis faucibus, elit lacus vestibulum ex, nec faucibus lorem nisi sit amet urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque ipsum erat, tincidunt id facilisis a, ullamcorper sed lacus. Aenean lectus magna, rutrum eu massa sed, convallis vehicula ante. Sed laoreet tincidunt lacus, non dignissim leo ultrices venenatis.</p>\r\n<p>&nbsp;</p>\r\n<p>Duis et velit sit amet ex euismod rutrum.&nbsp;</p>\r\n<p>Duis ultrices a ex non maximus. Maecenas in neque sollicitudin, consectetur urna vel, varius ipsum. Maecenas non pulvinar mauris, nec lacinia dolor. Nunc consequat orci at felis suscipit lobortis. Donec egestas ac libero at dapibus. Mauris at sem tristique, euismod urna mattis, facilisis orci. Nam hendrerit condimentum nibh quis efficitur. Nunc tincidunt malesuada nunc, at eleifend libero maximus nec.</p>\r\n<p>&nbsp;</p>\r\n<p>Aliquam ac enim non nunc malesuada luctus eu eget diam.&nbsp;</p>\r\n<p>Nulla mollis enim vel cursus aliquet. Sed at fringilla urna. Suspendisse porttitor, elit at iaculis porttitor, risus elit molestie dolor, eu volutpat dui eros ut mi. Mauris orci orci, sollicitudin at odio et, aliquam auctor neque. Cras efficitur erat sed fermentum facilisis. Quisque semper pellentesque enim, at dapibus velit volutpat ut. Aliquam et sagittis orci. Nulla facilisi. Sed in libero vel massa ultricies egestas. Aenean ac massa nisi. Vestibulum pharetra orci quam, non finibus purus sodales at. In vestibulum sem sed sem eleifend facilisis et vitae ex. Fusce nulla ligula, facilisis interdum felis sit amet, blandit facilisis eros. Phasellus ullamcorper vitae leo quis euismod. Curabitur eu lacus nunc.</p>\r\n<p>&nbsp;</p>\r\n<p>Nam bibendum lacus lorem, eleifend accumsan diam vehicula in. Cras consequat, metus ac tempus rhoncus, tortor mauris tristique diam, sit amet accumsan dui metus at ex. Nam molestie mauris eget efficitur scelerisque. Suspendisse ac lectus et eros vulputate tempus eget vel orci. Fusce laoreet sagittis est vel consectetur. Suspendisse quis pulvinar velit. Aenean vel eros ultricies, congue mi ut, fringilla nibh. Mauris consequat scelerisque odio at euismod.</p>\r\n<p>&nbsp;</p>\r\n<p>Donec ut erat hendrerit, varius est vel, ultricies lorem.&nbsp;</p>\r\n<p>Maecenas purus metus, molestie sit amet tincidunt vel, tempus et velit. Aliquam eleifend, magna in interdum gravida, urna libero euismod nibh, non maximus urna arcu ac leo. Suspendisse varius vel dui non imperdiet. Integer sed nulla sit amet ex condimentum eleifend. Etiam vitae arcu a arcu facilisis luctus. Nam varius ex eget diam facilisis, id tempus arcu pellentesque. Sed a tortor maximus, varius nisi quis, lacinia est. Cras vulputate convallis eros quis vulputate. Nam volutpat est nec eros semper, pellentesque ultrices magna dictum.</p>\r\n<p>&nbsp;</p>\r\n<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec ultrices vel turpis eu sodales. Donec aliquet tristique quam vel gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis molestie dui et tincidunt pretium. Pellentesque pharetra auctor faucibus. Duis ultricies ante nibh, rutrum aliquet lectus porta vitae. Fusce rutrum ac tellus non sodales. Ut vitae lacus eu sapien interdum mattis ut condimentum eros. Aenean accumsan tincidunt egestas.</p>\r\n<p>&nbsp;</p>\r\n<p>Nulla eu feugiat enim, sit amet congue mauris. Vivamus tortor est, tristique eget sapien at, malesuada auctor tellus. Etiam at nulla eu nisi tincidunt ultricies. Ut finibus nibh nisi, sed accumsan ligula consequat ac. Nulla quis ante turpis. Ut commodo quam non tellus pellentesque elementum. Phasellus ac purus in risus luctus laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum luctus arcu nulla, tincidunt vehicula lacus ultricies eget. Nullam vitae malesuada leo. Nulla sed purus risus. Cras vehicula in quam vel aliquam. Suspendisse eu purus fringilla, efficitur felis sollicitudin, fermentum sem. Quisque sed nisl eu enim accumsan scelerisque. Cras aliquam egestas orci in tincidunt.</p>\r\n<p>&nbsp;</p>\r\n<p>Fusce id consectetur turpis.&nbsp;</p>\r\n<p>Cras imperdiet et dui et auctor. In eu eleifend nisi. Donec nec iaculis velit. Vestibulum mollis blandit ex, quis ultrices ex laoreet a. Ut lectus purus, gravida a fringilla in, sagittis at magna. Suspendisse et pharetra risus, ut condimentum risus. Aliquam erat volutpat. Fusce rhoncus maximus mi, nec ornare ligula maximus eu. Morbi in mattis ligula. Integer porttitor mi eu luctus ullamcorper.</p>\r\n<p>&nbsp;</p>\r\n<p>Suspendisse in luctus ex, vel egestas eros. Donec eget diam vitae mi tincidunt dictum. Suspendisse maximus in lacus non semper. In faucibus justo quis augue consequat, eu laoreet ipsum sagittis. Proin quis vulputate elit, in tristique elit. Nulla a posuere dolor, a tempus quam. Sed non venenatis nulla, ac molestie est. Phasellus aliquam, ligula sagittis pellentesque egestas, mi arcu cursus orci, sed tristique turpis metus in urna. Morbi convallis, tellus vel ullamcorper commodo, velit massa semper leo, vitae commodo sapien sem eget augue. Etiam auctor convallis tellus eget lacinia. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi bibendum sed tortor vitae auctor. Nulla facilisis justo sit amet nulla lobortis suscipit.</p>\r\n<p>&nbsp;</p>\r\n<p>Nam nulla nisi, fermentum a orci eu, dapibus molestie libero.&nbsp;</p>\r\n<p>Etiam quam nisi, euismod eget tempor eget, euismod sed arcu. Maecenas scelerisque at diam sit amet porttitor. In auctor lobortis quam iaculis aliquet. Proin nec turpis mi. Nam dui ex, laoreet vel facilisis in, iaculis id odio. Vestibulum ex dolor, blandit eu tortor ac, ullamcorper faucibus libero. Duis gravida commodo lacus at maximus. Aliquam erat volutpat. Morbi id lorem accumsan nunc commodo pharetra. Suspendisse potenti. Nunc vestibulum posuere mauris, in rhoncus augue consequat in. Integer ultrices vitae eros et efficitur. Suspendisse potenti. Morbi faucibus leo sit amet lacus posuere, et accumsan nunc sollicitudin. Sed in purus at metus euismod aliquam.</p>', NULL, 'rich_text_box', 23, 'Therms'),
(63, 'therms.cookies_policy_de', 'Cookies policy text de', '<p>DE Aliquam tempus nibh quis justo maximus hendrerit.</p>\r\n<p>Quisque nec risus cursus mauris sagittis semper eu eu turpis. Praesent sit amet metus pharetra ex blandit laoreet. Pellentesque lobortis, libero eget viverra pellentesque, sem odio semper justo, a ornare odio purus et ex. Pellentesque vitae sodales neque, sed cursus orci. Nunc ex neque, aliquam in massa in, laoreet commodo augue. Aenean viverra dui turpis. Pellentesque ultrices dui vel tristique consequat. Fusce at nunc ex. Vestibulum et efficitur risus. Vestibulum vel mauris justo. Curabitur iaculis egestas enim, ut luctus elit facilisis non. Suspendisse vel ipsum sed massa gravida varius. Praesent pulvinar, leo et fringilla efficitur, sapien est pharetra elit, vitae sodales leo augue quis felis.</p>\r\n<p>&nbsp;</p>\r\n<p>Morbi sem mi, tincidunt id imperdiet a, condimentum nec lorem.&nbsp;</p>\r\n<p>Sed vel lorem ac libero blandit pellentesque. Etiam condimentum, elit consequat venenatis faucibus, elit lacus vestibulum ex, nec faucibus lorem nisi sit amet urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque ipsum erat, tincidunt id facilisis a, ullamcorper sed lacus. Aenean lectus magna, rutrum eu massa sed, convallis vehicula ante. Sed laoreet tincidunt lacus, non dignissim leo ultrices venenatis.</p>\r\n<p>&nbsp;</p>\r\n<p>Duis et velit sit amet ex euismod rutrum.&nbsp;</p>\r\n<p>Duis ultrices a ex non maximus. Maecenas in neque sollicitudin, consectetur urna vel, varius ipsum. Maecenas non pulvinar mauris, nec lacinia dolor. Nunc consequat orci at felis suscipit lobortis. Donec egestas ac libero at dapibus. Mauris at sem tristique, euismod urna mattis, facilisis orci. Nam hendrerit condimentum nibh quis efficitur. Nunc tincidunt malesuada nunc, at eleifend libero maximus nec.</p>\r\n<p>&nbsp;</p>\r\n<p>Aliquam ac enim non nunc malesuada luctus eu eget diam.&nbsp;</p>\r\n<p>Nulla mollis enim vel cursus aliquet. Sed at fringilla urna. Suspendisse porttitor, elit at iaculis porttitor, risus elit molestie dolor, eu volutpat dui eros ut mi. Mauris orci orci, sollicitudin at odio et, aliquam auctor neque. Cras efficitur erat sed fermentum facilisis. Quisque semper pellentesque enim, at dapibus velit volutpat ut. Aliquam et sagittis orci. Nulla facilisi. Sed in libero vel massa ultricies egestas. Aenean ac massa nisi. Vestibulum pharetra orci quam, non finibus purus sodales at. In vestibulum sem sed sem eleifend facilisis et vitae ex. Fusce nulla ligula, facilisis interdum felis sit amet, blandit facilisis eros. Phasellus ullamcorper vitae leo quis euismod. Curabitur eu lacus nunc.</p>\r\n<p>&nbsp;</p>\r\n<p>Nam bibendum lacus lorem, eleifend accumsan diam vehicula in. Cras consequat, metus ac tempus rhoncus, tortor mauris tristique diam, sit amet accumsan dui metus at ex. Nam molestie mauris eget efficitur scelerisque. Suspendisse ac lectus et eros vulputate tempus eget vel orci. Fusce laoreet sagittis est vel consectetur. Suspendisse quis pulvinar velit. Aenean vel eros ultricies, congue mi ut, fringilla nibh. Mauris consequat scelerisque odio at euismod.</p>\r\n<p>&nbsp;</p>\r\n<p>Donec ut erat hendrerit, varius est vel, ultricies lorem.&nbsp;</p>\r\n<p>Maecenas purus metus, molestie sit amet tincidunt vel, tempus et velit. Aliquam eleifend, magna in interdum gravida, urna libero euismod nibh, non maximus urna arcu ac leo. Suspendisse varius vel dui non imperdiet. Integer sed nulla sit amet ex condimentum eleifend. Etiam vitae arcu a arcu facilisis luctus. Nam varius ex eget diam facilisis, id tempus arcu pellentesque. Sed a tortor maximus, varius nisi quis, lacinia est. Cras vulputate convallis eros quis vulputate. Nam volutpat est nec eros semper, pellentesque ultrices magna dictum.</p>\r\n<p>&nbsp;</p>\r\n<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec ultrices vel turpis eu sodales. Donec aliquet tristique quam vel gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis molestie dui et tincidunt pretium. Pellentesque pharetra auctor faucibus. Duis ultricies ante nibh, rutrum aliquet lectus porta vitae. Fusce rutrum ac tellus non sodales. Ut vitae lacus eu sapien interdum mattis ut condimentum eros. Aenean accumsan tincidunt egestas.</p>\r\n<p>&nbsp;</p>\r\n<p>Nulla eu feugiat enim, sit amet congue mauris. Vivamus tortor est, tristique eget sapien at, malesuada auctor tellus. Etiam at nulla eu nisi tincidunt ultricies. Ut finibus nibh nisi, sed accumsan ligula consequat ac. Nulla quis ante turpis. Ut commodo quam non tellus pellentesque elementum. Phasellus ac purus in risus luctus laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum luctus arcu nulla, tincidunt vehicula lacus ultricies eget. Nullam vitae malesuada leo. Nulla sed purus risus. Cras vehicula in quam vel aliquam. Suspendisse eu purus fringilla, efficitur felis sollicitudin, fermentum sem. Quisque sed nisl eu enim accumsan scelerisque. Cras aliquam egestas orci in tincidunt.</p>\r\n<p>&nbsp;</p>\r\n<p>Fusce id consectetur turpis.&nbsp;</p>\r\n<p>Cras imperdiet et dui et auctor. In eu eleifend nisi. Donec nec iaculis velit. Vestibulum mollis blandit ex, quis ultrices ex laoreet a. Ut lectus purus, gravida a fringilla in, sagittis at magna. Suspendisse et pharetra risus, ut condimentum risus. Aliquam erat volutpat. Fusce rhoncus maximus mi, nec ornare ligula maximus eu. Morbi in mattis ligula. Integer porttitor mi eu luctus ullamcorper.</p>\r\n<p>&nbsp;</p>\r\n<p>Suspendisse in luctus ex, vel egestas eros. Donec eget diam vitae mi tincidunt dictum. Suspendisse maximus in lacus non semper. In faucibus justo quis augue consequat, eu laoreet ipsum sagittis. Proin quis vulputate elit, in tristique elit. Nulla a posuere dolor, a tempus quam. Sed non venenatis nulla, ac molestie est. Phasellus aliquam, ligula sagittis pellentesque egestas, mi arcu cursus orci, sed tristique turpis metus in urna. Morbi convallis, tellus vel ullamcorper commodo, velit massa semper leo, vitae commodo sapien sem eget augue. Etiam auctor convallis tellus eget lacinia. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi bibendum sed tortor vitae auctor. Nulla facilisis justo sit amet nulla lobortis suscipit.</p>\r\n<p>&nbsp;</p>\r\n<p>Nam nulla nisi, fermentum a orci eu, dapibus molestie libero.&nbsp;</p>\r\n<p>Etiam quam nisi, euismod eget tempor eget, euismod sed arcu. Maecenas scelerisque at diam sit amet porttitor. In auctor lobortis quam iaculis aliquet. Proin nec turpis mi. Nam dui ex, laoreet vel facilisis in, iaculis id odio. Vestibulum ex dolor, blandit eu tortor ac, ullamcorper faucibus libero. Duis gravida commodo lacus at maximus. Aliquam erat volutpat. Morbi id lorem accumsan nunc commodo pharetra. Suspendisse potenti. Nunc vestibulum posuere mauris, in rhoncus augue consequat in. Integer ultrices vitae eros et efficitur. Suspendisse potenti. Morbi faucibus leo sit amet lacus posuere, et accumsan nunc sollicitudin. Sed in purus at metus euismod aliquam.</p>', NULL, 'rich_text_box', 23, 'Therms'),
(68, 'site.footerdesc_en', 'Footer short description en', 'EN Movie Circle is the ultimate movie casting platform lorem ipsum dolor sit amet lorem, impresum lait motif.', NULL, 'text', 24, 'Site'),
(69, 'site.footerdesc_de', 'Footer short description de', 'DE Movie Circle is the ultimate movie casting platform lorem ipsum dolor sit amet lorem, impresum lait motif.', NULL, 'text', 24, 'Site'),
(70, 'site.email', 'Email contact', 'petrica@touch-media.ro', NULL, 'text', 25, 'Site'),
(71, 'site.getting_started', 'Getting started video', '[{\"download_link\":\"settings\\/June2020\\/VveRcDLXF5lZav6BcqC1.mp4\",\"original_name\":\"FV7I2QjeI3hYLeyAWaiS.mp4\"}]', NULL, 'file', 26, 'Site');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `subitems`
--

CREATE TABLE `subitems` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `default_inputs` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `subitems`
--

INSERT INTO `subitems` (`id`, `name`, `description`, `created_at`, `updated_at`, `icon`, `tags`, `default_inputs`) VALUES
(1, 'Location', 'Locations can be houses, places, castels, beaches, landscapes, farms etc', NULL, '2020-06-25 20:32:37', 'subitems/June2020/kACIOPgcZBGYfezs9uLZ.png', '[\"Farm\",\"Penthouse\",\"Restaurant\",\"Racetrack\",\"Marketplace\",\"Stud\",\"Glasshouse\",\"Maisonetteflat\",\"Countryhouse\",\"Cityhouse\",\"Beach\",\"Slope\",\"Field\",\"Flowerfield\",\"Stable\",\"Castle\",\"Sea\",\"Lake\",\"Lock\",\"Pond\",\"River\",\"Attic\",\"Church\",\"Mosque\",\"Cellar\",\"Airport\",\"Synagogue\"]', '[{\"title\":\"Type of Location\",\"description\":\"f.e. House, Flat, Loft, Penthouse, castle\",\"value\":\"\"},{\"title\":\"Size\",\"description\":\"f.e. 210 qm\",\"value\":\"\"},{\"title\":\"How many Rooms?\",\"description\":\"f.e. 5\",\"value\":\"\"},{\"title\":\"Garden\",\"description\":\"Yes\\/No\",\"value\":\"\"},{\"title\":\"Size of Garden\",\"description\":\"ca. 300 qm\",\"value\":\"\"}]'),
(2, 'Vehicle', 'You can add any tipe of vehicle, cars, motors, boats, traing, military etc', NULL, '2020-06-25 11:20:05', 'subitems/June2020/c0IyiWgrqCs5f0V09OHk.png', '[\"Bus\",\"Train\",\"Bycicle\",\"Tram\",\"Truck\",\"Airplane\",\"Hovercraft\",\"Boat\",\"Helicopter\",\"Motor vehicles\",\"Ship\",\"Car\",\"Quad\",\"Bike\",\"Tandembike\"]', '[]'),
(3, 'Other items', 'We are sure that in this field of services there are a lot of other items. Add here.', NULL, '2020-06-25 12:08:43', 'subitems/June2020/2iAjmU19rxFYoCfkA069.png', '[\"Drohne\",\"Kost\\u00fcme\",\"Wohnwagen\",\"Catering\",\"Maske\",\"Make-Up\"]', '[]'),
(4, 'Equipment', 'In movie industry there is a lot of equipment. Add here your products.', NULL, '2020-06-25 11:12:20', 'subitems/June2020/X8WZHf5aygLwLSpGgSU5.png', '[\"Ambient light\",\"Artificial light\",\"Apple box\",\"Backlot\",\"Background lighting\",\"Camera crane\",\"Digital audio tape recorder\",\"Digital negative\",\"Gyro-stabilized camera systems\",\"Grip\",\"Shotgun Microphone\",\"Three-Point Lighting Kit\",\"Boom Pole\",\"Schock Mount\",\"Wireless Microphone\",\"Headphones\",\"External Hard Drive\",\"Gimbal Stabilizer\",\"Reflector Kit\",\"Film Emporium\"]', '[]');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Artefacts', '2020-05-19 10:52:35', '2020-05-19 10:52:35'),
(2, 'Animals', '2020-05-19 10:52:42', '2020-05-19 10:52:42'),
(3, 'Places', '2020-05-19 10:52:48', '2020-05-19 10:52:48'),
(4, 'Boats', '2020-05-19 10:52:55', '2020-05-19 10:52:55'),
(5, 'Costumes', '2020-05-19 10:53:01', '2020-05-19 10:53:01'),
(6, 'Vehicules', '2020-05-19 10:53:07', '2020-05-19 10:53:07'),
(7, 'Arms', '2020-05-19 10:53:15', '2020-05-19 10:53:15'),
(8, 'Pets', '2020-05-19 10:53:22', '2020-05-19 10:53:22'),
(9, 'Kids', '2020-05-19 10:53:30', '2020-05-19 10:53:30'),
(10, 'Equipment', '2020-05-19 10:53:35', '2020-05-19 10:53:35');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(31, 'menu_items', 'title', 15, 'de', 'Statische Texte', '2020-04-23 19:05:25', '2020-04-23 19:05:25'),
(32, 'account_types', 'title', 1, 'de', 'Produzent', '2020-04-27 06:40:48', '2020-04-27 06:40:48'),
(33, 'account_types', 'description', 1, 'de', '<p>Suche in der gr&ouml;&szlig;ten #hashtag basierten Filmplattform und organisiere Dein Team.</p>', '2020-04-27 06:40:48', '2020-06-25 09:22:43'),
(34, 'account_types', 'title', 2, 'de', 'Agentur', '2020-04-27 06:44:00', '2020-04-27 06:44:00'),
(35, 'account_types', 'description', 2, 'de', '<p>Bist Du ein Agent und suchst f&uuml;r eine Produktion Schauspieler, Models, Locations, Tiere und Vieles mehr?</p>', '2020-04-27 06:44:00', '2020-06-25 09:17:58'),
(36, 'account_types', 'title', 3, 'de', 'Profil', '2020-04-27 06:44:41', '2020-04-27 06:44:41'),
(37, 'account_types', 'description', 3, 'de', '<p>Suchst Du einen Job in der Filmindustrie? Oder m&ouml;chtest du Dein Kind, Haus, Location, Tier, besonderes Auto und vieles mehr pr&auml;sentieren?</p>', '2020-04-27 06:44:41', '2020-06-25 09:19:36'),
(38, 'data_rows', 'display_name', 81, 'de', 'Id', '2020-04-27 06:54:02', '2020-04-27 06:54:02'),
(39, 'data_rows', 'display_name', 82, 'de', 'Title', '2020-04-27 06:54:02', '2020-04-27 06:54:02'),
(40, 'data_rows', 'display_name', 83, 'de', 'Description', '2020-04-27 06:54:02', '2020-04-27 06:54:02'),
(41, 'data_rows', 'display_name', 84, 'de', 'Video', '2020-04-27 06:54:02', '2020-04-27 06:54:02'),
(42, 'data_rows', 'display_name', 85, 'de', 'Created At', '2020-04-27 06:54:02', '2020-04-27 06:54:02'),
(43, 'data_rows', 'display_name', 86, 'de', 'Updated At', '2020-04-27 06:54:02', '2020-04-27 06:54:02'),
(44, 'data_types', 'display_name_singular', 11, 'de', 'Account Type', '2020-04-27 06:54:02', '2020-04-27 06:54:02'),
(45, 'data_types', 'display_name_plural', 11, 'de', 'Account Types', '2020-04-27 06:54:02', '2020-04-27 06:54:02'),
(46, 'data_rows', 'display_name', 71, 'de', 'Id', '2020-04-27 18:22:39', '2020-04-27 18:22:39'),
(47, 'data_rows', 'display_name', 72, 'de', 'Name', '2020-04-27 18:22:39', '2020-04-27 18:22:39'),
(48, 'data_rows', 'display_name', 73, 'de', 'Email', '2020-04-27 18:22:39', '2020-04-27 18:22:39'),
(49, 'data_rows', 'display_name', 74, 'de', 'Phone', '2020-04-27 18:22:39', '2020-04-27 18:22:39'),
(50, 'data_rows', 'display_name', 75, 'de', 'Location', '2020-04-27 18:22:39', '2020-04-27 18:22:39'),
(51, 'data_rows', 'display_name', 76, 'de', 'Usertype Id', '2020-04-27 18:22:39', '2020-04-27 18:22:39'),
(52, 'data_rows', 'display_name', 77, 'de', 'Logged', '2020-04-27 18:22:39', '2020-04-27 18:22:39'),
(53, 'data_rows', 'display_name', 78, 'de', 'Etoken', '2020-04-27 18:22:39', '2020-04-27 18:22:39'),
(54, 'data_rows', 'display_name', 79, 'de', 'Created At', '2020-04-27 18:22:39', '2020-04-27 18:22:39'),
(55, 'data_rows', 'display_name', 80, 'de', 'Updated At', '2020-04-27 18:22:39', '2020-04-27 18:22:39'),
(56, 'data_types', 'display_name_singular', 10, 'de', 'Account', '2020-04-27 18:22:39', '2020-04-27 18:22:39'),
(57, 'data_types', 'display_name_plural', 10, 'de', 'Accounts', '2020-04-27 18:22:39', '2020-04-27 18:22:39'),
(58, 'data_rows', 'display_name', 87, 'de', 'Password', '2020-04-27 18:31:10', '2020-04-27 18:31:10'),
(59, 'data_rows', 'display_name', 88, 'de', 'account_types', '2020-04-27 18:31:11', '2020-04-27 18:31:11'),
(60, 'data_rows', 'display_name', 89, 'de', 'Profile Pic', '2020-04-30 10:27:00', '2020-04-30 10:27:00'),
(61, 'data_rows', 'display_name', 90, 'de', 'Short Description', '2020-04-30 12:51:23', '2020-04-30 12:51:23'),
(62, 'data_rows', 'display_name', 91, 'de', 'Producer validated?', '2020-04-30 12:51:23', '2020-04-30 12:51:23'),
(63, 'data_rows', 'display_name', 92, 'de', 'Prove Document', '2020-05-07 10:00:25', '2020-05-07 10:00:25'),
(64, 'data_rows', 'display_name', 96, 'de', 'Id', '2020-05-12 13:03:52', '2020-05-12 13:03:52'),
(65, 'data_rows', 'display_name', 97, 'de', 'Name', '2020-05-12 13:03:52', '2020-05-12 13:03:52'),
(66, 'data_rows', 'display_name', 98, 'de', 'Created At', '2020-05-12 13:03:52', '2020-05-12 13:03:52'),
(67, 'data_rows', 'display_name', 99, 'de', 'Updated At', '2020-05-12 13:03:52', '2020-05-12 13:03:52'),
(70, 'data_rows', 'display_name', 104, 'de', 'Id', '2020-05-12 13:35:30', '2020-05-12 13:35:30'),
(71, 'data_rows', 'display_name', 105, 'de', 'Name', '2020-05-12 13:35:30', '2020-05-12 13:35:30'),
(72, 'data_rows', 'display_name', 106, 'de', 'Created At', '2020-05-12 13:35:30', '2020-05-12 13:35:30'),
(73, 'data_rows', 'display_name', 107, 'de', 'Updated At', '2020-05-12 13:35:30', '2020-05-12 13:35:30'),
(74, 'data_types', 'display_name_singular', 16, 'de', 'Account Subtype', '2020-05-12 13:35:30', '2020-05-12 13:35:30'),
(75, 'data_types', 'display_name_plural', 16, 'de', 'Account Subtypes', '2020-05-12 13:35:30', '2020-05-12 13:35:30'),
(76, 'menu_items', 'title', 23, 'de', 'Account Subtypes', '2020-05-12 13:36:03', '2020-05-12 13:36:03'),
(77, 'data_rows', 'display_name', 93, 'de', 'Company Name', '2020-05-12 13:37:07', '2020-05-12 13:37:07'),
(78, 'data_rows', 'display_name', 94, 'de', 'Company Registration', '2020-05-12 13:37:07', '2020-05-12 13:37:07'),
(79, 'data_rows', 'display_name', 95, 'de', 'Company Address', '2020-05-12 13:37:07', '2020-05-12 13:37:07'),
(80, 'data_rows', 'display_name', 109, 'de', 'Description', '2020-05-18 10:23:33', '2020-05-18 10:23:33'),
(81, 'account_subtypes', 'name', 7, 'de', 'Location', '2020-05-18 11:51:39', '2020-06-25 18:41:18'),
(82, 'account_subtypes', 'description', 7, 'de', 'Vögel, Wildtiere, Haustiere, seltsame Tiere, Reptilien und mehr', '2020-05-18 11:51:39', '2020-06-25 12:11:21'),
(83, 'account_subtypes', 'name', 6, 'de', 'Project', '2020-05-18 11:51:46', '2020-05-18 11:51:46'),
(84, 'account_subtypes', 'description', 6, 'de', 'You can add an actor or if you are one you can build your profile', '2020-05-18 11:51:46', '2020-05-18 11:51:46'),
(85, 'account_subtypes', 'name', 5, 'de', 'Profile', '2020-05-18 11:52:34', '2020-05-18 11:52:34'),
(86, 'account_subtypes', 'description', 5, 'de', 'Tehnicians, camera man,\r\nand other important \r\nresources', '2020-05-18 11:52:34', '2020-05-18 11:52:34'),
(87, 'account_subtypes', 'name', 4, 'de', 'Actor', '2020-05-18 11:52:45', '2020-05-18 11:52:45'),
(88, 'account_subtypes', 'description', 4, 'de', 'You can add an actor or if you are one you can build your profile', '2020-05-18 11:52:45', '2020-05-18 11:52:45'),
(89, 'account_subtypes', 'name', 3, 'de', 'Tiere', '2020-05-18 11:53:01', '2020-06-25 14:53:15'),
(90, 'account_subtypes', 'description', 3, 'de', 'Vögel, Wildtiere, Haustiere, seltsame Tiere, Reptilien und mehr', '2020-05-18 11:53:01', '2020-06-25 10:39:46'),
(91, 'account_subtypes', 'name', 2, 'de', 'Crew', '2020-05-18 11:53:11', '2020-05-18 11:53:11'),
(92, 'account_subtypes', 'description', 2, 'de', 'Techniker, Kameramann und andere wichtige Ressourcen. Bitte lege Deine Hashtags an', '2020-05-18 11:53:11', '2020-06-25 18:42:52'),
(93, 'account_subtypes', 'name', 1, 'de', 'Gegenstände', '2020-05-18 11:53:37', '2020-06-25 18:45:02'),
(94, 'account_subtypes', 'description', 1, 'de', 'Bitte füge deine Gegenstände hinzu. Setze dafür #hashtags und beschreibe Dein Gegenstand mit allen wichtigen Informationen', '2020-05-18 11:53:37', '2020-06-25 18:45:02'),
(95, 'data_rows', 'display_name', 115, 'de', 'Id', '2020-05-19 11:46:14', '2020-05-19 11:46:14'),
(96, 'data_rows', 'display_name', 116, 'de', 'Title', '2020-05-19 11:46:14', '2020-05-19 11:46:14'),
(97, 'data_rows', 'display_name', 117, 'de', 'Location', '2020-05-19 11:46:14', '2020-05-19 11:46:14'),
(98, 'data_rows', 'display_name', 118, 'de', 'Fee', '2020-05-19 11:46:14', '2020-05-19 11:46:14'),
(99, 'data_rows', 'display_name', 119, 'de', 'Description', '2020-05-19 11:46:14', '2020-05-19 11:46:14'),
(100, 'data_rows', 'display_name', 120, 'de', 'Tags', '2020-05-19 11:46:14', '2020-05-19 11:46:14'),
(101, 'data_rows', 'display_name', 121, 'de', 'Photos', '2020-05-19 11:46:14', '2020-05-19 11:46:14'),
(102, 'data_rows', 'display_name', 122, 'de', 'Files', '2020-05-19 11:46:14', '2020-05-19 11:46:14'),
(103, 'data_rows', 'display_name', 123, 'de', 'Created At', '2020-05-19 11:46:14', '2020-05-19 11:46:14'),
(104, 'data_rows', 'display_name', 124, 'de', 'Updated At', '2020-05-19 11:46:14', '2020-05-19 11:46:14'),
(105, 'data_rows', 'display_name', 125, 'de', 'accounts', '2020-05-19 11:46:14', '2020-05-19 11:46:14'),
(106, 'data_types', 'display_name_singular', 18, 'de', 'Job', '2020-05-19 11:46:14', '2020-05-19 11:46:14'),
(107, 'data_types', 'display_name_plural', 18, 'de', 'Jobs', '2020-05-19 11:46:14', '2020-05-19 11:46:14'),
(108, 'data_rows', 'display_name', 111, 'de', 'Id', '2020-05-19 12:03:05', '2020-05-19 12:03:05'),
(109, 'data_rows', 'display_name', 113, 'de', 'Created At', '2020-05-19 12:03:05', '2020-05-19 12:03:05'),
(110, 'data_rows', 'display_name', 114, 'de', 'Updated At', '2020-05-19 12:03:05', '2020-05-19 12:03:05'),
(111, 'data_types', 'display_name_singular', 17, 'de', 'Tag', '2020-05-19 12:03:05', '2020-05-19 12:03:05'),
(112, 'data_types', 'display_name_plural', 17, 'de', 'Tags', '2020-05-19 12:03:05', '2020-05-19 12:03:05'),
(113, 'data_rows', 'display_name', 126, 'de', 'User Id', '2020-05-19 12:41:13', '2020-05-19 12:41:13'),
(114, 'data_rows', 'display_name', 128, 'de', 'Fixed Fee', '2020-05-20 05:47:27', '2020-05-20 05:47:27'),
(115, 'data_rows', 'display_name', 129, 'de', 'Currency', '2020-05-20 05:47:27', '2020-05-20 05:47:27'),
(116, 'data_rows', 'display_name', 130, 'de', 'Start Fee', '2020-05-20 06:16:31', '2020-05-20 06:16:31'),
(117, 'data_rows', 'display_name', 131, 'de', 'End Fee', '2020-05-20 06:16:31', '2020-05-20 06:16:31'),
(118, 'data_rows', 'display_name', 132, 'de', 'Id', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(119, 'data_rows', 'display_name', 133, 'de', 'Title', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(120, 'data_rows', 'display_name', 134, 'de', 'Start Fee', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(121, 'data_rows', 'display_name', 135, 'de', 'End Fee', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(122, 'data_rows', 'display_name', 136, 'de', 'Categories', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(123, 'data_rows', 'display_name', 137, 'de', 'Storyline', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(124, 'data_rows', 'display_name', 138, 'de', 'Director', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(125, 'data_rows', 'display_name', 139, 'de', 'Writer', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(126, 'data_rows', 'display_name', 140, 'de', 'Start Date', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(127, 'data_rows', 'display_name', 141, 'de', 'End Date', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(128, 'data_rows', 'display_name', 142, 'de', 'About', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(129, 'data_rows', 'display_name', 143, 'de', 'Team Description', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(130, 'data_rows', 'display_name', 144, 'de', 'Files', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(131, 'data_rows', 'display_name', 145, 'de', 'Photos', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(132, 'data_rows', 'display_name', 147, 'de', 'Tags', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(133, 'data_rows', 'display_name', 148, 'de', 'Created At', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(134, 'data_rows', 'display_name', 149, 'de', 'Updated At', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(135, 'data_types', 'display_name_singular', 19, 'de', 'Project', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(136, 'data_types', 'display_name_plural', 19, 'de', 'Projects', '2020-05-25 11:52:45', '2020-05-25 11:52:45'),
(137, 'data_rows', 'display_name', 150, 'de', 'Jobs', '2020-05-25 11:57:30', '2020-05-25 11:57:30'),
(138, 'data_rows', 'display_name', 151, 'de', 'accounts', '2020-05-25 11:57:30', '2020-05-25 11:57:30'),
(139, 'data_rows', 'display_name', 127, 'de', 'Name', '2020-05-25 12:54:31', '2020-05-25 12:54:31'),
(140, 'data_rows', 'display_name', 152, 'de', 'User', '2020-05-29 10:59:14', '2020-05-29 10:59:14'),
(141, 'data_rows', 'display_name', 159, 'de', 'Id', '2020-06-03 08:59:28', '2020-06-03 08:59:28'),
(142, 'data_rows', 'display_name', 160, 'de', 'Name', '2020-06-03 08:59:28', '2020-06-03 08:59:28'),
(143, 'data_rows', 'display_name', 161, 'de', 'Created At', '2020-06-03 08:59:28', '2020-06-03 08:59:28'),
(144, 'data_rows', 'display_name', 162, 'de', 'Updated At', '2020-06-03 08:59:28', '2020-06-03 08:59:28'),
(145, 'data_types', 'display_name_singular', 21, 'de', 'Subitem', '2020-06-03 08:59:28', '2020-06-03 08:59:28'),
(146, 'data_types', 'display_name_plural', 21, 'de', 'Subitems', '2020-06-03 08:59:28', '2020-06-03 08:59:28'),
(147, 'data_rows', 'display_name', 163, 'de', 'Description', '2020-06-03 09:39:54', '2020-06-03 09:39:54'),
(148, 'subitems', 'name', 1, 'de', 'Location', '2020-06-03 09:40:52', '2020-06-03 09:40:52'),
(149, 'subitems', 'description', 1, 'de', 'Locations können Häuser, Plätze, Schlösser, Strände, Landstriche, Bauernhöfe usw. sein', '2020-06-03 09:40:52', '2020-06-25 10:36:24'),
(150, 'subitems', 'name', 2, 'de', 'Fahrzeuge', '2020-06-03 09:40:58', '2020-06-25 10:51:40'),
(151, 'subitems', 'description', 2, 'de', 'Du kannst jeden beliebigen Fahrzeugtyp, Autos, Motoren, Boote, Trainingsfahrzeuge, Militärfahrzeuge usw. hinzufügen.', '2020-06-03 09:40:58', '2020-06-25 10:51:40'),
(152, 'subitems', 'name', 3, 'de', 'Andere Artikel', '2020-06-03 09:41:04', '2020-06-25 10:53:19'),
(153, 'subitems', 'description', 3, 'de', 'Wir sind sicher, dass es in diesem Bereich der Dienstleistungen noch viele andere Punkte gibt. Hier hinzufügen.', '2020-06-03 09:41:04', '2020-06-25 10:53:19'),
(154, 'subitems', 'name', 4, 'de', 'Ausstattung', '2020-06-03 09:41:09', '2020-06-25 10:55:31'),
(155, 'subitems', 'description', 4, 'de', 'In der Filmindustrie gibt es eine Menge Ausrüstung. Fügen Sie hier Ihre Produkte hinzu.', '2020-06-03 09:41:09', '2020-06-25 10:55:31'),
(156, 'data_rows', 'display_name', 164, 'de', 'Icon', '2020-06-03 11:15:43', '2020-06-03 11:15:43'),
(157, 'data_rows', 'display_name', 165, 'de', 'Tags', '2020-06-03 12:04:34', '2020-06-03 12:04:34'),
(158, 'data_rows', 'display_name', 166, 'de', 'Default Inputs', '2020-06-03 12:04:34', '2020-06-03 12:04:34'),
(159, 'data_rows', 'display_name', 110, 'de', 'Icon', '2020-06-04 10:55:15', '2020-06-04 10:55:15'),
(160, 'data_rows', 'display_name', 167, 'de', 'Default Inputs', '2020-06-04 10:55:43', '2020-06-04 10:55:43'),
(161, 'data_rows', 'display_name', 168, 'de', 'Tags', '2020-06-04 10:55:43', '2020-06-04 10:55:43'),
(162, 'data_rows', 'display_name', 187, 'de', 'Skills', '2020-06-04 12:02:56', '2020-06-04 12:02:56'),
(163, 'data_rows', 'display_name', 108, 'de', 'Account Subtypes', '2020-06-11 10:49:20', '2020-06-11 10:49:20'),
(164, 'data_rows', 'display_name', 204, 'de', 'Id', '2020-06-19 10:19:56', '2020-06-19 10:19:56'),
(165, 'data_rows', 'display_name', 206, 'de', 'Created At', '2020-06-19 10:19:56', '2020-06-19 10:19:56'),
(166, 'data_rows', 'display_name', 207, 'de', 'Updated At', '2020-06-19 10:19:56', '2020-06-19 10:19:56'),
(167, 'data_rows', 'display_name', 205, 'de', 'Fields', '2020-06-19 10:19:56', '2020-06-19 10:19:56'),
(170, 'data_rows', 'display_name', 208, 'de', 'Field Title', '2020-06-19 10:54:35', '2020-06-19 10:54:35'),
(171, 'data_rows', 'display_name', 209, 'de', 'Visible', '2020-06-22 09:08:48', '2020-06-22 09:08:48'),
(172, 'data_rows', 'display_name', 212, 'de', 'Id', '2020-06-22 12:37:15', '2020-06-22 12:37:15'),
(173, 'data_rows', 'display_name', 213, 'de', 'Field Title', '2020-06-22 12:37:15', '2020-06-22 12:37:15'),
(174, 'data_rows', 'display_name', 214, 'de', 'Created At', '2020-06-22 12:37:15', '2020-06-22 12:37:15'),
(175, 'data_rows', 'display_name', 215, 'de', 'Updated At', '2020-06-22 12:37:15', '2020-06-22 12:37:15'),
(176, 'data_rows', 'display_name', 216, 'de', 'Option Fields', '2020-06-22 12:37:15', '2020-06-22 12:37:15'),
(177, 'data_rows', 'display_name', 217, 'de', 'Visible', '2020-06-22 12:37:15', '2020-06-22 12:37:15'),
(180, 'data_rows', 'display_name', 169, 'de', 'Id', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(181, 'data_rows', 'display_name', 170, 'de', 'Inputs', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(182, 'data_rows', 'display_name', 171, 'de', 'Languages', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(183, 'data_rows', 'display_name', 172, 'de', 'General Tags', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(184, 'data_rows', 'display_name', 173, 'de', 'Skill Tags', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(185, 'data_rows', 'display_name', 174, 'de', 'Fee', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(186, 'data_rows', 'display_name', 175, 'de', 'Start Fee', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(187, 'data_rows', 'display_name', 176, 'de', 'End Fee', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(188, 'data_rows', 'display_name', 177, 'de', 'Currency', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(189, 'data_rows', 'display_name', 178, 'de', 'Files', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(190, 'data_rows', 'display_name', 179, 'de', 'Photos', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(191, 'data_rows', 'display_name', 180, 'de', 'Filmography', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(192, 'data_rows', 'display_name', 181, 'de', 'Biography', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(193, 'data_rows', 'display_name', 182, 'de', 'Other', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(194, 'data_rows', 'display_name', 183, 'de', 'User Id', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(195, 'data_rows', 'display_name', 184, 'de', 'Subitem Id', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(196, 'data_rows', 'display_name', 185, 'de', 'Created At', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(197, 'data_rows', 'display_name', 186, 'de', 'Updated At', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(198, 'data_types', 'display_name_singular', 23, 'de', 'Profile', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(199, 'data_types', 'display_name_plural', 23, 'de', 'Profiles', '2020-06-23 08:06:21', '2020-06-23 08:06:21'),
(200, 'data_rows', 'display_name', 157, 'de', 'Slug', '2020-06-23 13:33:42', '2020-06-23 13:33:42'),
(201, 'data_rows', 'display_name', 218, 'de', 'Profile Title', '2020-06-23 14:47:44', '2020-06-23 14:47:44'),
(202, 'data_rows', 'display_name', 219, 'de', 'Profile Location', '2020-06-23 14:47:44', '2020-06-23 14:47:44'),
(203, 'data_rows', 'display_name', 220, 'de', 'Videos', '2020-06-23 14:47:44', '2020-06-23 14:47:44'),
(204, 'data_rows', 'display_name', 221, 'de', 'account_types', '2020-06-23 14:50:02', '2020-06-23 14:50:02'),
(205, 'data_rows', 'display_name', 222, 'de', 'accounts', '2020-06-23 14:53:45', '2020-06-23 14:53:45'),
(206, 'data_rows', 'display_name', 223, 'de', 'accounts', '2020-06-23 16:56:08', '2020-06-23 16:56:08'),
(207, 'data_rows', 'display_name', 224, 'de', 'accounts', '2020-06-23 16:56:08', '2020-06-23 16:56:08'),
(208, 'data_rows', 'display_name', 225, 'de', 'accounts', '2020-06-23 16:56:08', '2020-06-23 16:56:08'),
(211, 'project_categories', 'name', 12, 'de', 'Ads / Commercial', '2020-06-24 13:40:16', '2020-06-24 13:40:16'),
(212, 'search_inputs', 'field_title', 3, 'de', 'Haarfarbe', '2020-06-24 14:35:38', '2020-06-24 14:35:38'),
(213, 'data_rows', 'display_name', 226, 'de', 'Id', '2020-07-06 09:45:23', '2020-07-06 09:45:23'),
(214, 'data_rows', 'display_name', 227, 'de', 'Genre', '2020-07-06 09:45:23', '2020-07-06 09:45:23'),
(215, 'data_rows', 'display_name', 228, 'de', 'Created At', '2020-07-06 09:45:23', '2020-07-06 09:45:23'),
(216, 'data_rows', 'display_name', 229, 'de', 'Updated At', '2020-07-06 09:45:23', '2020-07-06 09:45:23'),
(217, 'data_types', 'display_name_singular', 27, 'de', 'Project Genere', '2020-07-06 09:45:23', '2020-07-06 09:45:23'),
(218, 'data_types', 'display_name_plural', 27, 'de', 'Project Generes', '2020-07-06 09:45:23', '2020-07-06 09:45:23'),
(219, 'menu_items', 'title', 33, 'de', 'Project Generes', '2020-07-06 09:56:30', '2020-07-06 09:56:30'),
(220, 'data_rows', 'display_name', 158, 'de', 'Slug', '2020-07-06 10:29:24', '2020-07-06 10:29:24'),
(221, 'project_generes', 'name', 5, 'de', 'Kabarett', '2020-07-06 10:30:35', '2020-07-06 10:30:35'),
(222, 'project_generes', 'name', 4, 'de', 'Karikatur', '2020-07-06 10:30:54', '2020-07-06 10:30:54'),
(223, 'project_generes', 'name', 3, 'de', 'Abenteuer', '2020-07-06 10:31:13', '2020-07-06 10:31:13'),
(224, 'project_generes', 'name', 1, 'de', 'Biografie', '2020-07-06 10:31:34', '2020-07-06 10:31:34'),
(225, 'data_rows', 'display_name', 231, 'de', 'Status', '2020-07-07 12:10:07', '2020-07-07 12:10:07'),
(226, 'menu_items', 'title', 24, 'de', 'Tags', '2020-07-08 12:10:53', '2020-07-08 12:10:53'),
(227, 'data_rows', 'display_name', 232, 'de', 'account_subtypes', '2020-07-09 05:34:33', '2020-07-09 05:34:33'),
(228, 'data_rows', 'display_name', 233, 'de', 'Id', '2020-07-14 05:45:22', '2020-07-14 05:45:22'),
(229, 'data_rows', 'display_name', 234, 'de', 'Title of tags', '2020-07-14 05:45:22', '2020-07-14 05:45:22'),
(230, 'data_rows', 'display_name', 235, 'de', 'Tags or #tags', '2020-07-14 05:45:22', '2020-07-14 05:45:22'),
(231, 'data_rows', 'display_name', 236, 'de', 'Created At', '2020-07-14 05:45:22', '2020-07-14 05:45:22'),
(232, 'data_rows', 'display_name', 237, 'de', 'Updated At', '2020-07-14 05:45:22', '2020-07-14 05:45:22'),
(236, 'data_rows', 'display_name', 240, 'de', 'Id', '2020-07-23 11:00:23', '2020-07-23 11:00:23'),
(237, 'data_rows', 'display_name', 241, 'de', 'Name', '2020-07-23 11:00:23', '2020-07-23 11:00:23'),
(238, 'data_rows', 'display_name', 242, 'de', 'Tags', '2020-07-23 11:00:23', '2020-07-23 11:00:23'),
(239, 'data_rows', 'display_name', 243, 'de', 'Created At', '2020-07-23 11:00:23', '2020-07-23 11:00:23'),
(240, 'data_rows', 'display_name', 244, 'de', 'Updated At', '2020-07-23 11:00:23', '2020-07-23 11:00:23'),
(241, 'data_types', 'display_name_singular', 30, 'de', 'English tag', '2020-07-23 11:00:23', '2020-07-23 11:00:23'),
(242, 'data_types', 'display_name_plural', 30, 'de', 'English tags', '2020-07-23 11:00:23', '2020-07-23 11:00:23'),
(243, 'data_rows', 'display_name', 238, 'de', 'Order', '2020-07-23 11:37:02', '2020-07-23 11:37:02'),
(244, 'data_rows', 'display_name', 245, 'de', 'Parent Id', '2020-07-24 07:56:01', '2020-07-24 07:56:01'),
(245, 'account_subtypes', 'name', 8, 'de', 'Location', '2020-07-24 10:05:47', '2020-07-24 10:05:47'),
(246, 'account_subtypes', 'description', 8, 'de', 'This is just a short description', '2020-07-24 10:05:47', '2020-07-24 10:05:47'),
(248, 'data_rows', 'display_name', 247, 'de', 'Id', '2020-07-24 10:22:50', '2020-07-24 10:22:50'),
(249, 'data_rows', 'display_name', 248, 'de', 'Name', '2020-07-24 10:22:50', '2020-07-24 10:22:50'),
(250, 'data_rows', 'display_name', 249, 'de', 'Tags', '2020-07-24 10:22:50', '2020-07-24 10:22:50'),
(251, 'data_rows', 'display_name', 250, 'de', 'Created At', '2020-07-24 10:22:50', '2020-07-24 10:22:50'),
(252, 'data_rows', 'display_name', 251, 'de', 'Updated At', '2020-07-24 10:22:50', '2020-07-24 10:22:50'),
(253, 'data_rows', 'display_name', 252, 'de', 'Language', '2020-07-24 10:22:50', '2020-07-24 10:22:50'),
(254, 'data_types', 'display_name_singular', 32, 'de', 'Customtag', '2020-07-24 10:22:50', '2020-07-24 10:22:50'),
(255, 'data_types', 'display_name_plural', 32, 'de', 'Customtags', '2020-07-24 10:22:50', '2020-07-24 10:22:50'),
(256, 'menu_items', 'title', 39, 'de', 'Customtags', '2020-08-11 08:42:37', '2020-08-11 08:42:37'),
(257, 'tags', 'name', 10, 'de', 'Ausrüstung', '2020-08-19 12:12:31', '2020-08-19 12:12:31'),
(258, 'data_rows', 'display_name', 253, 'de', 'Id', '2020-08-21 08:13:01', '2020-08-21 08:13:01'),
(259, 'data_rows', 'display_name', 254, 'de', 'Id User', '2020-08-21 08:13:01', '2020-08-21 08:13:01'),
(260, 'data_rows', 'display_name', 255, 'de', 'Id Profile', '2020-08-21 08:13:01', '2020-08-21 08:13:01'),
(261, 'data_rows', 'display_name', 256, 'de', 'Stars', '2020-08-21 08:13:01', '2020-08-21 08:13:01'),
(262, 'data_rows', 'display_name', 257, 'de', 'Message', '2020-08-21 08:13:01', '2020-08-21 08:13:01'),
(263, 'data_rows', 'display_name', 258, 'de', 'Created At', '2020-08-21 08:13:01', '2020-08-21 08:13:01'),
(264, 'data_rows', 'display_name', 259, 'de', 'Updated At', '2020-08-21 08:13:01', '2020-08-21 08:13:01'),
(265, 'data_rows', 'display_name', 260, 'de', 'accounts', '2020-08-21 08:13:01', '2020-08-21 08:13:01'),
(266, 'data_types', 'display_name_singular', 33, 'de', 'Rating Profile', '2020-08-21 08:13:01', '2020-08-21 08:13:01'),
(267, 'data_types', 'display_name_plural', 33, 'de', 'Rating Profiles', '2020-08-21 08:13:01', '2020-08-21 08:13:01'),
(268, 'data_rows', 'display_name', 261, 'de', 'profiles', '2020-08-21 08:14:48', '2020-08-21 08:14:48'),
(269, 'account_subtypes', 'name', 13, 'de', 'Bikes', '2020-08-26 08:53:22', '2020-08-26 08:53:22'),
(270, 'account_subtypes', 'name', 9, 'de', 'Influencer', '2020-09-03 12:47:05', '2020-09-03 12:47:05'),
(271, 'data_rows', 'display_name', 246, 'de', 'Background Image', '2020-09-04 15:04:24', '2020-09-04 15:04:24'),
(272, 'data_rows', 'display_name', 265, 'de', 'customtags', '2020-09-04 15:04:24', '2020-09-04 15:04:24'),
(273, 'data_rows', 'display_name', 262, 'de', 'Short Description', '2020-09-07 13:32:10', '2020-09-07 13:32:10'),
(274, 'data_rows', 'display_name', 263, 'de', 'Long Description', '2020-09-07 13:32:10', '2020-09-07 13:32:10'),
(275, 'data_rows', 'display_name', 264, 'de', 'Slug', '2020-09-07 13:32:10', '2020-09-07 13:32:10');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$lf0N/r9OjSr0E8drETgnmOGB/3YeUJwsZhR.vX1DlO9nSfJFELvOm', 'wBrO49awvBACjat5rZZZZV8qZUVqFvhbJl16YqOmnWT0zXvnm76bNWnO3S1c', NULL, '2020-03-12 09:32:06', '2020-03-12 09:32:06'),
(2, 3, 'Administrator', 'admin@moviecircle.com', 'users/default.png', NULL, '$2y$10$IGqlELPGLNTEq3562.OAfeVwHXsVFDtjqiavKBNzANv6Cccc950FO', 'lIvHvIjVWW2ARqbOoM7XGxO6PWbCM1VNKodHd3xGPssU8fNlZ2yLFRpMkg3x', '{\"locale\":\"en\"}', '2020-06-09 12:31:12', '2020-06-09 13:26:45');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `account_subtypes`
--
ALTER TABLE `account_subtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `account_tags`
--
ALTER TABLE `account_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexuri pentru tabele `customtags`
--
ALTER TABLE `customtags`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexuri pentru tabele `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexuri pentru tabele `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexuri pentru tabele `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexuri pentru tabele `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexuri pentru tabele `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexuri pentru tabele `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexuri pentru tabele `personal_tags`
--
ALTER TABLE `personal_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexuri pentru tabele `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `project_categories`
--
ALTER TABLE `project_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `project_generes`
--
ALTER TABLE `project_generes`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `rating_profiles`
--
ALTER TABLE `rating_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexuri pentru tabele `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexuri pentru tabele `subitems`
--
ALTER TABLE `subitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexuri pentru tabele `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pentru tabele `account_subtypes`
--
ALTER TABLE `account_subtypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pentru tabele `account_tags`
--
ALTER TABLE `account_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `customtags`
--
ALTER TABLE `customtags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT pentru tabele `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pentru tabele `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pentru tabele `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pentru tabele `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pentru tabele `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT pentru tabele `personal_tags`
--
ALTER TABLE `personal_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pentru tabele `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pentru tabele `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pentru tabele `project_generes`
--
ALTER TABLE `project_generes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `rating_profiles`
--
ALTER TABLE `rating_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pentru tabele `subitems`
--
ALTER TABLE `subitems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constrângeri pentru tabele `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
