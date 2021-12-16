<?php


namespace App\Service;


use App\Dto\PolygonDTO;
use App\Entity\Place;
use Doctrine\Common\Collections\Collection;
use Exception;

class CoordinatesService
{
    /**
     * @param Collection<int, Place> $places
     *
     * @return PolygonDTO
     *
     * @throws Exception
     */
    public function getPolygon(Collection $places): PolygonDTO
    {
        $places = $places->toArray();

        foreach ($places as $key => $place) {
            if ($place->getLat() === null || $place->getLon() === null) {
                unset($places[$key]);
            }
        }

        if (count($places) < 2){
            throw new Exception('Minimum 2 places.');
        }

        usort($places, function(Place $a, Place $b){
            if ($a->getLat() === $b->getLat()) {
                return 0;
            }
            return ($a->getLat() > $b->getLat()) ? +1 : -1;
        });

        $highestLat = $places[0]->getLat();
        $lowerLat = $places[array_key_last($places)]->getLat();

        usort($places, function(Place $a, Place $b){
            if ($a->getLon() === $b->getLon()) {
                return 0;
            }
            return ($a->getLon() > $b->getLon()) ? +1 : -1;
        });

        $highestLon = $places[0]->getLon();
        $lowerLon = $places[array_key_last($places)]->getLon();

        $polygon = new PolygonDTO($highestLat, $highestLon, $lowerLat, $lowerLon);

        return $polygon;
    }
}