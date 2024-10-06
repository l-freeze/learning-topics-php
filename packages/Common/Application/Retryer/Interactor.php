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

                sleep($input->delaySeconds);
            }
        }

        return new Output($result);
    }
}