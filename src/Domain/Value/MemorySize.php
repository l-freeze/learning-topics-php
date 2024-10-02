<?php
declare(strict_types=1);

namespace LearningTopics\Domain\Value;

final readonly class MemorySize
{
    private function __construct(
        public float $value
    )
    {
    }

    public static function fromByte(float $byte): self
    {
        return new self($byte);
    }

    public static function fromKB(float $kb): self
    {
        return self::fromByte($kb * 1024);
    }

    public static function fromMB(float $mb): self
    {
        return self::fromKB($mb * 1024);
    }

    public static function fromGB(float $gb): self
    {
        return self::fromMB($gb * 1024);
    }


    public function toKb(): float
    {
        return $this->value / 1024;
    }

    public function toMb(): float
    {
        return $this->toKb() / 1024;
    }

    public function toGb(): float
    {
        return $this->toMb() / 1024;
    }

}
