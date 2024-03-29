<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\Dance;
use App\Entity\Place;
use App\Repository\VersionRepository;
use App\Service\MapService;
use App\Service\UpdateDatabaseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DanceController extends AbstractController
{
    /**
     * @Route("/dances",
     *     name="dances"
     * )
     *
     * @param MapService $mapService
     *
     * @return Response
     */
    public function index(MapService $mapService): Response
    {
        $dances = $this->getDoctrine()->getRepository(Dance::class)->findSortedByVersions();
        $places = $this->getDoctrine()->getRepository(Place::class)->findAll();

        $map = $mapService->createMapDTO($places);
        $map_json = $map === null ? null : $map->serializeToJson();

        return $this->render('dance/index.html.twig', [
            'dances' => $dances,
            'map_json' => $map_json,
        ]);
    }

    /**
     * @Route("/dances/{slug}",
     *     name="dance"
     * )
     *
     * @param string $slug
     * @param MapService $mapService
     * @param UpdateDatabaseService $databaseService
     *
     * @return Response
     */
    public function show(string $slug, MapService $mapService, UpdateDatabaseService $databaseService): Response
    {
        // Fetch database
        $dance = $this->getDoctrine()->getRepository(Dance::class)->findOneBy([
            'slug' => $slug,
        ]);
        if (!$dance || !$dance instanceof Dance) {
            $this->addFlash('dark', 'Dance "'.$slug.'" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $places = $this->getDoctrine()->getRepository(Place::class)->findByDance($dance);

        $databaseService->increaseDanceViews($dance);

        // Create map parameters
        $map = $mapService->createMapDTO($places);
        $map_json = $map === null ? null : $map->serializeToJson();

        return $this->render('dance/show.html.twig', [
            'dance' => $dance,
            'map_json' => $map_json,
        ]);
    }

    /**
     * @Route("/dances/{slugDance}/{idVersion}",
     *     name="version"
     * )
     *
     * @param int $idVersion
     * @param VersionRepository $versionRepository
     * @param MapService $mapService
     * @param UpdateDatabaseService $databaseService
     *
     * @return Response
     */
    public function showVersion(int $idVersion, VersionRepository $versionRepository, MapService $mapService, UpdateDatabaseService $databaseService) : Response
    {
        $version = $versionRepository->findOneBy([
            'id' => $idVersion,
        ]);

        if ($version === null){
            $this->addFlash('dark', 'Version id: "'.$idVersion.'", not exists.');
            return $this->redirectToRoute('homepage');
        }

        $dance = $version->getDance();

        $databaseService->increaseDanceViews($dance);
        $databaseService->increaseVersionViews($version);

        $videos = $version->getVideos();

        $map_json = null;
        $place = $version->getPlace();
        if ($place instanceof Place){
            $map = $mapService->createMapDTO([$place]);
            $map_json = $map === null ? null : $map->serializeToJson();
        }

        return $this->render('dance/show_version.html.twig', [
            'dance' => $dance,
            'version' => $version,
            'videos' => $videos,
            'map_json' => $map_json,
        ]);
    }
}
