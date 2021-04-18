# S.O.L.I.D.
en principio, dado que la aplicación es bastante pequeña, no incorporamos CQRS, ni mensajeria de eventos 
de dominio, no podemos "cumplir" todos los principios SOLID. 
## Cumplimos SRP, ISP, DIP
- `SRP`: lo encontramos en todas las clases, cumpliendo que cada una de ellas hace una unica "acción" dentro
de su lógica. El Handler, los distintos Services, e incluso la implementación del Repository
únicamente tienen un método expuesto (además del constructor, necesario para la composición).
- `ISP`: tenemos (en este caso) una interfaz de dominio, el cual cumple la implementación, PERO 
en el servicio (en este caso, el Handler) se requiere en la composición dicho interfaz en lugar de
  la clase correspondiente.
- `DIP`: El mismo ejemplo que tenemos en ISP lo encontramos aquí, puesto que el Handler requiere el interfaz
en lugar de la clase repository de implementación.

## No aplican OCP, LIP
- `OCP`: este principio no se aplica de momento, dado que no tenemos un sistema de mensajeria de eventos.
- `LIP`: actualmente no hay ninguna clase principal y alguna que herede de esta. Por lo tanto, este principio
no se puede aplicar de momento.

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