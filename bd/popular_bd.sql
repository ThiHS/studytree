-- Popular o banco studytree com uma grade de exemplo.
-- Apaga os registros atuais e grava de novo cursos, disciplinas,
-- pré-requisitos, matérias, conteúdos, materiais, usuários e permissões.
--
-- Senha de todos os usuários de exemplo: 123456
--
-- Como rodar, na pasta do projeto:
--   mysql --default-character-set=utf8mb4 -u root studytree < bd/popular_bd.sql

SET NAMES utf8mb4;
USE `studytree`;

SET FOREIGN_KEY_CHECKS = 0;

DELETE FROM `conteudos_materiais_apoio`;
DELETE FROM `usuario_conteudo`;
DELETE FROM `usuario_materias`;
DELETE FROM `usuarios_disciplinas`;
DELETE FROM `usuarios_permissoes`;
DELETE FROM `cursos_usuario`;
DELETE FROM `disciplinas_materias`;
DELETE FROM `disciplinas_relacionadas`;
DELETE FROM `curso_disciplina`;
DELETE FROM `materiais_apoio`;
DELETE FROM `conteudos`;
DELETE FROM `tipos_material`;
DELETE FROM `materias`;
DELETE FROM `permissoes`;
DELETE FROM `disciplinas`;
DELETE FROM `usuario`;
DELETE FROM `cursos`;

ALTER TABLE `conteudos_materiais_apoio` AUTO_INCREMENT = 1;
ALTER TABLE `usuario_conteudo` AUTO_INCREMENT = 1;
ALTER TABLE `usuario_materias` AUTO_INCREMENT = 1;
ALTER TABLE `usuarios_disciplinas` AUTO_INCREMENT = 1;
ALTER TABLE `usuarios_permissoes` AUTO_INCREMENT = 1;
ALTER TABLE `cursos_usuario` AUTO_INCREMENT = 1;
ALTER TABLE `disciplinas_materias` AUTO_INCREMENT = 1;
ALTER TABLE `disciplinas_relacionadas` AUTO_INCREMENT = 1;
ALTER TABLE `curso_disciplina` AUTO_INCREMENT = 1;
ALTER TABLE `materiais_apoio` AUTO_INCREMENT = 1;
ALTER TABLE `conteudos` AUTO_INCREMENT = 1;
ALTER TABLE `tipos_material` AUTO_INCREMENT = 1;
ALTER TABLE `materias` AUTO_INCREMENT = 1;
ALTER TABLE `permissoes` AUTO_INCREMENT = 1;
ALTER TABLE `disciplinas` AUTO_INCREMENT = 1;
ALTER TABLE `usuario` AUTO_INCREMENT = 1;
ALTER TABLE `cursos` AUTO_INCREMENT = 1;

SET FOREIGN_KEY_CHECKS = 1;

START TRANSACTION;

-- -----------------------------------------------------
-- Cursos
-- -----------------------------------------------------
INSERT INTO `cursos` (`id_curso`, `nome`, `descricao`) VALUES
(1, 'Ciência da Computação', 'Grade montada com base nas disciplinas publicadas do curso na Newton Paiva Wyden.'),
(2, 'Sistemas de Informação', 'Grade voltada a processos, dados e gestão. Compartilha a base de programação com Ciência da Computação.');

