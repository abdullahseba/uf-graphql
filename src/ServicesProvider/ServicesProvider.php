<?php

namespace UserFrosting\Sprinkle\GraphQl\ServicesProvider;

use UserFrosting\Sprinkle\GraphQl\GraphQl\TypeRegistry;
use UserFrosting\Sprinkle\GraphQl\GraphQl\TypeRegistry as TR;

class ServicesProvider
{
    /**
     * Register api services.
     *
     * @param Container $container A DI container implementing ArrayAccess and container-interop.
     */
    public function register($container)
    {
        // $container['graphQLTypeRegistry'] = function ($c) {
        //     error_log('registered');

        //     // $reflection = new ReflectionClass('MyClass');
        //     // var_dump($reflection->getMethods(ReflectionMethod::IS_STATIC));

        //     $t = new TypeRegistry([
        //         'query' => 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Query',
        //         'user' => 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\User'
        //     ]);
        //     //prettier-ignore
        //     // $t->registerType('query', 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Query');
        //     //prettier-ignore
        //     // $t->registerType('user', 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\User');

        //     return TypeRegistry::$types;
        // };

        $container['graphQLTypeRegistry'] = function ($c) {
            return (object) array(
                'query' => 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Query',
                'user' => 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\User'
            );
        };

        $container['graphQLQueryFields'] = function ($c) {
            $fields = [
                'user' => [
                    'type' => TR::get('user'),
                    'description' => 'Returns user by id (in range of 1-5)',
                    'args' => [
                        'id' => TR::nonNull(TR::id())
                    ],
                    'resolve' =>
                        "UserFrosting\Sprinkle\GraphQl\GraphQl\Resolver\UserResolver::resolve"
                ]
            ];

            return $fields;
        };
    }
}
