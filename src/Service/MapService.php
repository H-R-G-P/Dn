<?php declare(strict_types=1);


namespace App\Service;


use App\Entity\Place;
use App\Vo\CoordinatesVO;
use App\Vo\PolygonVO;
use Exception;

class MapService
{
    /**
     * @param CoordinatesVO[] $points
     *
     * @return PolygonVO
     *
     * @throws Exception
     */
    public function createPolygonVO(array $points): PolygonVO
    {
        if (count($points) < 2){
            throw new Exception('Minimum 2 places.');
        }

        usort($points, function(Place $a, Place $b){
            if ($a->getLat() === $b->getLat()) {
                return 0;
            }
            return ($a->getLat() > $b->getLat()) ? +1 : -1;
        });

        $highestLat = $points[0]->getLat();
        $lowerLat = $points[array_key_last($points)]->getLat();

        usort($points, function(Place $a, Place $b){
            if ($a->getLon() === $b->getLon()) {
                return 0;
            }
            return ($a->getLon() > $b->getLon()) ? +1 : -1;
        });

        $highestLon = $points[0]->getLon();
        $lowerLon = $points[array_key_last($points)]->getLon();

        return new PolygonVO($highestLat, $highestLon, $lowerLat, $lowerLon);
    }
}