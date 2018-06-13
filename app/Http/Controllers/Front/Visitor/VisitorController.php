<?php

namespace App\Http\Controllers\Front\Visitor;

use App\Constants\Config;
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
    public function index(Request $request)
    {
        try {
            $page     = empty($request->query('page')) ? 1 : (int) $request->query('page');
            $visitors = $this->visitorService->getPaginatedVisitors($page, Config::PAGINATE_SMALL);
            return view('front.modules.user.lists', compact('visitors'));
        } catch (\Exception $exception) {
            return view('error', compact('exception'));
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
            $request->session()->flash('alert-success', 'Visitor was saved successfully!');
            $this->visitorService->saveVisitor($request->all());

            logger()->info("Visitor created successfully");

            return redirect()->route('front.visitor-lists');
        } catch (\Exception $exception) {
            logger()->error($exception);
            $request->session()->flash('alert-failure', 'Couldnot save visitor.!');
            return redirect()->route('front.visitor-lists');
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
        } catch (\Exception $exception) {
            return view('error', compact('exception'));
        }

    }
}
