<?php

namespace App\Services;

use Ytake\LaravelAspect\Annotation\Cacheable;
use Ytake\LaravelAspect\Annotation\CacheEvict;
use App\Repositories\ReserveRepositoryInterface;

/**
 * Class ReserveService
 *
 * @package App\Services
 */
class ReserveService
{
    /** @var ReserveRepositoryInterface  */
    protected $reserve;

    /**
     * ReserveService constructor.
     *
     * @param ReserveRepositoryInterface $reserve
     */
    public function __construct(ReserveRepositoryInterface $reserve)
    {
        $this->reserve = $reserve;
    }

    /**
     * @Cacheable(key={"#index"},cacheName="reserve",tags={"reserve"},lifetime=120)
     * @param $index
     *
     * @return array
     */
    public function getReserve($index)
    {
        return $this->reserve->find($index);
    }

    /**
     * @Cacheable(cacheName="reserves",tags={"reserve"},lifetime=120)
     * @return mixed
     */
    public function getReserves()
    {
        return $this->reserve->all();
    }

    /**
     * @CacheEvict(tags={"reserve"})
     * @param array $parameters
     */
    public function addReserve(array $parameters)
    {
        $this->reserve->add($parameters);
    }
}
