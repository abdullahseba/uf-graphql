<?php

namespace UserFrosting\Sprinkle\GraphQl\GraphQl;

use GraphQL\Type\Schema as Sch;
use UserFrosting\Sprinkle\GraphQl\GraphQl\TypeRegistry;


class Schema
{
    public static $schema;
}

Schema::$schema = new Sch([
    // 'query' => Types::query()
    'query' => TypeRegistry::get('query'),
    'mutation' => TypeRegistry::get('mutation')
]);
