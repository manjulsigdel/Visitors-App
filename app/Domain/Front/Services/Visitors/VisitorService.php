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
            trim(array_get($inputs, 'name')),
            array_get($inputs, 'gender'),
            trim(array_get($inputs, 'phone')),
            array_get($inputs, 'email'),
            trim(array_get($inputs, 'address')),
            trim(array_get($inputs, 'nationality')),
            array_get($inputs, 'dob'),
            trim(array_get($inputs, 'education')),
            array_get($inputs, 'contact_type')
        );
        return $visitors;
    }

    /**
     * @return mixed
     */
    public function getVisitors()
    {
        return $this->repository->getAllVisitors();
    }

    public function getOneByEmail($email)
    {
        $oneVisitor = null;
        $visitors   = $this->getVisitors();
        foreach ($visitors as $visitor) {
            if ( $visitor->getEmail() === $email ) {
                $oneVisitor = $visitor;
            }
        }
        return $oneVisitor;
    }
}
