<?php declare(strict_types=1);

function parserMessage(?string $message): ?array
{
    $regex = '(\d{4,5}$)|(\d+,\d{2})|(\d{11,20}$)';
    preg_match_all("/$regex/uim", $message, $matches);
    [, $code, $total, $wallet] = array_map('implode', $matches);
    return [
        'code' => $code,
        'total' => $total,
        'wallet' => $wallet
    ];
}