<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


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
     * @Route("/personal-info/{name}", name="_personal_info")
     * @Template()
     */
    public function personalInfoAction($name){
        $info = array();
        if($name == 'ws'){
            $info = array(
                'name' => '王双 ',
                'title' => '大米饭',
            );
        }else if($name == 'wnp'){
            $info = array(
                'name' => '王念培 ',
                'title' => '小米粥',
            );
        }

        return array(
            'info' => $info,
        );
    }

    /**
     * @Route("/upload", name="_upload")
     * @Template()
     */
    public function uploadAction(){
        return array();
    }

}
