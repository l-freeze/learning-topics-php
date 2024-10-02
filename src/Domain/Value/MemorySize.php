<?php
declare(strict_types=1);

namespace LearningTopics\Domain\Value;

final readonly class MemorySize
{
    private function __construct(
        public int $value
    )
    {
    }

    public static function fromByte(int $byte): self
    {
        return new self($byte);
    }

    public static function fromKB(int $kb): self
    {
        return new self($kb * 1024);
    }

    public static function fromMB(int $mb): self
    {
        return new self($mb * 1024 * 1024);
    }

    public static function fromGB(int $gb): self
    {
        return new self($gb * 1024 * 1024 * 1024);
    }


    public function toKb(): int
    {
        return $this->value * 1024;
    }

    public function toMb(): int
    {
        return $this->toKb() * 1024;
    }

    public function toGb(): int
    {
        return $this->toMb() * 1024;
    }

}
