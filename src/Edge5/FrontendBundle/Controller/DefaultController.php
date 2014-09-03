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
    //private $locale;

    public function preExecute(Request $request)
    {
        $this->request = $request;
        //$this->locale = $request->getPreferredLanguage($this->container->getParameter('locales'));
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
     * @Route("{_locale}/hello/{name}", name="_hello_lang")
     * @Template()
     */
    public function helloAction($name)
    {
        return $this->render('Edge5FrontendBundle:Default:index.html.twig', array('name' => $name));
    }


}
