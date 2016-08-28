<?php
namespace Strategy;
require_once('birds.php');
require_once('flybehavior.php');

use Strategy\Birds as Birds;
use Strategy\Interfaces\FlyBehavior as FlyBehavior;

class Fly extends Birds implements FlyBehavior
{
    public function fly()
    {
        echo '”ò‚Ô';
    }
}