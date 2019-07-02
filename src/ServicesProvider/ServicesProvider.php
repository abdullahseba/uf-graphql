<?php

namespace UserFrosting\Sprinkle\GraphQl\ServicesProvider;

use UserFrosting\Sprinkle\GraphQl\GraphQl\TypeRegistry;

class ServicesProvider
{
    /**
     * Register api services.
     *
     * @param Container $container A DI container implementing ArrayAccess and container-interop.
     */
    public function register($container)
    {
        // $container['graphQLRegistry'] = function ($c) {
        //     $types =  Types::query();
        //     return $types;
        // };
        $container['graphQLTypeRegistry'] = function ($c) {
            error_log('registered');

            // $reflection = new ReflectionClass('MyClass');
            // var_dump($reflection->getMethods(ReflectionMethod::IS_STATIC));

            $t = new TypeRegistry([
                'query' => 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Query',
                'user' => 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\User'
            ]);
            //prettier-ignore
            // $t->registerType('query', 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Query');
            //prettier-ignore
            // $t->registerType('user', 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\User');

            return TypeRegistry::$types;
        };
        // $container['graphQl'] = function ($c) {
        //     $graphQl = (object) [
        //         'type' =>TypeRegistry::$types,
        //         'addToQuery' => '',
        //         'addToMutation' => ''
        // ];
        // };
    }
}
