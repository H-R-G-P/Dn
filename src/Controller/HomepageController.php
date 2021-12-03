<?php

namespace App\Controller;

use App\Entity\Dance;
use App\Entity\Region;
use App\Entity\Source;
use App\Entity\Type;
use App\Repository\DanceRepository;
use App\Repository\DepartmentRepository;
use App\Repository\RegionRepository;
use App\Repository\SourceRepository;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     *
     * @param RegionRepository<Region> $regionRepository
     * @param TypeRepository<Type> $typeRepository
     * @param SourceRepository<Source> $sourceRepository
     * @param DanceRepository<Dance> $danceRepository
     * @param DepartmentRepository $departmentRepository
     *
     * @return Response
     */
    public function index(RegionRepository $regionRepository, TypeRepository $typeRepository, SourceRepository $sourceRepository, DanceRepository $danceRepository, DepartmentRepository $departmentRepository): Response
    {
        $regions = $regionRepository->findAll();
        $types = $typeRepository->findAll();
        $sources = $sourceRepository->findAll();
        $topTenDances = $danceRepository->findBy([], ['views' => 'DESC'],10);
        $departments = $departmentRepository->findAll();

        $c = [];
        foreach ($departments as $department) {
            $c[] = count($department->getDances());
        }

        return $this->render('homepage/index.html.twig', [
            'regions' => $regions,
            'types' => $types,
            'sources' => $sources,
            'top_ten_dances' => $topTenDances,
            'departments' => $departments,
        ]);
    }
}
