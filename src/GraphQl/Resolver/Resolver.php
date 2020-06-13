<?php

/**
 * API Sprinkle
 *
 * @link
 * @license
 */

namespace UserFrosting\Sprinkle\GraphQl\GraphQl\Resolver;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

/**
 * GraphQL User type definition.
 *
 */
class Resolver
{
    public static  $map = [];
    public static function renameKeys($array, $map, $flipMap = false)
    {
        $map = $flipMap ? array_flip($map) : $map;
        // error_log(print_r($array, true));

        $new_array = array();
        foreach ($array as $item => $value) {
            // break;
            if (is_array($array[$item])) {

                $name = isset($map[$item]) ? $map[$item] : $item;

                $new_array[$name] =  self::renameKeys($array[$item], $map, $flipMap);
            } else {
                // error_log(print_r($item, true));

                $name = isset($map[$item]) ? $map[$item] : $item;
                // error_log(print_r($item, true));

                $new_array[$name] = $value;
            }
        }

        return $new_array;
    }
}
