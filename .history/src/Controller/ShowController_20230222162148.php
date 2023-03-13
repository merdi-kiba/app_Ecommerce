<?php

namespace App\Controller;

use App\Entity\Watch;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowController extends AbstractController
{
    #[Route('{id}/show', name: 'app_show')]
    public function index(Watch $watch, wa): Response
    {
        return $this->render('show/index.html.twig',compact('watch'));
    }
}
