<?php

use Phalcon\Di\Injectable;

final class CommandBus extends Injectable
{
    private $commandBus;

    public function __construct()
    {
        $this->commandBus = $this->getDI()->get('commandBus');
    }

    public function handle($command) : void
    {
        $this->commandBus->handle($command);
    }
}
