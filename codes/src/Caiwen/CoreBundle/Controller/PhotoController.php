<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/photo")
 */
class PhotoController extends Controller {

    /**
     * @Route("/list", name="_photo_list")
     * @Template()
     */
    public function listAction() {
        return array();
    }

    /**
     * @Route("/view", name="_photo_view")
     * @Template()
     */
    public function viewAction() {
        return array();
    }

    /**
     * @Route("/search-list", name="_photo_search_list")
     * @Template()
     */
    public function searchListAction() {
        return array();
    }

}