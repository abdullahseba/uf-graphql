<?php

$app->post('/graphql', 'UserFrosting\Sprinkle\Api\GraphQl\Api:Api')
    ->setName('graphql');
