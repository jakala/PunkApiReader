# Comandos en Makefile
Habitualmente vamos a utilizar la terminal para realizar ciertas tareas bastante automáticas. Tareas como levantar el 
contenedor, pasar los tests, ejecutar el php-cs-fixer o generar las métricas de la app...

En este caso hemos definido un archivo `Makefile` para ayudarnos con estas tareas. Los comandos que tenemos
disponibles son:

- `make compose`: nos genera el contenedor de la app, con la extension xdebug instalada y activada.
- `make behat`: ejecuta los test de behat.
- `make metrics`: crea las métricas con php-metrics, dentro de la carpeta var/metrics
- `make fixer`: nos pasa el php-cs-fixer por la carpeta src.
- `make tests`: ejecuta los test de phpunit. También genera la información de cobertura.
- `make vendors`: descarga las carpetas de vendors llamando al composer local.