-- -----------------------------------------------------
-- Disciplinas
-- pai em disciplinas_relacionadas = pré-requisito
-- filha = disciplina que depende dele
-- -----------------------------------------------------
INSERT INTO `disciplinas` (`id_disciplina`, `nome_disciplina`, `descricao_disciplina`) VALUES
(1,  'Algoritmos e Programação', 'Lógica, algoritmos e as primeiras estruturas de código.'),
(2,  'Cálculo 1', 'Limites, derivadas e a base do cálculo de uma variável.'),
(3,  'Matemática Discreta', 'Conjuntos, relações, funções e noções de contagem.'),
(4,  'Introdução à Computação', 'Como o computador representa dados e executa instruções.'),
(5,  'Algoritmos e Estrutura de Dados I', 'Listas, pilhas, filas, árvores e o custo de cada estrutura.'),
(6,  'Cálculo 2', 'Integrais e séries, dando sequência ao Cálculo 1.'),
(7,  'Arquitetura de Computadores', 'Processador, memória e o caminho da instrução.'),
(8,  'Lógica para Computação', 'Proposições, predicados e provas usadas na computação.'),
(9,  'Banco de Dados', 'Modelagem relacional e consultas para guardar os dados da aplicação.'),
(10, 'Projeto e Análise de Algoritmos', 'Projeto e análise de algoritmos em cima das estruturas já vistas.'),
(11, 'Programação Orientada a Objetos', 'Classes, objetos e a organização de um programa maior.'),
(12, 'Sistemas Operacionais', 'Processos, memória e o que o sistema faz entre o programa e o hardware.'),
(13, 'Redes de Computadores', 'Como as máquinas se encontram e trocam dados.'),
(14, 'Engenharia de Software', 'Requisitos, projeto e entrega de um sistema em equipe.'),
(15, 'Compiladores', 'Da linguagem de programação até o código que a máquina executa.'),
(16, 'Fundamentos de Sistemas de Informação', 'Organizações, processos e o papel dos sistemas de informação.'),
(17, 'Gestão de Projetos de TI', 'Escopo, prazo e acompanhamento de um projeto de tecnologia.'),
(18, 'Análise de Sistemas', 'Levantamento e modelagem do sistema que a organização precisa.'),
(19, 'Oficina de Informática', 'Uso do computador, arquivos e as ferramentas do dia a dia.'),
(20, 'Educação Ambiental e Cidadania', 'Meio ambiente, responsabilidade e cidadania na formação geral.'),
(21, 'Algoritmos e Estrutura de Dados II', 'Árvores balanceadas, grafos e algoritmos sobre essas estruturas.'),
(22, 'Engenharia de Requisitos', 'Levantamento e escrita do que o sistema precisa fazer.'),
(23, 'Interação Humano-Computador', 'Quem usa o sistema, a interface e o teste dessa interação.'),
(24, 'Administração de Sistemas de Informação', 'Como a organização administra os sistemas e a informação.'),
(25, 'Sistemas de Informação Gerenciais', 'Informação para decisão e os sistemas que apoiam a gestão.'),
(26, 'Gestão de Governança em TI', 'Decisão, risco e o alinhamento da tecnologia com a organização.'),
(27, 'Inteligência Artificial', 'Busca, conhecimento e aprendizagem para resolver problemas.'),
(28, 'Segurança da Informação', 'Ameaças, controle de acesso e proteção dos dados e da rede.'),
(29, 'Projeto Aplicado', 'Um projeto de computação que junta o que foi visto no curso.'),
(30, 'Estágio Supervisionado', 'Prática acompanhada em um ambiente profissional de computação.'),
(31, 'Trabalho de Conclusão de Curso', 'O trabalho final, da proposta até o texto e a apresentação.'),
(32, 'Computação em Nuvem', 'Serviços, implantação e o uso de infraestrutura remota.'),
(33, 'Banco de Dados Avançado', 'Transações, desempenho e o que vem depois do modelo relacional.');

-- Ciência da Computação: a grade completa de computação
INSERT INTO `curso_disciplina` (`id_curso`, `id_disciplina`, `data_vinculo`) VALUES
(1, 1,  '2026-02-02'),
(1, 2,  '2026-02-02'),
(1, 3,  '2026-02-02'),
(1, 4,  '2026-02-02'),
(1, 5,  '2026-02-02'),
(1, 6,  '2026-02-02'),
(1, 7,  '2026-02-02'),
(1, 8,  '2026-02-02'),
(1, 9,  '2026-02-02'),
(1, 10, '2026-02-02'),
(1, 11, '2026-02-02'),
(1, 12, '2026-02-02'),
(1, 13, '2026-02-02'),
(1, 14, '2026-02-02'),
(1, 15, '2026-02-02'),
(1, 19, '2026-02-02'),
(1, 20, '2026-02-02'),
(1, 21, '2026-02-02'),
(1, 22, '2026-02-02'),
(1, 23, '2026-02-02'),
(1, 24, '2026-02-02'),
(1, 25, '2026-02-02'),
(1, 26, '2026-02-02'),
(1, 27, '2026-02-02'),
(1, 28, '2026-02-02'),
(1, 29, '2026-02-02'),
(1, 30, '2026-02-02'),
(1, 31, '2026-02-02'),
(1, 32, '2026-02-02'),
(1, 33, '2026-02-02');

