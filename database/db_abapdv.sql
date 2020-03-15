-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Mar-2020 às 17:39
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_abapdv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imposto` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `imposto`, `created_at`, `updated_at`) VALUES
(1, 'Higiene', 5.00, '2020-03-13 02:49:36', '2020-03-13 02:49:36'),
(2, 'Calçados', 10.00, '2020-03-13 02:49:36', '2020-03-13 02:49:36'),
(3, 'Alimentação', 15.00, '2020-03-13 02:49:36', '2020-03-13 02:49:36'),
(4, 'Limpeza', 20.00, '2020-03-13 02:49:36', '2020-03-13 02:49:36'),
(5, 'Vestuário', 25.00, '2020-03-13 02:49:36', '2020-03-13 02:49:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2020_03_12_213011_create_categorias_table', 1),
(10, '2020_03_12_213055_create_produtos_table', 1),
(11, '2020_03_12_213338_create_vendas_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` double(8,2) NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `categoria_id`, `created_at`, `updated_at`) VALUES
(1, 'Produto 1', 15.00, 1, '2020-03-13 03:23:55', '2020-03-13 03:23:55'),
(2, 'Produto 2', 30.00, 2, '2020-03-13 03:23:55', '2020-03-13 03:23:55'),
(3, 'Produto 3', 45.00, 3, '2020-03-13 03:23:55', '2020-03-13 03:23:55'),
(4, 'Produto 4', 60.00, 4, '2020-03-13 03:23:55', '2020-03-13 03:23:55'),
(5, 'Produto 5', 75.00, 5, '2020-03-13 03:23:55', '2020-03-13 03:23:55'),
(6, 'Produto 101', 10.00, 1, '2020-03-13 03:23:55', '2020-03-13 03:23:55'),
(7, 'Produto 102', 20.00, 2, '2020-03-13 03:23:55', '2020-03-13 03:23:55'),
(8, 'Produto 103', 30.00, 3, '2020-03-13 03:23:55', '2020-03-13 03:23:55'),
(9, 'Produto 104', 40.00, 4, '2020-03-13 03:23:55', '2020-03-13 03:23:55'),
(10, 'Produto 105', 50.00, 5, '2020-03-13 03:23:55', '2020-03-13 03:23:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(10) UNSIGNED NOT NULL,
  `carrinho` int(11) NOT NULL,
  `produto_id` int(10) UNSIGNED NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` double(8,2) NOT NULL,
  `imposto` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `carrinho`, `produto_id`, `quantidade`, `preco`, `imposto`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 2, 10.00, 5.00, '2020-03-15 14:33:24', '2020-03-15 14:33:24'),
(2, 1, 7, 4, 20.00, 10.00, '2020-03-15 14:33:24', '2020-03-15 14:33:24'),
(3, 1, 8, 6, 30.00, 15.00, '2020-03-15 14:33:24', '2020-03-15 14:33:24'),
(4, 1, 9, 8, 40.00, 20.00, '2020-03-15 14:33:24', '2020-03-15 14:33:24'),
(5, 1, 10, 10, 50.00, 25.00, '2020-03-15 14:33:24', '2020-03-15 14:33:24'),
(6, 2, 6, 2, 10.00, 5.00, '2020-03-15 14:33:40', '2020-03-15 14:33:40'),
(7, 2, 7, 4, 20.00, 10.00, '2020-03-15 14:33:40', '2020-03-15 14:33:40'),
(8, 2, 8, 6, 30.00, 15.00, '2020-03-15 14:33:40', '2020-03-15 14:33:40'),
(9, 2, 9, 8, 40.00, 20.00, '2020-03-15 14:33:40', '2020-03-15 14:33:40'),
(10, 2, 10, 10, 50.00, 25.00, '2020-03-15 14:33:40', '2020-03-15 14:33:40'),
(11, 4, 6, 2, 10.00, 5.00, '2020-03-15 14:38:00', '2020-03-15 14:38:00'),
(12, 4, 7, 4, 20.00, 10.00, '2020-03-15 14:38:00', '2020-03-15 14:38:00'),
(13, 4, 8, 6, 30.00, 15.00, '2020-03-15 14:38:00', '2020-03-15 14:38:00'),
(14, 4, 9, 8, 40.00, 20.00, '2020-03-15 14:38:00', '2020-03-15 14:38:00'),
(15, 4, 10, 10, 50.00, 25.00, '2020-03-15 14:38:00', '2020-03-15 14:38:00'),
(16, 5, 7, 4, 20.00, 10.00, '2020-03-15 17:33:20', '2020-03-15 17:33:20'),
(17, 5, 9, 8, 40.00, 20.00, '2020-03-15 17:33:20', '2020-03-15 17:33:20'),
(18, 5, 10, 10, 50.00, 25.00, '2020-03-15 17:33:20', '2020-03-15 17:33:20'),
(19, 6, 7, 4, 20.00, 10.00, '2020-03-15 17:33:32', '2020-03-15 17:33:32'),
(20, 6, 9, 8, 40.00, 20.00, '2020-03-15 17:33:32', '2020-03-15 17:33:32'),
(21, 6, 10, 10, 50.00, 25.00, '2020-03-15 17:33:32', '2020-03-15 17:33:32'),
(22, 7, 6, 2, 10.00, 5.00, '2020-03-15 18:41:37', '2020-03-15 18:41:37'),
(23, 7, 7, 4, 20.00, 10.00, '2020-03-15 18:41:37', '2020-03-15 18:41:37'),
(24, 7, 8, 6, 30.00, 15.00, '2020-03-15 18:41:37', '2020-03-15 18:41:37'),
(25, 7, 9, 8, 40.00, 20.00, '2020-03-15 18:41:37', '2020-03-15 18:41:37'),
(26, 7, 10, 10, 50.00, 25.00, '2020-03-15 18:41:37', '2020-03-15 18:41:37'),
(27, 8, 9, 13, 40.00, 20.00, '2020-03-15 19:19:07', '2020-03-15 19:19:07');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produtos_categoria_id_foreign` (`categoria_id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendas_produto_id_foreign` (`produto_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
