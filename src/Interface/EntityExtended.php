<?php

declare(strict_types=1);

namespace App\Interface;

interface EntityExtended
{
    public function getId(): ?int;

    public function setDancesCount(int $dancesCount): void;

    public function getDancesCount(): int;
}
