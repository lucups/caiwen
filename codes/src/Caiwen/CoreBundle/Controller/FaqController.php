<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/faq")
 */
class FaqController extends Controller {

    /**
     * @Route("/add", name="_faq_add")
     * @Template()
     */
    public function addAction() {
        return array();
    }

    /**
     * @Route("/list", name="_faq_list")
     * @Template()
     */
    public function listAction() {
        return array();
    }

    /**
     * @Route("/view/{question_id}", name="_faq_view")
     * @Template()
     */
    public function viewAction($question_id){
        return array();
    }

}