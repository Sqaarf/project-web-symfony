<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Produits;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MenuController extends AbstractController
{
    /**
     * @Route("/menu/{id}",requirements={"id": "[1-4]\d*"}, name="menu")
     * @param $id
     * @return Response
     */
    public function index($id): Response
    {
        $login = false;
        $username = null;
        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
            $login = true;
            $username = $this->get('security.token_storage')->getToken()->getUser()->getPrenom();
        }

        $entityManager = $this->getDoctrine()->getManager();

        $query = $entityManager->createQuery(
            "SELECT p FROM 
            App\Entity\Produits p
            INNER JOIN App\Entity\Categories c 
            WHERE p.id_cat = :id")
            ->setParameter('id', $id);

        //dump($query->getResult());


        return $this->render('menu/index.html.twig', [
            'id' => $id,
            'produits' => $query->getResult(),
            'login' => $login,
            'username' => $username,
        ]);
    }
}
