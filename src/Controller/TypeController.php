<?php

namespace App\Controller;

use App\Entity\Type;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeController extends AbstractController
{
    /**
     * @Route("/types", name="types")
     *
     * @param TypeRepository<Type> $typeRepository
     *
     * @return Response
     */
    public function index(TypeRepository $typeRepository): Response
    {
        $types = $typeRepository->findAll();

        return $this->render('type/index.html.twig', [
            'types' => $types,
        ]);
    }

    /**
     * @Route("/type/{slug}", name="type")
     *
     * @param string $slug
     * @param TypeRepository<Type> $typeRepository
     *
     * @return Response
     */
    public function show(string $slug, TypeRepository $typeRepository): Response
    {
       $type = $typeRepository->findOneBy([
           'slug' => $slug,
       ]);

        return $this->render('type/show.html.twig', [
            'type' => $type,
        ]);
    }
}
