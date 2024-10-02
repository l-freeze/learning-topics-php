<?php
declare(strict_types=1);

namespace LearningTopics\Domain\Value;

use InvalidArgumentException;

final readonly class DeviceName
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
        // 256文字以下
        if (mb_strlen($input) > 256) {
            throw new InvalidArgumentException('DeviceName must be at most 32 characters');
        }

        return new self($input);
    }
}
