<?php

namespace App\Repositories\Visitors;


use App\Entities\Visitors\Visitor;
use Illuminate\Support\Facades\Storage;

/**
 * Class VisitorRepository
 * @package App\Repositories\Visitors
 */
class VisitorRepository implements IVisitorsRepository
{
    /**
     * @return array
     */
    public function getAllVisitors()
    {
        if ( !Storage::disk('local')->exists('visitors.csv') ) {
            return [];
        }
        $visitorsCsv      = Storage::disk('local')->get('visitors.csv');
        $visitorsCsvArray = explode("\n", $visitorsCsv);
        $visitorsArray    = [];
        for ($i = 2, $limit = count($visitorsCsvArray); $i < $limit; $i = $i + 2) {
            list($name, $gender, $phone, $email, $address, $nationality, $dob, $education, $contact_type) = explode(',', $visitorsCsvArray[$i]);
            $object = new Visitor($name, $gender, $phone, $email, $address, $nationality, $dob, $education, $contact_type);
            array_push($visitorsArray, $object);
        }
        return $visitorsArray;
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
            return $this->getAllVisitors();
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}