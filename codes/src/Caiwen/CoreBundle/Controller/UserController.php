<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/user")
 */
class UserController extends Controller {

    /**
     * @Route("/login", name="_user_login")
     * @Template()
     */
    public function loginAction() {
        return array();
    }

    /**
     * @Route("/register", name="_user_register")
     * @Template()
     */
    public function registerAction() {
        return array();
    }

    /**
     * @Route("/logout", name="_user_logout")
     * @Template()
     */
    public function logoutAction() {
        return array();
    }
}
