<?php

namespace UserFrosting\Sprinkle\GraphQl\Controller;

use GraphQL\GraphQL;
use UserFrosting\Sprinkle\Core\Controller\SimpleController;
use UserFrosting\Sprinkle\GraphQl\GraphQl\Schema;



class GraphQlController extends SimpleController
{
    public function Api($request, $response, $args)
    {
        // Get submitted data.
        $params = $request->getParsedBody();

        $query = $params['query'];



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
                Schema::$schema,
                $query,
                $rootValue = null,
                $context = [
                    'current_user' => "testu",
                    'auth' => $this->ci->authenticator
                ],
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

        return json_encode($output);
    }
}
