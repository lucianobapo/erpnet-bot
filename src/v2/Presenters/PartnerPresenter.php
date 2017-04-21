<?php

namespace ErpNET\Models\v2\Presenters;

use ErpNET\Models\v2\Transformers\PartnerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PartnerPresenter
 *
 * @package namespace ErpNET\Models\v2\Presenters;
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
