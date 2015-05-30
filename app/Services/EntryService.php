<?php
namespace App\Services;

use Carbon\Carbon;
use App\Entities\EntryEntity;
use App\Repositories\EntryRepositoryInterface;

/**
 * Class EntryService
 * @package App\Services
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class EntryService
{

    /** @var EntryRepositoryInterface  */
    protected $entry;

    /**
     * @param EntryRepositoryInterface $entry
     */
    public function __construct(EntryRepositoryInterface $entry)
    {
        $this->entry = $entry;
    }

    /**
     * @param $id
     * @return \App\Entities\EntryEntity|null
     */
    public function getEntry($id)
    {
        return $this->entry->find($id);
    }

    /**
     * @param array $params
     * @return EntryEntity
     */
    public function setEntry(array $params)
    {
        $entry = new EntryEntity;
        $entry->content = $params['content'];
        $entry->title = $params['title'];
        $datetime = Carbon::now()->toDateTimeString();
        $entry->created_at = $datetime;
        $entry->updated_at = $datetime;
        return $this->entry->save($entry);
    }
}
