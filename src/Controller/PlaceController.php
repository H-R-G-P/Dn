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

        $map = $mapService->createMapDTO([$place]);
        $map_json = $map === null ? null : $map->serializeToJson();

        return $this->render('place/show.html.twig', [
            'place' => $place,
            'map_json' => $map_json,
        ]);
    }
}
