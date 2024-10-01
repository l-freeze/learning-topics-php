<?php
declare(strict_types=1);
namespace LearningTopics;

final class Entry
{
    public function __invoke(): void
    {
        echo 'Hello, World!';
    }
}