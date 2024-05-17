<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\DanceRepository;
use App\Service\DatabaseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/",
     *     name="homepage"
     * )
     */
    public function index(DanceRepository $danceRepository, DatabaseService $databaseService): Response
    {
        $entityCollection = $databaseService->getEntitiesRelatedByDances();
        $topTenRegions = $databaseService->getTopTenRegions();
        $topTenDances = array_slice($danceRepository->findSortedByVersions(), 0, 10);

        return $this->render('homepage/index.html.twig', [
            'entity_collection' => $entityCollection,
            'top_ten_regions' => $topTenRegions,
            'top_ten_dances' => $topTenDances,
        ]);
    }
}
