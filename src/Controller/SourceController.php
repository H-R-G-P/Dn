<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\Place;
use App\Entity\Source;
use App\Repository\PlaceRepository;
use App\Repository\SourceRepository;
use App\Service\MapService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SourceController extends AbstractController
{
    /**
     * @Route("/{_locale}/sources",
     *     locale="by",
     *     requirements={
     *         "_locale": "by|en",
     *     },
     *     name="sources"
     * )
     *
     * @param SourceRepository<Source> $sourceRepository
     * @param PlaceRepository<Place> $placeRepository
     * @param MapService $mapService
     *
     * @return Response
     */
    public function index(SourceRepository $sourceRepository, PlaceRepository $placeRepository, MapService $mapService): Response
    {
        $sources = $sourceRepository->findAll();
        $places = $placeRepository->findAll();

        $map = $mapService->createMapDTO($places);
        $map_json = $map === null ? null : $map->serializeToJson();

        return $this->render('source/index.html.twig', [
            'sources' => $sources,
            'map_json' => $map_json,
        ]);
    }

    /**
     * @Route("/{_locale}/sources/{slug}",
     *     locale="by",
     *     requirements={
     *         "_locale": "by|en",
     *     },
     *     name="source"
     * )
     *
     * @param string $slug
     * @param SourceRepository<Source> $sourceRepository
     * @param MapService $mapService
     * @param PlaceRepository<Place> $placeRepository
     *
     * @return Response
     */
    public function show(string $slug, SourceRepository $sourceRepository, MapService $mapService, PlaceRepository $placeRepository): Response
    {
        $source = $sourceRepository->findOneBy([
            'slug' => $slug,
        ]);
        if ($source === null){
            $this->addFlash('dark', 'Source "'.$slug.'" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $places = $placeRepository->findByEntityExtended($source);

        $map = $mapService->createMapDTO($places);
        $map_json = $map === null ? null : $map->serializeToJson();

        return $this->render('source/show.html.twig', [
            'source' => $source,
            'map_json' => $map_json,
        ]);
    }
}
