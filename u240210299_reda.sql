-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 03/05/2019 às 17:17
-- Versão do servidor: 5.7.24-0ubuntu0.18.04.1
-- Versão do PHP: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u240210299_reda`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `ano_entrada` varchar(4) NOT NULL,
  `recupera` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `email`, `senha`, `id_turma`, `ano_entrada`, `recupera`) VALUES
(13, 'Thaís Alves Fagundes', 'tataalvesfagundes@hotmail.com', '246e4a55c1728eee0f266512e71641a5d9a39de4', 6, '2016', NULL),
(15, 'Luan Sousa Reis', 'emaildoluanreis@gmail.com', 'e6c810520b62c9ca416e8ebdb4a789319f87e052', 6, '2015', NULL),
(16, 'Isabela Santos de Souza', 'isabelasantoss001@gmail.com', '4d52360f0dd44fb9abe07d426b7456c6afcfc0c5', 6, '2016', NULL),
(18, 'Jeverson Gonçalves', 'jeversontp@gmail.com', 'ea3a56c6a1f0272ec675c598699add1d43e4cf12', 6, '2016', 0),
(19, 'Luana Calili Goffi Romeiro', 'luanacalili86@gmail.com', '4a62e2691dfb61233d4c24fb29b31353fdc9b1f7', 6, '2016', NULL),
(20, 'Rafaela Costa Alves', 'rafaela.costa.alves01@gmail.com', 'd2ae60c80c84c7531874a17f892fdce1a3c32f4f', 6, '2016', NULL),
(21, 'Debora Nuccini Maciente', 'deboranuccini@outlook.com', 'dbde1fe32d2ecbab4a67a19d0aa7e8aa7c73595b', 15, '2016', NULL),
(22, 'Igor Gregori S. Carlos', 'igorgcefet@gmail.com', 'efb348c5ade1b4f8bebb614bdf669dbe3cee5caa', 6, '2016', NULL),
(23, 'Rayane Soares de Almeida', 'rayanesalmeida620@gmail.com', '2049e501d27f56e78012b3afa887142d7fb747d3', 6, '2016', NULL),
(24, 'Igor Marques Costa Bacellar', 'igormbacellar@gmail.com', '642cfc21dbfcf1b9d34d3a82fa0b32581b694c89', 6, '2016', NULL),
(25, 'Rebeca de Souza', 'rebecadsouza128@gmail.com', '5519b76923ba33a76c31eb1e2d5439131fbc01fd', 6, '2016', NULL),
(26, 'Thalita Maria de Souza Teixeira', 'thalitamaria62@gmail.com', 'b8cd39e30f4c3364dffd151a55096e8f25507acd', 6, '2016', NULL),
(27, 'Thiago Silva Machado', 'machadothiago084@gmail.com', 'c54b688990ce13b57b063ffc181f0938095d0f85', 6, '2018', NULL),
(28, 'Mariana Vianini Brito', 'marivianini7@gmail.com', '3decd49a6c6dce88c16a85b9a8e42b51aa36f1e2', 6, '2015', NULL),
(29, 'Gabriela de Moura Camargo', 'gamoura9@yahoo.com.br', '9c97394e5314c2877d3d650201c216058e9888e3', 6, '2016', NULL),
(30, 'Melissa Azevedo Vicente', 'mell-azevedo@outlook.com', 'ae69574790166f9e45f544a95f8b35e6b54ec3de', 6, '2016', NULL),
(31, 'Júlia Lopes Olivier', 'julialopesoliviercefet@gmail.com', '3963fb8f2811ea7e0cb6e8cec892a15226eda61b', 6, '2016', NULL),
(32, 'Larissa Dionísio Ferrari', 'larissadferrari@outlook.com', '91e58828a08fb412ea4bd39f3c55a90be2dc5f15', 6, '2016', NULL),
(33, 'Diego Henrique Amaral Rodrigues', 'amaralrodriguesd@gmail.com', '3c363836cf4e16666669a25da280a1865c2d2874', 15, '2016', NULL),
(35, 'Matheus José Françoso Goulart Maiolini', 'matheus.jose507@gmail.com', '1f6b75977dd77300e556b50737c3dafec12ba49e', 6, '2015', NULL),
(36, ' Ruan Gustavo Abreu', 'ruangabreu@gmail.com', '1ac66d8e53025160d210d3773739efcc64f123f4', 6, '2015', NULL),
(38, 'Gabriel Aluno', 'gabriel2018@gmail.com', 'cff7a9d87e2a96c4ceaae3a413d5644a2eaeb43b', 6, '2016', NULL),
(39, 'Henrique Manoel Vasconcelos Maciel', 'hmanoel47@gmail.com', '27d5482eebd075de44389774fce28c69f45c8a75', 6, '2018', 531926),
(41, 'Isaac Bernardes Marques', 'ibernardesmarques@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 6, '2016', NULL),
(42, 'Natália de Oliveira Caldeira', 'natycaldeira551@gmail.com', '5b3e21e1ff50960614f57cc5f87b35b005caef89', 15, '2018', NULL),
(43, 'Marcelly Faustino de Souza', 'marcellyfaustino@gmail.com', '42b5bf53605aebc4a7624445a00d16ca206e2cca', 15, '2018', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `caminho` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `arquivos`
--

INSERT INTO `arquivos` (`id`, `id_genero`, `caminho`, `tipo`) VALUES
(1, 9, 'download_esquemas/CONTO.pdf', 1),
(2, 9, 'download_exemplos/CONTO.pdf', 0),
(3, 13, 'download_exemplos/NOTICIA.pdf', 0),
(4, 13, 'download_esquemas/NOTICIA.pdf', 1),
(11, 15, 'download_esquemas/APOLOGO.pdf\r\n', 1),
(12, 15, 'download_exemplos/APOLOGO.pdf\r\n', 0),
(18, 14, 'download_exemplos/ARTIGO_DE_OPINIAO.pdf', 0),
(19, 14, 'download_esquemas/ARTIGO_DE_OPINIAO.pdf', 1),
(20, 16, 'download_exemplos/COMENTARIO.pdf', 0),
(21, 16, 'download_esquemas/COMENTARIO.pdf', 1),
(22, 26, 'download_exemplos/SINOPSE.pdf', 0),
(23, 26, 'download_esquemas/SINOPSE.pdf', 1),
(24, 25, 'download_exemplos/RESUMO.pdf', 0),
(25, 25, 'download_esquemas/RESUMO.pdf', 1),
(26, 24, 'download_exemplos/REPORTAGEM.pdf', 0),
(27, 24, 'download_esquemas/REPORTAGEM.pdf', 1),
(28, 23, 'download_exemplos/RELATORIO.pdf', 0),
(29, 23, 'download_esquemas/RELATORIO.pdf', 1),
(30, 22, 'download_exemplos/RELATO.pdf', 0),
(31, 22, 'download_esquemas/RELATO.pdf', 1),
(32, 21, 'download_exemplos/MANUAL.pdf', 0),
(33, 21, 'download_esquemas/MANUAL.pdf', 1),
(34, 20, 'download_exemplos/FABULA.pdf', 0),
(35, 20, 'download_esquemas/FABULA.pdf', 1),
(36, 19, 'download_exemplos/EDITORIAL.pdf', 0),
(37, 19, 'download_esquemas/EDITORIAL.pdf', 1),
(38, 18, 'download_exemplos/DISSERTAÇÃO.pdf', 0),
(39, 18, 'download_esquemas/DISSERTAÇÃO.pdf', 1),
(40, 17, 'download_exemplos/CRONICA.pdf', 0),
(41, 17, 'download_esquemas/CRONICA.pdf', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `atividade`
--

CREATE TABLE `atividade` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `data_limite` datetime NOT NULL,
  `bimestre` enum('1','2','3','4') NOT NULL,
  `valor` float NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `atividade`
--

INSERT INTO `atividade` (`id`, `nome`, `descricao`, `data_limite`, `bimestre`, `valor`, `id_genero`, `id_tipo`, `id_turma`) VALUES
(13, 'Teste 2', '<p>tewasdasd</p>', '2018-12-13 00:00:00', '4', 10, 26, 4, 6),
(14, 'Atividade nº 1', '<p>Atividade para testar notas e Corre&ccedil;&otilde;es:</p>', '2018-12-15 00:00:00', '4', 10, 8, 1, 15),
(18, 'asdasdasd', '<p>asdasdasdasdassd</p>', '2018-12-13 00:00:00', '4', 12, 8, 2, 6),
(19, 'teste', '<p>asdasd</p>', '2018-12-13 00:00:00', '1', 10, 10, 2, 6),
(20, 'Teste de uso do sistema DIGGITTUS para alunas do BIC-Jr 2019', '<p>Redigir uma carta argmentativa, sensibilizando pais e educadores sobre o uso de tecnologia aliada ao exerc&iacute;cio motor da escrita de m&atilde;o.</p>', '2019-05-09 00:00:00', '1', 8, 7, 3, 15);

-- --------------------------------------------------------

--
-- Estrutura para tabela `convidados`
--

CREATE TABLE `convidados` (
  `id` int(11) NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `correcao`
--

CREATE TABLE `correcao` (
  `id` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_texto` int(11) NOT NULL,
  `nota` float NOT NULL,
  `comentarios` text NOT NULL,
  `data_correcao` date NOT NULL,
  `status` enum('Andamento','Finalizado','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `correcao`
--

INSERT INTO `correcao` (`id`, `id_professor`, `id_texto`, `nota`, `comentarios`, `data_correcao`, `status`) VALUES
(16, 1, 69, 2, '<p>wdwdw</p>', '0000-00-00', 'Finalizado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `destaque`
--

CREATE TABLE `destaque` (
  `id` int(11) NOT NULL,
  `id_atividade` int(11) NOT NULL,
  `titulo` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `conteudo` text COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(75) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `exemplo`
--

CREATE TABLE `exemplo` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `nome_arquivo` varchar(75) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `autor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `exemplo`
--

INSERT INTO `exemplo` (`id`, `titulo`, `nome_arquivo`, `id_genero`, `autor`) VALUES
(1, 'feeeeeeeeeeeeee', 'sucesso.jpg', 7, 'fffffffffffffffffffffffff');

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `caracteristicas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `genero`
--

INSERT INTO `genero` (`id`, `nome`, `caracteristicas`) VALUES
(7, 'Carta', ''),
(8, 'Ficção Científica', ''),
(9, 'Conto', ''),
(10, 'Piada', ''),
(11, 'Ensaio', ''),
(12, 'Livro Didáditico', 'Conteúdo do Livro Didático'),
(13, 'Notícia', ''),
(14, 'Artigo de Opinião ', ''),
(15, 'Apólogo', ''),
(16, 'Comentário', ''),
(17, 'Crônica', ''),
(18, 'Dissertação', ''),
(19, 'Editorial', ''),
(20, 'Fabula', ''),
(21, 'Manual', ''),
(22, 'Relato', ''),
(23, 'Relatório', ''),
(24, 'Reportagem', ''),
(25, 'Resumo', ''),
(26, 'Sinopse', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `gerenciador_turma`
--

CREATE TABLE `gerenciador_turma` (
  `id_gerenciador` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `gerenciador_turma`
--

INSERT INTO `gerenciador_turma` (`id_gerenciador`, `id_turma`) VALUES
(3, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `post`
--

CREATE TABLE `post` (
  `idPOST` int(11) NOT NULL,
  `titulo` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `subtitulo` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `texto` text CHARACTER SET utf8,
  `autor` varchar(80) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `post`
--

INSERT INTO `post` (`idPOST`, `titulo`, `subtitulo`, `texto`, `autor`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Cras bibendum dolor id tortor laoreet, at varius lacus placerat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum dolor id tortor laoreet, at varius lacus placerat. Maecenas pellentesque volutpat nibh eu blandit. Aliquam vel euismod augue. Quisque vitae risus at enim condimentum sagittis non nec quam. Vivamus a facilisis risus, sed fermentum est. Phasellus risus tellus, vulputate a justo sollicitudin, efficitur posuere nisl. Morbi venenatis lobortis enim sit amet porttitor. Maecenas ac neque nec quam lacinia scelerisque. Aenean pellentesque bibendum justo et euismod.\r\n\r\nAenean est dolor, congue ut vulputate in, rutrum a nisl. Duis sagittis congue urna, sit amet cursus eros vehicula sit amet. Pellentesque a lorem vitae tortor suscipit blandit. Nunc cursus sapien sit amet pellentesque accumsan. Sed ipsum dolor, dictum eu ultricies eu, bibendum id ante. Ut ultricies auctor augue ut tincidunt. Vestibulum dui erat, sagittis ac tellus non, semper blandit orci. Sed dignissim nunc tortor, eu dignissim ipsum varius id. Vivamus eget ultrices leo. Fusce placerat fringilla libero, consequat luctus mauris mollis a.\r\n\r\nPellentesque ut sapien a turpis accumsan tempor. Aenean ut eros tortor. Ut quis velit eu magna porta laoreet sit amet eu orci. Phasellus ultricies ut risus quis interdum. Nullam non tellus nec ex pellentesque pellentesque eu eu dolor. Proin mollis purus ac maximus ultrices. Duis eget velit eu dui molestie ultricies. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris fermentum, odio ac posuere blandit, libero purus lobortis est, ac facilisis purus ipsum quis turpis.', 'Lorem Ipsum 1'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Cras bibendum dolor id tortor laoreet, at varius lacus placerat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum dolor id tortor laoreet, at varius lacus placerat. Maecenas pellentesque volutpat nibh eu blandit. Aliquam vel euismod augue. Quisque vitae risus at enim condimentum sagittis non nec quam. Vivamus a facilisis risus, sed fermentum est. Phasellus risus tellus, vulputate a justo sollicitudin, efficitur posuere nisl. Morbi venenatis lobortis enim sit amet porttitor. Maecenas ac neque nec quam lacinia scelerisque. Aenean pellentesque bibendum justo et euismod.\r\n\r\nAenean est dolor, congue ut vulputate in, rutrum a nisl. Duis sagittis congue urna, sit amet cursus eros vehicula sit amet. Pellentesque a lorem vitae tortor suscipit blandit. Nunc cursus sapien sit amet pellentesque accumsan. Sed ipsum dolor, dictum eu ultricies eu, bibendum id ante. Ut ultricies auctor augue ut tincidunt. Vestibulum dui erat, sagittis ac tellus non, semper blandit orci. Sed dignissim nunc tortor, eu dignissim ipsum varius id. Vivamus eget ultrices leo. Fusce placerat fringilla libero, consequat luctus mauris mollis a.\r\n\r\nPellentesque ut sapien a turpis accumsan tempor. Aenean ut eros tortor. Ut quis velit eu magna porta laoreet sit amet eu orci. Phasellus ultricies ut risus quis interdum. Nullam non tellus nec ex pellentesque pellentesque eu eu dolor. Proin mollis purus ac maximus ultrices. Duis eget velit eu dui molestie ultricies. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris fermentum, odio ac posuere blandit, libero purus lobortis est, ac facilisis purus ipsum quis turpis.', 'Lorem Ipsum 2'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Cras bibendum dolor id tortor laoreet, at varius lacus placerat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum dolor id tortor laoreet, at varius lacus placerat. Maecenas pellentesque volutpat nibh eu blandit. Aliquam vel euismod augue. Quisque vitae risus at enim condimentum sagittis non nec quam. Vivamus a facilisis risus, sed fermentum est. Phasellus risus tellus, vulputate a justo sollicitudin, efficitur posuere nisl. Morbi venenatis lobortis enim sit amet porttitor. Maecenas ac neque nec quam lacinia scelerisque. Aenean pellentesque bibendum justo et euismod.\r\n\r\nAenean est dolor, congue ut vulputate in, rutrum a nisl. Duis sagittis congue urna, sit amet cursus eros vehicula sit amet. Pellentesque a lorem vitae tortor suscipit blandit. Nunc cursus sapien sit amet pellentesque accumsan. Sed ipsum dolor, dictum eu ultricies eu, bibendum id ante. Ut ultricies auctor augue ut tincidunt. Vestibulum dui erat, sagittis ac tellus non, semper blandit orci. Sed dignissim nunc tortor, eu dignissim ipsum varius id. Vivamus eget ultrices leo. Fusce placerat fringilla libero, consequat luctus mauris mollis a.\r\n\r\nPellentesque ut sapien a turpis accumsan tempor. Aenean ut eros tortor. Ut quis velit eu magna porta laoreet sit amet eu orci. Phasellus ultricies ut risus quis interdum. Nullam non tellus nec ex pellentesque pellentesque eu eu dolor. Proin mollis purus ac maximus ultrices. Duis eget velit eu dui molestie ultricies. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris fermentum, odio ac posuere blandit, libero purus lobortis est, ac facilisis purus ipsum quis turpis.', 'Lorem Ipsum 3'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Cras bibendum dolor id tortor laoreet, at varius lacus placerat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum dolor id tortor laoreet, at varius lacus placerat. Maecenas pellentesque volutpat nibh eu blandit. Aliquam vel euismod augue. Quisque vitae risus at enim condimentum sagittis non nec quam. Vivamus a facilisis risus, sed fermentum est. Phasellus risus tellus, vulputate a justo sollicitudin, efficitur posuere nisl. Morbi venenatis lobortis enim sit amet porttitor. Maecenas ac neque nec quam lacinia scelerisque. Aenean pellentesque bibendum justo et euismod.\r\n\r\nAenean est dolor, congue ut vulputate in, rutrum a nisl. Duis sagittis congue urna, sit amet cursus eros vehicula sit amet. Pellentesque a lorem vitae tortor suscipit blandit. Nunc cursus sapien sit amet pellentesque accumsan. Sed ipsum dolor, dictum eu ultricies eu, bibendum id ante. Ut ultricies auctor augue ut tincidunt. Vestibulum dui erat, sagittis ac tellus non, semper blandit orci. Sed dignissim nunc tortor, eu dignissim ipsum varius id. Vivamus eget ultrices leo. Fusce placerat fringilla libero, consequat luctus mauris mollis a.\r\n\r\nPellentesque ut sapien a turpis accumsan tempor. Aenean ut eros tortor. Ut quis velit eu magna porta laoreet sit amet eu orci. Phasellus ultricies ut risus quis interdum. Nullam non tellus nec ex pellentesque pellentesque eu eu dolor. Proin mollis purus ac maximus ultrices. Duis eget velit eu dui molestie ultricies. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris fermentum, odio ac posuere blandit, libero purus lobortis est, ac facilisis purus ipsum quis turpis.', 'Lorem Ipsum 4'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Cras bibendum dolor id tortor laoreet, at varius lacus placerat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum dolor id tortor laoreet, at varius lacus placerat. Maecenas pellentesque volutpat nibh eu blandit. Aliquam vel euismod augue. Quisque vitae risus at enim condimentum sagittis non nec quam. Vivamus a facilisis risus, sed fermentum est. Phasellus risus tellus, vulputate a justo sollicitudin, efficitur posuere nisl. Morbi venenatis lobortis enim sit amet porttitor. Maecenas ac neque nec quam lacinia scelerisque. Aenean pellentesque bibendum justo et euismod.\r\n\r\nAenean est dolor, congue ut vulputate in, rutrum a nisl. Duis sagittis congue urna, sit amet cursus eros vehicula sit amet. Pellentesque a lorem vitae tortor suscipit blandit. Nunc cursus sapien sit amet pellentesque accumsan. Sed ipsum dolor, dictum eu ultricies eu, bibendum id ante. Ut ultricies auctor augue ut tincidunt. Vestibulum dui erat, sagittis ac tellus non, semper blandit orci. Sed dignissim nunc tortor, eu dignissim ipsum varius id. Vivamus eget ultrices leo. Fusce placerat fringilla libero, consequat luctus mauris mollis a.\r\n\r\nPellentesque ut sapien a turpis accumsan tempor. Aenean ut eros tortor. Ut quis velit eu magna porta laoreet sit amet eu orci. Phasellus ultricies ut risus quis interdum. Nullam non tellus nec ex pellentesque pellentesque eu eu dolor. Proin mollis purus ac maximus ultrices. Duis eget velit eu dui molestie ultricies. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris fermentum, odio ac posuere blandit, libero purus lobortis est, ac facilisis purus ipsum quis turpis.', 'Lorem Ipsum 5');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `tipo_usuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `professor`
--

INSERT INTO `professor` (`id`, `nome`, `email`, `senha`, `tipo_usuario`) VALUES
(1, 'Diloca', 'edigonfer@gmail.com', 'a0ca80a6c991bf0494cbd16234e841c69733dd54', 1),
(3, 'Gabriel', 'gabriel2018@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
(10, 'Isaac Bernardes Marques', 'ibernardesmarques@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `texto`
--

CREATE TABLE `texto` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `conteudo` text NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_atividade` int(11) NOT NULL,
  `situacao` enum('Em andamento','Enviado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `texto`
--

INSERT INTO `texto` (`id`, `titulo`, `conteudo`, `id_aluno`, `data_envio`, `id_atividade`, `situacao`) VALUES
(69, 'hfhfg', '<p>hhhhhhhhhhhhhh</p>', 39, '2018-12-07 12:21:52', 13, 'Enviado'),
(70, 'Os benefícios da aprendizagem tecnológica aliada a escrita de mão.', '<p>Caros senhores pais e educadores,</p>\r\n<p>Venho por meio desta para explicar aos senhores sobre algo muito presente em nosso cotidiano: a tecnologia. Para os pais que assistem seus filhos crescerem, muitas vezes ela pode ser vista como um vil&atilde;o. Mas a grande verdade &eacute; que esse simples contato (desde que controlado) pode fazer uma diferen&ccedil;a muito grande na forma&ccedil;&atilde;o das crian&ccedil;as e dos adolescentes.</p>\r\n<p>De fato, hoje em dia o uso descontrolado da tecnologia tr&aacute;s muitos malef&iacute;cios, mas a nossa proposta &eacute; conciliar a tecnologia de forma adequada ao processo de aprendizado.</p>\r\n<p>Ao aprender o c&eacute;rebro cria sinapses, que nos permite guardar aquelas informa&ccedil;&otilde;es. Todas as atividades que fazemos que mexem com nossos sentidos nos permitem criar essas sinapses. Ao escrever ativamos certas partes do c&eacute;rebro, e ao usar o computador, celular ou outro meio tecnol&oacute;gico, utilizamos outras partes do nosso c&eacute;rebro.</p>\r\n<p>Por isso &eacute; importante usarmos todos os recursos dispon&iacute;veis para facilitar e tornar mais interessante o aprendizado de nossos jovens.</p>\r\n<p>Pensem em como pode ser mais divertido o aprendizado atrav&eacute;s de meios que os jovens gostam e se sentem bem.</p>\r\n<p>Atenciosamente,</p>\r\n<p>Nat&aacute;lia de Oliveira Caldeira.</p>', 42, '2019-05-02 22:26:13', 20, 'Enviado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `texto_marcado`
--

CREATE TABLE `texto_marcado` (
  `id` int(11) NOT NULL,
  `id_texto` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `conteudo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `texto_marcado`
--

INSERT INTO `texto_marcado` (`id`, `id_texto`, `titulo`, `conteudo`) VALUES
(16, 69, 'hfhfg', '<p>hhhhhhhhhhhhhh</p>');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_textual`
--

CREATE TABLE `tipo_textual` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `caracteristicas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipo_textual`
--

INSERT INTO `tipo_textual` (`id`, `nome`, `caracteristicas`) VALUES
(1, 'Narrativo', ''),
(2, 'Descritivo', ''),
(3, 'Dissertativo-Argumentativo', ''),
(4, 'Expositivo', ''),
(5, 'Injuntivo', ''),
(6, 'Dever', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `id_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `turma`
--

INSERT INTO `turma` (`id`, `nome`, `id_professor`) VALUES
(6, '3º Informática 2017', 1),
(15, 'Turma para testes 07/12/2018', 1),
(19, 'Turma que não é da Diloca 2', 3);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_turma` (`id_turma`);

--
-- Índices de tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Índices de tabela `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_turma` (`id_turma`);

--
-- Índices de tabela `convidados`
--
ALTER TABLE `convidados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `correcao`
--
ALTER TABLE `correcao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_professor` (`id_professor`),
  ADD KEY `id_texto` (`id_texto`);

--
-- Índices de tabela `destaque`
--
ALTER TABLE `destaque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_atividade` (`id_atividade`);

--
-- Índices de tabela `exemplo`
--
ALTER TABLE `exemplo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Índices de tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `gerenciador_turma`
--
ALTER TABLE `gerenciador_turma`
  ADD KEY `id_gerenciador` (`id_gerenciador`),
  ADD KEY `id_turma` (`id_turma`);

--
-- Índices de tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPOST`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `texto`
--
ALTER TABLE `texto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aluno` (`id_aluno`),
  ADD KEY `id_atividade` (`id_atividade`);

--
-- Índices de tabela `texto_marcado`
--
ALTER TABLE `texto_marcado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_correcao` (`id_texto`);

--
-- Índices de tabela `tipo_textual`
--
ALTER TABLE `tipo_textual`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_professor` (`id_professor`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de tabela `atividade`
--
ALTER TABLE `atividade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de tabela `convidados`
--
ALTER TABLE `convidados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `correcao`
--
ALTER TABLE `correcao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de tabela `destaque`
--
ALTER TABLE `destaque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `exemplo`
--
ALTER TABLE `exemplo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `idPOST` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de tabela `texto`
--
ALTER TABLE `texto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT de tabela `texto_marcado`
--
ALTER TABLE `texto_marcado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de tabela `tipo_textual`
--
ALTER TABLE `tipo_textual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `arquivos`
--
ALTER TABLE `arquivos`
  ADD CONSTRAINT `arquivos_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `atividade_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`),
  ADD CONSTRAINT `atividade_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_textual` (`id`),
  ADD CONSTRAINT `atividade_ibfk_3` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `correcao`
--
ALTER TABLE `correcao`
  ADD CONSTRAINT `correcao_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `correcao_ibfk_2` FOREIGN KEY (`id_texto`) REFERENCES `texto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `exemplo`
--
ALTER TABLE `exemplo`
  ADD CONSTRAINT `exemplo_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `gerenciador_turma`
--
ALTER TABLE `gerenciador_turma`
  ADD CONSTRAINT `gerenciador_turma_ibfk_1` FOREIGN KEY (`id_gerenciador`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gerenciador_turma_ibfk_2` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `texto`
--
ALTER TABLE `texto`
  ADD CONSTRAINT `texto_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `texto_ibfk_2` FOREIGN KEY (`id_atividade`) REFERENCES `atividade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `texto_marcado`
--
ALTER TABLE `texto_marcado`
  ADD CONSTRAINT `texto_marcado_ibfk_1` FOREIGN KEY (`id_texto`) REFERENCES `texto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
