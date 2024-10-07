<?php
declare(strict_types=1);

namespace Packages\Common\Application\SlackNotification;

readonly final class Interactor
{
    public function execute(Input $input): Output
    {
        $payload = [
            'channel' => $input->channel,
            'username' => $input->name,
            'text' => $input->message,
            'icon_emoji' => $input->icon,
        ];

        $result = file_get_contents('https://shs.sh');

        return new Output($result);
    }
}