<?php
declare(strict_types=1);

namespace LearningTopics\Domain\Value;

enum DeviceGenre: int
{
    case PHONE = 1;
    case MOBILE_PHONE = 2;
    case GAME = 3;
    case AIR_PURIFIERS = 4;
    case ART = 5;

    public function toName(): string
    {
        return match ($this) {
            self::PHONE => 'Phone',
            self::MOBILE_PHONE => 'Mobile Phone',
            self::GAME => 'Game',
            self::AIR_PURIFIERS => 'Air Purifiers',
        };
    }
}
