<?php

namespace App\Modules;

use Ytake\LaravelAspect\Modules\CacheEvictModule as PackageCacheEvictModule;

/**
 * Class CacheEvictModule
 */
class CacheEvictModule extends PackageCacheEvictModule
{
    /** @var array */
    protected $classes = [
        \App\Services\ReserveService::class
    ];
}
