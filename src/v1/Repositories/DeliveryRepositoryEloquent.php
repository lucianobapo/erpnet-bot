<?php

namespace ErpNET\Auth\v1\Repositories;

use ErpNET\Auth\v1\Interfaces\AuthRepository;
use ErpNET\Auth\v1\Entities\AttachmentEloquent;
use ErpNET\Auth\v1\Repositories\BaseRepositoryEloquent;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class DeliveryRepositoryEloquent
 * @package namespace ErpNET\Auth\v1\Repositories;
 */
class DeliveryRepositoryEloquent extends BaseRepository implements DeliveryRepository
{
    protected $modelClass = AttachmentEloquent::class;
}
