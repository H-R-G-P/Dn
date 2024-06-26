<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\MapDTO;
use App\Entity\Place;
use App\Entity\Version;
use App\Vo\MapMarkerVO;
use App\Vo\PolygonVO;
use Exception;
use Symfony\Contracts\Translation\TranslatorInterface;

class MapService
{
    private TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

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
            if ($place->getLat() !== null && $place->getLon() !== null) {
                $popup = '';
                $versions = $place->getVersions();

                $firstVersion = $versions->get(0);
                $versions->remove(0);
                if ($firstVersion) {
                    $popup = $this->createPopup($firstVersion);
                }

                foreach ($versions as $version) {
                    $popup .= "\n-------\n" . $this->createPopup($version);
                }

                $markers[] = new MapMarkerVO($place->getLat(), $place->getLon(), $popup);
            }
        }

        try {
            $polygon = $this->createPolygonVO($markers);
            $map = new MapDTO($markers, $polygon);
        } catch (Exception $e) {
            $map = null;
        }

        return $map;
    }

    /**
     * Create marker popup inner html.
     */
    public function createPopup(Version $version): string
    {
        $name = $version->getDance()->getName();
        $versionName = $version->getName();
        if ($versionName !== null && $versionName !== '' && str_contains($versionName, $name)) {
            $name = $versionName;
        } elseif ($versionName !== '') {
            $name .= '|' . $versionName;
        }
        $typeName = $version->getType() !== null ? $version->getType()->getName() : '';
        $sourceName = $version->getSource() !== null ? $version->getSource()->getNameShort() : '';
        $placeName = $version->getPlace() !== null ? $version->getPlace()->getName() : '';
        $placeShort = $this->translator->trans('vil.');

        return $name . ", " . $typeName . ", " . $sourceName . ", $placeShort " . $placeName;
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
            $highestLat = $markers[0]->getLat() + 0.3;
            $lowerLat = $markers[0]->getLat() - 0.3;
            $highestLon = $markers[0]->getLon() + 0.3;
            $lowerLon = $markers[0]->getLon() - 0.3;

            return new PolygonVO($highestLat, $highestLon, $lowerLat, $lowerLon);
        }

        usort($markers, static function (MapMarkerVO $a, MapMarkerVO $b) {
            if ($a->getLat() === $b->getLat()) {
                return 0;
            }
            return ($a->getLat() > $b->getLat()) ? +1 : -1;
        });

        $highestLat = $markers[0]->getLat();
        $lowerLat = $markers[array_key_last($markers)]->getLat();

        usort($markers, static function (MapMarkerVO $a, MapMarkerVO $b) {
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
