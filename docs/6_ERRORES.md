# Errores conocidos
## Script cache:clear returned with error code 255
La versión de los vendor de esta aplicación esta preparada para versión de php 8.0. Este error
es debido a que el archivo `vendor/psr/cache/src/CacheInterface.php` en la línea 104, la definición
del método `public function expiresAfter(int|\DateInterval|null $time);` introduce parámetros opcionales.

Para solventar esto, podemos instalar en nuestro equipo php 8.0 (y asi el interprete de composer puede
interpretarlo), o editar dicho fichero de interfaz (y los que lo implementan) dejando solo el tipo DateInterval.
