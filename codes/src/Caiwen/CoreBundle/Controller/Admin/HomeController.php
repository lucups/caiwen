<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 13-12-23
 * Time: 下午5:58
 */

namespace Caiwen\CoreBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class HomeController
 * @package Caiwen\CoreBundle\Controller\Admin
 * @Route("/admin")
 */
class HomeController extends Controller{

    /**
     * @Route("/index", name="_admin_index")
     */
    public function indexAction(){
        return array();
    }

} 