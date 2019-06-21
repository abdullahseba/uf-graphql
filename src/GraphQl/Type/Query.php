<?php
namespace UserFrosting\Sprinkle\GraphQl\GraphQl\Type;

// use UserFrosting\Sprinkle\GraphQl\GraphQl\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
// use UserFrosting\Sprinkle\GraphQl\GraphQl\Resolver\UserResolver;
use GraphQL\Type\Definition\ResolveInfo;

class Query extends ObjectType
{
    public function __construct()
    {
        // $resolver = "UserFrosting\Sprinkle\GraphQl\GraphQl\Resolver\UserResolver::resolve";
        parent::__construct([
            'name' => 'Query',
            'fields' => [
                'user' => [
                    'type' => new User(),
                    'description' => 'Returns user by id (in range of 1-5)',
                    'args' => [
                        'id' => Type::nonNull(Type::id())
                    ],
                    'resolve' =>
                        "UserFrosting\Sprinkle\GraphQl\GraphQl\Resolver\UserResolver::resolve"
                ]
            ]
        ]);
    }
    public function addField()
    {
    }
}
