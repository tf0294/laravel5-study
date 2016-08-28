<?php
namespace Birds;
require_once('run.php');

use Strategy\Run as Run;

class Owl extends Run
{
    public function describe()
    {
        echo 'Owl';
    }
}

echo (new Owl)->describe();