-- Sistemas de Informação: base de programação compartilhada e trilhas próprias
INSERT INTO `curso_disciplina` (`id_curso`, `id_disciplina`, `data_vinculo`) VALUES
(2, 1,  '2026-02-02'),
(2, 5,  '2026-02-02'),
(2, 9,  '2026-02-02'),
(2, 16, '2026-02-02'),
(2, 17, '2026-02-02'),
(2, 18, '2026-02-02');

-- Pré-requisitos. O id da esquerda precisa ser cursado antes do da direita.
INSERT INTO `disciplinas_relacionadas` (`id_disciplina_pai`, `id_disciplina_filha`) VALUES
(1, 5),
(2, 6),
(2, 10),
(3, 8),
(4, 7),
(5, 9),
(5, 10),
(5, 11),
(7, 12),
(8, 15),
(9, 14),
(9, 18),
(10, 15),
(11, 14),
(12, 13),
(16, 17),
(16, 18),
(5, 21),
(1, 22),
(22, 14),
(11, 23),
(9, 24),
(24, 25),
(24, 26),
(21, 27),
(8, 27),
(13, 28),
(14, 29),
(23, 29),
(29, 30),
(30, 31),
(12, 32),
(13, 32),
(9, 33);

-- -----------------------------------------------------
-- Matérias e conteúdos
-- -----------------------------------------------------
INSERT INTO `materias` (`id_materia`, `nome_materia`, `descricao_materias`, `ativo`) VALUES
(1, 'Algoritmos e lógica', 'Sequência, decisão e repetição antes de uma linguagem específica.', 1),
(2, 'Variáveis e estruturas de controle', 'Dados, condições e laços em um programa curto.', 1),
(3, 'Limites e derivadas', 'A variação de uma função e a leitura do gráfico.', 1),
(4, 'Listas, pilhas e filas', 'Estruturas lineares e quando cada uma cabe no problema.', 1),
(5, 'Árvores e grafos', 'Hierarquia, busca e os primeiros percursos.', 1),
(6, 'Modelagem relacional', 'Entidades, relacionamentos e o desenho das tabelas.', 1),
(7, 'SQL', 'Consultas para buscar e reunir os dados gravados.', 1),
(8, 'Processos de software', 'Do pedido do usuário até a entrega do sistema.', 1),
(9, 'Organizações e sistemas', 'Como a informação circula dentro de uma organização.', 1);

INSERT INTO `disciplinas_materias` (`id_disciplina`, `id_materia`, `data_vinculo`) VALUES
(1, 1, '2026-02-02'),
(1, 2, '2026-02-02'),
(2, 3, '2026-02-02'),
(5, 4, '2026-02-02'),
(5, 5, '2026-02-02'),
(9, 6, '2026-02-02'),
(9, 7, '2026-02-02'),
(14, 8, '2026-02-02'),
(16, 9, '2026-02-02');

INSERT INTO `conteudos` (`id_conteudo`, `id_materia`, `nome_conteudo`, `descricao_conteudo`, `ativo`) VALUES
(1, 1, 'Sequência, seleção e repetição', 'Os três blocos com que um algoritmo é montado.', 1),
(2, 1, 'Pseudocódigo', 'Escrever o passo a passo antes de escolher a linguagem.', 1),
(3, 4, 'Listas encadeadas', 'Nós, ponteiros e a diferença para o vetor.', 1),
(4, 6, 'Entidades e relacionamentos', 'O que vira tabela e o que liga uma tabela à outra.', 1),
(5, 7, 'SELECT, JOIN e GROUP BY', 'Buscar, cruzar e resumir linhas.', 1),
(6, 9, 'Cadeia de valor e sistemas', 'Onde o sistema entra no trabalho da organização.', 1);

