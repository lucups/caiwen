<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Caiwen\CoreBundle\Common\CUtils;
use Caiwen\CoreBundle\Entity\News;

/**
 * @Route("/")
 */
class DefaultController extends Controller {
    /**
     * @Route("/", name="_index")
     * @Template()
     */
    public function indexAction() {
        $name = "Hello, Caiwen !";
        return array('name' => $name);
    }

    /**
     * @Route("/personal-info", name="_personal_info")
     * @Template()
     */
    public function personalInfoAction(Request $request) {

        $str = 'hello_world';
        $str_n = CUtils::toCapitalizeCamelCase($str);

        $news = new News();
        CUtils::setParameters($news, $request, array('title', 'content'));

        return array(
            'output' => $news->getTitle().$news->getContent(),
        );
    }

    /**
     * @return array
     * @Route("/about-us", name="_about_us")
     * @Template()
     */
    public function aboutUsAction() {
        return array();
    }

    /**
     * @Route("/upload", name="_upload")
     * @Template()
     */
    public function uploadAction() {
        return array();
    }

}
