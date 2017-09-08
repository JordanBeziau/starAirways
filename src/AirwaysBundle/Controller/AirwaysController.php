<?php

namespace AirwaysBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AirwaysController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render('AirwaysBundle:Default:index.html.twig');
    }

  /**
   * @Route("/admin", name="admin")
   */
  public function adminAction() {
    return $this->render("AirwaysBundle:default:admin.html.twig");
  }
}