-- -----------------------------------------------------
-- Materiais de apoio
-- -----------------------------------------------------
INSERT INTO `tipos_material` (`id_tipos_material`, `nome_tipo`, `descricao_tipo_material`, `ativo`) VALUES
(1, 'Videoaula', 'Aula gravada para rever um trecho da matéria.', 1),
(2, 'Apostila', 'Texto curto com o conteúdo organizado para estudo.', 1),
(3, 'Exercício', 'Lista para praticar o que foi visto na aula.', 1),
(4, 'Link externo', 'Página de referência fora do StudyTree.', 1);

INSERT INTO `materiais_apoio` (`id_material`, `id_tipo`, `nome_material`, `link`, `descricao_material`) VALUES
(1, 2, 'Notas de aula de lógica', NULL, 'Resumo de sequência, seleção e repetição.'),
(2, 3, 'Lista de exercícios de repetição', NULL, 'Problemas curtos para treinar laços.'),
(3, 1, 'Videoaula de listas encadeadas', NULL, 'Montagem e percurso de uma lista.'),
(4, 4, 'Referência de consultas SQL', 'https://dev.mysql.com/doc/refman/8.4/en/select.html', 'Documentação do SELECT no MySQL.');

INSERT INTO `conteudos_materiais_apoio` (`id_conteudo`, `id_material`, `data_vinculo`) VALUES
(1, 1, '2026-02-10'),
(1, 2, '2026-02-10'),
(3, 3, '2026-03-02'),
(5, 4, '2026-03-16');

-- -----------------------------------------------------
-- Usuários
-- A coluna senha guarda o MD5. A senha em texto é 123456.
-- -----------------------------------------------------
INSERT INTO `usuario` (`num_matricula`, `nome`, `email`, `telefone`, `senha`) VALUES
('202600000001', 'Admin StudyTree', 'admin@studytree.local', '(31) 99999-0001', MD5('123456')),
('202600000002', 'Marina Alves', 'marina.alves@studytree.local', '(31) 98888-0002', MD5('123456')),
('202600000003', 'Rafael Campos', 'rafael.campos@studytree.local', '(31) 98888-0003', MD5('123456')),
('202600000004', 'Helena Prado', 'helena.prado@studytree.local', '(31) 98888-0004', MD5('123456'));

-- Marina cursa Ciência da Computação desde o início de 2026.
INSERT INTO `cursos_usuario` (`id_curso`, `num_matricula`, `ativo`, `data_inicio`, `data_fim`) VALUES
(1, '202600000002', 'ativo', '2026-02-02', NULL);

-- Introdução concluída no primeiro semestre. Cálculo 1 ainda em andamento.
INSERT INTO `usuarios_disciplinas` (`num_matricula`, `id_disciplina`, `data_inicio`, `data_fim`, `aprovacao`) VALUES
('202600000002', 1, '2026-02-02', '2026-06-30', 88.00),
('202600000002', 2, '2026-08-03', NULL, NULL);

INSERT INTO `usuario_materias` (`num_matricula`, `id_materia`, `conclusao`) VALUES
('202600000002', 1, '2026-04-15'),
('202600000002', 2, '2026-06-20');

INSERT INTO `usuario_conteudo` (`num_matricula`, `id_conteudo`, `conclusao`) VALUES
('202600000002', 1, '2026-03-20'),
('202600000002', 2, '2026-04-15');

