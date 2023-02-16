<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/login.html', name: 'app_security', methods:['GET', 'POST'])]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('security/index.html.twig', [
            'last_username'=>$authenticationUtils->getLastUsername(),
            'error'=>$authenticationUtils->getLastAuthenticationError()
        ]);
    }
    #[Route('/logout', 'app_logout')]
    public function logout()
    {
        // nothing to be here..
    }
    #[Route('/register.html', name:'app_register', methods:['GET', 'POST'])]
    /**
     * enregistrement
     * @param UserRepository $repository
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function new(UserRepository $repository,
    Request $request, EntityManagerInterface $em){
        $user = new User();
        $user->setRoles(['ROLE_USER']);
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $user= $form->getData();

            
            $em->persist($user);
            $em->flush();

            $this->addFlash(
                'success',
                'votre recette est bien enregistre'
            );
            return $this->redirectToRoute('app_login');
        }
        return $this->render('security/created.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
