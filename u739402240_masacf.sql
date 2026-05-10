-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2024 at 01:54 PM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u739402240_masacf`
--

-- --------------------------------------------------------

--
-- Table structure for table `abuse_report`
--

CREATE TABLE `abuse_report` (
  `id` int(11) NOT NULL,
  `report_id` varchar(255) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type_of_report` varchar(255) NOT NULL,
  `description` varchar(555) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `report_image` varchar(55) NOT NULL,
  `action_taken` varchar(255) NOT NULL,
  `processed_by` varchar(255) NOT NULL,
  `path` varchar(555) NOT NULL,
  `notification_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abuse_report`
--

INSERT INTO `abuse_report` (`id`, `report_id`, `user_id`, `email`, `type_of_report`, `description`, `address`, `latitude`, `longitude`, `datetime`, `report_image`, `action_taken`, `processed_by`, `path`, `notification_status`) VALUES
(118, 'REPORT_663692bbc82da', '0', 'YOUR_EMAIL@gmail.com', 'Wild Animal', 'Payat at gutom na aso pagala gala sa marilao', 'Prenza I, , Bulacan, Central Luzon, 3019, Philippines', '14.7837418', '120.9859098', '2024-05-04 19:55:39', 'payat.jfif', '', '', '', 0),
(119, 'REPORT_6636d9cecbed0', '0', 'YOUR_EMAIL@gmail.com', 'Wild Animal', 'D', ', Bulacan, Central Luzon, 3019, Philippines', '14.7575517', '120.9482162', '2024-05-05 00:58:54', '429913418_3502222533422750_8452248165133927360_n.jpg', 'Visited', 'admin_6635ec9cd4fcb', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `users_id` varchar(20) NOT NULL,
  `user_type` varchar(55) NOT NULL,
  `activity` varchar(55) NOT NULL,
  `date` datetime NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `users_id`, `user_type`, `activity`, `date`, `time`) VALUES