-- -----------------------------------------------------
-- Permissões
-- nome_permissao = módulo, descricao = ação, cod_permissao = código estável
-- -----------------------------------------------------
INSERT INTO `permissoes` (`id_permissao`, `nome_permissao`, `descricao`, `cod_permissao`) VALUES
(1,  'usuarios', 'Criar', 1),
(2,  'usuarios', 'Editar', 2),
(3,  'usuarios', 'Excluir', 3),
(4,  'usuarios', 'Ver', 4),
(5,  'usuarios', 'Alterar senha', 5),
(6,  'usuarios', 'Alterar permissões', 6),
(7,  'cursos', 'Criar', 7),
(8,  'cursos', 'Editar', 8),
(9,  'cursos', 'Excluir', 9),
(10, 'cursos', 'Ver', 10),
(11, 'disciplinas', 'Criar', 11),
(12, 'disciplinas', 'Editar', 12),
(13, 'disciplinas', 'Excluir', 13),
(14, 'disciplinas', 'Ver', 14),
(15, 'materias', 'Criar', 15),
(16, 'materias', 'Editar', 16),
(17, 'materias', 'Excluir', 17),
(18, 'materias', 'Ver', 18),
(19, 'conteudos', 'Criar', 19),
(20, 'conteudos', 'Editar', 20),
(21, 'conteudos', 'Excluir', 21),
(22, 'conteudos', 'Ver', 22),
(23, 'materiais_apoio', 'Criar', 23),
(24, 'materiais_apoio', 'Editar', 24),
(25, 'materiais_apoio', 'Excluir', 25),
(26, 'materiais_apoio', 'Ver', 26),
(27, 'tipos_material', 'Criar', 27),
(28, 'tipos_material', 'Editar', 28),
(29, 'tipos_material', 'Excluir', 29),
(30, 'tipos_material', 'Ver', 30),
(31, 'permissoes', 'Criar', 31),
(32, 'permissoes', 'Editar', 32),
(33, 'permissoes', 'Excluir', 33),
(34, 'permissoes', 'Ver', 34),
(35, 'cursos_usuarios', 'Criar', 35),
(36, 'cursos_usuarios', 'Editar', 36),
(37, 'cursos_usuarios', 'Excluir', 37),
(38, 'cursos_usuarios', 'Ver', 38),
(39, 'cursos_usuarios', 'Encerrar vínculo', 39),
(40, 'usuarios_disciplinas', 'Criar', 40),
(41, 'usuarios_disciplinas', 'Editar', 41),
(42, 'usuarios_disciplinas', 'Excluir', 42),
(43, 'usuarios_disciplinas', 'Ver', 43),
(44, 'usuarios_disciplinas', 'Registrar aprovação', 44),
(45, 'usuarios_disciplinas', 'Registrar conclusão', 45),
(46, 'usuarios_materias', 'Criar', 46),
(47, 'usuarios_materias', 'Editar', 47),
(48, 'usuarios_materias', 'Excluir', 48),
(49, 'usuarios_materias', 'Ver', 49),
(50, 'usuarios_materias', 'Registrar conclusão', 50),
(51, 'usuarios_conteudo', 'Criar', 51),
(52, 'usuarios_conteudo', 'Editar', 52),
(53, 'usuarios_conteudo', 'Excluir', 53),
(54, 'usuarios_conteudo', 'Ver', 54),
(55, 'usuarios_conteudo', 'Registrar conclusão', 55),
(56, 'conteudos_materiais_apoio', 'Criar', 56),
(57, 'conteudos_materiais_apoio', 'Editar', 57),
(58, 'conteudos_materiais_apoio', 'Excluir', 58),
(59, 'conteudos_materiais_apoio', 'Ver', 59);

-- Admin vê e altera tudo.
INSERT INTO `usuarios_permissoes` (`num_matricula`, `id_permissao`)
SELECT '202600000001', `id_permissao` FROM `permissoes`;

-- Coordenador altera a grade, sem mexer no cadastro de permissões.
INSERT INTO `usuarios_permissoes` (`num_matricula`, `id_permissao`)
SELECT '202600000003', `id_permissao` FROM `permissoes` WHERE `nome_permissao` <> 'permissoes';

-- Secretaria só consulta.
INSERT INTO `usuarios_permissoes` (`num_matricula`, `id_permissao`)
SELECT '202600000004', `id_permissao` FROM `permissoes` WHERE `descricao` = 'Ver';

-- Aluna consulta a trilha e o próprio progresso.
INSERT INTO `usuarios_permissoes` (`num_matricula`, `id_permissao`)
SELECT '202600000002', `id_permissao`
  FROM `permissoes`
 WHERE `descricao` = 'Ver'
   AND `nome_permissao` IN (
        'cursos',
        'disciplinas',
        'materias',
        'conteudos',
        'materiais_apoio',
        'cursos_usuarios',
        'usuarios_disciplinas',
        'usuarios_materias',
        'usuarios_conteudo'
   );

COMMIT;
