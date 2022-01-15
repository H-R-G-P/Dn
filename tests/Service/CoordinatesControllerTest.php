<?php declare(strict_types=1);

namespace App\Tests\Service;

use App\Dto\PolygonDTO;
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

        $collection->add(new Place(1.2, 1.2));

        try {
            $polygon = null;
            $polygon = $service->getPolygon($collection);
            self::assertSame(null, $polygon);
        }catch (\Exception $e) {
            self::assertSame('Minimum 2 places.', $e->getMessage());
        }

        $collection->add(new Place(1.4, 1.6));
        $collection->add(new Place(1.7, 1.2));

        try {
            $polygon = null;
            $polygon = $service->getPolygon($collection);
            self::assertSame($polygon->getTop(), $collection->getValues()[2]->getLat());
            self::assertSame($polygon->getRight(), $collection->getValues()[1]->getLon());
            self::assertSame($polygon->getBottom(), $collection->getValues()[0]->getLat());
            self::assertSame($polygon->getLeft(), $collection->getValues()[0]->getLon());
        }catch (\Exception $e) {
            self::assertInstanceOf(PolygonDTO::class, $polygon);
        }
    }

    public function testGetPolygonWithNotFullPlaces(): void
    {
        $service = new CoordinatesService();
        $collection = new ArrayCollection();

        $collection->add(new Place(null, null));
        $collection->add(new Place(1.2, null));
        $collection->add(new Place(null, 1.2));
        $collection->add(new Place(1.2, 1.2));

        try {
            $polygon = null;
            $polygon = $service->getPolygon($collection);
            self::assertSame(null, $polygon);
        }catch (\Exception $e) {
            self::assertSame('Minimum 2 places.', $e->getMessage());
        }

        $collection->add(new Place(1.2, 1.2));
        $collection->add(new Place(1.2, 1.2));

        try {
            $polygon = null;
            $polygon = $service->getPolygon($collection);
            self::assertInstanceOf(PolygonDTO::class, $polygon);
        }catch (\Exception $e) {
            self::assertInstanceOf(PolygonDTO::class, $polygon);
        }
    }
}
