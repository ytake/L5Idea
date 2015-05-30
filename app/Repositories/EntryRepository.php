<?php
namespace App\Repositories;

use App\Entities\EntryEntity;
use App\Repositories\Criteria\Entryable;

/**
 * Class EntryRepository
 * @package App\Repositories
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class EntryRepository implements EntryRepositoryInterface
{

    /** @var Entryable  */
    protected $entryable;

    /**
     * @param Entryable $entryable
     */
    public function __construct(Entryable $entryable)
    {
        $this->entryable = $entryable;
    }

    /**
     * @param EntryEntity $item
     * @return EntryEntity
     */
    public function save(EntryEntity $item)
    {
        $this->entryable->save($item);
        return $item;
    }

    /**
     * @param $id
     * @return EntryEntity|null
     */
    public function find($id)
    {
        return $this->entryable->find($id);
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        return $this->entryable->findAll();
    }
}
