<?php

namespace AirwaysBundle\Controller;

use AirwaysBundle\Entity\Flight;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AirwaysController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
      $entityManager = $this->getDoctrine()->getManager();
      $flightList = $entityManager->getRepository(Flight::class)->findAll();
      return $this->render('AirwaysBundle:Default:index.html.twig',
        array(
          "flightList" => $flightList
        ));
    }

  /**
   * @Route("/admin", name="admin")
   */
  public function adminAction() {
    $entityManager = $this->getDoctrine()->getManager();
    $flightList = $entityManager->getRepository(Flight::class)->findAll();
    return $this->render('AirwaysBundle:Default:index.html.twig',
      array(
        "flightList" => $flightList
      ));
    return $this->render("AirwaysBundle:default:admin.html.twig");
  }
}
