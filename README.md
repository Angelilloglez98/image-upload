## Para migraciones 

php bin/console make:migration
php bin/console doctrine:migrations:migrate

## Ver credenciales usadas en las direcciones de base de datos 

php bin/console debug:container --env-vars

## Acceder a contenedor 

docker exec -it unsplashdev-php-1 /bin/sh

docker exec -it image-upload-database-1 /bin/sh

docker exec -it image-upload-caddy-1 /bin/sh


Para iniciar el proyecto es necesario tener docker instalado, y para levantarlo hay que usar el comando "docker compose up -d"

# symfony-projects
