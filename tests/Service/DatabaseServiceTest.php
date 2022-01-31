<?php declare(strict_types=1);

namespace App\Tests\Service;

use App\Entity\Region;
use App\Service\DatabaseService;
use App\Vo\DatabaseVO;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertSame;

class DatabaseServiceTest extends TestCase
{
    public function testGetRegionsSortedByDances(): void
    {
        $regions = [];
        $region = $this->createMock(Region::class);
        $region->expects($this->any())
            ->method('getDancesCount')
            ->willReturn(0);
        $regions[] = $region;
        $region = $this->createMock(Region::class);
        $region->expects($this->any())
            ->method('getDancesCount')
            ->willReturn(3);
        $regions[] = $region;
        $region = $this->createMock(Region::class);
        $region->expects($this->any())
            ->method('getDancesCount')
            ->willReturn(2);
        $regions[] = $region;

        $database = $this->createMock(DatabaseVO::class);
        $database->expects($this->any())
            ->method('getRegions')
            ->willReturn($regions);

        $service = new DatabaseService($database);

        $sortedRegions = $service->getRegionsSortedByDances();
        assertSame(3, $sortedRegions[0]->getDancesCount());
        assertSame(2, $sortedRegions[1]->getDancesCount());
        assertSame(0, $sortedRegions[2]->getDancesCount());
    }
}
