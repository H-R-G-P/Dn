<?php declare(strict_types=1);


namespace App\Dto;


use App\Entity\Version;

class AddressDTO
{
    /** As possible full address to village.
     * If village unknown, then only department and region, itp.
     *
     * @var string
     *
     * @example "Мінская вобл., Барысаўскі р-н, в. Селішча"
     */
    private string $address;

    public function __construct(Version $v)
    {
        $department = $v->getDepartment() !== null ? $v->getDepartment()->getName() : '';
        $region = $v->getRegion() !== null ? $v->getRegion()->getName() : '';
        $village = $v->getPlace() !== null ? $v->getPlace()->getName() : '';

        $this->address = ($department !== '' ? $department.' вобл.' : '')
            .($region !== '' ? ', '.$region .' р-н': '')
            .($village !== '' ? ', в. '.$village : '');
    }

    public function __toString(): string
    {
        return $this->address;
    }
}