<?php

namespace App\Repositories\Visitors;


use App\Constants\Config;
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
    public function getAllVisitors($page)
    {
        if ( !Storage::disk('local')->exists('visitors.csv') ) {
            return [];
        }
        $visitorsCsv      = Storage::disk('local')->get('visitors.csv');
        $visitorsCsvArray = explode("\n", $visitorsCsv);
        $init             = (2 * ($page - 1) * Config::PAGINATE_SMALL) + 2;
        $count            = count($visitorsCsvArray);
        $lastPage         = ceil($count / (Config::PAGINATE_SMALL * 2));
        $limit            = (2 * Config::PAGINATE_SMALL * $page) + 2;
        $visitorsArray    = [];
        $visitors         = [];
        for ($i = $init; $i < ($count <= $limit ? $count : $limit); $i = $i + 2) {
            list($name, $gender, $phone, $email, $address, $nationality, $dob, $education, $contact_type) = explode(',', $visitorsCsvArray[$i]);
            $object = new Visitor($name, $gender, $phone, $email, $address, $nationality, $dob, $education, $contact_type);
            array_push($visitorsArray, $object);
        }
        $visitors['visitors'] = $visitorsArray;
        $visitors['links']    = [
            "total"        => $count / 2 - 1,
            "per_page"     => Config::PAGINATE_SMALL,
            "current_page" => $page,
            "last_page"    => $lastPage,
            "first_page_url" => URL::to('/?page=1'),
            "last_page_url" => URL::to('/?page='. $lastPage),
            "next_page_url" => $page >= $lastPage ? null : URL::to(sprintf('%s=%d', '/?page', $page+1)),
            "prev_page_url" => $page === 1 ? null : URL::to(sprintf('%s=%d', '/?page', $page-1)),
        ];
        return $visitors;
    }


    /**
     * @param null $name
     * @param null $gender
     * @param null $phone
     * @param null $email
     * @param null $address
     * @param null $nationality
     * @param null $dob
     * @param null $education
     * @param null $contact_type
     *
     * @return array
     * @throws \Exception
     */
    public function save($name = null, $gender = null, $phone = null, $email = null, $address = null, $nationality = null, $dob = null, $education = null, $contact_type = null)
    {
        try {
            $visitor  = new Visitor($name, $gender, $phone, $email, $address, $nationality, $dob, $education, $contact_type);
            $csvText  = $visitor->toCsvFormat();
            $csvTitle = $visitor->csvTitle();
            $exists   = Storage::disk('local')->exists('visitors.csv');
            if ( !$exists ) {
                Storage::disk('local')->append('visitors.csv', $csvTitle."\n");
            }
            Storage::disk('local')->append('visitors.csv', $csvText."\n");
            return $this->getAllVisitors(1);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}