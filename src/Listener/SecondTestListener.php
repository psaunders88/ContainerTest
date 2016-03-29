<?php

namespace PSaunders\Listener;

use Symfony\Component\EventDispatcher\Event;

class SecondTestListener
{
    /**
     * This event only exists to prove that listeners can be configured correctly
     * using the container/event dispatcher.
     * 
     * @param Event $event
     */
    public function dispatched(Event $event)
    {
        echo get_class().PHP_EOL;
    }
}
