<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Dance;
use App\Entity\Place;
use App\Repository\DanceRepository;
use App\Repository\PlaceRepository;
use App\Repository\VersionRepository;
use App\Service\MapService;
use App\Service\UpdateDatabaseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DanceController extends AbstractController
{
    public function __construct(
        private DanceRepository $danceRepository,
        private PlaceRepository $placeRepository,
        private VersionRepository $versionRepository,
        private MapService $mapService,
    ) {
    }

    /**
     * @Route("/dances",
     *     name="dances"
     * )
     */
    public function index(): Response
    {
        $dances = $this->danceRepository->findSortedByVersions();
        $places = $this->placeRepository->findAll();

        $map = $this->mapService->createMapDTO($places);
        $map_json = $map?->serializeToJson();

        return $this->render('dance/index.html.twig', [
            'dances' => $dances,
            'map_json' => $map_json,
        ]);
    }

    /**
     * @Route("/dances/{slug}",
     *     name="dance"
     * )
     */
    public function show(string $slug, UpdateDatabaseService $databaseService): Response
    {
        // Fetch database
        $dance = $this->danceRepository->findOneBy([
            'slug' => $slug,
        ]);
        if (!$dance instanceof Dance) {
            $this->addFlash('dark', 'Dance "' . $slug . '" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $places = $this->placeRepository->findByDance($dance);

        $databaseService->increaseDanceViews($dance);

        // Create map parameters
        $map = $this->mapService->createMapDTO($places);
        $map_json = $map?->serializeToJson();

        return $this->render('dance/show.html.twig', [
            'dance' => $dance,
            'map_json' => $map_json,
        ]);
    }

    /**
     * @Route("/dances/{slugDance}/{idVersion}",
     *     name="version"
     * )
     */
    public function showVersion(
        int $idVersion,
        UpdateDatabaseService $databaseService
    ): Response {
        $version = $this->versionRepository->findOneBy([
            'id' => $idVersion,
        ]);

        if ($version === null) {
            $this->addFlash('dark', 'Version id: "' . $idVersion . '", not exists.');
            return $this->redirectToRoute('homepage');
        }

        $dance = $version->getDance();

        $databaseService->increaseDanceViews($dance);
        $databaseService->increaseVersionViews($version);

        $videos = $version->getVideos();

        $map_json = null;
        $place = $version->getPlace();
        if ($place instanceof Place) {
            $map = $this->mapService->createMapDTO([$place]);
            $map_json = $map?->serializeToJson();
        }

        return $this->render('dance/show_version.html.twig', [
            'dance' => $dance,
            'version' => $version,
            'videos' => $videos,
            'map_json' => $map_json,
        ]);
    }
}
