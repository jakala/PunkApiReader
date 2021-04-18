# PunkApiReader
Se trata de un ejemplo de uso de Symfony 5 con php8, en el que conectamos a
una api de ejemplo. En este caso utilizamos [PunkApi](https://punkapi.com/).

Se incluye un docker-compose para poder probar directamente la aplicación. 

## Requisitos
- php 8.0 instalado en local
- Docker y Docker-compose
- composer

## Documentación
- Información sobre  [SOLID y DDD](docs/1_DDD.md)
- [Instalación](docs/2_INSTALACION.md)
- [Uso de la Api](docs/3_USO_DE_API.md)
- [Makefile](docs/4_MAKEFILE.md)
- [test unitarios y behat](docs/5_TESTS.md)
- [Errores conocidos](docs/6_ERRORES.md)

## Notas
- Actualmente solo admitimos el parámetro `food`. Cualquier otro parámetro es ignorado en el proceso.
- No cumplimos RESTfull al completo, debido a que realmente devolvemos resultados, en lugar de 
recursos (en un listado debería llegar una lista de recursos que cumplen los requisitos, no los
resultados de esos recursos).
- Al ser una app pequeña, no he considerado añadir los conceptos de `context` y `bounded-context` 
dentro de la estructura. En su lugar tenemos algo más básico con los directorios de `application`, 
`Domain` e `Infrastructure`.

## Lista TODO
- implementar CQRS
- despliegue con CI/CD (quizás github actions?)
- control propio de errores (mostrar un json con una respuesta de la exception lanzada)