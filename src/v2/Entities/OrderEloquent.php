<?php

namespace ErpNET\Models\v2\Entities;

class OrderEloquent extends BaseEloquent
{
    protected $table = 'orders';

    protected $fillable = [];

    /**
     * Implement fields to be exposed
     * @return array
     */
    public function exposedFields()
    {
        return [
            'id'         => (int) $this->id,

            /* place your other model properties here */

//            'created_at' => $this->created_at,
//            'updated_at' => $this->updated_at
        ];
    }
}
