<?php
declare(strict_types=1);


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class ErrorController extends AbstractController
{
    /**
     * @param Throwable $exception
     * @param Request $request
     *
     * @return Response
     *
     * @throws Throwable
     */
    public function show(Throwable $exception, Request $request): Response
    {
        if ($request->attributes->get('exception') instanceof NotFoundHttpException){
            $this->addFlash('warning', $exception->getMessage());
            return $this->redirectToRoute('homepage');
        }

        throw $exception;
    }
}