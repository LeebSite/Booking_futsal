<?php

use App\Helpers\FormatHelper;

if (!function_exists('format_currency')) {
    function format_currency(int $amount): string
    {
        return FormatHelper::currency($amount);
    }
}

if (!function_exists('format_date_indonesian')) {
    function format_date_indonesian(string $date): string
    {
        return FormatHelper::dateIndonesian($date);
    }
}

if (!function_exists('format_datetime_indonesian')) {
    function format_datetime_indonesian(string $datetime): string
    {
        return FormatHelper::datetimeIndonesian($datetime);
    }
}

if (!function_exists('day_indonesian')) {
    function day_indonesian(string $date): string
    {
        return FormatHelper::dayIndonesian($date);
    }
}

if (!function_exists('format_time_range')) {
    function format_time_range(string $jamString): string
    {
        return FormatHelper::timeRange($jamString);
    }
}

if (!function_exists('format_phone_number')) {
    function format_phone_number(string $phone): string
    {
        return FormatHelper::phoneNumber($phone);
    }
}

if (!function_exists('truncate_text')) {
    function truncate_text(string $text, int $length = 100, string $suffix = '...'): string
    {
        return FormatHelper::truncate($text, $length, $suffix);
    }
}

if (!function_exists('status_badge_class')) {
    function status_badge_class(string $status): string
    {
        return FormatHelper::statusBadgeClass($status);
    }
}

if (!function_exists('calculate_age')) {
    function calculate_age(string $birthDate): int
    {
        return FormatHelper::age($birthDate);
    }
}

if (!function_exists('time_ago_indonesian')) {
    function time_ago_indonesian(string $datetime): string
    {
        return FormatHelper::timeAgoIndonesian($datetime);
    }
}
