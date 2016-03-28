<?php

require_once __DIR__."/../app/bootstrap.php";

/**
 * Just proving that the service container is working here
 */
$container->get('test_container_class')->go();

/**
 * Proof that the dispatcher works!!
 */
$container->get('event_dispatcher')->dispatch('test_test');