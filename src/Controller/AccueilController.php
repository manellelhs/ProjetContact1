<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil", methods={"GET"})
     */
    public function index()
    {
        return $this->render('accueil/index.html.twig');
    }

}
