<?php

namespace App\Controller;

use App\Entity\Habitude;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AfficheGraphiqueController extends AbstractController
{
    #[Route('/affiche/graphique', name: 'app_affiche_graphique')]
    public function afficherGraphique(EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        // Utilisez le gestionnaire d'entités pour récupérer les données depuis la base de données
        $habitudesRepository = $entityManager->getRepository(Habitude::class);
        $habitudes = $habitudesRepository->findBy(['user' => $user]); // Ou utilisez une requête plus spécifique

        // Transformez les données en un format utilisable par Chart.js
        $dateBrossage = [];
        $nbBrossage = [];

        foreach ($habitudes as $habitude) {
            $dateBrossage[] = $habitude->getDateBrossage()->format('d-m-Y');
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
