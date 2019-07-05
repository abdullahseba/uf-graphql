<?php

namespace UserFrosting\Sprinkle\GraphQl\GraphQl;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;


// use UserFrosting\Sprinkle\GraphQl\GraphQl\Query;
// use UserFrosting\Sprinkle\GraphQl\GraphQl\Types\User;

class TypeRegistry extends Type
{
  
    public static $registry;
    public static $types;

    // public function __construct($registry)
    // {
    //     TypeRegistry::$registry = $registry;
    // }


    public function registerType($type, $typeClass)
    {
        TypeRegistry::$registry->$type = $typeClass;
        // error_log($typeName . " registered");
    }

    public static function get($type, $args = array())
    {
        try {
        return TypeRegistry::$types->$type ?: (TypeRegistry::$types->$type = new TypeRegistry::$registry->$type($args));
        
        } catch (\Throwable $th) {
            //Error message required.
            throw $th;
        }

        // return  (TypeRegistry::$types->$type = new TypeRegistry::$registry->$type());
    }
}

TypeRegistry::$types = (object) array();
TypeRegistry::$registry = (object) array();
