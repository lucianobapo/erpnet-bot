<?php

namespace ErpNET\Models\v1\Transformers;

use ErpNET\Models\v1\Entities\PartnerEloquent;
use League\Fractal\TransformerAbstract;

/**
 * Class PartnerTransformer
 * @package namespace ErpNET\Models\v1\Transformers;
 */
class PartnerTransformer extends TransformerAbstract
{

    /**
     * Transform the PartnerEloquent entity
     * @param PartnerEloquent $model
     *
     * @return array
     */
    public function transform(PartnerEloquent $model)
    {
        return $model->transformPresenter();
    }
}
