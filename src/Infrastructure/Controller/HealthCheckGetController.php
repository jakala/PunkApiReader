<?php

namespace App\Infrastructure\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class HealthCheckGetController.
 */
class HealthCheckGetController
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse(
            ['status' => 'ok']
        );
    }
}
