<?php

namespace App\Repositories;

interface ReserveRepositoryInterface
{
    /**
     * @param $index
     *
     * @return array
     */
    public function find($index);

    /**
     * @param array $parameters
     */
    public function add(array $parameters);

    /**
     * @return mixed
     */
    public function all();
}
