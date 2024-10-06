<?php
declare(strict_types=1);

namespace Packages\Omikuji\Domain\Entity;

use Packages\Omikuji\Domain\Exception\EvenSecondException;
use Packages\Omikuji\Domain\Exception\NotEnoughMoneyException;
use Packages\Omikuji\Domain\Value\FortuneType;

class Fortune
{
    private function __construct(
        private FortuneType $fortune,
    )
    {
    }

    public function getType(): FortuneType
    {
        return $this->fortune;
    }

    public static function pick(int $amount): self
    {
        if ($amount < 100) {
            throw new NotEnoughMoneyException($amount);
        }

        $currentSecond = (int)date('s');
        if ($currentSecond % 2 === 0) {
            throw new EvenSecondException($currentSecond);
        }

        $randomFortune = FortuneType::cases()[array_rand(FortuneType::cases())];
        return new self($randomFortune);
    }

    public static function restore(FortuneType $fortuneType): Fortune
    {
        return new self($fortuneType);
    }
}