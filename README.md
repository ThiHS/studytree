# Equipe 404_Founders 

Projeto da disciplina **ARA0062 · Desenvolvimento Web em HTML5, CSS, JavaScript
e PHP** — Centro Universitário Newton Paiva, 2026/2.

> Troque o título acima pelo nome da sua equipe e pelo tema do projeto de vocês.
> Todo o resto deste arquivo é modelo: substitua os dados de exemplo.

## Tema do projeto

Assunto: Site para unificação de informações de progressos academicos e trilha educacional. 

## Sobre o projeto

Sobre o projeto: Nosso site tem o objetivo de unificar informações academicas em um so lugar, facilitanto o acesso da trilha de aprendizado para o aluno, trazendo trilhas de conhescimento, materiais de apoio, e um guia das disciplinas que voce irá explorar durante sua jornada academica. Com isso o aluno poderá ter seus objetivos em mente e se dedicar ainda mais aos estudos  

## Identidade visual

Modo claro

    A documentação completa sobre a identidade visual está em um pdf em /frontend/img/documentacao/Identidade_visual.

    Resumo:
    Paleta de Cores

    A paleta de cores presente em uma página web compõe não somente sua identidade visual, mas também representa o comprometimento de uma equipe de desenvolvedores com seus usuários. Com isto em mente, em 08/09/2026, escolhemos oito tonalidades que comunicam nosso objetivo e apresentam alto contraste entre si, proporcionando legibilidade e conforto visual a quem acessa o site.

    Sendo elas, no modo claro:

    Realizamos a verificação de alto contraste através de uma ferramenta confiável fornecida pela Adobe, o Color Contrast Checker do Adobe Express. Seguindo os parâmetros de acessibilidade propostos pela WCAG 2.1 (Web Content Accessibility Guidelines 2.1), obtemos os seguintes resultados:

    Botões
    Obtemos uma combinação que possui, em média, um contraste de 5.51, visando seu uso em botões chamativos com um tamanho de fonte maior. 


    Cor da letra (Foreground): #E4F0F2

    Cor de fundo (Background): #2B6770

    Títulos
    O título de uma página é o elemento encarregado de chamar a atenção do leitor; Em uma página focada na educação e na descomplicação do ensino, consentimos na escolha de dois tons de verde complementares, com contraste em 7.66.

    Segundo a teoria das cores, o verde estimula a criatividade e o equilíbrio, tornando-se um elemento chave de nosso objetivo social.

    Cor da letra (Foreground): #374D12

    Cor de fundo (Background): #DDEEC4

    Cards
    Para a coloração de blocos e cartões, que devem se destacar do fundo da página, concordamos em utilizar o azul, que é análogo ao verde no círculo cromático e proporciona maior harmonia visual, além de seu contraste de 5.3.

    Cor da letra (Foreground): #223C4D

    Cor de fundo (Background): #96B4C8

    Corpo da Página
    Priorizando a legibilidade do conteúdo e a facilidade de absorção de informações, determinamos que o contraste entre a cor de fundo da página e a fonte contendo o texto principal deveriam ter o maior contraste entre si, totalizando 11.87.

    Cor da letra (Foreground): #223C4D

    Cor de fundo (Background): #96B4C8

    Dessa forma, a paleta escolhida foi definida no “root” do estilo CSS:

    :root {
        /* cores do tema claro */
    --claro-fundo-cabecalho: #ddeec4; /* cabeçalho, títulos */
    --claro-texto-cabecalho: #374D12; /* texto EM CIMA dela */


    --claro-card: #96b4c8; /* cartões, conteúdo */
    --claro-texto-card: #223C4D; /* textos do card, destaques*/


    --claro-apoio: #2B6770; /* botões, destaques */
    --claro-texto-apoio: #E4F0F2; /* botões, destaques */


    --claro-fundo: #f6fdeb; /* o fundo da página */
    --claro-texto: #213303; /* }a cor das letras */

Modo Escuro

    Para a composição do modo escuro do sistema web, foi escolhida uma paleta baseada em tons de azul, verde e cinza, priorizando cores de baixa luminosidade que proporcionam conforto visual e reduzem o excesso de contraste. A combinação busca, portanto, conciliar estética, legibilidade, acessibilidade e conforto durante o uso prolongado do sistema.

    Realizamos novamente a verificação de alto contraste através de uma ferramenta confiável fornecida pela Adobe, o Color Contrast Checker do Adobe Express. Seguindo os parâmetros de acessibilidade propostos pela WCAG 2.1 (Web Content Accessibility Guidelines 2.1), obtemos os seguintes resultados:

    Botões
    Obtemos uma combinação que possui, em média, um contraste de 4.56, buscando maior harmonia entre as cores.


    Cor da letra (Foreground): #A2CA9B
    Cor de fundo (Background): #42523F

    Títulos
    Para o título do modo escuro, escolhemos desta vez dois tons de azul escuro que mantêm a identidade profissional e educacional da página, com contraste em 5.74.


    Cor da letra (Foreground): #7992B5

    Cor de fundo (Background): #05152B

    Cards
    Para blocos e cartões presentes na página, concordamos em utilizar um tom de verde mais claro, buscando maior contraste e harmonia entre o fundo do site, totalizando um contraste de 5.3.

    Cor da letra (Foreground): #A9C1A5

    Cor de fundo (Background): #233520

    Corpo da Página
    Mais uma vez, priorizamos o conforto visual do usuário e escolhemos duas cores contrastantes para facilitar a leitura e o foco, sem desconsiderar os tons previamente estabelecidos.

    Logo, entre o plano de fundo e a cor da fonte, obtivemos um contraste de 15.38.

    Cor da letra (Foreground): #D4E6FF

    Cor de fundo (Background): #020D1C

    Em nosso código, também definimos essa paleta no root do CSS, de modo que:

    /* cores do tema escuro */
    --escuro-fundo-cabecalho: #05152b; /* cabeçalho, títulos */
    --escuro-texto-cabecalho: #7992B5; /* texto EM CIMA dela */


    --escuro-card: #233520; /* cartões, conteúdo */
    --escuro-texto-card: #A9C1A5; /* textos do card, destaques */


    --escuro-apoio: #42523F; /* botões, destaques */
    --escuro-texto-apoio: #A2CA9B; /* botões, destaques */


    --escuro-fundo: #020D1C; /* o fundo da página */
    --escuro-texto: #D4E6FF; /* a cor das letras */





## Equipe

**Líder:** Thiago Hermont Siqueira

| Nome completo                     | Matrícula    | GitHub +       | Papel      |
|-----------------------------------|--------------|----------------|------------|
| Thiago Hermont Siqueira           | 202601758268 | @ThiHS         | **líder**  |
| Emanuella Pimentel Machado        | 202602034441 | @EmaPimentel   | integrante |
| Guilherme Rocha Martins da Costa  | 202602176131 | @link403020    | integrante |
| Angeline Grate Moreira            | 202602140179 | @angelinegm    | integrante |
| Arthur Henrique Oliveira Melo     | 202508694841 | @Arthurhom     | integrante |
| Isabella Oliveira Dias            | 202602778068 | @isab246       | integrante |

Cada integrante acrescenta a **sua própria linha** nesta tabela, pelo GitHub.
Esse é o commit que registra a sua participação.

## Divisão de Tarefas

| tema                               | função                       | integrante          |
|------------------------------------|------------------------------|---------------------|
| Banco de dados                     | Criação tbs                  | Arthur/Guilherme    |
| Banco de dados                     | Criação permissões           | Thiago              |
|                                    |                              |                     |
| Usuários                           | Cadastro Front-end           | XXXXXXXXXXX         |
| Usuários                           | Cadastro Back-end            | XXXXXXXXXXX         |
| Usuários                           | Edição Front-end             | XXXXXXXXXXX         |
| Usuários                           | Edição Back-end              | XXXXXXXXXXX         |
| Usuários                           | Lista Front-end              | XXXXXXXXXXX         |
| Usuários                           | Lista Back-end               | XXXXXXXXXXX         |
|                                    |                              |                     |
| Curso                              | Cadastro Front-end           | Angeline            |
| Curso                              | Cadastro Back-end            | XXXXXXXXXXX         |
| Curso                              | Edição Front-end             | XXXXXXXXXXX         |
| Curso                              | Edição Back-end              | XXXXXXXXXXX         |
| Curso                              | Lista Front-end              | XXXXXXXXXXX         |
| Curso                              | Lista Back-end               | XXXXXXXXXXX         |
|                                    |                              |                     |
| Disciplina                         | Cadastro Front-end           | XXXXXXXXXXX         |
| Disciplina                         | Cadastro Back-end            | XXXXXXXXXXX         |
| Disciplina                         | Edição Front-end             | XXXXXXXXXXX         |
| Disciplina                         | Edição Back-end              | XXXXXXXXXXX         |
| Disciplina                         | Lista Front-end              | XXXXXXXXXXX         |
| Disciplina                         | Lista Back-end               | XXXXXXXXXXX         |
|                                    |                              |                     |
| Matéria                            | Cadastro Front-end           | XXXXXXXXXXX         |
| Matéria                            | Cadastro Back-end            | XXXXXXXXXXX         |
| Matéria                            | Edição Front-end             | XXXXXXXXXXX         |
| Matéria                            | Edição Back-end              | XXXXXXXXXXX         |
| Matéria                            | Lista Front-end              | XXXXXXXXXXX         |
| Matéria                            | Lista Back-end               | XXXXXXXXXXX         |
|                                    |                              |                     |
| Conteúdo                           | Cadastro Front-end           | XXXXXXXXXXX         |
| Conteúdo                           | Cadastro Back-end            | XXXXXXXXXXX         |
| Conteúdo                           | Edição Front-end             | XXXXXXXXXXX         |
| Conteúdo                           | Edição Back-end              | XXXXXXXXXXX         |
| Conteúdo                           | Lista Front-end              | XXXXXXXXXXX         |
| Conteúdo                           | Lista Back-end               | XXXXXXXXXXX         |
|                                    |                              |                     |
| Materiais de apoio                 | Cadastro Front-end           | XXXXXXXXXXX         |
| Materiais de apoio                 | Cadastro Back-end            | XXXXXXXXXXX         |
| Materiais de apoio                 | Edição Front-end             | XXXXXXXXXXX         |
| Materiais de apoio                 | Edição Back-end              | XXXXXXXXXXX         |
| Materiais de apoio                 | Lista Front-end              | XXXXXXXXXXX         |
| Materiais de apoio                 | Lista Back-end               | XXXXXXXXXXX         |
|                                    |                              |                     |
| Tipos de materiais                 | Cadastro Front-end           | XXXXXXXXXXX         |
| Tipos de materiais                 | Cadastro Back-end            | XXXXXXXXXXX         |
| Tipos de materiais                 | Edição Front-end             | XXXXXXXXXXX         |
| Tipos de materiais                 | Edição Back-end              | XXXXXXXXXXX         |
| Tipos de materiais                 | Lista Front-end              | XXXXXXXXXXX         |
| Tipos de materiais                 | Lista Back-end               | XXXXXXXXXXX         |
|                                    |                              |                     |
| Permissões                         | Cadastro Front-end           | Thiago              |
| Permissões                         | Cadastro Back-end            | Thiago              |
| Permissões                         | Edição Front-end             | Thiago              |
| Permissões                         | Edição Back-end              | Thiago              |
| Permissões                         | Lista Front-end              | Thiago              |
| Permissões                         | Lista Back-end               | Thiago              |
|                                    |                              |                     |
| Cursos dos usuários                | Vinculação Front-end         | XXXXXXXXXXX         |
| Cursos dos usuários                | Vinculação Back-end          | XXXXXXXXXXX         |
| Cursos dos usuários                | Remoção Front-end            | XXXXXXXXXXX         |
| Cursos dos usuários                | Remoção Back-end             | XXXXXXXXXXX         |
|                                    |                              |                     |
| Disciplinas dos usuários           | Vinculação Front-end         | XXXXXXXXXXX         |
| Disciplinas dos usuários           | Vinculação Back-end          | XXXXXXXXXXX         |
| Disciplinas dos usuários           | Remoção Front-end            | XXXXXXXXXXX         |
| Disciplinas dos usuários           | Remoção Back-end             | XXXXXXXXXXX         |
|                                    |                              |                     |
| Matérias dos usuários              | Vinculação Front-end         | XXXXXXXXXXX         |
| Matérias dos usuários              | Vinculação Back-end          | XXXXXXXXXXX         |
| Matérias dos usuários              | Remoção Front-end            | XXXXXXXXXXX         |
| Matérias dos usuários              | Remoção Back-end             | XXXXXXXXXXX         |
|                                    |                              |                     |
| Conteúdos dos usuários             | Vinculação Front-end         | XXXXXXXXXXX         |
| Conteúdos dos usuários             | Vinculação Back-end          | XXXXXXXXXXX         |
| Conteúdos dos usuários             | Remoção Front-end            | XXXXXXXXXXX         |
| Conteúdos dos usuários             | Remoção Back-end             | XXXXXXXXXXX         |
|                                    |                              |                     |
| Pré-requisitos                     | Cadastro Front-end           | XXXXXXXXXXX         |
| Pré-requisitos                     | Cadastro Back-end            | XXXXXXXXXXX         |
| Pré-requisitos                     | Edição Front-end             | XXXXXXXXXXX         |
| Pré-requisitos                     | Edição Back-end              | XXXXXXXXXXX         |
| Pré-requisitos                     | Lista Front-end              | XXXXXXXXXXX         |
| Pré-requisitos                     | Lista Back-end               | XXXXXXXXXXX         |
|                                    |                              |                     |
| Materiais dos conteúdos            | Vinculação Front-end         | XXXXXXXXXXX         |
| Materiais dos conteúdos            | Vinculação Back-end          | XXXXXXXXXXX         |
| Materiais dos conteúdos            | Remoção Front-end            | XXXXXXXXXXX         |
| Materiais dos conteúdos            | Remoção Back-end             | XXXXXXXXXXX         |
| Materiais dos conteúdos            | Lista Front-end              | XXXXXXXXXXX         |
| Materiais dos conteúdos            | Lista Back-end               | XXXXXXXXXXX         |
|                                    |                              |                     |
| Sistema                            | Login Front-end              | XXXXXXXXXXX         |
| Sistema                            | Login Back-end               | XXXXXXXXXXX         |
| Sistema                            | Logout Front-end             | XXXXXXXXXXX         |
| Sistema                            | Logout Back-end              | XXXXXXXXXXX         |
| Sistema                            | Controle de sessão           | XXXXXXXXXXX         |
|                                    |                              |                     |
| Progresso do aluno                 | Cadastro Front-end           | XXXXXXXXXXX         |
| Progresso do aluno                 | Cadastro Back-end            | XXXXXXXXXXX         |
| Progresso do aluno                 | Edição Front-end             | XXXXXXXXXXX         |
| Progresso do aluno                 | Edição Back-end              | XXXXXXXXXXX         |
| Progresso do aluno                 | Lista Front-end              | XXXXXXXXXXX         |
| Progresso do aluno                 | Lista Back-end               | XXXXXXXXXXX         |
|                                    |                              |                     |
| Árvore curricular                  | Visualização Front-end       | XXXXXXXXXXX         |
| Árvore curricular                  | Visualização Back-end        | XXXXXXXXXXX         |
| Árvore curricular                  | Navegação Front-end          | XXXXXXXXXXX         |
| Árvore curricular                  | Navegação Back-end           | XXXXXXXXXXX         |
| Árvore curricular                  | Expansão de níveis Front-end | XXXXXXXXXXX       |
| Árvore curricular                  | Expansão de níveis Back-end  | XXXXXXXXXXX       |


## Estrutura do projeto

Estrutura obrigatória da disciplina. Não renomeie pastas nem arquivos.

O projeto é separado em duas metades: **`frontend/`** guarda o que roda no
navegador (HTML, CSS, JavaScript e imagens) e **`backend/`** guarda o que roda
no servidor (PHP).

```
ara0062-404_Founders
├─ README.md               este arquivo
├─ frontend/               tudo o que roda no navegador
│   ├─ index.html          a página principal
│   ├─ css/
│   │   └─ estilo.css      estilos do site (a partir da aula 04)
│   ├─ js/
│   │   └─ script.js       comportamento da página (a partir do ciclo 6)
│   └─ img/
│       └─ .gitkeep        arquivo vazio que segura a pasta no Git
└─ backend/                tudo o que roda no servidor
    ├─ config/
    │   └─ conexao.php     conexão com o banco (a partir do ciclo 8)
    └─ processa-contato.php  recebe o formulário (a partir do ciclo 8)
```

Os dois arquivos `.php` começam vazios, só com um comentário dentro. Eles
existem desde já para que o lugar do código de servidor esteja combinado quando
o PHP chegar.

## Como abrir o projeto

1. Baixe ou clone o repositório.
2. Abra a pasta no VS Code (*Arquivo → Abrir Pasta* — a pasta do projeto
   inteira, com `frontend/` e `backend/` dentro).
3. Abra `frontend/index.html` e clique em **Go Live** (extensão Live Server).

Como o `index.html` está dentro de `frontend/`, os caminhos dele ficam assim:

| Para chegar em | Escreva no `index.html` |
|---|---|
| a folha de estilos | `css/estilo.css` |
| o script | `js/script.js` |
| uma imagem | `img/foto.jpg` |
| um arquivo do backend | `../backend/processa-contato.php` |

Os dois pontos (`..`) sobem uma pasta: saem do `frontend/` antes de entrar no
`backend/`.

## Andamento por ciclo

- [x] Ciclo 3 — repositório, equipe e estrutura do projeto
- [ ] Ciclo 3 — `frontend/`: página com listas, tabela e formulário de contato
- [ ] Ciclos 4 e 5 — `frontend/css/`: identidade visual, layout e responsividade
- [ ] Ciclos 6 e 7 — `frontend/js/`: interação, validação e dados via JSON
- [ ] Ciclos 8 a 10 — `backend/`: formulário que grava e lista do banco
