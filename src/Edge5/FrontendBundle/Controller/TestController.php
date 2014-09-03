<?php

namespace Edge5\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller
{
    private $request;
    //private $locale;

    public function preExecute(Request $request)
    {
        $this->request = $request;
        //$this->locale = $request->getPreferredLanguage($this->container->getParameter('locales'));
    }

    /**
     * @Route("/responsiveAnimatedBanner", name="_responsiveAnimatedBanner")
     * @Template()
     */
    public function responsiveAnimatedBannerAction()
    {
        return array();
    }

	/**
	 * @Route("/responsiveAnimatedMenu", name="_responsiveAnimatedMenu")
	 * @Template()
	 */
	public function responsiveAnimatedMenuAction()
	{
		$data = array(
			array(
				'title' => 'bla',
				'subTitle' => 'spimdso',
				'icon' => 'fa-share',
				'url' => 'http://test'
			),
			array(
				'title' => 'bla2',
				'subTitle' => 'spimdso',
				'icon' => 'fa-share',
				'url' => 'http://test'
			),
			array(
				'title' => 'bla',
				'subTitle' => 'spimdso',
				'icon' => 'fa-share',
				'url' => 'http://test'
			),

			array(
				'title' => 'bla',
				'subTitle' => 'spimdso',
				'icon' => 'fa-share',
				'url' => 'http://test'
			),
		);

		return array('data' => $data);
	}
	
}
