<?php

namespace AppBundle\Controller;

use AppBundle\Model\Coach;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoachController extends Controller
{
    private function createFakeCoach($count, $team = '', $coach = '')
    {
        $faker = \Faker\Factory::create();
        $coachs = [];
        for ($i = 0; $i < $count; $i++) {
            if ($team && $coach) {
                $coachs[] = new Coach($coach, $team , $faker->text(5000));
            } elseif ($team) {
                $coachs[] = new Coach($faker->name, $team , $faker->text(5000));
            } else {
                $coachs[] = new Coach($faker->name, $faker->country , $faker->text(5000));
            }
        }
        return $coachs;
    }

    /**
     * @Route("/coach/view/{teamName}/{coachName}", requirements={"teamName": "[-A-Za-z\x20\.\']+", "coachName": "[-A-Za-z\x20\.\']+"}, name="coachview")
     * @Method("GET")
     * @Template()
     */
    public function viewAction($teamName, $coachName)
    {
        return ['coachs' => $this->createFakeCoach(1, $teamName, $coachName)];
    }

    /**
     * @Route("/coach/view/{teamName}", requirements={"teamName": "[-A-Za-z\x20\.\']+"}, name="coachindex")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($teamName)
    {
        return [
                'coachs' => $this->createFakeCoach(4, $teamName),
                'coachRoute' => '/coach/view/' . $teamName,
               ];
    }
}
