<?php

use Carbon\Carbon;

function plural($name = null)
{
    if (str_contains($name, '.')) {
        return trans_choice($name, 2);
    }

    return trans_choice($name.'.'.str_singular($name), 2);
}

function singular($name = null)
{
    if (str_contains($name, '.')) {
        return trans_choice($name, 1);
    }

    return trans_choice($name.'.'.str_singular($name), 1);
}

function optionalCollection($collection)
{
    return ['' => 'No tiene'] + $collection->all();
}

function normalizeCharacters($string)
{
    $normalizeChars = [
        'Š' => 'S', 'š' => 's', 'Ð' => 'Dj', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A',
        'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I',
        'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U',
        'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
        'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i',
        'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u',
        'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y', 'ƒ' => 'f',
        'ă' => 'a', 'î' => 'i', 'â' => 'a', 'ș' => 's', 'ț' => 't', 'Ă' => 'A', 'Î' => 'I', 'Â' => 'A', 'Ș' => 'S', 'Ț' => 'T',
    ];

    return trim(strtolower(strtr($string, $normalizeChars)));
}

function splitWhiteSpaces($string)
{
    return preg_split('/\s+/', $string);
}

function str_randomNumbers($length = 16)
{
    $pool = '0123456789';

    return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
}

function getDateRange($dateRange)
{
    if (!str_contains($dateRange, '-') || substr_count($dateRange, '-') > 1) {
        return '';
    }

    $dateRange = [
        'start' => substr($dateRange, 0, strpos($dateRange, '-') - 1),
        'end' => substr($dateRange, strpos($dateRange, '-') + 2, strlen($dateRange)),
    ];

    try {
        $dateRange['start'] = Carbon::createFromFormat('d/m/Y', $dateRange['start'])->startOfDay();
        $dateRange['end'] = Carbon::createFromFormat('d/m/Y', $dateRange['end'])->endOfDay();
    } catch (Exception $e) {
        return '';
    }

    return $dateRange;
}

function dateToday($format)
{
    if ($format) {
        return Carbon::now()->format($format);
    }
    return Carbon::now();
}
