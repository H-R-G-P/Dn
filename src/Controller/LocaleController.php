<?php
declare(strict_types=1);


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocaleController extends AbstractController
{
    /**
     * @Route("/", name="set_locale")
     *
     * @return Response
     */
    public function setLocale(): Response
    {
        return $this->redirectToRoute('homepage', ['_locale' => 'by']);
    }
}