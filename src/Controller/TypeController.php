<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\PlaceRepository;
use App\Repository\TypeRepository;
use App\Service\MapService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeController extends AbstractController
{
    public function __construct(
        private PlaceRepository $placeRepository,
        private TypeRepository $typeRepository,
        private MapService $mapService,
    ) {
    }

    /**
     * @Route("/types",
     *     name="types"
     * )
     */
    public function index(): Response
    {
        $types = $this->typeRepository->findAll();
        $places = $this->placeRepository->findAll();

        usort($types, static function ($a, $b) {
            $a = count($a->getVersions());
            $b = count($b->getVersions());
            if ($a === $b) {
                return 0;
            }
            return ($a > $b) ? -1 : 1;
        });

        $map = $this->mapService->createMapDTO($places);
        $map_json = $map?->serializeToJson();

        return $this->render('type/index.html.twig', [
            'types' => $types,
            'map_json' => $map_json,
        ]);
    }

    /**
     * @Route("/type/{slug}",
     *     name="type"
     * )
     */
    public function show(string $slug): Response
    {
        $type = $this->typeRepository->findOneBy([
           'slug' => $slug,
        ]);
        if ($type === null) {
            $this->addFlash('dark', 'Type "' . $slug . '" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $places = $this->placeRepository->findByEntityExtended($type);

        $map = $this->mapService->createMapDTO($places);
        $map_json = $map?->serializeToJson();

        return $this->render('type/show.html.twig', [
            'type' => $type,
            'map_json' => $map_json,
        ]);
    }
}
