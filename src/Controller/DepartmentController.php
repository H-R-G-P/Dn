<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\Department;
use App\Entity\Place;
use App\Entity\Region;
use App\Repository\DepartmentRepository;
use App\Repository\PlaceRepository;
use App\Repository\RegionRepository;
use App\Service\DatabaseService;
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
     * @param DatabaseService $databaseService
     * @param RegionRepository<Region> $regionRepository
     *
     * @return Response
     */
    public function show(string $slug, DepartmentRepository $departmentRepository, MapService $mapService, PlaceRepository $placeRepository, DatabaseService $databaseService, RegionRepository $regionRepository): Response
    {
        $department = $departmentRepository->findOneBy([
            'slug' => $slug,
        ]);

        if ($department === null) {
            $this->addFlash('dark', 'Department "'.$slug.'" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $places = $placeRepository->findByEntityExtended($department);
        $regions = $regionRepository->findByDepartment($department);
        $regions = $databaseService->setDances($regions);

        $map = $mapService->createMapDTO($places);
        $map_json = $map === null ? null : $map->serializeToJson();

        return $this->render('department/show.html.twig', [
            'department' => $department,
            'regions' => $regions,
            'map_json' => $map_json,
        ]);
    }
}
