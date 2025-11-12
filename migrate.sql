-- Migration: Create scd_forms table

CREATE TABLE IF NOT EXISTS `scd_forms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert data for scd_forms table
INSERT INTO `scd_forms` (`id`, `title`, `file_url`, `file_size`, `published_date`, `created_at`, `updated_at`) VALUES
(1, 'OPT IN FOR MM DIVIDENDS KENYANS.doc', 'https://use.or.ug/uploads/ab18f797-9e4d-4b13-99f5-710bb18277aa.doc', '0.05mb', '2022-07-27 00:00:00', '2025-11-12 16:14:56', '2025-11-12 16:14:56'),
(2, 'OPT IN FOR MM DIVIDENDS UGANDANS.doc', 'https://use.or.ug/uploads/3cbf84c5-e78d-4def-a7d6-243189fae69c.doc', '0.05mb', '2022-07-27 00:00:00', '2025-11-12 16:17:44', '2025-11-12 16:17:44'),
(3, 'SCD Form 1A word.pdf', 'https://use.or.ug/uploads/ea4ff79f-88b2-4bf7-a1f1-0be6c18f194a.pdf', '0.27mb', '2021-11-11 00:00:00', '2025-11-12 16:21:57', '2025-11-12 16:21:57');

-- Migration: Create scd_rules table
CREATE TABLE IF NOT EXISTS `scd_rules` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert data for scd_rules table
INSERT INTO `scd_rules` (`id`, `title`, `file_url`, `file_size`, `published_date`, `created_at`, `updated_at`) VALUES
(1, 'Guarantee Fund Procedures.pdf', 'https://use.or.ug/uploads/f6b46e37-6995-42de-b489-f34cc2f3618f.pdf', '0.28mb', '2023-07-14 00:00:00', '2025-11-12 16:35:55', '2025-11-12 16:35:55'),
(2, 'SCD Act No. 1 of 2009.pdf', 'https://use.or.ug/uploads/f032995d-774a-49e7-a32c-728ec47afb40.pdf', '0.45mb', '2015-11-19 00:00:00', '2025-11-12 16:39:17', '2025-11-12 16:39:17'),
(3, 'SCD OPERATIONAL PROCEDURES MARCH 2023.pdf', 'https://use.or.ug/uploads/06604b3c-e64a-4367-b53d-cc88be72a3c0.pdf', '0.36mb', '2023-07-14 00:00:00', '2025-11-12 16:43:47', '2025-11-12 16:43:47'),
(4, 'SCD Regulations S.I. No. 38 of 2009.pdf', 'https://use.or.ug/uploads/ac5afd77-4e7d-4b43-862c-a28181596b5e.pdf', '0.41mb', '2015-11-19 00:00:00', '2025-11-12 16:46:58', '2025-11-12 16:46:58'),
(5, 'USE SCD Rules March 2023.pdf', 'https://use.or.ug/uploads/06604b3c-e64a-4367-b53d-cc88be72a3c0.pdf', '0.28mb', '2023-07-14 00:00:00', '2025-11-12 16:55:48', '2025-11-12 16:55:48');

-- Migration: Create market_regulations table
CREATE TABLE IF NOT EXISTS `market_regulations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert data for market_regulations table
INSERT INTO `market_regulations` (`id`, `title`, `file_url`, `file_size`, `published_date`, `created_at`, `updated_at`) VALUES
(1, 'Proposed Amendments to SCDS Rules and Operating Procedures.pdf', 'https://use.or.ug/uploads/b536d26e-4ab7-409d-8cb8-973384d05cca.pdf', '0.18mb', '2023-07-29 00:00:00', '2025-11-12 17:42:19', '2025-11-12 17:42:19'),
(2, 'SUMMARY OF THE 2025 AMENDMENTS.pdf', 'https://use.or.ug/uploads/877c46d4-d560-4244-9ba7-e266659d773f.pdf', '2.72mb', '2025-05-29 00:00:00', '2025-11-12 17:54:46', '2025-11-12 17:54:46'),
(3, 'TRADE NOTIFICATION FORM.pdf', 'https://use.or.ug/uploads/e118622d-10ee-4f95-958a-f61e9aeb173d.pdf', '0.03mb', '2021-05-21 00:00:00', '2025-11-12 17:55:42', '2025-11-12 17:55:42'),
(4, 'USE Fees, Charges and Penalties Rules 2025 as amended.pdf', 'https://use.or.ug/uploads/5edc4767-2638-430f-b410-8b353cdb3c0d.pdf', '0.25mb', '2025-02-26 00:00:00', '2025-11-12 17:59:33', '2025-11-12 17:59:33'),
(5, 'USE Growth Enterprise Markets Segment (GEMS) Rules 2012.pdf', 'https://use.or.ug/uploads/a676a378-ae78-42be-a663-1a1bea6f8673.pdf', '0.25mb', '2021-04-01 00:00:00', '2025-11-12 18:00:56', '2025-11-12 18:00:56'),
(6, 'USE Guidelines for Online Shareholder Meetings.pdf', 'https://use.or.ug/uploads/82dde113-0abe-4298-86ae-4709a0448bde.pdf', '0.21mb', '2021-04-01 00:00:00', '2025-11-12 18:04:39', '2025-11-12 18:04:39'),
(7, 'USE Insider Trading Rules 2008.pdf', 'https://use.or.ug/uploads/cc14e07f-a7c2-48a9-8706-d3c19d965ca8.pdf', '0.09mb', '2021-04-01 00:00:00', '2025-11-12 18:05:50', '2025-11-12 18:05:50'),
(8, 'USE Listing Rules 2025 as amended.pdf', 'https://use.or.ug/uploads/72796c34-71d7-40ca-9189-5ed27d82ecc9.pdf', '1.12mb', '2025-02-26 00:00:00', '2025-11-12 18:08:17', '2025-11-12 18:08:17'),
(9, 'USE Rules Amendments -Summary of Amendments.pdf', 'https://use.or.ug/uploads/e9633a32-4c8c-4cca-8527-5916edb40224.pdf', '4.30mb', '2021-04-14 00:00:00', '2025-11-12 18:09:36', '2025-11-12 18:09:36'),
(10, 'USE Trading Participant Rules 2021 (amended) .pdf', 'https://use.or.ug/uploads/76a4762e-6d9a-448f-b191-cb65d9bdbe62.pdf', '0.43mb', '2025-02-26 00:00:00', '2025-11-12 18:11:25', '2025-11-12 18:11:25');

