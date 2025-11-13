-- Migration: Create private_transfers table
-- Date: 2025-11-13

DROP TABLE IF EXISTS `private_transfers`;

CREATE TABLE `private_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seeder data for private_transfers
INSERT INTO `private_transfers` (`id`, `title`, `file_url`, `file_size`, `published_date`, `created_at`, `updated_at`) VALUES
(1, 'USE PRIVATE TRANSFER TRANSACTION PRESENTATION website (1).pdf', 'https://use.or.ug/uploads/a6ef7ee5-185f-483c-becc-bcb627d1722d.pdf', '1.35mb', '2023-01-01 00:00:00', '2025-11-13 08:57:23', '2025-11-13 08:57:23');

-- Migration: Create corporate_announcements table
-- Date: 2025-11-13

DROP TABLE IF EXISTS `corporate_announcements`;

CREATE TABLE `corporate_announcements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seeder data for corporate_announcements
INSERT INTO `corporate_announcements` (`id`, `title`, `file_url`, `file_size`, `published_date`, `created_at`, `updated_at`) VALUES
(1, 'NVL- PROFIT WARNING.pdf', 'https://use.or.ug/uploads/8c8b6bc5-de70-4edc-af03-9931a357febc.pdf', '1.07mb', '2023-09-15 00:00:00', '2025-11-13 09:18:53', '2025-11-13 09:18:53'),
(2, 'EABL - 2023 AGM Voting Results - 14 September 2023.pdf', 'https://use.or.ug/uploads/796f4cfa-74a9-4df7-b34d-fa5b2f94faf0.pdf', '0.45mb', '2023-09-15 00:00:00', '2025-11-13 09:21:35', '2025-11-13 09:21:35');
