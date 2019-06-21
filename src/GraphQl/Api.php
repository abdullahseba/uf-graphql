<?php

namespace UserFrosting\Sprinkle\GraphQl\GraphQl;

ini_set('display_errors', 'on');
ini_set('log_errors', 'on');
ini_set('display_startup_errors', 'on');
ini_set('error_reporting', E_ALL);

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use GraphQL\Utils\BuildSchema;
use UserFrosting\Sprinkle\Core\Controller\SimpleController;
use GraphQL\Language\Parser;
use GraphQL\Utils\AST;
use GraphQL\Type\Definition\ResolveInfo;

class MyCustomResolver
{
    public function __invoke($source, $args, $context, ResolveInfo $info)
    {
        $fieldName = $info->fieldName;
        $property = null;
        // file_put_contents(__DIR__.'\log.json', json_encode($this->getFieldSelection()));
        // var_dump($info->getFieldSelection());
        switch ($info->fieldName) {
            // case 'id':
            // return 2;
            case 'user':
                return ['id' => 1];
            default:
                return 666;
        }
    }
}

class Api extends SimpleController
{
    public function Api($request, $response, $args)
    {
        // Get submitted data.
        $params = $request->getParsedBody();

        $schema = new Schema([
            // 'query' => Types::query()
            'query' => $this->ci->graphQLTypeRegistry->query
            // 'query' => $this->ci->graphQl->type->query,
            // 'query' => $this->ci->graphQl->addToQuery(),
            // 'query' => $this->ci->graphQl->type->query->addToQuery(),

            // 'query' => $this->ci->graphQLTypeRegistry->query->addToQuery,
            // 'query' => $this->ci->graphQLTypeRegistry->registerType(),
            // 'query' => $this->ci->graphQLTypeRegistry->registerType(),
            // 'query' => $this->ci->graphQLRegistry
        ]);

        $rawInput = $params;
        $input = $rawInput;
        $query = $input['query'];
        $variableValues = isset($input['variables'])
            ? $input['variables']
            : null;

        try {
            $rootValue = [
                'greetings' => function ($root, $args, $context) {
                    // var_dump($args);
                    return $root['prefix'] . $args['input']['firstName'];
                },
                'user' => function ($root, $args, $context) {
                    // error_log(json_encode($root));
                    // echo json_encode($root);
                    return ['id' => $args['id'], 'firstName' => "Nou"];
                }
            ];
            // $rootValue = ['prefix' => 'You said: '];

            $result = GraphQL::executeQuery(
                $schema,
                $query,
                $rootValue = null,
                $context = null,
                $variableValues = null,
                $operationName = null
                // new MyCustomResolver()
            );
            // $result = GraphQL::executeQuery($schema, $query, $rootValue, null, $variableValues);
            $output = $result->toArray();
        } catch (\Exception $e) {
            $output = [
                'errors' => [
                    [
                        'message' => $e->getMessage()
                    ]
                ]
            ];
        }

        echo json_encode($output);
    }
}
