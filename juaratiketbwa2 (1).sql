-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2026 at 03:22 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juaratiketbwa2`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_transactions`
--

CREATE TABLE `booking_transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_trx_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` bigint UNSIGNED NOT NULL,
  `total_participant` bigint UNSIGNED NOT NULL,
  `extra_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_service_price` bigint UNSIGNED NOT NULL DEFAULT '0',
  `extra_services_data` json DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL,
  `started_at` date NOT NULL,
  `ticket_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_transactions`
--

INSERT INTO `booking_transactions` (`id`, `name`, `booking_trx_id`, `phone_number`, `email`, `proof`, `total_amount`, `total_participant`, `extra_service`, `extra_service_price`, `extra_services_data`, `is_paid`, `started_at`, `ticket_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(17, 'Van Marco', 'JRT3730', '085607793239', 'vanmarco722@gmail.com', 'proofs/I3uAfOyW6NTcRcR4ZwJIPn6qRDi2HIAaE9hZ0s6P.jpg', 500000, 10, NULL, 0, '\"[]\"', 0, '2026-02-21', 2, NULL, '2026-02-19 08:47:29', '2026-02-19 08:47:29'),
(18, 'Abdul Kanabawi', 'JRT2125', '085880836836', 'suma34881@gmail.com', '01KHX4AM2E04TV9JWN2PAPHEDJ.jpeg', 484998, 10, NULL, 34998, NULL, 1, '2026-02-21', 2, NULL, '2026-02-20 01:58:08', '2026-02-20 01:58:08'),
(19, 'akmal', 'JRT6637', '03485934545', 'akmal@gmail.com', 'proofs/jbB59jxshvaoLLbIeD6Vu3pYeBgKwRxjiVUATW4a.jpg', 84998, 1, 'Test, test2', 34998, '\"[{\\\"slug\\\":\\\"test\\\",\\\"name\\\":\\\"Test\\\",\\\"price\\\":\\\"10000\\\",\\\"quantity\\\":\\\"2\\\",\\\"subtotal\\\":20000},{\\\"slug\\\":\\\"test2\\\",\\\"name\\\":\\\"test2\\\",\\\"price\\\":\\\"14998\\\",\\\"quantity\\\":\\\"1\\\",\\\"subtotal\\\":14998}]\"', 0, '2026-02-23', 2, NULL, '2026-02-20 02:09:55', '2026-02-20 02:09:55'),
(20, 'Van Marco', 'JRT555', '085607793239', 'dexteryildiz@proton.me', '01KHX7X4EGSWCWQ3TDPF1S08EP.png', 74998, 1, 'Test (1x), test2 (1x)', 24998, '\"[{\\\"slug\\\":\\\"test\\\",\\\"name\\\":\\\"Test\\\",\\\"price\\\":10000,\\\"quantity\\\":1,\\\"subtotal\\\":10000},{\\\"slug\\\":\\\"test2\\\",\\\"name\\\":\\\"test2\\\",\\\"price\\\":14998,\\\"quantity\\\":1,\\\"subtotal\\\":14998}]\"', 1, '2026-02-23', 2, NULL, '2026-02-20 03:00:41', '2026-02-20 03:00:41'),
(21, 'anjani', 'JRT1020', '0893848933', 'anjani123@gmail.com', 'proofs/OduJkmKun8P4Rc2ZJzkG5VJb3b4LINwAcXLPfmLR.jpg', 224994, 3, 'Test, test2', 74994, '\"[{\\\"slug\\\":\\\"test\\\",\\\"name\\\":\\\"Test\\\",\\\"price\\\":\\\"10000\\\",\\\"quantity\\\":\\\"3\\\",\\\"subtotal\\\":30000},{\\\"slug\\\":\\\"test2\\\",\\\"name\\\":\\\"test2\\\",\\\"price\\\":\\\"14998\\\",\\\"quantity\\\":\\\"3\\\",\\\"subtotal\\\":44994}]\"', 0, '2026-02-23', 2, NULL, '2026-02-21 11:33:38', '2026-02-21 11:33:38'),
(22, 'anggi', 'JRT2378', '08238432332', 'anggi123@gmail.com', 'proofs/Y8hBnJzESWlWWJKFkJrDCVKidEzqWEd9iVvtREst.jpg', 124994, 1, 'Test, test2', 74994, '\"[{\\\"slug\\\":\\\"test\\\",\\\"name\\\":\\\"Test\\\",\\\"price\\\":\\\"10000\\\",\\\"quantity\\\":\\\"3\\\",\\\"subtotal\\\":30000},{\\\"slug\\\":\\\"test2\\\",\\\"name\\\":\\\"test2\\\",\\\"price\\\":\\\"14998\\\",\\\"quantity\\\":\\\"3\\\",\\\"subtotal\\\":44994}]\"', 0, '2027-02-21', 2, NULL, '2026-02-21 11:45:34', '2026-02-21 11:45:34'),
(23, 'anjas', 'JRT4307', '0838535353', 'anjas123@gmail.com', 'proofs/Zwgm1twoG8zvuMHfqz4gr16OSX3utR80d3gQxW6W.png', 74998, 1, 'Test, test2', 24998, '\"[{\\\"slug\\\":\\\"test\\\",\\\"name\\\":\\\"Test\\\",\\\"price\\\":\\\"10000\\\",\\\"quantity\\\":\\\"1\\\",\\\"subtotal\\\":10000},{\\\"slug\\\":\\\"test2\\\",\\\"name\\\":\\\"test2\\\",\\\"price\\\":\\\"14998\\\",\\\"quantity\\\":\\\"1\\\",\\\"subtotal\\\":14998}]\"', 1, '2026-02-23', 2, NULL, '2026-02-22 02:09:32', '2026-02-23 02:14:25'),
(24, 'ujang', 'JRT3717', '2384927424', 'ujang1233@gmail.com', 'proofs/FfaSsGPfM991eX2FnmDxrXG9S1cieGb4YoLE75Ly.png', 60000, 4, NULL, 0, '\"[]\"', 1, '2026-05-23', 3, NULL, '2026-02-22 08:50:13', '2026-02-22 09:57:14'),
(25, 'akmal', 'JRT3500', '0845943535', 'akmal32432@gmail.com', 'proofs/vkrUVLCsnRsh1LWQnajZ4ebubT88PExXsiFjdaEW.png', 174994, 2, 'Test, test2', 74994, '\"[{\\\"slug\\\":\\\"test\\\",\\\"name\\\":\\\"Test\\\",\\\"price\\\":\\\"10000\\\",\\\"quantity\\\":\\\"3\\\",\\\"subtotal\\\":30000},{\\\"slug\\\":\\\"test2\\\",\\\"name\\\":\\\"test2\\\",\\\"price\\\":\\\"14998\\\",\\\"quantity\\\":\\\"3\\\",\\\"subtotal\\\":44994}]\"', 0, '2026-02-24', 2, NULL, '2026-02-23 07:33:42', '2026-02-23 07:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1771581693),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1771581693;', 1771581693),
('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1771857411),
('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1771857411;', 1771857411);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon_white` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `deleted_at`, `created_at`, `updated_at`, `icon_white`) VALUES
(1, 'Kolam Renang', 'kolam-renang', '01KGM3EA4ZF1WQXF0MYK7CVGTW.png', NULL, '2025-12-10 09:47:25', '2026-02-04 03:33:49', '01KGM3EA5387GKXMWTK46SH6K1.png'),
(2, 'Camping Ground', 'camping-ground', '01KGM3CEBGZAFH5BBHWPFD4VB3.png', NULL, '2025-12-10 09:56:48', '2026-02-04 03:32:48', '01KGM3CEBMSRCCGN6P401286VR.png'),
(3, 'Open Spaces', 'open-spaces', '01KDA35CP1MQ5FZVBZ9WB8M1P5.png', '2026-01-30 21:46:42', '2025-12-10 09:57:51', '2026-01-30 21:46:42', '01KDA35CP7ZHE38FTM5PV03T4E.png'),
(4, 'Wild Parks', 'wild-parks', '01KDA37EXNRTHS9ER20V5BNR0X.png', '2026-01-30 21:46:49', '2025-12-10 09:58:34', '2026-01-30 21:46:49', '01KDA37EXTRKM9C91NFNKFJ9FG.png'),
(5, 'Landmarks', 'landmarks', '01KDA39HR5MESR1P9E19YQC8QY.png', '2026-01-30 21:46:56', '2025-12-10 09:58:51', '2026-01-30 21:46:56', '01KDA39HRBE2WPNGHMQRW4RN55.png');

