# Sobre o projeto

É um sistema que permite que você cadastre uma conta e crie salas, onde as mesmas podem ser privadas ou públicas. Se for pública qualquer pessoa que se registrar pode ter acesso, visualizando antes de entrar o conteúdo da sala, mas sendo privada, terá um aviso informando que a sala precisa de senha e que ao clicar no aviso, o usuário é redirecionado ao formulário, onde precisará informar a senha para acessar o conteúdo.

## Quais as tecnologias utilizadas?

- Laravel 9

- Css

- Bootstrap

- Html

- mysql

- php

## O que é necessário para rodar o projeto?

Para rodar o projeto é necessário possuir o composer, laravel 9, php no projeto local ou na máquina, um editor de texto, um banco de dados e o git. 

- Para o editor de texto, eu, particulamente gosto do [visual studio code installer](https://code.visualstudio.com/Download), nesse link tem os exequíveis com os sistemas operacionais linux, windows e mac.

- Para instalar o php: [php no windows](https://www.youtube.com/watch?v=KwEilZK5d04), [php no linux ubuntu](https://www.youtube.com/watch?v=csrc12y5zPk)

- Para instalar o composer na máquina: clique neste link e cairá na página oficial do [Composer page download](https://getcomposer.org/download/), e entrando na página, baixe o arquivo .exe. E para usar no local cole esses comandos no terminal:

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

php composer-setup.php

php -r "unlink('composer-setup.php');"
```

- Para instalar o laravel [documentação laravel](https://laravel.com/docs/9.x/installation) só seguir os passos da documentação :}

- Para instalar o banco de dados, eu gosto de usar o [mariadb](https://mariadb.org/download/?t=mariadb&p=mariadb&r=10.11.0&os=windows&cpu=x86_64&pkg=msi&m=fder), e inclusive foi o que eu usei no projeto.

- Para instalar o git: [Git installer](https://git-scm.com/downloads), aqui tem vários sistemas operacionais.

### Rodando o projeto

Possuindo todas essas tecnologias instaladas na máquina, vamos começar. Primeiramente, abri uma pasta na área de trabalho e abra o git dentro da pasta e cole o código:

```
git clone https://github.com/Felipeerick/E-rural-teste
```

O git irá clonar tudo para a pasta. Depois disso abra o visual studio code e abra a pasta que o git clonou e rode o comando, se você instalou na máquina o composer.
```
composer update
```
Senão,
```
php composer.phar update
```
Para rodar em outro sistema operacional ou como composer local, use para conhecer mais sobre a ferramenta e seus comandos [referência 1](https://www.hostinger.com.br/tutoriais/como-instalar-e-usar-o-composer) e [referência 2](https://getcomposer.org/doc/).

Depois, crie um banco de dados no mariadb usando esses códigos:
```
mariadb -u root (se você não alterou o nome do usuário) -p
(e a senha se você colocou senha) ex:12345

create database teste_e-rural;
```

Agora você terá que clonar o arquivo .env.example e renomear para .env, caso esteja com APP_KEY vazio rode o comando:

```
php artisan key:generate
```

Agora configure o arquivo .env com essas variáveis:
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:+fz8R7pMAevgO8l8o89bgAlqJsAe5fCOhMHDYIPbZuA=
APP_DEBUG=true
APP_URL=http://localhost:8000
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=teste_e-rural
DB_USERNAME=root
DB_PASSWORD=12
```
Rode o comando agora 
```
php artisan migrate
php artisan serve
```

Pronto!! O projeto vai estar rodando, vá no seu navegador e digite localhost:8000
