<?php
namespace Strategy;

require_once('fly.php');
use Strategy\Fly as Fly;

class Flyable extends Fly
{
    protected $flyable;
    
    public function fly()
    {
        $this->flyable->fly();
    }
}