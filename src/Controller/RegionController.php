<?php

namespace App\Controller;

use App\Entity\Region;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\RegionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegionController extends AbstractController
{
    /**
     * @Route("/regions", name="regions")
     *
     * @param RegionRepository<Region> $regionRepository
     *
     * @return Response
     */
    public function index(RegionRepository $regionRepository): Response
    {
        $regions = $regionRepository->findAll();

        return $this->render('region/index.html.twig', [
            'regions' => $regions,
        ]);
    }

    /**
     * @Route("/regions/{slug}", name="region")
     *
     * @param string $slug
     * @param RegionRepository<Region> $regionRepository
     *
     * @return Response
     */
    public function show(string $slug, RegionRepository $regionRepository) : Response
    {
        $region = $regionRepository->findOneBy([
            'slug' => $slug,
        ]);

        return $this->render('region/show.html.twig', [
            'region' => $region,
        ]);
    }
}
