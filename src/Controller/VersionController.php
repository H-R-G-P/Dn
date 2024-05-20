<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Dance;
use App\Entity\Department;
use App\Entity\Region;
use App\Entity\Source;
use App\Entity\Type;
use App\Repository\DanceRepository;
use App\Repository\DepartmentRepository;
use App\Repository\RegionRepository;
use App\Repository\SourceRepository;
use App\Repository\TypeRepository;
use App\Repository\VersionRepository;
use App\Service\MapService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VersionController extends AbstractController
{
    public function __construct(
        private DanceRepository $danceRepository,
        private DepartmentRepository $departmentRepository,
        private RegionRepository $regionRepository,
        private SourceRepository $sourceRepository,
        private TypeRepository $typeRepository,
        private VersionRepository $versionRepository,
        private MapService $mapService,
    ) {
    }

    /**
     * @Route("/versions_source/{slugSource}/{slugDance}",
     *     name="versions_by_source_dance"
     * )
     */
    public function showVersionsBySourceDance(string $slugSource, string $slugDance): Response
    {
        $source = $this->sourceRepository->findOneBy([
            'slug' => $slugSource,
        ]);
        $dance = $this->danceRepository->findOneBy([
            'slug' => $slugDance,
        ]);

        if (!$source instanceof Source) {
            $this->addFlash('dark', 'Source "' . $slugSource . '" not exists.');
            return $this->redirectToRoute('homepage');
        }
        if (!$dance instanceof Dance) {
            $this->addFlash('dark', 'Dance "' . $slugDance . '" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $versions = $this->versionRepository->findBy([
            'source' => $source->getId(),
            'dance' => $dance->getId(),
        ]);

        if (count($versions) === 0) {
            $this->addFlash(
                'dark',
                'Versions related with dance "' . $dance . '" and source "' . $source->getName() . '" not exists.'
            );
            return $this->redirectToRoute('homepage');
        }

        $map_json = $this->mapService->getMapJson($versions);

        return $this->render('version/show_versions_by_ds.html.twig', [
            'source' => $source,
            'dance' => $dance,
            'versions' => $versions,
            'map_json' => $map_json,
        ]);
    }

    /**
     * @Route("/versions_type/{slugType}/{slugDance}",
     *     name="versions_by_type_dance"
     * )
     */
    public function showVersionsByDanceType(string $slugType, string $slugDance): Response
    {
        $type = $this->typeRepository->findOneBy([
            'slug' => $slugType,
        ]);
        $dance = $this->danceRepository->findOneBy([
            'slug' => $slugDance,
        ]);

        if (!$type instanceof Type) {
            $this->addFlash('dark', 'Type "' . $slugType . '" not exists.');
            return $this->redirectToRoute('homepage');
        }
        if (!$dance instanceof Dance) {
            $this->addFlash('dark', 'Dance "' . $slugDance . '" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $versions = $this->versionRepository->findBy([
            'type' => $type->getId(),
            'dance' => $dance->getId(),
        ]);

        if (count($versions) === 0) {
            $this->addFlash(
                'dark',
                'Versions related with dance "' . $dance . '" and type "' . $type->getName() . '" not exists.'
            );
            return $this->redirectToRoute('homepage');
        }

        $map_json = $this->mapService->getMapJson($versions);

        return $this->render('version/show_versions_by_dt.html.twig', [
            'type' => $type,
            'dance' => $dance,
            'versions' => $versions,
            'map_json' => $map_json,
        ]);
    }

    /**
     * @Route("/versions_department/{slugDepartment}/{slugDance}",
     *     name="versions_by_department_dance"
     * )
     */
    public function showVersionsByDanceDepartment(string $slugDepartment, string $slugDance): Response
    {
        $department = $this->departmentRepository->findOneBy([
            'slug' => $slugDepartment,
        ]);
        $dance = $this->danceRepository->findOneBy([
            'slug' => $slugDance,
        ]);

        if (!$department instanceof Department) {
            $this->addFlash('dark', 'Department "' . $slugDepartment . '" not exists.');
            return $this->redirectToRoute('homepage');
        }
        if (!$dance instanceof Dance) {
            $this->addFlash('dark', 'Dance "' . $slugDance . '" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $versions = $this->versionRepository->findBy([
            'department' => $department->getId(),
            'dance' => $dance->getId(),
        ]);

        if (count($versions) === 0) {
            $this->addFlash(
                'dark',
                'Versions with dance "' . $dance . '" and department "' . $department->getName() . '" not exists.'
            );
            return $this->redirectToRoute('homepage');
        }

        $map_json = $this->mapService->getMapJson($versions);

        return $this->render('version/show_versions_by_dd.html.twig', [
            'department' => $department,
            'dance' => $dance,
            'versions' => $versions,
            'map_json' => $map_json,
        ]);
    }

    /**
     * @Route("/versions_district/{slugDistrict}/{slugDance}",
     *     name="versions_by_district_dance"
     * )
     */
    public function showVersionsByDanceDistrict(string $slugDistrict, string $slugDance): Response
    {
        $district = $this->regionRepository->findOneBy([
            'slug' => $slugDistrict,
        ]);
        $dance = $this->danceRepository->findOneBy([
            'slug' => $slugDance,
        ]);

        if (!$district instanceof Region) {
            $this->addFlash('dark', 'District "' . $slugDistrict . '" not exists.');
            return $this->redirectToRoute('homepage');
        }
        if (!$dance instanceof Dance) {
            $this->addFlash('dark', 'Dance "' . $slugDance . '" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $versions = $this->versionRepository->findBy([
            'region' => $district->getId(),
            'dance' => $dance->getId(),
        ]);

        if (count($versions) === 0) {
            $this->addFlash(
                'dark',
                'Versions related with dance "' . $dance . '" and district "' . $district->getName() . '" not exists.'
            );
            return $this->redirectToRoute('homepage');
        }

        $map_json = $this->mapService->getMapJson($versions);

        return $this->render('version/show_versions_by_ddd.html.twig', [
            'department' => $district->getDepartment(),
            'district' => $district,
            'dance' => $dance,
            'versions' => $versions,
            'map_json' => $map_json,
        ]);
    }
}
