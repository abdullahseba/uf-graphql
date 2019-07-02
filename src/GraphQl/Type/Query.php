<?php
namespace UserFrosting\Sprinkle\GraphQl\GraphQl\Type;

use GraphQL\Type\Definition\ObjectType;

use GraphQL\Type\Definition\ResolveInfo;

class Query extends ObjectType
{
    public static $fields;

    public function __construct()
    {
        parent::__construct([
            'name' => 'Query',
            'fields' => self::$fields
        ]);
    }
}