-- --------------------------------------------------------

--
-- Table structure for table `extra_services`
--

CREATE TABLE `extra_services` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `ticket_id` bigint UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extra_services`
--

INSERT INTO `extra_services` (`id`, `name`, `slug`, `price`, `is_active`, `ticket_id`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test', 'test', 10000, 1, 2, NULL, '2026-02-17 21:32:52', '2026-02-17 21:32:52', NULL),
(2, 'test2', 'test2', 14998, 1, 2, NULL, '2026-02-17 21:45:15', '2026-02-17 21:45:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, 'c1663e5c-917a-4c62-a39f-632541aa61fe', 'database', 'default', '{\"uuid\":\"c1663e5c-917a-4c62-a39f-632541aa61fe\",\"displayName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"command\":\"O:34:\\\"App\\\\Jobs\\\\SendBookingConfirmedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 'Symfony\\Component\\Mailer\\Exception\\UnexpectedResponseException: Expected response code \"354\" but got code \"550\", with message \"550 5.7.0 Too many emails per second. Please upgrade your plan https://mailtrap.io/billing/plans/testing\". in C:\\laragon\\www\\project-ticket-boncahe\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php:331\nStack trace:\n#0 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(187): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->assertResponseCode(\'550 5.7.0 Too m...\', Array)\n#1 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php(150): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->executeCommand(\'DATA\\r\\n\', Array)\n#2 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(209): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->executeCommand(\'DATA\\r\\n\', Array)\n#3 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\symfony\\mailer\\Transport\\AbstractTransport.php(69): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->doSend(Object(Symfony\\Component\\Mailer\\SentMessage))\n#4 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(138): Symfony\\Component\\Mailer\\Transport\\AbstractTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#5 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(585): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#6 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(332): Illuminate\\Mail\\Mailer->sendSymfonyMessage(Object(Symfony\\Component\\Mime\\Email))\n#7 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(207): Illuminate\\Mail\\Mailer->send(Object(Closure), Array, Object(Closure))\n#8 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->{closure:Illuminate\\Mail\\Mailable::send():200}()\n#9 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(200): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#10 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(354): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#11 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(301): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\OrderConfirmed))\n#12 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\OrderConfirmed))\n#13 C:\\laragon\\www\\project-ticket-boncahe\\app\\Jobs\\SendBookingConfirmedEmail.php(28): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\OrderConfirmed))\n#14 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendBookingConfirmedEmail->handle()\n#15 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::{closure:Illuminate\\Container\\BoundMethod::call():35}()\n#16 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#17 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#18 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#19 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(126): Illuminate\\Container\\Container->call(Array)\n#20 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Bus\\Dispatcher->{closure:Illuminate\\Bus\\Dispatcher::dispatchNow():123}(Object(App\\Jobs\\SendBookingConfirmedEmail))\n#21 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->{closure:Illuminate\\Pipeline\\Pipeline::prepareDestination():168}(Object(App\\Jobs\\SendBookingConfirmedEmail))\n#22 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(130): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#23 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendBookingConfirmedEmail), false)\n#24 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Queue\\CallQueuedHandler->{closure:Illuminate\\Queue\\CallQueuedHandler::dispatchThroughMiddleware():121}(Object(App\\Jobs\\SendBookingConfirmedEmail))\n#25 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->{closure:Illuminate\\Pipeline\\Pipeline::prepareDestination():168}(Object(App\\Jobs\\SendBookingConfirmedEmail))\n#26 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(121): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#27 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendBookingConfirmedEmail))\n#28 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#29 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(442): Illuminate\\Queue\\Jobs\\Job->fire()\n#30 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(392): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#31 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(178): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#32 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(149): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(132): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#34 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#35 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::{closure:Illuminate\\Container\\BoundMethod::call():35}()\n#36 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#37 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#38 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#39 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(213): Illuminate\\Container\\Container->call(Array)\n#40 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\symfony\\console\\Command\\Command.php(341): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#41 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#42 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\symfony\\console\\Application.php(1102): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\symfony\\console\\Application.php(356): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\symfony\\console\\Application.php(195): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\laragon\\www\\project-ticket-boncahe\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\laragon\\www\\project-ticket-boncahe\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#48 {main}', '2026-01-05 03:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(6, 'default', '{\"uuid\":\"267553d2-4972-4b1e-aa1c-4c695ba805cb\",\"displayName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"command\":\"O:34:\\\"App\\\\Jobs\\\\SendBookingConfirmedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769853910, 1769853910),
(7, 'default', '{\"uuid\":\"75d7ff40-4b2d-4036-a80c-65ff0988ffdf\",\"displayName\":\"App\\\\Jobs\\\\SendBookingApprovedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingApprovedEmail\",\"command\":\"O:33:\\\"App\\\\Jobs\\\\SendBookingApprovedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:6:\\\"ticket\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769856382, 1769856382),
(8, 'default', '{\"uuid\":\"725c60ab-4bda-4a72-970d-0a6ff7386a72\",\"displayName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"command\":\"O:34:\\\"App\\\\Jobs\\\\SendBookingConfirmedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770238169, 1770238169),
(9, 'default', '{\"uuid\":\"27e25dbe-70f0-408c-8490-ec8f071bc5ff\",\"displayName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"command\":\"O:34:\\\"App\\\\Jobs\\\\SendBookingConfirmedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770238336, 1770238336),
(10, 'default', '{\"uuid\":\"f6c81e4f-a3f3-4255-9f3a-57cb1b76280c\",\"displayName\":\"App\\\\Jobs\\\\SendBookingApprovedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingApprovedEmail\",\"command\":\"O:33:\\\"App\\\\Jobs\\\\SendBookingApprovedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:6:\\\"ticket\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770238706, 1770238706),
(11, 'default', '{\"uuid\":\"b7ab7c6a-c2c8-4ec2-b7ce-6d9950b3aa1d\",\"displayName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"command\":\"O:34:\\\"App\\\\Jobs\\\\SendBookingConfirmedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770482366, 1770482366),
(12, 'default', '{\"uuid\":\"32e81843-8f45-4c13-954b-3000202509bc\",\"displayName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"command\":\"O:34:\\\"App\\\\Jobs\\\\SendBookingConfirmedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770632430, 1770632430),
(13, 'default', '{\"uuid\":\"2b1f606f-e2e0-4770-851e-162dfd1ace7f\",\"displayName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"command\":\"O:34:\\\"App\\\\Jobs\\\\SendBookingConfirmedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1771491236, 1771491236),
(14, 'default', '{\"uuid\":\"ee2f3fa0-9889-43e7-8b11-8aa6f0314d30\",\"displayName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"command\":\"O:34:\\\"App\\\\Jobs\\\\SendBookingConfirmedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1771516052, 1771516052),
(15, 'default', '{\"uuid\":\"8835b97c-d422-4eb1-91c3-7f8e241847d1\",\"displayName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"command\":\"O:34:\\\"App\\\\Jobs\\\\SendBookingConfirmedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:19;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1771578596, 1771578596),
(16, 'default', '{\"uuid\":\"958061a3-7552-46bf-b02c-38a46e28022e\",\"displayName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"command\":\"O:34:\\\"App\\\\Jobs\\\\SendBookingConfirmedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:21;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1771698822, 1771698822),
(17, 'default', '{\"uuid\":\"f07eddfd-0a46-4886-9682-4898713f24eb\",\"displayName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"command\":\"O:34:\\\"App\\\\Jobs\\\\SendBookingConfirmedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1771699534, 1771699534),
(18, 'default', '{\"uuid\":\"db8395ed-871f-46b2-bcd5-e470340acdd6\",\"displayName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"command\":\"O:34:\\\"App\\\\Jobs\\\\SendBookingConfirmedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:23;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1771751377, 1771751377),
(19, 'default', '{\"uuid\":\"97cc44f0-22ad-43bc-b83c-69aaef101345\",\"displayName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"command\":\"O:34:\\\"App\\\\Jobs\\\\SendBookingConfirmedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:24;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1771775417, 1771775417),
(20, 'default', '{\"uuid\":\"f4eadbeb-2548-4d93-970a-d3c7a5f3c6f7\",\"displayName\":\"App\\\\Jobs\\\\SendBookingApprovedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingApprovedEmail\",\"command\":\"O:33:\\\"App\\\\Jobs\\\\SendBookingApprovedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:24;s:9:\\\"relations\\\";a:1:{i:0;s:6:\\\"ticket\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1771779434, 1771779434),
(21, 'default', '{\"uuid\":\"bf724982-281b-4565-b555-f2686b9cbbb6\",\"displayName\":\"App\\\\Jobs\\\\SendBookingApprovedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingApprovedEmail\",\"command\":\"O:33:\\\"App\\\\Jobs\\\\SendBookingApprovedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:23;s:9:\\\"relations\\\";a:1:{i:0;s:6:\\\"ticket\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1771838067, 1771838067),
(22, 'default', '{\"uuid\":\"07ed439b-9e61-46bd-a360-547f7dca4b23\",\"displayName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingConfirmedEmail\",\"command\":\"O:34:\\\"App\\\\Jobs\\\\SendBookingConfirmedEmail\\\":1:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BookingTransaction\\\";s:2:\\\"id\\\";i:25;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1771857225, 1771857225);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_10_090318_create_categories_table', 2),
(5, '2025_12_10_090338_create_sellers_table', 2),
(6, '2025_12_10_091552_create_tickets_table', 2),
(7, '2025_12_10_091613_create_ticket_photos_table', 2),
(8, '2025_12_10_091703_create_booking_transactions_table', 2),
(9, '2025_12_25_055504_add_icon_white', 3),
(10, '2025_02_06_add_extra_service_to_booking_transactions', 4),
(11, '2026_02_13_080650_create_extra_services_table', 5),
(12, '2026_02_18_051318_add_extra_services_data_to_booking_transactions', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `telephone`, `location`, `slug`, `photo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Swargiloka ', '0873467237', 'Indonesia', 'swargiloka', '01KC783MGWSV1TBMR3Q4YSZHZB.jpg', NULL, '2025-12-11 10:42:27', '2026-01-30 21:39:45'),
(2, 'Boncahe', '08479584954', 'Indonesia', 'boncahe', '01KC789C4X9JYTE9YEE7H5672G.jpg', NULL, '2025-12-11 10:45:35', '2026-01-30 21:44:06'),
(3, 'Bali', '0832643274', 'Indonesia', 'bali', '01KC78AWA53MJYBY81QMNEV8PP.jpg', '2026-01-30 21:44:41', '2025-12-11 10:46:24', '2026-01-30 21:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Dvi9X5idCwXupIE4eFqiOvi2qHshuRj1AYVrWHjU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiUWN6bjdlQTNDVDVIU1owN3cxYVE2ek51SnVuTllBclpncXpiSE5DbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9ib29raW5nLXRyYW5zYWN0aW9ucyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NzoiYm9va2luZyI7YToxMTp7czo5OiJ0aWNrZXRfaWQiO2k6MjtzOjQ6Im5hbWUiO3M6NToiYWttYWwiO3M6NToiZW1haWwiO3M6MjA6ImFrbWFsMzI0MzJAZ21haWwuY29tIjtzOjEyOiJwaG9uZV9udW1iZXIiO3M6MTA6IjA4NDU5NDM1MzUiO3M6MTA6InN0YXJ0ZWRfYXQiO3M6MTA6IjIwMjYtMDItMjQiO3M6MTc6InRvdGFsX3BhcnRpY2lwYW50IjtzOjE6IjIiO3M6MTQ6ImV4dHJhX3NlcnZpY2VzIjthOjI6e2k6MDthOjU6e3M6NDoic2x1ZyI7czo0OiJ0ZXN0IjtzOjQ6Im5hbWUiO3M6NDoiVGVzdCI7czo1OiJwcmljZSI7czo1OiIxMDAwMCI7czo4OiJxdWFudGl0eSI7czoxOiIzIjtzOjg6InN1YnRvdGFsIjtpOjMwMDAwO31pOjE7YTo1OntzOjQ6InNsdWciO3M6NToidGVzdDIiO3M6NDoibmFtZSI7czo1OiJ0ZXN0MiI7czo1OiJwcmljZSI7czo1OiIxNDk5OCI7czo4OiJxdWFudGl0eSI7czoxOiIzIjtzOjg6InN1YnRvdGFsIjtpOjQ0OTk0O319czoxOToiZXh0cmFfc2VydmljZV9wcmljZSI7czo1OiI3NDk5NCI7czo5OiJzdWJfdG90YWwiO2k6MTc0OTk0O3M6OToidG90YWxfcHBuIjtpOjA7czoxMjoidG90YWxfYW1vdW50IjtpOjE3NDk5NDt9czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRMT1Z1MEhmTWphMEFYdUhjMGhObXd1UExyYXk1a0RKQXNkSm5CdVNjUW9ydExtakhpWFdVaSI7fQ==', 1771858897);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint UNSIGNED NOT NULL,
  `is_popular` tinyint(1) NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_time_at` time NOT NULL,
  `closed_time_at` time NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `seller_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `name`, `slug`, `address`, `thumbnail`, `path_video`, `price`, `is_popular`, `about`, `open_time_at`, `closed_time_at`, `category_id`, `seller_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'BONCAHE SWIMMING POOL', 'boncahe-swimming-pool', 'Jl. Dukuh Manis, Sukajaya, Kecamatan Tamansari, Kabupaten Bogor, Jawa Barat 16610', '01KG92M3CR4BZDPW2D77FS3BBT.webp', 'https://www.youtube.com/watch?v=pbUHLWzSuho', 30000, 1, '<p>Pas banget buat liburan keluarga, Kolam Renang Boncahe punya suasana yang asri dan sejuk banget buat nyantai. Di sini kamu bisa seru-seruan main air karena ada satu kolam renang utama yang luas buat dewasa dan dua kolam renang khusus anak yang pastinya aman buat si kecil. Tempatnya yang dikelilingi pepohonan hijau bikin momen berenang jadi makin segar, cocok banget buat kamu yang ingin <em>healing</em> sejenak sambil kumpul bareng keluarga atau teman-teman.&nbsp;</p>', '09:00:00', '17:00:00', 1, 2, NULL, '2025-12-12 02:16:53', '2026-01-30 21:59:21'),
(2, 'Camping Ground Ar Boncahe', 'camping-ground-ar-boncahe', 'Jl. Dukuh Manis, Sukajaya, Kecamatan Tamansari, Kabupaten Bogor, Jawa Barat 16610', '01KGPKBV39T516WZPJP63MMQXF.jpg', '#', 50000, 1, '<p>Nikmati pelarian singkat dari rutinitas di <strong>Camping Ground Boncahe</strong>. Destinasi berkemah favorit dengan pemandangan hijau yang memukau, udara sejuk pegunungan, dan suasana yang menenangkan. Cocok untuk keluarga maupun komunitas.</p><ul><li><strong>Pemandangan Alam:</strong> <em>Sunrise</em> memukau dan hamparan kabut pagi.</li><li><strong>Fasilitas Lengkap:</strong> Toilet bersih, mushola, akses listrik, dan parkir luas.</li><li><strong>Akses Mudah:</strong> Dapat dijangkau oleh kendaraan roda dua maupun roda empat.</li></ul>', '09:00:00', '15:00:00', 2, 2, NULL, '2026-02-05 02:50:34', '2026-02-05 02:50:34'),
(3, 'Swargiloka Park', 'swargiloka-park', 'Sawargiloka Waterland', '01KGQ42AKMTQ327ZEN3HPSS9R0.webp', '.', 15000, 1, '<p><strong>Swagiloka Park: Harmoni Alam untuk Keluarga Anda.</strong> Nikmati kesegaran udara pegunungan dan pemandangan hijau yang memanjakan mata di Swagiloka Park. Hadir sebagai destinasi wisata keluarga yang mengusung konsep alam asri, kami menawarkan kolam renang yang jernih dengan latar suasana yang sejuk dan tenang. Tempat sempurna untuk melepas penat dan menciptakan momen hangat bersama orang-orang tersayang.&nbsp;</p>', '08:00:00', '17:00:00', 1, 1, NULL, '2026-02-05 07:42:28', '2026-02-05 07:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_photos`
--

