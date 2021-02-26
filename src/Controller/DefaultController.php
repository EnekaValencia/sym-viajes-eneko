<?php

namespace App\Controller;

use App\Entity\Destination;
use App\Entity\Offer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
      $destinations = $this->getDoctrine()
        ->getRepository(Destination::class)
        ->findAllActive();

      return $this->render('default/index.html.twig', array(
        'destinations' => $destinations,
      ));
    }
}
