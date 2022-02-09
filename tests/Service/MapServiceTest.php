<?php declare(strict_types=1);

namespace App\Tests\Service;

use App\Service\MapService;
use App\Vo\CoordinatesVO;
use App\Vo\PolygonVO;
use \Exception;
use PHPUnit\Framework\TestCase;

class MapServiceTest extends TestCase
{

    public function testCreatePolygonVO(): void
    {
        $service = new MapService();
        $points = array();

        try {
            $polygon = null;
            $polygon = $service->createPolygonVO($points);
            self::assertSame(null, $polygon);
        }catch (Exception $e) {
            self::assertSame('No_one', $e->getMessage());
        }

        $points[] = new CoordinatesVO(1.2, 1.2);

        try {
            $polygon = null;
            $polygon = $service->createPolygonVO($points);
            self::assertSame(null, $polygon);
        }catch (Exception $e) {
            self::assertInstanceOf(PolygonVO::class, $polygon);
        }

        $points[] = new CoordinatesVO(1.4, 1.6);
        $points[] = new CoordinatesVO(1.7, 1.2);

        try {
            $polygon = null;
            $polygon = $service->createPolygonVO($points);
            self::assertSame($polygon->getTop(), $points[2]->getLat());
            self::assertSame($polygon->getRight(), $points[1]->getLon());
            self::assertSame($polygon->getBottom(), $points[0]->getLat());
            self::assertSame($polygon->getLeft(), $points[0]->getLon());
        }catch (Exception $e) {
            self::assertInstanceOf(PolygonVO::class, $polygon);
        }
    }

}
