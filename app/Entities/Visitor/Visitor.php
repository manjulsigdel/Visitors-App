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
     * @param array $visitor
     */
    public function __construct(array $visitor)
    {
        $this->name         = array_get($visitor, 'name', null);
        $this->gender       = array_get($visitor, 'gender', null);
        $this->phone        = array_get($visitor, 'phone', null);
        $this->email        = array_get($visitor, 'email', null);
        $this->address      = array_get($visitor, 'address', null);
        $this->nationality  = array_get($visitor, 'nationality', null);
        $this->dob          = array_get($visitor, 'dob', null);
        $this->education    = array_get($visitor, 'education', null);
        $this->contact_type = array_get($visitor, 'contact_type', null);
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
