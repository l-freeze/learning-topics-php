<?php
declare(strict_types=1);

namespace LearningTopics;

use Packages\Omikuji\Application\Pick;

final class Entry
{
    public function __invoke(): void
    {
        $result = (new Pick\Interactor)->execute(
            new Pick\Input(
                donationAmount: 1000
            )
        );
        echo $result->fortune->getType()->jp() . PHP_EOL;
    }
}