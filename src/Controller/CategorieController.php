<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieController extends AbstractController
{
    #[Route('/categories', name: "categories", methods:("GET"))]
    public function listeCategorie(CategorieRepository $repo): Response
    {
        $categories=$repo->findAll();
        return $this->render('categorie/listeCategorie.html.twig', [
            'lesCategories' => $categories,
        ]);
    }

    #[Route('/categories/{id}', name: "ficheCategorie", methods:("GET"))]
    public function ficheCategorie(Categorie $categorie): Response
    {

        return $this->render('categorie/ficheCategorie.html.twig', [
            'laCategorie' => $categorie,
        ]);
    }

    #[Route('/nbContactsParCat', name: "nbContactsParCat", methods:("GET"))]
    public function nbContactsParCat(CategorieRepository $repo): Response
    {
        $data="";
        $categories=$repo->nbContactsParCat();
        foreach($categories as $ligne){
        $data .='{ y: '.$ligne["nbContacts"] . ', label: "'.$ligne["libelle"].'" },';
        }
        $data=substr($data,0,-1);
        return $this->render('categorie/nbContactsParCat.html.twig', [
            'lesCategories' => $categories,
            'data'=>$data
        ]);
    }

}
