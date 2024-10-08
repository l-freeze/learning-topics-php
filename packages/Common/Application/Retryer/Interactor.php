<?php
declare(strict_types=1);

namespace Packages\Common\Application\Retryer;

use Throwable;

readonly final class Interactor
{
    public function execute(Input $input): Output
    {
        $attempts = 0;
        $result = null;

        while ($attempts < $input->maxAttempts) {
            try {
                $result = ($input->closure)();
                break;
            } catch (Throwable $e) {
                $attempts++;

                if (!is_null($input->onFailure)) {
                    ($input->onFailure)($e);
                }

                if ($attempts >= $input->maxAttempts) {
                    if (!is_null($input->recovery)) {
                        $result = ($input->recovery)($e);
                    } else {
                        throw $e;
                    }
                }

                self::caringSleep($input->delaySeconds);
            }
        }

        return new Output($result);
    }

    private static function caringSleep(float $seconds): void
    {
        $wholeSeconds = (int)$seconds;
        $fractionalSeconds = $seconds - $wholeSeconds;

        if ($wholeSeconds > 0) {
            sleep($wholeSeconds);
        }

        if ($fractionalSeconds > 0) {
            usleep((int)($fractionalSeconds * 1_000_000));
        }
    }
}