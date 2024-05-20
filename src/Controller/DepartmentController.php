<?php

declare(strict_types=1);

namespace App\Controller;

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
    public function __construct(
        private DepartmentRepository $departmentRepository,
        private PlaceRepository $placeRepository,
        private RegionRepository $regionRepository,
        private MapService $mapService,
        private DatabaseService $databaseService,
    ) {
    }

    /**
     * @Route("/departments/{slug}",
     *     name="department"
     * )
     */
    public function show(string $slug): Response
    {
        $department = $this->departmentRepository->findOneBy([
            'slug' => $slug,
        ]);

        if ($department === null) {
            $this->addFlash('dark', 'Department "' . $slug . '" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $places = $this->placeRepository->findByEntityExtended($department);
        $regions = $this->regionRepository->findByDepartment($department);
        $regions = $this->databaseService->setDances($regions);

        $map = $this->mapService->createMapDTO($places);
        $map_json = $map?->serializeToJson();

        return $this->render('department/show.html.twig', [
            'department' => $department,
            'regions' => $regions,
            'map_json' => $map_json,
        ]);
    }
}
