<?php declare(strict_types=1);


namespace App\Interface;


interface EntityExtended {
    /**
     * @param int $dancesCount
     *
     * @return void
     */
    public function setDancesCount(int $dancesCount): void;

    /**
     * @return int
     */
    public function getDancesCount(): int;
}