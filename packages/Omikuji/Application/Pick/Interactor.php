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
        return new Output($fortune);
    }

}