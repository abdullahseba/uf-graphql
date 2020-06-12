<?php

namespace UserFrosting\Sprinkle\GraphQl;

use UserFrosting\System\Sprinkle\Sprinkle;
use Psr\Container\ContainerInterface;
use UserFrosting\Sprinkle\GraphQl\GraphQl\TypeRegistry;
use UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Mutation;
use UserFrosting\Sprinkle\GraphQl\GraphQl\Type\Query;

/**
 * Bootstrapper class for the 'graph_ql' sprinkle.
 */
class GraphQl extends Sprinkle
{
    public function __construct(ContainerInterface $ci)
    {
        //Add the container interface to the object.
        $this->ci = $ci;

        //Register streams.
        $this->registerStreams();
    }

    /**
     * Services initialisation hook.   
     * @return void 
     */
    public function onSprinklesRegisterServices()
    {
        //Register all available GraphQL types.
        TypeRegistry::$registry = $this->ci->graphQLTypeRegistry;

        //Get a list of query and mutation field files from all sprinkles. 
        $queryFieldPaths = array_reverse($this->ci->locator->listResources('query-fields://', true, false));
        $mutationFieldPaths = array_reverse($this->ci->locator->listResources('mutation-fields://', true, false));

        //Initialise empty fields array.
        $queryFields = array();
        $mutationFields = array();

        //Iterate over each query field file and merge them.
        foreach ($queryFieldPaths as $fieldPath) {
            $fieldFile = include($fieldPath);
            $queryFields = array_merge($queryFields, $fieldFile);
        }

        //Iterate over each mutation field file and merge them.
        foreach ($mutationFieldPaths as $fieldPath) {
            $fieldFile = include($fieldPath);
            $mutationFields = array_merge($mutationFields, $fieldFile);
        }

        //Register fields.
        Query::$fields = $queryFields;
        Mutation::$fields = $mutationFields;
    }

    /**
     * Register file streams.
     * @return void 
     */
    protected function registerStreams()
    {
        /** @var \UserFrosting\UniformResourceLocator\ResourceLocator $locator */
        $locator = $this->ci->locator;

        $locator->registerStream('query-fields', '', \UserFrosting\GraphQl\FIELDS_DIR_NAME . '/' . \UserFrosting\GraphQl\QUERY_FIELD_DIR_NAME);
        $locator->registerStream('mutation-fields', '', \UserFrosting\GraphQl\FIELDS_DIR_NAME . '/' . \UserFrosting\GraphQl\MUTATION_FIELD_DIR_NAME);
    }
}
