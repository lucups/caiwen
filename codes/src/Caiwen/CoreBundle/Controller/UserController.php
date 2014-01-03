<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Caiwen\CoreBundle\Entity\User;

/**
 * @Route("/user")
 */
class UserController extends Controller {

    /**
     * @Route("/login", name="_user_login")
     * @Template()
     */
    public function loginAction() {
        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
        $message = null;
        if ($error) $message = $this->get('translator')->trans($error->getMessage());
        return array(
            'error' => $error,
            'message' => $message,
        );
    }

    /**
     * @Route("/login-check", name="_user_login_check")
     */
    public function loginCheckAction() {

    }

    /**
     * @Route("/register", name="_user_register")
     * @Template()
     */
    public function registerAction() {
        return array();
    }

    /**
     * @Route("/forget-password", name="_user_forget_password")
     * @Template()
     */
    public function forgetPasswordAction() {
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
