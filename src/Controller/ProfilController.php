<?php 

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'profil_show')]
    public function show(): Response
    {
        // Récupérez les informations de l'utilisateur connecté
        $user = $this->getUser();

        // Affichez les informations de l'utilisateur dans le template
        return $this->render('profil/show.html.twig', [
            'user' => $user,
        ]);
    }
}