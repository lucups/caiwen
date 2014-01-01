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
use Caiwen\CoreBundle\Entity\File;

/**
 * Class FileController
 * @package Caiwen\CoreBundle\Controller\Admin
 * @Route("/file")
 */
class FileController extends Controller {

    /**
     * @Route("/upload", name="_file_upload")
     */
    public function uploadAction(Request $request) {
        $file = new File();
        $file->setFile($request->files->get('file'));
        $file->setUploadDir('uploads/images');

        // validation
//        if ($file->getMimeType() != 'image/png') {
//            return $this->makeResponse(AR::ERR_FAILED);
//        }
//        if ($file->getSize() > 1000000000) { // 10 M
//            return $this->makeResponse(AR::ERR_FAILED);
//        }
        $result = $this->baseUploadAction($file);
        return $this->makeResponse(AR::ERR_SUCCESS, array(
            'image_path' => $result['file_path'],
        ));
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/upload-img", name="_file_upload_img")
     */
    public function uploadImgAction(Request $request){
        $file = new File();
        $file->setFile($request->files->get('image'));
        $file->setUploadDir('uploads/images');
        $result = $this->baseUploadAction($file);
        return $this->makeResponse(AR::ERR_SUCCESS, array(
            'image_path' => $result['file_path'],
        ));
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/upload-pdf", name="_file_upload_pdf")
     */
    public function uploadPdfAction(Request $request) {
        $file = new File();
        $file->setFile($request->files->get('file'));
        $file->setUploadDir('uploads/files');
        $result = $this->baseUploadAction($file);
        return $this->makeResponse(AR::ERR_SUCCESS, array(
            'file_path' => $result['file_path'],
        ));
    }

    /**
     * The base function for uploading file.
     * @param $file
     * @return Response
     */
    private function baseUploadAction($file) {
        $file->upload();
        $path = $file->getFilePath();
        if ($path) {
            return array(
                'file_path' => $path,
                'file_size' => $file->getSize(),
            );
        }
        return false;
    }

    private function makeResponse($error_id = AR::ERR_SUCCESS, $data = null) {
        return new Response(AR::encode($error_id, $data));
    }
} 