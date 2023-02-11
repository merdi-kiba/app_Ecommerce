<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

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
    #[Route('/logout', 'app_logout')]
    public function logout()
    {
        // nothing to be here..
    }
}
