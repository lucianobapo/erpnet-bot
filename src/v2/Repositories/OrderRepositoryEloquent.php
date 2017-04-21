<?php

namespace ErpNET\Models\v2\Repositories;

use ErpNET\Models\v2\Presenters\OrderPresenter;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ErpNET\Models\v2\Interfaces\OrderRepository;
use ErpNET\Models\v2\Entities\OrderEloquent;
use ErpNET\Models\v2\Validators\OrderValidator;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class OrderRepositoryEloquent
 * @package namespace ErpNET\Models\v2\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository//, CacheableInterface
{
    //use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderEloquent::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return OrderValidator::class;
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
//    public function presenter()
//    {
//        //return ModelFractalPresenter::class
//        return OrderPresenter::class;
//    }
}
