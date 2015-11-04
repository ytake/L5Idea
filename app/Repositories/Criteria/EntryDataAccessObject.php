<?php
namespace App\Repositories\Criteria;

use App\Entities\EntryEntity;
use Illuminate\Database\DatabaseManager;

/**
 * Class EntryDataAccessObject
 * @package App\Repositories\Criteria
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class EntryDataAccessObject extends FluentObject implements Entryable
{
    /** @var DatabaseManager */
    protected $db;

    /** @var string */
    protected $table = 'entries';

    /** @var string  */
    protected $identity = 'entry_id';

    /**
     * @param DatabaseManager $db
     */
    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }

    /**
     * @param EntryEntity $item
     * @return int
     */
    public function save(EntryEntity $item)
    {
        if (is_null($item->getId())) {
            return $this->db->connection()
                ->table($this->table)->insertGetId($this->data($item));
        }
        return $this->db->connection()
            ->table($this->table)
            ->where('entry_id', $item->getId())->update($this->data($item));
    }

    /**
     * @param $id
     * @return EntryEntity
     */
    public function find($id)
    {
        $data = $this->db->connection()
            ->table($this->table)->where('entry_id', $id)->first();
        if(is_null($data)) {
            return null;
        }
        return $this->getData($data, new EntryEntity);
    }

    /**
     * @return array|static[]
     */
    public function findAll()
    {
        return $this->db->connection()
            ->table($this->table)->get();
    }
}
