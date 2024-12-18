<?php

declare(strict_types=1);

namespace App\Vo;

use App\Entity\Version;

class AddressVO
{
    /** As possible full address to village.
     * If village unknown, then only department and region, itp.
     *
     * @example "Мінская вобл., Барысаўскі р-н, в. Селішча"
     */
    private string $address;

    public function __construct(Version $version, string $language = 'by')
    {
        $department = (string) $version->getDepartment()?->getName();
        $region = (string) $version->getRegion()?->getName();
        $village = (string) $version->getPlace()?->getName();

        $this->address = '';
        if ($language === 'by') {
            $this->address = ($department !== '' ? $department . ' вобл.' : '')
                . ($region !== '' ? ', ' . $region . ' р-н' : '')
                . ($village !== '' ? ', в. ' . $village : '');
        }

        if ($language === 'en') {
            $this->address = ($department !== '' ? $department . ' dep.' : '')
                . ($region !== '' ? ', ' . $region . ' reg.' : '')
                . ($village !== '' ? ', vil. ' . $village : '');
        }
    }

    public function __toString(): string
    {
        return $this->address;
    }
}
