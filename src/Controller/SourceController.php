<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\Source;
use App\Repository\SourceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SourceController extends AbstractController
{
    /**
     * @Route("/{_locale}/sources",
     *     locale="by",
     *     requirements={
     *         "_locale": "by|en",
     *     },
     *     name="sources"
     * )
     *
     * @param SourceRepository<Source> $sourceRepository
     *
     * @return Response
     */
    public function index(SourceRepository $sourceRepository): Response
    {
        $sources = $sourceRepository->findAll();

        return $this->render('source/index.html.twig', [
            'sources' => $sources,
        ]);
    }

    /**
     * @Route("/{_locale}/sources/{slug}",
     *     locale="by",
     *     requirements={
     *         "_locale": "by|en",
     *     },
     *     name="source"
     * )
     *
     * @param string $slug
     * @param SourceRepository<Source> $sourceRepository
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
