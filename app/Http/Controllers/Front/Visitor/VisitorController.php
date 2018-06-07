<?php

namespace App\Http\Controllers\Front\Visitor;

use App\Domain\Front\Requests\Visitors\VisitorCreateRequest;
use App\Domain\Front\Services\Visitors\VisitorService;
use Illuminate\Http\Request;


/**
 * Class VisitorController
 * @package App\Http\Controllers\Front\Visitor
 */
class VisitorController
{

    /**
     * @var VisitorService
     */
//    protected $visitorService;

    /**
     * VisitorController constructor.
     */
    public function __construct(VisitorService $visitorService)
    {
        $this->visitorService = $visitorService;
    }

    /**
     * @return VisitorService
     */
    public function index()
    {
        try {
            $visitors = $this->visitorService->getVisitors();
            return view('front.modules.user.lists', compact('visitors'));
        } catch (\Exception $exception) {
            return view('front.modules.user.lists', compact('exception'));
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('front.modules.user.add');
    }


    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function save(VisitorCreateRequest $request)
    {
        try {
            $visitors = $this->visitorService->saveVisitor($request->all());
            return view('front.modules.user.lists', compact('visitors'));
        } catch (\Exception $exception) {
            return view('front.modules.user.lists', compact('exception'));
        }
    }

    /**
     * @return VisitorService
     */
    public function getOne($email)
    {
        try {
            $visitor = $this->visitorService->getOneByEmail($email);
            return view('front.modules.user.show', compact('visitor'));
        } catch (\Exception $exception){
            return view('front.modules.user.lists', compact('exception'));
        }

    }
}
