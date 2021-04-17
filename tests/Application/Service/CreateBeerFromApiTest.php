<?php

namespace App\Tests\Application\Service;

use App\Application\Service\CreateBeerFromApi;
use App\Domain\Entity\Beer;
use App\Domain\Exception\ImageUrlException;
use App\Domain\Exception\FirstBrewedException;
use PHPUnit\Framework\TestCase;

class CreateBeerFromApiTest extends TestCase
{
    /** @test */
    public function should_return_a_valid_beer():void
    {
        $item = $this->getItem();
        $service = new CreateBeerFromApi();
        $result = $service->createBeer($item);

        $this->assertInstanceOf(Beer::class, $result);
    }

    /** @test */
    public function should_throw_an_image_exception():void
    {
        $this->expectException(ImageUrlException::class);
        $item = $this->getItem();
        $item['image_url'] = 'https://bad_host.com/image.gif';
        $service = new CreateBeerFromApi();
        $service->createBeer($item);
    }

    /** @test */
    public function should_throw_a_first_brewed_exception():void
    {
        $this->expectException(FirstBrewedException::class);
        $item = $this->getItem();
        $item['first_brewed'] = '2020-89';
        $service = new CreateBeerFromApi();
        $service->createBeer($item);
    }


    private function getItem(): array
    {
        return [
            'id' => 1,
            'name'=> 'beer example',
            'description' => 'beer description',
            'image_url' => 'https://images.punkapi.com/image.gif',
            'tagline' => 'this is an example of a tagline',
            'first_brewed' => '4/2019'
        ];

    }

}
