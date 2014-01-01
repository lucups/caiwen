<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Caiwen\CoreBundle\Entity\Album;


/**
 * @Route("/photo")
 */
class PhotoController extends Controller {

    /**
     * @Route("/list/{album_id}", name="_photo_list")
     * @Template()
     */
    public function listAction($album_id) {
        $album_r = $this->getDoctrine()->getRepository('CaiwenCoreBundle:Album');
        $album = $album_r->findOneByAlbumId($album_id);
        $photo_r = $this->getDoctrine()->getRepository('CaiwenCoreBundle:Photo');
        $photos = $photo_r->findByAlbumId($album_id);

        return array(
            'album_id' => $album_id,
            'page_title' => $album->getTitle(),
            'photos' => $photos,
        );
    }

    /**
     * @Route("/view/{album_id}-{photo_id}", name="_photo_view")
     * @Template()
     */
    public function viewAction($album_id, $photo_id) {
        return array(
            'album_id' => $album_id,
            'photo_id' => $photo_id,
        );
    }

    /**
     * @Route("/search-list", name="_photo_search_list")
     * @Template()
     */
    public function searchListAction() {
        return array();
    }

}