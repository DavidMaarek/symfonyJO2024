<?php

namespace DavidBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CountryController extends Controller
{
    /**
     * @Route("/country")
     */
    public function indexAction()
    {
        return $this->render('DavidBundle:Country:index.html.twig');
    }
}
