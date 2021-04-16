<?php
namespace App\Infrastructure\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HealthCheckGetController
{
    public function __invoke(): Response
    {
        return new JsonResponse(
            ['status' => 'ok']
        );
    }
}