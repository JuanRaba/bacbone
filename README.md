## Pasos de Instalación

1. Instala las dependencias: docker, docker-compose. (https://docs.docker.com/engine/install/)
2. Crea una copia de .env.example a .env y configurar las variables de base de datos correspondientes. (DB_PASSWORD) Nota: Si desea usar Postgres dockerizado como en este proyecto revise el archivo docker-compose.yml. <br><br>
Luego correr los siguientes comandos:

3. `docker-compose build`, para crear los contenedores.
4. `docker-compose up -d`
5. `docker-compose exec laravel.test composer install`
6. `docker-compose exec laravel.test php artisan key:generate`
7. `docker-compose exec laravel.test php artisan migrate`
8. `docker-compose exec laravel.test php artisan db:seed`

