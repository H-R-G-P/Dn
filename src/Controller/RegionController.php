<?php

namespace App\Controller;

use App\Entity\Region;
use App\Service\CoordinatesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\RegionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class RegionController extends AbstractController
{
    /**
     * @Route("/regions", name="regions")
     *
     * @param RegionRepository<Region> $regionRepository
     *
     * @return Response
     */
    public function index(RegionRepository $regionRepository): Response
    {
        $regions = $regionRepository->findAll();

        return $this->render('region/index.html.twig', [
            'regions' => $regions,
        ]);
    }

    /**
     * @Route("/regions/{slug}", name="region")
     *
     * @param string $slug
     * @param RegionRepository<Region> $regionRepository
     * @param CoordinatesService $coordinatesService
     *
     * @return Response
     */
    public function show(string $slug, RegionRepository $regionRepository, CoordinatesService $coordinatesService) : Response
    {
        $region = $regionRepository->findOneBy([
            'slug' => $slug,
        ]);

        if ($region === null) {
            return $this->redirectToRoute('homepage');
        }

        try {
            $polygon = $coordinatesService->getPolygon($region->getPlaces());
        }catch (\Exception $e) {
            $polygon = null;
        }

        $encoder = new JsonEncoder();
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object->getName();
            },
        ];
        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);

        $serializer = new Serializer([$normalizer], [$encoder]);

        $regionJson = $serializer->serialize($region, 'json');
        $polygonJson = $serializer->serialize($polygon, 'json');

        return $this->render('region/show.html.twig', [
            'region' => $region,
            'region_json' => $regionJson,
            'polygon' => $polygonJson,
        ]);
    }
}
