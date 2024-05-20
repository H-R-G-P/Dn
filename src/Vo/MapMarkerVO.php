<?php

declare(strict_types=1);

namespace App\Vo;

class MapMarkerVO
{
    /** Latitude */
    private float $lat;

    /** Longitude */
    private float $lon;

    private string $popup;

    public function __construct(float $lat, float $lon, string $popup)
    {
        $this->lat = $lat;
        $this->lon = $lon;
        $this->popup = $popup;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    public function getLon(): float
    {
        return $this->lon;
    }

    public function getPopup(): string
    {
        return $this->popup;
    }
}
