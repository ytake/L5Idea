<?php
namespace App\Repositories;

use App\Entities\EntryEntity;

/**
 * Interface EntryRepository
 * @package App\Repositories
 */
interface EntryRepositoryInterface
{
    /**
     * @param EntryEntity $item
     * @return EntryEntity
     */
    public function save(EntryEntity $item);

    /**
     * @param $id
     * @return EntryEntity|null
     */
    public function find($id);

    /**
     * @return mixed
     */
    public function findAll();
}