CREATE TABLE `ticket_photos` (
  `id` bigint UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_photos`
--

INSERT INTO `ticket_photos` (`id`, `photo`, `ticket_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '01KG92M3CXFDNCDTJ4XSEMAHQS.webp', 1, NULL, '2026-01-30 20:47:51', '2026-01-30 20:47:51'),
(2, '01KG92M3CZCX6TGC0PZPZDY9F4.webp', 1, NULL, '2026-01-30 20:47:51', '2026-01-30 20:47:51'),
(3, '01KGPKBV3FWXFPGN8NH9E5KS3P.webp', 2, NULL, '2026-02-05 02:50:34', '2026-02-05 02:50:34'),
(4, '01KGPKBV3HTVA507SGVX9QCAWN.webp', 2, NULL, '2026-02-05 02:50:34', '2026-02-05 02:50:34'),
(5, '01KGQ42AKST0FB2WTGXZAFRRPQ.webp', 3, NULL, '2026-02-05 07:42:28', '2026-02-05 07:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Nazmi', 'admin123@gmail.com', NULL, '$2y$12$LOVu0HfMja0AXuHc0hNmwuPLray5kDJAsdJnBuScQortLmjHiXWUi', NULL, '2025-12-10 08:55:24', '2025-12-10 08:55:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_transactions`
--
ALTER TABLE `booking_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_transactions_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_services`
--
ALTER TABLE `extra_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `extra_services_slug_unique` (`slug`),
  ADD KEY `extra_services_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_category_id_foreign` (`category_id`),
  ADD KEY `tickets_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `ticket_photos`
--
ALTER TABLE `ticket_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_photos_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_transactions`
--
ALTER TABLE `booking_transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `extra_services`
--
ALTER TABLE `extra_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_photos`
--
ALTER TABLE `ticket_photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_transactions`
--
ALTER TABLE `booking_transactions`
  ADD CONSTRAINT `booking_transactions_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `extra_services`
--
ALTER TABLE `extra_services`
  ADD CONSTRAINT `extra_services_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_photos`
--
ALTER TABLE `ticket_photos`
  ADD CONSTRAINT `ticket_photos_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
