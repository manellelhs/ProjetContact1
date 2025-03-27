<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    # [Route('/contacts', name: 'contacts')]
    public function listeContact(): Response
    {
        return $this->render('contacts/listeContact.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
