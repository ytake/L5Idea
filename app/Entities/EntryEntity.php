<?php
namespace App\Entities;

/**
 * Class EntryEntity
 * @package App\Entities
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class EntryEntity implements Entityable
{

    /** @var int */
    private $entry_id;

    /** @var string  */
    public $title;

    /** @var string */
    public $content;

    /** @var string */
    public $created_at;

    /** @var string */
    public $updated_at;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->entry_id;
    }
}
