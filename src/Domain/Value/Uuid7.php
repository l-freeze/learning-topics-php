<?php
declare(strict_types=1);

namespace LearningTopics\Domain\Value;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid;

final readonly class Uuid7
{
    private function __construct(
        public string $value
    )
    {
    }

    public static function create(): self
    {
        return new self(Uuid::uuid7()->toString());
    }

    public static function fromString(string $ulid): self
    {
        if (!Uuid::isValid($ulid)) {
            throw new InvalidArgumentException('Invalid ULID');
        }
        return new self($ulid);
    }
}
