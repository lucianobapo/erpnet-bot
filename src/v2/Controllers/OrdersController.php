<?php

namespace ErpNET\Models\v2\Controllers;

use ErpNET\Models\v2\Interfaces\OrderRepository;

class OrdersController extends ResourceController
{
    /**
     * Abstract to set and return route name
     * @return string
     */
    protected function routeName()
    {
        return 'orders';
    }

    /**
     * Abstract to set and return repository class
     * @return string
     */
    protected function repositoryClass()
    {
        return OrderRepository::class;
    }

    /**
     * Abstract to set and return fields configuration for view
     * @return array
     */
    protected function fieldsConfig()
    {
        return [
            'id',
        ];
    }
}
