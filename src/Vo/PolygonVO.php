<?php

declare(strict_types=1);

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

    public function __construct(float $top, float $right, float $bottom, float $left)
    {
        $this->top = $top;
        $this->right = $right;
        $this->bottom = $bottom;
        $this->left = $left;
    }

    public function getTop(): float
    {
        return $this->top;
    }

    public function getRight(): float
    {
        return $this->right;
    }

    public function getBottom(): float
    {
        return $this->bottom;
    }

    public function getLeft(): float
    {
        return $this->left;
    }
}
