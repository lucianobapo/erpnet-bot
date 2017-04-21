<?php

namespace ErpNET\Models\v1\Presenters;

use ErpNET\Models\v1\Transformers\PartnerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PartnerPresenter
 *
 * @package namespace ErpNET\Models\v1\Presenters;
 */
class PartnerPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PartnerTransformer();
    }
}
