<?php

namespace App\Controller;

use App\Entity\Place;
use App\Entity\Version;
use App\Service\MapService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlaceController extends AbstractController
{
    /**
     * @Route("/{_locale}/place/{slug}",
     *     locale="by",
     *     requirements={
     *         "_locale": "by|en",
     *     },
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

        $version = $place->getVersions()->get(0);
        $region = $version instanceof Version ? $version->getRegion() : null;
        $department = $version instanceof Version ? $version->getDepartment() : null;

        $map = $mapService->createMapDTO([$place]);
        $map_json = $map === null ? null : $map->serializeToJson();

        return $this->render('place/show.html.twig', [
            'place' => $place,
            'region' => $region,
            'department' => $department,
            'map_json' => $map_json,
        ]);
    }
}
