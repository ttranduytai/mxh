-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 08, 2023 lúc 01:01 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mybook_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(10) NOT NULL,
  `username` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`) VALUES
(1, 'tai', 'tai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `content_i_follow`
--

CREATE TABLE `content_i_follow` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `contentid` bigint(20) NOT NULL,
  `content_type` varchar(10) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `content_i_follow`
--

INSERT INTO `content_i_follow` (`id`, `userid`, `contentid`, `content_type`, `disabled`, `date`) VALUES
(12, 175687, 64108582320684, 'post', 0, '2023-03-02 18:25:54'),
(13, 175687, 64108582320684, 'post', 0, '2023-03-02 18:40:59'),
(14, 175687, 7208987578575126556, 'post', 0, '2023-03-02 19:25:03'),
(15, 175687, 5309236671960, 'post', 0, '2023-03-02 20:09:10'),
(16, 175687, 5309236671960, 'post', 0, '2023-03-02 20:17:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_invites`
--

CREATE TABLE `group_invites` (
  `id` bigint(20) NOT NULL,
  `groupid` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `inviter` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_members`
--

CREATE TABLE `group_members` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `groupid` bigint(20) NOT NULL,
  `role` varchar(9) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_requests`
--

CREATE TABLE `group_requests` (
  `id` bigint(20) NOT NULL,
  `groupid` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `likes` text NOT NULL,
  `contentid` bigint(20) NOT NULL,
  `following` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `likes`
--

INSERT INTO `likes` (`id`, `type`, `likes`, `contentid`, `following`) VALUES
(34, 'post', '[{\"userid\":\"175687\",\"date\":\"2023-03-02 14:32:04\"}]', 29163858993716600, ''),
(35, 'user', '[{\"userid\":\"175687\",\"date\":\"2023-03-02 14:34:15\"},{\"userid\":\"4174455392\",\"date\":\"2023-03-08 10:55:57\"}]', 175687, '[{\"userid\":\"4174455392\",\"date\":\"2023-03-02 18:09:42\"}]'),
(36, 'user', '[{\"userid\":\"4174455392\",\"date\":\"2023-03-02 16:53:37\"},{\"userid\":\"175687\",\"date\":\"2023-03-02 18:09:42\"},{\"userid\":\"25425040204016\",\"date\":\"2023-03-08 10:44:52\"}]', 4174455392, '{\"0\":{\"userid\":\"175687\",\"date\":\"2023-03-08 10:55:57\"},\"1\":{\"userid\":\"25425040204016\",\"date\":\"2023-03-08 10:56:09\"},\"3\":{\"userid\":\"813737261777\",\"date\":\"2023-03-08 10:59:46\"}}'),
(37, 'post', '[{\"userid\":\"4174455392\",\"date\":\"2023-03-02 18:01:20\"}]', 77125254100738745, ''),
(38, 'post', '[{\"userid\":\"175687\",\"date\":\"2023-03-02 19:05:49\"}]', 98166596283331450, ''),
(39, 'post', '[{\"userid\":\"175687\",\"date\":\"2023-03-02 19:26:46\"}]', 83869, ''),
(40, 'post', '[{\"userid\":\"175687\",\"date\":\"2023-03-02 19:30:01\"}]', 3860630866121026522, ''),
(41, 'user', '[{\"userid\":\"4174455392\",\"date\":\"2023-03-08 10:56:09\"}]', 25425040204016, '[{\"userid\":\"4174455392\",\"date\":\"2023-03-08 10:44:52\"}]'),
(42, 'user', '[]', 10364054761, ''),
(43, 'user', '[{\"userid\":\"4174455392\",\"date\":\"2023-03-08 10:59:46\"}]', 813737261777, ''),
(44, 'post', '[{\"userid\":\"4174455392\",\"date\":\"2023-03-08 11:48:30\"}]', 882206, ''),
(45, 'post', '[]', 16678527513769, ''),
(46, 'post', '[]', 936003438560, ''),
(47, 'post', '[]', 54099381082, ''),
(48, 'post', '[{\"userid\":\"4174455392\",\"date\":\"2023-03-08 11:48:41\"}]', 5309236671960, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `msgid` varchar(60) NOT NULL,
  `sender` bigint(20) NOT NULL,
  `receiver` bigint(20) NOT NULL,
  `message` text DEFAULT NULL,
  `file` varchar(500) DEFAULT NULL,
  `received` tinyint(1) NOT NULL DEFAULT 0,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_sender` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_receiver` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `tags` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `msgid`, `sender`, `receiver`, `message`, `file`, `received`, `seen`, `deleted_sender`, `deleted_receiver`, `date`, `tags`) VALUES
(24, 'N7js1MO5WbHF2SrbmW7MPLxsJ_MbbQmvradw-Qw83gLtYW5L', 175687, 4174455392, '.', '', 0, 1, 1, 0, '2023-03-03 01:47:22', '[]'),
(25, 'N7js1MO5WbHF2SrbmW7MPLxsJ_MbbQmvradw-Qw83gLtYW5L', 175687, 4174455392, 'fdfd', '', 0, 1, 1, 0, '2023-03-03 01:57:41', '[]'),
(26, 'N7js1MO5WbHF2SrbmW7MPLxsJ_MbbQmvradw-Qw83gLtYW5L', 175687, 4174455392, 'dsd', '', 0, 1, 1, 0, '2023-03-03 02:11:51', '[]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `activity` varchar(10) NOT NULL,
  `contentid` bigint(20) NOT NULL,
  `content_owner` bigint(20) NOT NULL,
  `content_type` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`id`, `userid`, `activity`, `contentid`, `content_owner`, `content_type`, `date`) VALUES
(157, 175687, 'like', 29163858993716600, 175687, 'post', '2023-03-02 14:32:05'),
(158, 4174455392, 'like', 77125254100738745, 4174455392, 'post', '2023-03-02 18:01:20'),
(159, 175687, 'follow', 4174455392, 4174455392, 'profile', '2023-03-02 18:09:42'),
(160, 4174455392, 'follow', 175687, 175687, 'profile', '2023-03-02 18:20:02'),
(161, 4174455392, 'tag', 7208987578575126556, 4174455392, 'post', '2023-03-02 18:20:32'),
(162, 4174455392, 'tag', 64108582320684, 175687, 'post', '2023-03-02 18:20:45'),
(163, 175687, 'comment', 64108582320684, 4174455392, 'post', '2023-03-02 18:25:54'),
(164, 175687, 'comment', 64108582320684, 4174455392, 'post', '2023-03-02 18:40:59'),
(165, 175687, 'like', 98166596283331450, 175687, 'post', '2023-03-02 19:04:42'),
(166, 175687, 'like', 98166596283331450, 175687, 'post', '2023-03-02 19:05:49'),
(167, 175687, 'comment', 7208987578575126556, 4174455392, 'post', '2023-03-02 19:25:03'),
(168, 175687, 'like', 83869, 175687, 'comment', '2023-03-02 19:26:46'),
(169, 175687, 'like', 3860630866121026522, 175687, 'comment', '2023-03-02 19:30:01'),
(170, 175687, 'comment', 5309236671960, 4174455392, 'post', '2023-03-02 20:09:10'),
(171, 175687, 'comment', 5309236671960, 4174455392, 'post', '2023-03-02 20:17:23'),
(172, 25425040204016, 'follow', 4174455392, 4174455392, 'profile', '2023-03-08 10:44:52'),
(173, 4174455392, 'follow', 175687, 175687, 'profile', '2023-03-08 10:55:57'),
(174, 4174455392, 'follow', 25425040204016, 25425040204016, 'profile', '2023-03-08 10:56:09'),
(175, 4174455392, 'follow', 10364054761, 10364054761, 'profile', '2023-03-08 10:59:38'),
(176, 4174455392, 'follow', 813737261777, 813737261777, 'profile', '2023-03-08 10:59:46'),
(177, 4174455392, 'like', 882206, 4174455392, 'post', '2023-03-08 11:44:46'),
(178, 4174455392, 'like', 882206, 4174455392, 'post', '2023-03-08 11:44:51'),
(179, 4174455392, 'like', 882206, 4174455392, 'post', '2023-03-08 11:45:59'),
(180, 4174455392, 'like', 16678527513769, 4174455392, 'post', '2023-03-08 11:46:00'),
(181, 4174455392, 'like', 16678527513769, 4174455392, 'post', '2023-03-08 11:46:02'),
(182, 4174455392, 'like', 936003438560, 4174455392, 'post', '2023-03-08 11:47:11'),
(183, 4174455392, 'like', 54099381082, 4174455392, 'post', '2023-03-08 11:47:18'),
(184, 4174455392, 'like', 882206, 4174455392, 'post', '2023-03-08 11:48:30'),
(185, 4174455392, 'like', 5309236671960, 4174455392, 'post', '2023-03-08 11:48:34'),
(186, 4174455392, 'like', 5309236671960, 4174455392, 'post', '2023-03-08 11:48:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification_seen`
--

CREATE TABLE `notification_seen` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `notification_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `notification_seen`
--

INSERT INTO `notification_seen` (`id`, `userid`, `notification_id`) VALUES
(72, 175687, 0),
(73, 4174455392, 0),
(74, 175687, 175687),
(75, 175687, 64108582320684),
(76, 175687, 1655),
(77, 175687, 7208987578575126556),
(78, 175687, 982095463031897),
(79, 175687, 98166596283331450),
(80, 25425040204016, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `postid` bigint(20) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `has_image` tinyint(1) NOT NULL,
  `is_profile_image` tinyint(1) NOT NULL,
  `is_cover_image` tinyint(1) NOT NULL,
  `parent` bigint(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `userid` bigint(20) NOT NULL,
  `owner` bigint(20) NOT NULL,
  `likes` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `tags` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `postid`, `post`, `image`, `has_image`, `is_profile_image`, `is_cover_image`, `parent`, `date`, `userid`, `owner`, `likes`, `comments`, `tags`) VALUES
(93, 961972414814798234, 'sa', '', 0, 0, 0, 0, '2023-03-02 20:29:58', 4174455392, 0, 0, 0, '[]'),
(94, 21019182, 'dsdsd', '', 0, 0, 0, 0, '2023-03-02 20:31:22', 4174455392, 0, 0, 1, '[]'),
(96, 94343769906, 'fdfdf', '', 0, 0, 0, 0, '2023-03-02 22:10:56', 4174455392, 0, 0, 0, '[]'),
(97, 60309860036310137, 'fdf', '', 0, 0, 0, 0, '2023-03-02 22:53:42', 4174455392, 0, 0, 0, '[]'),
(99, 1706806085465, 'dsd', '', 0, 0, 0, 0, '2023-03-03 00:01:39', 4174455392, 0, 0, 1, '[]'),
(100, 1187918532529374286, 'fdfdf', '', 0, 0, 0, 1706806085465, '2023-03-03 00:01:47', 4174455392, 0, 0, 0, '[]'),
(101, 2452371186, '@', '', 0, 0, 0, 0, '2023-03-03 00:20:06', 4174455392, 0, 0, 0, '[]'),
(102, 7208987578575126556, '@taitai', '', 0, 0, 0, 0, '2023-03-03 00:20:32', 4174455392, 0, 0, 1, '[\"taitai\"]'),
(103, 64108582320684, '@dungdung', '', 0, 0, 0, 0, '2023-03-03 00:20:45', 4174455392, 0, 0, 0, '[\"dungdung\"]'),
(104, 5309236671960, 'https://www.facebook.com/', '', 0, 0, 0, 0, '2023-03-03 00:21:10', 4174455392, 0, 1, 0, '[]'),
(110, 20534693, 'a', '', 0, 0, 0, 7208987578575126556, '2023-03-03 01:25:03', 175687, 0, 0, 0, '[]'),
(142, 58439903646, 'fdfdf', '', 0, 0, 0, 0, '2023-03-08 16:44:18', 25425040204016, 0, 0, 0, '[]'),
(143, 6412317188, 'dfdf', '', 0, 0, 0, 0, '2023-03-08 16:44:29', 25425040204016, 0, 0, 0, '[]'),
(144, 140451774111788, 'ffdf', '', 0, 0, 0, 21019182, '2023-03-08 17:27:02', 4174455392, 0, 0, 0, '[]'),
(145, 54099381082, 'dfd', '', 0, 0, 0, 0, '2023-03-08 17:42:20', 4174455392, 0, 0, 0, '[]'),
(146, 936003438560, 'fdfdf', '', 0, 0, 0, 0, '2023-03-08 17:42:21', 4174455392, 0, 0, 0, '[]'),
(147, 16678527513769, 'fdfdf', '', 0, 0, 0, 0, '2023-03-08 17:42:22', 4174455392, 0, 0, 0, '[]'),
(148, 882206, 'fdfdf', '', 0, 0, 0, 0, '2023-03-08 17:42:24', 4174455392, 0, 1, 0, '[]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `owner` bigint(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `type` varchar(10) NOT NULL,
  `profile_image` varchar(500) NOT NULL,
  `cover_image` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `online` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `url_address` varchar(100) NOT NULL,
  `likes` int(11) NOT NULL,
  `about` text NOT NULL,
  `tag_name` varchar(20) NOT NULL,
  `group_type` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `userid`, `owner`, `first_name`, `last_name`, `gender`, `type`, `profile_image`, `cover_image`, `date`, `online`, `email`, `password`, `url_address`, `likes`, `about`, `tag_name`, `group_type`) VALUES
(41, 175687, 0, 'b', 'b', 'Male', 'profile', '', '', '2023-03-02 14:31:52', 1677786591, 'dung@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'dung.dung', 2, '', 'dungdung', ''),
(42, 8364, 4174455392, 'a', 'a', '', 'group', '', '', '2023-03-02 15:59:58', 0, '', '', 'a1.103', 0, '', '', 'Public'),
(43, 25425040204016, 0, 'Abc', 'Abc', 'Nam', 'profile', '', '', '2023-03-08 10:41:58', 1678268703, 'abc@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'abc.abc', 1, '', 'abcabc', ''),
(44, 813737261777, 0, 'Aaa', 'Aa', 'N?', 'profile', '', '', '2023-03-08 10:58:40', 0, 'aa@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'aaa.aa', 1, '', 'aaaaa', ''),
(45, 10364054761, 0, 'Aaaa', 'Aa', 'Nam', 'profile', '', '', '2023-03-08 10:59:19', 0, 'aaa@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'aaaa.aa', 0, '', 'aaaaaa', ''),
(46, 0, 0, 'fdf', 'dfd', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', 0, '', '', ''),
(47, 0, 0, 'tai', 'taii', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', 0, '', '', ''),
(48, 0, 0, 'tai', 't', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', 0, '', '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `content_i_follow`
--
ALTER TABLE `content_i_follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `contentid` (`contentid`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `date` (`date`);

--
-- Chỉ mục cho bảng `group_invites`
--
ALTER TABLE `group_invites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupid` (`groupid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `inviter` (`inviter`);

--
-- Chỉ mục cho bảng `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `groupid` (`groupid`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `role` (`role`);

--
-- Chỉ mục cho bảng `group_requests`
--
ALTER TABLE `group_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupid` (`groupid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `disabled` (`disabled`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `contentid` (`contentid`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `msgid` (`msgid`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`),
  ADD KEY `received` (`received`),
  ADD KEY `seen` (`seen`),
  ADD KEY `deleted_sender` (`deleted_sender`),
  ADD KEY `date` (`date`),
  ADD KEY `deleted_receiver` (`deleted_receiver`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `contentid` (`contentid`),
  ADD KEY `content_owner` (`content_owner`),
  ADD KEY `date` (`date`);

--
-- Chỉ mục cho bảng `notification_seen`
--
ALTER TABLE `notification_seen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `notification_id` (`notification_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `date` (`date`),
  ADD KEY `parent` (`parent`),
  ADD KEY `userid` (`userid`),
  ADD KEY `likes` (`likes`),
  ADD KEY `comments` (`comments`),
  ADD KEY `owner` (`owner`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `date` (`date`),
  ADD KEY `online` (`online`),
  ADD KEY `email` (`email`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `likes` (`likes`),
  ADD KEY `tag_name` (`tag_name`),
  ADD KEY `type` (`type`),
  ADD KEY `owner` (`owner`),
  ADD KEY `group_type` (`group_type`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `content_i_follow`
--
ALTER TABLE `content_i_follow`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `group_invites`
--
ALTER TABLE `group_invites`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `group_requests`
--
ALTER TABLE `group_requests`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT cho bảng `notification_seen`
--
ALTER TABLE `notification_seen`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
