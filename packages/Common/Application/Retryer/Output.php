<?php
declare(strict_types=1);

namespace Packages\Common\Application\Retryer;

readonly final class Output
{
    public function __construct(
        public mixed $result,
    )
    {
    }
}