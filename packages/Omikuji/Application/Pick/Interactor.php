<?php
declare(strict_types=1);

namespace Packages\Omikuji\Application\Pick;

use Packages\Common\Application\Retryer;
use Packages\Omikuji\Domain\Entity\Fortune;
use Packages\Omikuji\Domain\Exception\EvenSecondException;
use Packages\Omikuji\Domain\Value\FortuneType;
use Throwable;

readonly final class Interactor
{
    public function execute(Input $input): Output
    {
        $shs1 = (new \Packages\Common\Application\SlackNotification\Interactor())->execute(
            new \Packages\Common\Application\SlackNotification\Input(
                incomingHookUrl: 'https://hooks.slack.com/services/ただしいURL',
                channel: '#information',
                name: 'おみくじ',
                message: 'おみくじを引きます。',
                icon: ':github:',
            )
        );
        print_r($shs1);


        $fortune = (new Retryer\Interactor)->execute(
            new Retryer\Input(
                closure: function () use ($input) {
                    return Fortune::pick($input->donationAmount);
                },
                maxAttempts: 3,
                delaySeconds: 2,
                onFailure: function (Throwable $e) {
                    if ($e instanceof EvenSecondException) {
                        echo '偶数秒でした。リトライします。' . PHP_EOL;
                        echo $e->getMessage() . PHP_EOL;
                        echo PHP_EOL;
                    }
                },
                recovery: fn() => Fortune::restore(FortuneType::Daikyo)
            )
        )->result;

        $shs2 = (new \Packages\Common\Application\SlackNotification\Interactor())->execute(
            new \Packages\Common\Application\SlackNotification\Input(
                incomingHookUrl: 'https://hooks.slack.com/services/ただしいURL',
                channel: '#information',
                name: 'おみくじ',
                message: 'おみくじを引きます。',
                icon: ':github:',
            )
        );
        print_r($shs2);

        return new Output($fortune);
    }

}