<?php
declare(strict_types=1);


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ErrorController extends AbstractController
{
    /**
     * @param Throwable $exception
     *
     * @return Response
     */
    public function show(Throwable $exception): Response
    {
        if ($exception->getCode() === 404){
            $this->addFlash('warning', $exception->getMessage());
            return $this->redirectToRoute('homepage');
        }

        throw new \Exception($exception->getMessage(), $exception->getCode(), $exception);
    }
}