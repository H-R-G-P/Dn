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
     * @param TypeRepository<Type> $typeRepository
     *
     * @return Response
     */
    public function index(TypeRepository $typeRepository): Response
    {
        $types = $typeRepository->findAll();

        return $this->render('type/index.html.twig', [
            'types' => $types,
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

        $places = $this->getDoctrine()->getRepository(Place::class)->findByEntityExtended($type);

        $map = $mapService->createMapDTO($places);
        $map_json = $map === null ? null : $map->serializeToJson();

        return $this->render('type/show.html.twig', [
            'type' => $type,
            'map_json' => $map_json,
        ]);
    }
}
