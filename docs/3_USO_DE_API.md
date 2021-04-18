# Uso de la API
Disponemos de dos endpoints en este ejemplo:
```
http://localhost:8000/get-beers?food={string}

http://localhost:8000/get-detail-beers?food={string}
```

Cada endpoint acepta un único parámetro, `food`, el cual debe ser una cadena.

En el caso del endpoint `/get-beers?food=meal` se muestran tres campos, id, name y description:
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

En el caso del endpoint `/get-detail-beers?food=meal` se muestran ademas tres parametros a mayores, image_url, tagline y first_brewed:
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