<?php

namespace App\Utils;

use DateTime;

class DateUtils
{

    public static function week_count($date)
    {
        $date = new DateTime($date);
        $oneJan = new DateTime($date->format('Y') . '-01-01');
        $numberOfDays = $date->diff($oneJan)->days;
        $weekNumber = ceil(($numberOfDays + $oneJan->format('w') + 1) / 7);
        return "Minggu ke-$weekNumber";
    }

    public static function date_format($date)
    {
        $date = new DateTime($date);
        $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        // Get the day name
        $dayName = $days[$date->format('w')];

        // Get the date, month, and year
        $day = $date->format('j');
        $month = $months[$date->format('n') - 1];
        $year = $date->format('Y');

        // Format the result
        return "$day $month $year";
    }
}
