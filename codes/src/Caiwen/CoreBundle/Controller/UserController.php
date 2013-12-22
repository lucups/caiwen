<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/user")
 */
class UserController extends Controller
{
	/**
 	 * @Route("/login")
 	 * @Template()
 	 */
    public function loginAction()
    {	
        return array();
    }

    /**
 	 * @Route("/register")
 	 * @Template()
 	 */
    public function registerAction() {	
        return array();
    }

	/**
 	 * @Route("/login")
 	 * @Template()
 	 */
    public function logoutAction() {
    	return array();
    }
}
