<?php declare(strict_types=1);


namespace App\Interface;


use App\Entity\Dance;

interface EntityExtended {
    /**
     * @param Dance[] $dances
     *
     * @return void
     */
    public function setDances(array $dances): void;

    /**
     * @return Dance[]
     */
    public function getDances(): array;
}