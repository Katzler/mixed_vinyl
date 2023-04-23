<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/')]
   public function homepage(): Response
    {
        $tracks = [
            ['song' => 'Easier To Run', 'artist' => 'Linkin Park'],
            ['song' => 'Numb', 'artist' => 'Linkin Park'],
            ['song' => 'Jesus of Suburbia', 'artist' => 'Green Day'],
            ['song' => 'Dark Side', 'artist' => 'Blind Channel']
            ];


        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PBs & Jams',
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if ($slug) {
            $title = 'Genre: ' . u(str_replace("-", " ", $slug))->title(true);
        } else {
            $title = "All Genres";
        }
        return new Response($title);
    }

}