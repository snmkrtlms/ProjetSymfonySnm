<?php

namespace App\Controller;

use App\Entity\Habitude;
use App\Form\HabitudeFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TableauBordController extends AbstractController
{
    //action pour afficher tous les habitudes
    #[Route("/tableauBord", name:"tableau_bord")]
    public function habitudeAll(ManagerRegistry $doctrine){

        $user = $this->getUser();
        
        $repHabitudes = $doctrine->getRepository(Habitude::class);

        // Filtrer les habitudes par utilisateur    
        $arrayObjetsHabitudes = $repHabitudes->findBy(['user' => $user]);
        
        $vars = ['arrayObjetsHabitudes' => $arrayObjetsHabitudes];

        return $this->render('tableauBord/tableauBord.html.twig', $vars);

        
    }

    //action pour ajouter une habitude
    #[Route('/formulaire/habitude', name: 'form_hab')]
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
                                                    'action' => $this->generateUrl('form_hab')
                                                ]);

        // Gérez la soumission du formulaire
        $formulaireHabitude->handleRequest($request);
        $today = new \DateTime('today');
        $em = $doctrine->getManager();
        $habitudeRepository = $em->getRepository(Habitude::class);
        $habitudeDuJour = $habitudeRepository->findOneBy(['user' => $user, 'dateBrossage' => $today]);

        if ($formulaireHabitude->isSubmitted() && $formulaireHabitude->isValid()){
            $em = $doctrine->getManager();
            $em->persist($habitude);
            $em->flush();

            return $this->redirectToRoute("tableau_bord");
        }
        else{
            // on envoie un objet Form à la vue
            $vars = ['formulaireHabitude' => $formulaireHabitude];
            return $this->render('tableauBord/formHab.html.twig', $vars);
        }
    }
}