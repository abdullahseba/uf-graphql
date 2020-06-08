<?php

namespace UserFrosting\Sprinkle\GraphQl\ServicesProvider;

use Psr\Container\ContainerInterface;
use UserFrosting\Sprinkle\GraphQl\GraphQl\TypeRegistry;

class ServicesProvider
{
    /**
     * Register api services.
     *
     * @param Container $container A DI container implementing ArrayAccess and container-interop.
     */
    public function register(ContainerInterface $container)
    {

        /**
         *   Type Registry
         *   
         *   Stores all Gql types.  Extend to add more types.
         */
        $container['graphQLTypeRegistry'] = function () {
            return (object) array(
                'query' => 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Query',
                'mutation' => 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Mutation',
                'user' => function () {
                    // return isset(TypeRegistry::$types->$type) ?: (TypeRegistry::$types->$type = new TypeRegistry::$registry->$type($args));
                }
            );
        };

        /**
         *   Query Fields.
         *   
         *   Stores all fields for the 'query' type.  Extend to add fields.
         *   Queries are used for reading data only.
         */
        $container['graphQLQueryFields'] = function () {
            $fields = [];
            return $fields;
        };

        /**
         *   Mutation Fields.
         *   
         *   Stores all fields for the 'mutation' type.  Extend to add fields.
         *   Mutations are used for writing data.
         */
        $container['graphQLMutationFields'] = function () {
            $fields = [];
            return $fields;
        };
    }
}
