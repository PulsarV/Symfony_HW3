<?php

namespace AppBundle\Model;

class Team
{
    protected $name;
    protected $country;
    protected $info;

    /**
     * Team constructor.
     * @param $name
     * @param $country
     * @param $info
     */
    public function __construct($name, $country, $info)
    {
        $this->name = $name;
        $this->country = $country;
        $this->info = $info;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }
}