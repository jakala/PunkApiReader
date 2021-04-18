# Estructura DDD
Dado que la aplicación es bastante sencilla, la estructura de carpetas de `src` se ha simplificado:
```
src/
├── Application
│   ├── Command
│   ├── Handler
│   ├── Response
│   └── Service
├── Domain
│   ├── Entity
│   ├── Event
│   ├── Exception
│   ├── Repository
│   └── ValueObject
└── Infrastructure
   ├── Controller
   ├── Exception
   ├── Repository
   └── Service
```
## Domain
Tenemos dentro de esta carpeta todo lo referente a la parte de Dominio de nuestro negocio (en este caso, relacionado
con las cervezas que devuelve la api).

- `Entity` En nuestro dominio tenemos `beer` y `beerList` que son respectivamente las cervezas y los listados de éstas.
- `Events` (de momento ninguno, preparado para un futuro CQRS)
- `Exceptions` (de dominio). Ciertos ValueObjects lanzan excepciones al comprobar el tipo de dato.
- `Repository` (donde están las interfaces) Para que la implementación en infraestructura cumpla estas interfaces. 
  De momento, solo tenemos repository
- `ValueObjects` son nuestros tipos de dato para validar que las entidades se componen correctamente.

## Application
Dentro de esta carpeta tenemos la parte lógica de los servicios que se requieren para cumplir los casos de uso:
- `Command` Aquí están los elementos que utilizaremos para un futuro CQRS, incluyendo los QUERY y los COMMAND.
- `Handler` Para una futura CQRS. Los controladores de Arquitectura suelen llamar al handler.
- `Response` Los tipos de respuesta que se esperan en la salida de los servicios utilizados.
- `Service` Ciertas lógicas que componen los datos para proporcionar las salidas de tipo Response.

## Infrastructure
- `Controller`: Nuestros puntos de entrada a la aplicación. Normalmente utilizarán un handler de Application
- `Exception`: Ciertas lógicas van a lanzar excepciones en el ámbito de infrastructure. Las ponemos aquí.
- `Repository`: las implementaciones de los repositories que acceden y guardan datos. Deben implementar las 
  interfaces de dominio
  `Service`: inicialmente en blanco, esta carpeta está reservada para los servicios a este nivel.