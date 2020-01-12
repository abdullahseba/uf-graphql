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
        $container['graphQLTypeRegistry'] = function ($c) {
            return (object) array(
                'query' => 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Query',
                'mutation' => 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Mutation'
            );
        };

        $container['graphQLQueryFields'] = function ($c) {
            $fields = [];
            return $fields;
        };
        $container['graphQLMutationFields'] = function ($c) {
            $fields = [];
            return $fields;
        };
    }
}
