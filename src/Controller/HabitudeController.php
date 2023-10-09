<?php

namespace App\Controller;

use App\Entity\Habitude;
use App\Form\HabitudeFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HabitudeController extends AbstractController
{
    //action pour afficher tous les habitudes
    #[Route("/habitude/all", name:"habitude_all")]
    public function habitudeAll(ManagerRegistry $doctrine){

        $user = $this->getUser();
        
        $repHabitudes = $doctrine->getRepository(Habitude::class);

        // Filtrer les habitudes par utilisateur    
        $arrayObjetsHabitudes = $repHabitudes->findBy(['user' => $user]);
        
        $vars = ['arrayObjetsHabitudes' => $arrayObjetsHabitudes];

        return $this->render('habitude/habitude_all.html.twig', $vars);
    }

    //action pour ajouter une habitude
    #[Route('/habitude/add', name: 'app_habitude')]
    public function habitudeAdd(Request $request, ManagerRegistry $doctrine)
    {
        $user = $this->getUser();

        //créer objet habitude 
        $habitude = new Habitude();
        $habitude->setUser($user);

        // on crée le formulaire du type souhaité
        $formulaireHabitude = $this->createForm(HabitudeFormType::class,
                                                $habitude,
                                                [
                                                    'method' => 'POST',
                                                    'action' => $this->generateUrl('app_habitude')
                                                ]);

        // Gérez la soumission du formulaire
        $formulaireHabitude->handleRequest($request);

        if ($formulaireHabitude->isSubmitted() && $formulaireHabitude->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($habitude);
            $em->flush();

            return $this->redirectToRoute("habitude_all");
        }

        else{
            // on envoie un objet Form à la vue
            $vars = ['formulaireHabitude' => $formulaireHabitude];
        
            return $this->render('/habitude/index.html.twig', $vars);
        }
    }
    
}