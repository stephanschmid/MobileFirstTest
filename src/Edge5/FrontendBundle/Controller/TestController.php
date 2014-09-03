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
				'title' => 'Exceptional Service',
				'subTitle' => 'Personalized to your needs',
				'icon' => 'fa-paperclip',
				'url' => 'http://service'
			),
			array(
				'title' => 'Creative Storytelling',
				'subTitle' => 'Advanced use of technology',
				'icon' => 'fa-home',
				'url' => 'http://story'
			),
			array(
				'title' => 'infographical Education',
				'subTitle' => 'Understanding visually',
				'icon' => 'fa-cloud',
				'url' => 'http://visual'
			),

			array(
				'title' => 'Sophisticated Team',
				'subTitle' => 'Professionals in action',
				'icon' => 'fa-wheelchair',
				'url' => 'http://team'
			),

			array(
				'title' => 'Unconditional Support',
				'subTitle' => '24/7 for your needs',
				'icon' => 'fa-futbol-o',
				'url' => 'http://support'
			),
		);

		return array('data' => $data);
	}
	
}
