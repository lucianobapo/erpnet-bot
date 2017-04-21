<?php

namespace ErpNET\Models\v2\Entities;

class PartnerEloquent extends BaseEloquent
{
    protected $table = 'partners';

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

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
