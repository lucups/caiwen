<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/api")
 */
class ApiController extends Controller {

    /**
     * @Route("/news/add")
     */
    public function addNewsNewsAction() {
        return new Response('0000');
    }

    /**
     * @Route("/news/delete/{news_id}")
     */
    public function deleteNewsAction($news_id) {
        return new Response('0001');
    }

    /**
     * @Route("/news/edit/{news_id}")
     */
    public function editNewsAction($news_id) {
        return new Response('0002');
    }

}
