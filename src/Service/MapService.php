<?php declare(strict_types=1);


namespace App\Service;


use App\Dto\MapDTO;
use App\Entity\Place;
use App\Vo\CoordinatesVO;
use App\Vo\PolygonVO;
use Exception;

class MapService
{
    /** Create MapDTO if at least one place has full coordinates, otherwise return null.
     *
     * @param Place[] $places
     *
     * @return ?MapDTO
     */
    public function createMapDTO(array $places): ?MapDTO
    {
        $points = [];
        foreach ($places as $place) {
            if ($coordinates = $place->getCoordinates())
            $points[] = $coordinates;
        }

        try {
            $polygon = $this->createPolygonVO($points);
            $map = new MapDTO($points, $polygon);
        }catch (Exception $e){
            $map = null;
        }

        return $map;
    }

    /**
     * @param CoordinatesVO[] $points
     *
     * @return PolygonVO
     *
     * @throws Exception
     */
    public function createPolygonVO(array $points): PolygonVO
    {
        if (count($points) === 0) {
            throw new Exception('No_one');
        }
        if (count($points) === 1) {
            $highestLat = $points[0]->getLat()+1;
            $lowerLat = $points[0]->getLat()-1;
            $highestLon = $points[0]->getLon()+1;
            $lowerLon = $points[0]->getLon()-1;

            return new PolygonVO($highestLat, $highestLon, $lowerLat, $lowerLon);
        }

        usort($points, function(CoordinatesVO $a, CoordinatesVO $b){
            if ($a->getLat() === $b->getLat()) {
                return 0;
            }
            return ($a->getLat() > $b->getLat()) ? +1 : -1;
        });

        $highestLat = $points[0]->getLat();
        $lowerLat = $points[array_key_last($points)]->getLat();

        usort($points, function(CoordinatesVO $a, CoordinatesVO $b){
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