<?php
declare(strict_types=1);
namespace LearningTopics;

final class Entry
{
    public function __invoke(): void
    {
        // iphone16を作成
        $iphone16 = Domain\Entity\Device::create(
            name: '黒猫くんのiPhone 16',
            typeName: 'iPhone 16',
            deviceType: 2,
            memory: 1024 * 1024 * 1024 * 16,
            storageSize: 256,
        );

        // iphonese4を作成
        $iphonese4 = Domain\Entity\Device::create(
            name: '白猫くんのiPhone SE 4',
            typeName: 'iPhone SE4',
            deviceType: 2,
            memory: 4,
            storageSize: 64,
        );

        // 空気清浄機を作成
        $airPurifier = Domain\Entity\Device::create(
            name: 'リビング用空気清浄機',
            typeName: 'Blueair Classic 220',
            deviceType: 2,
            memory: 4,
            storageSize: 64,
        );

        print_r($iphone16->toArray());
        print_r($iphonese4->toArray());
        print_r($airPurifier->toArray());
    }
}