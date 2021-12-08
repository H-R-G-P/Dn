<?php

namespace App\Controller;

use App\Entity\Dance;
use App\Repository\DanceRepository;
use App\Vo\Database;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     *
     * @param Database $database
     * @param DanceRepository<Dance> $danceRepository
     *
     * @return Response
     */
    public function index(Database $database, DanceRepository $danceRepository): Response
    {
        $danceCollection = $database->getDancesRelatedByEntities();
        $topTenDances = $danceRepository->findBy([], ['views' => 'DESC'],10);

        return $this->render('homepage/index.html.twig', [
            'dance_collection' => $danceCollection,
            'top_ten_dances' => $topTenDances,
        ]);
    }
}
