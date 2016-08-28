<?php
namespace Strategy;
require_once('runable.php');

use Strategy\Run as Run;

class Ostrich extends Run
{
   public function describe()
   {
       echo 'Ostrich';
       return $this;
   }
}

echo (new Ostrich)->describe()->run();