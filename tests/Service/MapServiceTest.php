<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\Service\MapService;
use App\Vo\MapMarkerVO;
use App\Vo\PolygonVO;
use Exception;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Translation\Translator;

class MapServiceTest extends TestCase
{
    public function testCreatePolygonVO(): void
    {
        $translator = $this->createMock(Translator::class);
        $translator->expects($this->any())
            ->method('trans')
            ->willReturn('vil.');
        $serializer = $this->createMock(Serializer::class);

        $service = new MapService($translator, $serializer);
        $markers = array();

        try {
            $polygon = $service->createPolygonVO($markers);
            self::assertNull($polygon);
        } catch (Exception $e) {
            self::assertSame('No_one', $e->getMessage());
        }

        $markers[] = new MapMarkerVO(1.2, 1.2, '');

        try {
            $polygon = null;
            $polygon = $service->createPolygonVO($markers);
            self::assertNull($polygon);
        } catch (Exception $e) {
            self::assertInstanceOf(PolygonVO::class, $polygon);
        }

        $markers[] = new MapMarkerVO(1.4, 1.6, '');
        $markers[] = new MapMarkerVO(1.7, 1.2, '');

        try {
            $polygon = null;
            $polygon = $service->createPolygonVO($markers);
            self::assertSame($polygon->getTop(), $markers[2]->getLat());
            self::assertSame($polygon->getRight(), $markers[1]->getLon());
            self::assertSame($polygon->getBottom(), $markers[0]->getLat());
            self::assertSame($polygon->getLeft(), $markers[0]->getLon());
        } catch (Exception $e) {
            self::assertInstanceOf(PolygonVO::class, $polygon);
        }
    }
}
