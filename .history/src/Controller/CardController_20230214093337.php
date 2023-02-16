<?php

namespace App\Controller;

use App\Entity\Watch;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/card', name: 'index')]
class CardController extends AbstractController
{
    #[Route('/shop', name: 'app_card')]
    public function index(SessionInterface $session): Response
    {
        $panier = $session->get("panier", []);
        
        return $this->render('card/index.html.twig');
    }
 
    #[Route('/add/{id}')]
    public function add(Watch $watch, SessionInterface $session)
    {
        $panier = $session->get("panier", []);
        $id = $panier->getId();

        if (!empty($panier[$id]))
        {
            $panier[$id]++;
        }else{
            $panier[$id] =1;
        }
        $session->set("panier", $panier);

        return $this->redirectToRoute('app_watch');
    }
}
