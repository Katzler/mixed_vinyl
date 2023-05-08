<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
   public function homepage(): Response
    {
        $tracks = [
            ['song' => 'Easier To Run', 'artist' => 'Linkin Park'],
            ['song' => 'Numb', 'artist' => 'Linkin Park'],
            ['song' => 'Jesus of Suburbia', 'artist' => 'Green Day'],
            ['song' => 'Dark Side', 'artist' => 'Blind Channel'],
            ['song' => 'Boten Anna', 'artist' => 'Basshunter'],
            ['song' => 'My Love', 'artist' => 'Westlife']
            ];


        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PBs & Jams',
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
        $genre = $slug ? u(str_replace("-", " ", $slug))->title(true) : null;

        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre,
        ]);
    }

}

