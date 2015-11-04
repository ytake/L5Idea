<?php

namespace App\Interceptor;

use Ray\Aop\MethodInterceptor;
use Ray\Aop\MethodInvocation;
use Ytake\LaravelAspect\Annotation\AnnotationReaderTrait;

class ReserveInterceptor implements MethodInterceptor
{
    use AnnotationReaderTrait;

    /**
     * @param MethodInvocation $invocation
     * @return mixed
     */
    public function invoke(MethodInvocation $invocation)
    {
        return $invocation->proceed();
    }
}