-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 03, 2024 lúc 02:17 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `online_quiz`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exam_category`
--

CREATE TABLE `exam_category` (
  `id` int(11) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `category` varchar(100) NOT NULL,
  `exam_time_in_minutes` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `exam_category`
--

INSERT INTO `exam_category` (`id`, `id_admin`, `category`, `exam_time_in_minutes`) VALUES
(11, 2, 'Toiec1', '10'),
(12, 2, 'Ielts', '50'),
(13, 2, 'B2', '20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exam_results`
--

CREATE TABLE `exam_results` (
  `id` int(5) NOT NULL,
  `id_exam` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `exam_type` varchar(100) NOT NULL,
  `total_question` varchar(10) NOT NULL,
  `conrrect_answer` varchar(10) NOT NULL,
  `wrong_answer` varchar(10) NOT NULL,
  `exam_time` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `id` int(5) NOT NULL,
  `id_exam` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `question_no` varchar(5) NOT NULL,
  `question` varchar(500) NOT NULL,
  `opt1` varchar(100) NOT NULL,
  `opt2` varchar(100) NOT NULL,
  `opt3` varchar(100) NOT NULL,
  `opt4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`id`, `id_exam`, `id_admin`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `category`) VALUES
(15, 11, 2, '1', 'I didn’t think his the comments were very \"appropriate\" at the time.', 'correct', 'right', 'exact', 'suitable', 'suitable', 'Toiec1'),
(16, 11, 2, '2', 'GCSE are not \"compulsory\", but they are the most common qualifications taken by students', 'required', 'applied', 'fulfilled', 'specialized', 'required', 'Toiec1'),
(17, 11, 2, '3', 'I received housing benefit when I was \"unemployed\"', 'out of order', 'out of fashion', 'out of work', 'out of practice', 'out of practice', 'Toiec1'),
(18, 12, 2, '1', 'The related publications are far too \"numerous\" to list individually', 'much', 'legion', 'few', 'full', 'full', 'Ielts'),
(19, 12, 2, '2', 'The teacher gave some suggestions on what would come out for the examination', 'make', 'right', 'exact', 'specialized', 'exact', 'Ielts');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `registration`
--

CREATE TABLE `registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contract` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contract`) VALUES
(2, 'Phan Vo', 'Thế Vinh', 'vinh', 'vinh123', 'phanvothevinh@gmail.com', '0122368'),
(3, 'Phan', 'Long', 'long', 'long123', 'phanvothevinh@gmail.com', '031665616'),
(4, 'Ánh', 'Mai', 'mai', 'mai123', 'phanvothevinh@gmail.com', '01654894');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `exam_category`
--
ALTER TABLE `exam_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ad_exam` (`id_admin`);

--
-- Chỉ mục cho bảng `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_exam_result` (`id_exam`),
  ADD KEY `FK_user_result` (`id_user`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_exam_question` (`id_exam`),
  ADD KEY `FK_admin_question` (`id_admin`);

--
-- Chỉ mục cho bảng `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `exam_category`
--
ALTER TABLE `exam_category`
  ADD CONSTRAINT `FK_ad_exam` FOREIGN KEY (`id_admin`) REFERENCES `admin_login` (`id`);

--
-- Các ràng buộc cho bảng `exam_results`
--
ALTER TABLE `exam_results`
  ADD CONSTRAINT `FK_exam_result` FOREIGN KEY (`id_exam`) REFERENCES `exam_category` (`id`),
  ADD CONSTRAINT `FK_user_result` FOREIGN KEY (`id_user`) REFERENCES `registration` (`id`);

--
-- Các ràng buộc cho bảng `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `FK_admin_question` FOREIGN KEY (`id_admin`) REFERENCES `admin_login` (`id`),
  ADD CONSTRAINT `FK_exam_question` FOREIGN KEY (`id_exam`) REFERENCES `exam_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
