<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route('/', name: 'home')]
    public function home()
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/vue1', name: 'vue1')]
    public function vue1()
    {
        return $this->render('home/vue1.html.twig');
    }

    #[Route('/vue2', name: 'vue2')]
    public function vue2()
    {
        return $this->render('home/vue2.html.twig');
    }
}
