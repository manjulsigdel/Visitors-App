<?php

namespace App\Repositories\Visitors;


use App\Entities\Visitors\Visitor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

/**
 * Class VisitorRepository
 * @package App\Repositories\Visitors
 */
class VisitorRepository implements IVisitorsRepository
{
    /**
     * @return array
     */
    public function getAllVisitors(): array
    {
        if ( !Storage::disk('local')->exists('visitors.csv') ) {
            return [];
        }
        $visitorsCsv      = Storage::disk('local')->get('visitors.csv');
        $visitorsCsvArray = explode("\n", $visitorsCsv);

        $visitorsArray = $this->convertVisitorsCsvArrayToVisitorsArray($visitorsCsvArray, 2, count($visitorsCsvArray), count($visitorsCsvArray));

        return $visitorsArray;
    }

    /**
     * @param int $page
     * @param int $perPage
     *
     * @return array
     */
    public function getPaginatedVisitors(int $page, int $perPage): array
    {
        if ( !Storage::disk('local')->exists('visitors.csv') ) {
            return [];
        }
        $visitorsCsv      = Storage::disk('local')->get('visitors.csv');
        $visitorsCsvArray = explode("\n", $visitorsCsv);
        $init             = (2 * ($page - 1) * $perPage) + 2;
        $count            = count($visitorsCsvArray);
        $lastPage         = ceil($count / ($perPage * 2));
        $limit            = (2 * $perPage * $page) + 2;
        $visitors         = [];

        $visitorsArray = $this->convertVisitorsCsvArrayToVisitorsArray($visitorsCsvArray, $init, $count, $limit);

        $visitors['visitors'] = $visitorsArray;
        $visitors['links']    = [
            "total"          => $count / 2 - 1,
            "per_page"       => $perPage,
            "current_page"   => $page,
            "last_page"      => $lastPage,
            "first_page_url" => URL::to('/?page=1'),
            "last_page_url"  => URL::to('/?page='.$lastPage),
            "next_page_url"  => $page >= $lastPage ? null : URL::to(sprintf('%s=%d', '/?page', $page + 1)),
            "prev_page_url"  => $page === 1 ? null : URL::to(sprintf('%s=%d', '/?page', $page - 1)),
        ];
        return $visitors;
    }

    /**
     *
     * /**
     * @param array $visitorArray
     *
     * @return bool
     * @throws \Exception
     */
    public function save(array $visitorArray): bool
    {
        try {
            $visitor  = new Visitor($visitorArray);
            $csvText  = $visitor->toCsvFormat();
            $csvTitle = $visitor->csvTitle();
            $exists   = Storage::disk('local')->exists('visitors.csv');
            if ( !$exists ) {
                Storage::disk('local')->append('visitors.csv', $csvTitle."\n");
            }
            Storage::disk('local')->append('visitors.csv', $csvText."\n");
            return true;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * @param $visitorsCsvArray
     * @param $init
     * @param $count
     * @param $limit
     *
     * @return array
     */
    public function convertVisitorsCsvArrayToVisitorsArray($visitorsCsvArray, $init, $count, $limit)
    {
        $visitorsArray = [];
        for ($i = $init; $i < ($count <= $limit ? $count : $limit); $i = $i + 2) {
            list($name, $gender, $phone, $email, $address, $nationality, $dob, $education, $contactType) = explode(',', $visitorsCsvArray[$i]);
            $visitorArray = [
                'name'         => $name,
                'gender'       => $gender,
                'phone'        => $phone,
                'email'        => $email,
                'address'      => $address,
                'nationality'  => $nationality,
                'dob'          => $dob,
                'education'    => $education,
                'contact_type' => $contactType,
            ];
            $object       = new Visitor($visitorArray);
            array_push($visitorsArray, $object);
        }
        return $visitorsArray;
    }
}
