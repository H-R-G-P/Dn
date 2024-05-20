<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\PlaceRepository;
use App\Service\MapService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlaceController extends AbstractController
{
    public function __construct(
        private PlaceRepository $placeRepository,
        private MapService $mapService,
    ) {
    }

    /**
     * @Route("/place/{slug}",
     *     name="place"
     * )
     */
    public function show(string $slug): Response
    {
        $place = $this->placeRepository->findOneBy([
            'slug' => $slug,
        ]);

        if ($place === null) {
            $this->addFlash('dark', 'Place "' . $slug . '" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $versions = $place->getVersions()->toArray();
        for ($i = count($versions); $i > 0; $i--) {
            $versions[$i] = $versions[$i - 1];
            unset($versions[$i - 1]);
        }

        $version = $versions[1];
        $region = $version->getRegion();
        $department = $version->getDepartment();

        $map = $this->mapService->createMapDTO([$place]);
        $map_json = $map?->serializeToJson();

        return $this->render('place/show.html.twig', [
            'place' => $place,
            'region' => $region,
            'versions' => $versions,
            'department' => $department,
            'map_json' => $map_json,
        ]);
    }
}
