<?php
namespace App\System;

use App\System\Commands\Command;
use Phalcon\Di\Injectable;

final class CommandBus extends Injectable
{
    private $commandBus;

    public function __construct()
    {
        $this->commandBus = $this->getDI()->get('commandBus');
    }

    public function handle(Command $command) : void
    {
        $this->commandBus->handle($command);
    }
}
