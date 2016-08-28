<?php
namespace Strategy;
require_once('flyable.php');

use Strategy\Flyable as Flyable;
use Strategy\Fly as Fly;

class Raven extends Flyable
{
    public function __construct()
    {
        $this->flyalbe = new Fly();
    }

    public function describe()
    {
        echo 'Raven';
        return $this;
    }
}

echo (new Raven)->fly();