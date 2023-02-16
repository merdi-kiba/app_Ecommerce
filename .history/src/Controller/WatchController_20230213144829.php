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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class WatchController extends AbstractController
{
    #[Route('/', name: 'app_watch', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    
    public function index(WatchRepository $watchRepository, Request $request): Response
    {

        $watch = $watchRepository->findBy([]);
        // , ["createdAt" => "DESC"]


        $watchHome = $watchRepository->findforhome(4);

        $watchHom = $watchRepository->findforhom(1);

        $watchHomes = $watchRepository->findforhom(2);



        return $this->render('watch/index.html.twig', compact('watch', 'watchHome', 'watchHom', 'watchHomes'));
    }

    #[Route('/retail/{id<\d+>}/watch.html', name: 'app_watch_retail', methods: ['GET', 'POST'])]
    // #[Security("is_granted('ROLE_USER') and recipe.getIsPublic() === true || user === recipe.getUser() ")]

    public function du(){
        hn
    }

    public function seen(Watch $watch): Response
    {
        return $this->render('watch/voir.html.twig', compact('watch'));
    }

    #[Route('/watch/created.html', name: 'app_watch_create', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
   

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
            $watch->setUser($this->getUser());

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

    #[Route('/watch/{id<\d+>}/edit.html', name: 'app_watch_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]

    public function edit(Request $request, EntityManagerInterface $em, Watch $watch): Response
    {

        $form = $this->createForm(WatchType::class, $watch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($watch);
            $em->flush();

            return $this->redirectToRoute('app_watch');

        }

        return $this->render('watch/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/watch/{id<\d+>}/delet.html', name: 'app_watch_delet', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]

    public function delet(Request $request, EntityManagerInterface $em, Watch $watch)
    {

        $em->remove($watch);
        $em->flush();

        return $this->redirectToRoute('app_watch');
    }

}