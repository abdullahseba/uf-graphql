<?php

namespace UserFrosting\Sprinkle\GraphQl\GraphQl;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;


// use UserFrosting\Sprinkle\GraphQl\GraphQl\Query;
// use UserFrosting\Sprinkle\GraphQl\GraphQl\Types\User;

class TypeRegistry extends Type
{

    /** @var object Registry for all available GQL types. */
    public static $registry;
    /** @var object Stores all instances of a GQL type. */
    public static $types;



    public static function registerType($type, $typeClass)
    {
        TypeRegistry::$registry->$type = $typeClass;
        // error_log($typeName . " registered");
    }

    public static function get($type, $args = array())
    {
        try {
            //Check if type already exists, and if not, start a new instance of it.
            return isset(TypeRegistry::$types->$type) ?: (TypeRegistry::$types->$type = new TypeRegistry::$registry->$type($args));
        } catch (\Throwable $th) {
            //Error message required.
            throw $th;
        }

        // return  (TypeRegistry::$types->$type = new TypeRegistry::$registry->$type());
    }
}

TypeRegistry::$types = (object) array();
TypeRegistry::$registry = (object) array();
