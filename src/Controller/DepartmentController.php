<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Dance;
use App\Entity\Department;
use App\Entity\Place;
use App\Entity\Region;
use App\Service\DatabaseService;
use App\Service\MapService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepartmentController extends AbstractController
{
    /**
     * @Route("/departments/{slug}",
     *     name="department"
     * )
     */
    public function show(string $slug, MapService $mapService, DatabaseService $databaseService): Response
    {
        $department = $this->getDoctrine()->getRepository(Department::class)->findOneBy([
            'slug' => $slug,
        ]);

        if ($department === null) {
            $this->addFlash('dark', 'Department "' . $slug . '" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $places = $this->getDoctrine()->getRepository(Place::class)->findByEntityExtended($department);
        $regions = $this->getDoctrine()->getRepository(Region::class)->findByDepartment($department);
        $regions = $databaseService->setDances($regions);
        $dances = $this->getDoctrine()->getRepository(Dance::class)->findByEntityExtended($department);

        $map = $mapService->createMapDTO($places);
        $map_json = $map?->serializeToJson();

        return $this->render('department/show.html.twig', [
            'department' => $department,
            'regions' => $regions,
            'dances' => $dances,
            'map_json' => $map_json,
        ]);
    }
}
