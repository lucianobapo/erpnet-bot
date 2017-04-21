<?php

namespace ErpNET\Models\v2\Transformers;

use League\Fractal\TransformerAbstract;
use ErpNET\Models\v2\Entities\OrderEloquent;

/**
 * Class OrderTransformer
 * @package namespace ErpNET\Models\v2\Transformers;
 */
class OrderTransformer extends TransformerAbstract
{

    /**
     * Transform the OrderEloquent entity
     * @param OrderEloquent $model
     *
     * @return array
     */
    public function transform(OrderEloquent $model)
    {
        return $model->exposedFields();
//        return [
//            'id'         => (int) $model->id,
//
//            /* place your other model properties here */
//
//            'created_at' => $model->created_at,
//            'updated_at' => $model->updated_at
//        ];
    }
}
