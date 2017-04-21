<?php

namespace ErpNET\Models\v2\Controllers;

use ErpNET\Models\v2\Interfaces\PartnerRepository;

class PartnersController extends ResourceController
{
    /**
     * Abstract to set and return route name
     * @return string
     */
    protected function routeName()
    {
        return 'partners';
    }

    /**
     * Abstract to set and return repository class
     * @return string
     */
    protected function repositoryClass()
    {
        return PartnerRepository::class;
    }

    /**
     * Abstract to set and return fields configuration for view
     * @see \ErpNET\WidgetResource\Services\ErpnetWidgetService
     * @return array
     */
    protected function fieldsConfig()
    {
        return [
            'id',
        ];
    }
}
