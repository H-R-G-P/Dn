<?php

namespace App\Controller;

use App\Entity\Place;
use App\Service\MapService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlaceController extends AbstractController
{
    /**
     * @Route("/place/{slug}",
     *     name="place"
     * )
     *
     * @param string $slug
     * @param MapService $mapService
     *
     * @return Response
     */
    public function show(string $slug, MapService $mapService): Response
    {
        $place = $this->getDoctrine()->getRepository(Place::class)->findOneBy([
            'slug' => $slug,
        ]);

        if ($place === null) {
            $this->addFlash('dark', 'Place "'.$slug.'" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $versions = $place->getVersions()->toArray();
        for ($i = count($versions); $i > 0; $i--) {
            $versions[$i] = $versions[$i-1];
            unset($versions[$i-1]);
        }

        $version = $versions[1];
        $region = $version->getRegion();
        $department = $version->getDepartment();

        $map = $mapService->createMapDTO([$place]);
        $map_json = $map === null ? null : $map->serializeToJson();

        return $this->render('place/show.html.twig', [
            'place' => $place,
            'region' => $region,
            'versions' => $versions,
            'department' => $department,
            'map_json' => $map_json,
        ]);
    }
}
