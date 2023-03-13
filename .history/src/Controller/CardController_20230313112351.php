<?php

namespace App\Controller;

use App\Entity\Commende;
use App\Entity\Watch;
use App\Form\CommandeType;
use App\Repository\WatchRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



// #[Route('/card', name: 'index', methods:['GET'])]
class CardController extends AbstractController
{
    
    #[Route('/commander/{id}', name: 'command', methods: ['GET', 'POST'])]
    #[Security("is_granted('ROLE_USER')")]


    public function commander(Watch $watch, EntityManagerInterface $em, Request $request, WatchRepository $watchRepository){


        $commande = new Commende;

        $form = $this->createForm(CommandeType::class, $commande);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $commande = $form->getData();

            $commande->setUser($this->getUser());
            $commande->setProduits($watch);

            $em->persist($commande);
            $em->flush();
            return $this->redirectToRoute('app_watch');
        }
        return $this->render('commande/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

}