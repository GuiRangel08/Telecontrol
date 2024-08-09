# Instruções 

## Como executar o teste

- execute o comando `docker compose up -d` e aguarde o build da imagem
- acesse no navegador http://localhost:8080/

### Observações
- Após clonar o repositório e buildar a imagem docker, libere as permissões de pasta para evitar qualquer problema.
- É necessário instalar todas as dependencias para utilizar

### dependencias do projeto
- php 8.2
- postgres v13
- docker v27.1.1
- docker-compose v2.28.1

# Sobre

## Teste Prático para Área de Desenvolvimento

### Instruções para o Teste Prático

- Objetivo
	- O objetivo deste teste é avaliar suas habilidades técnicas em desenvolvimento web, bem
como sua capacidade de resolver problemas e escrever código limpo e eficiente.
- Tarefas
	- O teste se baseia no fluxo simples de abertura de Ordem de Serviço, onde, deverá ter as
funcionalidades para Cadastros de Clientes, Produtos e a Ordem de Serviço em si.

- Linguagens e Ferramentas
	- Para o desenvolvimento do teste abaixo, não deverá ser utilizado nenhum Framework.
	- Para o back-end deverá utilizar PHP, sendo Procedural ou Orientado a Objetos.
	- Para o Front-end poderá utilizar HTML, JavaScript, Jquery e Bootsrtap
- Banco de dados Postgres ou MySQL.

### Instruções de desenvolvimento

- Clientes
	- Criar CRUD de Clientes contendo os dados básico (Nome, CPF e Endereço)
- Produtos
	- Criar CRUD de Produtos os dados básico (Código, Descrição, Status, Tempo
Garantia)
- Ordem de Serviço
	- Criar CRUD de Ordem de Serviço
	- A tela de cadastro deverá conter um formulário contendo pelo menos os seguintes
- campos
	- Número Ordem
	- Data Abertura
	- Nome do Consumidor
	- CPF Consumidor
	- Produto (deverá deixar informar apenas os produtos já cadastrados)
OBS: Se o cliente informado não existir o cadastro dele, deverá cadastrá-lo
automaticamente e retornar o ID para gravar na tabela ordem


