<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contacts', name: 'contacts')]
    public function listeContact(ContactRepository $repo ): Response
    {
        $Contacts=$repo->findAll();
        return $this->render('contact/listeContact.html.twig', [
            'controller_name' => 'ContactController',
            'lesContacts' => $Contacts
        ]
    );
    }

    #[Route('/contact/{id}', name: 'ficheContact')]
    public function ficheContact(Contact $contact): Response
    {
        return $this->render('contact/ficheContact.html.twig', [
            'controller_name' => 'ContactController',
            'leContact' => $contact
        ]
    );
    }
    
    #[Route('/contact/sexe{sexe}', name: 'app_listeContactsSexe', methods:'GET')]
    public function listeContactsSexe($sexe, ContactRepository $repo): Response
    {
        $Contacts=$repo->findBy
        (
            ['sexe' => $sexe ],
            ['nom' => 'ASC']
        );
        return $this->render('contact/listeContact.html.twig', [
            'controller_name' => 'ContactController',
            'lesContacts' => $Contacts
        ]
    );
    }
}
