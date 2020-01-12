<?php
namespace UserFrosting\Sprinkle\GraphQl\GraphQl\Type;

// use UserFrosting\Sprinkle\GraphQl\GraphQl\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use UserFrosting\Sprinkle\Account\Database\Models\User as UserModel;

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
    // public function addField(){}
}
