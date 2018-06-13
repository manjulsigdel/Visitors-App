<?php

namespace App\Domain\Front\Services\Visitors;


use App\Constants\Config;
use App\Entities\Visitors\Visitor;
use App\Jobs\Logs\CreateInsightOpsLog;
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
    public function saveVisitor($inputs): array
    {
        $visitorData = $this->setVisitorData($inputs);

        $this->repository->save($visitorData);

        $this->saveCreatedVisitorLogInInsightOps("Visitor Created Successfully");

        $visitors = $this->getPaginatedVisitors(1, Config::PAGINATE_SMALL);

        return $visitors;
    }

    /**
     * @return mixed
     */
    public function getPaginatedVisitors($page = 1, $perPage = null): array
    {
        return $this->repository->getPaginatedVisitors($page, $perPage);
    }

    /**
     * @return array
     */
    public function getAllVisitors(): array
    {
        return $this->repository->getAllVisitors();
    }


    /**
     * @param $email
     *
     * @return null
     */
    public function getOneByEmail($email): Visitor
    {
        $oneVisitor = null;
        $visitors   = $this->getAllVisitors();
        foreach ($visitors as $visitor) {
            if ( $visitor->getEmail() === $email ) {
                $oneVisitor = $visitor;
            }
        }
        return $oneVisitor;
    }

    /**
     *
     */
    public function saveCreatedVisitorLogInInsightOps(string $message)
    {
        dispatch(new CreateInsightOpsLog($message));
    }

    /**
     * @param array $inputs
     *
     * @return array
     */
    public function setVisitorData(array $inputs): array
    {
        return [
            'name'         => trim(array_get($inputs, 'name')),
            'gender'       => array_get($inputs, 'gender'),
            'phone'        => trim(array_get($inputs, 'phone')),
            'email'        => array_get($inputs, 'email'),
            'address'      => trim(array_get($inputs, 'address')),
            'nationality'  => trim(array_get($inputs, 'nationality')),
            'dob'          => array_get($inputs, 'dob'),
            'education'    => trim(array_get($inputs, 'education')),
            'contact_type' => array_get($inputs, 'contact_type'),
        ];
    }
}
