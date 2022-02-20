<?php
declare(strict_types=1);


namespace App\Service;


use App\Interface\EntityExtended;
use Cocur\Slugify\Slugify;

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

    public static function slugify(string $string)
    {
        $slugify = new Slugify();

        $slugify->addRules([
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'h',
            'д' => 'd',
            'дз' => 'dz',
            'дж' => 'dzh',
            'е' => 'ie',
            'ё' => 'io',
            'ж' => 'zh',
            'з' => 'z',
            'і' => 'i',
            'й' => 'j',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ў' => 'u',
            'ф' => 'f',
            'х' => 'ch',
            'ц' => 'c',
            'ч' => 'cz',
            'ш' => 'sz',
            'ы' => 'y',
            'ь' => '',
            'э' => 'e',
            'ю' => 'iu',
            'я' => 'ia',
            "'" => '',
        ]);

        return $slugify->slugify($string);
    }
}