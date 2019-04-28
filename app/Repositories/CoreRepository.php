<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CoreRepository
 * @package App\Repositories
 *
 */


abstract class CoreRepository
{

    /**
     * @var Model
     */
    protected $model;

    /**
     * CoreRepository constructor.
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }


    /**
     * @return mixed
     */
    protected abstract function getModelClass();

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Model|mixed
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}