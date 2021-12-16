<?php

namespace App\Controller;

use App\Entity\Dance;
use App\Repository\DanceRepository;
use App\Vo\DatabaseVO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     *
     * @param DatabaseVO $database
     * @param DanceRepository<Dance> $danceRepository
     *
     * @return Response
     */
    public function index(DatabaseVO $database, DanceRepository $danceRepository): Response
    {
        $entityCollection = $database->getEntitiesRelatedByDances();
        $topTenDances = $danceRepository->findBy([], ['views' => 'DESC'],10);

        return $this->render('homepage/index.html.twig', [
            'entity_collection' => $entityCollection,
            'top_ten_dances' => $topTenDances,
        ]);
    }
}
