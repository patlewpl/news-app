<?php

namespace App\Controller;

use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    #[Route('/api/news', name: 'api_news', methods: ['GET'])]
    public function fetchAllNews(EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(News::class);
        $news = $repository->findAll();

        foreach($news as $article) {
            $results[] = [
                'id' => $article -> getId(),
                'title' => $article -> getTitle(),
                'imageUrl' => $article -> getImageUrl(),
                'releaseDate' => $article -> getReleaseDate(),
            ];
        }

        return $this->json($results);
    }

}
