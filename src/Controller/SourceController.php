<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Source;
use App\Repository\PlaceRepository;
use App\Repository\SourceRepository;
use App\Service\MapService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SourceController extends AbstractController
{
    public function __construct(
        private PlaceRepository $placeRepository,
        private SourceRepository $sourceRepository,
        private MapService $mapService,
    ) {
    }

    /**
     * @Route("/sources",
     *     name="sources"
     * )
     */
    public function index(): Response
    {
        $sources = $this->sourceRepository->findAll();
        $places = $this->placeRepository->findAll();

        $map = $this->mapService->createMapDTO($places);
        $map_json = $map?->serializeToJson();

        return $this->render('source/index.html.twig', [
            'sources' => $sources,
            'map_json' => $map_json,
        ]);
    }

    /**
     * @Route("/sources/{slug}",
     *     name="source"
     * )
     */
    public function show(string $slug): Response
    {
        $source = $this->sourceRepository->findOneBy([
            'slug' => $slug,
        ]);
        if (!$source instanceof Source) {
            $this->addFlash('dark', 'Source "' . $slug . '" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $places = $this->placeRepository->findByEntityExtended($source);

        $map = $this->mapService->createMapDTO($places);
        $map_json = $map?->serializeToJson();

        return $this->render('source/show.html.twig', [
            'source' => $source,
            'map_json' => $map_json,
        ]);
    }
}
