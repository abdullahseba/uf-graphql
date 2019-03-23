<?php
namespace UserFrosting\Sprinkle\Api\GraphQl\Type;

// use UserFrosting\Sprinkle\Api\GraphQl\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use UserFrosting\Sprinkle\Account\Database\Models\User as UserModel;

class Mutation extends ObjectType
{
    public function __construct()
    {
        parent::__construct(
            [
                'name' => 'Mutation',
                    'fields' => [
                        
                            ],
            ]
        );
    }
    public function addField()
    {
    }
}
