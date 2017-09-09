<?php

namespace AirwaysBundle\Controller;

use AirwaysBundle\Entity\Flight;
use AirwaysBundle\Form\CreateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AirwaysBundle\Form\EditType;
use Faker\Provider\Base;

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
    $Flight = (new Flight());
    $form = $this->createForm(CreateType::class, $Flight);
    $form->handleRequest($request);
    $errors = $form->getErrors();
    if ($form->isSubmitted() && $form->isValid()) {
      $data = $form->getData();
      $data->setFlightCode(Base::regexify('[A-Z][1][0-9][0-9][0-9]'));
      $data->setSeat(100);
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($data);
      $entityManager->flush();
      $this->addFlash("success", "Le vol a bien été créé.");
      return $this->redirectToRoute("admin");
    }
    return $this->render("AirwaysBundle:Default:create.html.twig",
      array(
        "form" => $form->createView(),
        "errors" => $errors
      ));
  }

  /**
   * @Route("/admin/edit/{id}", name="edit", requirements={"id"="\d+"})
   */
  public function editAction(Request $request, $id) {
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
