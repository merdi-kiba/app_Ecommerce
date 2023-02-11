<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact.html', name: 'app_contact', methods:['GET', 'POST'])]

    public function create(
        Request $request,
        EntityManagerInterface $em
    )
    {
        $watch = new Watch();

        $form = $this->createForm(WatchType::class, $watch);


        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {

            $watch = $form->getData();
            $em->persist($watch);
            $em->flush();

            return $this->redirectToRoute('app_watch');

        }

        return $this->render(
            'watch/create.html.twig',
            [
                'form' => $form->createView()
            ]
        );

    }

}