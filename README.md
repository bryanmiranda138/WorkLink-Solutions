## Levantar servidor Laravel
php -S localhost:8000 -t public

## Levantar servidor adicional
npm run dev

## Migrar Base de Datos
php artisan migrate

## Migrar Base de datos en limpio (se vuela todo)
php artisan migrate:fresh

## Reversión de migración
php artisan migrate:rollback

## Crear modelos con migración incluida
php artisan make:model NombreEntidad -m

## Crear controlador de modelos
php artisan make:controller EntidadController

## Crear seeder
php artisan make:seeder NombreSeed

## Aplicar seed de BD
php artisan db:seed

## Usuario Postulante
## Email: post01@gmail.com
## Contraseña: 123456789

## Usuario Empresa
## Email: empre01@gmail.com
## Contraseña: 123456789

## Usuario Súper Admin
## Email: super01@gmail.com
## Contraseña: 123456789