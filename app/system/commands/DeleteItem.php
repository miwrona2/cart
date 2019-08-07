<?php
namespace App\System\Commands;

class DeleteItem implements Command
{
    private $id;

    public function __construct(?int $id)
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}