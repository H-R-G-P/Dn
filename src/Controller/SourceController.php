<?php

namespace App\Controller;

use App\Repository\SourceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SourceController extends AbstractController
{
    /**
     * @Route("/sources/{slug}", name="source")
     *
     * @param string $slug
     * @param SourceRepository $sourceRepository
     *
     * @return Response
     */
    public function show(string $slug, SourceRepository $sourceRepository): Response
    {
        $source = $sourceRepository->findOneBy([
            'slug' => $slug,
        ]);

        return $this->render('source/show.html.twig', [
            'source' => $source,
        ]);
    }
}
