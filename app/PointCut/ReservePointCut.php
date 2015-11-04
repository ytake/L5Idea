<?php

namespace App\PointCut;

use App\Interceptor\ReserveInterceptor;
use Ray\Aop\Matcher;
use Illuminate\Contracts\Container\Container;
use Ray\Aop\Pointcut;
use Ytake\LaravelAspect\PointCut\PointCutable;

/**
 * Class ReservePointCut
 *
 * @package App\PointCut
 */
class ReservePointCut implements PointCutable
{
    /** @var */
    protected $annotation = \App\Annotation\Reserve::class;

    /**
     * @param Container $app
     *
     * @return \Ray\Aop\Pointcut
     */
    public function configure(Container $app)
    {
        $interceptor = new ReserveInterceptor;
        $interceptor->setReader($app['aspect.annotation.reader']);
        $interceptor->setAnnotation($this->annotation);
        return new Pointcut(
            (new Matcher)->any(),
            (new Matcher)->annotatedWith($this->annotation),
            [$interceptor]
        );
    }
}
