# Gerenciador de Estudos

## Como rodar essa aplicação?
<small>(Serve para aplicações laravel 8 no geral)</small>
Para utilizar a aplicação você precisa ter configurado localmente um ambiente de desenvolvimento Laravel 8 + MySQL
<br>
Depois de ter feito o download do app, siga esses passos:
<ol>
<li>Crie a base de dados MySQL, geestudos</li>
<li>Edite o arquivo .env.example. Insira as credenciais do seu SGDB e altere o nome da base de dados. renomeie o arquivo para: .env</li>
<li>Mude seu terminal para a raiz do projeto.E insira os seguintes comandos:</li>
<li>composer update</li>
<li>php artisan key:generate</li>
<li>php artisan migrate</li>
<li>php artisan storage:link</li>
<li>php artisan serve</li>
</ol>

## Utilizando o sistema 