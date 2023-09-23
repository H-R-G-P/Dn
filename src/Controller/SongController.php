<?php

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
     *
     * @param SongRepository $repository
     *
     * @return Response
     */
    public function index(SongRepository $repository): Response
    {
        return $this->render('song/index.html.twig', [
            'songs' => $repository->findAll(),
        ]);
    }
}
