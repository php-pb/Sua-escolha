-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Abr-2017 às 01:13
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `postagem_id` int(11) DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id`, `postagem_id`, `nome`, `descricao`, `criacao`) VALUES
(1, 1, 'Jaime', 'Teste de comentário', '2012-04-25 20:48:06'),
(2, 2, 'Fulano', 'Que legal!', '2017-04-01 00:34:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id`, `nome`, `descricao`, `criacao`, `usuario_id`) VALUES
(1, 'Iniciando o WAMP junto com o Windows', 'Se você trabalha com WAMP, sabe como é chato toda vez que iniciar o Windows ter que iniciá-lo para que possa usar o Apache e o Mysql. Então, vai uma dica rápida para iniciar esses serviços junto com o Windows, que não é apenas copiar o link de inicialização do WAMP para a pasta "Inicializar" (que nem sempre funciona, ou fica exibindo aquela tela de permissão).\r\n\r\nEis o passo a passo:\r\n<ol>\r\n	<li>No Windows 7, clique em Iniciar e, na barra de pesquisa por programas e arquivos, digite: <strong>services.msc\r\n</strong></li>\r\n	<li>Clique no arquivo que vai aparecer, ou simplesmente aperte o ENTER.</li>\r\n	<li>Na janela que se abre, procure os serviços de nome: <strong>wampapache</strong> e <strong>wampmysqld</strong></li>\r\n	<li>Perceba que na coluna "Tipo de Inicialização", eles estão como "Manual"</li>\r\n	<li>Clique com botão direito em um deles, e selecione "Propriedades"</li>\r\n	<li>Mude "Tipo de Inicialização" para "Automático" e clique "OK"</li>\r\n	<li>Faça o mesmo para o outro serviço.</li>\r\n</ol>\r\nProntinho... quando você reiniciar o Windows os serviços já estarão inicializados. Perceba, no entanto, que o que estará sendo iniciado automaticamente são os serviços Apache e Mysql, e não o Wamp em si. Ou seja, o iconezinho dele não vai estar lá do lado do relógio. Mas você vai poder usar os serviços normalmente, e só se realmente precisar mexer no WAMP é que vai ter que iniciá-lo.\r\n\r\nRepare que essa dica serve pra o caso de você querer inicializar automaticamente qualquer desses outros serviços da lista. Prático, não? ^__^', '2012-03-20 18:02:00', 1),
(2, 'Ordenar colunas no MySQL deixando campos null no final', 'Você já teve que fazer uma consulta em alguma tabela de um banco de dados MySQL, em que você deseja ordenar por uma coluna específica, e no início dos resultados aparecem todos os campos null dessa coluna? Daí você quer manter a ordem, mas quer que os campos null fiquem no final dos resultados? Como você faz?\r\n\r\nBom, recentemente descobri uma forma bem fácil de fazer isso, e resolvi compartilhar aqui com quem mais precisar. \r\n\r\nO que você deve fazer, é inverter a ordem de ASC para DESC, e adicionar um sinal de menos (-) antes do nome da coluna. Veja o exemplo:\r\n\r\n<pre>SELECT * FROM table_name ORDER BY -(column_name) DESC</pre>\r\n\r\nOs parênteses são opcionais, mas recomendo que use, pois caso você esteja usando algum gerador de código que adicione as aspas no nome da coluna, essas ficarão dentro dos parênteses e não deverão causar problemas com o sinal de menos.\r\n\r\nPrático, não? :)', '2017-04-01 03:34:30', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `perfil` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`, `email`, `perfil`) VALUES
(1, 'Administrador', '21232f297a57a5a743894a0e4a801fc3', 'blog@sua-escolha.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`postagem_id`);

--
-- Indexes for table `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`usuario_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `postagem`
--
ALTER TABLE `postagem`
  ADD CONSTRAINT `postagem_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
