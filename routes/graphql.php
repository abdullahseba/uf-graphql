<?php

$app->post('/graphql', 'UserFrosting\Sprinkle\GraphQl\GraphQl\Api:Api')
    ->setName('graphql');
