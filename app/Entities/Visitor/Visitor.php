<?php

namespace App\Entities\Visitors;

/**
 * Class Visitor
 * @package App\Entities\Visitors
 */
class Visitor
{
    /**
     * @var
     */
    private $name;
    /**
     * @var
     */
    private $gender;
    /**
     * @var
     */
    private $phone;
    /**
     * @var
     */
    private $email;
    /**
     * @var
     */
    private $address;
    /**
     * @var
     */
    private $nationality;
    /**
     * @var
     */
    private $dob;
    /**
     * @var
     */
    private $education;
    /**
     * @var
     */
    private $contact_type;

    /**
     * Visitor constructor.
     *
     * @param $name
     * @param $gender
     * @param $phone
     * @param $email
     * @param $address
     * @param $nationality
     * @param $dob
     * @param $education
     * @param $contact_type
     */
    public function __construct($name, $gender, $phone, $email, $address, $nationality, $dob, $education, $contact_type)
    {
        $this->name         = $name;
        $this->gender       = $gender;
        $this->phone        = $phone;
        $this->email        = $email;
        $this->address      = $address;
        $this->nationality  = $nationality;
        $this->dob          = $dob;
        $this->education    = $education;
        $this->contact_type = $contact_type;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @return mixed
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * @return mixed
     */
    public function getContactType()
    {
        return $this->contact_type;
    }

    /**
     * @return string
     */
    public function toCsvFormat()
    {
        return sprintf(
            "%s,%s,%s,%s,%s,%s,%s,%s,%s",
            $this->name,
            $this->gender,
            $this->phone,
            $this->email,
            $this->address,
            $this->nationality,
            $this->dob,
            $this->education,
            $this->contact_type
        );
    }

    /**
     * @return string
     */
    public function csvTitle()
    {
        return sprintf(
            "%s,%s,%s,%s,%s,%s,%s,%s,%s",
            "Name",
            "Gender",
            "Phone",
            "Email",
            "Address",
            "Nationality",
            "Dob",
            "Education",
            "Preferred Contact Type"
        );
    }
}
