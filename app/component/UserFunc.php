<?php
/**
 *
 *
 */
namespace Component;

class UserFunc
{
    private static $model;

    /**
     * callStaticFunc
     *
     * @param string $method
     * @param array $where
     */
     public static function callStaticFunc($method, $where)
     {
        return forward_static_call_array(
                    ['App\\' . self::$model, $method],
                    $where
                );
     }

     public static function setModel($model)
     {
         return self::$model = $model;
     }
}
?>
