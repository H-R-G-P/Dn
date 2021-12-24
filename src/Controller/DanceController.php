<?php

namespace App\Controller;

use App\Entity\Dance;
use App\Entity\Version;
use App\Repository\DanceRepository;
use App\Repository\VersionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DanceController extends AbstractController
{
    /**
     * @Route("/dances", name="dances")
     *
     * @param DanceRepository<Dance> $danceRepository
     *
     * @return Response
     */
    public function index(DanceRepository $danceRepository): Response
    {
        $dances = $danceRepository->findAll();

        return $this->render('dance/index.html.twig', [
            'dances' => $dances,
        ]);
    }

    /**
     * @Route("/dances/{slug}", name="dance")
     *
     * @param string $slug
     * @param RequestStack $requestStack
     * @param DanceRepository<Dance> $danceRepository
     * @param VersionRepository<Version> $versionRepository
     * @param EntityManagerInterface $entityManager
     *
     * @return Response
     */
    public function show(string $slug, RequestStack $requestStack, DanceRepository $danceRepository, VersionRepository $versionRepository, EntityManagerInterface $entityManager): Response
    {
        $dance = $danceRepository->findOneBy([
            'slug' => $slug,
        ]);

        if (!$dance) {
            return new Response('This dance dose not exists.');
        }

        $session = $requestStack->getSession();
        if (!$session->has($dance->getId().'Dance')) {
            $session->set($dance->getId().'Dance', 'This dance already was viewed.');
            $dance->subView();
            $entityManager->flush();
        }

        $versions = $versionRepository->findBy([
            'id_dance' => $dance->getId(),
        ]);

        usort($versions, function ($a, $b) {
            return strcmp($a->getName(), $b->getName());
        });

        return $this->render('dance/show.html.twig', [
            'dance' => $dance,
            'versions' => $versions,
        ]);
    }

    /**
     * @Route("/dances/{slugDance}/{slugVersion}", name="version")
     *
     * @param string $slugVersion
     * @param RequestStack $requestStack
     * @param VersionRepository<Version> $versionRepository
     * @param EntityManagerInterface $entityManager
     *
     * @return Response
     */
    public function showVersion(string $slugVersion, RequestStack $requestStack, VersionRepository $versionRepository, EntityManagerInterface $entityManager) : Response
    {
        $version = $versionRepository->findOneBy([
            'slug' => $slugVersion,
        ]);

        if ($version === null){
            return $this->redirectToRoute('dances');
        }
        else{
            $dance = $version->getDance();
            $session = $requestStack->getSession();

            if (!$session->has($dance->getId().'Dance')) {
                $session->set($dance->getId().'Dance', 'This dance already was viewed.');
                $dance->subView();
                $entityManager->flush();
            }

            if (!$session->has($version->getId().'Version')) {
                $session->set($version->getId().'Version', 'This version already was viewed.');
                $version->subView();
                $entityManager->flush();
            }

            return $this->render('dance/show_version.html.twig', [
                'dance' => $dance,
                'version' => $version,
            ]);
        }
    }
}
