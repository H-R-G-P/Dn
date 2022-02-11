<?php declare(strict_types=1);


namespace App\Vo;


class MapMarkerVO
{
    /** Latitude */
    private float $lat;

    /** Longitude */
    private float $lon;

    /** @var string */
    private string $popup;

    /**
     * MapMarkerVO constructor.
     *
     * @param float $lat
     * @param float $lon
     * @param string $popup
     */
    public function __construct(float $lat, float $lon, string $popup)
    {
        $this->lat = $lat;
        $this->lon = $lon;
        $this->popup = $popup;
    }

    /** Get Latitude
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /** Get Longitude
     * @return float
     */
    public function getLon(): float
    {
        return $this->lon;
    }

    /**
     * @return string
     */
    public function getPopup(): string
    {
        return $this->popup;
    }
}