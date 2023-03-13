<?php

namespace App\Controller;

use App\Entity\Watch;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowController extends AbstractController
{
    #[Route('/show/{id}', name: 'app_show', methods:['GET'])]
    public function index(Watch $): Response
    {
        return $this->render('show/index.html.twig', 
          compact('watch'));
    }
}
