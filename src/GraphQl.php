<?php

namespace UserFrosting\Sprinkle\GraphQl;


use UserFrosting\System\Sprinkle\Sprinkle;
use UserFrosting\Sprinkle\GraphQl\GraphQl\TypeRegistry;
use UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Mutation;
use UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Query;

/**
 * Bootstrapper class for the 'site' sprinkle.
 */
class GraphQl extends Sprinkle
{
    public function onSprinklesRegisterServices()
    {
        TypeRegistry::$registry = $this->ci->graphQLTypeRegistry;
        // TypeRegistry::$registry->user =  function () {
        //     // $this->ci->graphQLTypeRegistry;
        //     return isset(TypeRegistry::$types->$type) ?: (TypeRegistry::$types->$type = new TypeRegistry::$registry->$type($args));
        // };

        Query::$fields = $this->ci->graphQLQueryFields;
        Mutation::$fields = $this->ci->graphQLMutationFields;
    }
}
