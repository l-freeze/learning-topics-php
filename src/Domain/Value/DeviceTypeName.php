<?php
declare(strict_types=1);

namespace LearningTopics\Domain\Value;

use InvalidArgumentException;

final readonly class DeviceTypeName
{
    private function __construct(
        public string $value
    )
    {
    }

    public static function create(string $input): self
    {
        // 1文字以上
        if ($input === '') {
            throw new InvalidArgumentException('DeviceName must be at least 1 character');
        }
        // 32文字以下
        if (mb_strlen($input) > 32) {
            throw new InvalidArgumentException('DeviceName must be at most 32 characters');
        }

        return new self($input);
    }
}
