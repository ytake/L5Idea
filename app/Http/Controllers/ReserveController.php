<?php

namespace App\Http\Controllers;

use App\Services\ReserveService;
use App\Http\Requests\ReserveRequest;

/**
 * Class ReserveController
 * @Controller(prefix="reserve")
 */
class ReserveController extends AbstractController
{
    /** @var ReserveService  */
    protected $service;

    /**
     * ReserveController constructor.
     *
     * @param ReserveService $service
     */
    public function __construct(ReserveService $service)
    {
        $this->service = $service;
    }

    /**
     * @Get("/", as="reserve.index")
     *
     * @return array
     */
    public function getIndex()
    {
        return view('reserve.index', ['list' => $this->service->getReserves()]);
    }

    /**
     * @Get("form", as="reserve.form")
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getForm()
    {
        return view('reserve.form');
    }

    /**
     * @Post("apply", as="reserve.post.apply")
     * @param ReserveRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postApply(ReserveRequest $request)
    {
        $this->service->addReserve($request->only('title', 'name'));
        return redirect()->route('reserve.get.apply');
    }

    /**
     * @Get("apply", as="reserve.get.apply")
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getApply()
    {
        return view('reserve.apply');
    }
}
