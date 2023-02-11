<?php

namespace App\Controller;

use App\Repository\WatchRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WatchController extends AbstractController
{
    #[Route('/watch', name: 'app_watch', methods:['GET'])]
    public function index(WatchRepository $watchRepository, Request $request): Response
    {

        $watch = $watchRepository->findBy([], ["createdAt"=> "DESC"]);
        
        return $this->render('watch/index.html.twig',compact('watch'));
    }

    public function seen( Watch $)
}
