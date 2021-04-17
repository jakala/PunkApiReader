<?php
namespace App\Tests\Infrastructure\Controller;

use App\Infrastructure\Controller\HealthCheckGetController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class HealthCheckGetControllerTest extends TestCase
{
    /** @test */
    public function should_return_json_response(): void
    {
        $controller = new HealthCheckGetController();
        $response = $controller->__invoke();

        $this->assertInstanceOf(JsonResponse::class, $response);
    }
}
