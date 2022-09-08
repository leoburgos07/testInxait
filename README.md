
## TEST DESARROLLADOR INXAIT COPR.


Esta es una prueba realizada para el cargo de desarrollador WEB solicitada por Inxait Corp.

## Pasos para correr el proyecto en local.

- composer install / composer update
- php artisan migrate
- php artisan serve 

## FUNCIONAMIENTO
- La aplicación está terminada al 100% solo se utilizó una tabla "users" debido a la implementación de una API que se consume para cargar los departamentos y las ciudades de colombia.
- Para el item del Excel se usó una librería de laravel llamada Laravel Excel https://laravel-excel.com/ Este botón en la vista principal se muestra una vez registrado el primer usuario y descarga archivo de extension .xlsx con la data actual de usuarios registrados.
- El apartado de escoger un ganador es una función que escoge un usuario al azar dentro de la colección de usuarios actual siempre y cuándo hayan 5 o más usuarios registrados, si hay menos aparece un mensaje que el minimo son 5 usuarios registrados.