(373, 'superadmin001', 'super admin', 'Login', '2024-05-03 13:50:49', '00:00:00'),
(374, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-03 13:52:40', '00:00:00'),
(375, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-03 13:52:40', '00:00:00'),
(376, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-03 13:52:45', '00:00:00'),
(377, 'superadmin001', 'super admin', 'Update avatar', '2024-05-03 14:22:27', '00:00:00'),
(378, 'superadmin001', 'super admin', 'Update personal information', '2024-05-03 14:23:01', '00:00:00'),
(379, 'superadmin001', 'super admin', 'Update avatar', '2024-05-03 14:33:27', '00:00:00'),
(380, 'superadmin001', 'super admin', 'Update personal information', '2024-05-03 14:33:28', '00:00:00'),
(381, 'superadmin001', 'super admin', 'Update avatar', '2024-05-03 14:34:16', '00:00:00'),
(382, 'superadmin001', 'super admin', 'Update personal information', '2024-05-03 14:34:17', '00:00:00'),
(383, 'superadmin001', 'super admin', 'Logout', '2024-05-03 14:45:37', '00:00:00'),
(384, 'superadmin001', 'super admin', 'Login', '2024-05-03 14:45:41', '00:00:00'),
(385, 'superadmin001', 'super admin', 'Login', '2024-05-03 14:46:33', '00:00:00'),
(386, 'superadmin001', 'super admin', 'Update personal information', '2024-05-03 14:50:05', '00:00:00'),
(387, 'superadmin001', 'super admin', 'Update avatar', '2024-05-03 14:50:05', '00:00:00'),
(388, 'superadmin001', 'super admin', 'Logout', '2024-05-03 14:54:45', '00:00:00'),
(389, 'superadmin001', 'super admin', 'Login', '2024-05-03 14:55:06', '00:00:00'),
(390, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-03 14:57:57', '00:00:00'),
(391, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-03 14:59:47', '00:00:00'),
(392, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-03 14:59:47', '00:00:00'),
(393, 'superadmin001', 'super admin', 'Login', '2024-05-03 18:50:15', '00:00:00'),
(394, 'superadmin001', 'super admin', 'Re-activate Admin', '2024-05-03 18:51:16', '00:00:00'),
(395, 'superadmin001', 'super admin', 'Login', '2024-05-03 21:22:38', '00:00:00'),
(396, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-03 21:56:14', '00:00:00'),
(397, 'superadmin001', 'super admin', 'Re-activate Admin', '2024-05-03 22:02:03', '00:00:00'),
(398, 'superadmin001', 'super admin', 'Added new pet', '2024-05-03 22:33:38', '00:00:00'),
(399, '', '', 'Update avatar', '2024-05-03 23:31:14', '00:00:00'),
(400, '', '', 'Update personal information', '2024-05-03 23:31:16', '00:00:00'),
(401, 'superadmin001', 'super admin', 'Login', '2024-05-03 23:31:20', '00:00:00'),
(402, 'superadmin001', 'super admin', 'Update avatar', '2024-05-03 23:31:31', '00:00:00'),
(403, 'superadmin001', 'super admin', 'Update personal information', '2024-05-03 23:31:32', '00:00:00'),
(404, 'superadmin001', 'super admin', 'Login', '2024-05-04 03:05:25', '00:00:00'),
(405, '', '', 'Add admin', '2024-05-04 03:16:58', '00:00:00'),
(406, 'superadmin001', 'super admin', 'Re-activate Admin', '2024-05-04 03:18:01', '00:00:00'),
(407, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:27', '00:00:00'),
(408, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:29', '00:00:00'),
(409, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:32', '00:00:00'),
(410, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:36', '00:00:00'),
(411, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:36', '00:00:00'),
(412, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:36', '00:00:00'),
(413, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:38', '00:00:00'),
(414, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:38', '00:00:00'),
(415, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:40', '00:00:00'),
(416, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:42', '00:00:00'),
(417, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:44', '00:00:00'),
(418, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:46', '00:00:00'),
(419, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:48', '00:00:00'),
(420, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:49', '00:00:00'),
(421, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:51', '00:00:00'),
(422, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:53', '00:00:00'),
(423, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 03:18:56', '00:00:00'),
(424, '', '', 'Add admin', '2024-05-04 03:25:20', '00:00:00'),
(425, '', '', 'Add admin', '2024-05-04 03:26:33', '00:00:00'),
(426, 'superadmin001', 'super admin', 'Re-activate Admin', '2024-05-04 03:28:44', '00:00:00'),
(427, 'superadmin001', 'super admin', 'Re-activate Admin', '2024-05-04 03:30:51', '00:00:00'),
(428, 'superadmin001', 'super admin', 'Logout', '2024-05-04 03:33:19', '00:00:00'),
(429, 'admin_66348a54e0efa', 'admin', 'Login', '2024-05-04 03:33:37', '00:00:00'),
(430, 'admin_66348a54e0efa', 'admin', 'Logout', '2024-05-04 03:49:49', '00:00:00'),
(431, 'admin_66348a54e0efa', 'admin', 'Login', '2024-05-04 03:49:55', '00:00:00'),
(432, 'admin_66348a54e0efa', 'admin', 'Change password', '2024-05-04 03:59:13', '00:00:00'),
(433, 'admin_66348a54e0efa', 'admin', 'Logout', '2024-05-04 03:59:25', '00:00:00'),
(434, 'admin_66348a54e0efa', 'admin', 'Login', '2024-05-04 04:00:37', '00:00:00'),
(435, 'admin_66348a54e0efa', 'admin', 'Re-activate Admin', '2024-05-04 04:09:32', '00:00:00'),
(436, 'superadmin001', 'super admin', 'Login', '2024-05-04 05:24:54', '00:00:00'),
(437, '', '', 'Add admin', '2024-05-04 07:19:07', '00:00:00'),
(438, 'superadmin001', 'super admin', 'Added new pet', '2024-05-04 07:43:57', '00:00:00'),
(439, 'superadmin001', 'super admin', 'Added new pet', '2024-05-04 07:49:35', '00:00:00'),
(440, 'superadmin001', 'super admin', 'Added new pet', '2024-05-04 07:51:22', '00:00:00'),
(441, 'superadmin001', 'super admin', 'Added new pet', '2024-05-04 08:01:17', '00:00:00'),
(442, 'superadmin001', 'super admin', 'Added new pet', '2024-05-04 08:04:43', '00:00:00'),
(443, 'superadmin001', 'super admin', 'Added new pet', '2024-05-04 08:08:39', '00:00:00'),
(444, 'superadmin001', 'super admin', 'Added new pet', '2024-05-04 08:15:42', '00:00:00'),
(445, 'superadmin001', 'super admin', 'Logout', '2024-05-04 08:30:14', '00:00:00'),
(446, 'superadmin001', 'super admin', 'Login', '2024-05-04 08:54:07', '00:00:00'),
(447, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 09:59:34', '00:00:00'),
(448, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 09:59:34', '00:00:00'),
(449, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 10:01:45', '00:00:00'),
(450, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 10:01:45', '00:00:00'),
(451, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 10:05:26', '00:00:00'),
(452, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 10:07:13', '00:00:00'),
(453, 'superadmin001', 'super admin', 'Deactivate admin', '2024-05-04 10:07:13', '00:00:00'),
(454, '', '', 'Add admin', '2024-05-04 10:27:55', '00:00:00'),
(455, '', '', 'Add admin', '2024-05-04 10:28:22', '00:00:00'),
(456, '', '', 'Add admin', '2024-05-04 10:28:22', '00:00:00'),
(457, '', '', 'Add admin', '2024-05-04 10:29:14', '00:00:00'),
(458, '', '', 'Add admin', '2024-05-04 10:30:25', '00:00:00'),
(459, 'superadmin001', 'super admin', 'Logout', '2024-05-04 10:30:57', '00:00:00'),
(460, 'admin_66359dc19a3dc', 'visitor', 'Login', '2024-05-04 10:31:03', '00:00:00'),
(461, 'admin_66359dc19a3dc', 'visitor', 'Logout', '2024-05-04 10:31:39', '00:00:00'),
(462, 'admin_66359dc19a3dc', 'visitor', 'Login', '2024-05-04 10:38:18', '00:00:00'),
(463, '', '', 'Add admin', '2024-05-04 10:50:52', '00:00:00'),
(464, 'admin_6635a28c81e8b', 'visitor', 'Login', '2024-05-04 10:54:33', '00:00:00'),
(465, 'admin_6635a28c81e8b', 'visitor', 'Login', '2024-05-04 15:50:11', '00:00:00'),
(466, 'admin_6635a28c81e8b', 'visitor', 'Logout', '2024-05-04 15:56:55', '00:00:00'),
(467, 'admin_6635a28c81e8b', 'visitor', 'Login', '2024-05-04 16:04:27', '00:00:00'),
(468, 'admin_66359dc19a3dc', 'admin admin', 'Login', '2024-05-04 16:05:28', '00:00:00'),
(469, '', '', 'Add admin', '2024-05-04 16:05:46', '00:00:00'),
(470, '', '', 'Add admin', '2024-05-04 16:05:46', '00:00:00'),
(471, '', '', 'Add admin', '2024-05-04 16:05:56', '00:00:00'),
(472, '', '', 'Add admin', '2024-05-04 16:05:56', '00:00:00'),
(473, 'admin_6635ec5ae11cb', 'visitor', 'Login', '2024-05-04 16:06:25', '00:00:00'),
(474, '', '', 'Add admin', '2024-05-04 16:06:52', '00:00:00'),
(475, '', '', 'Add admin', '2024-05-04 16:06:52', '00:00:00'),
(476, 'admin_66359dc19a3dc', 'admin admin', 'Logout', '2024-05-04 16:07:12', '00:00:00'),
(477, 'admin_6635ec9cd4fcb', 'super admin', 'Login', '2024-05-04 16:07:16', '00:00:00'),
(478, 'admin_6635ec5ae11cb', 'visitor', 'Logout', '2024-05-04 16:10:02', '00:00:00'),
(479, 'admin_6635ec5ae11cb', 'visitor', 'Login', '2024-05-04 16:10:06', '00:00:00'),
(480, 'admin_6635ec5ae11cb', 'visitor', 'Logout', '2024-05-04 16:12:00', '00:00:00'),
(481, 'admin_6635ec5ae11cb', 'visitor', 'Login', '2024-05-04 16:12:02', '00:00:00'),
(482, 'admin_6635ec9cd4fcb', 'super admin', 'Login', '2024-05-04 16:15:02', '00:00:00'),
(483, 'admin_6635ec5ae11cb', 'visitor', 'Logout', '2024-05-04 16:15:16', '00:00:00'),
(484, 'admin_6635ec5ae11cb', 'visitor', 'Login', '2024-05-04 16:15:20', '00:00:00'),
(485, 'admin_6635ec5ae11cb', 'visitor', 'Logout', '2024-05-04 16:15:57', '00:00:00'),
(486, 'admin_6635ec5ae11cb', 'visitor', 'Login', '2024-05-04 16:15:59', '00:00:00'),
(487, 'admin_6635ec9cd4fcb', 'super admin', 'Add Service', '2024-05-04 16:16:37', '00:00:00'),
(488, 'admin_6635ec5ae11cb', 'visitor', 'Logout', '2024-05-04 16:16:43', '00:00:00'),
(489, 'admin_6635ec5ae11cb', 'visitor', 'Login', '2024-05-04 16:17:15', '00:00:00'),
(490, 'admin_6635ec5ae10bd', 'visitor', 'Login', '2024-05-04 16:18:40', '00:00:00'),
(491, 'admin_6635ec5ae11cb', 'visitor', 'Login', '2024-05-04 16:20:53', '00:00:00'),
(492, 'admin_6635ec9cd4fcb', 'super admin', 'Logout', '2024-05-04 16:21:12', '00:00:00'),
(493, 'admin_6635ec5ae11cb', 'visitor', 'Logout', '2024-05-04 16:21:23', '00:00:00'),
(494, 'admin_6635ec5ae10bd', 'visitor', 'Login', '2024-05-04 16:21:31', '00:00:00'),
(495, 'admin_6635ec5ae10bd', 'visitor', 'Login', '2024-05-04 16:21:51', '00:00:00'),
(496, 'admin_6635ec5ae10bd', 'visitor', 'Login', '2024-05-04 16:22:30', '00:00:00'),
(497, 'admin_6635a28c81e8b', 'visitor', 'Login', '2024-05-04 16:27:26', '00:00:00'),
(498, 'admin_6635ec5ae10bd', 'visitor', 'Added new pet', '2024-05-04 16:30:07', '00:00:00'),
(499, 'admin_6635ec5ae10bd', 'visitor', 'Added new pet', '2024-05-04 16:35:31', '00:00:00'),
(500, 'admin_6635a28c81e8b', 'visitor', 'Added new pet', '2024-05-04 16:37:11', '00:00:00'),
(501, 'admin_6635ec5ae10bd', 'visitor', 'Added new pet', '2024-05-04 16:38:01', '00:00:00'),
(502, 'admin_6635ec5ae10bd', 'visitor', 'Add Service', '2024-05-04 16:39:49', '00:00:00'),
(503, 'admin_6635a28c81e8b', 'visitor', 'Added new pet', '2024-05-04 16:41:22', '00:00:00'),
(504, 'admin_6635ec5ae10bd', 'visitor', 'Added new pet', '2024-05-04 16:46:42', '00:00:00'),
(505, 'admin_6635a28c81e8b', 'visitor', 'Add Service', '2024-05-04 16:49:30', '00:00:00'),
(506, 'admin_6635a28c81e8b', 'visitor', 'Added new pet', '2024-05-04 16:53:07', '00:00:00'),
(507, 'admin_6635a28c81e8b', 'visitor', 'Added new pet', '2024-05-04 16:57:26', '00:00:00'),
(508, 'admin_6635a28c81e8b', 'visitor', 'Logout', '2024-05-04 17:02:22', '00:00:00'),
(509, 'admin_6635a28c81e8b', 'visitor', 'Login', '2024-05-04 17:04:25', '00:00:00'),
(510, 'admin_6635a28c81e8b', 'visitor', 'Logout', '2024-05-04 17:05:08', '00:00:00'),
(511, 'admin_6635a28c81e8b', 'visitor', 'Login', '2024-05-04 17:05:20', '00:00:00'),
(512, 'admin_6635ec5ae10bd', 'visitor', 'Added new pet', '2024-05-04 17:10:25', '00:00:00'),
(513, 'admin_6635a28c81e8b', 'visitor', 'Login', '2024-05-04 17:13:52', '00:00:00'),
(514, 'admin_6635a28c81e8b', 'visitor', 'Added new pet', '2024-05-04 17:18:08', '00:00:00'),
(515, '', '', 'Logout', '2024-05-04 17:33:40', '00:00:00'),
(516, 'admin_6635ec9cd4fcb', 'super admin', 'Login', '2024-05-04 17:33:43', '00:00:00'),
(517, 'admin_6635ec9cd4fcb', 'super admin', 'Update avatar', '2024-05-04 17:33:57', '00:00:00'),
(518, 'admin_6635ec9cd4fcb', 'super admin', 'Update avatar', '2024-05-04 17:34:02', '00:00:00'),
(519, '', '', 'Update personal information', '2024-05-04 17:34:03', '00:00:00'),
(520, 'admin_6635ec9cd4fcb', 'super admin', 'Change password', '2024-05-04 17:34:17', '00:00:00'),
(521, 'admin_6635ec9cd4fcb', 'super admin', 'Logout', '2024-05-04 17:34:33', '00:00:00'),
(522, 'admin_6635ec9cd4fcb', 'super admin', 'Login', '2024-05-04 17:34:39', '00:00:00'),
(523, 'admin_6635ec9cd4fcb', 'super admin', 'Logout', '2024-05-04 17:34:43', '00:00:00'),
(524, 'admin_6635a28c81e8b', 'visitor', 'Logout', '2024-05-04 17:42:26', '00:00:00'),
(525, 'admin_6635a28c81e8b', 'visitor', 'Login', '2024-05-04 17:43:24', '00:00:00'),
(526, 'admin_6635a28c81e8b', 'visitor', 'Logout', '2024-05-04 17:44:06', '00:00:00'),
(527, 'admin_6635a28c81e8b', 'visitor', 'Login', '2024-05-04 17:44:18', '00:00:00'),
(528, 'admin_6635a28c81e8b', 'visitor', 'Logout', '2024-05-04 17:44:23', '00:00:00'),
(529, 'admin_6635a28c81e8b', 'visitor', 'Login', '2024-05-04 17:44:35', '00:00:00'),
(530, 'admin_6635ec5ae10bd', 'visitor', 'Login', '2024-05-04 17:46:11', '00:00:00'),
(531, 'admin_6635ec5ae10bd', 'visitor', 'Login', '2024-05-04 17:48:01', '00:00:00'),
(532, 'admin_6635ec9cd4fcb', 'super admin', 'Login', '2024-05-04 17:49:48', '00:00:00'),
(533, 'admin_6635ec9cd4fcb', 'super admin', 'Add Service', '2024-05-04 17:51:22', '00:00:00'),
(534, 'admin_6635a28c81e8b', 'visitor', 'Login', '2024-05-04 17:52:15', '00:00:00'),
(535, 'admin_6635ec5ae10bd', 'visitor', 'Add Service', '2024-05-04 17:52:26', '00:00:00'),
(536, 'admin_6635ec5ae10bd', 'visitor', 'Login', '2024-05-04 17:53:16', '00:00:00'),
(537, 'admin_6635ec5ae10bd', 'visitor', 'Add Service', '2024-05-04 17:53:34', '00:00:00'),
(538, 'admin_6635a28c81e8b', 'visitor', 'Logout', '2024-05-04 17:53:41', '00:00:00'),
(539, 'admin_6635a28c81e8b', 'visitor', 'Login', '2024-05-04 17:53:44', '00:00:00'),
(540, 'admin_6635ec9cd4fcb', 'super admin', 'Add Service', '2024-05-04 17:55:06', '00:00:00'),
(541, 'admin_6635a28c81e8b', 'visitor', 'Login', '2024-05-04 17:55:08', '00:00:00'),
(542, 'admin_6635ec5ae10bd', 'visitor', 'Add Service', '2024-05-04 17:55:43', '00:00:00'),
(543, 'admin_6635ec5ae10bd', 'visitor', 'Login', '2024-05-04 17:57:56', '00:00:00'),
(544, 'admin_6635ec5ae10bd', 'visitor', 'Login', '2024-05-04 17:58:55', '00:00:00'),
(545, 'admin_6635ec5ae10bd', 'visitor', 'Add Service', '2024-05-04 17:59:31', '00:00:00'),
(546, 'admin_6635ec9cd4fcb', 'super admin', 'Add Service', '2024-05-04 18:00:05', '00:00:00'),
(547, 'admin_6635ec5ae10bd', 'visitor', 'Add Service', '2024-05-04 18:01:39', '00:00:00'),
(548, 'admin_6635a28c81e8b', 'visitor', 'Added new pet', '2024-05-04 18:01:54', '00:00:00'),
(549, 'admin_6635a28c81e8b', 'visitor', 'Login', '2024-05-04 18:11:06', '00:00:00'),
(550, 'admin_6635a28c81e8b', 'visitor', 'Added new pet', '2024-05-04 18:13:00', '00:00:00'),
(551, 'admin_6635a28c81e8b', 'visitor', 'Added new pet', '2024-05-04 18:16:48', '00:00:00'),
(552, 'admin_6635a28c81e8b', 'visitor', 'Added new pet', '2024-05-04 18:19:10', '00:00:00'),
(553, 'admin_6635a28c81e8b', 'visitor', 'Added new pet', '2024-05-04 18:22:21', '00:00:00'),
(554, 'admin_6635ec9cd4fcb', 'super admin', 'Added new pet', '2024-05-04 18:23:08', '00:00:00'),
(555, 'admin_6635a28c81e8b', 'visitor', 'Added new pet', '2024-05-04 18:25:33', '00:00:00'),
(556, 'admin_6635ec9cd4fcb', 'super admin', 'Added new pet', '2024-05-04 18:28:38', '00:00:00'),
(557, 'admin_6635a28c81e8b', 'visitor', 'Login', '2024-05-04 18:34:18', '00:00:00'),
(558, 'admin_6635ec9cd4fcb', 'super admin', 'Added new pet', '2024-05-04 18:34:45', '00:00:00'),
(559, 'admin_6635ec9cd4fcb', 'super admin', 'Added new pet', '2024-05-04 18:35:54', '00:00:00'),
(560, 'admin_6635ec9cd4fcb', 'super admin', 'Added new pet', '2024-05-04 18:37:27', '00:00:00'),
(561, 'admin_6635a28c81e8b', 'visitor', 'Login', '2024-05-04 18:37:49', '00:00:00'),
(562, 'admin_6635ec9cd4fcb', 'super admin', 'Added new pet', '2024-05-04 18:39:02', '00:00:00'),
(563, 'admin_6635ec9cd4fcb', 'super admin', 'Added new pet', '2024-05-04 18:40:56', '00:00:00'),
(564, 'admin_6635ec9cd4fcb', 'super admin', 'Added new pet', '2024-05-04 18:42:32', '00:00:00'),
(565, 'admin_6635ec9cd4fcb', 'super admin', 'Added new pet', '2024-05-04 18:43:20', '00:00:00'),
(566, '', '', 'Add admin', '2024-05-04 19:53:35', '00:00:00'),
(567, 'admin_6635ec9cd4fcb', 'super admin', 'Logout', '2024-05-04 19:54:07', '00:00:00'),
(568, 'admin_663621bfca1b9', 'visitor', 'Login', '2024-05-04 19:54:12', '00:00:00'),
(569, 'admin_663621bfca1b9', 'visitor', 'Logout', '2024-05-04 19:54:52', '00:00:00'),
(570, 'admin_663621bfca1b9', 'visitor', 'Login', '2024-05-04 19:55:01', '00:00:00'),
(571, 'admin_663621bfca1b9', 'visitor', 'Logout', '2024-05-04 19:55:07', '00:00:00'),
(572, 'admin_6635ec9cd4fcb', 'super admin', 'Login', '2024-05-04 20:04:53', '00:00:00'),
(573, 'admin_6635ec9cd4fcb', 'super admin', 'Login', '2024-05-04 21:31:07', '00:00:00'),
(574, 'admin_6635ec9cd4fcb', 'super admin', 'Login', '2024-05-05 07:57:03', '00:00:00'),
(575, 'admin_6635ec9cd4fcb', 'super admin', 'Login', '2024-05-05 08:51:14', '00:00:00'),
(576, 'admin_6635ec9cd4fcb', 'super admin', 'Add Service', '2024-05-05 09:04:53', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(20) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `contact` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `admin_id`, `firstname`, `lastname`, `email`, `contact`, `address`, `avatar`, `date_created`) VALUES
(1, 'superadmin001', 'm', 'b', '1@1.com', '9909854', '', 'admin_img-6635035313155.jpg', '2023-03-10'),
(44, 'admin_66348a54e0efa', 'ceejay', 'saplala', 'YOUR_EMAIL@gmail.com', '09123892187', 'caloocan', 'admin_img-66353ed8c0ac5.jpg', '2024-05-03'),
(66, 'admin_66359dc19a3dc', 'ceejay ', 'saplala', 'ceejay.saplala05@gmail.com', '09123812387', 'goods', 'admin_img-66359e0458120.jpg', '2024-05-04'),
(67, 'admin_6635a28c81e8b', 'Marc J', 'Girasol', 'marcgirasol@gmail.com', '09455763999', ', Bulacan', 'admin_img-6635f218e12bd.jpg', '2024-05-04'),
(68, 'admin_6635ec5ae10bd', 'Julius', 'Balagot', 'juliusbalagot3@gmail.com', '09383772717', 'Qc', 'admin_img-6635efa869b90.jpg', '2024-05-04'),
(69, 'admin_6635ec5ae11cb', '', '', 'juliusbalagot3@gmail.com', '', '', '', '2024-05-04'),
(70, 'admin_6635ec64d8261', '', '', 'ceejay.saplala03@gmail.com', '', '', '', '2024-05-04'),
(71, 'admin_6635ec64d83a6', '', '', 'ceejay.saplala03@gmail.com', '', '', '', '2024-05-04'),
(72, 'admin_6635ec9cd4ff3', '', '', 'gnavitas77@gmail.com', '', '', '', '2024-05-04'),
(73, 'admin_6635ec9cd4fcb', 'ceejay', 'saplala', 'gnavitas77@gmail.com', '09213891283', 'asd', 'admin_img-6636010a94411.jpg', '2024-05-04'),
(74, 'admin_663621bfca10c', '', '', 'YOUR_EMAIL@gmail.com', '', '', '', '2024-05-04'),
(75, 'admin_663621bfca1b9', '', 'Shelter', 'YOUR_EMAIL@gmail.com', '09123872138', '213123', 'admin_img-663621fbcaeca.png', '2024-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `admin_status`
--

CREATE TABLE `admin_status` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(20) NOT NULL,
  `status` varchar(55) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_status`
--

INSERT INTO `admin_status` (`id`, `admin_id`, `status`, `datetime`) VALUES
(1, 'superadmin001', 'active', '2023-03-10 13:56:40'),
(37, 'admin_66245ed733d9a', 'active', '2024-04-21 08:33:27'),
(38, 'admin_6633f51deecb6', 'active', '2024-05-03 04:18:37'),
(39, 'admin_6633f9108ea7e', 'inactive', '2024-05-03 04:35:28'),
(40, 'admin_6633f9108ee31', 'inactive', '2024-05-03 04:35:28'),
(43, 'admin_66348890dc0bd', 'active', '2024-05-03 14:47:44'),
(44, 'admin_66348a54e0efa', 'active', '2024-05-03 14:55:16'),
(49, 'admin_6635062fb35ee', 'inactive', '2024-05-03 23:43:43'),
(51, 'admin_6635359b2c94b', 'inactive', '2024-05-04 03:06:03'),
(52, 'admin_6635359b2c949', 'inactive', '2024-05-04 03:06:03'),
(53, 'admin_6635375fe0632', 'inactive', '2024-05-04 03:13:35'),
(54, 'admin_6635375fe06b1', 'inactive', '2024-05-04 03:13:35'),
(57, 'admin_66353a2088dc6', 'active', '2024-05-04 03:25:20'),
(58, 'admin_66353a69a9a69', 'active', '2024-05-04 03:26:33'),
(61, 'admin_663570eb4102b', 'active', '2024-05-04 07:19:07'),
(62, 'admin_66359d2ba1a93', 'active', '2024-05-04 10:27:55'),
(63, 'admin_66359d469d754', 'active', '2024-05-04 10:28:22'),
(64, 'admin_66359d469d7a2', 'active', '2024-05-04 10:28:22'),
(65, 'admin_66359d7ad08ee', 'active', '2024-05-04 10:29:14'),
(66, 'admin_66359dc19a3dc', 'active', '2024-05-04 10:30:25'),
(67, 'admin_6635a28c81e8b', 'active', '2024-05-04 10:50:52'),
(68, 'admin_6635ec5ae10bd', 'active', '2024-05-04 16:05:46'),
(69, 'admin_6635ec5ae11cb', 'active', '2024-05-04 16:05:46'),
(70, 'admin_6635ec64d8261', 'active', '2024-05-04 16:05:56'),
(71, 'admin_6635ec64d83a6', 'active', '2024-05-04 16:05:56'),
(72, 'admin_6635ec9cd4ff3', 'active', '2024-05-04 16:06:52'),
(73, 'admin_6635ec9cd4fcb', 'active', '2024-05-04 16:06:52'),
(74, 'admin_663621bfca10c', 'active', '2024-05-04 19:53:35'),
(75, 'admin_663621bfca1b9', 'active', '2024-05-04 19:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `admin_temporary_account`
--

CREATE TABLE `admin_temporary_account` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `temp_pass` varchar(255) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_temporary_account`
--

INSERT INTO `admin_temporary_account` (`id`, `admin_id`, `email`, `temp_pass`, `status`) VALUES
(65, 'admin_66359d7ad08ee', 'YOUR_EMAIL@gmail.com', 'dEEsu5sigm4nnYaq', 'not verified'),
(66, 'admin_66359dc19a3dc', 'ceejay.saplala05@gmail.com', 'Bonnibel1', 'verified'),
(67, 'admin_6635a28c81e8b', 'marcgirasol@gmail.com', 'macmac123', 'verified'),
(68, 'admin_6635ec5ae10bd', 'juliusbalagot3@gmail.com', 'Balagot123', 'verified'),
(69, 'admin_6635ec5ae11cb', 'juliusbalagot3@gmail.com', '6tC8nQXWwMCPBCN1', 'not verified'),
(70, 'admin_6635ec64d8261', 'ceejay.saplala03@gmail.com', 'G86HCSIza2KAKDw4', 'not verified'),
(71, 'admin_6635ec64d83a6', 'ceejay.saplala03@gmail.com', 'bCk3gpHiSRRzatd8', 'not verified'),
(72, 'admin_6635ec9cd4ff3', 'gnavitas77@gmail.com', 'mICp14G1Rq9TYOeO', 'not verified'),
(73, 'admin_6635ec9cd4fcb', 'gnavitas77@gmail.com', 'Bonnibel1', 'verified'),
(74, 'admin_663621bfca10c', 'YOUR_EMAIL@gmail.com', 'Dy0Std4orTPzEave', 'not verified'),
(75, 'admin_663621bfca1b9', 'YOUR_EMAIL@gmail.com', '123', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `adoption_house`
--

CREATE TABLE `adoption_house` (
  `id` int(11) NOT NULL,
  `adoption_id` varchar(20) NOT NULL,
  `user_id` varchar(55) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_house`
--

INSERT INTO `adoption_house` (`id`, `adoption_id`, `user_id`, `images`) VALUES
(78, 'adopt_66360b0fd620f', 'user_6635ee42cff23', 'uploads/adopt_66360b0fd620f_homeImage_0.png'),
(79, 'adopt_66360be4db863', 'user_6635ee42cff23', 'uploads/adopt_66360be4db863_homeImage_0.png'),
(80, 'adopt_663616063ac01', '115204346069139052676', 'uploads/adopt_663616063ac01_homeImage_0.png'),
(81, 'adopt_66361b94262f8', 'user_6635ee42cff23', 'uploads/adopt_66361b94262f8_homeImage_0.png'),
(82, 'adopt_66361bcfdf95f', 'user_6635ee42cff23', 'uploads/adopt_66361bcfdf95f_homeImage_0.png'),
(83, 'adopt_6636d8bdad05f', 'user_6635ee42cff23', 'uploads/adopt_6636d8bdad05f_homeImage_0.png');

-- --------------------------------------------------------

--
-- Table structure for table `adoption_reschedule`
--

CREATE TABLE `adoption_reschedule` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(55) NOT NULL,
  `old_schedule` date NOT NULL,
  `new_schedule` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `remark_resched` varchar(55) DEFAULT NULL,
  `mail_sent` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adoption_schedule`
--

CREATE TABLE `adoption_schedule` (
  `id` int(11) NOT NULL,
  `adoption_id` varchar(20) NOT NULL,
  `date_of_schedule` date NOT NULL,
  `time` time NOT NULL,
  `mail_sent` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_schedule`
--

INSERT INTO `adoption_schedule` (`id`, `adoption_id`, `date_of_schedule`, `time`, `mail_sent`) VALUES
(68, 'adopt_66360b0fd620f', '2024-05-07', '18:16:47', NULL),
(69, 'adopt_66360be4db863', '2024-05-07', '18:20:20', NULL),
(70, 'adopt_663616063ac01', '2024-05-07', '19:03:34', NULL),
(71, 'adopt_66361b94262f8', '2024-05-07', '19:27:16', NULL),
(72, 'adopt_66361bcfdf95f', '2024-05-07', '19:28:15', NULL),
(73, 'adopt_6636d8bdad05f', '2024-05-05', '08:54:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adoption_slot`
--

CREATE TABLE `adoption_slot` (
  `id` int(11) NOT NULL,
  `date_of_schedule` date NOT NULL,
  `date_slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_slot`
--

INSERT INTO `adoption_slot` (`id`, `date_of_schedule`, `date_slot`) VALUES
(9, '2024-04-21', 8),
(10, '2024-05-04', 0),
(11, '2024-05-06', 0),
(12, '2024-05-07', 5),
(13, '2024-05-05', 10);

-- --------------------------------------------------------

--
-- Table structure for table `adoption_status`
--

CREATE TABLE `adoption_status` (
  `id` int(11) NOT NULL,
  `adoption_id` varchar(20) NOT NULL,
  `status` varchar(55) NOT NULL,
  `date_update` datetime NOT NULL,
  `mail` varchar(55) DEFAULT NULL,
  `status_pending` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_status`
--

INSERT INTO `adoption_status` (`id`, `adoption_id`, `status`, `date_update`, `mail`, `status_pending`) VALUES
(68, 'adopt_66360b0fd620f', 'approved', '2024-05-04 18:16:47', NULL, 'Pending'),
(69, 'adopt_66360be4db863', 'success', '2024-05-04 19:52:22', NULL, 'Pending'),
(70, 'adopt_663616063ac01', 'success', '2024-05-04 19:52:05', NULL, 'Pending'),
(71, 'adopt_66361b94262f8', 'approved', '2024-05-04 19:27:16', NULL, 'Pending'),
(72, 'adopt_66361bcfdf95f', 'success', '2024-05-04 19:51:49', NULL, 'Pending'),
(73, 'adopt_6636d8bdad05f', 'success', '2024-05-05 08:56:10', NULL, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `adoption_transaction`
--

CREATE TABLE `adoption_transaction` (
  `id` int(11) NOT NULL,
  `adoption_id` varchar(20) NOT NULL,
  `user_id` varchar(55) NOT NULL,
  `pet_id` varchar(20) NOT NULL,
  `reference_no` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `valid_id` varchar(255) NOT NULL,
  `1by1_id` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_transaction`
--

INSERT INTO `adoption_transaction` (`id`, `adoption_id`, `user_id`, `pet_id`, `reference_no`, `email`, `fullname`, `address`, `contact`, `valid_id`, `1by1_id`, `datetime`) VALUES
(71, 'adopt_66360b0fd620f', 'user_6635ee42cff23', 'pet_6635f77376f88', '66360B0FD62101D', 'YOUR_EMAIL@gmail.com', 'ceejay saplala', 'Gusion, Brgy. ANorte, , Bulacan', '09123872187', 'uploads/adopt_66360b0fd620f_validID.png', 'uploads/adopt_66360b0fd620f_1by1.png', '2024-05-04 18:16:47'),
(72, 'adopt_66360be4db863', 'user_6635ee42cff23', 'pet_6635f20feface', '66360BE4DB865E7', 'YOUR_EMAIL@gmail.com', 'ceejay tommy', 'Gusion, Brgy. ANorte, , Bulacan', '09123872187', 'uploads/adopt_66360be4db863_validID.png', 'uploads/adopt_66360be4db863_1by1.png', '2024-05-04 18:20:20'),
(73, 'adopt_663616063ac01', '115204346069139052676', 'pet_6635f5f29e172', '663616063AC03D4', 'girasol.marcj@ue.edu.ph', 'Mark Balagnot', 'Paresan ni Diwata, Brgy. ANorte, , Bulacan', '09123456789', 'uploads/adopt_663616063ac01_validID.png', 'uploads/adopt_663616063ac01_1by1.png', '2024-05-04 19:03:34'),
(74, 'adopt_66361b94262f8', 'user_6635ee42cff23', 'pet_66360b10a4e3f', '66361B94262F900', 'YOUR_EMAIL@gmail.com', 'ceejay tommy', 'Gusion, Brgy. ANorte, , Bulacan', '09123872187', 'uploads/adopt_66361b94262f8_validID.png', 'uploads/adopt_66361b94262f8_1by1.png', '2024-05-04 19:27:16'),
(75, 'adopt_66361bcfdf95f', 'user_6635ee42cff23', 'pet_66360c5d219d9', '66361BCFDF96121', 'YOUR_EMAIL@gmail.com', 'ceejay tommy', 'Gusion, Brgy. ANorte, , Bulacan', '09123872187', 'uploads/adopt_66361bcfdf95f_validID.png', 'uploads/adopt_66361bcfdf95f_1by1.png', '2024-05-04 19:28:15'),
(76, 'adopt_6636d8bdad05f', 'user_6635ee42cff23', 'pet_66360b9e895d3', '6636D8BDAD060CD', 'YOUR_EMAIL@gmail.com', 'ceejay tommy', 'Gusion, Brgy. ANorte, , Bulacan', '09832989989', 'uploads/adopt_6636d8bdad05f_validID.png', 'uploads/adopt_6636d8bdad05f_1by1.png', '2024-05-05 08:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `archive_id` int(11) NOT NULL,
  `archive_type` varchar(55) NOT NULL,
  `archive_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `characteristics`
--

CREATE TABLE `characteristics` (
  `id` int(11) NOT NULL,
  `characteristic` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `characteristics`
--

INSERT INTO `characteristics` (`id`, `characteristic`) VALUES
(23001, 'Playful'),
(23002, 'Dog Compatible'),
(23003, 'Cuddler'),
(23004, 'Trained'),
(23005, 'Cat Compatible'),
(23006, 'Kid Compatible');

-- --------------------------------------------------------

--
-- Table structure for table `ci`
--

CREATE TABLE `ci` (
  `id` int(11) NOT NULL,
  `ci_validator` varchar(55) NOT NULL,
  `reference_no` varchar(55) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `ci_status` varchar(55) NOT NULL,
  `eval1` varchar(3) NOT NULL,
  `eval2` varchar(3) NOT NULL,
  `eval3` varchar(3) NOT NULL,
  `eval4` varchar(3) NOT NULL,
  `eval5` varchar(3) NOT NULL,
  `comments` text NOT NULL,
  `remarks` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `schedule` date NOT NULL,
  `datetime` datetime NOT NULL,
  `ci_image` varchar(55) NOT NULL,
  `path` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ci`
--

INSERT INTO `ci` (`id`, `ci_validator`, `reference_no`, `fullname`, `ci_status`, `eval1`, `eval2`, `eval3`, `eval4`, `eval5`, `comments`, `remarks`, `address`, `schedule`, `datetime`, `ci_image`, `path`) VALUES
(90, 'm b', '6624605383950CC', 'ceejay saplala', 'not done', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'AWIT ', 'warning', 'ZZZZZZZZZZZzzzzzCHINAROTCHINAROTCHINAROTCHINAROT', '2024-04-21', '2024-04-21 08:40:27', '316098192_191559580074346_6325789775843924987_n.png', './images/Screenshot 2024-04-17 131611.png'),
(91, 'm b', '662467940525394', 'ceejay saplala', 'not done', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'd', 'passed', 'sddd', '2024-04-21', '2024-04-21 09:11:11', '81.jpg', './images/Screenshot 2024-04-17 131611.png'),
(92, 'ceejay saplala', '66361BCFDF96121', 'ceejay tommy', 'not done', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Goods na po hehe', 'passed', 'near marilao bulacan', '2024-05-07', '2024-05-04 11:51:49', '11.png', ''),
(93, 'm b', '663616063AC03D4', 'Mark Balagnot', 'not done', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Goods', 'passed', 'marilao\r\n', '2024-05-04', '2024-05-04 11:52:05', '316098192_191559580074346_6325789775843924987_n.jpg', ''),
(94, 'm b', '66360BE4DB865E7', 'ceejay tommy', 'not done', 'No', 'No', 'Yes', 'Yes', 'Yes', 'walang tulugan ang aso', 'warning', 'marilao', '2024-05-04', '2024-05-04 11:52:23', '316098192_191559580074346_6325789775843924987_n.jpg', ''),
(95, 'm b', '6636D8BDAD060CD', 'ceejay tommy', 'not done', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'okay na ', 'passed', ', Bulacan, Central Luzon, 3019, Philippines', '2024-05-05', '2024-05-05 00:56:10', 'Untitled.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `ci_revisit`
--

CREATE TABLE `ci_revisit` (
  `id` int(11) NOT NULL,
  `ci_validator` varchar(55) NOT NULL,
  `reference_no` varchar(55) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `ci_rev_status` varchar(55) NOT NULL,
  `eval1` varchar(3) NOT NULL,
  `eval2` varchar(3) NOT NULL,
  `eval3` varchar(3) NOT NULL,
  `eval4` varchar(3) NOT NULL,
  `eval5` varchar(3) NOT NULL,
  `comments` text NOT NULL,
  `remarks` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `schedule` date NOT NULL,
  `ci_image` varchar(55) NOT NULL,
  `path` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ci_revisit`
--

INSERT INTO `ci_revisit` (`id`, `ci_validator`, `reference_no`, `fullname`, `ci_rev_status`, `eval1`, `eval2`, `eval3`, `eval4`, `eval5`, `comments`, `remarks`, `address`, `datetime`, `schedule`, `ci_image`, `path`) VALUES
(7, '', '6624605383950CC', 'ceejay saplala', 'for revisit', '', '', '', '', '', '', 'pending', '', '2024-04-21 08:40:27', '2024-04-21', '', ''),
(8, '', '662467940525394', 'ceejay saplala', 'for revisit', '', '', '', '', '', '', 'pending', '', '2024-04-21 09:11:11', '2024-04-21', '', ''),
(9, '', '66361BCFDF96121', 'ceejay tommy', 'for revisit', '', '', '', '', '', '', 'pending', '', '2024-05-04 11:51:49', '2024-05-07', '', ''),
(10, '', '663616063AC03D4', 'Mark Balagnot', 'for revisit', '', '', '', '', '', '', 'pending', '', '2024-05-04 11:52:05', '2024-05-07', '', ''),
(11, '', '66360BE4DB865E7', 'ceejay tommy', 'for revisit', '', '', '', '', '', '', 'pending', '', '2024-05-04 11:52:23', '2024-05-07', '', ''),
(12, '', '6636D8BDAD060CD', 'ceejay tommy', 'for revisit', '', '', '', '', '', '', 'pending', '', '2024-05-05 00:56:10', '2024-05-05', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cms_announcement`
--

CREATE TABLE `cms_announcement` (
  `id` int(11) NOT NULL,
  `content_id` varchar(20) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_announcement`
--

INSERT INTO `cms_announcement` (`id`, `content_id`, `img_name`, `date_added`) VALUES
(39, '663608944B61FBE', '663608944B61FBE663608944b62b.png', '2024-05-04'),
(40, '663609068D44EE1', '663609068D44EE1663609068d455.png', '2024-05-04'),
(41, '6636CB7286B0F50', '6636CB7286B0F506636cb7286b15.png', '2024-05-05'),
(42, '6636CB7E851678E', '6636CB7E851678E6636cb7e8516d.jpg', '2024-05-05'),
(43, '6636CB8E76AC02D', '6636CB8E76AC02D6636cb8e76acb.jpg', '2024-05-05'),
(44, '6636CB9CE707D65', '6636CB9CE707D656636cb9ce7089.jpg', '2024-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `cms_content`
--

CREATE TABLE `cms_content` (
  `id` int(11) NOT NULL,
  `content_id` varchar(255) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `video_content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_content`
--

INSERT INTO `cms_content` (`id`, `content_id`, `video_title`, `video_content`) VALUES
(14, '66361580D6AE448', 'Dog', './contents/66361580D6AE448.mp4'),
(15, '663638A8CEF521E', 're', './contents/663638A8CEF521E.mp4'),
(16, '66363DD05A1955D', 'd', './contents/66363DD05A1955D.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE `medical` (
  `id` int(11) NOT NULL,
  `medical` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical`
--

INSERT INTO `medical` (`id`, `medical`) VALUES
(2301, 'Neuter/Spay'),
(2302, 'Anti Rabies'),
(2303, 'Deworm'),
(2304, 'Flea and Tick');

-- --------------------------------------------------------

--
-- Table structure for table `missing_pets`
--

CREATE TABLE `missing_pets` (
  `id` int(11) NOT NULL,
  `missing_pet_id` varchar(20) NOT NULL,
  `missing_pet_status` varchar(55) NOT NULL,
  `missing_pet_species` varchar(55) NOT NULL,
  `missing_pet_name` varchar(55) NOT NULL,
  `missing_pet_breed` varchar(55) NOT NULL,
  `missing_pet_gender` varchar(6) NOT NULL,
  `missing_pet_description` varchar(255) NOT NULL,
  `missing_pet_contact_details` varchar(255) NOT NULL,
  `missing_pet_image` varchar(255) NOT NULL,
  `missing_date` date NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` varchar(55) NOT NULL,
  `reference_no` varchar(55) NOT NULL,
  `fullname` varchar(55) NOT NULL,
  `payment_reference_no` varchar(55) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `payment_amount` int(10) NOT NULL,
  `date_paid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `reference_no`, `fullname`, `payment_reference_no`, `payment_status`, `payment_amount`, `date_paid`) VALUES
(54, 'user_6635ee42cff23', '66360B0FD62101D', 'ceejay saplala', '66360B0FD621553', 'To Pay', 0, '0000-00-00 00:00:00'),
(55, 'user_6635ee42cff23', '66360BE4DB865E7', 'ceejay tommy', '66360BE4DB8691C', 'Paid', 500, '0000-00-00 00:00:00'),
(56, '115204346069139052676', '663616063AC03D4', 'Mark Balagnot', '663616063AC0C67', 'Paid', 500, '0000-00-00 00:00:00'),
(57, 'user_6635ee42cff23', '66361B94262F900', 'ceejay tommy', '66361B94262FD61', 'To Pay', 0, '0000-00-00 00:00:00'),
(58, 'user_6635ee42cff23', '66361BCFDF96121', 'ceejay tommy', '66361BCFDF96464', 'Paid', 500, '0000-00-00 00:00:00'),
(59, 'user_6635ee42cff23', '6636D8BDAD060CD', 'ceejay tommy', '6636D8BDAD066F9', 'Paid', 500, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pet_characteristics`
--

CREATE TABLE `pet_characteristics` (
  `id` int(11) NOT NULL,
  `pet_id` varchar(20) NOT NULL,
  `pet_char` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_characteristics`
--

INSERT INTO `pet_characteristics` (`id`, `pet_id`, `pet_char`) VALUES
(84, 'pet_66245ffb5a74a', 23001),
(85, 'pet_6624614d30c9e', 23002),
(86, 'pet_6624614d30c9e', 23003),
(87, 'pet_6624673c6f0ae', 23002),
(88, 'pet_6633b79021fb3', 23001),
(89, 'pet_6633b79021fb3', 23003),
(90, 'pet_6634f5c212abf', 23001),
(91, 'pet_6634f5c212abf', 23003),
(92, 'pet_663576bdbfb62', 23001),
(93, 'pet_6635780fbc8c2', 23005),
(94, 'pet_6635787a42eae', 23003),
(95, 'pet_66357acd4f310', 23001),
(96, 'pet_66357b9b3e422', 23005),
(97, 'pet_66357e2e7e31f', 23001),
(98, 'pet_66357e2e7e31f', 23003),
(99, 'pet_6635f20feface', 23001),
(100, 'pet_6635f20feface', 23002),
(101, 'pet_6635f20feface', 23003),
(102, 'pet_6635f353128cf', 23001),
(103, 'pet_6635f3b7e1d71', 23001),
(104, 'pet_6635f3b7e1d71', 23003),
(105, 'pet_6635f3e96b544', 23003),
(106, 'pet_6635f4b23a367', 23002),
(107, 'pet_6635f4b23a367', 23003),
(108, 'pet_6635f4b23a367', 23005),
(109, 'pet_6635f4b23a367', 23006),
(110, 'pet_6635f5f29e172', 23003),
(111, 'pet_6635f77376f88', 23001),
(112, 'pet_6635f77376f88', 23002),
(113, 'pet_6635f77376f88', 23003),
(114, 'pet_6635f77376f88', 23006),
(115, 'pet_6635f876b740a', 23001),
(116, 'pet_6635f876b740a', 23002),
(117, 'pet_6635f876b740a', 23003),
(118, 'pet_6635f876b740a', 23004),
(119, 'pet_6635f876b740a', 23006),
(120, 'pet_6635fd509a4df', 23001),
(121, 'pet_6635fd509a4df', 23002),
(122, 'pet_6635fd509a4df', 23003),
(123, 'pet_6635fd509a4df', 23004),
(124, 'pet_6635fd509a4df', 23006),
(125, 'pet_663607924147a', 23001),
(126, 'pet_663607924147a', 23005),
(127, 'pet_663607924147a', 23006),
(128, 'pet_66360a2c911fa', 23002),
(129, 'pet_66360a2c911fa', 23003),
(130, 'pet_66360a2c911fa', 23006),
(131, 'pet_66360b10a4e3f', 23001),
(132, 'pet_66360b10a4e3f', 23002),
(133, 'pet_66360b10a4e3f', 23003),
(134, 'pet_66360b10a4e3f', 23005),
(135, 'pet_66360b10a4e3f', 23006),
(136, 'pet_66360b9e895d3', 23001),
(137, 'pet_66360b9e895d3', 23003),
(138, 'pet_66360b9e895d3', 23005),
(139, 'pet_66360c5d219d9', 23001),
(140, 'pet_66360c5d219d9', 23005),
(141, 'pet_66360c8c78f96', 23001),
(142, 'pet_66360c8c78f96', 23003),
(143, 'pet_66360d1d6278a', 23001),
(144, 'pet_66360d1d6278a', 23004),
(145, 'pet_66360d1d6278a', 23005),
(146, 'pet_66360dd684d32', 23002),
(147, 'pet_66360dd684d32', 23003),
(148, 'pet_66360dd684d32', 23004),
(149, 'pet_66360f4524489', 23003),
(150, 'pet_66360fe727e33', 23003),
(151, 'pet_66360fe727e33', 23005),
(152, 'pet_66361046a2d7a', 23001),
(153, 'pet_66361046a2d7a', 23003),
(154, 'pet_663610b87b3d3', 23003),
(155, 'pet_663610b87b3d3', 23005),
(156, 'pet_663611487e2b8', 23003);

-- --------------------------------------------------------

--
-- Table structure for table `pet_details`
--

CREATE TABLE `pet_details` (
  `id` int(11) NOT NULL,
  `pet_id` varchar(20) NOT NULL,
  `pet_name` varchar(55) NOT NULL,
  `pet_bdate` date NOT NULL,
  `pet_gender` varchar(6) NOT NULL,
  `pet_species` varchar(55) NOT NULL,
  `pet_breed` varchar(55) NOT NULL,
  `pet_color` varchar(55) NOT NULL,
  `blood_type` varchar(55) NOT NULL,
  `pet_image` varchar(255) NOT NULL,
  `pet_image_path` varchar(55) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_details`
--

INSERT INTO `pet_details` (`id`, `pet_id`, `pet_name`, `pet_bdate`, `pet_gender`, `pet_species`, `pet_breed`, `pet_color`, `blood_type`, `pet_image`, `pet_image_path`, `date_added`) VALUES
(36, 'pet_6635f20feface', 'Cookie', '2024-05-02', 'female', 'dog', 'Shih Tzu', 'white', 'DEA 1.1', 'pet_img-6635f20fef2a4.png', '../../pets_image/pet_img-6635f20fef2a4.png', '2024-05-04 16:30:07'),
(37, 'pet_6635f353128cf', 'Elijah', '2024-01-11', 'male', 'cat', 'Siamese Cat', 'black', 'A', 'pet_img-6635f35312306.png', '../../pets_image/pet_img-6635f35312306.png', '2024-05-04 16:35:31'),
(38, 'pet_6635f3b7e1d71', 'Potchi', '2023-12-08', 'male', 'dog', 'Chow Chow', 'brown', 'DEA 1.3', 'pet_img-6635f3b7e188c.jpg', '../../pets_image/pet_img-6635f3b7e188c.jpg', '2024-05-04 16:37:11'),
(39, 'pet_6635f3e96b544', 'Idol', '2024-05-02', 'male', 'dog', 'Shih Tzu', 'brown', 'DEA 7', 'pet_img-6635f3e96ace8.png', '../../pets_image/pet_img-6635f3e96ace8.png', '2024-05-04 16:38:01'),
(40, 'pet_6635f4b23a367', 'Snowy', '2024-01-16', 'female', 'cat', 'Siamese Cat', 'white', 'AB', 'pet_img-6635f4b239d8f.jpg', '../../pets_image/pet_img-6635f4b239d8f.jpg', '2024-05-04 16:41:22'),
(41, 'pet_6635f5f29e172', 'Mac', '2023-12-30', 'male', 'cat', 'Puspins', 'white', 'AB', 'pet_img-6635f5f29d945.png', '../../pets_image/pet_img-6635f5f29d945.png', '2024-05-04 16:46:42'),
(42, 'pet_6635f77376f88', 'Diwata', '2024-02-08', 'male', 'dog', 'Pug', 'brown', 'DEA 1.2', 'pet_img-6635f773768d4.jpeg', '../../pets_image/pet_img-6635f773768d4.jpeg', '2024-05-04 16:53:07'),
(43, 'pet_6635f876b740a', 'Alucard', '2024-03-05', 'male', 'dog', 'Aspin', 'brown', 'DEA 3', 'pet_img-6635f876b6bc3.jpg', '../../pets_image/pet_img-6635f876b6bc3.jpg', '2024-05-04 16:57:26'),
(44, 'pet_6635fb8125392', 'Simba', '2024-05-02', 'male', 'cat', 'Maine Coon', 'Gray', 'AB', 'pet_img-6635fb8124dd4.png', '../../pets_image/pet_img-6635fb8124dd4.png', '2024-05-04 17:10:25'),
(45, 'pet_6635fd509a4df', 'Boss Toyo', '2024-01-18', 'male', 'dog', 'Rottweiler', 'Parti-color', 'DEA 1.3', 'pet_img-6635fd5099ff7.jpg', '../../pets_image/pet_img-6635fd5099ff7.jpg', '2024-05-04 17:18:08'),
(46, 'pet_663607924147a', 'Pickles', '2023-12-09', 'male', 'dog', 'Pomeranian', 'Brown', 'DEA 3', 'pet_img-6636079240f37.png', '../../pets_image/pet_img-6636079240f37.png', '2024-05-04 18:01:54'),
(47, 'pet_66360a2c911fa', 'Layla', '2023-12-02', 'female', 'cat', 'Russian Blue', 'White', 'A', 'pet_img-66360a2c90a47.png', '../../pets_image/pet_img-66360a2c90a47.png', '2024-05-04 18:13:00'),
(48, 'pet_66360b10a4e3f', 'Urgot', '2024-03-13', 'female', 'dog', 'French Bulldog', 'Black', 'DEA 4', 'pet_img-66360b10a443c.jpg', '../../pets_image/pet_img-66360b10a443c.jpg', '2024-05-04 18:16:48'),
(49, 'pet_66360b9e895d3', 'Hachiko', '2023-12-01', 'male', 'dog', 'Chow Chow', 'Brown', 'DEA 1.1', 'pet_img-66360b9e88f2b.jpg', '../../pets_image/pet_img-66360b9e88f2b.jpg', '2024-05-04 18:19:10'),
(50, 'pet_66360c5d219d9', 'Sven', '2020-10-05', 'male', 'dog', 'Golden Retriever', 'Brown', 'DEA 1.2', 'pet_img-66360c5d21441.jpg', '../../pets_image/pet_img-66360c5d21441.jpg', '2024-05-04 18:22:21'),
(51, 'pet_66360c8c78f96', 'Badang', '2024-05-02', 'male', 'dog', 'English Bulldog', 'Brown', 'DEA 5', 'pet_img-66360c8c789dd.png', '../../pets_image/pet_img-66360c8c789dd.png', '2024-05-04 18:23:08'),
(52, 'pet_66360d1d6278a', 'Boss Dio', '2018-12-22', 'male', 'dog', 'French Bulldog', 'Cream', 'DEA 1.2', 'pet_img-66360d1d62223.png', '../../pets_image/pet_img-66360d1d62223.png', '2024-05-04 18:25:33'),
(53, 'pet_66360dd684d32', 'Bonnie', '2021-06-17', 'female', 'dog', 'Chihuahua', 'Merle', 'DEA 3', 'pet_img-66360dd6846ec.jpg', '../../pets_image/pet_img-66360dd6846ec.jpg', '2024-05-04 18:28:38'),
(54, 'pet_66360f4524489', 'Bella', '2020-02-04', 'female', 'dog', 'Saint Bernard', 'Merle', 'DEA 1.1', 'pet_img-66360f4523d62.jpg', '../../pets_image/pet_img-66360f4523d62.jpg', '2024-05-04 18:34:45'),
(55, 'pet_66360f8aa5494', 'Snowy', '2017-06-05', 'female', 'dog', 'Chow Chow', 'White', 'DEA 4', 'pet_img-66360f8aa4dc0.jpg', '../../pets_image/pet_img-66360f8aa4dc0.jpg', '2024-05-04 18:35:54'),
(56, 'pet_66360fe727e33', 'Tiny', '2016-06-08', 'female', 'dog', 'Labrador Retriever', 'White', 'DEA 4', 'pet_img-66360fe72784e.jpg', '../../pets_image/pet_img-66360fe72784e.jpg', '2024-05-04 18:37:27'),
(57, 'pet_66361046a2d7a', 'Loki', '2022-06-15', 'male', 'dog', 'Siberian Husky', 'Brown', 'DEA 4', 'pet_img-66361046a276c.jpg', '../../pets_image/pet_img-66361046a276c.jpg', '2024-05-04 18:39:02'),
(58, 'pet_663610b87b3d3', 'Maggie', '2020-04-29', 'female', 'dog', 'Shih Tzu', 'Tricolor', 'DEA 1.3', 'pet_img-663610b87ae4d.jpg', '../../pets_image/pet_img-663610b87ae4d.jpg', '2024-05-04 18:40:56'),
(59, 'pet_6636111888dcd', 'Tommy', '2024-05-01', 'male', 'cat', 'Puspins', 'White', 'AB', 'pet_img-663611188884a.jpg', '../../pets_image/pet_img-663611188884a.jpg', '2024-05-04 18:42:32'),
(60, 'pet_663611487e2b8', 'Nala', '2021-02-16', 'female', 'cat', 'Persian Cat', 'Parti-color', 'AB', 'pet_img-663611487dd0f.jpg', '../../pets_image/pet_img-663611487dd0f.jpg', '2024-05-04 18:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `pet_medical_history`
--

CREATE TABLE `pet_medical_history` (
  `id` int(11) NOT NULL,
  `pet_id` varchar(20) NOT NULL,
  `medical` varchar(255) NOT NULL,
  `med_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_medical_history`
--

INSERT INTO `pet_medical_history` (`id`, `pet_id`, `medical`, `med_date`) VALUES
(38, 'pet_66245ffb5a74a', '2304', '2024-04-11'),
(39, 'pet_6633b79021fb3', '2301', '2024-05-22'),
(40, 'pet_6634f5c212abf', '2301', '2024-05-14'),
(41, 'pet_663576bdbfb62', '2301', '2024-05-07'),
(42, 'pet_6635780fbc8c2', '2301', '2024-05-01'),
(43, 'pet_6635787a42eae', '2301', '2024-05-02'),
(44, 'pet_6635f20feface', '2302', '2024-01-05'),
(45, 'pet_6635f20feface', '2303', '2024-01-13'),
(46, 'pet_6635f20feface', '2304', '2024-02-05'),
(47, 'pet_6635f3b7e1d71', '2301', '2024-04-29'),
(48, 'pet_6635f3b7e1d71', '2302', '2024-03-11'),
(49, 'pet_6635f3b7e1d71', '2303', '2024-02-12'),
(50, 'pet_6635f3b7e1d71', '2304', '2024-02-26'),
(51, 'pet_6635f3e96b544', '2301', '2024-05-29'),
(52, 'pet_6635f4b23a367', '2302', '2024-03-12'),
(53, 'pet_6635f4b23a367', '2303', '2024-02-19'),
(54, 'pet_6635f4b23a367', '2304', '2024-03-11'),
(55, 'pet_6635f77376f88', '2302', '2024-03-04'),
(56, 'pet_6635f77376f88', '2303', '2024-03-18'),
(57, 'pet_6635f876b740a', '2302', '2024-04-15'),
(58, 'pet_6635f876b740a', '2303', '2024-03-25'),
(59, 'pet_6635fb8125392', '2302', '2024-05-09'),
(60, 'pet_6635fb8125392', '2303', '2024-05-14'),
(61, 'pet_6635fb8125392', '2304', '2024-05-15'),
(62, 'pet_6635fd509a4df', '2302', '2024-03-06'),
(63, 'pet_6635fd509a4df', '2303', '2024-03-20'),
(64, 'pet_6635fd509a4df', '2304', '2024-04-10'),
(65, 'pet_663607924147a', '2301', '2024-04-12'),
(66, 'pet_663607924147a', '2302', '2024-03-14'),
(67, 'pet_663607924147a', '2303', '2024-03-15'),
(68, 'pet_663607924147a', '2304', '2024-02-10'),
(69, 'pet_66360a2c911fa', '2301', '2024-04-04'),
(70, 'pet_66360a2c911fa', '2302', '2024-04-06'),
(71, 'pet_66360a2c911fa', '2303', '2024-04-04'),
(72, 'pet_66360a2c911fa', '2304', '2024-04-04'),
(73, 'pet_66360b10a4e3f', '2302', '2024-04-16'),
(74, 'pet_66360b10a4e3f', '2303', '2024-05-01'),
(75, 'pet_66360b9e895d3', '2301', '2024-04-06'),
(76, 'pet_66360b9e895d3', '2302', '2024-04-06'),
(77, 'pet_66360b9e895d3', '2303', '2024-04-06'),
(78, 'pet_66360b9e895d3', '2304', '2024-04-06'),
(79, 'pet_66360c8c78f96', '2301', '2024-04-25'),
(80, 'pet_66360f8aa5494', '2303', '2024-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `pet_status`
--

CREATE TABLE `pet_status` (
  `id` int(11) NOT NULL,
  `pet_id` varchar(20) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_status`
--

INSERT INTO `pet_status` (`id`, `pet_id`, `status`) VALUES
(36, 'pet_6635f20feface', 'adopted'),
(37, 'pet_6635f353128cf', 'available'),
(38, 'pet_6635f3b7e1d71', 'available'),
(39, 'pet_6635f3e96b544', 'available'),
(40, 'pet_6635f4b23a367', 'available'),
(41, 'pet_6635f5f29e172', 'adopted'),
(42, 'pet_6635f77376f88', 'pending'),
(43, 'pet_6635f876b740a', 'available'),
(44, 'pet_6635fb8125392', 'available'),
(45, 'pet_6635fd509a4df', 'available'),
(46, 'pet_663607924147a', 'available'),
(47, 'pet_66360a2c911fa', 'available'),
(48, 'pet_66360b10a4e3f', 'pending'),
(49, 'pet_66360b9e895d3', 'adopted'),
(50, 'pet_66360c5d219d9', 'adopted'),
(51, 'pet_66360c8c78f96', 'available'),
(52, 'pet_66360d1d6278a', 'available'),
(53, 'pet_66360dd684d32', 'available'),
(54, 'pet_66360f4524489', 'available'),
(55, 'pet_66360f8aa5494', 'available'),
(56, 'pet_66360fe727e33', 'available'),
(57, 'pet_66361046a2d7a', 'available'),
(58, 'pet_663610b87b3d3', 'available'),
(59, 'pet_6636111888dcd', 'available'),
(60, 'pet_663611487e2b8', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `pet_story`
--

CREATE TABLE `pet_story` (
  `id` int(11) NOT NULL,
  `pet_id` varchar(20) NOT NULL,
  `story` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_story`
--

INSERT INTO `pet_story` (`id`, `pet_id`, `story`) VALUES
(28, 'pet_6634f5c212abf', 'Mag iibang bansa na yung owner'),
(36, 'pet_6635f20feface', 'Cookie was found roaming outside the SM Sangandaan '),
(37, 'pet_6635f353128cf', 'Outisde the Shelter, Elijah shivered, abandoned and alone. Once cherished, now forgotten, she roamed the unfriendly streets, hunger gnawing at her belly.'),
(38, 'pet_6635f3b7e1d71', 'Abandoned by its owner'),
(39, 'pet_6635f3e96b544', 'Dog'),
(40, 'pet_6635f4b23a367', 'The owner likes dog now'),
(41, 'pet_6635f5f29e172', 'Roaming outside without owner'),
(42, 'pet_6635f77376f88', 'Nagtinda ng pares yung owner'),
(43, 'pet_6635f876b740a', 'Sinaktan sabay iniwan'),
(44, 'pet_6635fb8125392', 'hirap nang alagaan'),
(45, 'pet_6635fd509a4df', 'Na bankrupt pawnshop'),
(46, 'pet_663607924147a', 'Abandoned by the oner'),
(47, 'pet_66360a2c911fa', 'Iniwan sa kalye'),
(48, 'pet_66360b10a4e3f', 'Nangangasta'),
(49, 'pet_66360b9e895d3', 'Nangangagat'),
(50, 'pet_66360c5d219d9', 'Malakas kumain'),
(51, 'pet_66360c8c78f96', 'Walang budget sa pangkain kaya pinapa-adopt. '),
(52, 'pet_66360d1d6278a', 'Inabandona sa tulay'),
(53, 'pet_66360dd684d32', 'Stray dog '),
(54, 'pet_66360f4524489', 'Masyadong malaki; walang space sa bahay'),
(55, 'pet_66360f8aa5494', 'May allergy yung dating may ari'),
(56, 'pet_66360fe727e33', 'Patay na yung may ari'),
(57, 'pet_66361046a2d7a', 'Makulit masyado'),
(58, 'pet_663610b87b3d3', 'Hindi na makalakad yung may ari'),
(59, 'pet_6636111888dcd', 'Di na kaya alagaan'),
(60, 'pet_663611487e2b8', 'Inaaway ng ibang pusa. ');

-- --------------------------------------------------------

--
-- Table structure for table `pre_eval_user_answer`
--

CREATE TABLE `pre_eval_user_answer` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(20) NOT NULL,
  `user_id` varchar(55) NOT NULL,
  `existing_pet` varchar(255) NOT NULL,
  `vet_assistance` varchar(255) NOT NULL,
  `space_req` varchar(255) NOT NULL,
  `sleepingarea` varchar(255) NOT NULL,
  `living_arrangement` varchar(7) NOT NULL,
  `cage` varchar(3) NOT NULL,
  `leash` varchar(3) NOT NULL,
  `pens` varchar(3) NOT NULL,
  `feederer` varchar(3) NOT NULL,
  `properwaste` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pre_eval_user_answer`
--

INSERT INTO `pre_eval_user_answer` (`id`, `reference_no`, `user_id`, `existing_pet`, `vet_assistance`, `space_req`, `sleepingarea`, `living_arrangement`, `cage`, `leash`, `pens`, `feederer`, `properwaste`) VALUES
(70, '66360B0FD62101D', 'user_6635ee42cff23', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(71, '66360BE4DB865E7', 'user_6635ee42cff23', 'Yes', 'No', 'Yes', 'No', 'Own', 'No', 'No', 'Yes', 'Yes', 'No'),
(72, '663616063AC03D4', '115204346069139052676', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(73, '66361B94262F900', 'user_6635ee42cff23', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(74, '66361BCFDF96121', 'user_6635ee42cff23', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(75, '6636D8BDAD060CD', 'user_6635ee42cff23', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'No', 'Yes', 'Yes', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `services_id` varchar(20) NOT NULL,
  `type_of_service` varchar(255) NOT NULL,
  `info_service` varchar(255) NOT NULL,
  `image` varchar(55) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `services_id`, `type_of_service`, `info_service`, `image`, `date_added`, `status`) VALUES
(8, 'Spay and Neuter', 'Spay and Neuter', 'Spayed animals no longer feel the need to roam to look for a mate. The result is that they stay home and have less chance of being involved in traumatic accidents such as being hit by a car. They also have a much lower incidence of contracting contagious ', 'service-6635eee51d246.png', '2024-05-04 16:16:37', 'on'),
(10, '5-in-1 Vaccine', '5-in-1 Vaccine', 'Get complete protection in one shot with our 5-in-1 vaccination service. Streamline your immunization process while safeguarding against five major diseases. Prioritize health, simplicity, and peace of mind with our comprehensive solution.', 'service-6635f69a1389c.jpg', '2024-05-04 16:49:30', 'off'),
(12, 'Consulation', 'Consulation', 'Regular visits allow for preventative treatments, early detection of diseases, and advice on all aspects of pet care.', 'service-6636055a4bff9.png', '2024-05-04 17:52:26', 'off'),
(15, 'Deworming', 'Deworming', 'Deworming dogs is a key part of preventative measures as well as treating parasites if your dog has them.', 'service-6636061f29c07.png', '2024-05-04 17:55:43', 'off'),
(19, 'Groom', 'Groom', 'Dog groom', 'service-6636db35e1e1f.png', '2024-05-05 09:04:53', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `services_schedule`
--

CREATE TABLE `services_schedule` (
  `id` int(11) NOT NULL,
  `services_id` varchar(20) NOT NULL,
  `schedule` date NOT NULL,
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_schedule`
--

INSERT INTO `services_schedule` (`id`, `services_id`, `schedule`, `slot`) VALUES
(309, 'Spay and Neuter', '2024-05-15', 50),
(310, 'Spay and Neuter', '2024-05-04', 49);

-- --------------------------------------------------------

--
-- Table structure for table `services_transaction`
--

CREATE TABLE `services_transaction` (
  `id` int(11) NOT NULL,
  `services_application_id` varchar(55) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `reference_no` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL,
  `type_of_service` varchar(55) NOT NULL,
  `valid_id` varchar(255) NOT NULL,
  `onebyone` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `schedule` date NOT NULL,
  `date_apply` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_transaction`
--

INSERT INTO `services_transaction` (`id`, `services_application_id`, `user_id`, `reference_no`, `status`, `type_of_service`, `valid_id`, `onebyone`, `image_path`, `schedule`, `date_apply`) VALUES
(11, 'services_6636022c05683', 'user_6635ee42cff23', '6636022C05D2C3E', 'Pending', 'Spay and Neuter', 'services_6636022c05683_validID.png', 'services_6636022c05683_1by1.png', '../service_upload/', '2024-05-15', '2024-05-04 17:38:52'),
(12, 'services_6636031f47719', 'user_6635ee42cff23', '6636031F47BCC54', 'unattended', 'Spay and Neuter', 'services_6636031f47719_validID.png', 'services_6636031f47719_1by1.png', '../service_upload/', '2024-05-04', '2024-05-04 17:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `account_id` varchar(20) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `user_type` varchar(55) NOT NULL,
  `keyencrypt` varchar(255) NOT NULL,
  `isBanned` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `account_id`, `email`, `password`, `user_type`, `keyencrypt`, `isBanned`) VALUES
(1, 'superadmin001', '1@1.com', '1', 'super admin', 'superadmin', 0),
(211, 'admin_6635a28c81e8b', 'marcgirasol@gmail.com', 'macmac123', 'visitor', '', 0),
(213, 'admin_66359dc19a3dc', 'ceejay.saplala05@gmail.com', 'BthdbXIlnZaxV1y67yH7Wg4VxkmX0Urp6zDYPmBi43M=', 'admin admin', 'boldpls', 0),
(214, 'admin_6635ec5ae10bd', 'juliusbalagot3@gmail.com', 'Balagot123', 'visitor', '', 0),
(215, 'admin_6635ec5ae11cb', 'juliusbalagot3@gmail.com', '', 'visitor', '', 0),
(216, 'admin_6635ec64d8261', 'ceejay.saplala03@gmail.com', '', 'visitor', '', 0),
(217, 'admin_6635ec64d83a6', 'ceejay.saplala03@gmail.com', '', 'visitor', '', 0),
(218, 'admin_6635ec9cd4fcb', 'gnavitas77@gmail.com', 'ASCF123', 'super admin', '', 0),
(219, 'admin_6635ec9cd4ff3', 'gnavitas77@gmail.com', '', 'super admin', '', 0),
(220, 'user_6635ee42cff23', 'YOUR_EMAIL@gmail.com', 'xz4xv7PCGYOeJU26EQZrdLqLhrCK1vpFrTmEdIy2Fgg=', 'user', 'boldpls', 0),
(221, 'user_6635f9d553fcd', 'balagot.julius@ue.edu.ph', 'mD4Ik3Q+qh1nADr8gJl3R77NEiUYWjxBBI7FKIw8YiE=', 'user', 'ASCF', 0),
(222, 'user_6635faeab5be5', 'johnrovieroque456@gmail.com', 'AHRYUQMV4WNOGdq7CzE/gA+7H2sE93D+ODlHscGmbwM=', 'user', 'ASCF', 0),
(223, 'user_66360db1958ef', 'johnpaulgirasol@gmail.com', '3qf9Bb15ySuHmjaGIX2dXn4AE5rAxjxVajevj2TWt+k=', 'user', 'ASCF', 0),
(224, 'admin_663621bfca10c', 'YOUR_EMAIL@gmail.com', '', 'visitor', '', 0),
(225, 'admin_663621bfca1b9', 'YOUR_EMAIL@gmail.com', '1', 'visitor', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emailStatus` varchar(55) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `contactStatus` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `avatar` varchar(55) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `ban_days` int(55) DEFAULT NULL,
  `isBanned` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `firstname`, `lastname`, `email`, `emailStatus`, `contact`, `contactStatus`, `address`, `avatar`, `date_created`, `ban_days`, `isBanned`) VALUES
(160, 'user_662460196659f', 'ceejay', 'saplala', 'ceejay.saplala05@gmail.com', 'Verified', '09399312738', 'Not Verified', 'sabi, Brgy. ANorte, , Bulacan', NULL, '2024-04-21 08:38:49', NULL, 0),
(161, 'user_662a99143a8e6', 'Ceejay', 'Saplala', 'ceejay.saplala05@gmail.com', 'Not Verified', '09192138123', 'Not Verified', 'asdasdasd, Brgy. ANorte, , Bulacan', NULL, '2024-04-26 01:55:32', NULL, 0),
(162, 'user_662a993ff1a89', 'Ceejay', 'Saplalas', 'ceejay.saplala03@gmail.com', 'Not Verified', '09192138123', 'Not Verified', 'asdasdasd, Brgy. ANorte, , Bulacan', NULL, '2024-04-26 01:56:15', NULL, 0),
(163, 'user_662b6d2cef42d', '', 'Pet Shelter', 'YOUR_EMAIL@gmail.com', 'Verified', '09398707328', 'Not Verified', 'dhasjdhasjhdjashdjk, Brgy. ANorte, , Bulacan', NULL, '2024-04-26 17:00:28', NULL, 0),
(164, 'user_662b6deb08ee8', 'Ceejay', 'Saplala', 'gnavitas77@gmail.com', 'Verified', '09192138123', 'Not Verified', 'asdasdasd, Brgy. ANorte, , Bulacan', NULL, '2024-04-26 17:03:39', NULL, 0),
(165, '114590654989095429567', 'Sana All', 'Sinabi Mo :)', 'takebuchi.kei11@gmail.com', 'Verified', '98123861278', 'Not Verified', 'ewrwe, Brgy. ANorte, , Bulacan', NULL, '2024-04-26 18:01:33', NULL, 0),
(166, '117771231515944432947', 'Marc', 'Girasol', 'marcgirasol@gmail.com', 'Not Verified', '09997905747', 'Not Verified', 'Block 7 Lot 8 Phase 3, Estrella Homes, Brgy. SantaRosa2nd, , Bulacan', NULL, '2024-04-29 20:15:38', NULL, 0),
(167, '101070002109210585413', '', 'Pet Shelter', 'YOUR_EMAIL@gmail.com', 'Not Verified', '90213128732', 'Not Verified', 'Tyrone St, Brgy. ANorte, , Bulacan', NULL, '2024-05-02 01:29:59', NULL, 0),
(168, '101070002109210585413', '', 'Pet Shelter', 'YOUR_EMAIL@gmail.com', 'Not Verified', '90213128732', 'Not Verified', 'Tyrone St, Brgy. ANorte, , Bulacan', NULL, '2024-05-02 01:30:03', NULL, 0),
(169, '112584141821081372228', 'CEEJAY', 'SAPLALA', 'YOUR_EMAIL@gmail.com', 'Not Verified', '12312321321', 'Not Verified', 'dasdasdasd, Brgy. ANorte, , Bulacan', NULL, '2024-05-02 02:48:45', NULL, 0),
(170, '112584141821081372228', 'CEEJAY', 'SAPLALA', 'YOUR_EMAIL@gmail.com', 'Not Verified', '32332323232', 'Not Verified', 'dasdasdasd, Brgy. ANorte, , Bulacan', NULL, '2024-05-02 02:48:56', NULL, 0),
(171, '112507879652787213574', 'Gnavi', 'tas', 'gnavitas77777@gmail.com', 'Verified', '09387363662', 'Not Verified', 'Caloocan, Brgy. ANorte, , Bulacan', NULL, '2024-05-02 05:40:21', NULL, 0),
(172, '114194239274935743972', 'Karlsefni', 'Ims drem', 'ceejay.saplala05@gmail.com', 'Not Verified', '00938373732', 'Not Verified', 'Sh, Brgy. ANorte, , Bulacan', NULL, '2024-05-02 05:47:37', NULL, 0),
(173, '114194239274935743972', 'Karlsefni', 'Ims drem', 'ceejay.saplala05@gmail.com', 'Not Verified', '00938373732', 'Not Verified', 'Sh, Brgy. ANorte, , Bulacan', NULL, '2024-05-02 05:47:40', NULL, 0),
(174, '114194239274935743972', 'Karlsefni', 'Ims drem', 'ceejay.saplala05@gmail.com', 'Not Verified', '00938373732', 'Not Verified', 'Sh, Brgy. ANorte, , Bulacan', NULL, '2024-05-02 05:47:44', NULL, 0),
(175, '114194239274935743972', 'Karlsefni', 'Ims drem', 'ceejay.saplala05@gmail.com', 'Not Verified', '00938373732', 'Not Verified', 'Sh, Brgy. ANorte, , Bulacan', NULL, '2024-05-02 05:47:48', NULL, 0),
(176, '114194239274935743972', 'Karlsefni', 'Ims drem', 'ceejay.saplala05@gmail.com', 'Not Verified', '00938373732', 'Not Verified', 'Sh, Brgy. ANorte, , Bulacan', NULL, '2024-05-02 05:47:51', NULL, 0),
(177, '114194239274935743972', 'Karlsefni', 'Imz', 'ceejay.saplala05@gmail.com', 'Not Verified', '00938373732', 'Not Verified', 'Sh, Brgy. ANorte, , Bulacan', NULL, '2024-05-02 05:47:53', NULL, 0),
(178, '114194239274935743972', 'Karlsefni', 'S', 'ceejay.saplala05@gmail.com', 'Not Verified', '09387373773', 'Not Verified', 'S, Brgy. ANorte, , Bulacan', NULL, '2024-05-02 05:48:08', NULL, 0),
(179, '114194239274935743972', 'Karlsefni', 'S', 'ceejay.saplala05@gmail.com', 'Not Verified', '09387373773', 'Not Verified', 'S, Brgy. ANorte, , Bulacan', NULL, '2024-05-02 05:48:09', NULL, 0),
(180, '114194239274935743972', 'Karlsefni', 'S', 'ceejay.saplala05@gmail.com', 'Not Verified', '09387373773', 'Not Verified', 'S, Brgy. ANorte, , Bulacan', NULL, '2024-05-02 05:48:13', NULL, 0),
(181, '114194239274935743972', 'Karlsefni', 'S', 'ceejay.saplala05@gmail.com', 'Not Verified', '09387373773', 'Not Verified', 'S, Brgy. ANorte, , Bulacan', NULL, '2024-05-02 05:48:16', NULL, 0),
(182, '109116984138809237744', 'Ceejay', 'Saplala', 'takebuchi.kei1@gmail.com', 'Not Verified', '09373773727', 'Not Verified', 'Fd, Brgy. ANorte, , Bulacan', NULL, '2024-05-02 08:20:26', NULL, 0),
(183, '102300068877065719190', 'Gnavi', 'tas', 'gnavitas77@gmail.com', 'Not Verified', '12312312341', 'Not Verified', 'Bulacan, Brgy. ANorte, , Bulacan', NULL, '2024-05-04 10:42:05', NULL, 0),
(184, '102300068877065719190', 'Gnavi', 'tas', 'gnavitas77@gmail.com', 'Not Verified', '12312312341', 'Not Verified', 'Bulacan, Brgy. ANorte, , Bulacan', NULL, '2024-05-04 10:42:08', NULL, 0),
(185, 'user_6635a098cb647', 'CEEJAY', 'SAPLALA', 'gnavitas71@gmail.com', 'Not Verified', '09123872178', 'Not Verified', '123, Brgy. ANorte, , Bulacan', NULL, '2024-05-04 10:42:32', NULL, 0),
(186, 'user_6635a1fcd56d7', 'Takeb', 'C', 'takebuchi.kei11@gmail.com', 'Verified', '09373773727', 'Not Verified', 'Fd, Brgy. ANorte, , Bulacan', NULL, '2024-05-04 10:48:28', NULL, 0),
(187, 'user_6635e64744bf7', 'Ceejay', 'Saplala', 'ceejay.saplala05@gmail.com', 'Verified', '09398707328', 'Not Verified', 'Caloocan, Brgy. ANorte, , Bulacan', NULL, '2024-05-04 15:39:51', NULL, 0),
(188, 'user_6635ee42cff23', 'ceejay', 'tommy', 'YOUR_EMAIL@gmail.com', 'Verified', '09123872187', 'Not Verified', 'Gusion, Brgy. ANorte, , Bulacan', NULL, '2024-05-04 16:13:54', NULL, 0),
(189, 'user_6635f9d553fcd', 'Marc', 'Santander', 'balagot.julius@ue.edu.ph', 'Not Verified', '09063502780', 'Not Verified', 'Estrella Homes, Brgy. Lias, , Bulacan', NULL, '2024-05-04 17:03:17', NULL, 0),
(190, 'user_6635faeab5be5', 'John Rovie', 'Roque', 'johnrovieroque456@gmail.com', 'Not Verified', '09123456789', 'Not Verified', ', Bulacan, Brgy. Poblacion1st, , Bulacan', NULL, '2024-05-04 17:07:54', NULL, 0),
(191, 'user_66360db1958ef', 'John Paul', 'Girasol', 'johnpaulgirasol@gmail.com', 'Not Verified', '09997905747', 'Not Verified', 'Kanal Street, Brgy. Ibayo, , Bulacan', NULL, '2024-05-04 18:28:01', NULL, 0),
(192, '115204346069139052676', 'Mark', 'Balagnot', 'girasol.marcj@ue.edu.ph', 'Verified', '09123456789', 'Not Verified', 'Paresan ni Diwata, Brgy. ANorte, , Bulacan', NULL, '2024-05-04 18:36:28', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_verification`
--

CREATE TABLE `user_verification` (
  `id` int(11) NOT NULL,
  `adoptee_id` varchar(20) NOT NULL,
  `verify_acc` varchar(255) NOT NULL,
  `verify_type` varchar(20) NOT NULL,
  `verify_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verify_email`
--

CREATE TABLE `verify_email` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `expiry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verify_phone`
--

CREATE TABLE `verify_phone` (
  `id` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `expiry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abuse_report`
--
ALTER TABLE `abuse_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_status`
--
ALTER TABLE `admin_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_temporary_account`
--
ALTER TABLE `admin_temporary_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoption_house`
--
ALTER TABLE `adoption_house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoption_reschedule`
--
ALTER TABLE `adoption_reschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoption_schedule`
--
ALTER TABLE `adoption_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoption_slot`
--
ALTER TABLE `adoption_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoption_status`
--
ALTER TABLE `adoption_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoption_transaction`
--
ALTER TABLE `adoption_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `characteristics`
--
ALTER TABLE `characteristics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci`
--
ALTER TABLE `ci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_revisit`
--
ALTER TABLE `ci_revisit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_announcement`
--
ALTER TABLE `cms_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_content`
--
ALTER TABLE `cms_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missing_pets`
--
ALTER TABLE `missing_pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_characteristics`
--
ALTER TABLE `pet_characteristics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_details`
--
ALTER TABLE `pet_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_medical_history`
--
ALTER TABLE `pet_medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_status`
--
ALTER TABLE `pet_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_story`
--
ALTER TABLE `pet_story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_eval_user_answer`
--
ALTER TABLE `pre_eval_user_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_schedule`
--
ALTER TABLE `services_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_transaction`
--
ALTER TABLE `services_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_verification`
--
ALTER TABLE `user_verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verify_email`
--
ALTER TABLE `verify_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verify_phone`
--
ALTER TABLE `verify_phone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abuse_report`
--
ALTER TABLE `abuse_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=577;

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `admin_status`
--
ALTER TABLE `admin_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `admin_temporary_account`
--
ALTER TABLE `admin_temporary_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `adoption_house`
--
ALTER TABLE `adoption_house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `adoption_reschedule`
--
ALTER TABLE `adoption_reschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `adoption_schedule`
--
ALTER TABLE `adoption_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `adoption_slot`
--
ALTER TABLE `adoption_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `adoption_status`
--
ALTER TABLE `adoption_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `adoption_transaction`
--
ALTER TABLE `adoption_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `characteristics`
--
ALTER TABLE `characteristics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23007;

--
-- AUTO_INCREMENT for table `ci`
--
ALTER TABLE `ci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `ci_revisit`
--
ALTER TABLE `ci_revisit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cms_announcement`
--
ALTER TABLE `cms_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `cms_content`
--
ALTER TABLE `cms_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `medical`
--
ALTER TABLE `medical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2305;

--
-- AUTO_INCREMENT for table `missing_pets`
--
ALTER TABLE `missing_pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `pet_characteristics`
--
ALTER TABLE `pet_characteristics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `pet_details`
--
ALTER TABLE `pet_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `pet_medical_history`
--
ALTER TABLE `pet_medical_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `pet_status`
--
ALTER TABLE `pet_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `pet_story`
--
ALTER TABLE `pet_story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `pre_eval_user_answer`
--
ALTER TABLE `pre_eval_user_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `services_schedule`
--
ALTER TABLE `services_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `services_transaction`
--
ALTER TABLE `services_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `user_verification`
--
ALTER TABLE `user_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `verify_email`
--
ALTER TABLE `verify_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `verify_phone`
--
ALTER TABLE `verify_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
