<?php

namespace App\Repositories;

use App\Repositories\Criteria\Reserve;

class ReserveRepository implements ReserveRepositoryInterface
{
    /** @var Reserve  */
    protected $reserve;

    /**
     * ReserveRepository constructor.
     *
     * @param Reserve $reserve
     */
    public function __construct(Reserve $reserve)
    {
        $this->reserve = $reserve;
    }

    /**
     * @param $index
     *
     * @return array
     */
    public function find($index)
    {
        return $this->reserve->find($index);
    }

    /**
     * @param array $parameters
     */
    public function add(array $parameters)
    {
        $this->reserve->add($parameters);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->reserve->all();
    }
}
