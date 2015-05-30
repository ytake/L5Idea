<?php
namespace App\Repositories\Criteria;

use App\Entities\EntryEntity;

/**
 * Interface Entryable
 * @package App\Repositories\Criteria
 */
interface Entryable
{

    /**
     * @param EntryEntity $entity
     * @return mixed
     */
    public function save(EntryEntity $entity);

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @return mixed
     */
    public function findAll();

}
