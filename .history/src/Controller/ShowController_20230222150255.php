<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowController extends AbstractController
{
    #[Route('/show/{id}', name: 'app_show', methods:['GET'])]
    public function index(): Response
    {
        return $this->render('show/index.html.twig', 
          compact('watch'));
    }
}
