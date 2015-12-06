<?php

namespace AppBundle\Controller;

use AppBundle\Model\Country;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CountryController extends Controller
{
    private function createFakeCountry($count, $country = '')
    {
        $faker = \Faker\Factory::create();
        $countries = [];
        for ($i = 0; $i < $count; $i++) {
            if ($country) {
                $countries[] = new Country($country, $country, $faker->text(5000));
            } else {
                $c = $faker->country;
                $countries[] = new Country($c, $c , $faker->text(5000));
            }
        }
        return $countries;
    }

    /**
     * @Route("/country/view/{countryName}", requirements={"countryName": "[-A-Za-z\x20\.\']+"}, name="countryview")
     * @Method("GET")
     * @Template()
     */
    public function viewAction($countryName)
    {
        return [
                'countries' => $this->createFakeCountry(1, $countryName),
                'teamRoute' => '/team/view/',
               ];
    }

    /**
     * @Route("/country/view/", name="countryindex")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return [
                'countries' => $this->createFakeCountry(24),
                'countryRoute' => '/country/view/',
               ];
    }
}
