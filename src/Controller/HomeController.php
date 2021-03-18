<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        $login = false;
        if(isset($_SESSION) && !empty($_SESSION)){
            $login = true;
        }

        $admin = false;
        if(isset($_SESSION) && !empty($_SESSION) && $_SESSION["prenom"] == "admin"){
            $admin = true;
        }

        return $this->render('home/index.html.twig', [
            'login' => $login,
            'admin' => $admin,
        ]);
    }

}
