<?php

namespace App\Controller;

use App\Entity\Habitude;
use App\Repository\HabitudeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AfficheGraphiqueController extends AbstractController
{


    // on va utiliser cette action pour generer une vue partielle
    // pas besoin de route
    // #[Route('/affiche/graphique', name: 'app_graphique')]
    public function afficherGraphique(HabitudeRepository $rep): Response
    {
        $user = $this->getUser();

        // Utilisez le gestionnaire d'entités pour récupérer les données depuis la base de données

        $habitudes = $rep->findBy(['user' => $user]); // cherche habitude de l'user connecté

        // Transformez les données en un format utilisable par Chart.js
        $dateBrossage = [];
        $nbBrossage = [];

        foreach ($habitudes as $habitude) {
            $dateBrossage[] = $habitude->getDateBrossage()->format('Y-m-d');
            $nbBrossage[] = $habitude->getNbBrossage();
        }

        $chartData = [
            'dateBrossage' => $dateBrossage,
            'nbBrossage' => $nbBrossage,
        ];

        // Affichez le graphique en transmettant les données au template Twig
        return $this->render('affiche_graphique/index.html.twig', [
            'chartData' => $chartData,
        ]);
    }
}
