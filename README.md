## Levantar servidor
php -S localhost:8000 -t public

## Migrar Base de Datos
php artisan migrate

## Migrar Base de datos en limpio (se vuela todo)
php artisan migrate:fresh

## Reversión de migración
php artisan migrate:rollback

## Crear modelos
php artisan make:model NombreEntidad -m

## Crear controlador de modelos
php artisan make:controller EntidadController