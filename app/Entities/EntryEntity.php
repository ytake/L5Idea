<?php
namespace App\Entities;

/**
 * Class EntryEntity
 * @package App\Entities
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class EntryEntity
{

    /** @var integer */
    private $entry_id;

    /** @var string  */
    private $title;

    /** @var string */
    private $content;

    /** @var string */
    private $created_at;

    /** @var string */
    private $updated_at;

    public function __call($name, $arguments)
    {

    }

}
