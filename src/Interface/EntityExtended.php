<?php


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