<?php

namespace AppBundle\Model;

class Country
{
    protected $name;
    protected $team;
    protected $info;

    /**
     * Country constructor.
     * @param $name
     * @param $team
     * @param $info
     */
    public function __construct($name, $team, $info)
    {
        $this->name = $name;
        $this->team = $team;
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
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param mixed $team
     */
    public function setTeam($team)
    {
        $this->team = $team;
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