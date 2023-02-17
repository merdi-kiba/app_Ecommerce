<?php

namespace App\Controller;

use App\Entity\Watch;
use App\Repository\WatchRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;



// #[Route('/card', name: 'index', methods:['GET'])]
class CardController extends AbstractController
{
    #[Route('/shop.html', name: 'app_card', methods: ['GET'])]
    #[Security("is_granted('ROLE_USER')")]
    public function index(SessionInterface $session, WatchRepository $watch): Response
    {
        $panier = $session->get("panier", []);
        $dataPanier = [];
        $total = 0;

        foreach ($panier as $id => $quantite) {
            $product = $watch->find($id);
            $dataPanier[] = [
                'produit' => $product,
                'quantite' => $quantite
            ];
            $total += $product->getPrice() * $quantite;
        }
        return $this->render('card/index.html.twig', compact("dataPanier", "total"));
    }

    #[Route('/add/{id}/index.html', name: 'add_cart', methods: ['GET', 'POST'])]
    #[Security("is_granted('ROLE_USER')")]

    public function add(Watch $watch, SessionInterface $session)
    {
        $panier = $session->get("panier", []);
        $id = $watch->getId();

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }
        $session->set("panier", $panier);

        return $this->redirectToRoute('app_watch');
    }

    #[Route('/remove/{id}', name: 'card_remove', methods: ['GET', 'POST'])]
    #[Security("is_granted('ROLE_USER')")]


    public function remove(Watch $watch, SessionInterface $session)
    {
        $panier = $session->get("panier", []);
        $id = $watch->getId();

        if (!empty($panier[$id])) {
            if ($panier[$id] > 1) {
                $panier[$id];
            } else {
                unset($panier[$id]);
            }
        } else {
            $panier[$id] = 1;
        }
        $session->set("panier", $panier);

        return $this->redirectToRoute('app_card');
    }

}