-- Migration: Create annual_reports table
CREATE TABLE IF NOT EXISTS `annual_reports` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert data for annual_reports table
INSERT INTO `annual_reports` (`id`, `title`, `file_url`, `file_size`, `published_date`, `created_at`, `updated_at`) VALUES
(1, 'USE Annual Report 2023.pdf', 'https://use.or.ug/uploads/e6d87d55-6b7a-48dd-87a9-2577294ebb38.pdf', '65.7mb', '2025-02-26 00:00:00', '2025-11-12 19:27:10', '2025-11-12 19:27:10'),
(2, 'USE Annual Report 2021.pdf', 'https://use.or.ug/uploads/927579c3-daa8-4cea-adf9-d0ddda592ea0.pdf', '6.8mb', '2022-11-15 00:00:00', '2025-11-12 19:28:22', '2025-11-12 19:28:22'),
(3, 'USE Annual Report 2020.pdf', 'https://use.or.ug/uploads/d0bc63a8-cf62-4784-ae81-85479abbaa04.pdf', '4.27mb', '2022-01-28 00:00:00', '2025-11-12 19:29:41', '2025-11-12 19:29:41'),
(4, 'USE Annual Report 2019.pdf', 'https://use.or.ug/uploads/f838414f-c2c8-48eb-8837-947addebdfb8.pdf', '5.03mb', '2020-10-05 00:00:00', '2025-11-12 19:30:25', '2025-11-12 19:30:25'),
(5, 'USE Annual Report 2015.pdf', 'https://use.or.ug/uploads/2f2f5f4d-d260-4ca7-b02b-4b3a4e5ac6f6.pdf', '2.73mb', '2016-12-14 00:00:00', '2025-11-12 19:31:58', '2025-11-12 19:31:58'),
(6, 'USE Annual Report 2014.pdf', 'https://use.or.ug/uploads/162d352f-8d3a-4f6d-bd53-4847eb8551be.pdf', '2.81mb', '2015-07-21 00:00:00', '2025-11-12 19:35:20', '2025-11-12 19:35:20'),
(7, 'USE Annual Report 2013.pdf', 'https://use.or.ug/uploads/eb4bd149-dc71-4b57-9aa7-223b06d2997c.pdf', '4.18mb', '2014-11-16 00:00:00', '2025-11-12 19:39:25', '2025-11-12 19:39:25'),
(8, 'USE Annual Report 2012.pdf', 'https://use.or.ug/uploads/b37a35c9-cb57-4b51-afcc-5e89b6a98019.pdf', '5.62mb', '2014-11-16 00:00:00', '2025-11-12 19:41:25', '2025-11-12 19:41:25'),
(9, 'USE Annual Report 2010.pdf', 'https://use.or.ug/uploads/2d4b4063-13b0-4a92-b918-58e1fe0cb7e7.pdf', '1.37mb', '2011-09-01 00:00:00', '2025-11-12 19:42:59', '2025-11-12 19:42:59');

-- Migration: Add category column to files table
ALTER TABLE `files` ADD COLUMN `category` VARCHAR(50) NULL DEFAULT NULL AFTER `file_type`;

-- Index for better query performance
CREATE INDEX `idx_files_category` ON `files` (`category`);
