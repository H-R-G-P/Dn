<?php declare(strict_types=1);


namespace App\Service;


use App\Dto\MapDTO;
use App\Entity\Place;
use App\Vo\MapMarkerVO;
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
        $markers = [];
        foreach ($places as $place) {
            if ($coordinates = $place->getMarker())
            $markers[] = $coordinates;
        }

        try {
            $polygon = $this->createPolygonVO($markers);
            $map = new MapDTO($markers, $polygon);
        }catch (Exception $e){
            $map = null;
        }

        return $map;
    }

    /**
     * @param MapMarkerVO[] $markers
     *
     * @return PolygonVO
     *
     * @throws Exception
     */
    public function createPolygonVO(array $markers): PolygonVO
    {
        if (count($markers) === 0) {
            throw new Exception('No_one');
        }
        if (count($markers) === 1) {
            $highestLat = $markers[0]->getLat()+1;
            $lowerLat = $markers[0]->getLat()-1;
            $highestLon = $markers[0]->getLon()+1;
            $lowerLon = $markers[0]->getLon()-1;

            return new PolygonVO($highestLat, $highestLon, $lowerLat, $lowerLon);
        }

        usort($markers, function(MapMarkerVO $a, MapMarkerVO $b){
            if ($a->getLat() === $b->getLat()) {
                return 0;
            }
            return ($a->getLat() > $b->getLat()) ? +1 : -1;
        });

        $highestLat = $markers[0]->getLat();
        $lowerLat = $markers[array_key_last($markers)]->getLat();

        usort($markers, function(MapMarkerVO $a, MapMarkerVO $b){
            if ($a->getLon() === $b->getLon()) {
                return 0;
            }
            return ($a->getLon() > $b->getLon()) ? +1 : -1;
        });

        $highestLon = $markers[0]->getLon();
        $lowerLon = $markers[array_key_last($markers)]->getLon();

        return new PolygonVO($highestLat, $highestLon, $lowerLat, $lowerLon);
    }
}