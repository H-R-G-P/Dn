<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\Region;
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
     * @param RegionRepository<Region> $regionRepository
     * @param MapService $mapService
     *
     * @return Response
     */
    public function show(string $slug, RegionRepository $regionRepository, MapService $mapService) : Response
    {
        $region = $regionRepository->findOneBy([
            'slug' => $slug,
        ]);

        if ($region === null) {
            return $this->redirectToRoute('homepage');
        }

        $map = $mapService->createMapDTO($region->getPlaces()->toArray());
        $map_json = $map === null ? null : $map->serializeToJson();

        return $this->render('region/show.html.twig', [
            'region' => $region,
            'map_json' => $map_json,
        ]);
    }
}
