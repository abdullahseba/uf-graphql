<?php

namespace UserFrosting\Sprinkle\GraphQl\ServicesProvider;

use Psr\Container\ContainerInterface;

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
         * Type Registry  
         * Stores all Gql types. Extend to add more types.
         */
        $container['graphQLTypeRegistry'] = function () {
            return (object) array(
                'query' => 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Query',
                'mutation' => 'UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Mutation',
            );
        };
    }
}
