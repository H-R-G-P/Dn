<?php

namespace App\Controller;

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
     * @Route("/dances/{slug}", name="dance")
     *
     * @param string $slug
     * @param RequestStack $requestStack
     * @param DanceRepository $danceRepository
     * @param VersionRepository $versionRepository
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
        if (!$session->has($dance->getId())) {
            $session->set($dance->getId(), 'This dance already was viewed.');
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
}
