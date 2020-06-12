<?php

namespace UserFrosting\Sprinkle\GraphQl\GraphQl\Type;

use GraphQL\Type\Definition\ObjectType;

class Mutation extends ObjectType
{
    public static $fields;

    public function __construct()
    {
        parent::__construct(
            [
                'name' => 'Mutation',
                'fields' => self::$fields,
            ]
        );
    }
}
