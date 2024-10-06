<?php
declare(strict_types=1);

namespace Packages\Omikuji\Application\Pick;

use Packages\Omikuji\Domain\Entity\Fortune;

readonly final class Output
{
    public function __construct(
        public Fortune $fortune,
    )
    {
    }
}