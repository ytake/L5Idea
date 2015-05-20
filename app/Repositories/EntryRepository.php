<?php
namespace App\Repositories;

use App\Entities\EntryEntity;
use Illuminate\Database\DatabaseManager;

/**
 * Class EntryRepository
 * @package App\Repositories
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class EntryRepository implements EntryRepositoryInterface
{

    /** @var DatabaseManager  */
    protected $db;

    /**
     * @param DatabaseManager $db
     */
    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }

    /**
     * @param $id
     * @return EntryEntity|null
     */
    public function find($id)
    {
        $result = $this->db->connection()->table('entries')
            ->where('entry_id', $id)->first();
        return $this->mapping($result);
    }

    /**
     * @param $object
     * @return EntryEntity|null
     */
    protected function mapping($object)
    {
        if(is_null($object)) {
            return null;
        }
        $entry = new EntryEntity;
        foreach ($object as $prop => $val) {
            $entry->$prop = $val;
        }
        return $entry;
    }
}