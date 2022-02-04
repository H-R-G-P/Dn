<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\Department;
use App\Entity\Place;
use App\Repository\DepartmentRepository;
use App\Repository\PlaceRepository;
use App\Service\MapService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepartmentController extends AbstractController
{
    /**
     * @Route("/{_locale}/departments/{slug}",
     *     locale="by",
     *     requirements={
     *         "_locale": "by|en",
     *     },
     *     name="department"
     * )
     *
     * @param string $slug
     * @param DepartmentRepository<Department> $departmentRepository
     * @param MapService $mapService
     * @param PlaceRepository<Place> $placeRepository
     *
     * @return Response
     */
    public function show(string $slug, DepartmentRepository $departmentRepository, MapService $mapService, PlaceRepository $placeRepository): Response
    {
        $department = $departmentRepository->findOneBy([
            'slug' => $slug,
        ]);

        if ($department === null) {
            return $this->redirectToRoute('homepage');
        }

        $places = $placeRepository->findByEntityExtended($department);

        $map = $mapService->createMapDTO($places);
        $map_json = $map === null ? null : $map->serializeToJson();

        return $this->render('department/show.html.twig', [
            'department' => $department,
            'map_json' => $map_json,
        ]);
    }
}
