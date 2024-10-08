<?php
declare(strict_types=1);

namespace Packages\Common\Application\Retryer;

use Closure;

readonly final class Input
{
    public function __construct(
        public Closure  $closure, //処理の実態
        public int      $maxAttempts, //最大試行回数
        public float    $delaySeconds,  // リトライまでの待機時間(秒)
        public ?Closure $onFailure,  // 失敗時の処理、不要な場合はnull
        public ?Closure $recovery,  // 最大試行回数を超えた場合のリカバリー処理、リカバリーが不要な場合はnull
    )
    {
    }
}