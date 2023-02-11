<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WatchController extends AbstractController
{
    #[Route('/watch', name: 'app_watch')]
    public function index( ): Response
    {
        return $this->render('watch/index.html.twig', [
            'controller_name' => 'WatchController',
        ]);
    }
}
