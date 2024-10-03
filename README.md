# Gerenciador de Produtos

Este projeto é uma aplicação web simples para o gerenciamento de produtos. Ele foi desenvolvido utilizando Angular no front-end e Yii2 no back-end, permitindo a criação, edição e remoção de produtos. O projeto é composto por três funcionalidades principais: visualização de produtos, cadastro de novos produtos e edição/exclusão de produtos existentes.

## Funcionalidades

- **Ver Produtos**: Exibe uma lista de produtos cadastrados, com informações como ID, nome, quantidade, categoria e opções para editar ou deletar.
- **Adicionar Produto**: Formulário para cadastrar novos produtos no sistema, especificando nome, quantidade e categoria.
- **Editar/Deletar Produtos**: Cada produto pode ser editado ou deletado diretamente da lista de produtos.

## Tecnologias Utilizadas

- **Front-end**: Angular
- **Back-end**: Yii2
- **Estilização**: Bootstrap e CSS personalizado

## Como Executar o Projeto

### Requisitos
- Node.js
- Angular CLI
- PHP 7.x ou superior
- Composer

### Configurando o Front-end
1. Clone este repositório.
   ```bash
   git clone https://github.com/GustavoFonsecalog/Seons-CRUD.git
Acesse o diretório do front-end (Angular).
bash
Copiar código
cd seu-projeto-angular
Instale as dependências do projeto.
bash
Copiar código
npm install
Inicie o servidor de desenvolvimento.
bash
Copiar código
ng serve
Acesse o front-end no seu navegador em: http://localhost:4200.
Configurando o Back-end
Acesse o diretório do back-end (Yii2).
bash
Copiar código
cd seu-projeto-yii2
Instale as dependências do projeto utilizando o Composer.
bash
Copiar código
composer install
Configure o arquivo .env ou config/db.php com as informações do seu banco de dados.
Execute as migrações do banco de dados.
bash
Copiar código
php yii migrate
Inicie o servidor PHP.
bash
Copiar código
php -S localhost:8080
O back-end estará acessível em: http://localhost:8080.

Imagens do Projeto
Página Inicial - Gerenciador de Produtos
![image](https://github.com/user-attachments/assets/cc0027de-8ecb-4cfe-b5aa-d42ed25e56f7)


Listagem de Produtos
![image](https://github.com/user-attachments/assets/8e17881f-c3b3-456c-aca9-13bf9025f4b8)


Formulário de Cadastro de Produto
![image](https://github.com/user-attachments/assets/451b86ff-2624-4933-953b-77fab6baade8)


Desenvolvido por Gustavo Fonseca.
