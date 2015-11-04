<?php
namespace App\Http\Controllers;

use App\Services\EntryService;

/**
 * Class EntryController
 * @Resource("entry",only={"show", "store"})
 *
 * @package App\Http\Controllers
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class EntryController extends AbstractController
{

    /** @var EntryService */
    protected $entry;

    /**
     * @param EntryService $entry
     */
    public function __construct(EntryService $entry)
    {
        $this->entry = $entry;
    }

    /**
     * @param $id
     *
     * @return \App\Entities\EntryEntity|null
     */
    public function show($id = null)
    {
        return response()->json($this->entry->getEntry($id));
    }

    /**
     * @return \App\Entities\EntryEntity
     */
    public function store()
    {
        $this->entry->setEntry([
            'title' => 'hello Laravel5.1',
            'content' => 'Laravel makes connecting with databases and running queries extremely simple.',
        ]);
    }
}
