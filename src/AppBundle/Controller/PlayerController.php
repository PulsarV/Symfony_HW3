<?php

namespace AppBundle\Controller;

use AppBundle\Model\Player;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlayerController extends Controller
{
    private function createFakePlayer($count, $team = '', $player = '')
    {
        $faker = \Faker\Factory::create();
        $players = [];
        for ($i = 0; $i < $count; $i++) {
            if ($team && $player) {
                $players[] = new Player($player, $team , $faker->text(5000));
            } elseif ($team) {
                $players[] = new Player($faker->name, $team , $faker->text(5000));
            } else {
                $players[] = new Player($faker->name, $faker->country , $faker->text(5000));
            }
        }
        return $players;
    }

    /**
     * @Route("/player/view/{teamName}/{playerName}", requirements={"teamName": "[-A-Za-z\x20\.\']+", "playerName": "[-A-Za-z\x20\.\']+"}, name="playerview")
     * @Method("GET")
     * @Template()
     */
    public function viewAction($teamName, $playerName)
    {
        return ['players' => $this->createFakePlayer(1, $teamName, $playerName)];
    }

    /**
     * @Route("/player/view/{teamName}", requirements={"teamName": "[-A-Za-z\x20\.\']+"}, name="playerindex")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($teamName)
    {
        return [
                'players' => $this->createFakePlayer(32, $teamName),
                'playerRoute' => '/player/view/' . $teamName,
               ];
    }

}
