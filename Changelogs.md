### PunkApiReader
- v0.3.0: se añade un Makefile para simplificar algunas tareas de ejecución en consola, como

   crear el contenedor

   ejecutar los tests unitarios y la cobertura de test

   ejecutar los test Behat

   crear las metricas php

   ejecutar php-cs-fixer en el repositorio


- v0.2.0: añadidas las herramientas de cobertura y metricas. 
  
   Varios tests hasta llegar a cobertura de 82% de unitarios
  
   Refactor para intentar cumplir DDD correctamente


- v0.1.0: Primera version de Aplicación symfony 5 con PHP8. Estructura de directorios para seguir DDD. Varios ValueObjects, exceptions. Dos endpoints disponibles: `/beers` y `/detail-beers`