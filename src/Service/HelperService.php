<?php
declare(strict_types=1);


namespace App\Service;


use App\Interface\EntityExtended;

class HelperService
{
    /**
     * @param EntityExtended[] $array1
     * @param EntityExtended[] $array2
     *
     * @return EntityExtended[]
     */
    public static function intersectEntitiesId(array $array1, array $array2): array
    {
        $result = [];

        foreach ($array1 as $entity1) {
            foreach ($array2 as $entity2) {
                if ($entity1->getId() === $entity2->getId()) {
                    $result[] = $entity1;
                }
            }
        }

        return $result;
    }
}