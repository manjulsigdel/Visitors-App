<?php

namespace App\Repositories\Visitors;


interface IVisitorsRepository
{
    public function save($name, $gender, $phone, $email, $address, $nationality, $dob, $education, $contact_type);
    public function getAllVisitors();
}
