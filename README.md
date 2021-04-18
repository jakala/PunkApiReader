# PunkApiReader
Se trata de un ejemplo de uso de Symfony 5 con php8, en el que conectamos a
una api de ejemplo. En este caso utilizamos [PunkApi](https://punkapi.com/).

Se incluye un docker-compose para poder probar directamente la aplicación. 

### Makefile

Se añade un archivo `Makefile`, que nos permite simplificar algunas tareas típicas de consola.
Estas tareas son las siguientes:

- crear el contenedor de la app: `make compose`
- ejecutar tests unitarios (creando cobertura test): `make tests`  
- pasar test Behat: `make behat`
- crear métricas de php: `make metrics`
- pasar php-cs-fixer: `make fixer`


### Instalación
- descargamos el ejemplo con git:
```
git clone https://github.com/jakala/PunkApiReader.git
```
- Entramos en el directorio del proyecto, y ejecutamos:
```
make compose
```
- Nos creará un contenedor docker al que podemos acceder con nuestro navegador en:
```
http://localhost:8000
```

### Uso de la api
Disponemos de dos endpoints en este ejemplo:
```
http://localhost:8000/beers

http://localhost:8000/detail-beers
```

Cada endpoint acepta un único parámetro, `food`, el cual debe ser una cadena. 

En el caso del endpoint `/beers?food=meal` se muestran tres campos, id, name y description:
```
[
  {
    "id": 26,
    "name": "Skull Candy",
    "description": "The first beer that we brewed on our newly commissioned 5000 litre brewhouse in Fraserburgh 2009. A beer with the malt and body of an English bitter, but the heart and soul of vibrant citrus US hops.",
  },
  {
    "id": 234,
    "name": "Neon Overlord",
    "description": "The Overlord of mango and chili IPA’s packs a fruity punch and then some. Pours a slightly hazy orange. A tropical fruit assault on the nose, with mango, pineapple, apricots and citrus. Hints of chili and sweet malts follow. Fruit dissipates to a chili kick, not hot but definitely there, followed by a long bitter finish. All hail to the hot tempered sweet toothed Lord.",
  }
]
```

En el caso del endpoint `/detail-beers?food=meal` se muestran ademas tres parametros a mayores, image_url, tagline y first_brewed:
```
[
  {
    "id": 26,
    "name": "Skull Candy",
    "description": "The first beer that we brewed on our newly commissioned 5000 litre brewhouse in Fraserburgh 2009. A beer with the malt and body of an English bitter, but the heart and soul of vibrant citrus US hops.",
    "image_url": "https://images.punkapi.com/v2/keg.png",
    "tagline": "Pacific Hopped Amber Bitter.",
    "first_brewed": "02/2010"
  },
  {
    "id": 234,
    "name": "Neon Overlord",
    "description": "The Overlord of mango and chili IPA’s packs a fruity punch and then some. Pours a slightly hazy orange. A tropical fruit assault on the nose, with mango, pineapple, apricots and citrus. Hints of chili and sweet malts follow. Fruit dissipates to a chili kick, not hot but definitely there, followed by a long bitter finish. All hail to the hot tempered sweet toothed Lord.",
    "image_url": "https://images.punkapi.com/v2/234.png",
    "tagline": "Mango And Chilli IPA",
    "first_brewed": "01/2016"
  }
]
```
### tests unitarios
Para ejecutar los test, y crear al mismo tiempo la cobertura en `var/coverage`:
```
make tests
```

### Notas
- Actualmente solo admitimos el parámetro `food`. Cualquier otro parámetro es ignorado en el proceso.
- No cumplimos RESTfull al completo, debido a que realmente devolvemos resultados, en lugar de 
recursos (en un listado debería llegar una lista de recursos que cumplen los requisitos, no los
resultados de esos recursos).
- Al ser una app pequeña, no he considerado añadir los conceptos de `context` y `bounded-context` 
dentro de la estructura. En su lugar tenemos algo más básico con los directorios de `application`, 
`Domain` e `Infrastructure`.

# TODO
- implementar CQRS
- despliegue con CI/CD (quizás github actions?)
- control propio de errores (mostrar un json con una respuesta de la exception lanzada)