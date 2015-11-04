<?php

namespace App\Modules;

use App\PointCut\ReservePointCut;
use Ytake\LaravelAspect\Modules\AspectModule;

/**
 * Class ReserveModule
 */
class ReserveModule extends AspectModule
{
    /**
     * {@inheritdoc}
     */
    public function attach()
    {
        $pointcut = (new ReservePointCut)->configure($this->app);
        $this->instanceResolver(\App\Services\ReserveService::class, [$pointcut]);
    }
}
