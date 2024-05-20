<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\SearchService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    public function __construct(
        private SearchService $searchService,
    ) {
    }

    /**
     * @Route("/search",
     *     name="search"
     * )
     */
    public function search(Request $request): Response
    {
        $input = $request->get('input');

        $result = $this->searchService->findMatches($input);

        return $this->render('search/index.html.twig', [
            'search_result' => $result,
            'input' => $input,
        ]);
    }
}
