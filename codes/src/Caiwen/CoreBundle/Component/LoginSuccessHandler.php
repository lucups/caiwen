<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 14-1-3
 * Time: 下午5:12
 */

namespace Caiwen\CoreBundle\Component;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\HttpUtils;
use Symfony\Component\HttpFoundation\Response;

use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;

use Caiwen\CoreBundle\Entity\User;

class LoginSuccessHandler extends DefaultAuthenticationSuccessHandler {

    public function __construct(HttpUtils $httpUtils, array $options, Doctrine $doctrine) {
        parent::__construct($httpUtils, $options);
        $this->doctrine = $doctrine;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token) {

        return new RedirectResponse('/photo/list/1');

        // check user's status
//        $status = $token->getUser()->getStatus();
//        if ($status == User::STATUS_DEACTIVATED) {
//
//            // 帐号未激活，清空session (symfony 安全框架依赖 session 维持登录状态，清空 session 是强制注销的手段)
//            // 提示激活帐号
//            session_unset();
//            setcookie('msg_login_account_not_active', 'Not Activation');
//            return new RedirectResponse('/user/login');
//
//        } elseif ($status == User::STATUS_NEED_INFO) {
//
//            // 转到完善个人信息页面
//            return new RedirectResponse('/account/personal_info_first');
//
//        } elseif ($status == User::STATUS_NORMAL) {

        // 登录正常，不做处理
        //return parent::onAuthenticationSuccess($request, $token);

        //       }

        // $user  = $token->getUser();
        // $user->setLastLogin(new \DateTime());
        // $this->doctrine->getManager()->flush();
        // header()

        // header("Location: http://www.sohu.com");
        // exit;

        // $response = new RedirectResponse("http://www.sina.com.cn");
        // return $response;

        // if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
        // 	$response = new RedirectResponse($this->router->generate('category_index'));
        // } elseif ($this->security->isGranted('ROLE_ADMIN')) {
        // 	$response = new RedirectResponse($this->router->generate('category_index'));
        // } elseif ($this->security->isGranted('ROLE_USER')) {
        // 	// redirect the user to where they were before the login process begun.
        // 	$referer_url = $request->headers->get('referer');
        // 	$response = new RedirectResponse($referer_url);
        // }
        // return $response;
    }

}