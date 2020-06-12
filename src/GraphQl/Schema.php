<?php

namespace UserFrosting\Sprinkle\GraphQl\GraphQl;

use GraphQL\Type\Schema as Sch;
use UserFrosting\Sprinkle\GraphQl\GraphQl\TypeRegistry;


class Schema
{
    public static $schema;
}

Schema::$schema = new Sch([
    'query' => TypeRegistry::query(),
    'mutation' => TypeRegistry::mutation()
    // 'mutation' => TypeRegistry::get('mutation')
    // 'query' => TypeRegistry::get('query'),

]);
