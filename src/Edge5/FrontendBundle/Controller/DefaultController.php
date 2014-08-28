<?php

namespace Edge5\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    private $request;

    public function preExecute(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @Route("/", name="_home")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => 'World');
    }

    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function helloAction($name)
    {
        return $this->render('Edge5FrontendBundle:Default:index.html.twig', array('name' => $name));
    }
}
