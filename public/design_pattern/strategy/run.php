<?php
namespace Strategy;

require_once('runbehavior.php');
require_once('birds.php');

use Strategy\Interfaces\RunBehavior as RunBehavior;
use Strategy\Birds as Birds;

class Run extends Birds implements RunBehavior
{
    public function run()
    {
        echo '‘–‚é';
    }
}

