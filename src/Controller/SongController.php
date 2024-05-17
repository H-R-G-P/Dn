<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\SongRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    /**
     * @Route("/songs",
     *     name="songs"
     * )
     */
    public function index(SongRepository $repository): Response
    {
        return $this->render('song/index.html.twig', [
            'songs' => $repository->findAll(),
        ]);
    }
}
