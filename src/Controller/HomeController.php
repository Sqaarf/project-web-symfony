<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $login = false;
        $username = null;
        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
            $login = true;
            $username = $this->get('security.token_storage')->getToken()->getUser()->getPrenom();
        }

        return $this->render('home/index.html.twig', [
            'login' => $login,
            'username' => $username,

        ]);
    }

}
