<?php

namespace UserFrosting\Sprinkle\GraphQl\GraphQl;

use GraphQL\Type\Definition\ObjectType;

// use UserFrosting\Sprinkle\GraphQl\GraphQl\Query;
// use UserFrosting\Sprinkle\GraphQl\GraphQl\Types\User;

class TypeRegistry
{
    public static $user;
    public static $query;
    public static $types;

    // public static function user()
    // {
    //     return self::$user ?: (self::$user = new Types\User());
    // }

    // public static function query()
    // {
    //     // file_put_contents(__DIR__.'\log.json', json_encode(AST::toArray($contents)));
    //     return self::$query ?: (self::$query = new Types\Query());
    // }
    public function registerType($typeName, $typeClass)
    {
        _self::$types[$typeName] = new $typeClass;
    }
}

TypeRegistry::$types = (object) array(
    'user'=> new Type\User(),
    'query' => new Type\Query()
);
