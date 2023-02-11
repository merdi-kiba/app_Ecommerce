<?php

namespace App\Controller;

use App\Repository\WatchRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WatchController extends AbstractController
{
    #[Route('/watch', name: 'app_watch')]
    public function index(WatchRepository $watchRepository, Request $request): Response
    {

        

        return $this->render('watch/index.html.twig', [
            'controller_name' => 'WatchController',
        ]);
    }
}
