<?php
declare(strict_types=1);

namespace Packages\Omikuji\Domain\Value;

readonly final class DonationAmount
{
    private function __construct(
        public int $value,
    )
    {
    }

    public function create(int $amount): self
    {
        return new self($amount);
    }
}