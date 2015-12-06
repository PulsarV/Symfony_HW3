<?php

namespace AppBundle\Controller;

use AppBundle\Model\Team;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TeamController extends Controller
{
    private function createFakeTeam($country)
    {
        $faker = \Faker\Factory::create();
        return new Team($country, $country, $faker->text(5000));
    }

    /**
     * @Route("/team/view/{teamName}", requirements={"teamName": "[-A-Za-z\x20\.\']+"}, name="teamview")
     * @Method("GET")
     * @Template()
     */
    public function viewAction($teamName)
    {
        return [
                'team' => $this->createFakeTeam($teamName),
                'playersRoute' => '/player/view/',
                'coachsRoute' => '/coach/view/',
               ];
    }
}
