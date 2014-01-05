<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Caiwen\CoreBundle\Entity\Docs;

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
    public function searchListAction(Request $request) {

        $title = $request->get('title');
        $author = $request->get('author');
        $keywords = $request->get('keywords');

        $arr = array(
            'title' => $title,
            'author' => $author,
            'keywords' => $keywords,
        );

        $docs_r = $this->getDoctrine()->getRepository('CaiwenCoreBundle:Docs');
        $docses = $docs_r->doSearch($arr);

        return array(
            'docses' => $docses,
        );
    }

}