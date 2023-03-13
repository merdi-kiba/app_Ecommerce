<?php

namespace App\Controller;

use App\Entity\Watch;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    #[Route('/detail', name: 'app_detail')]
    public function index(): Response
    {
        return $this->render('detail/index.html.twig', [
            'controller_name' => 'DetailController',
        ]);
    }

    #[Route('/produit/detail/{id<\d+>}/8revrqzfyhqzv0vhqzvh?orgvruurguvocjvrg/index', name: 'voir_pins')]

    public function voir_pins(Watch $watch): Response
    {
        return $this->render('pins/voir.html.twig', compact('watch'));
    }


}
