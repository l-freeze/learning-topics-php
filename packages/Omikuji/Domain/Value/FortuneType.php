<?php
declare(strict_types=1);

namespace Packages\Omikuji\Domain\Value;

enum FortuneType: int
{
    case Daikichi = 1;
    case Chukichi = 2;
    case Shokichi = 3;
    case Kichi = 4;
    case Suekichi = 5;
    case Kyo = 6;
    case Daikyo = 7;

    public function jp(): string
    {
        return match ($this) {
            self::Daikichi => '大吉',
            self::Chukichi => '中吉',
            self::Shokichi => '小吉',
            self::Kichi => '吉',
            self::Suekichi => '末吉',
            self::Kyo => '凶',
            self::Daikyo => '大凶',
        };
    }
}