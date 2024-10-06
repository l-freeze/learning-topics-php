<?php
declare(strict_types=1);

namespace Packages\Omikuji\Domain\Exception;

use RuntimeException;

class NotEnoughMoneyException extends RuntimeException
{
    private const string MESSAGE = 'The donation amount is not enough: ';

    public function __construct(int $value)
    {
        parent::__construct(self::MESSAGE . $value);
    }
}