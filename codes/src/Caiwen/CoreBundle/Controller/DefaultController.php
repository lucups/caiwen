<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/")
 */
class DefaultController extends Controller {
    /**
     * @Route("/", name="_index")
     * @Template()
     */
    public function indexAction() {
        $name = "hello";
        return array('name' => $name);
    }
}
