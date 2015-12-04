<?php

use Symfony\Component\HttpFoundation\Request;

require __DIR__.'/../app/autoload.php';

$request = Request::createFromGlobals();

if (strpos($request->getPathInfo(), '/api') === 0) {
    require __DIR__.'/../app/ApiKernel.php';
    $kernel = new ApiKernel('dev', true);
} else {
    require __DIR__.'/../app/WebKernel.php';
    $kernel = new WebKernel('dev', true);
}

$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);