<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Conseil;
use App\Entity\Habitude;

use App\Repository\ConseilRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ConseilController extends AbstractController
{


    // on va utiliser cette action pour generer une vue partielle
    // pas besoin de route
    // #[Route('/affiche/conseils', name: 'app_conseil')]
    public function afficherConseils(EntityManagerInterface $entityManager)
    {
        // Récupérez les habitudes de l'utilisateur actuellement connecté
        $habitudesRepository = $entityManager->getRepository(Habitude::class);
        $habitudes = $habitudesRepository->findBy(['user' => $this->getUser()]);

        $conseilsCat = [];

        foreach ($habitudes as $habitude) {
            if ($habitude->isFilDentaire() === false) {
                // Ajoutez des conseils sur le fil dentaire
                $conseilsCat[] = 'filDentaire';
            }
            if ($habitude->isNettLangue() === false) {
                // Ajoutez des conseils sur le nettoyage de langue
                $conseilsCat[] = 'nettLangue';
            }
            if ($habitude->isBainBouche() === false) {
                // Ajoutez des conseils sur le bain de bouche
                $conseilsCat[] = 'bainBouche';
            }

            if ($habitude->getNbBrossage() < 2) {
                // Ajoutez des conseils sur le brossage
                $conseilsCat[] = 'brossage';
            }
        }

        // Utilisez Doctrine pour obtenir les IDs des catégories correspondantes
        $categorieRepository = $entityManager->getRepository(Categorie::class);
        $catNoms = $categorieRepository->findBy(['nom' => $conseilsCat]);

        // Les IDs des catégories correspondantes sont maintenant dans $catNoms, >utiliser pour rechercher les conseils
        $conseilsRepository = $entityManager->getRepository(Conseil::class);
        $conseils = $conseilsRepository->findBy(['categorie' => $catNoms]);

        // Affichez les conseils à l'utilisateur
        return $this->render('affiche_conseil/index.html.twig', [   
            'conseils' => $conseils,
        ]);
    }
}