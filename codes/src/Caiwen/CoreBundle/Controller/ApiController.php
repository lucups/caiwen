<?php

namespace Caiwen\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Caiwen\CoreBundle\Common\AjaxResponse as AR;
use Caiwen\CoreBundle\Common\CUtils;
use Caiwen\CoreBundle\Entity\User;
use Caiwen\CoreBundle\Entity\Question;

/**
 * @Route("/api")
 */
class ApiController extends Controller {


    /**
     * @Route("/register", name="_api_register")
     */
    public function registerAction(Request $request) {
        $user = new User();

        $username = $request->get('username');
        $password = $request->get('password');
        $email = $request->get('email');

        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        $pwd = $encoder->encodePassword($password, $user->getSalt());

        $user->setUsername($username);
        $user->setPassword($pwd);
        $user->setEmail($email);
        $user->setRole(User::ROLE_USER);

        $user_r = $this->getDoctrine()->getRepository('CaiwenCoreBundle:User');
        $user_r->save($user);

        return $this->makeResponse(AR::ERR_SUCCESS);
    }

    /**
     * @Route("/reset-password", name="_api_reset_password")
     */
    public function resetPasswordAction() {
        return $this->makeResponse(AR::ERR_SUCCESS);
    }

    /**
     * @Route("/question-add", name="_api_question_add")
     */
    public function questionAddAction(Request $request) {
        $question = new Question();
        CUtils::setParameters($question, $request, array(
            'title', 'content', 'image_path'
        ));
        $question->setUser($this->getUser());

        $question_r = $this->getDoctrine()->getRepository('CaiwenCoreBundle:Question');
        $question_r->save($question);
        return $this->redirect($this->generateUrl('_faq_list'));
    }

    /**
     * @Route("/question-answer", name="_question_answer")
     */
    public function questionAnswerAction(Request $request){
        $question_id = $request->get('question_id');
        $question_r = $this->getDoctrine()->getRepository('CaiwenCoreBundle:Question');
        $question = $question_r->findOneByQuestionId($question_id);
        $answer = $request->get('answer');
        $question->setAnswer($answer);
        $question_r->save($question);
        return $this->makeResponse(AR::ERR_SUCCESS);
    }

    private function makeResponse($error_id = AR::ERR_SUCCESS, $data = null) {
        return new Response(AR::encode($error_id, $data));
    }

}
