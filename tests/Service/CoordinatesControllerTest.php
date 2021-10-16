<?php

namespace App\Tests\Service;

use App\Dto\Polygon;
use App\Entity\Place;
use App\Service\CoordinatesService;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

class CoordinatesControllerTest extends TestCase
{

    public function testGetPolygonWithFullPlaces(): void
    {
        $service = new CoordinatesService();
        $collection = new ArrayCollection();

        try {
            $polygon = null;
            $polygon = $service->getPolygon($collection);
            self::assertSame(null, $polygon);
        }catch (\Exception $e) {
            self::assertSame('Minimum 2 places.', $e->getMessage());
        }

        $collection->add((new Place())
            ->setLat(1.2)
            ->setLon(1.2));

        try {
            $polygon = null;
            $polygon = $service->getPolygon($collection);
            self::assertSame(null, $polygon);
        }catch (\Exception $e) {
            self::assertSame('Minimum 2 places.', $e->getMessage());
        }

        $collection->add((new Place())
            ->setLat(1.4)
            ->setLon(1.6));
        $collection->add((new Place())
            ->setLat(1.7)
            ->setLon(1.2));

        try {
            $polygon = null;
            $polygon = $service->getPolygon($collection);
            self::assertSame($polygon->getTop(), $collection->getValues()[2]->getLat());
            self::assertSame($polygon->getRight(), $collection->getValues()[1]->getLat());
            self::assertSame($polygon->getBottom(), $collection->getValues()[0]->getLat());
            self::assertSame($polygon->getLeft(), $collection->getValues()[0]->getLat());
        }catch (\Exception $e) {
            self::assertInstanceOf(Polygon::class, $polygon);
        }
    }

    public function testGetPolygonWithNotFullPlaces(): void
    {
        $service = new CoordinatesService();
        $collection = new ArrayCollection();

        $collection->add((new Place())->setLat(null)->setLon(null));
        $collection->add((new Place())->setLat(1.2)->setLon(null));
        $collection->add((new Place())->setLat(null)->setLon(1.2));
        $collection->add((new Place())->setLon(1.2)->setLat(1.2));

        try {
            $polygon = null;
            $polygon = $service->getPolygon($collection);
            self::assertSame(null, $polygon);
        }catch (\Exception $e) {
            self::assertSame('Minimum 2 places.', $e->getMessage());
        }

        $collection->add((new Place())->setLon(1.2)->setLat(1.2));
        $collection->add((new Place())->setLon(1.2)->setLat(1.2));

        try {
            $polygon = null;
            $polygon = $service->getPolygon($collection);
            self::assertInstanceOf(Polygon::class, $polygon);
        }catch (\Exception $e) {
            self::assertInstanceOf(Polygon::class, $polygon);
        }
    }
}
