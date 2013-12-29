<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/news")
 */
class NewsController extends Controller {

    /**
     * @Route("/list", name="_news_list")
     * @Template()
     */
    public function listAction() {
        return array();
    }

    /**
     * @Route("/view/{news_id}", name="_news_view")
     * @Template()
     */
    public function viewAction($news_id) {
        $news_r = $this->getDoctrine()->getRepository('CaiwenCoreBundle:News');
        $news = $news_r->findOneByNewsId($news_id);
        return array(
            'news' => $news,
        );
    }

    /**
     * @Route("/add", name="_news_add")
     * @Template()
     */
    public function addAction() {
        return array();
    }

    /**
     * @Route("/edit", name="_news_edit")
     * @Template()
     */
    public function editAction() {
        return array();
    }

}
