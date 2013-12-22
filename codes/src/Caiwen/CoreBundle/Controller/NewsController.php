<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/news")
 */
class NewsController extends Controller
{
	/**
 	 * @Route("/")
 	 * @Template()
 	 */
    public function indexAction()
    {	
    	$name = "hello";
        return array('name' => $name);
    }

    /**
 	 * @Route("/list")
 	 * @Template()
 	 */
    public function listAction() {
        return array();
    }

    /**
     * @Route("/view/{news_id}")
     * @Template()
     */ 
    public function viewAction($news_id) {
        return array();
    }

    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction() {
        return array();
    }

    /**
     * @Route("/edit")
     * @Template()
     */
    public function editAction() {
        return array();
    }

}
