<?php declare(strict_types=1);

namespace App\Vo;


class PolygonVO
{
    /** Latitude */
    private float $top;

    /** Longitude */
    private float $right;

    /** Latitude */
    private float $bottom;

    /** Longitude */
    private float $left;

    /**
     * PolygonVO constructor.
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