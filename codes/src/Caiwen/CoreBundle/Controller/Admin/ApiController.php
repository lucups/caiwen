<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 13-12-23
 * Time: 下午6:27
 */

namespace Caiwen\CoreBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Caiwen\CoreBundle\Entity\News;
use Caiwen\CoreBundle\Entity\NewsRepository;

/**
 * Class ApiController
 * @package Caiwen\CoreBundle\Controller\Admin
 * @Route("/api")
 */
class ApiController extends Controller {

    /**
     * @Route("/news-add", name="_api_news_add")
     */
    public function newsAddAction(Request $request) {
        $news = new News();
        $news->setUser($this->getUser());
        $news->setTitle($request->get('title'));
        $news->setContent($request->get('content'));

        $news_r = $this->getDoctrine()->getRepository('CaiwenCoreBundle:News');
        $news_r->save($news);
        return new Response('OK');
    }

} 