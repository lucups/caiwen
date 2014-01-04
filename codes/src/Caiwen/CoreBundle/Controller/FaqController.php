<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Caiwen\CoreBundle\Entity\Question;


/**
 * @Route("/faq")
 */
class FaqController extends Controller {

    /**
     * @Route("/add", name="_faq_add")
     * @Template()
     */
    public function addAction() {
        return array();
    }

    /**
     * @Route("/list", name="_faq_list")
     * @Template()
     */
    public function listAction() {

        $question_r = $this->getDoctrine()->getRepository('CaiwenCoreBundle:Question');
        $questions = $question_r->findAll();
        return array(
            'questions' => $questions,
        );
    }

    /**
     * @Route("/view/{question_id}", name="_faq_view")
     * @Template()
     */
    public function viewAction($question_id){
        $question_r = $this->getDoctrine()->getRepository('CaiwenCoreBundle:Question');
        $question = $question_r->findOneByQuestionId($question_id);
        return array(
            'question' => $question,
        );
    }

}