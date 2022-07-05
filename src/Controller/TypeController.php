<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\Place;
use App\Entity\Type;
use App\Repository\PlaceRepository;
use App\Repository\TypeRepository;
use App\Service\MapService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeController extends AbstractController
{
    /**
     * @Route("/{_locale}/types",
     *     locale="by",
     *     requirements={
     *         "_locale": "by|en",
     *     },
     *     name="types"
     * )
     *
     * @param TypeRepository $typeRepository
     * @param PlaceRepository $placeRepository
     * @param MapService $mapService
     *
     * @return Response
     */
    public function index(TypeRepository $typeRepository, PlaceRepository $placeRepository, MapService $mapService): Response
    {
        $types = $typeRepository->findAll();
        $places = $placeRepository->findAll();

        usort($types, function ($a, $b) {
            $a = count($a->getVersions());
            $b = count($b->getVersions());
            if ($a == $b) return 0;
            return ($a > $b) ? -1 : 1;
        });

        $map = $mapService->createMapDTO($places);
        $map_json = $map === null ? null : $map->serializeToJson();

        return $this->render('type/index.html.twig', [
            'types' => $types,
            'map_json' => $map_json,
        ]);
    }

    /**
     * @Route("/{_locale}/type/{slug}",
     *     locale="by",
     *     requirements={
     *         "_locale": "by|en",
     *     },
     *     name="type"
     * )
     *
     * @param string $slug
     * @param MapService $mapService
     *
     * @return Response
     */
    public function show(string $slug, MapService $mapService): Response
    {
        $type = $this->getDoctrine()->getRepository(Type::class)->findOneBy([
           'slug' => $slug,
        ]);
        if ($type === null){
            $this->addFlash('dark', 'Type "'.$slug.'" not exists.');
            return $this->redirectToRoute('homepage');
        }

        if ($type instanceof Type)
            $places = $this->getDoctrine()->getRepository(Place::class)->findByEntityExtended($type);

        $map = $mapService->createMapDTO($places);
        $map_json = $map === null ? null : $map->serializeToJson();

        return $this->render('type/show.html.twig', [
            'type' => $type,
            'map_json' => $map_json,
        ]);
    }
}
