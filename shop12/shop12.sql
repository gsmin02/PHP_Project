-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 24-06-22 03:15
-- 서버 버전: 10.5.23-MariaDB
-- PHP 버전: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `shop12`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `jumun`
--

CREATE TABLE `jumun` (
  `id` char(10) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `jumunday` int(11) DEFAULT NULL,
  `product_names` char(255) DEFAULT NULL,
  `product_nums` int(11) DEFAULT NULL,
  `o_name` char(20) DEFAULT NULL,
  `o_tel` char(11) DEFAULT NULL,
  `o_email` char(40) DEFAULT NULL,
  `o_zip` char(6) DEFAULT NULL,
  `o_juso` char(100) DEFAULT NULL,
  `r_name` char(20) DEFAULT NULL,
  `r_tel` char(11) DEFAULT NULL,
  `r_email` char(40) DEFAULT NULL,
  `r_zip` char(6) DEFAULT NULL,
  `r_juso` char(100) DEFAULT NULL,
  `memo` char(255) DEFAULT NULL,
  `pay_kind` tinyint(4) DEFAULT NULL,
  `card_okno` char(10) DEFAULT NULL,
  `card_halbu` tinyint(4) DEFAULT NULL,
  `card_kind` tinyint(4) DEFAULT NULL,
  `bank_kind` tinyint(4) DEFAULT NULL,
  `bank_sender` char(30) DEFAULT NULL,
  `total_cash` int(11) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `jumun`
--

INSERT INTO `jumun` (`id`, `member_id`, `jumunday`, `product_names`, `product_nums`, `o_name`, `o_tel`, `o_email`, `o_zip`, `o_juso`, `r_name`, `r_tel`, `r_email`, `r_zip`, `r_juso`, `memo`, `pay_kind`, `card_okno`, `card_halbu`, `card_kind`, `bank_kind`, `bank_sender`, `total_cash`, `state`) VALUES
('2404170003', 34, 20240417, '100', 1, 'name', '01024134234', 'testemail@testsite.com', '05251', '서울특별시 강동구  올림픽로 808 종로빌딩 1234-323', 'name', '01024134234', 'testemail@testsite.com', '05251', '서울특별시 강동구  올림픽로 808 종로빌딩 1234-323', 'memo1234', 0, NULL, 12, 3, 0, '', 90000, 1),
('2404170004', 36, 20240417, 'hmm1외 1', 2, '12', '01012121212', '1212@1212.com', '06312', '서울특별시 강남구  논현로12길 10 쉐라빌 12', '12', '01012121212', '1212@1212.com', '06312', '서울특별시 강남구  논현로12길 10 쉐라빌 12', '121212', 0, NULL, 12, 1, 0, '', 35801, 1),
('2404170005', 37, 20240417, 'hmm1외 1', 2, 'testpost', '01099999999', 'testpost@post.com', '06325', '서울특별시 강남구  선릉로 36 개포1동우체국 관리사무실', 'testpost', '01099999999', 'testpost@post.com', '06325', '서울특별시 강남구  선릉로 36 개포1동우체국 관리사무실', '사무실 입구에 놔주세요', 0, NULL, 3, 4, 0, '', 58023, 1),
('2404180001', 37, 20240418, 'hmw1', 1, 'testpost', '01099999999', 'testpost@post.com', '06325', '서울특별시 강남구  선릉로 36 개포1동우체국 관리사무실', 'testpost', '01099999999', 'testpost@post.com', '06325', '서울특별시 강남구  선릉로 36 개포1동우체국 관리사무실', '124', 1, NULL, 0, 0, 1, '12512', 45678, 1),
('2404240001', 31, 20240424, 'hmm2외 1', 2, '123', '01012344321', '1234@1234.com', '13949', '서울특별시 노원구 초안산로 12 인덕대학교 1234', '123', '01012344321', '1234@1234.com', '13949', '서울특별시 노원구 초안산로 12 인덕대학교 1234', '1', 1, NULL, 0, 0, 1, '124', 32456, 1),
('2405030001', 31, 20240503, 'hmm1', 1, '123', '01012344321', '1234@1234.com', '13949', '서울특별시 노원구 초안산로 12 인덕대학교 1234', '123', '01012344321', '1234@1234.com', '13949', '서울특별시 노원구 초안산로 12 인덕대학교 1234', '1241241254125215', 1, NULL, 0, 0, 1, '12512251', 12345, 3),
('2405090002', 38, 20240509, '1', 1, 'a123_name', '01001101001', 'a123_email@naver.com', '06284', '서울특별시 강남구  삼성로 212 은마아파트 비싼 아파트', 'a123_name', '01001101001', 'a123_email@naver.com', '06284', '서울특별시 강남구  삼성로 212 은마아파트 비싼 아파트', '경비실', 0, NULL, 0, 2, 0, '', 9000, 1),
('2405090003', 38, 20240509, '1', 1, 'a123_name', '01001101001', 'a123_email@naver.com', '06284', '서울특별시 강남구  삼성로 212 은마아파트 비싼 아파트', 'a123_name', '01001101001', 'a123_email@naver.com', '06284', '서울특별시 강남구  삼성로 212 은마아파트 비싼 아파트', '경비실', 1, NULL, 0, 2, 1, 'a123_name', 9000, 1),
('2405090004', 38, 20240509, 'hmm2', 1, 'a123_name', '01001101001', 'a123_email@naver.com', '06284', '서울특별시 강남구  삼성로 212 은마아파트 비싼 아파트', 'a123_name', '01001101001', 'a123_email@naver.com', '06284', '서울특별시 강남구  삼성로 212 은마아파트 비싼 아파트', '배송비 없이', 1, NULL, 0, 0, 2, 'a123_name', 23456, 1),
('2405090006', 39, 20240509, 'hmw1', 1, 'b123_name', '01022222222', 'b123_email@naver.com', '08826', '서울특별시 관악구  관악로 1 서울대학교 정문 경비실', 'b123_name', '01022222222', 'b123_email@naver.com', '08826', '서울특별시 관악구  관악로 1 서울대학교 정문 경비실', '경비실', 1, NULL, 0, 0, 2, 'b123_name', 45678, 2),
('2405270001', 0, 20240527, 'it\'s very nice item', 1, '비회원test1', '01005270527', '비회원email1@test.com', '05066', '서울특별시 광진구  아차산로36길 5 건국대학교동문회관 21421', '비회원test1', '01005270527', '비회원email1@test.com', '05066', '서울특별시 광진구  아차산로36길 5 건국대학교동문회관 21421', '요구사항 비회원test1', 1, NULL, 0, 0, 2, '비회원test1', 37000, 1),
('2405280001', 0, 20240528, '1', 1, '비회원test2', '01074107410', '비회원test2@test.com', '04320', '서울특별시 용산구  한강대로 405 서울역(철도역) 지하 1층 경비실', '비회원test2', '01074107410', '비회원test2@test.com', '04320', '서울특별시 용산구  한강대로 405 서울역(철도역) 지하 1층 경비실', '경비실', 0, NULL, 3, 2, 0, '', 117000, 1),
('2405280003', 0, 20240528, 'hmm1외 2', 3, '비회원test4', '01084156512', '비회원test4@test.com', '06106', '서울특별시 강남구  언주로 621 주식회사 서울비젼 사옥 124', '비회원test4', '01084156512', '비회원test4@test.com', '06106', '서울특별시 강남구  언주로 621 주식회사 서울비젼 사옥 124', '124호', 1, NULL, 0, 0, 2, '비회원test4', 337345, 5),
('2405290001', 31, 20240529, '321외 1', 2, '123', '01012344321', '1234@1234.com', '13949', '서울특별시 노원구 초안산로 12 인덕대학교 1234', '123', '01012344321', '1234@1234.com', '13949', '서울특별시 노원구 초안산로 12 인덕대학교 1234', '', 1, NULL, 0, 0, 1, '123', 35321, 6),
('2406210001', 0, 20240621, 'Precision Tennis Tee', 1, '1', '0101   1', '1', '1', '1', '1', '0101   1', '1', '1', '1', '1', 1, NULL, 0, 0, 1, '1', 495000, 1),
('2406220001', 0, 20240622, 'Coral Performance', 1, '1', '01011111111', '11', '06114', '서울특별시 강남구  강남대로 522 범성빌딩 1', '1', '01011111111', '11', '06114', '서울특별시 강남구  강남대로 522 범성빌딩 1', '1', 1, NULL, 0, 0, 1, '1', 179000, 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `jumuns`
--

CREATE TABLE `jumuns` (
  `id` int(11) NOT NULL,
  `jumun_id` char(10) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `prices` int(11) DEFAULT NULL,
  `discount` tinyint(4) DEFAULT NULL,
  `opts_id1` int(11) DEFAULT NULL,
  `opts_id2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `jumuns`
--

INSERT INTO `jumuns` (`id`, `jumun_id`, `product_id`, `num`, `price`, `prices`, `discount`, `opts_id1`, `opts_id2`) VALUES
(1, '2404170005', 25, 1, 45678, 45678, 0, 6, 13),
(2, '2404170005', 23, 2, 12345, 24690, 0, 10, 16),
(3, '2404170005', 25, 1, 45678, 45678, 0, 6, 13),
(4, '2404170005', 23, 2, 12345, 24690, 0, 10, 16),
(5, '2404170005', 25, 1, 45678, 45678, 0, 6, 13),
(6, '2404170005', 23, 2, 12345, 24690, 0, 10, 16),
(7, '2404170005', 0, 1, 2500, 2500, 0, 0, 0),
(8, '2404180001', 25, 1, 45678, 45678, 0, 6, 13),
(9, '2404180001', 0, 1, 2500, 2500, 0, 0, 0),
(10, '2404240001', 27, 20, 9000, 180000, 10, 6, 14),
(11, '2404240001', 24, 1, 23456, 23456, 0, 16, 0),
(12, '2404240001', 0, 1, 2500, 2500, 0, 0, 0),
(13, '2405030001', 23, 10, 12345, 123450, 0, 6, 16),
(16, '2405090002', 27, 12, 9000, 108000, 10, 7, 13),
(17, '2405090002', 0, 1, 2500, 2500, 0, 0, 0),
(18, '2405090003', 27, 12, 9000, 108000, 10, 7, 13),
(19, '2405090003', 0, 1, 2500, 2500, 0, 0, 0),
(20, '2405090004', 24, 5, 23456, 117280, 0, 16, 0),
(21, '2405090004', 0, 1, 2500, 2500, 0, 0, 0),
(22, '2405090005', 26, 1, 276416000, 276416000, 14, 12, 0),
(23, '2405090006', 25, 1, 45678, 45678, 0, 5, 14),
(24, '2405090006', 0, 1, 2500, 2500, 0, 0, 0),
(25, '2405270001', 5, 1, 37000, 37000, 97, 15, 9),
(26, '2405270001', 0, 1, 2500, 2500, 0, 0, 0),
(29, '2405280001', 27, 13, 9000, 117000, 10, 4, 12),
(30, '2405280002', 27, 1, 9000, 9000, 10, 10, 14),
(31, '2405280002', 0, 1, 2500, 2500, 0, 0, 0),
(32, '2405280003', 28, 1, 127000, 127000, 15, 15, 6),
(33, '2405280003', 29, 2, 99000, 198000, 1, 13, 17),
(34, '2405280003', 23, 1, 12345, 12345, 0, 7, 16),
(35, '2405290001', 9, 1, 35000, 35000, 20, 12, 7),
(36, '2405290001', 6, 1, 321, 321, 0, 16, 13),
(37, '2405290001', 0, 1, 2500, 2500, 0, 0, 0),
(38, '2406210001', 56, 5, 99000, 495000, 0, 21, 41),
(39, '2406220001', 60, 1, 179000, 179000, 0, 25, 40);

-- --------------------------------------------------------

--
-- 테이블 구조 `juso`
--

CREATE TABLE `juso` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `sm` tinyint(4) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `juso` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `juso`
--

INSERT INTO `juso` (`id`, `name`, `tel`, `sm`, `birthday`, `juso`) VALUES
(1, '최민기', '01627516250', 0, '1990-01-01', '서울 노원구 초안산로 12 인덕대학교 1'),
(2, '노준국', '01192318426', 1, '1990-01-02', '서울 노원구 초안산로 12 인덕대학교 2'),
(3, '배인정', '01091419758', 0, '1990-01-03', '서울 노원구 초안산로 12 인덕대학교 3'),
(4, '윤수진', '01091315099', 0, '1990-01-04', '서울 노원구 초안산로 12 인덕대학교 4'),
(5, '김민주', '01012715951', 1, '1990-01-05', '서울 노원구 초안산로 12 인덕대학교 5'),
(6, '고향에', '01164712495', 0, '1990-01-06', '서울 노원구 초안산로 12 인덕대학교 6'),
(7, '이창기', '01094567737', 0, '1990-01-07', '서울 노원구 초안산로 12 인덕대학교 7'),
(8, '강범조', '01197515356', 0, '1990-01-08', '서울 노원구 초안산로 12 인덕대학교 8'),
(9, '임상호', '01076212041', 1, '1990-01-09', '서울 노원구 초안산로 12 인덕대학교 9'),
(10, '김경진', '01196616064', 0, '1990-01-10', '서울 노원구 초안산로 12 인덕대학교 10'),
(11, '양지민', '01085916932', 0, '1990-01-11', '서울 노원구 초안산로 12 인덕대학교 11'),
(12, '김철규', '01064517732', 0, '1990-01-12', '서울 노원구 초안산로 12 인덕대학교 12'),
(13, '이재진', '01066725207', 0, '1990-01-13', '서울 노원구 초안산로 12 인덕대학교 13'),
(14, '김인기', '01045825553', 1, '1990-01-14', '서울 노원구 초안산로 12 인덕대학교 14'),
(15, '황호하', '01094529069', 0, '1990-01-15', '서울 노원구 초안산로 12 인덕대학교 15'),
(16, '원미현', '01697323309', 0, '1990-01-16', '서울 노원구 초안산로 12 인덕대학교 16'),
(17, '김성현', '01077524586', 0, '1990-01-17', '서울 노원구 초안산로 12 인덕대학교 17'),
(18, '윤태양', '01044624402', 0, '1990-01-18', '서울 노원구 초안산로 12 인덕대학교 18'),
(19, '손영미', '01063021586', 1, '1990-01-19', '서울 노원구 초안산로 12 인덕대학교 19'),
(20, '서찬국', '01029725437', 0, '1990-01-20', '서울 노원구 초안산로 12 인덕대학교 20'),
(21, '최지호', '01095829293', 0, '1990-01-21', '서울 노원구 초안산로 12 인덕대학교 21'),
(22, '현오석', '01045725203', 0, '1990-01-22', '서울 노원구 초안산로 12 인덕대학교 22'),
(23, '고구진', '01039539565', 0, '1990-01-23', '서울 노원구 초안산로 12 인덕대학교 23'),
(24, '임양진', '01049431735', 0, '1990-01-24', '서울 노원구 초안산로 12 인덕대학교 24'),
(25, '박잔형', '01028732059', 0, '1990-01-25', '서울 노원구 초안산로 12 인덕대학교 25'),
(26, '고맹진', '01017331347', 1, '1990-01-26', '서울 노원구 초안산로 12 인덕대학교 26'),
(27, '이미진', '01032434656', 0, '1990-01-27', '서울 노원구 초안산로 12 인덕대학교 27'),
(28, '박신양', '01032633479', 0, '1990-01-28', '서울 노원구 초안산로 12 인덕대학교 28'),
(29, '이부성', '01022533028', 0, '1990-01-29', '서울 노원구 초안산로 12 인덕대학교 29'),
(30, '박조형', '01034634503', 0, '1990-01-30', '서울 노원구 초안산로 12 인덕대학교 30'),
(31, '김당진', '01022144844', 0, '1990-01-31', '서울 노원구 초안산로 12 인덕대학교 31'),
(32, '임조철', '01063146720', 0, '1990-02-01', '서울 노원구 초안산로 12 인덕대학교 32'),
(33, '최미선', '01023744540', 0, '1990-02-02', '서울 노원구 초안산로 12 인덕대학교 33'),
(34, '정해솔', '01057443220', 1, '1990-02-03', '서울 노원구 초안산로 12 인덕대학교 34'),
(35, '이양석', '01045946853', 0, '1990-02-04', '서울 노원구 초안산로 12 인덕대학교 35'),
(36, '조진현', '01074255035', 0, '1990-02-05', '서울 노원구 초안산로 12 인덕대학교 36'),
(37, '김호석', '01015645583', 0, '1990-02-06', '서울 노원구 초안산로 12 인덕대학교 37'),
(38, '김호식', '01014176818', 0, '1990-02-07', '서울 노원구 초안산로 12 인덕대학교 38'),
(39, '김국진', '01022785917', 0, '1990-02-08', '서울 노원구 초안산로 12 인덕대학교 39'),
(40, '박미희', '01078379430', 0, '1990-02-09', '서울 노원구 초안산로 12 인덕대학교 40'),
(41, '권해미', '010145 7190', 0, '1990-02-10', '서울 노원구 초안산로 12 인덕대학교 41'),
(42, '이성민', '01002544347', 0, '1990-02-11', '서울 노원구 초안산로 12 인덕대학교 42'),
(43, '정다슬', '01036347019', 1, '1990-02-12', '서울 노원구 초안산로 12 인덕대학교 43'),
(44, '육이호', '01092343917', 0, '1990-02-13', '서울 노원구 초안산로 12 인덕대학교 44'),
(45, '한재우', '01193247558', 0, '1990-02-14', '서울 노원구 초안산로 12 인덕대학교 45'),
(46, '정승국', '01023345788', 0, '1990-02-15', '서울 노원구 초안산로 12 인덕대학교 46'),
(47, '양호승', '01083945545', 0, '1990-02-16', '서울 노원구 초안산로 12 인덕대학교 47'),
(48, '윤상현', '01034655978', 0, '1990-02-17', '서울 노원구 초안산로 12 인덕대학교 48'),
(49, '최미문', '01024365634', 0, '1990-02-18', '서울 노원구 초안산로 12 인덕대학교 49'),
(50, '시국진', '01021243572', 0, '1990-02-19', '서울 노원구 초안산로 12 인덕대학교 50'),
(51, '321', '32143214321', 0, '4321-12-12', '4321'),
(53, '333', '33333333333', 0, '2003-03-03', '1234123433333'),
(55, '1홍길동', '01011112222', 1, '2024-01-21', '대한민국 서울시 어딘가');

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `zip` varchar(5) DEFAULT NULL,
  `juso` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sm` tinyint(4) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gubun` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`id`, `uid`, `pwd`, `name`, `tel`, `zip`, `juso`, `email`, `sm`, `birthday`, `gubun`) VALUES
(1, 'id1', '1234', '최만수', '01627516850', '13974', '서울 노원구 월계4동 산76 인덕대학 1', 'id1@aaa.com', 0, '1990-01-01', 0),
(2, 'id2', '1234', '노호진', '01194828126', '13974', '서울 노원구 월계4동 산76 인덕대학 2', 'id2@aaa.com', 0, '1990-01-02', 0),
(3, 'id3', '1234', '배국수', '01096039258', '13974', '서울 노원구 월계4동 산76 인덕대학 3', 'id3@aaa.com', 0, '1990-01-03', 0),
(4, 'id4', '1234', '윤서진', '01091844399', '13974', '서울 노원구 월계4동 산76 인덕대학 4', 'id4@aaa.com', 0, '1990-01-04', 0),
(5, 'id5', '1234', '방미주', '01099755351', '13974', '서울 노원구 월계4동 산76 인덕대학 5', 'id5@aaa.com', 0, '1990-01-05', 0),
(6, 'id6', '1234', '고형진', '01166762495', '13974', '서울 노원구 월계4동 산76 인덕대학 6', 'id6@aaa.com', 0, '1990-01-06', 0),
(7, 'id7', '1234', '이청자', '01094877537', '13974', '서울 노원구 월계4동 산76 인덕대학 7', 'id7@aaa.com', 0, '1990-01-07', 0),
(8, 'id8', '1234', '강상석', '01197185678', '13974', '서울 노원구 월계4동 산76 인덕대학 8', 'id8@aaa.com', 0, '1990-01-08', 0),
(9, 'id9', '1234', '임규준', '01073292701', '13974', '서울 노원구 월계4동 산76 인덕대학 9', 'id9@aaa.com', 0, '1990-01-09', 0),
(10, 'id10', '1234', '김경준', '01190606874', '13974', '서울 노원구 월계4동 산76 인덕대학 10', 'id10@aaa.com', 0, '1990-01-10', 0),
(11, 'id11', '1234', '양재하', '01089926173', '13974', '서울 노원구 월계4동 산76 인덕대학 11', 'id11@aaa.com', 0, '1990-01-11', 0),
(12, 'id12', '1234', '김준석', '01064537232', '13974', '서울 노원구 월계4동 산76 인덕대학 12', 'id12@aaa.com', 0, '1990-01-12', 0),
(13, 'id13', '1234', '이자중', '01064745307', '13974', '서울 노원구 월계4동 산76 인덕대학 13', 'id13@aaa.com', 0, '1990-01-13', 0),
(14, 'id14', '1234', '김미래', '01047855453', '13974', '서울 노원구 월계4동 산76 인덕대학 14', 'id14@aaa.com', 0, '1990-01-13', 0),
(15, 'id15', '1234', '황장호', '01098569569', '13974', '서울 노원구 월계4동 산76 인덕대학 15', 'id15@aaa.com', 0, '1990-01-15', 0),
(16, 'id16', '1234', '원정현', '01697973609', '13974', '서울 노원구 월계4동 산76 인덕대학 16', 'id16@aaa.com', 0, '1990-01-16', 0),
(17, 'id17', '1234', '김성현', '01071584786', '13974', '서울 노원구 월계4동 산76 인덕대학 17', 'id17@aaa.com', 0, '1990-01-17', 0),
(18, 'id18', '1234', '윤다영', '01046694702', '13974', '서울 노원구 월계4동 산76 인덕대학 18', 'id18@aaa.com', 0, '1990-01-18', 0),
(19, 'id19', '1234', '손양진', '01093001886', '13974', '서울 노원구 월계4동 산76 인덕대학 19', 'id19@aaa.com', 0, '1990-01-19', 0),
(20, 'id20', '1234', '서지범', '01029917437', '13974', '서울 노원구 월계4동 산76 인덕대학 20', 'id20@aaa.com', 0, '1990-01-20', 0),
(21, 'id21', '1234', '최고은', '01098929293', '13974', '서울 노원구 월계4동 산76 인덕대학 21', 'id21@aaa.com', 0, '1990-01-21', 0),
(22, 'id22', '1234', '현자석', '01046535203', '13974', '서울 노원구 월계4동 산76 인덕대학 22', 'id22@aaa.com', 0, '1990-01-22', 0),
(23, 'id23', '1234', '고미진', '01034049565', '13974', '서울 노원구 월계4동 산76 인덕대학 23', 'id23@aaa.com', 0, '1990-01-23', 0),
(24, 'id24', '1234', '임양지', '01045451735', '13974', '서울 노원구 월계4동 산76 인덕대학 24', 'id24@aaa.com', 0, '1990-01-24', 0),
(25, 'id25', '1234', '박조향', '01027762059', '13974', '서울 노원구 월계4동 산76 인덕대학 25', 'id25@aaa.com', 0, '1990-01-25', 0),
(26, 'id26', '1234', '고망현', '01116371347', '13974', '서울 노원구 월계4동 산76 인덕대학 26', 'id26@aaa.com', 0, '1990-01-26', 0),
(27, 'id27', '1234', '이당진', '01035384656', '13974', '서울 노원구 월계4동 산76 인덕대학 27', 'id27@aaa.com', 0, '1990-01-27', 0),
(28, 'id28', '1234', '박지영', '01034593479', '13974', '서울 노원구 월계4동 산76 인덕대학 28', 'id28@aaa.com', 0, '1990-01-28', 0),
(29, 'id29', '1234', '이영성', '01023213028', '13974', '서울 노원구 월계4동 산76 인덕대학 29', 'id29@aaa.com', 0, '1990-01-29', 0),
(30, 'id30', '1234', '박자재', '01032624503', '13974', '서울 노원구 월계4동 산76 인덕대학 30', 'id30@aaa.com', 0, '1990-01-30', 0),
(31, '123', '123', '123', '01012344321', '13949', '서울특별시 노원구 초안산로 12 인덕대학교 1234', '1234@1234.com', 0, '2002-01-01', 0),
(32, 'idtest1', '123', 'idtest1', '01012341234', '01878', '서울특별시 노원구  초안산로 12 인덕대학 인덕', 'idtest@induk.ac.kr', 0, '2000-01-01', 0),
(34, '1234', '1234', 'name', '01024134234', '05251', '서울특별시 강동구  올림픽로 808 종로빌딩 1234-323', 'testemail@testsite.com', 0, '2024-04-15', 1),
(35, '1', '1', '1', '0101   1   ', '1', '1', '1', 0, '0001-01-01', 0),
(36, '12', '12', '12', '01012121212', '06312', '서울특별시 강남구  논현로12길 10 쉐라빌 12', '1212@1212.com', 0, '2012-12-12', 0),
(37, 'testpost', 'testpost', 'testpost', '01099999999', '06325', '서울특별시 강남구  선릉로 36 개포1동우체국 관리사무실', 'testpost@post.com', 0, '2024-04-17', 0),
(38, 'a123', 'a123', 'a123_name', '01001101001', '06284', '서울특별시 강남구  삼성로 212 은마아파트 비싼 아파트', 'a123_email@naver.com', 0, '2000-05-09', 0),
(39, 'b123', 'b123', 'b123_name', '01022222222', '08826', '서울특별시 관악구  관악로 1 서울대학교 정문 경비실', 'b123_email@naver.com', 0, '2000-02-22', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `opt`
--

CREATE TABLE `opt` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `opt`
--

INSERT INTO `opt` (`id`, `name`) VALUES
(7, 'SIZE_MAN'),
(8, 'SIZE_WOMEN'),
(9, 'Accessories_Golf'),
(10, 'Accessories_Swimming'),
(11, 'Accessories_Tennis'),
(12, 'Accessories_Skiing'),
(13, 'COLOR_PALETTE_1'),
(14, 'COLOR_PALETTE_2'),
(15, 'Material_1'),
(16, 'Material_2');

-- --------------------------------------------------------

--
-- 테이블 구조 `opts`
--

CREATE TABLE `opts` (
  `id` int(11) NOT NULL,
  `opt_id` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `opts`
--

INSERT INTO `opts` (`id`, `opt_id`, `name`) VALUES
(4, 1, 'XS'),
(5, 1, 'S'),
(6, 1, 'M'),
(7, 1, 'L'),
(9, 1, 'XL'),
(10, 1, '2XL'),
(11, 1, '3XL'),
(12, 2, '빨강'),
(13, 2, '초록'),
(14, 2, '파랑'),
(15, 3, '70'),
(16, 3, '80'),
(17, 3, '90'),
(20, 7, 'S - 90'),
(21, 7, 'M - 95'),
(22, 7, 'L - 100'),
(23, 7, 'XL - 105'),
(24, 7, 'XXL - 110'),
(25, 8, 'S - 44'),
(26, 8, 'M - 55'),
(27, 8, 'L - 66'),
(28, 8, 'XL - 77'),
(29, 8, 'XXL - 88'),
(30, 9, 'Golf Glove'),
(31, 9, 'Ball Marker'),
(32, 9, 'Tee Holder'),
(33, 9, 'Club Head Covers'),
(34, 9, 'Golf Towel'),
(35, 10, 'Swim Cap'),
(36, 10, 'Goggles'),
(37, 10, 'Waterproof Bag'),
(38, 10, 'Ear Plugs'),
(39, 10, 'Swim Fins'),
(40, 11, 'Wristbands'),
(41, 11, 'Tennis Hat'),
(42, 11, 'Racket Bag'),
(43, 11, 'Grip Tape'),
(44, 11, 'Tennis Socks'),
(45, 12, 'Detachable Hood'),
(46, 12, 'Built-in Gloves'),
(47, 12, 'Extra Pockets'),
(48, 12, 'Goggle Clip'),
(49, 12, 'Neck Warmer');

-- --------------------------------------------------------

--
-- 테이블 구조 `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu` int(11) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `coname` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `opt1` int(11) DEFAULT NULL,
  `opt2` int(11) DEFAULT NULL,
  `contents` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `regday` date DEFAULT NULL,
  `icon_new` tinyint(4) DEFAULT NULL,
  `icon_hit` tinyint(4) DEFAULT NULL,
  `icon_sale` tinyint(4) DEFAULT NULL,
  `discount` tinyint(4) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `product`
--

INSERT INTO `product` (`id`, `menu`, `code`, `name`, `coname`, `price`, `opt1`, `opt2`, `contents`, `status`, `regday`, `icon_new`, `icon_hit`, `icon_sale`, `discount`, `image1`, `image2`, `image3`) VALUES
(30, 11, 'ski_m', 'Alpine Shield Jacket', 'AlpineWorks', 279000, 7, 12, 'SKI WEAR', 1, '2024-06-18', 0, 1, 1, 15, '0592575_C36_Halti_Alpine_takki_unisex_main_720x.webp', '0592575_C36_Alpineunisex3ldxjacket_Main_720x.webp', '0592575_0592638_Halti_Alpine_Unisex_3L_DrymaxX_Kuoritakki_Laskettelu_Ski_Touring_mood_20_720x.webp'),
(31, 11, 'ski_m', 'Alpine Shield Pants', 'AlpineWorks', 179000, 7, 12, 'SKI WEAR', 1, '2024-06-17', 0, 0, 1, 15, '0592638_C36_Halti_Adrenaline_housut_miesten_main_720x.webp', '0592638_C36_AlpineM3ldxpants_Main_720x.webp', '0592638_C36_Halti_Adrenaline_housut_miesten_detsku_720x.webp'),
(32, 12, 'ski_w', 'Alpine Shield Women Jacket', 'AlpineWorks', 279000, 8, 12, 'SKI WEAR', 1, '2024-06-17', 0, 1, 0, 0, '0592625_B66_Halti_Alpine_takki_naisten_main_720x.webp', '0592625_B66_AlpineW3dldxjacket_Main_720x.webp', '0592625_0592626_halti_skitouring_alpine_5_mood_720x.webp'),
(33, 12, 'ski_w', 'Alpine Shield Women Pants', 'AlpineWorks', 179000, 8, 12, 'SKI WEAR', 1, '2024-06-17', 0, 0, 0, 0, '0592626_B66_Halti_Alpine_housut_naisten_main_720x.webp', '0592626_B66_AlpineW3ldxpants_main_720x.webp', '0592625_0592626_Halti_Alpine_Naisten_3L_DrymaxX_Kuoritakki_Laskettelu_Ski_Touring_mood_31_3d01d149-472b-4103-be75-638db65fec28_720x.webp'),
(34, 11, 'ski_m', 'Frostbite Defender', 'FrostLine Outfitters', 299000, 7, 12, 'SKI WEAR', 1, '2024-06-18', 0, 1, 1, 5, '0592617_C36_Halti_Mellow_laskettelutakki_miesten_main_720x.webp', '0592617_C36_MellowMskipufferjacket_main_720x.webp', '0592617_Mellow_Mens_Puffer_Skijacket_mood_1_720x.webp'),
(35, 11, 'ski_m', 'Frostbite Defender Pants', 'FrostLine Outfitters', 189000, 7, 12, 'SKI WEAR', 1, '2024-06-18', 0, 0, 1, 5, '0592620_C41_Halti_Carvey_lasketteluhousut_miesten_main_720x.webp', '0592620_C41_CarveyMdxskipants_Main_720x.webp', '0592620_C41_Halti_Carvey_lasketteluhousut_miesten_detsku_720x.webp'),
(36, 12, 'ski_w', 'Frostbite Defender Women', 'FrostLine Outfitters', 299000, 8, 12, 'SKI WEAR', 1, '2024-06-18', 0, 1, 1, 10, '0592602_C80P_Halti_Chowper_laskettelutakki_naisten_main_720x.webp', '0592602_C80P_ChowperWskianorak_main_720x.webp', '0592602_halti_chowper_skianorak_mood_720x.webp'),
(37, 12, 'ski_w', 'Frostbite Defender Women Pants', 'FrostLine Outfitters', 199000, 8, 12, 'SKI WEAR', 1, '2024-06-18', 0, 0, 1, 10, '0592605_C88_Halti_Carvey_lasketteluhousut_naisten_main_720x.webp', '0592605_C88_CarveyWdxskipants_back_720x.webp', '0592602_0592605_Halti_Carvey_Naisten_Lasketteluhousut_mood_10_720x.webp'),
(38, 2, 'golf_m', 'Pro Performance Polo', 'EagleStrike', 119000, 7, 9, 'GOLF WEAR', 1, '2024-06-18', 1, 1, 0, 0, '743223160605dbbd7a6b1b6c82d5a45c_003.webp', '9266f828339559696aba1ebc2ed13893_001.webp', 'a9ff0df45661bb67cbe0e49bfa5f6b8b_006.webp'),
(39, 2, 'golf_m', 'Pro Performance Pants', 'EagleStrike', 79000, 7, 9, 'GOLF WEAR', 1, '2024-06-18', 1, 1, 0, 0, 'acca6f518cf4c54a664ead2f94d615a6_003.webp', 'd9f43e2fa76ec5a9af4d6da480d3742c_001.webp', '65d0199ff1010023bb5825e0f8588abe_006.webp'),
(40, 2, 'golf_m', 'Champion Golf Shirt', 'PrestigeGolf', 219000, 7, 9, 'GOLF WEAR', 1, '2024-06-18', 1, 1, 1, 20, '25914e144cca1efd90585534b4033615_003.webp', '5cd21ea8bead15ac34b233b27c5fd841_001.webp', '8b1ab7d64c5d87064ea395511573801d_006.webp'),
(41, 2, 'golf_m', 'Champion Golf Pants', 'PrestigeGolf', 169000, 7, 9, 'GOLF WEAR', 1, '2024-06-18', 1, 1, 0, 0, 'a3bd8cf92a14d1b81183247446866da9_003.webp', '8db795a16ea5c3e0adc8e3f918de3d33_001.webp', '9456419e99e6948e629362dbd4838380_006.webp'),
(42, 3, 'golf_w', 'Graceful Swing', 'FairwayMasters', 259000, 8, 9, 'GOLF WEAR', 1, '2024-06-18', 1, 1, 1, 25, 'd0785a1fa808ff33b5b878c03f14aa02_003.webp', '7ed9a3c3b45877d588bfc20e0e921d96_001.webp', '9faebee17de72655a0eb47e9d06f73ad_006.webp'),
(43, 3, 'golf_w', 'Graceful Swing Pants', 'FairwayMasters', 169000, 8, 9, 'GOLF WEAR', 1, '2024-06-18', 1, 1, 0, 0, '6a76f40aa4eb998e43a68e950ea51e23_003.webp', '061911242fac806a632414f979be7a67_001.webp', '8a133a3826eab4cead1e4f2d9ef301ef_006.webp'),
(44, 3, 'golf_w', 'Tour Comfort', 'GreenFairway', 149000, 8, 9, 'GOLF WEAR', 1, '2024-06-18', 1, 1, 0, 0, 'fd44028e4bb2b148b0d7e2da3985fca4_003.webp', 'c17f909358aa6c3e0bee968911f558a4_001.webp', '24059fee09e54e76fbef46c6a758afdf_006.webp'),
(45, 3, 'golf_w', 'Tour Comfort Pants', 'GreenFairway', 119000, 8, 9, 'GOLF WEAR', 1, '2024-06-18', 1, 1, 0, 0, '33888395f1cf79a4bc0daf46c15e9260_003.webp', 'e83adf636455e646e5a109a2bf64e2c9_001.webp', '803ad84dfcb2c29bbef674d916f45b18_006.webp'),
(46, 5, 'swim_m', 'AquaWave Glide', 'AquaWave', 68000, 8, 10, 'SWIM WEAR', 1, '2024-06-18', 0, 0, 1, 5, '009624900_001_xl_4_1.webp', '009624900_004_xl_4_1.webp', '009624900_006_xl_4_1.webp'),
(47, 5, 'swim_m', 'AquaWave Glide Pants', 'AquaWave', 49000, 7, 10, 'SWIM WEAR', 1, '2024-06-18', 0, 0, 1, 5, '007755900_001_xl.webp', '007755900_004_xl.webp', '007755900_006_xl.webp'),
(48, 5, 'swim_m', 'SplashSphere', 'Sphere Comfort Fit', 119000, 7, 10, 'SWIM WEAR', 1, '2024-06-18', 0, 0, 1, 5, 'ftp_m_magentoproduct_photos007534151_001_xl.webp', 'ftp_m_magentoproduct_photos007534151_003_xl.webp', 'ftp_m_magentoproduct_photos007534151_004_xl.webp'),
(49, 5, 'swim_m', 'HydroFlex Streamline', 'SplashSphere', 119000, 7, 10, 'SWIM WEAR', 1, '2024-06-18', 0, 0, 1, 5, 'ftp_m_magentoproduct_photos007152387_001_xl.webp', 'ftp_m_magentoproduct_photos007152387_003_xl.webp', 'ftp_m_magentoproduct_photos007152387_004_xl.webp'),
(50, 6, 'swim_w', 'SeaEssence Racerback', 'SeaEssence', 139000, 8, 10, 'SWIM WEAR', 1, '2024-06-18', 0, 0, 1, 10, 'ftp_m_magentoproduct_photos007537900_001_xl.webp', 'ftp_m_magentoproduct_photos007537900_003_xl.webp', 'ftp_m_magentoproduct_photos007537900_005_xl.webp'),
(51, 6, 'swim_w', 'SeaEssence Racerback Pants', 'SeaEssence', 79000, 8, 10, 'SWIM WEAR', 1, '2024-06-18', 0, 0, 1, 10, 'ftp_m_magentoproduct_photos007538550_001_xl.webp', 'ftp_m_magentoproduct_photos007538550_003_xl.webp', 'ftp_m_magentoproduct_photos007538550_004_xl.webp'),
(52, 6, 'swim_w', 'Elegance', 'CoralWave', 149000, 8, 10, 'SWIM WEAR', 1, '2024-06-18', 0, 0, 1, 10, 'ftp_m_magentoproduct_photos005036711_001_xl.webp', 'ftp_m_magentoproduct_photos005036711_003_xl.webp', 'ftp_m_magentoproduct_photos005036711_004_xl.webp'),
(53, 6, 'swim_w', 'Streamline', 'LunaSplash', 169000, 8, 10, 'SWIM WEAR', 1, '2024-06-18', 0, 0, 1, 10, 'ftp_m_magentoproduct_photos007199550_001_xl.webp', 'ftp_m_magentoproduct_photos007199550_003_xl.webp', 'ftp_m_magentoproduct_photos007199550_005_xl.webp'),
(54, 8, 'tennis_m', 'Performance Polo', 'AceAthlete', 139000, 7, 11, 'TENNIS WEAR', 1, '2024-06-18', 1, 0, 1, 10, 'WM00204411WTA__41e0dd96f4a6c073efcfedf2f9af9f17.webp', 'WM00204411WTA__788c6177b572c8215c06a61c52b12204.webp', 'WM00204411WTA__e72cc96954de5f4c56f7eb3e0b03d2be.webp'),
(55, 8, 'tennis_m', 'Performance Pants', 'AceAthlete', 89000, 7, 11, 'TENNIS WEAR', 1, '2024-06-18', 1, 0, 0, 0, 'WM00048331DBC__dfb4837d754eaf67603aa66cbab645ec.webp', 'WM00048331DBC__367000f914bc1ebf4133794979281618.webp', 'WM00048331DBC__f2b30fed2070e21e68845516bce82b7b.webp'),
(56, 8, 'tennis_m', 'Precision Tennis Tee', 'SmashStyle', 99000, 7, 11, 'TENNIS WEAR', 1, '2024-06-18', 1, 0, 0, 0, 'WM00265411LKC__7604a3e06fa464f07cdbf0d1930d8c83.webp', 'WM00265411LKC__48b8e3e6a6232d5a6680bb27bd4133d4.webp', 'WM00265411LKC__a6bceba9e9ecf15a5c83087e947768fc.webp'),
(57, 8, 'tennis_m', 'Precision Tennis Pants', 'SmashStyle', 59000, 7, 11, 'TENNIS WEAR', 1, '2024-06-18', 1, 0, 0, 0, 'WM00303411DBO__69670ed1a20db07be8ae003b93d70dbd.webp', 'WM00303411DBO__c4ef729a0d2cf89fa2d0e187012bfdab.webp', 'WM00303411DBO__1c7f95d41e69fc2c4778fcfc87dee932.webp'),
(58, 9, 'tennis_w', 'CourtCraft Elite', 'CourtCraft', 139000, 8, 11, 'TENNIS WEAR', 1, '2024-06-18', 1, 0, 1, 10, 'WW00390411WTA__1b8e849234a722abff2163bf46c45e42.webp', 'WW00390411WTA__c21ac3f8c2a7440eb5b371617fcb262b.webp', 'WW00390411WTA__2fdc4220f965749f8a4427fcaf30e99d.webp'),
(59, 9, 'tennis_w', 'CourtCraft Elite Skirt', 'CourtCraft', 89000, 8, 11, 'TENNIS WEAR', 1, '2024-06-18', 1, 0, 0, 0, 'WW00160411WT4__148e97cabf59b96d82ce1ea60d1b2dd9.webp', 'WW00160411WT4__22a308e80e0413f00538cdd6ea229900.webp', 'WW00160411WT4__685518a2d584c2ac078a3c3b36a3cae9.webp'),
(60, 9, 'tennis_w', 'Coral Performance', 'NetMasters', 179000, 8, 11, 'TENNIS WEAR', 1, '2024-06-18', 1, 0, 1, 15, 'WW00014331DBC__4d10b10874a6c416c86e2b819c3db9cc.webp', 'WW00014331DBC__331205197bb11cb4f0670b1a7d9d5ace.webp', 'WW00014331DBC__522980834dc1fd495f6fafb31877af29.webp'),
(61, 9, 'tennis_w', 'Coral Performance Skirt', 'NetMastersv', 89000, 8, 11, 'TENNIS WEAR', 1, '2024-06-18', 1, 0, 0, 0, 'WW00160331BKA__2b011aa020300d0171c7fd2f82895677.webp', 'WW00160331BKA__3cb867fa7ba1656c0a6d6326b0dbe110.webp', 'WW00160331BKA__7a3974f18d1d4af54fca31660f0029a9.webp');

-- --------------------------------------------------------

--
-- 테이블 구조 `sj`
--

CREATE TABLE `sj` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `kor` int(11) DEFAULT NULL,
  `eng` int(11) DEFAULT NULL,
  `mat` int(11) DEFAULT NULL,
  `hap` int(11) DEFAULT NULL,
  `avg` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `sj`
--

INSERT INTO `sj` (`id`, `name`, `kor`, `eng`, `mat`, `hap`, `avg`) VALUES
(1, '홍길동', 90, 86, 92, 268, 89.3),
(2, '전미재', 80, 83, 95, 258, 86),
(3, '김양호', 86, 91, 86, 263, 87.7),
(4, '문성진', 90, 87, 69, 246, 82),
(5, '김자완', 95, 86, 93, 274, 91.3),
(6, '오당식', 95, 84, 95, 274, 91.3),
(7, '조성훈', 92, 86, 95, 273, 91),
(8, '박장우', 84, 83, 85, 252, 84),
(9, '지송범', 80, 83, 84, 247, 82.3),
(10, '최미도', 75, 80, 86, 241, 80.3),
(11, '송국영', 84, 84, 95, 263, 87.7),
(12, '염진범', 80, 84, 90, 254, 84.7),
(13, '정아아', 75, 80, 75, 230, 76.7),
(14, '이고석', 79, 82, 83, 244, 81.3),
(15, '심안혜', 83, 83, 89, 255, 85),
(16, '김상민', 85, 85, 91, 261, 87),
(17, '박명수', 93, 83, 95, 271, 90.3),
(18, '김유관', 90, 83, 93, 266, 88.7),
(19, '진수나', 90, 83, 95, 268, 89.3),
(20, '윤정경', 75, 80, 77, 232, 77.3),
(21, '안현철', 82, 82, 87, 251, 83.7),
(22, '민종조', 91, 88, 95, 274, 91.3),
(23, '원우철', 83, 81, 85, 249, 83),
(24, '박규수', 75, 80, 62, 217, 72.3),
(25, '이세철', 80, 83, 87, 250, 83.3),
(26, '곽참만', 82, 83, 89, 254, 84.7),
(27, '한양희', 79, 83, 80, 242, 80.7),
(28, '구박영', 93, 85, 95, 273, 91),
(29, '김사형', 81, 82, 74, 237, 79),
(30, '이상민', 82, 82, 91, 255, 85),
(31, '강안기', 90, 87, 95, 272, 90.7),
(32, '김장혜', 82, 81, 90, 253, 84.3),
(33, '김정철', 82, 83, 93, 258, 86),
(34, '유요림', 94, 86, 76, 256, 85.3),
(35, '박미기', 90, 84, 95, 269, 89.7),
(36, '김양두', 75, 80, 83, 238, 79.3),
(37, '박상진', 84, 83, 91, 258, 86),
(38, '현잔철', 80, 83, 76, 239, 79.7),
(39, '김진기', 75, 80, 66, 221, 73.7),
(40, '도하진', 93, 84, 95, 272, 90.7),
(41, '윤양국', 80, 82, 70, 232, 77.3),
(42, '김장섭', 80, 82, 91, 253, 84.3),
(43, '구기민', 82, 83, 95, 260, 86.7),
(44, '홍자원', 84, 84, 93, 261, 87),
(45, '오정혜', 92, 83, 87, 262, 87.3),
(46, '김다성', 90, 91, 93, 274, 91.3),
(47, '박정훈', 88, 90, 69, 247, 82.3),
(48, '김오정', 86, 83, 95, 264, 88),
(49, '박청진', 97, 89, 95, 281, 93.7),
(50, '양강현', 90, 85, 79, 254, 84.7),
(54, 'abcd', 22, 33, 44, 99, 33),
(55, 'test', 70, 70, 50, 190, 63.3);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `jumun`
--
ALTER TABLE `jumun`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `jumuns`
--
ALTER TABLE `jumuns`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `juso`
--
ALTER TABLE `juso`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `opt`
--
ALTER TABLE `opt`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `opts`
--
ALTER TABLE `opts`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `sj`
--
ALTER TABLE `sj`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `jumuns`
--
ALTER TABLE `jumuns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- 테이블의 AUTO_INCREMENT `juso`
--
ALTER TABLE `juso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- 테이블의 AUTO_INCREMENT `opt`
--
ALTER TABLE `opt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 테이블의 AUTO_INCREMENT `opts`
--
ALTER TABLE `opts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- 테이블의 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- 테이블의 AUTO_INCREMENT `sj`
--
ALTER TABLE `sj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
