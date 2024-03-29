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
     * @Route("/sources",
     *     name="sources"
     * )
     *
     * @param SourceRepository $sourceRepository
     * @param PlaceRepository $placeRepository
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
     * @Route("/sources/{slug}",
     *     name="source"
     * )
     *
     * @param string $slug
     * @param MapService $mapService
     *
     * @return Response
     */
    public function show(string $slug, MapService $mapService): Response
    {
        $source = $this->getDoctrine()->getRepository(Source::class)->findOneBy([
            'slug' => $slug,
        ]);
        if ($source === null || !$source instanceof Source){
            $this->addFlash('dark', 'Source "'.$slug.'" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $places = $this->getDoctrine()->getRepository(Place::class)->findByEntityExtended($source);

        $map = $mapService->createMapDTO($places);
        $map_json = $map === null ? null : $map->serializeToJson();

        return $this->render('source/show.html.twig', [
            'source' => $source,
            'map_json' => $map_json,
        ]);
    }
}
