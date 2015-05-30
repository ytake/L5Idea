<?php

class EntryRepositoryTest extends \PHPUnit_Framework_TestCase
{

    /** @var \App\Repositories\EntryRepository */
    protected $entry;
    protected function setUp()
    {
        $this->entry = new \App\Repositories\EntryRepository(
            new StubEntryable()
        );
    }

    public function testSave()
    {
        $entry = new \App\Entities\EntryEntity();
        $this->assertInstanceOf('App\Entities\EntryEntity', $this->entry->save($entry));
    }
    public function testFind()
    {
        $this->assertNull($this->entry->find(1));
    }
    public function testFindAll()
    {
        $this->assertNull($this->entry->findAll());
    }
}

class StubEntryable implements \App\Repositories\Criteria\Entryable
{

    /**
     * @param \App\Entities\EntryEntity $entity
     * @return mixed
     */
    public function save(\App\Entities\EntryEntity $entity)
    {
        return $entity;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return null;
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        return null;
    }

}