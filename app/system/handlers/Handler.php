<?php
namespace App\System\Handlers;

use App\System\Commands\Command;

interface Handler
{
    public function handle(Command $command): void;
}