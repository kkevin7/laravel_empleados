#Instalar dependencias de composr
composer install
#Generar una nueva llave al proyecto
php artisan key:generate
#Limpiar el cache de la configuración
php artisan config:cache
#Crear las tablas de la base de datos
php artisan migrate
#Crear un enlace al storage del proyecto de laravel
php artisan storage:link
#Levantar el servidor de aplicaciones
php artisan serve