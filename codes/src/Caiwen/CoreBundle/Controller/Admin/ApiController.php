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

use Caiwen\CoreBundle\Common\AjaxResponse as AR;
use Caiwen\CoreBundle\Entity\User;
use Caiwen\CoreBundle\Entity\UserRepository;
use Caiwen\CoreBundle\Entity\News;
use Caiwen\CoreBundle\Entity\NewsRepository;
use Caiwen\CoreBundle\Entity\Photo;

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
        return $this->makeResponse(AR::ERR_SUCCESS);
    }

    /**
     * @Route("/news-delete/{news_id}", name="_api_news_delete")
     */
    public function newsDeleteAction($news_id){
        $news_r = $this->getDoctrine()->getRepository('CaiwenCoreBundle:News');
        $news = $news_r->findOneByNewsId($news_id);
        $this->makeResponse(AR::ERR_SUCCESS);
    }

    /**
     * @Route("/docs-add", name="_api_docs_add")
     */
    public function docsAddAction(){

        return $this->makeResponse(AR::ERR_SUCCESS);
    }

    /**
     * @Route("/photo-add", name="_api_photo_add")
     */
    public function photoAddAction(Request $request){

        $album_id = $request->get('album_id');
        $title = $request->get('title');
        $content = $request->get('content');
        $image_path = $request->get('image_path');

        $photo = new Photo();
        $photo->setAlbumId($album_id);
        $photo->setTitle($title);
        $photo->setContent($content);
        $photo->setImagePath($image_path);

        $photo_r = $this->getDoctrine()->getRepository('CaiwenCoreBundle:Photo');
        $photo_r->save($photo);
        return $this->makeResponse(AR::ERR_SUCCESS);
    }

    private function makeResponse($error_id = AR::ERR_SUCCESS, $data = null) {
        return new Response(AR::encode($error_id, $data));
    }

} 