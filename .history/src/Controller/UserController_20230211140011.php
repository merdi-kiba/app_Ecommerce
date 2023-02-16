<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserPasswordType;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/users/{id}/edit/', name: 'app_edit_user', methods: ['GET', 'POST'])]
    #[Security("is_granted('ROLE_USER') and user === usercon")]
    public function index(
        User $usercon,
        EntityManagerInterface $em,
        Request $request
    ): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }
        if (!$this->getUser() === $usercon) {
            return $this->redirectToRoute('app_');
        }


        $form = $this->createForm(UserType::class, $usercon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $usercon = $form->getData();
            $em->persist($usercon);
            $em->flush();
            $this->addFlash(
                'success',
                'votre nom est votre pseudo est bien modifier'
            );
            return $this->redirectToRoute('app_recipe');
        }
        return $this->render('user/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/user/password/{id}/edit', name: 'app_edit_pass', methods: ['GET', 'POST'])]
    #[Security("is_granted('ROLE_USER') and user === usercon")]

    public function editPassword(
        User $usercon,
        UserPasswordHasherInterface $hasher,
        EntityManagerInterface $em,
        Request $request
    ): Response
    {
        $form = $this->createForm(UserPasswordType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($hasher->isPasswordValid($usercon, $form->getData()['plainPassword'])) {
                $usercon->setCreatedAt(new \DateTimeImmutable());
                $usercon->setPlainPassword(
                    $form->getData()['newPassword']

                );
            }
            $em->persist($usercon);
            $em->flush();
        }


        return $this->render('user/password.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}