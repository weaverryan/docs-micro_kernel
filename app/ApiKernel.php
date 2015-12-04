<?php

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

class ApiKernel extends Kernel
{
    use MicroKernelTrait;

    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle()
        );

        return $bundles;
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config.yml');
        $loader->load(__DIR__.'/config/api.yml');
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        $routes->import(
            __DIR__.'/../src/Api/Controller/',
            '/api',
            'annotation'
        );
    }

    public function getCacheDir()
    {
        return __DIR__.'/../var/cache/api/'.$this->getEnvironment();
    }
}
