<?php

namespace AirwaysBundle\Controller;

use AirwaysBundle\Entity\Flight;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AirwaysBundle\Form\AirwaysType;

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
    return $this->render('AirwaysBundle:Default:admin.html.twig',
      array(
        "flightList" => $flightList
      ));
  }
  /**
   * @Route("admin/edit/{id}", name="edit", requirements={"id"="\d+"})
   */
  public function editAction($id) {
    # Récupérer les données
    $entityManager = $this->getDoctrine()->getManager();
    $todo = $entityManager->getRepository(Flight::class)->find($id);
    $form = $this->createForm(AirwaysType::class, $todo);

    return $this->render("AirwaysBundle:Default:edit.html.twig",
      array(
        "form" => $form->createView()
      ));
  }
}
