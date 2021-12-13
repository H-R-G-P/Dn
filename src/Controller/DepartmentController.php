<?php

namespace App\Controller;

use App\Repository\DepartmentRepository;
use App\Service\CoordinatesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class DepartmentController extends AbstractController
{
    /**
     * @param string $slug
     * @param DepartmentRepository $departmentRepository
     *
     * @return Response
     */
    #[Route('/departments/{slug}', name: 'department')]
    public function show(string $slug, DepartmentRepository $departmentRepository, CoordinatesService $coordinatesService): Response
    {
        $department = $departmentRepository->findOneBy([
            'slug' => $slug,
        ]);

        if ($department === null) {
            return $this->redirectToRoute('homepage');
        }

        try {
            $polygon = $coordinatesService->getPolygon($department->getPlaces());
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

        $departmentJson = $serializer->serialize($department, 'json');
        $polygonJson = $serializer->serialize($polygon, 'json');

        return $this->render('department/show.html.twig', [
            'department' => $department,
            'department_json' => $departmentJson,
            'polygon' => $polygonJson,
        ]);
    }
}
