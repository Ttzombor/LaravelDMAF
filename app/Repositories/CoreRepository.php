<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;


/**
 * Class CoreRepository
 * @package App\Repositories
 */
abstract class CoreRepository {

    /**
        @var Model;
     */
    protected $model;


    /**
        Core Repository Model
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass();

    /**
     * @return \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected function startConditions(){
        return clone $this->model;
    }
}
