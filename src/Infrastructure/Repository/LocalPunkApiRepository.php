<?php

namespace App\Infrastructure\Repository;

use App\Application\Command\FoodQuery;
use App\Domain\Repository\BeerRepositoryInterface;

/**
 * Class PunkApiRepository.
 */
class LocalPunkApiRepository implements BeerRepositoryInterface
{
    public function searchByCriteria(FoodQuery $query): array
    {
        $meal = $query->food()->getValue();

        return [
            [
                'id' => 26,
                'name' => 'Skull Candy',
                'description' => 'The first beer that we brewed on our newly commissioned 5000 litre brewhouse in Fraserburgh 2009. A beer with the malt and body of an English bitter, but the heart and soul of vibrant citrus US hops.',
                'image_url' => 'https://images.punkapi.com/v2/keg.png',
                'tagline' => 'Pacific Hopped Amber Bitter.',
                'first_brewed' => '02/2010',
                'meal' => $meal,
            ],
            [
                'id' => 234,
                'name' => 'Neon Overlord',
                'description' => 'The Overlord of mango and chili IPA’s packs a fruity punch and then some. Pours a slightly hazy orange. A tropical fruit assault on the nose, with mango, pineapple, apricots and citrus. Hints of chili and sweet malts follow. Fruit dissipates to a chili kick, not hot but definitely there, followed by a long bitter finish. All hail to the hot tempered sweet toothed Lord.',
                'image_url' => 'https://images.punkapi.com/v2/234.png',
                'tagline' => 'Mango And Chilli IPA',
                'first_brewed' => '01/2016',
                'meal' => $meal,
            ],
        ];
    }
}
