<?php declare(strict_types=1);


namespace App\Vo;


class CoordinatesVO
{
    /** Latitude
     * @var float
     */
    private float $lat;

    /** Longitude
     * @var float
     */
    private float $lon;

    /**
     * CoordinatesVO constructor.
     *
     * @param float $lat
     * @param float $lon
     */
    public function __construct(float $lat, float $lon)
    {
        $this->lat = $lat;
        $this->lon = $lon;
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
}