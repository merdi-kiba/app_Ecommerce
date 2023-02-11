<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_security', methods:['GET', 'POST'])]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('security/index.html.twig', [
            'last_username'=>$authenticationUtils->getLastUsername(),
            'error'=>$authenticationUtils->getLastAuthenticationError()
        ]);
    }
}
