<?php

declare(strict_types=1);

namespace App\Dto;

use App\Vo\MapMarkerVO;
use App\Vo\PolygonVO;
use Symfony\Component\Serializer\SerializerInterface;

class MapDTO
{
    private ?PolygonVO $polygon;

    /**
     * @var MapMarkerVO[]
     */
    private array $markers;
    private SerializerInterface $serializer;

    /**
     * MapDTO constructor.
     *
     * @param MapMarkerVO[] $markers
     * @param ?PolygonVO $polygon
     * @param SerializerInterface $serializer
     */
    public function __construct(array $markers, ?PolygonVO $polygon, SerializerInterface $serializer)
    {
        $this->markers = $markers;
        $this->polygon = $polygon;
        $this->serializer = $serializer;
    }

    /**
     * @return MapMarkerVO[]
     */
    public function getMarkers(): array
    {
        return $this->markers;
    }

    /**
     * @return ?PolygonVO
     */
    public function getPolygon(): ?PolygonVO
    {
        return $this->polygon;
    }

    public function hasPlaces(): bool
    {
        return !(count($this->markers) === 0);
    }

    public function hasOnlyOnePlace(): bool
    {
        return count($this->markers) === 1;
    }

    public function serializeToJson(): string
    {
        return $this->serializer->serialize($this, 'json');
    }
}
