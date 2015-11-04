<?php

namespace App\Repositories\Criteria;

use Illuminate\Session\SessionManager;

/**
 * Class Reserve
 *
 * @package App\Repositories\Criteria
 */
class Reserve
{
    /** @var SessionManager  */
    protected $session;

    /** @var array  */
    protected $reserves = [];

    const SESSION_ID = 'reserve_sample';

    /**
     * Reserve constructor.
     *
     * @param SessionManager $session
     */
    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    /**
     * 予約情報の追加
     * @param array $parameters
     */
    public function add(array $parameters)
    {
        $this->session->push(self::SESSION_ID, $parameters);
    }

    /**
     * @param $index
     *
     * @return array
     */
    public function find($index)
    {
        $store = $this->all();
        return (isset($store[$index])) ? $store[$index] : [];
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->session->get(self::SESSION_ID, []);
    }
}
