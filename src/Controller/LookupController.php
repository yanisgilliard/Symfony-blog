<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LookupController extends AbstractController
{
    #[Route('/lookup', name: 'app_lookup')]
    public function index(Request $request, ArticleRepository $articleRepository): Response
    {
        $search = $request->query->get('search');
        $articles = $articleRepository->findBySearch($search);
        return $this->render('lookup/index.html.twig', [
            'controller_name' => 'LookupController',
            'articles' => $articles,
        ]);
    }
}
