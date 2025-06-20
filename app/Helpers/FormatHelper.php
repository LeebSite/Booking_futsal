<?php

namespace App\Helpers;

use Carbon\Carbon;

class FormatHelper
{
    /**
     * Format currency to Indonesian Rupiah
     */
    public static function currency(int $amount): string
    {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }

    /**
     * Format date to Indonesian format
     */
    public static function dateIndonesian(string $date): string
    {
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        $carbon = Carbon::parse($date);
        $day = $carbon->day;
        $month = $months[$carbon->month];
        $year = $carbon->year;

        return "$day $month $year";
    }

    /**
     * Format datetime to Indonesian format
     */
    public static function datetimeIndonesian(string $datetime): string
    {
        $carbon = Carbon::parse($datetime);
        $date = self::dateIndonesian($datetime);
        $time = $carbon->format('H:i');

        return "$date pukul $time";
    }

    /**
     * Get day name in Indonesian
     */
    public static function dayIndonesian(string $date): string
    {
        $days = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];

        $dayName = Carbon::parse($date)->format('l');
        return $days[$dayName] ?? $dayName;
    }

    /**
     * Format time range
     */
    public static function timeRange(string $jamString): string
    {
        $jams = explode(', ', $jamString);
        
        if (count($jams) === 1) {
            $startTime = $jams[0];
            $endTime = self::addHour($startTime);
            return "$startTime - $endTime";
        }

        sort($jams);
        $startTime = $jams[0];
        $lastTime = end($jams);
        $endTime = self::addHour($lastTime);

        return "$startTime - $endTime";
    }

    /**
     * Add one hour to time string
     */
    private static function addHour(string $time): string
    {
        $carbon = Carbon::createFromFormat('H:i', $time);
        return $carbon->addHour()->format('H:i');
    }

    /**
     * Format file size
     */
    public static function fileSize(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $factor = floor((strlen($bytes) - 1) / 3);
        
        return sprintf("%.2f %s", $bytes / pow(1024, $factor), $units[$factor]);
    }

    /**
     * Format phone number
     */
    public static function phoneNumber(string $phone): string
    {
        // Remove all non-numeric characters
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        // Format Indonesian phone number
        if (substr($phone, 0, 1) === '0') {
            $phone = '+62' . substr($phone, 1);
        } elseif (substr($phone, 0, 2) === '62') {
            $phone = '+' . $phone;
        } elseif (substr($phone, 0, 3) !== '+62') {
            $phone = '+62' . $phone;
        }

        return $phone;
    }

    /**
     * Truncate text
     */
    public static function truncate(string $text, int $length = 100, string $suffix = '...'): string
    {
        if (strlen($text) <= $length) {
            return $text;
        }

        return substr($text, 0, $length) . $suffix;
    }

    /**
     * Format status badge class
     */
    public static function statusBadgeClass(string $status): string
    {
        $classes = [
            'pending' => 'badge-warning',
            'accepted' => 'badge-success',
            'rejected' => 'badge-danger',
            'cancelled' => 'badge-secondary',
            'completed' => 'badge-info',
        ];

        return $classes[$status] ?? 'badge-secondary';
    }

    /**
     * Calculate age from birth date
     */
    public static function age(string $birthDate): int
    {
        return Carbon::parse($birthDate)->age;
    }

    /**
     * Time ago in Indonesian
     */
    public static function timeAgoIndonesian(string $datetime): string
    {
        $carbon = Carbon::parse($datetime);
        $now = Carbon::now();
        
        $diffInSeconds = $now->diffInSeconds($carbon);
        $diffInMinutes = $now->diffInMinutes($carbon);
        $diffInHours = $now->diffInHours($carbon);
        $diffInDays = $now->diffInDays($carbon);

        if ($diffInSeconds < 60) {
            return 'Baru saja';
        } elseif ($diffInMinutes < 60) {
            return $diffInMinutes . ' menit yang lalu';
        } elseif ($diffInHours < 24) {
            return $diffInHours . ' jam yang lalu';
        } elseif ($diffInDays < 7) {
            return $diffInDays . ' hari yang lalu';
        } else {
            return self::dateIndonesian($datetime);
        }
    }
}
