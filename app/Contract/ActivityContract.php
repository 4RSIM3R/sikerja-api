<?php

namespace App\Contract;

interface ActivityContract extends BaseContract
{
    public function evidence(string $id, bool $show, array $photo): array;
}