-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Versão:              11.1.0.6116
-- --------------------------------------------------------
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET NAMES utf8 */
;
/*!50503 SET NAMES utf8mb4 */
;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;
-- Dumping database structure for php_store
CREATE DATABASE IF NOT EXISTS `php_store`
/*!40100 DEFAULT CHARACTER SET utf8mb4 */
;
USE `php_store`;
-- Dumping structure for table php_store.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(250) DEFAULT NULL,
  `nome_completo` varchar(250) DEFAULT NULL,
  `morada` varchar(250) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `purl` varchar(50) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8mb4;
-- Dumping data for table php_store.clientes: ~0 rows (approximately)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */
;
INSERT INTO `clientes` (
    `id_cliente`,
    `email`,
    `senha`,
    `nome_completo`,
    `morada`,
    `cidade`,
    `telefone`,
    `purl`,
    `activo`,
    `created_at`,
    `updated_at`,
    `deleted_at`
  )
VALUES (
    1,
    'sys4soft.phpstore@gmail.com',
    '$2y$10$3ILEUzQ2t5grnF1VUBrZieHyDxB3slbPmhVsjsGBCIXhBcEU4HVOa',
    'Joao ribeiro',
    'morada do cliente',
    'cidade do cliente',
    '',
    NULL,
    1,
    '2021-01-30 17:31:06',
    '2021-01-30 17:31:15',
    NULL
  );
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */
;
-- Dumping structure for table php_store.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) DEFAULT NULL,
  `nome_produto` varchar(50) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  `preco` decimal(6, 2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `visivel` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE = InnoDB AUTO_INCREMENT = 12 DEFAULT CHARSET = utf8mb4;
-- Dumping data for table php_store.produtos: ~9 rows (approximately)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */
;
INSERT INTO `produtos` (
    `id_produto`,
    `categoria`,
    `nome_produto`,
    `descricao`,
    `imagem`,
    `preco`,
    `stock`,
    `visivel`,
    `created_at`,
    `updated_at`,
    `deleted_at`
  )
VALUES (
    1,
    'homem',
    'Tshirt Vermelha',
    'Ab laborum, commodi aspernatur, quas distinctio cum quae omnis autem ea, odit sint quisquam similique! Labore aliquam amet veniam ad fugiat optio.',
    'tshirt_vermelha.png',
    45.70,
    100,
    1,
    '2021-02-06 19:45:18',
    '2021-02-06 19:45:25',
    NULL
  ),
  (
    2,
    'homem',
    'Tshirt Azul',
    'Possimus iusto esse atque autem rem, porro officiis sapiente quos velit laboriosam id expedita odio obcaecati voluptate repudiandae dignissimos eveniet repellat blanditiis.',
    'tshirt_azul.png',
    55.25,
    100,
    1,
    '2021-02-06 19:45:19',
    '2021-02-06 19:45:25',
    NULL
  ),
  (
    3,
    'homem',
    'Tshirt Verde',
    'Nostrum quisquam dolorum dolor autem accusamus fugit nesciunt, atque et? Quis eum nemo quidem officia cum dolorem voluptates! Autem, earum. Similique, fugit.',
    'tshirt_verde.png',
    35.15,
    0,
    1,
    '2021-02-06 19:45:20',
    '2021-02-06 19:45:26',
    NULL
  ),
  (
    4,
    'homem',
    'Tshirt Amarela',
    'Molestiae quaerat distinctio, facere perferendis necessitatibus optio repellat alias commodi voluptatem velit corrupti natus exercitationem quos amet facilis sint nulla delectus.',
    'tshirt_amarela.png',
    32.00,
    100,
    1,
    '2021-02-06 19:45:20',
    '2021-02-06 19:45:27',
    NULL
  ),
  (
    5,
    'mulher',
    'Vestido Vermelho',
    'Labore voluptatem sed in distinctio iste tempora quo assumenda impedit illo soluta repudiandae animi earum suscipit, sequi excepturi inventore magnam velit voluptatibus.',
    'dress_vermelho.png',
    75.20,
    100,
    1,
    '2021-02-06 19:45:21',
    '2021-02-06 19:45:27',
    NULL
  ),
  (
    6,
    'mulher',
    'Vertido Azul',
    'Provident ipsum earum magnam odit in, illum nostrum est illo pariatur molestias esse delectus aliquam ullam maxime mollitia tempore, sunt officia suscipit.',
    'dress_azul.png',
    86.00,
    100,
    1,
    '2021-02-06 19:45:21',
    '2021-02-06 19:45:28',
    NULL
  ),
  (
    7,
    'mulher',
    'Vestido Verde',
    'Qui aliquid sed quisquam autem quas recusandae labore neque laudantium iusto modi repudiandae doloremque ipsam ad omnis inventore, cum ducimus praesentium. Consectetur!',
    'dress_verde.png',
    48.85,
    100,
    1,
    '2021-02-06 19:45:22',
    '2021-02-06 19:45:28',
    NULL
  ),
  (
    8,
    'mulher',
    'Vestido Amarelo',
    'Aspernatur labore corporis modi quis temporibus eos hic? Sed fugiat, repudiandae distinctio, labore temporibus, non magni consectetur dolorum earum amet impedit nesciunt.',
    'dress_amarelo.png',
    46.45,
    100,
    1,
    '2021-02-06 19:45:22',
    '2021-02-06 19:45:29',
    NULL
  ),
  (
    11,
    'roupa_criança',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL
  );
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */
;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */
;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */
;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
;