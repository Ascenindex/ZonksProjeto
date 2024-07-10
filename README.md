# Zonks Projeto CRM

## Visão Geral
O Zonks Projeto é um sistema de CRM (Customer Relationship Management) desenvolvido para gerenciar clientes, empresas e produtos, além de fornecer uma interface para realizar transações e acompanhar o desempenho. O projeto utiliza PHP para o backend e HTML, CSS, e JavaScript para o frontend.

## Tecnologias Utilizadas
- PHP
- MySQL (ou outro banco de dados compatível)
- HTML
- CSS
- JavaScript

[![Top Langs](https://github-readme-stats.vercel.app/api/top-langs/?username=ascenindex&layout=donut-vertical)](https://github.com/ascenindex/github-readme-stats)

### Controllers
Os controladores são responsáveis por gerenciar a lógica da aplicação e interagir com os modelos.

### Models
Os modelos definem a estrutura do banco de dados e interagem com o PHP para realizar operações CRUD.

### Public
Contém arquivos estáticos, como imagens, CSS e JavaScript.

### Views
Contém os arquivos PHP e Handlebars para renderizar as páginas da aplicação.

## Instalação
Para instalar e rodar a aplicação localmente, siga os passos abaixo:

1. Clone o repositório:
   ```bash
   git clone <URL do repositório>
   cd zonksProjeto/app
composer install
php -S localhost:8000
// Exemplo de configuração
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'senha');
define('DB_NAME', 'nome_do_banco');

Sinta-se à vontade para ajustar conforme necessário. Este README fornece uma estrutura básica e informações essenciais sobre o seu projeto CRM.
