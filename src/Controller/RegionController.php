<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\Place;
use App\Entity\Region;
use App\Entity\Version;
use App\Service\DatabaseService;
use App\Service\HelperService;
use App\Service\MapService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\RegionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegionController extends AbstractController
{
    /**
     * @Route("/{_locale}/regions",
     *     locale="by",
     *     requirements={
     *         "_locale": "by|en",
     *     },
     *     name="regions"
     * )
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
     * @Route("/{_locale}/regions/{slug}",
     *     locale="by",
     *     requirements={
     *         "_locale": "by|en",
     *     },
     *     name="region"
     * )
     *
     * @param string $slug
     * @param MapService $mapService
     * @param DatabaseService $databaseService
     *
     * @return Response
     */
    public function show(string $slug, MapService $mapService, DatabaseService $databaseService) : Response
    {
        $region = $this->getDoctrine()->getRepository(Region::class)->findOneBy([
            'slug' => $slug,
        ]);

        if (!$region instanceof Region) {
            $this->addFlash('dark', 'Region "'.$slug.'" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $department = null;
        if ($version = $this->getDoctrine()->getRepository(Version::class)->findOneBy(['region' => $region->getId()]))
            $department = $version->getDepartment();

        $places = $this->getDoctrine()->getRepository(Place::class)->findByEntityExtended($region);
        $allPlaces = $databaseService->getEntitiesRelatedByDances()->getPlaces();

        $map = $mapService->createMapDTO($places);
        $map_json = $map === null ? null : $map->serializeToJson();

        $placesWithDances = HelperService::intersectEntitiesId($places, $allPlaces);

        return $this->render('region/show.html.twig', [
            'region' => $region,
            'department' => $department,
            'places' => $placesWithDances,
            'map_json' => $map_json,
        ]);
    }
}
