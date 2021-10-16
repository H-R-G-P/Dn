<?php


namespace App\Dto;


class Polygon
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
     * @return float
     */
    public function getTop(): float
    {
        return $this->top;
    }

    /**
     * @param float $top
     */
    public function setTop(float $top): void
    {
        $this->top = $top;
    }

    /**
     * @return float
     */
    public function getRight(): float
    {
        return $this->right;
    }

    /**
     * @param float $right
     */
    public function setRight(float $right): void
    {
        $this->right = $right;
    }

    /**
     * @return float
     */
    public function getBottom(): float
    {
        return $this->bottom;
    }

    /**
     * @param float $bottom
     */
    public function setBottom(float $bottom): void
    {
        $this->bottom = $bottom;
    }

    /**
     * @return float
     */
    public function getLeft(): float
    {
        return $this->left;
    }

    /**
     * @param float $left
     */
    public function setLeft(float $left): void
    {
        $this->left = $left;
    }
}