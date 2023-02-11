<?php

namespace App\Controller;

use App\Entity\Watch;
use App\Form\WatchType;
use App\Repository\WatchRepository;
use Doctrine\ORM\EntityManagerInterface;
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

    #[Route('/retail/watch/{id<\d+>}', name: 'app_watch_retail', methods:['GET'])]

    public function seen(Watch $watch): Response
    {
        return $this->render('watch/voir.html.twig', compact('watch'));
    }

    #[Route('/watch/retail/create', name: 'app_watch_create', methods:['GET','POST'])]

    public function create(Request $request, EntityManagerInterface $em)
    {
        $watch = new Watch;

        $form = $this->createForm(WatchType::class, $watch);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 

            $watch= $form->getData();
            $em->persist($watch);
            $em->flush();
            
        }

    }

    #[Route('/watch/{id<\d+>}/edit', name: 'app_watch_edit', methods:['GET','POST'])]

    public function edit(Request $request, EntityManagerInterface $em, wt )
    

}
