<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
class SecurityController extends Controller
{
    /**
     * @Route("/login")
     * @Method("GET")
     *
     */
    public function loginAction(AuthenticationUtils $auth): Response
    {
        return $this->render('security/index.html.twig', array(
            'lastUsername' => $auth->getLastUsername(),
            'error' => $auth->getLastAuthenticationError()
        ));
    }

    /**
     * @Route("/login_check")
     * @Method("POST")
     * @throws \Exception
     */
    public function loginCheckAction()
    {
        throw new \Exception('this method must never be call');
    }

    /**
     * @Route("/logout")
     * @Method("GET")
     * @throws \Exception
     */
    public function logOutAction()
    {
        throw new \Exception('this method must never be called even in log out');
    }
}
