<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
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
    ): Response
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $contact = $form->getData();
            $em->persist($contact);
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