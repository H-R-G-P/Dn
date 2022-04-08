<?php

namespace App\Controller;

use App\Entity\Song;
use App\Repository\SongRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    /**
     * @Route("/{_locale}/songs",
     *     locale="by",
     *     requirements={
     *         "_locale": "by|en",
     *     },
     *     name="songs"
     * )
     *
     * @param SongRepository<Song> $repository
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
