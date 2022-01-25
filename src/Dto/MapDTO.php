<?php declare(strict_types=1);


namespace App\Dto;


use App\Vo\CoordinatesVO;
use App\Vo\PolygonVO;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class MapDTO
{
    private ?PolygonVO $polygon;

    /**
     * @var CoordinatesVO[]
     */
    private array $points;

    /**
     * MapDTO constructor.
     *
     * @param ?PolygonVO $polygon
     * @param CoordinatesVO[] $points
     */
    public function __construct(array $points, ?PolygonVO $polygon)
    {
        $this->points = $points;
        $this->polygon = $polygon;
    }

    /**
     * @return CoordinatesVO[]
     */
    public function getPoints(): array
    {
        return $this->points;
    }

    /**
     * @return ?PolygonVO
     */
    public function getPolygon(): ?PolygonVO
    {
        return $this->polygon;
    }

    #[Pure] public function hasPlaces(): bool
    {
        return count($this->points) === 0 ? false : true;
    }

    #[Pure] public function hasOnlyOnePlace(): bool
    {
        return count($this->points) === 1;
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