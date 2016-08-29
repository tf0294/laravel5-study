<?php
/**
 *
 */
namespace Facade;
use Illuminate\Support\Facades\Facade;

class AdminFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'UserFunc';
    }
}
?>
