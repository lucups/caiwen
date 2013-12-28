<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 13-12-28
 * Time: 下午4:14
 */

namespace Caiwen\CoreBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Caiwen\CoreBundle\Common\AjaxResponse as AR;

/**
 * Class FileController
 * @package Caiwen\CoreBundle\Controller\Admin
 * @Route("/file")
 */
class FileController extends Controller {

    /**
     * @Route("/upload", name="_file_upload")
     */
    public function upload(){
        return $this->makeResponse(AR::ERR_SUCCESS);
    }

    private function makeResponse($error_id = AR::ERR_SUCCESS, $data = null) {
        return new Response(AR::encode($error_id, $data));
    }
} 