-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: mysql
-- ------------------------------------------------------
-- Server version	8.0.31-google

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `libby`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `libby` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `libby`;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `quantity` int NOT NULL DEFAULT '0',
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `books_category_id_foreign` (`category_id`),
  KEY `books_user_id_foreign` (`user_id`),
  CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (14,'To Kill a Mockingbird',1,'Temporibus porro distinctio tempore saepe consequuntur ad. Recusandae illo ut ut eveniet explicabo. Voluptate est quas saepe sint dolores quo cum. Fuga doloribus rem adipisci id.\r\n\r\nVeniam quo sed vel ut temporibus cupiditate. A est ad dolorum deserunt quo ut distinctio. Beatae delectus est impedit cupiditate recusandae.\r\n\r\nAut qui nemo mollitia corporis necessitatibus beatae quas. Qui numquam qui tenetur. Cupiditate rerum temporibus sed dicta. Id vel consectetur iusto in quaerat iste.\r\n\r\nEum possimus pariatur doloribus in. Repellendus numquam mollitia qui quo quae qui tempora perferendis. Est blanditiis totam ut rerum quisquam expedita ut. Aperiam quaerat consequuntur eius est nobis ex error voluptas. Numquam corporis sunt nam et dolorem nulla quidem voluptatem.',48,'storage/pdf-files/pdf_o1iXGmeQfH.pdf','storage/book-cover-images/cover_P3sWJKvD4R.jpg',4,'2024-01-01 03:04:23','2024-01-02 02:40:01'),(16,'Harry Potter and the Sorcerer\'s Stone',1,'Velit sed temporibus pariatur ratione dolor. Dolorem quis cumque omnis soluta doloremque incidunt. Itaque architecto autem repudiandae ut et.\r\n\r\nDelectus omnis est quasi reiciendis rem nemo rem. Minima in et maiores sed repellendus. Amet vitae illo corrupti sed et omnis.\r\n\r\nOfficia voluptatem eos repellat animi necessitatibus ea nemo. Vel voluptatem voluptatum iusto praesentium sed. Aut dolor praesentium explicabo in voluptatem blanditiis debitis. Voluptate nesciunt et blanditiis et.\r\n\r\nNumquam animi soluta repellendus vero minima aspernatur voluptatum libero. Placeat qui dolore hic consequatur iure aut maxime. Accusantium corrupti et sit.',84,'storage/pdf-files/pdf_4fmJ5BmNir.pdf','storage/book-cover-images/cover_EOhrfZM6VR.jpg',5,'2024-01-01 03:04:23','2024-01-02 02:40:40'),(17,'Steve Jobs',2,'Animi soluta sapiente nesciunt eveniet mollitia voluptas. Voluptatem enim sunt blanditiis est voluptatem. Quia eos dolores dolores labore unde quis rerum. Quidem omnis sunt incidunt adipisci corporis fuga vitae.\r\n\r\nIpsam molestiae nihil quam. Quia dolorem ad voluptatem quo quos rerum dolore aliquam. Corrupti quasi sit architecto dolores neque odit incidunt natus. In ipsa facere facere facilis itaque dicta.\r\n\r\nEaque quos adipisci enim dolor. Ratione et exercitationem veniam.\r\n\r\nAut molestiae non necessitatibus et non amet eaque. Nam quod et quas quae. Consequatur occaecati culpa atque et. Quam aut rem nihil amet qui.',19,'storage/pdf-files/pdf_ZJsM1YhAiG.pdf','storage/book-cover-images/cover_6ETkigT3ub.jpg',10,'2024-01-01 03:04:23','2024-01-02 02:41:10'),(18,'Becoming',2,'Dolor repellat vel tenetur impedit excepturi eos dicta. Atque nostrum magni quia aut. Doloribus ea ut corrupti iusto neque. Maiores aut ratione fugiat consequuntur possimus id.\r\n\r\nNam voluptatibus aut autem id vel adipisci quae quae. Inventore libero libero distinctio eos. Suscipit dignissimos dolore quod inventore aut maxime assumenda.\r\n\r\nNam et porro deserunt amet sit. Vel iusto facere veritatis consequatur aut facere laboriosam. Ad velit sunt omnis necessitatibus quasi qui. Aut ratione deleniti qui voluptatibus magnam provident placeat sapiente.\r\n\r\nRem assumenda id est quas quia et. Consequuntur asperiores et sequi sit voluptates dolor facilis. Et quia voluptatem voluptas sunt. Et nulla laborum architecto similique qui magnam et. Dignissimos amet iusto voluptas vel.',20,'storage/pdf-files/pdf_Gp0xLH4fhr.pdf','storage/book-cover-images/cover_VitngKv8hz.jpg',5,'2024-01-01 03:04:23','2024-01-02 02:42:23'),(19,'Educated',2,'Dignissimos qui ut in officiis saepe modi modi. Esse asperiores ab blanditiis sint.\r\n\r\nMolestias nemo alias veniam alias reprehenderit ad. Et eveniet sed aut sed voluptate. Ipsum inventore eum ad maxime.\r\n\r\nPossimus harum minus provident consequuntur id quo est modi. Repudiandae voluptatum consequatur repudiandae tempora vero molestiae rerum. Quod corrupti qui eaque eos iure atque.\r\n\r\nIn expedita sit quidem ut. Aliquid perspiciatis corrupti fuga qui ut velit. Fugit qui eaque cumque blanditiis suscipit labore at. Inventore a ut est nihil sint.',5,'storage/pdf-files/pdf_YmUmaIO1kV.pdf','storage/book-cover-images/cover_9CYTZbt4Ae.jpg',5,'2024-01-01 03:04:23','2024-01-03 14:52:36'),(23,'The 7 Habits of Highly Effective People',4,'Et quibusdam fugit est voluptatum deserunt rem similique laudantium. Officia id recusandae eligendi voluptas. Corporis repudiandae cumque amet est. Dolores eum illo quae similique incidunt aspernatur exercitationem.\r\n\r\nTenetur earum est id. Expedita voluptas pariatur in consequatur autem ut reprehenderit. Veritatis illo eos consequatur ipsa. Voluptates aut porro sunt.\r\n\r\nUt dignissimos aperiam dolore exercitationem molestiae. Laudantium animi dolor veritatis occaecati ut praesentium aperiam. Dolores ad velit quis. Ab explicabo minus molestiae dignissimos aperiam. Nesciunt sed dolorum quas modi.\r\n\r\nEx aut voluptatem ipsum ullam quia tempore nihil. Tempora occaecati occaecati quisquam sed commodi culpa. Provident dolorem velit quis corporis. Vero maiores quaerat nam iure.',25,'storage/pdf-files/pdf_te4kab5wf3.pdf','storage/book-cover-images/cover_ZuBwqxea00.png',6,'2024-01-01 03:04:23','2024-01-02 02:43:36'),(25,'Mindset: The New Psychology of Success',4,'Nisi officia inventore iusto ullam. Optio consequatur aut non asperiores sed repudiandae. Exercitationem error omnis deleniti quo occaecati voluptatibus. Ut autem enim asperiores voluptas sit.\r\n\r\nVoluptatibus sit maiores voluptatibus architecto nisi aut voluptatum. Quasi quod inventore porro deserunt neque animi. Molestias magni at quaerat atque.\r\n\r\nQuasi voluptas numquam beatae. Odio sint eligendi ipsum maiores velit facilis nulla. Iste consequatur quo ex culpa.\r\n\r\nEt provident voluptate aut minima voluptatibus. Accusantium debitis rem asperiores omnis et aut vero. Amet eaque quae vitae est et officiis.',94,'storage/pdf-files/pdf_K2xDURoxRB.pdf','storage/book-cover-images/cover_lTtaGWHOoG.jpg',9,'2024-01-01 03:04:23','2024-01-02 02:44:04'),(26,'Where the Wild Things Are',5,'Totam voluptate dicta asperiores quia nihil beatae. Aperiam quam placeat adipisci dolores et quibusdam.\r\n\r\nHarum aspernatur amet officia nisi explicabo sit perferendis. Ullam praesentium nihil quia qui dolore qui doloremque. Aut aut et numquam libero facilis. Et officiis harum sint qui numquam.\r\n\r\nRerum officiis nihil perferendis nihil. Non tempore dignissimos sapiente sunt consequatur. Explicabo fuga assumenda cupiditate officia ex ut.\r\n\r\nTenetur dignissimos expedita consequatur harum tempora. Corrupti deleniti expedita illum fugiat aut. Iure voluptas consequatur ut rerum ut reprehenderit voluptatibus earum.',31,'storage/pdf-files/pdf_MPexQJG5cW.pdf','storage/book-cover-images/cover_idiQclEF71.jpg',7,'2024-01-01 03:04:23','2024-01-02 02:41:45'),(27,'The Giving Tree',5,'Mollitia et animi ipsa libero sed adipisci et laboriosam. Aut labore sed occaecati qui suscipit qui. Quia qui voluptatibus occaecati.\r\n\r\nUt error omnis aut iusto laudantium excepturi rerum. Non sit nihil voluptatibus reiciendis molestias. Dolores quas ipsam dicta.\r\n\r\nQuisquam eos non quo dolor non atque assumenda. Dolor ex omnis maxime et est ullam dolor voluptate. Sed est eveniet quas quidem.\r\n\r\nVoluptas aut et qui est perspiciatis. Corporis laboriosam explicabo aliquid natus quia quas dolorum. Quia molestias velit quis eos corrupti porro qui libero.',10,'storage/pdf-files/pdf_YUcsivsYTY.pdf','storage/book-cover-images/cover_GuNfBijfAo.jpg',5,'2024-01-01 03:04:23','2024-01-02 02:38:02'),(28,'Matilda',5,'Reprehenderit aut exercitationem impedit placeat vel sunt. Qui ea odio itaque voluptas. Voluptatibus ab molestias et et nesciunt aliquid nobis. Reiciendis sint et dolorum et dolor et. Quia saepe vel quis maiores.\r\n\r\nCorporis magni eveniet reiciendis voluptatem. Eos et quia architecto. Quia dolores asperiores qui. Tempore animi est ducimus pariatur libero labore.\r\n\r\nEt exercitationem voluptatem nihil sed dolor. Adipisci explicabo esse non aut fugit. Ipsa laudantium id dolores molestiae. Iure sunt et corrupti labore qui repellat possimus.\r\n\r\nDicta reprehenderit commodi harum ab consequatur esse fugiat perferendis. Quis tempore eligendi sapiente fuga atque saepe. Animi architecto officia a libero reiciendis.',94,'storage/pdf-files/pdf_HsN1AdmQOV.pdf','storage/book-cover-images/cover_QXWfrXw1Bo.jpg',5,'2024-01-01 03:04:23','2024-01-02 02:37:15'),(33,'anything 4 u',2,'I\'ll catch a flight, go to the moon\r\nLay on the floor of your livin\' room\r\nAnd talk about the things that make you cry (cry)\r\nI\'ll sell my soul, sell my guitar\r\nSleep in the back of a beat up car\r\nGirl, just tell me what I have to do\r\nI\'ll do anything for you',10,'storage/pdf-files/pdf_XK5uZ6Pjbn.pdf','storage/book-cover-images/cover_lX2eI7I3cf.jpg',1,'2024-01-01 17:23:50','2024-01-02 02:39:20'),(35,'Marmut merah muda',4,'Get ya under pink skies, I know exactly where we should go\r\n\'Cause I love the way your green eyes mix with that Malibu indigo\r\nTalking under pink skies, I think our hearts are starting to show\r\nThat it\'s better, you and I, under pink skies',6,'storage/pdf-files/pdf_oXUYxVYVKa.pdf','storage/book-cover-images/cover_eQmc8eUvmj.jpg',12,'2024-01-03 08:58:43','2024-01-03 14:49:54');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Fiksi','2024-01-01 02:42:33','2024-01-01 02:42:33'),(2,'Non-Fiksi','2024-01-01 02:42:33','2024-01-01 02:42:33'),(4,'Self Improvement','2024-01-01 02:42:33','2024-01-02 02:30:06'),(5,'Buku Anak-anak','2024-01-01 02:42:33','2024-01-01 02:42:33'),(6,'Komik','2024-01-03 14:56:00','2024-01-03 14:56:00');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (5,'2014_10_12_000000_create_users_table',1),(6,'2014_10_12_100000_create_password_resets_table',1),(7,'2019_08_19_000000_create_failed_jobs_table',1),(8,'2019_12_14_000001_create_personal_access_tokens_table',1),(9,'2024_01_01_084153_create_categories_table',2),(10,'2024_01_01_084111_create_books_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Dr. Stone Flatley','baumbach.jamar@example.net','2024-01-01 01:20:21','$2y$10$FkglPuOYCNMQUGigR2g7f.chQNcxojEMeP5/xbjVBhYKzqHQRBDGq',0,'csRzN8XT4KLcXoXdpHFDyWwlcWOoP4LcbpkKUgFawYJTgMf65ur1o9tIBUu1','2024-01-01 01:20:22','2024-01-01 01:20:22'),(2,'Jalon Sauer V','armando34@example.org','2024-01-01 01:20:21','$2y$10$ySrzc0rftNY37vSJwfpKNu77URB4V2/yzFHiV0ioaOIcOKzC3CYPy',0,'QQeZtFc5fOytWz4WEv86KN6E8VClayrpysvTbM8y5CvKqxh6OGDWt009TL2i','2024-01-01 01:20:22','2024-01-01 01:20:22'),(3,'Dr. Samson Dicki','jeramy.marks@example.com','2024-01-01 01:20:21','$2y$10$SKX5lY/h15D6XZ0LdGC/eOoreFx0NJRxJmN/DiW5rh.4tld4mWToC',0,'CTw55S6ghx','2024-01-01 01:20:22','2024-01-01 01:20:22'),(4,'Therese Stanton','marge.macejkovic@example.org','2024-01-01 01:20:21','$2y$10$v.qwu4qVWoGYvN50T/6WlOce5vsL4KNqLvt8RUYcPQBXewI8wQjgu',0,'FtHT34o2Sn','2024-01-01 01:20:22','2024-01-01 01:20:22'),(5,'Bryon Kerluke','leonie67@example.com','2024-01-01 01:20:21','$2y$10$GbfHEzBhrKiNz1LMMQdj0.W0SP7xs0EEcNZe/7zKxQRBkVPX7.nQa',0,'xskjmwu2yZvV5UOJM3vBhj6neNGL1XYFlE1Q6Y57sQAPKH5MOOUGrJO1xulU','2024-01-01 01:20:22','2024-01-01 01:20:22'),(6,'Cornelius Paucek','cwolff@example.net','2024-01-01 01:20:21','$2y$10$k.qDs61qggso/ZojonXJM.fcNeWZ6Y2GtMYEuR6eebduy4sh0DdtK',0,'9YciKP7iGONpf4lV3ekTnBGrM6M397AyAevdPG5zRNH9utIdSvOPjwhsX1MU','2024-01-01 01:20:22','2024-01-01 01:20:22'),(7,'Mr. Gabe Mraz','urban37@example.com','2024-01-01 01:20:21','$2y$10$oxuB2gMX1A0XrlzNjOwYb.7r2tRXasdki.Nj9uhBl9QQM0x9H/216',0,'vriAaXHfmT','2024-01-01 01:20:22','2024-01-01 01:20:22'),(8,'Prof. Gino Farrell','vbeer@example.com','2024-01-01 01:20:21','$2y$10$Qgu/JHOPKeQz.vxGlZdDCeP7EdExCLdonCFByqSIkfxKeoaLXQRvW',0,'FCRo1JTiYC','2024-01-01 01:20:22','2024-01-01 01:20:22'),(9,'Ms. Viola Powlowski','melisa19@example.org','2024-01-01 01:20:21','$2y$10$Go2BdxC1lSEqCjZA4NJmfOxQ8YrlOaNhvw2.oQr74FerPN5tfQ8M.',0,'1ykNk4lVnV','2024-01-01 01:20:22','2024-01-01 01:20:22'),(10,'Collin Kassulke','pagac.domenico@example.com','2024-01-01 01:20:21','$2y$10$2YocNz8j5AQ1IK1OKWKBF.EzyFT4y1Z8951weibdvx8CJxnubNwJu',0,'loO9VcT3Aa','2024-01-01 01:20:22','2024-01-01 01:20:22'),(11,'Buddy Jenkins','tgorczany@example.org','2024-01-01 01:21:03','$2y$10$SfNh4Y7OZTRvqFFtR/0hqeTKCbXnYqDOOwe5NU1dDe.PgeUEqlbDi',1,'7N7Lnizh8pfbfy7A4vR7IJbdppvhbBZ1k0odKV7lv79aSECgZIAhSxShpFU2','2024-01-01 01:21:03','2024-01-01 01:21:03'),(12,'Zackery Raynor DVM','lyda.bins@example.com','2024-01-01 01:21:03','$2y$10$HZeU9gcckfvNdtxU7A6Cju1xV932qKNIto/yABG.v55i3WrMUv98a',1,'55BJtpuWuRmJuo7VdTqG5YSCVCqFOaHEoPGSnby9bYJMVdkHaT8wWvM7bBYR','2024-01-01 01:21:03','2024-01-01 01:21:03'),(13,'Mrs. Sierra Rutherford','tabitha19@example.org','2024-01-01 01:21:03','$2y$10$/lpHcSpvTw.1sF/7Bi.IsOnjTAitMHMpkFxBkzqJDxJvFtLpfLFH.',1,'YmZQ7clz2KseddGurfZWKR2ogIcW3nIHUTEDuNvDQvP8Jw7213qLE6QxhCa4','2024-01-01 01:21:03','2024-01-01 01:21:03'),(14,'nogarlic','nglcoair04@gmail.com',NULL,'$2y$10$9ATvI6DMtnohJSfeVkGF7eQHOoEFBEU15fnY8aiR4GWce8WMETk76',0,'qNoUYvEnvVaAP7tAeM1qNBMmboQCmgWPLeCjIhLLOE3w8udOmmVGc2oFNerg','2024-01-01 01:23:50','2024-01-02 01:50:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-03 15:05:06
