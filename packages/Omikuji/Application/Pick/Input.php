<?php
declare(strict_types=1);

namespace Packages\Omikuji\Application\Pick;

readonly final class Input
{
    public function __construct(
        public int $donationAmount,
    )
    {
    }
}