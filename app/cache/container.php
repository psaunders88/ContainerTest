<?php

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * ProjectServiceContainer.
 *
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 */
class ProjectServiceContainer extends Container
{
    private $parameters;
    private $targetDirs = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->services = array();
        $this->methodMap = array(
            'event_dispatcher' => 'getEventDispatcherService',
            'second_test_listener' => 'getSecondTestListenerService',
            'test_container_class' => 'getTestContainerClassService',
            'test_listener' => 'getTestListenerService',
        );

        $this->aliases = array();
    }

    /**
     * {@inheritdoc}
     */
    public function compile()
    {
        throw new LogicException('You cannot compile a dumped frozen container.');
    }

    /**
     * Gets the 'event_dispatcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher A Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher instance.
     */
    protected function getEventDispatcherService()
    {
        $this->services['event_dispatcher'] = $instance = new \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher($this);

        $instance->addListenerService('test_test', array(0 => 'test_listener', 1 => 'dispatched'), 0);
        $instance->addListenerService('test_test', array(0 => 'second_test_listener', 1 => 'dispatched'), 0);

        return $instance;
    }

    /**
     * Gets the 'second_test_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PSaunders\Listener\SecondTestListener A PSaunders\Listener\SecondTestListener instance.
     */
    protected function getSecondTestListenerService()
    {
        return $this->services['second_test_listener'] = new \PSaunders\Listener\SecondTestListener();
    }

    /**
     * Gets the 'test_container_class' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PSaunders\Test\Test A PSaunders\Test\Test instance.
     */
    protected function getTestContainerClassService()
    {
        return $this->services['test_container_class'] = new \PSaunders\Test\Test();
    }

    /**
     * Gets the 'test_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PSaunders\Listener\TestListener A PSaunders\Listener\TestListener instance.
     */
    protected function getTestListenerService()
    {
        return $this->services['test_listener'] = new \PSaunders\Listener\TestListener();
    }
}
