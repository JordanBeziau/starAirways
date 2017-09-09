<?php

namespace AirwaysBundle\Controller;

use AirwaysBundle\Entity\Flight;
use AirwaysBundle\Form\CreateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AirwaysBundle\Form\EditType;

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
   * @Route("admin/create", name="create")
   */
  public function createAction(Request $request) {
    $form = $this->createForm(CreateType::class);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $data = $form->getData();
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($data);
      $entityManager->flush();
      $this->addFlash("success", "La Todo a bien été créée.");
      return $this->redirectToRoute("admin");
    }
    return $this->render("AirwaysBundle:Default:create.html.twig",
      array(
        "form" => $form->createView()
      ));
  }

  /**
   * @Route("/admin/edit/{id}", name="edit", requirements={"id"="\d+"})
   */
  public function editAction(Request $request, $id) {
    # Récupérer les données
    $entityManager = $this->getDoctrine()->getManager();
    $flight = $entityManager->getRepository(Flight::class)->find($id);
    $form = $this->createForm(EditType::class, $flight);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
     $entityManager->flush();
     $this->addFlash("success", "Le vol a bien été mis à jour !");
     return $this->redirectToRoute("edit", array("id" => $flight->getId()));
    }

    return $this->render("AirwaysBundle:Default:edit.html.twig",
      array(
        "form" => $form->createView(),
        "flight" => $flight
      ));
  }

  /**
   * @Route("/admin/remove", name="remove")
   */
  public function removeAction(Request $request) {
    $id = $request->get("id");
    $entityManager = $this->getDoctrine()->getManager();
    $todo = $entityManager->getRepository(Flight::class)->find($id);
    $entityManager->remove($todo);
    $entityManager->flush();
    return $this->redirectToRoute("admin");
  }
}
