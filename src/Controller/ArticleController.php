<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function aficherArticle(ManagerRegistry $doctrine) 
    {
        $repArticles = $doctrine->getRepository(Article::class);
    
        $arrayObjetsArticles = $repArticles->findAll();
        
        shuffle($arrayObjetsArticles); 

        $vars = ['arrayObjetsArticles' => $arrayObjetsArticles];

        
        return $this->render('article/index.html.twig', $vars);
    }
}
