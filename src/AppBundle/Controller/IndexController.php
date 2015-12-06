<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return ['countries' => ['Albania', 'Austria', 'Belgium', 'Croatia', 'Czech Republic', 'England', 'France',
            'Germany', 'Hungary', 'Iceland', 'Ireland', 'Italy', 'Northern Ireland', 'Poland', 'Portugal', 'Romania',
            'Russia', 'Slovakia', 'Spain', 'Sweden', 'Switzerland', 'Turkey', 'Ukraine', 'Wales',
            ]
        ];
    }
}
