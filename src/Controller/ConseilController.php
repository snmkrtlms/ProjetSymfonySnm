<?php

namespace App\Controller;

use App\Entity\Conseil;
use App\Repository\ConseilRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ConseilController extends AbstractController
{
    #[Route('/affiche/conseil', name: 'app_conseil')]
    public function afficherConseil(ManagerRegistry $doctrine)
    {
        $conseils = $doctrine->getRepository(Conseil::class);
    
        $arrayObjetsConseils = $conseils->findAll();
        
        shuffle($arrayObjetsConseils); 

        $vars = ['arrayObjetsConseils' => $arrayObjetsConseils];

        
        return $this->render('affiche_conseil/index.html.twig', $vars);
    }
}
