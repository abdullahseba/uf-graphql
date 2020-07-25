<?php

namespace UserFrosting\Sprinkle\GraphQl\GraphQl;

use GraphQL\Type\Definition\Type;

/**
 * Stores and register all  GraphQl types.
 */
class TypeRegistry extends Type
{

    /** @var object Registry for all available GQL types. */
    public static $registry;

    /** @var object Stores all instances of a GQL types. */
    public static $types;


    /**
     * Finds a GraphQL type and initiates it if necessary. The instance is stored so that it can be reused.
     * Replaces 'TypeRegistry::get()'.
     * @param string $typeName 
     * @param array $args 
     * @return object Returns type object.
     * @throws Throws an error if something goes wrong.
     */
    public static function __callStatic($typeName, $args)
    {
        try {
            //Check if type already exists, and if not, start a new instance of it and return it.
            return isset(TypeRegistry::$types->$typeName) ? TypeRegistry::$types->$typeName : (TypeRegistry::$types->$typeName = new TypeRegistry::$registry->$typeName($args));
        } catch (\Throwable $th) {
            error_log("Failed to find type '$typeName'");
            //Error message required.
            throw $th;
        }
    }

    /**
     * Registers GraphQL types.
     * @param string $typeName 
     * @param mixed $typeClass 
     * @return void 
     */
    public static function registerType($typeName, $typeClass)
    {
        TypeRegistry::$registry->$typeName = $typeClass;
    }

    /**
     * Finds a GraphQL type and initiates it if necessary. The instance is stored so that it can be reused.
     * @deprecated Replaced by PHP Magic Method '__callStatic'.
     * @param string $typeName 
     * @param array $args 
     * @return object Returns type object.
     * @throws Throws an error if something goes wrong.
     */
    public static function get($typeName, $args = array())
    {
        try {
            //Check if type already exists, and if not, start a new instance of it.
            return isset(TypeRegistry::$types->$typeName) ? TypeRegistry::$types->$typeName : (TypeRegistry::$types->$typeName = new TypeRegistry::$registry->$typeName($args));
        } catch (\Throwable $th) {
            //Error message required.
            throw $th;
        }
    }
}

//Initiate stores with an empty object.  Stops PHP warnings.
TypeRegistry::$types = (object) array();
TypeRegistry::$registry = (object) array();
