<?php

declare(strict_types=1);

namespace App\Dto;

use App\Vo\MapMarkerVO;
use App\Vo\PolygonVO;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class MapDTO
{
    private ?PolygonVO $polygon;

    /**
     * @var MapMarkerVO[]
     */
    private array $markers;

    /**
     * MapDTO constructor.
     *
     * @param MapMarkerVO[] $markers
     * @param ?PolygonVO $polygon
     */
    public function __construct(array $markers, ?PolygonVO $polygon)
    {
        $this->markers = $markers;
        $this->polygon = $polygon;
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
        $encoder = new JsonEncoder();
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object->getName();
            },
        ];
        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);

        $serializer = new Serializer([$normalizer], [$encoder]);

        return $serializer->serialize($this, 'json');
    }
}
