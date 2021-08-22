<?php

namespace App\Controller;

use App\Repository\DanceRepository;
use App\Repository\RegionRepository;
use App\Repository\SourceRepository;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     *
     * @param RegionRepository $regionRepository
     * @param TypeRepository $typeRepository
     * @param SourceRepository $sourceRepository
     * @param DanceRepository $danceRepository
     *
     * @return Response
     */
    public function index(RegionRepository $regionRepository, TypeRepository $typeRepository, SourceRepository $sourceRepository, DanceRepository $danceRepository): Response
    {
        $regions = $regionRepository->findAll();
        $types = $typeRepository->findAll();
        $sources = $sourceRepository->findAll();
        $topTenDances = $danceRepository->findBy([], ['views' => 'DESC'],10);

        return $this->render('homepage/index.html.twig', [
            'regions' => $regions,
            'types' => $types,
            'sources' => $sources,
            'top_ten_dances' => $topTenDances,
        ]);
    }
}
