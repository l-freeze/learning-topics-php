<?php
declare(strict_types=1);

namespace LearningTopics;

use LearningTopics\Domain\Value;

final class Entry
{
    public function __invoke(): void
    {
        // iphone16を作成
        $iphone16 = Domain\Entity\Device::create(
            name: Value\DeviceName::create('黒猫くんのiPhone 16'),
            typeName: Value\DeviceTypeName::create('iPhone 16'),
            deviceType: Value\DeviceGenre::from(2),
            memory: Value\MemorySize::fromGB(2),
            storageSize: Value\StorageSize::fromGB(512),
        );

        // iphonese4を作成
        $iphonese4 = Domain\Entity\Device::create(
            name: Value\DeviceName::create('白猫くんのiPhone SE 4'),
            typeName: Value\DeviceTypeName::create('iPhone SE4'),
            deviceType: Value\DeviceGenre::from(2),
            memory: Value\MemorySize::fromGB(4),
            storageSize: Value\StorageSize::fromGB(127),
        );

        // 空気清浄機を作成
        $airPurifier = Domain\Entity\Device::create(
            name: Value\DeviceName::create('リビング用空気清浄機'),
            typeName: Value\DeviceTypeName::create('Blueair Classic 220'),
            deviceType: Value\DeviceGenre::from(4),
            memory: Value\MemorySize::fromGB(4),
            storageSize: Value\StorageSize::fromGB(127),
        );

        print_r($iphone16->toArray());
        echo 'memory(b):', $iphone16->getMemory()->value, PHP_EOL;
        echo 'memory(kb):', $iphone16->getMemory()->toKb(), PHP_EOL;
        echo 'memory(mb):', $iphone16->getMemory()->toMb(), PHP_EOL;
        echo 'memory(gb):', $iphone16->getMemory()->toGb(), PHP_EOL;
        echo PHP_EOL;

        /**
         * ValueObjectのルールに沿わない値
         */
        // ピカソの絵

        $picture = Domain\Entity\Device::create(
            name: Value\DeviceName::create('ムンクの叫び'),
            typeName: Value\DeviceTypeName::create('パブロ・ディエゴ・ホセ・フランシスコ・デ・パウラ・ホアン・ネポムセーノ･マリーア・デ・ロス・レメディオス・クリスピン・クリスピアーノ・デ・ラ・サンディシマ・トリニダード･ルイス・イ・ピカソの絵'),
            deviceType: Value\DeviceGenre::from(5),
            memory: Value\MemorySize::fromByte(0),
            storageSize: Value\StorageSize::fromByte(0),

        );
        print_r($picture->toArray());
    }
}