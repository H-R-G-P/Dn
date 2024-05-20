<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Region;
use App\Repository\PlaceRepository;
use App\Repository\RegionRepository;
use App\Repository\VersionRepository;
use App\Service\DatabaseService;
use App\Service\HelperService;
use App\Service\MapService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DistrictController extends AbstractController
{
    public function __construct(
        private PlaceRepository $placeRepository,
        private RegionRepository $regionRepository,
        private VersionRepository $versionRepository,
        private DatabaseService $databaseService,
        private MapService $mapService,
    ) {
    }

    /**
     * @Route("/districts",
     *     name="districts"
     * )
     */
    public function index(): Response
    {
        $regions = $this->regionRepository->findAll();
        $regions = $this->databaseService->setDances($regions);

        return $this->render('district/index.html.twig', [
            'regions' => $regions,
        ]);
    }

    /**
     * @Route("/districts/{slug}",
     *     name="district"
     * )
     */
    public function show(string $slug): Response
    {
        $region = $this->regionRepository->findOneBy([
            'slug' => $slug,
        ]);

        if (!$region instanceof Region) {
            $this->addFlash('dark', 'District "' . $slug . '" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $department = null;
        if ($version = $this->versionRepository->findOneBy(['region' => $region->getId()])) {
            $department = $version->getDepartment();
        }

        $places = $this->placeRepository->findByEntityExtended($region);
        $allPlaces = $this->databaseService->getEntitiesRelatedByDances()->getPlaces();

        $map = $this->mapService->createMapDTO($places);
        $map_json = $map?->serializeToJson();

        $placesWithDances = HelperService::intersectEntitiesId($places, $allPlaces);

        return $this->render('district/show.html.twig', [
            'region' => $region,
            'department' => $department,
            'places' => $placesWithDances,
            'map_json' => $map_json,
        ]);
    }
}
