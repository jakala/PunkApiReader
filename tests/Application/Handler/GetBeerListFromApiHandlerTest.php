<?php
namespace tests\App\Application\Handler;

use PHPUnit\Framework\TestCase;

class GetBeerListFromApiHandlerTest extends TestCase
{
    /** @test */
    public function it_should_generate_random_number(): void
    {
        $number = \random_int(1,100);

        $this->assertIsNumeric($number);
    }
    /** @test */
    public function it_should_generate_string_number(): void
    {
        $number = \random_int(1,100);

        $this->assertIsString($number);
    }

}
