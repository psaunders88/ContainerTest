<?php

require_once __DIR__."/../vendor/autoload.php";

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\EventDispatcher\DependencyInjection\RegisterListenersPass;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;

/**
 * This bootstrap is for setting up the container and the event dispatcher for 
 * use in a small project.
 * 
 * I've also set up the cache as a reminder of how to do it.
 */

$file = __DIR__ .'/cache/container.php';

if (file_exists($file)) {
    require_once $file;
    $container = new ProjectServiceContainer();
} else {
    $container = new ContainerBuilder();
    $container->addCompilerPass(new RegisterListenersPass());

    $container->setDefinition('event_dispatcher', new Definition(
        'Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher',
        [new Reference('service_container')]
    ));

    $loader = new YamlFileLoader($container, new FileLocator(__DIR__));
    $loader->load(__DIR__.'/config/services.yml');

    $container->compile();
    
    $dumper = new PhpDumper($container);
    file_put_contents($file, $dumper->dump());
}
