<?php

namespace ErpNET\Models\v2\Repositories;

use ErpNET\Models\v2\Presenters\PartnerPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ErpNET\Models\v2\Interfaces\PartnerRepository;
use ErpNET\Models\v2\Entities\PartnerEloquent;
use ErpNET\Models\v2\Validators\PartnerValidator;
use Prettus\Repository\Presenter\ModelFractalPresenter;

/**
 * Class PartnerRepositoryEloquent
 * @package namespace ErpNET\Models\v2\Repositories;
 */
class PartnerRepositoryEloquent extends BaseRepository implements PartnerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PartnerEloquent::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PartnerValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @return string
     */
    public function presenter()
    {
        //return ModelFractalPresenter::class
        return PartnerPresenter::class;
    }
}
