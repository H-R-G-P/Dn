<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\SongRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    public function __construct(
        private SongRepository $songRepository,
    ) {
    }

    /**
     * @Route("/songs",
     *     name="songs"
     * )
     */
    public function index(): Response
    {
        return $this->render('song/index.html.twig', [
            'songs' => $this->songRepository->findBy([], ['name' => 'ASC']),
        ]);
    }
}
