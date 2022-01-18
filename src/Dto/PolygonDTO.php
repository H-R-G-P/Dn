<?php declare(strict_types=1);

namespace App\Dto;


class PolygonDTO
{
    /**
     * @var float Latitude
     */
    private float $top;

    /**
     * @var float Longitude
     */
    private float $right;

    /**
     * @var float Latitude
     */
    private float $bottom;

    /**
     * @var float Longitude
     */
    private float $left;

    /**
     * PolygonDTO constructor.
     *
     * @param float $top
     * @param float $right
     * @param float $bottom
     * @param float $left
     */
    public function __construct(float $top, float $right, float $bottom, float $left)
    {
        $this->top = $top;
        $this->right = $right;
        $this->bottom = $bottom;
        $this->left = $left;
    }

    /**
     * @return float
     */
    public function getTop(): float
    {
        return $this->top;
    }

    /**
     * @return float
     */
    public function getRight(): float
    {
        return $this->right;
    }

    /**
     * @return float
     */
    public function getBottom(): float
    {
        return $this->bottom;
    }

    /**
     * @return float
     */
    public function getLeft(): float
    {
        return $this->left;
    }
}