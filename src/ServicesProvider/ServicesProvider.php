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
        /**
        *   Type Registry
        *   
        *   Stores all Gql types.  Extend to add more types.
        */
        $container['graphQLTypeRegistry'] = function ($c) {
            return (object) array(
                'query' => 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Query',
                'mutation' => 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Mutation'
            );
        };

        /**
        *   Query Fields.
        *   
        *   Stores all fields for the 'query' type.  Extend to add fields.
        *   Queries are used for reading data only.
        */
        $container['graphQLQueryFields'] = function ($c) {
            $fields = [];
            return $fields;
        };

        /**
        *   Mutation Fields.
        *   
        *   Stores all fields for the 'mutation' type.  Extend to add fields.
        *   Mutations are used for writing data.
        */
        $container['graphQLMutationFields'] = function ($c) {
            $fields = [];
            return $fields;
        };
    }
}
