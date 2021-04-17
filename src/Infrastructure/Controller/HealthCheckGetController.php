<?php
namespace App\Infrastructure\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class HealthCheckGetController
 * @package App\Infrastructure\Controller
 */
class HealthCheckGetController
{
    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return new JsonResponse(
            ['status' => 'ok']
        );
    }
}
