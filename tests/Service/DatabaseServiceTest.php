<?php declare(strict_types=1);

namespace App\Tests\Service;

use App\Entity\Region;
use App\Service\DatabaseService;
use App\Dto\DatabaseDTO;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertSame;

class DatabaseServiceTest extends TestCase
{
    public function testGetRegionsSortedByDances()
    {
        $regions = [];
        $region = $this->createMock(Region::class);
        $region->expects($this->any())
            ->method('getDances')
            ->willReturn([]);
        $regions[] = $region;
        $region = $this->createMock(Region::class);
        $region->expects($this->any())
            ->method('getDances')
            ->willReturn([1, 2, 3]);
        $regions[] = $region;
        $region = $this->createMock(Region::class);
        $region->expects($this->any())
            ->method('getDances')
            ->willReturn([2, 3]);
        $regions[] = $region;

        $database = $this->createMock(DatabaseDTO::class);
        $database->expects($this->any())
            ->method('getRegions')
            ->willReturn($regions);

        $service = new DatabaseService($database);

        $sortedRegions = $service->getRegionsSortedByDances();
        assertSame(3, count($sortedRegions[0]->getDances()));
        assertSame(2, count($sortedRegions[1]->getDances()));
        assertSame(0, count($sortedRegions[2]->getDances()));
    }
}
