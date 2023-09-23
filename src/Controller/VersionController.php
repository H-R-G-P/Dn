<?php


namespace App\Controller;
use App\Entity\Dance;
use App\Entity\Place;
use App\Entity\Source;
use App\Entity\Version;
use App\Service\MapService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class VersionController extends AbstractController
{
    /**
     * @Route("/versions/{slugDance}/{slugSource}",
     *     name="versions_by_dance_source"
     * )
     *
     * @param string $slugDance
     * @param string $slugSource
     * @param MapService $mapService
     * @return Response
     */
    public function showVersionsByDanceSource(string $slugDance, string $slugSource, MapService $mapService) : Response
    {
        $dance = $this->getDoctrine()->getRepository(Dance::class)->findOneBy([
            'slug' => $slugDance,
        ]);
        $source = $this->getDoctrine()->getRepository(Source::class)->findOneBy([
            'slug' => $slugSource,
        ]);

        if (!$dance || !$dance instanceof Dance) {
            $this->addFlash('dark', 'Dance "'.$slugDance.'" not exists.');
            return $this->redirectToRoute('homepage');
        }
        if (!$source || !$source instanceof Source){
            $this->addFlash('dark', 'Source "'.$slugSource.'" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $versions = $this->getDoctrine()->getRepository(Version::class)->findBy([
            'dance' => $dance->getId(),
            'source' => $source->getId(),
        ]);

        if (count($versions) === 0){
            $this->addFlash('dark', 'Versions related with dance "'.$dance->getName().'" and source "'.$source->getName().'" not exists.');
            return $this->redirectToRoute('homepage');
        }

        $places = [];
        foreach ($versions as $version){
            $place = $version->getPlace();
            if ($place instanceof Place){
                $places[] = $place;
            }
        }

        $map = $mapService->createMapDTO($places);
        $map_json = $map === null ? null : $map->serializeToJson();

        return $this->render('version/show_versions_by_ds.html.twig', [
            'dance' => $dance,
            'source' => $source,
            'versions' => $versions,
            'map_json' => $map_json,
        ]);
    }

}