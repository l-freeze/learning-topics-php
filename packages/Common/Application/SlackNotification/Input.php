<?php
declare(strict_types=1);

namespace Packages\Common\Application\SlackNotification;

use SensitiveParameter;

readonly final class Input
{
    public function __construct(
        #[SensitiveParameter]
        public string $incomingHookUrl,
        public string $channel,
        public string $name,
        public string $message,
        public string $icon,
    )
    {
    }
}