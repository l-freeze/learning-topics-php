<?php
declare(strict_types=1);

namespace Packages\Common\Application\SlackNotification;

readonly final class Output
{
    public function __construct(
        public string $result,
    )
    {
    }
}