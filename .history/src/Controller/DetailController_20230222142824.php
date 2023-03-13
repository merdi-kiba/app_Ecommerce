<?php

namespace App\Controller;

use App\Entity\Watch;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
   
    #[Route('/produit/detail/{id<\d+>}/index.html', name: 'app_detail', methods:['GET'])]

    public function voir_pins(Watch $watch): Response
    {
        return $this->render('detail/index.html.twig', compact('watch'));
    }
    #[Route('/produit/detail/{id<\d+>}/index.html', name: 'app_detai', methods:['GET'])]

    public function innd(Watch $watch): Response
    {
        return $this->render('detail/voir.html.twig', compact('watch'));
    }


}
