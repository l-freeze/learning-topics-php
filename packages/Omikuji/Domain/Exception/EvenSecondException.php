<?php
declare(strict_types=1);

namespace Packages\Omikuji\Domain\Exception;

use PHPUnit\Framework\Attributes\CodeCoverageIgnore;
use RuntimeException;

/**
 * 偶数秒なのでおみくじを引くことができません
 */
#[CodeCoverageIgnore]
class EvenSecondException extends RuntimeException
{
    private const string MESSAGE = 'Cant pick omikuji because it is even second: ';

    public function __construct(int $value)
    {
        parent::__construct(self::MESSAGE . $value);
    }
}