<?php

namespace App\Contract;

interface AttendanceContract extends BaseContract
{
    public function today();
}