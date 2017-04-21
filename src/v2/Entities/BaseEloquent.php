<?php

namespace ErpNET\Models\v2\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\PresentableTrait;
use Prettus\Repository\Traits\TransformableTrait;

abstract class BaseEloquent extends Model
{
//    use TransformableTrait;

//    use PresentableTrait;

    /**
     * Implement fields to be exposed
     * @return array
     */
    abstract public function exposedFields();
}
