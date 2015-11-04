<?php

namespace App\Annotation;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 * @Target("METHOD")
 */
final class Reserve extends Annotation
{
    /** @var string */
    public $key = '予約がありません、いますぐ予約しましょう！';
}
