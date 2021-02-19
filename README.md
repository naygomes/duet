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
    <b>OBS:</b> Esse projeto é um trabalho final do processo seletivo interno(PSI) para o cargo de Tech Lead na EJCM.
 </p>


Conteúdo
=================
 * [Features](#features)
 * [Pré-requisitos](#pré-requisitos)
 * [Instalação](#instalação)
 * [Configuração](#configuração)
 * [Uso](#uso)
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
<a target="blank" href="https://www.apachefriends.org/pt_br/download.html">
Instalação Xampp - versão >7.3
</a>
<br/>
<a target="blank" href="https://getcomposer.org/download/">
Instalação Composer
</a>
<br/>
<a target="blank" href="https://insomnia.rest/download/">
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
+ Vá ao site da <a target="blank" href="https://auth.vagalume.com.br/settings/api/">API vagalume</a> e pegue sua credencial;
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
http://localhost:8000/
```

## Bibliotecas
+ "php": "^7.3|^8.0",
+ "guzzlehttp/guzzle": "^7.2",
+ "laravel/framework": "^8.12",
+ "laravel/passport": "^10.1",

## Modelagem
+ Modelagem do Banco de Dados: ![Modelagem](https://i.ibb.co/M6yV2gX/modelagem.png)

---
## Créditos
Gostaria de agradecer a todos que me ajudaram de alguma forma a iniciar esse projeto e seguir em frente no PSI. Em especial, agradeço à Carol, ao Ruas e à Gabi Jandres por me apoiarem a prosseguir, tanto no início, quando eu ainda nem sabia do PSI quanto na caminhada até agora, e que também me ajudaram bastante com o código; à Mileny que foi minha parceira de squad nesta etapa final e me ajudou bastante nesse projeto; e à Júlia Pohlmann que me ajudou a solucionar problemas no código que eu não conseguia resolver.

## Autora
<a href="">
 <img style="border-radius: 50px;" src="https://i.ibb.co/59Fv8Kk/73113320-2410045732445910-2665005212640477184-n-2.jpg" width="100" alt="foto da autora"/>
 <br /></a>
 
 Nayara Gomes<br/>
 <sub><b>Dev frontend - EJCM</b></sub><br/>
 <sub><b>Dev frontend - Venha pra Nuvem</b></sub>

[![Linkedin Badge](https://img.shields.io/badge/-Nayara-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/nayara-gomes-15727756/)](https://www.linkedin.com/in/nayara-gomes-15727756/) 
[![Gmail Badge](https://img.shields.io/badge/-nayara.gomes13@poli.ufrj.br-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:nayara.gomes13@poli.ufrj.br)](mailto:nayara.gomes13@poli.ufrj.br)

