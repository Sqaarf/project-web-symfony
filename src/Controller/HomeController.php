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
        if(isset($_SESSION) && !empty($_SESSION)){
            $login = true;
        }


        return $this->render('home/index.html.twig', [
            'login' => $login,

        ]);
    }

}
