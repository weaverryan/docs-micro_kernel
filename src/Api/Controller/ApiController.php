<?php

namespace Api\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController
{
    /**
     * @Route("/json")
     */
    public function jsonAction()
    {
        return new JsonResponse(['kernel' => 'api']);
    }
}