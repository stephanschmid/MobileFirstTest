<?php

namespace Edge5\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->render('Edge5BackendBundle::base_dashboard.html.twig');
    }

    /**
     * @Route("/", name="startAdmin")
     */
    public function startAction()
    {
        return $this->redirect($this->generateUrl("dashboard"));
    }
}
