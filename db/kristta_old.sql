-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Jan-2024 às 23:28
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `kristta_old`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `certificates`
--

CREATE TABLE `certificates` (
  `CERT_ID` int(10) UNSIGNED NOT NULL,
  `CERT_CURSE` int(11) NOT NULL,
  `CERT_DIRECTORY` text NOT NULL,
  `CERT_REG_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  `CERT_COMPANY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

CREATE TABLE `clients` (
  `ID` int(10) UNSIGNED NOT NULL,
  `CLIENT_PASSWORD` text NOT NULL,
  `CLIENT_REG_DATA` timestamp NULL DEFAULT current_timestamp(),
  `CLIENT_CLASS` int(12) NOT NULL,
  `CLIENT_MONEY` double DEFAULT NULL,
  `CLIENT_FIRST_NAME` text NOT NULL,
  `CLIENT_LAST_NAME` text NOT NULL,
  `CLIENT_CPF` text DEFAULT NULL,
  `CLIENT_CNPJ` text DEFAULT NULL,
  `CLIENT_COMPANY_ID` int(11) NOT NULL,
  `CLIENT_ACTIVE` tinyint(1) NOT NULL,
  `CLIENT_REG_USER` int(11) NOT NULL,
  `CLIENT_ADDRESS` text DEFAULT NULL,
  `CLIENT_CITY` text DEFAULT NULL,
  `CLIENT_STATE` text DEFAULT NULL,
  `CLIENT_CEP` text NOT NULL,
  `CLIENT_COMPLEMENT` text NOT NULL,
  `CLIENT_COUNTRY` text NOT NULL,
  `CLIENT_SITUATION` int(11) NOT NULL,
  `CLIENT_PLAN` int(11) NOT NULL,
  `CLIENT_EMAIL` text NOT NULL,
  `CLIENT_PHONE` text NOT NULL,
  `CLIENT_WPP` text NOT NULL,
  `CLIENT_DIR` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `companies`
--

CREATE TABLE `companies` (
  `COMP_ID` int(10) UNSIGNED NOT NULL,
  `COMP_NAME` text NOT NULL,
  `COMP_FANTASY_NAME` text NOT NULL,
  `COMP_CNPJ` varchar(64) NOT NULL,
  `COMP_EMAIL` text NOT NULL,
  `COMP_CONTACT` varchar(64) NOT NULL,
  `COMP_ADDRESS` text NOT NULL,
  `COMP_NEIGHBORHOOD` text NOT NULL,
  `COMP_CITY` text NOT NULL,
  `COMP_STATE` text NOT NULL,
  `COMP_COUNTRY` text NOT NULL,
  `COMP_RESPONSIBLE_ID` varchar(64) NOT NULL,
  `COMP_REG_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  `COMP_ACTIVE` int(11) NOT NULL,
  `COMP_SITUATION` int(11) NOT NULL,
  `COMP_DIR` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `companies_plans`
--

CREATE TABLE `companies_plans` (
  `CP_ID` int(10) UNSIGNED NOT NULL,
  `CP_CLIENT_ID` int(11) NOT NULL DEFAULT 0,
  `CP_PLAN_ID` int(11) NOT NULL DEFAULT 0,
  `CP_ACTIVE` int(11) DEFAULT 0,
  `CP_DISCOUNT` float NOT NULL DEFAULT 0,
  `CP_DISCOUNT_PERCENT` float NOT NULL DEFAULT 0,
  `CP_VALUE` float DEFAULT NULL,
  `CP_REG_DATE` date NOT NULL DEFAULT current_timestamp(),
  `CP_END_DATE` text DEFAULT NULL,
  `CP_MESSAGE` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contact_request`
--

CREATE TABLE `contact_request` (
  `CLIENT_ID` int(10) UNSIGNED NOT NULL,
  `CLIENT_NAME` text NOT NULL,
  `CLIENT_EMAIL` text NOT NULL,
  `CLIENT_NUMBER` text NOT NULL,
  `REG_DATE` date NOT NULL DEFAULT current_timestamp(),
  `REG_HOUR` time NOT NULL DEFAULT current_timestamp(),
  `ID_USER_RETURN` int(11) DEFAULT NULL,
  `RETURNED_IN` text DEFAULT NULL,
  `COMMENT` text DEFAULT NULL,
  `WHATSAPP` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contracts`
--

CREATE TABLE `contracts` (
  `CONTRACT_ID` int(11) UNSIGNED NOT NULL,
  `CONTRACT_NAME` text NOT NULL,
  `CONTRACT_COMPANY` int(11) NOT NULL,
  `CONTRACT_DIRECTORY` text NOT NULL,
  `CONTRACT_REG_DATE` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `default_password`
--

CREATE TABLE `default_password` (
  `DEF_PASS_ID` int(10) UNSIGNED NOT NULL,
  `DEF_PASS_STRING` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `files`
--

CREATE TABLE `files` (
  `FILES_ID` int(10) UNSIGNED NOT NULL,
  `FILES_COMPANY` int(64) NOT NULL,
  `FILES_DIRECTORY` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `invoice`
--

CREATE TABLE `invoice` (
  `INV_ID` int(10) UNSIGNED NOT NULL,
  `INV_COMPANY` int(11) NOT NULL,
  `INV_VALIDATE` text NOT NULL,
  `INV_STATUS` text NOT NULL,
  `INV_VALUE` text NOT NULL,
  `INV_DIRECTORY` text NOT NULL,
  `INV_REGDATE` datetime NOT NULL DEFAULT current_timestamp(),
  `INV_INVOICING` text NOT NULL,
  `INV_PAYMENT_DATE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `krt_finance`
--

CREATE TABLE `krt_finance` (
  `KRT_ID` int(10) UNSIGNED NOT NULL,
  `KRT_OBS` text NOT NULL,
  `KRT_REF_FAT` text NOT NULL,
  `KRT_COMPANY` int(11) NOT NULL,
  `KRT_RECEIVED` float NOT NULL,
  `KRT_BACK` float NOT NULL,
  `KRT_REG_DATE` date NOT NULL DEFAULT current_timestamp(),
  `KRT_YEAR` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `plans`
--

CREATE TABLE `plans` (
  `PLAN_ID` int(64) UNSIGNED NOT NULL,
  `PLAN_NAME` varchar(64) NOT NULL,
  `PLAN_VALUE` float NOT NULL DEFAULT 0,
  `PLAN_COMPONENTS` text NOT NULL,
  `PLAN_MONTHLY` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `positions`
--

CREATE TABLE `positions` (
  `POS_ID` int(10) UNSIGNED NOT NULL,
  `POS_NAME` text NOT NULL,
  `POS_OBS` text NOT NULL,
  `POS_SHOW` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `requests`
--

CREATE TABLE `requests` (
  `REQ_ID` int(64) UNSIGNED NOT NULL,
  `REQ_CLIENT` int(11) NOT NULL,
  `REQ_COMPANY` int(64) NOT NULL,
  `REQ_TYPE` int(64) NOT NULL,
  `REQ_MESSAGE` text NOT NULL,
  `REQ_URGENCY` int(11) NOT NULL,
  `REQ_INVOICING` text NOT NULL,
  `REQ_VALUE` float NOT NULL DEFAULT 0,
  `REQ_PAYMENT_STATUS` int(11) NOT NULL,
  `REQ_REG_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  `REQ_USER` int(64) NOT NULL DEFAULT 0,
  `REQ_STATUS` int(11) NOT NULL DEFAULT 1,
  `REQ_START_DATE` text NOT NULL,
  `REQ_END_DATE` date DEFAULT NULL,
  `REQ_REFERENCE` text NOT NULL,
  `REQ_VALUE_REPASS` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `request_types`
--

CREATE TABLE `request_types` (
  `TYPE_ID` int(10) UNSIGNED NOT NULL,
  `TYPE_NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situation`
--

CREATE TABLE `situation` (
  `SIT_ID` int(10) UNSIGNED NOT NULL,
  `SIT_NAME` text NOT NULL,
  `SIT_MESSAGE` text NOT NULL,
  `SIT_REG_DATE` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `statuscontract`
--

CREATE TABLE `statuscontract` (
  `STATUS_ID` int(64) UNSIGNED NOT NULL,
  `STATUS_NAME` text NOT NULL,
  `STATUS_REG_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  `STAUTS_USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_type`
--

CREATE TABLE `status_type` (
  `STATUS_TYPE_ID` int(10) UNSIGNED NOT NULL,
  `STATUS_TYPE_NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `STAFF_ID` int(255) UNSIGNED NOT NULL,
  `STAFF_USER` text NOT NULL,
  `STAFF_PASSWORD` varchar(255) NOT NULL,
  `STAFF_FIRST_NAME` text NOT NULL,
  `STAFF_LAST_NAME` text NOT NULL,
  `STAFF_CPF` text NOT NULL,
  `STAFF_RG` text NOT NULL,
  `STAFF_BIRTH` text NOT NULL,
  `STAFF_IDCARGO` int(15) NOT NULL,
  `STAFF_EMAIL` varchar(64) NOT NULL,
  `STAFF_REG_DATE` timestamp NULL DEFAULT current_timestamp(),
  `STAFF_LAST_LOGIN` datetime NOT NULL DEFAULT current_timestamp(),
  `STAFF_USER_AUTH` int(11) NOT NULL DEFAULT 3,
  `STAFF_MONEY` float NOT NULL DEFAULT 0,
  `STAFF_PIX_KEY` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `workflow`
--

CREATE TABLE `workflow` (
  `REG_ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `CASE_REGISTER` varchar(255) NOT NULL,
  `STATUS_SERVICE` int(11) NOT NULL,
  `REG_DATE_DSC` datetime NOT NULL DEFAULT current_timestamp(),
  `USER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`CERT_ID`);

--
-- Índices para tabela `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`COMP_ID`);

--
-- Índices para tabela `companies_plans`
--
ALTER TABLE `companies_plans`
  ADD PRIMARY KEY (`CP_ID`);

--
-- Índices para tabela `contact_request`
--
ALTER TABLE `contact_request`
  ADD PRIMARY KEY (`CLIENT_ID`);

--
-- Índices para tabela `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`CONTRACT_ID`);

--
-- Índices para tabela `default_password`
--
ALTER TABLE `default_password`
  ADD PRIMARY KEY (`DEF_PASS_ID`);

--
-- Índices para tabela `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`FILES_ID`);

--
-- Índices para tabela `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`INV_ID`);

--
-- Índices para tabela `krt_finance`
--
ALTER TABLE `krt_finance`
  ADD PRIMARY KEY (`KRT_ID`);

--
-- Índices para tabela `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`PLAN_ID`);

--
-- Índices para tabela `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`POS_ID`);

--
-- Índices para tabela `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`REQ_ID`);

--
-- Índices para tabela `request_types`
--
ALTER TABLE `request_types`
  ADD PRIMARY KEY (`TYPE_ID`);

--
-- Índices para tabela `situation`
--
ALTER TABLE `situation`
  ADD PRIMARY KEY (`SIT_ID`);

--
-- Índices para tabela `statuscontract`
--
ALTER TABLE `statuscontract`
  ADD PRIMARY KEY (`STATUS_ID`);

--
-- Índices para tabela `status_type`
--
ALTER TABLE `status_type`
  ADD PRIMARY KEY (`STATUS_TYPE_ID`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`STAFF_ID`);

--
-- Índices para tabela `workflow`
--
ALTER TABLE `workflow`
  ADD PRIMARY KEY (`REG_ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `certificates`
--
ALTER TABLE `certificates`
  MODIFY `CERT_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `clients`
--
ALTER TABLE `clients`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `companies`
--
ALTER TABLE `companies`
  MODIFY `COMP_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `companies_plans`
--
ALTER TABLE `companies_plans`
  MODIFY `CP_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `contact_request`
--
ALTER TABLE `contact_request`
  MODIFY `CLIENT_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `contracts`
--
ALTER TABLE `contracts`
  MODIFY `CONTRACT_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `default_password`
--
ALTER TABLE `default_password`
  MODIFY `DEF_PASS_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `files`
--
ALTER TABLE `files`
  MODIFY `FILES_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `invoice`
--
ALTER TABLE `invoice`
  MODIFY `INV_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `krt_finance`
--
ALTER TABLE `krt_finance`
  MODIFY `KRT_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `plans`
--
ALTER TABLE `plans`
  MODIFY `PLAN_ID` int(64) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de tabela `positions`
--
ALTER TABLE `positions`
  MODIFY `POS_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `requests`
--
ALTER TABLE `requests`
  MODIFY `REQ_ID` int(64) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `request_types`
--
ALTER TABLE `request_types`
  MODIFY `TYPE_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `situation`
--
ALTER TABLE `situation`
  MODIFY `SIT_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `statuscontract`
--
ALTER TABLE `statuscontract`
  MODIFY `STATUS_ID` int(64) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `status_type`
--
ALTER TABLE `status_type`
  MODIFY `STATUS_TYPE_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `STAFF_ID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `workflow`
--
ALTER TABLE `workflow`
  MODIFY `REG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
