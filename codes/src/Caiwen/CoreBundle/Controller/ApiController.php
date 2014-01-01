<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Caiwen\CoreBundle\Common\AjaxResponse as AR;

/**
 * @Route("/api")
 */
class ApiController extends Controller {

    /**
     * @Route("/news/add")
     */
    public function addNewsNewsAction() {
        return $this->makeResponse(AR::ERR_SUCCESS);
    }

    /**
     * @Route("/news/delete/{news_id}")
     */
    public function deleteNewsAction($news_id) {
        return $this->makeResponse(AR::ERR_SUCCESS);
    }

    /**
     * @Route("/news/edit/{news_id}", name="")
     */
    public function editNewsAction($news_id) {
        return $this->makeResponse(AR::ERR_SUCCESS);
    }

    /**
     * @Route("/question-add", name="_api_question_add")
     */
    public function questionAddAction() {

        return $this->makeResponse(AR::ERR_SUCCESS);
    }

    private function makeResponse($error_id = AR::ERR_SUCCESS, $data = null) {
        return new Response(AR::encode($error_id, $data));
    }

}
