<?php declare(strict_types=1);


namespace App\Vo;


use App\Entity\Version;

class AddressVO
{
    /** As possible full address to village.
     * If village unknown, then only department and region, itp.
     *
     * @var string
     *
     * @example "Мінская вобл., Барысаўскі р-н, в. Селішча"
     */
    private string $address;

    /** AddressVO constructor.
     *
     * @param Version $v
     * @param string $language
     */
    public function __construct(Version $v, string $language = 'by')
    {
        $department = $v->getDepartment() !== null ? $v->getDepartment()->getName() : '';
        $region = $v->getRegion() !== null ? $v->getRegion()->getName() : '';
        $village = $v->getPlace() !== null ? $v->getPlace()->getName() : '';

        if ($language === 'by'){
            $this->address = ($department !== '' ? $department.' вобл.' : '')
                .($region !== '' ? ', '.$region .' р-н': '')
                .($village !== '' ? ', в. '.$village : '');
        }

        if ($language === 'en'){
            $this->address = ($department !== '' ? $department.' dep.' : '')
                .($region !== '' ? ', '.$region .' reg.': '')
                .($village !== '' ? ', vil. '.$village : '');
        }

    }

    public function __toString(): string
    {
        return $this->address;
    }
}