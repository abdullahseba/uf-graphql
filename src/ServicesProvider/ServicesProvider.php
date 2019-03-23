<?php

namespace UserFrosting\Sprinkle\Api\ServicesProvider;

use UserFrosting\Sprinkle\Api\GraphQl\TypeRegistry;

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
