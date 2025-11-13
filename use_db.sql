-- MySQL dump 10.13  Distrib 8.0.36, for macos14 (arm64)
--
-- Host: localhost    Database: use_db
-- ------------------------------------------------------
-- Server version	8.0.36

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
-- Table structure for table `annual_reports`
--

DROP TABLE IF EXISTS `annual_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `annual_reports` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annual_reports`
--

LOCK TABLES `annual_reports` WRITE;
/*!40000 ALTER TABLE `annual_reports` DISABLE KEYS */;
INSERT INTO `annual_reports` VALUES (1,'USE Annual Report 2023.pdf','https://use.or.ug/uploads/e6d87d55-6b7a-48dd-87a9-2577294ebb38.pdf','65.7mb','2025-02-26 00:00:00','2025-11-12 19:27:10','2025-11-12 19:27:10'),(2,'USE Annual Report 2021.pdf','https://use.or.ug/uploads/927579c3-daa8-4cea-adf9-d0ddda592ea0.pdf','6.8mb','2022-11-15 00:00:00','2025-11-12 19:28:22','2025-11-12 19:28:22'),(3,'USE Annual Report 2020.pdf','https://use.or.ug/uploads/d0bc63a8-cf62-4784-ae81-85479abbaa04.pdf','4.27mb','2022-01-28 00:00:00','2025-11-12 19:29:41','2025-11-12 19:29:41'),(4,'USE Annual Report 2019.pdf','https://use.or.ug/uploads/f838414f-c2c8-48eb-8837-947addebdfb8.pdf','5.03mb','2020-10-05 00:00:00','2025-11-12 19:30:25','2025-11-12 19:30:25'),(5,'USE Annual Report 2015.pdf','https://use.or.ug/uploads/2f2f5f4d-d260-4ca7-b02b-4b3a4e5ac6f6.pdf','2.73mb','2016-12-14 00:00:00','2025-11-12 19:31:58','2025-11-12 19:31:58'),(6,'USE Annual Report 2014.pdf','https://use.or.ug/uploads/162d352f-8d3a-4f6d-bd53-4847eb8551be.pdf','2.81mb','2015-07-21 00:00:00','2025-11-12 19:35:20','2025-11-12 19:35:20'),(7,'USE Annual Report 2013.pdf','https://use.or.ug/uploads/eb4bd149-dc71-4b57-9aa7-223b06d2997c.pdf','4.18mb','2014-11-16 00:00:00','2025-11-12 19:39:25','2025-11-12 19:39:25'),(8,'USE Annual Report 2012.pdf','https://use.or.ug/uploads/b37a35c9-cb57-4b51-afcc-5e89b6a98019.pdf','5.62mb','2014-11-16 00:00:00','2025-11-12 19:41:25','2025-11-12 19:41:25'),(9,'USE Annual Report 2010.pdf','https://use.or.ug/uploads/2d4b4063-13b0-4a92-b918-58e1fe0cb7e7.pdf','1.37mb','2011-09-01 00:00:00','2025-11-12 19:42:59','2025-11-12 19:42:59');
/*!40000 ALTER TABLE `annual_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carousel_images`
--

DROP TABLE IF EXISTS `carousel_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carousel_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carousel_images`
--

LOCK TABLES `carousel_images` WRITE;
/*!40000 ALTER TABLE `carousel_images` DISABLE KEYS */;
INSERT INTO `carousel_images` VALUES (1,'Your Ultimate Gateway to Uganda\'s financial market',NULL,'https://demo.use.or.ug/images/c558563a-417a-4817-be92-0ffad321327b.jpg','Start Trading','https://demo.use.org/investors/investor-faqs',0,1,'2025-09-20 17:06:14','2025-10-28 11:13:25'),(2,'East Africa\'s Premier Financial Market',NULL,'https://www.use.or.ug/images/ea59e97c-12d0-4b04-a55c-b3c0a3e52116.jpeg','Start Trading',NULL,0,1,'2025-09-20 17:06:53','2025-10-28 19:43:32'),(3,'Your Ultimate Gateway to Uganda\'s financial market',NULL,'https://www.use.or.ug/images/c77e181e-3705-4f22-b37c-53bd63a5ea53.jpeg',NULL,NULL,0,1,'2025-09-20 17:08:53','2025-10-28 19:44:11');
/*!40000 ALTER TABLE `carousel_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `corporate_announcements`
--

DROP TABLE IF EXISTS `corporate_announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `corporate_announcements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `corporate_announcements`
--

LOCK TABLES `corporate_announcements` WRITE;
/*!40000 ALTER TABLE `corporate_announcements` DISABLE KEYS */;
INSERT INTO `corporate_announcements` VALUES (1,'NVL- PROFIT WARNING.pdf','https://use.or.ug/uploads/8c8b6bc5-de70-4edc-af03-9931a357febc.pdf','1.07mb','2023-09-15 00:00:00','2025-11-13 06:18:53','2025-11-13 06:18:53'),(2,'EABL - 2023 AGM Voting Results - 14 September 2023.pdf','https://use.or.ug/uploads/796f4cfa-74a9-4df7-b34d-fa5b2f94faf0.pdf','0.45mb','2023-09-15 00:00:00','2025-11-13 06:21:35','2025-11-13 06:21:35');
/*!40000 ALTER TABLE `corporate_announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `show_on_site` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (5,'The USE Neighbour Connect Campaign','This World Investor Week, we’re stepping out of our offices to meet our neighbours at Nakawa Business Park under the theme \"𝐍𝐞𝐢𝐠𝐡𝐛𝐨𝐮𝐫 𝟐 𝐍𝐞𝐢𝐠𝐡𝐛𝐨𝐮𝐫: 𝐁𝐮𝐢𝐥𝐝𝐢𝐧𝐠 𝐖𝐞𝐚𝐥𝐭𝐡 𝐓𝐨𝐠𝐞𝐭𝐡𝐞𝐫” \n\nThis is a special outreach campaign where our team will engage, appreciate, and share financial literacy tips with our neighbouring organisations and their employees. \n\n💡 Together, we’re Inspiring Growth - one neighbour at a time.','2025-10-31 14:10:00',NULL,'https://use.or.ug/images/a3e1a800-2025-4242-97b4-0e0e99aedc34.jpeg',1,1,'2025-10-28 08:11:01','2025-10-28 12:46:51'),(6,'Invest In Knowledge Growth','This #WorldInvestorWeek2025, we’re taking financial empowerment to the heart of Kampala! 💪','2025-10-29 23:15:00',NULL,'https://use.or.ug/images/4510beb6-97b2-45a0-8d59-95b15a0454db.jpeg',1,1,'2025-10-28 17:15:31','2025-10-28 17:15:31');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_files_category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (5,'c558563a-417a-4817-be92-0ffad321327b.jpg','pexels-rdne-7947707 (1).jpg','images/c558563a-417a-4817-be92-0ffad321327b.jpg','https://use.or.ug/images/c558563a-417a-4817-be92-0ffad321327b.jpg','image/jpeg','image',NULL,292959,NULL,NULL,'2025-09-21 11:04:31','2025-09-21 11:04:31'),(6,'f1e1c7ea-bd74-41c5-866a-8e57fcfa21fe.jpg','pexels-energepic-com-27411-159888.jpg','images/f1e1c7ea-bd74-41c5-866a-8e57fcfa21fe.jpg','https://use.or.ug/images/f1e1c7ea-bd74-41c5-866a-8e57fcfa21fe.jpg','image/jpeg','image',NULL,585100,NULL,NULL,'2025-09-21 11:07:48','2025-09-21 11:07:48'),(7,'7df237ab-c034-483f-927e-d2db880744cd.webp','temp_lm_img.webp','images/7df237ab-c034-483f-927e-d2db880744cd.webp','https://use.or.ug/images/7df237ab-c034-483f-927e-d2db880744cd.webp','image/webp','image',NULL,375252,NULL,NULL,'2025-09-22 06:17:06','2025-09-22 06:17:06'),(8,'a7138055-f5f9-4394-b729-4a64e639e42e.pdf','PDF-Listings.pdf','uploads/a7138055-f5f9-4394-b729-4a64e639e42e.pdf','https://use.or.ug/uploads/a7138055-f5f9-4394-b729-4a64e639e42e.pdf','application/pdf','pdf',NULL,437635,NULL,NULL,'2025-10-25 17:17:17','2025-10-25 17:17:17'),(10,'ffba7964-df45-4ba2-be71-cec0396b73a3.pdf','PDF-Listings.pdf','uploads/ffba7964-df45-4ba2-be71-cec0396b73a3.pdf','https://demo.use.or.ug/uploads/ffba7964-df45-4ba2-be71-cec0396b73a3.pdf','application/pdf','pdf',NULL,437635,NULL,NULL,'2025-10-25 18:42:49','2025-10-25 18:42:49'),(11,'0607ac65-b128-42d8-ba42-5c1574295300.png','Screenshot 2025-10-26 at 23.18.01.png','images/0607ac65-b128-42d8-ba42-5c1574295300.png','https://use.or.ug/images/0607ac65-b128-42d8-ba42-5c1574295300.png','image/png','image',NULL,588114,NULL,NULL,'2025-10-26 18:00:34','2025-10-26 18:00:34'),(12,'8ed1dc54-d255-4f28-bef2-45419f0361a7.jpg','Umeme_Ltd-768x288.jpg','images/8ed1dc54-d255-4f28-bef2-45419f0361a7.jpg','http://localhost/images/8ed1dc54-d255-4f28-bef2-45419f0361a7.jpg','image/jpeg','image',NULL,17753,NULL,NULL,'2025-10-28 08:24:57','2025-10-28 08:24:57'),(13,'b0aae9ac-35e1-4d68-b48c-8e69a2acc9b5.jpg','Bank-of-Baroda-in-Jinja.jpg','images/b0aae9ac-35e1-4d68-b48c-8e69a2acc9b5.jpg','https://use.or.ug/images/b0aae9ac-35e1-4d68-b48c-8e69a2acc9b5.jpg','image/jpeg','image',NULL,97033,NULL,NULL,'2025-10-28 12:37:52','2025-10-28 12:37:52'),(14,'19e260cd-589a-4bfb-967b-57742f4881d7.png','ug-bobu-logo.png','images/19e260cd-589a-4bfb-967b-57742f4881d7.png','https://use.or.ug/images/19e260cd-589a-4bfb-967b-57742f4881d7.png','image/png','image',NULL,56666,NULL,NULL,'2025-10-28 12:41:19','2025-10-28 12:41:19'),(15,'a3e1a800-2025-4242-97b4-0e0e99aedc34.jpeg','G4Rtx8KXkAA9o12.jpeg','images/a3e1a800-2025-4242-97b4-0e0e99aedc34.jpeg','https://use.or.ug/images/a3e1a800-2025-4242-97b4-0e0e99aedc34.jpeg','image/jpeg','image',NULL,1446745,NULL,NULL,'2025-10-28 12:45:55','2025-10-28 12:45:55'),(16,'764912d2-43bc-4a88-94d2-db7de3b76dbe.jpg','STANBIC-BANK_1000X450.jpg','images/764912d2-43bc-4a88-94d2-db7de3b76dbe.jpg','https://use.or.ug/images/764912d2-43bc-4a88-94d2-db7de3b76dbe.jpg','image/jpeg','image',NULL,478101,NULL,NULL,'2025-10-28 13:08:51','2025-10-28 13:08:51'),(17,'e918014b-a04c-497e-96c0-02b7619311ca.pdf','180314c3-3bfc-44a9-a43c-b0b4c8178f67.pdf','uploads/e918014b-a04c-497e-96c0-02b7619311ca.pdf','https://use.or.ug/uploads/e918014b-a04c-497e-96c0-02b7619311ca.pdf','application/pdf','pdf',NULL,945594,NULL,NULL,'2025-10-28 13:10:19','2025-10-28 13:10:19'),(18,'882d3a77-533b-4b51-89f9-91a44e9374eb.pdf','e06bad72-e918-4d3b-8e6a-1109175fd4c7.pdf','uploads/882d3a77-533b-4b51-89f9-91a44e9374eb.pdf','https://use.or.ug/uploads/882d3a77-533b-4b51-89f9-91a44e9374eb.pdf','application/pdf','pdf',NULL,123482,NULL,NULL,'2025-10-28 15:50:32','2025-10-28 15:50:32'),(19,'bc1185f0-cb01-491b-b15f-a403a57758bd.png','Umeme.png','images/bc1185f0-cb01-491b-b15f-a403a57758bd.png','https://use.or.ug/images/bc1185f0-cb01-491b-b15f-a403a57758bd.png','image/png','image',NULL,1134966,NULL,NULL,'2025-10-28 15:53:24','2025-10-28 15:53:24'),(20,'4510beb6-97b2-45a0-8d59-95b15a0454db.jpeg','G4WpIybWkAA5ZMN.jpeg','images/4510beb6-97b2-45a0-8d59-95b15a0454db.jpeg','https://use.or.ug/images/4510beb6-97b2-45a0-8d59-95b15a0454db.jpeg','image/jpeg','image',NULL,727613,NULL,NULL,'2025-10-28 17:14:27','2025-10-28 17:14:27'),(21,'ab18f797-9e4d-4b13-99f5-710bb18277aa.doc','OPT IN FOR MM DIVIDENDS KENYANS.doc','uploads/ab18f797-9e4d-4b13-99f5-710bb18277aa.doc','https://use.or.ug/uploads/ab18f797-9e4d-4b13-99f5-710bb18277aa.doc','application/msword','document',NULL,50688,NULL,NULL,'2025-11-12 16:04:42','2025-11-12 16:04:42'),(22,'3cbf84c5-e78d-4def-a7d6-243189fae69c.doc','OPT IN FOR MM DIVIDENDS UGANDANS.doc','uploads/3cbf84c5-e78d-4def-a7d6-243189fae69c.doc','https://use.or.ug/uploads/3cbf84c5-e78d-4def-a7d6-243189fae69c.doc','application/msword','document',NULL,49664,NULL,NULL,'2025-11-12 16:17:08','2025-11-12 16:17:08'),(23,'ea4ff79f-88b2-4bf7-a1f1-0be6c18f194a.pdf','SCD Form 1A   word.pdf','uploads/ea4ff79f-88b2-4bf7-a1f1-0be6c18f194a.pdf','https://use.or.ug/uploads/ea4ff79f-88b2-4bf7-a1f1-0be6c18f194a.pdf','application/pdf','pdf',NULL,284367,NULL,NULL,'2025-11-12 16:20:52','2025-11-12 16:20:52'),(24,'f6b46e37-6995-42de-b489-f34cc2f3618f.pdf','Guarantee Fund  Procedures.pdf','uploads/f6b46e37-6995-42de-b489-f34cc2f3618f.pdf','https://use.or.ug/uploads/f6b46e37-6995-42de-b489-f34cc2f3618f.pdf','application/pdf','pdf',NULL,150283,NULL,NULL,'2025-11-12 16:34:24','2025-11-12 16:34:24'),(25,'f032995d-774a-49e7-a32c-728ec47afb40.pdf','SCD Act No. 1 of 2009.pdf','uploads/f032995d-774a-49e7-a32c-728ec47afb40.pdf','https://use.or.ug/uploads/f032995d-774a-49e7-a32c-728ec47afb40.pdf','application/pdf','pdf',NULL,470925,NULL,NULL,'2025-11-12 16:38:28','2025-11-12 16:38:28'),(26,'06604b3c-e64a-4367-b53d-cc88be72a3c0.pdf','USE SCD Rules March 2023.pdf','uploads/06604b3c-e64a-4367-b53d-cc88be72a3c0.pdf','https://use.or.ug/uploads/06604b3c-e64a-4367-b53d-cc88be72a3c0.pdf','application/pdf','pdf',NULL,297510,NULL,NULL,'2025-11-12 16:41:57','2025-11-12 16:41:57'),(27,'ac5afd77-4e7d-4b43-862c-a28181596b5e.pdf','SCD Regulations S.I. No. 38 of 2009.pdf','uploads/ac5afd77-4e7d-4b43-862c-a28181596b5e.pdf','https://use.or.ug/uploads/ac5afd77-4e7d-4b43-862c-a28181596b5e.pdf','application/pdf','pdf',NULL,427004,NULL,NULL,'2025-11-12 16:45:07','2025-11-12 16:45:07'),(28,'b536d26e-4ab7-409d-8cb8-973384d05cca.pdf','Proposed Amendments to SCDS Rules and Operating Procedures.pdf','uploads/b536d26e-4ab7-409d-8cb8-973384d05cca.pdf','https://use.or.ug/uploads/b536d26e-4ab7-409d-8cb8-973384d05cca.pdf','application/pdf','pdf',NULL,189387,NULL,NULL,'2025-11-12 17:12:45','2025-11-12 17:12:45'),(29,'877c46d4-d560-4244-9ba7-e266659d773f.pdf','SUMMARY OF THE 2025 AMENDMENTS.pdf','uploads/877c46d4-d560-4244-9ba7-e266659d773f.pdf','https://use.or.ug/uploads/877c46d4-d560-4244-9ba7-e266659d773f.pdf','application/pdf','pdf',NULL,2850134,NULL,NULL,'2025-11-12 17:33:55','2025-11-12 17:33:55'),(30,'e118622d-10ee-4f95-958a-f61e9aeb173d.pdf','TRADE NOTIFICATION FORM.pdf','uploads/e118622d-10ee-4f95-958a-f61e9aeb173d.pdf','https://use.or.ug/uploads/e118622d-10ee-4f95-958a-f61e9aeb173d.pdf','application/pdf','pdf',NULL,27226,NULL,NULL,'2025-11-12 17:34:06','2025-11-12 17:34:06'),(31,'5edc4767-2638-430f-b410-8b353cdb3c0d.pdf','USE Fees, Charges and Penalties Rules  2025 as amended.pdf','uploads/5edc4767-2638-430f-b410-8b353cdb3c0d.pdf','https://use.or.ug/uploads/5edc4767-2638-430f-b410-8b353cdb3c0d.pdf','application/pdf','pdf',NULL,257109,NULL,NULL,'2025-11-12 17:34:11','2025-11-12 17:34:11'),(32,'a676a378-ae78-42be-a663-1a1bea6f8673.pdf','USE Growth Enterprise Markets Segment (GEMS) Rules 2012.pdf','uploads/a676a378-ae78-42be-a663-1a1bea6f8673.pdf','https://use.or.ug/uploads/a676a378-ae78-42be-a663-1a1bea6f8673.pdf','application/pdf','pdf',NULL,266741,NULL,NULL,'2025-11-12 17:34:15','2025-11-12 17:34:15'),(33,'82dde113-0abe-4298-86ae-4709a0448bde.pdf','USE Guidelines  for Online Shareholder Meetings.pdf','uploads/82dde113-0abe-4298-86ae-4709a0448bde.pdf','https://use.or.ug/uploads/82dde113-0abe-4298-86ae-4709a0448bde.pdf','application/pdf','pdf',NULL,215450,NULL,NULL,'2025-11-12 17:34:21','2025-11-12 17:34:21'),(34,'cc14e07f-a7c2-48a9-8706-d3c19d965ca8.pdf','USE Insider Trading Rules 2008.pdf','uploads/cc14e07f-a7c2-48a9-8706-d3c19d965ca8.pdf','https://use.or.ug/uploads/cc14e07f-a7c2-48a9-8706-d3c19d965ca8.pdf','application/pdf','pdf',NULL,93408,NULL,NULL,'2025-11-12 17:34:25','2025-11-12 17:34:25'),(35,'72796c34-71d7-40ca-9189-5ed27d82ecc9.pdf','USE Listing Rules 2025 as amended.pdf','uploads/72796c34-71d7-40ca-9189-5ed27d82ecc9.pdf','https://use.or.ug/uploads/72796c34-71d7-40ca-9189-5ed27d82ecc9.pdf','application/pdf','pdf',NULL,1174160,NULL,NULL,'2025-11-12 17:34:29','2025-11-12 17:34:29'),(36,'e9633a32-4c8c-4cca-8527-5916edb40224.pdf','USE Rules Amendments -Summary of Amendments.pdf','uploads/e9633a32-4c8c-4cca-8527-5916edb40224.pdf','https://use.or.ug/uploads/e9633a32-4c8c-4cca-8527-5916edb40224.pdf','application/pdf','pdf',NULL,4509336,NULL,NULL,'2025-11-12 17:35:44','2025-11-12 17:35:44'),(37,'903c51b5-c574-4f48-a057-55b21aba2357.pdf','USE Trading Participant Rules 2021 (amended) .pdf','uploads/903c51b5-c574-4f48-a057-55b21aba2357.pdf','https://use.or.ug/uploads/903c51b5-c574-4f48-a057-55b21aba2357.pdf','application/pdf','pdf',NULL,450104,NULL,NULL,'2025-11-12 17:35:48','2025-11-12 17:35:48'),(38,'76a4762e-6d9a-448f-b191-cb65d9bdbe62.pdf','USE Trading Participant Rules 2021.pdf','uploads/76a4762e-6d9a-448f-b191-cb65d9bdbe62.pdf','https://use.or.ug/uploads/76a4762e-6d9a-448f-b191-cb65d9bdbe62.pdf','application/pdf','pdf',NULL,279946,NULL,NULL,'2025-11-12 17:35:52','2025-11-12 17:35:52'),(39,'41cc46ec-a312-42c0-8ad4-6285088fa88b.pdf','USE Trading Rules 25 Feb 2025 as amended.pdf','uploads/41cc46ec-a312-42c0-8ad4-6285088fa88b.pdf','https://use.or.ug/uploads/41cc46ec-a312-42c0-8ad4-6285088fa88b.pdf','application/pdf','pdf',NULL,447225,NULL,NULL,'2025-11-12 17:35:57','2025-11-12 17:35:57'),(40,'31c80758-195c-48e9-8b03-318213cddf9a.pdf','USE Annual Report 2002.pdf','uploads/31c80758-195c-48e9-8b03-318213cddf9a.pdf','https://use.or.ug/uploads/31c80758-195c-48e9-8b03-318213cddf9a.pdf','application/pdf','pdf',NULL,1183500,NULL,NULL,'2025-11-12 19:12:31','2025-11-12 19:12:31'),(41,'eeff561f-665b-4865-bd5c-2c869f2c9a29.pdf','USE Annual Report 2003.pdf','uploads/eeff561f-665b-4865-bd5c-2c869f2c9a29.pdf','https://use.or.ug/uploads/eeff561f-665b-4865-bd5c-2c869f2c9a29.pdf','application/pdf','pdf',NULL,760996,NULL,NULL,'2025-11-12 19:12:41','2025-11-12 19:12:41'),(42,'d53e2b43-f578-4fb4-a54f-4ccacf82ad32.pdf','USE Annual Report 2004.pdf','uploads/d53e2b43-f578-4fb4-a54f-4ccacf82ad32.pdf','https://use.or.ug/uploads/d53e2b43-f578-4fb4-a54f-4ccacf82ad32.pdf','application/pdf','pdf',NULL,890094,NULL,NULL,'2025-11-12 19:12:47','2025-11-12 19:12:47'),(43,'2598bba8-a378-4716-a2e9-42e8ce869b59.pdf','USE Annual Report 2005.pdf','uploads/2598bba8-a378-4716-a2e9-42e8ce869b59.pdf','https://use.or.ug/uploads/2598bba8-a378-4716-a2e9-42e8ce869b59.pdf','application/pdf','pdf',NULL,1277602,NULL,NULL,'2025-11-12 19:12:53','2025-11-12 19:12:53'),(44,'89405228-a31a-4bd1-a730-7f560bfd3d8b.pdf','USE Annual Report 2006.pdf','uploads/89405228-a31a-4bd1-a730-7f560bfd3d8b.pdf','https://use.or.ug/uploads/89405228-a31a-4bd1-a730-7f560bfd3d8b.pdf','application/pdf','pdf',NULL,1334961,NULL,NULL,'2025-11-12 19:12:58','2025-11-12 19:12:58'),(45,'6da4a814-0cb7-4158-b5ab-09e8e30a82f7.pdf','USE Annual Report 2007.pdf','uploads/6da4a814-0cb7-4158-b5ab-09e8e30a82f7.pdf','https://use.or.ug/uploads/6da4a814-0cb7-4158-b5ab-09e8e30a82f7.pdf','application/pdf','pdf',NULL,1264688,NULL,NULL,'2025-11-12 19:13:03','2025-11-12 19:13:03'),(46,'3d97a096-b4f8-403d-b440-c9341d800c45.pdf','USE Annual Report 2009.pdf','uploads/3d97a096-b4f8-403d-b440-c9341d800c45.pdf','https://use.or.ug/uploads/3d97a096-b4f8-403d-b440-c9341d800c45.pdf','application/pdf','pdf',NULL,3030277,NULL,NULL,'2025-11-12 19:13:07','2025-11-12 19:13:07'),(47,'2d4b4063-13b0-4a92-b918-58e1fe0cb7e7.pdf','USE Annual Report 2010.pdf','uploads/2d4b4063-13b0-4a92-b918-58e1fe0cb7e7.pdf','https://use.or.ug/uploads/2d4b4063-13b0-4a92-b918-58e1fe0cb7e7.pdf','application/pdf','pdf',NULL,1437568,NULL,NULL,'2025-11-12 19:13:18','2025-11-12 19:13:18'),(48,'b37a35c9-cb57-4b51-afcc-5e89b6a98019.pdf','USE Annual Report 2012.pdf','uploads/b37a35c9-cb57-4b51-afcc-5e89b6a98019.pdf','https://use.or.ug/uploads/b37a35c9-cb57-4b51-afcc-5e89b6a98019.pdf','application/pdf','pdf',NULL,5892327,NULL,NULL,'2025-11-12 19:13:26','2025-11-12 19:13:26'),(49,'eb4bd149-dc71-4b57-9aa7-223b06d2997c.pdf','USE Annual Report 2013.pdf','uploads/eb4bd149-dc71-4b57-9aa7-223b06d2997c.pdf','https://use.or.ug/uploads/eb4bd149-dc71-4b57-9aa7-223b06d2997c.pdf','application/pdf','pdf',NULL,4383546,NULL,NULL,'2025-11-12 19:13:31','2025-11-12 19:13:31'),(50,'a0f4e9ce-727b-48ff-b1cb-bc3626b7acf0.pdf','USE Annual Report 2014.pdf','uploads/a0f4e9ce-727b-48ff-b1cb-bc3626b7acf0.pdf','https://use.or.ug/uploads/a0f4e9ce-727b-48ff-b1cb-bc3626b7acf0.pdf','application/pdf','pdf',NULL,2949916,NULL,NULL,'2025-11-12 19:13:37','2025-11-12 19:13:37'),(51,'162d352f-8d3a-4f6d-bd53-4847eb8551be.pdf','USE Annual Report 2014.pdf','uploads/162d352f-8d3a-4f6d-bd53-4847eb8551be.pdf','https://use.or.ug/uploads/162d352f-8d3a-4f6d-bd53-4847eb8551be.pdf','application/pdf','pdf',NULL,2949916,NULL,NULL,'2025-11-12 19:13:44','2025-11-12 19:13:44'),(52,'2f2f5f4d-d260-4ca7-b02b-4b3a4e5ac6f6.pdf','USE Annual Report 2015.pdf','uploads/2f2f5f4d-d260-4ca7-b02b-4b3a4e5ac6f6.pdf','https://use.or.ug/uploads/2f2f5f4d-d260-4ca7-b02b-4b3a4e5ac6f6.pdf','application/pdf','pdf',NULL,2489018,NULL,NULL,'2025-11-12 19:13:49','2025-11-12 19:13:49'),(53,'f838414f-c2c8-48eb-8837-947addebdfb8.pdf','USE Annual Report 2019.pdf','uploads/f838414f-c2c8-48eb-8837-947addebdfb8.pdf','https://use.or.ug/uploads/f838414f-c2c8-48eb-8837-947addebdfb8.pdf','application/pdf','pdf',NULL,5275199,NULL,NULL,'2025-11-12 19:13:56','2025-11-12 19:13:56'),(54,'d0bc63a8-cf62-4784-ae81-85479abbaa04.pdf','USE Annual Report 2020.pdf','uploads/d0bc63a8-cf62-4784-ae81-85479abbaa04.pdf','https://use.or.ug/uploads/d0bc63a8-cf62-4784-ae81-85479abbaa04.pdf','application/pdf','pdf',NULL,4478794,NULL,NULL,'2025-11-12 19:14:02','2025-11-12 19:14:02'),(55,'927579c3-daa8-4cea-adf9-d0ddda592ea0.pdf','USE Annual Report 2021.pdf','uploads/927579c3-daa8-4cea-adf9-d0ddda592ea0.pdf','https://use.or.ug/uploads/927579c3-daa8-4cea-adf9-d0ddda592ea0.pdf','application/pdf','pdf',NULL,7134759,NULL,NULL,'2025-11-12 19:14:08','2025-11-12 19:14:08'),(56,'e6d87d55-6b7a-48dd-87a9-2577294ebb38.pdf','USE Annual Report 2023.pdf','uploads/e6d87d55-6b7a-48dd-87a9-2577294ebb38.pdf','https://use.or.ug/uploads/e6d87d55-6b7a-48dd-87a9-2577294ebb38.pdf','application/pdf','pdf',NULL,68893418,NULL,NULL,'2025-11-12 19:25:49','2025-11-12 19:25:49'),(57,'228096bc-da37-4617-b5e0-b500811fccee.png','3D-logo.png','images/228096bc-da37-4617-b5e0-b500811fccee.png','https://use.or.ug/images/228096bc-da37-4617-b5e0-b500811fccee.png','image/png','image','general',74883,NULL,NULL,'2025-11-12 20:21:31','2025-11-12 20:21:31'),(58,'a6ef7ee5-185f-483c-becc-bcb627d1722d.pdf','USE PRIVATE TRANSFER TRANSACTION PRESENTATION website (1).pdf','uploads/a6ef7ee5-185f-483c-becc-bcb627d1722d.pdf','https://use.or.ug/uploads/a6ef7ee5-185f-483c-becc-bcb627d1722d.pdf','application/pdf','pdf','private-transfers',1418248,NULL,NULL,'2025-11-13 08:54:34','2025-11-13 08:54:34'),(59,'8c8b6bc5-de70-4edc-af03-9931a357febc.pdf','NVL- PROFIT WARNING.pdf','uploads/8c8b6bc5-de70-4edc-af03-9931a357febc.pdf','https://use.or.ug/uploads/8c8b6bc5-de70-4edc-af03-9931a357febc.pdf','application/pdf','pdf','announcements',1122022,NULL,NULL,'2025-11-13 09:17:35','2025-11-13 09:17:35'),(60,'796f4cfa-74a9-4df7-b34d-fa5b2f94faf0.pdf','EABL - 2023 AGM Voting Results - 14 September 2023.pdf','uploads/796f4cfa-74a9-4df7-b34d-fa5b2f94faf0.pdf','https://use.or.ug/uploads/796f4cfa-74a9-4df7-b34d-fa5b2f94faf0.pdf','application/pdf','pdf','announcements',472147,NULL,NULL,'2025-11-13 09:17:46','2025-11-13 09:17:46');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `market_performance`
--

DROP TABLE IF EXISTS `market_performance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `market_performance` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `market_performance`
--

LOCK TABLES `market_performance` WRITE;
/*!40000 ALTER TABLE `market_performance` DISABLE KEYS */;
INSERT INTO `market_performance` VALUES (1,'Market Performance in July 2025.pdf','https://demo.use.or.ug/uploads/ffba7964-df45-4ba2-be71-cec0396b73a3.pdf','100mb','2025-10-21 13:26:00','2025-10-26 07:22:59','2025-10-26 07:26:11');
/*!40000 ALTER TABLE `market_performance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `market_regulations`
--

DROP TABLE IF EXISTS `market_regulations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `market_regulations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `market_regulations`
--

LOCK TABLES `market_regulations` WRITE;
/*!40000 ALTER TABLE `market_regulations` DISABLE KEYS */;
INSERT INTO `market_regulations` VALUES (1,'Proposed Amendments to SCDS Rules and Operating Procedures.pdf','https://use.or.ug/uploads/b536d26e-4ab7-409d-8cb8-973384d05cca.pdf','0.18mb','2023-07-29 00:00:00','2025-11-12 17:42:19','2025-11-12 17:42:19'),(2,'SUMMARY OF THE 2025 AMENDMENTS.pdf','https://use.or.ug/uploads/877c46d4-d560-4244-9ba7-e266659d773f.pdf','2.72mb','2025-05-29 00:00:00','2025-11-12 17:54:46','2025-11-12 17:54:46'),(3,'TRADE NOTIFICATION FORM.pdf','https://use.or.ug/uploads/e118622d-10ee-4f95-958a-f61e9aeb173d.pdf','0.03mb','2021-05-21 00:00:00','2025-11-12 17:55:42','2025-11-12 17:55:42'),(4,'USE Fees, Charges and Penalties Rules 2025 as amended.pdf','https://use.or.ug/uploads/5edc4767-2638-430f-b410-8b353cdb3c0d.pdf','0.25mb','2025-02-26 00:00:00','2025-11-12 17:59:33','2025-11-12 17:59:33'),(5,'USE Growth Enterprise Markets Segment (GEMS) Rules 2012.pdf','https://use.or.ug/uploads/a676a378-ae78-42be-a663-1a1bea6f8673.pdf','0.25mb','2021-04-01 00:00:00','2025-11-12 18:00:56','2025-11-12 18:00:56'),(6,'USE Guidelines for Online Shareholder Meetings.pdf','https://use.or.ug/uploads/82dde113-0abe-4298-86ae-4709a0448bde.pdf','0.21mb','2021-04-01 00:00:00','2025-11-12 18:04:39','2025-11-12 18:04:39'),(7,'USE Insider Trading Rules 2008.pdf','https://use.or.ug/uploads/cc14e07f-a7c2-48a9-8706-d3c19d965ca8.pdf','0.09mb','2021-04-01 00:00:00','2025-11-12 18:05:50','2025-11-12 18:05:50'),(8,'USE Listing Rules 2025 as amended.pdf','https://use.or.ug/uploads/72796c34-71d7-40ca-9189-5ed27d82ecc9.pdf','1.12mb','2025-02-26 00:00:00','2025-11-12 18:08:17','2025-11-12 18:08:17'),(9,'USE Rules Amendments -Summary of Amendments.pdf','https://use.or.ug/uploads/e9633a32-4c8c-4cca-8527-5916edb40224.pdf','4.30mb','2021-04-14 00:00:00','2025-11-12 18:09:36','2025-11-12 18:09:36'),(10,'USE Trading Participant Rules 2021 (amended) .pdf','https://use.or.ug/uploads/76a4762e-6d9a-448f-b191-cb65d9bdbe62.pdf','0.43mb','2025-02-26 00:00:00','2025-11-12 18:11:25','2025-11-12 18:11:25');
/*!40000 ALTER TABLE `market_regulations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `opens_new_tab` tinyint(1) NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_items_parent_id_sort_order_index` (`parent_id`,`sort_order`),
  CONSTRAINT `menu_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,'About USE',NULL,NULL,1,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-09-21 07:12:58'),(2,'Listings',NULL,NULL,2,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-09-21 07:12:58'),(3,'Investors',NULL,NULL,3,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-09-21 07:12:58'),(4,'Market Statistics',NULL,NULL,5,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-10-20 19:13:12'),(5,'Rules & Regulations',NULL,NULL,6,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-10-20 19:07:02'),(6,'SCD',NULL,NULL,4,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-10-20 19:13:25'),(7,'About USE','/about',1,1,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-09-21 07:12:58'),(8,'Governance','#governance',1,2,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-09-21 07:12:58'),(9,'Products and Services','#products-services',1,3,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-09-21 07:12:58'),(10,'Trading Participants','#trading-participants',1,4,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-09-21 07:12:58'),(11,'Contact Us','/about/contact-us',1,5,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-10-20 18:50:04'),(12,'How to List','/listings/how-to-list',2,1,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-10-19 17:44:01'),(13,'Listing Rules','/listings/listing-rules',2,2,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-10-19 17:44:17'),(14,'Listed Securities','/securities',2,3,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-09-22 04:11:21'),(15,'FAQs','/listings/listing-faqs',2,4,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-10-19 17:54:56'),(16,'How to Invest','#how-to-invest',3,1,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-09-21 07:12:58'),(17,'Private Transfers','/investors/private-transfers',3,2,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-11-13 08:58:14'),(18,'Investor FAQs','/investors/investor-faqs',3,3,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-10-20 18:59:09'),(19,'Corporate Announcements','/investors/corporate-announcements',3,4,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-11-13 09:22:34'),(20,'Complaints Escalation','/investors/complaints-escalation',3,5,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-11-13 09:07:45'),(21,'Market Snapshot','/market-statistics/market-snapshot',4,1,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-10-26 07:30:37'),(22,'Market Performance','/market-statistics/market-performance',4,2,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-10-26 07:30:53'),(23,'Market Regulations','/rules-and-regulations/market-regulations',5,1,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-11-12 17:05:05'),(24,'SCD','/scd/scd-rules',5,2,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-11-12 17:00:26'),(25,'About the SCD','/scd/about-scd',6,1,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-10-20 19:07:58'),(26,'Legal and Regulatory Framework','/scd/scd-rules',6,2,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-11-12 16:37:44'),(27,'Services','#scd-services',6,3,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-09-21 07:12:58'),(28,'SCD Forms','/scd/scd-forms',6,4,1,0,NULL,NULL,'2025-09-21 07:12:58','2025-11-12 16:02:05'),(29,'Equities','/securities/equities',14,1,1,0,NULL,'Equity securities trading','2025-09-21 07:31:50','2025-11-13 09:25:09'),(30,'Bonds','/securities/bonds',14,2,1,0,NULL,'Bond securities trading','2025-09-21 07:31:50','2025-11-13 09:25:22'),(36,'Reports','/annual-reports',1,6,1,0,NULL,NULL,'2025-09-22 06:15:13','2025-09-22 06:15:13'),(37,'Governance Structure','/about/governance/structure',8,1,1,0,NULL,NULL,'2025-10-19 18:47:08','2025-10-19 19:12:41'),(38,'International Securities Identification Number (ISIN)','/about/products-and-services/international-securities-identification-number-isin',9,1,1,0,NULL,NULL,'2025-10-20 18:26:52','2025-10-20 18:26:52'),(39,'Stock Broker Firms','/about/trading-participants/stock-broker-firms',10,1,1,0,NULL,NULL,'2025-10-20 18:34:14','2025-10-20 18:34:14'),(40,'Custodian Banks','/about/trading-participants/custodian-banks',10,2,1,0,NULL,NULL,'2025-10-20 18:34:52','2025-10-20 18:34:52'),(41,'Types of Investors','/investors/how-to-invest/types-of-investors',16,1,1,0,NULL,NULL,'2025-10-20 18:54:43','2025-10-20 18:54:43'),(42,'KYC Requirements','/investors/how-to-invest/kyc-requirements',16,2,1,0,NULL,NULL,'2025-10-20 18:55:21','2025-10-20 18:55:21'),(43,'Depository','/scd/services/depository',27,1,1,0,NULL,NULL,'2025-10-20 19:09:37','2025-10-20 19:09:37'),(44,'Clearing and Settlement','/scd/services/clearing-and-settlement',27,2,1,0,NULL,NULL,'2025-10-20 19:10:26','2025-10-20 19:10:26'),(45,'Easy Portal','/scd/services/easy-portal',27,3,1,0,NULL,NULL,'2025-10-20 19:11:07','2025-10-20 19:11:07'),(46,'Registry','/scd/services/registry',27,4,1,0,NULL,NULL,'2025-10-20 19:12:00','2025-10-20 19:12:00'),(47,'USE EDAALA','/use-specialist-market',NULL,7,1,0,NULL,NULL,'2025-11-12 18:28:11','2025-11-12 19:49:32');
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2025_08_27_120430_create_news_table',1),(6,'2025_08_27_120641_create_events_table',1),(7,'2025_08_27_122356_create_site_contents_table',2),(8,'2025_09_20_195828_create_carousel_images_table',3),(9,'2025_09_20_201354_add_second_button_to_carousel_images_table',4),(10,'2025_09_20_203232_create_files_table',5),(11,'2025_09_20_205150_add_summary_and_author_to_news_table',6),(12,'2025_09_20_210644_create_menu_items_table',7),(15,'2025_09_21_142144_create_securities_table',8),(16,'2025_09_22_075435_create_news_security_table',9),(17,'2025_09_30_121950_add_role_to_users_table',10),(18,'2025_10_25_000000_add_article_type_and_file_to_news_table',10),(19,'2025_10_25_000001_change_file_id_to_file_url_in_news_table',11),(20,'2025_10_28_113312_add_image_url_to_events_table',12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `published_at` datetime DEFAULT NULL,
  `article_type` enum('article','report') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'article',
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (5,'BOBU - Annual Report & Financial Statements for the Year Ended 31st December 2024','bobu-annual-report-financial-statements-for-the-year-ended-31st-december-2024-1',NULL,NULL,NULL,'https://use.or.ug/images/b0aae9ac-35e1-4d68-b48c-8e69a2acc9b5.jpg',1,'2025-09-26 09:54:00','report','https://use.or.ug/uploads/a7138055-f5f9-4394-b729-4a64e639e42e.pdf','2025-10-25 18:54:48','2025-11-12 18:56:40'),(6,'SUHL - Book Closure & Interim Dividend Payment','suhl-book-closure-interim-dividend-payment',NULL,NULL,NULL,'https://use.or.ug/images/764912d2-43bc-4a88-94d2-db7de3b76dbe.jpg',1,'2025-09-24 21:48:00','report','https://use.or.ug/uploads/e918014b-a04c-497e-96c0-02b7619311ca.pdf','2025-10-28 13:11:26','2025-10-28 15:48:55'),(7,'UMEME - Interim Condensed Financial Statements for the Six Months Ended 30th June 2025','umeme-interim-condensed-financial-statements-for-the-six-months-ended-30th-june-2025',NULL,NULL,NULL,'https://use.or.ug/images/bc1185f0-cb01-491b-b15f-a403a57758bd.png',1,NULL,'report','https://use.or.ug/uploads/882d3a77-533b-4b51-89f9-91a44e9374eb.pdf','2025-10-28 15:53:38','2025-10-28 15:53:38');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_security`
--

DROP TABLE IF EXISTS `news_security`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news_security` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `news_id` bigint unsigned NOT NULL,
  `security_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_security_news_id_security_id_unique` (`news_id`,`security_id`),
  KEY `news_security_security_id_foreign` (`security_id`),
  CONSTRAINT `news_security_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
  CONSTRAINT `news_security_security_id_foreign` FOREIGN KEY (`security_id`) REFERENCES `securities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_security`
--

LOCK TABLES `news_security` WRITE;
/*!40000 ALTER TABLE `news_security` DISABLE KEYS */;
INSERT INTO `news_security` VALUES (3,5,2,NULL,NULL);
/*!40000 ALTER TABLE `news_security` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `private_transfers`
--

DROP TABLE IF EXISTS `private_transfers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `private_transfers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `private_transfers`
--

LOCK TABLES `private_transfers` WRITE;
/*!40000 ALTER TABLE `private_transfers` DISABLE KEYS */;
INSERT INTO `private_transfers` VALUES (1,'USE PRIVATE TRANSFER TRANSACTION PRESENTATION website (1).pdf','https://use.or.ug/uploads/a6ef7ee5-185f-483c-becc-bcb627d1722d.pdf','1.35mb','2023-01-01 00:00:00','2025-11-13 05:57:23','2025-11-13 05:57:23');
/*!40000 ALTER TABLE `private_transfers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scd_forms`
--

DROP TABLE IF EXISTS `scd_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scd_forms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scd_forms`
--

LOCK TABLES `scd_forms` WRITE;
/*!40000 ALTER TABLE `scd_forms` DISABLE KEYS */;
INSERT INTO `scd_forms` VALUES (1,'OPT IN FOR MM DIVIDENDS KENYANS.doc','https://use.or.ug/uploads/ab18f797-9e4d-4b13-99f5-710bb18277aa.doc','0.05mb','2022-07-27 00:00:00','2025-11-12 16:14:56','2025-11-12 16:14:56'),(2,'OPT IN FOR MM DIVIDENDS UGANDANS.doc','https://use.or.ug/uploads/3cbf84c5-e78d-4def-a7d6-243189fae69c.doc','0.05mb','2022-07-27 00:00:00','2025-11-12 16:17:44','2025-11-12 16:17:44'),(3,'SCD Form 1A word.pdf','https://use.or.ug/uploads/ea4ff79f-88b2-4bf7-a1f1-0be6c18f194a.pdf','0.27mb','2021-11-11 00:00:00','2025-11-12 16:21:57','2025-11-12 16:21:57');
/*!40000 ALTER TABLE `scd_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scd_rules`
--

DROP TABLE IF EXISTS `scd_rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scd_rules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scd_rules`
--

LOCK TABLES `scd_rules` WRITE;
/*!40000 ALTER TABLE `scd_rules` DISABLE KEYS */;
INSERT INTO `scd_rules` VALUES (1,'Guarantee Fund Procedures.pdf','https://use.or.ug/uploads/f6b46e37-6995-42de-b489-f34cc2f3618f.pdf','0.28mb','2023-07-14 00:00:00','2025-11-12 16:35:55','2025-11-12 16:35:55'),(2,'SCD Act No. 1 of 2009.pdf','https://use.or.ug/uploads/f032995d-774a-49e7-a32c-728ec47afb40.pdf','0.45mb','2015-11-19 00:00:00','2025-11-12 16:39:17','2025-11-12 16:39:17'),(3,'SCD OPERATIONAL PROCEDURES MARCH 2023.pdf','https://use.or.ug/uploads/06604b3c-e64a-4367-b53d-cc88be72a3c0.pdf','0.36mb','2023-07-14 00:00:00','2025-11-12 16:43:47','2025-11-12 16:43:47'),(4,'SCD Regulations S.I. No. 38 of 2009.pdf','https://use.or.ug/uploads/ac5afd77-4e7d-4b43-862c-a28181596b5e.pdf','0.41mb','2015-11-19 00:00:00','2025-11-12 16:46:58','2025-11-12 16:46:58'),(5,'USE SCD Rules March 2023.pdf','https://use.or.ug/uploads/06604b3c-e64a-4367-b53d-cc88be72a3c0.pdf','0.28mb','2023-07-14 00:00:00','2025-11-12 16:55:48','2025-11-12 16:55:48');
/*!40000 ALTER TABLE `scd_rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `securities`
--

DROP TABLE IF EXISTS `securities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `securities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ticker` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isin` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issuer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_type` enum('equity','treasury_bill','treasury_bond') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'equity',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issued_shares` bigint DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `rate` decimal(8,4) DEFAULT NULL,
  `maturity_date` date DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UGX',
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `securities`
--

LOCK TABLES `securities` WRITE;
/*!40000 ALTER TABLE `securities` DISABLE KEYS */;
INSERT INTO `securities` VALUES (1,'BATU','UG0000000010','British American Tobacco Uganda Limited',NULL,'equity',NULL,NULL,NULL,NULL,NULL,'UGX',NULL,1,'2025-09-21 12:13:48','2025-09-21 12:13:48'),(2,'BOBU','UG0000000020','Bank of Baroda (Uganda) Limited',NULL,'equity',NULL,NULL,NULL,NULL,NULL,'UGX',NULL,1,'2025-09-21 12:13:48','2025-09-21 12:13:48'),(3,'DFCU','UG0000000030','DFCU Bank Limited',NULL,'equity',NULL,NULL,NULL,NULL,NULL,'UGX',NULL,1,'2025-09-21 12:13:48','2025-09-21 12:13:48'),(4,'EABL','UG0000000040','East African Breweries Limited',NULL,'equity',NULL,NULL,NULL,NULL,NULL,'UGX',NULL,1,'2025-09-21 12:13:48','2025-09-21 12:13:48'),(5,'JHL','UG0000000050','Jubilee Holdings Limited',NULL,'equity',NULL,NULL,NULL,NULL,NULL,'UGX',NULL,1,'2025-09-21 12:13:48','2025-09-21 12:13:48'),(6,'SBU','UG0000000060','Stanbic Bank Uganda Limited',NULL,'equity',NULL,NULL,NULL,NULL,NULL,'UGX',NULL,1,'2025-09-21 12:13:48','2025-09-21 12:13:48'),(9,NULL,'UG0001000101',NULL,'Republic of Uganda','treasury_bond','Fixed Rate Bond',50000000000,'2020-01-15',13.5000,'2030-01-15','UGX','Government',1,'2025-09-21 12:13:48','2025-09-21 12:13:48'),(10,NULL,'UG0001000102',NULL,'Republic of Uganda','treasury_bond','Fixed Rate Bond',75000000000,'2021-06-10',14.2500,'2031-06-10','UGX','Government',1,'2025-09-21 12:13:48','2025-09-21 12:13:48'),(11,NULL,'UG0001000103',NULL,'Republic of Uganda','treasury_bond','Fixed Rate Bond',100000000000,'2022-03-20',15.0000,'2032-03-20','UGX','Government',1,'2025-09-21 12:13:48','2025-09-21 12:13:48'),(12,NULL,'UG0002000201',NULL,'Republic of Uganda','treasury_bill','91-Day Bill',25000000000,'2024-01-15',10.5000,'2024-04-15','UGX','Government',1,'2025-09-21 12:13:48','2025-09-21 12:13:48'),(13,NULL,'UG0002000202',NULL,'Republic of Uganda','treasury_bill','182-Day Bill',30000000000,'2024-02-01',11.2500,'2024-08-01','UGX','Government',1,'2025-09-21 12:13:48','2025-09-21 12:13:48'),(14,NULL,'UG0002000203',NULL,'Republic of Uganda','treasury_bill','364-Day Bill',40000000000,'2024-03-01',12.0000,'2025-03-01','UGX','Government',1,'2025-09-21 12:13:48','2025-09-21 12:13:48'),(15,'BATU',NULL,'British American Tobacco Uganda',NULL,'equity',NULL,NULL,NULL,NULL,NULL,'UGX',NULL,1,'2025-09-21 16:59:19','2025-09-21 17:08:28'),(16,'UCL',NULL,'Uganda Clays Limited',NULL,'equity',NULL,NULL,NULL,NULL,NULL,'UGX',NULL,1,'2025-09-21 16:59:19','2025-09-21 17:08:28'),(17,'NIC',NULL,'NIC Holdings Limited',NULL,'equity',NULL,NULL,NULL,NULL,NULL,'UGX',NULL,1,'2025-09-21 16:59:19','2025-09-21 17:08:28'),(19,'UA',NULL,'Uganda Airlines','Republic of Uganda','equity',NULL,NULL,NULL,NULL,NULL,'UGX','Government',1,'2025-09-22 06:20:02','2025-09-22 06:20:02');
/*!40000 ALTER TABLE `securities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_contents`
--

DROP TABLE IF EXISTS `site_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `site_contents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_contents_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_contents`
--

LOCK TABLES `site_contents` WRITE;
/*!40000 ALTER TABLE `site_contents` DISABLE KEYS */;
INSERT INTO `site_contents` VALUES (1,'market_status','open','text',NULL,NULL,'2025-08-27 09:28:38','2025-09-30 09:11:08'),(2,'gateway_title','Your Gateway to Uganda\'s Financial Market','text',NULL,NULL,'2025-08-27 09:31:24','2025-08-27 09:41:18'),(3,'contact_email','info@use.or.ug','text',NULL,NULL,'2025-08-27 09:45:41','2025-08-27 09:45:41'),(4,'hero_headline','Building Uganda Together','text',NULL,NULL,'2025-09-05 09:38:17','2025-09-05 09:38:17'),(5,'contact_phone','+256-312-370815/7/8','text',NULL,NULL,'2025-09-22 04:15:01','2025-09-22 04:15:01'),(6,'contact_address','Plot 3-5 New Port-Bell Road, UAP Nakawa Business Park, Block A, 4th Floor\nP.O.Box 23552, Kampala, Uganda','text',NULL,NULL,'2025-09-22 04:15:01','2025-09-22 04:15:01');
/*!40000 ALTER TABLE `site_contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `role` enum('Admin','Accounts','User') NOT NULL DEFAULT 'User',
  `password` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('Active','Pending','Disabled') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (35,'Webmaster','Admin','$2a$12$PbrJhtKXjlvdxJd7wQDuQeWK6ZLK6NoyCnHZb5fv9kU7Gwyb/0S.u','webmaster@use.or.ug','Active','2021-11-19 17:24:03','2025-10-28 19:55:15'),(82,'Katusabe','Admin','$2y$10$a12GfFGcsKDANTOsYtQGJOCZgWzISXsM8Jt2tvMX69W1kRNDNC7me','kkatusabe@use.or.ug','Pending','2025-10-28 19:54:16','2025-10-28 19:54:16'),(83,'Senteza','Admin','$2y$10$2ATd9nmNiDEXX5mwzmSIAeIsJ8Qp3jnrylLSfb5NXp9/xfnAGoFOm','ksenteza@use.or.ug','Pending','2025-10-28 19:54:58','2025-10-28 19:54:58'),(84,'Ongom','Admin','$2y$10$0i1ocoo4GwfUnEHThGuVA..dx5YQrfN3WsVGYNh/LrkYBls9CeNpu','dongom@use.or.ug','Pending','2025-10-28 19:57:33','2025-10-28 19:57:33'),(85,'Were','Admin','$2y$10$9Rj0hDHn8XCUjGK2grwE0.52RdpzLhlP33omRlQcEPCt1jt/W2pHW','jwere@use.or.ug','Pending','2025-10-28 19:57:53','2025-10-28 19:57:53');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2025-11-13 15:59:39
