<?php

namespace App\Domain\Front\Services\Visitors;


use App\Repositories\Visitors\IVisitorsRepository;

/**
 * Class VisitorService
 * @package App\Domain\Front\Services\Visitors
 */
class VisitorService
{
    /**
     * @var IVisitorsRepository
     */
    private $repository;

    /**
     * VisitorService constructor.
     */
    public function __construct(IVisitorsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $inputs
     *
     * @return array
     */
    public function saveVisitor($inputs)
    {
        $visitors = $this->repository->save(
            array_get($inputs, 'name'),
            array_get($inputs, 'gender'),
            array_get($inputs, 'phone'),
            array_get($inputs, 'email'),
            array_get($inputs, 'address'),
            array_get($inputs, 'nationality'),
            array_get($inputs, 'dob'),
            array_get($inputs, 'education'),
            array_get($inputs, 'contact_type')
        );
        return $visitors;
    }
}
