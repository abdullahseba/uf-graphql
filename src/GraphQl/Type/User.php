<?php
/**
 * API Sprinkle
 *
 * @link
 * @license
 */

namespace UserFrosting\Sprinkle\Api\GraphQl\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

/**
 * GraphQL User type definition.
 *
 */
class User extends ObjectType
{
    protected $user;
    public function __construct()
    {
        $user =      [
            'name' => 'User',
            'description' => 'User',
            'fields' =>
                [
                    'id' => Type::id(),
                    'userName' => Type::string(),
                    'firstName' =>  Type::string(),
                    'lastName' =>  Type::string(),
                    'email' => Type::string(),
                    'locale' => Type::string(),
                    'groupId' => Type::int(),
                    'isVerified' => Type::boolean(),
                    'isEnabled' => Type::boolean(),
                    'created' => Type::string(),
                    'lastUpdated' => Type::string(),
                    'deleted' => Type::string()
                ]
            ];
        parent::__construct(
            $user
        );
    }
}
