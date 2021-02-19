<p align="center">
    <img src="https://i.ibb.co/YZzgkyX/Logo.png" height="70" alt="duet logo"/>
    <br/>
    <img src="https://i.ibb.co/gDLCd6h/Logotipo.png" height="70" alt="duet logo"/>
</p>

## O que é o Duet?
O Duet é o ínicio de uma ideia de projeto pessoal. Feito de forma bem simplificada ao que era inicialmente, o Duet é um sistema de busca de músicas e letras de músicas. Nesse sistema, o usuário pode se cadastrar e procurar por músicas para salvar em sua playlist, além de você conseguir procurar pelas letras de suas músicas favoritas para cantar junto e até mesmo cadastrar suas próprias músicas em nosso banco de dados para que outras pessoas te conheçam.


## Status do projeto
  <h4 align="center"> 
	🚧  Projeto em construção...  🚧
  </h4>
  
 <p align="center"> 
    <b>OBS:</b> Esse projeto é um trabalho final do processo seletivo interno para o cargo de Tech Lead na EJCM.
 </p>


Conteúdo
=================
 * [Features](#features)
 * [Pré-requisitos](#pré-requisitos)
 * [Instalação](#instalação)
 * [Configuração](#configuração)
 * [Uso](#uso)
 * [Desafios](#desafios)
 * [Bibliotecas](#bibliotecas)
 * [Modelagem](#modelagem)
 * [Créditos](#créditos)
 * [Autora](#autora)

## Features
- [x] Criar, listar, mostrar, atualizar e deletar usuário
- [x] Criar, listar, mostrar, atualizar e deletar música
- [x] Cadastro
- [x] Login
- [x] Logout
- [x] Mostrar dados do usuário logado
- [x] Mostrar playlist do usuário logado
- [x] Adicionar e remover músicas da playlist
- [x] Procurar músicas por nome e artista
- [x] Procurar letras de música

## Pré-requisitos
<a href="https://www.apachefriends.org/pt_br/download.html">
Instalação Xampp - versão >7.3
</a>
<br/>
<a href="https://getcomposer.org/download/">
Instalação Composer
</a>
<br/>
<a href="https://insomnia.rest/download/">
Instalação de ferramenta para fazer as requisições na API (Insomnia, Postman)	
</a>

## Instalação
+ Faça a clonagem do projeto;
``` bash
$ git clone https://github.com/naygomes/duet.git
```
+ Estando dentro da pasta do duet, entre na pasta 'back' e execute o seguinte comando no terminal:
``` bash
$ composer install
```

## Configuração

+ Entre na pasta 'back' e copie o arquivo .env.example e renomeie essa cópia com o nome .env. Se estiverem pelo terminal, execute o seguinte comando no terminal:
``` bash
$ cp .env.example .env
```
+ Crie um banco de dados em sua plataforma de gerenciamento (PhpMyAdmin, no caso do Xampp) e, no arquivo .env, coloque o mesmo nome no campo 'DATABASE';
+ Vá ao site da <a href="https://auth.vagalume.com.br/settings/api/">API vagalume</a> e pegue sua credencial;
+ No arquivo .env, adicione a seguinte linha, substituindo o {sua credencial} pela credencial obtida na API:
``` bash
API_KEY = {sua credencial}
```
+ A seguir, rode os seguintes comandos, ainda na pasta 'back':
``` bash 
$ php artisan key:generate
$ php artisan passport:install
```
+ Na pasta 'back', digite os seguinte comando para criar as tabelas do banco:

```bash
$ php artisan migrate 
```


## Uso
+ Para interagirmos com a aplicação, precisamos servir o projeto.
```bash
$ php artisan serve 
```

+ Url de acesso:
```
Backend: http://localhost:8000/
```
## Desafios

## Bibliotecas

## Protótipo e Modelagem

## Créditos

## Autora


