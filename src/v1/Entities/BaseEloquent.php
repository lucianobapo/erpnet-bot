<?php

namespace ErpNET\Auth\v1\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\PresentableTrait;
use Prettus\Repository\Traits\TransformableTrait;

abstract class BaseEloquent extends Model
{
//    use TransformableTrait;

//    use PresentableTrait;

    use SoftDeletes;

    /**
     * Create a new Eloquent model instance.
     *
     * @param  array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $config = config("erpnetMigrates.tables.$this->table.fields");
        if(is_array($config))
            foreach ($config as $key => $field) {
                if (array_search($field, $this->fillable)===false){
                    if(is_string($field) ) array_push($this->fillable, $field);
                    if(is_array($field)) array_push($this->fillable, $key);
                }
            }
        parent::__construct($attributes);
    }

    /**
     * Implement fields to be exposed
     * @return array
     */
    public function transformPresenter()
    {
        $result = [];
        $config = config("erpnetMigrates.tables.$this->table.transformPresenter");
        if(is_array($config))
            foreach ($config as $key => $field) {
                if($field instanceof \Closure) {
                    $result[$key] = $field($this);
                }
            };
        return $result;
    }
}
