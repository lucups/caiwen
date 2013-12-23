<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/docs")
 */
class DocsController extends Controller {

    /**
     * @Route("/search", name="_docs_search")
     * @Template()
     */
    public function searchAction(){
        return array();
    }

    /**
     * @Route("/search-list", name="_docs_search_list")
     * @Template()
     */
    public function searchListAction() {
        return array();
    }

}