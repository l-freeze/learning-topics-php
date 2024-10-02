<?php
declare(strict_types=1);

namespace LearningTopics\Domain\Entity;

use LearningTopics\Domain\Value\DeviceGenre;
use LearningTopics\Domain\Value\DeviceName;
use LearningTopics\Domain\Value\DeviceTypeName;
use LearningTopics\Domain\Value\MemorySize;
use LearningTopics\Domain\Value\StorageSize;
use LearningTopics\Domain\Value\Uuid7;

final class Device
{
    private function __construct(
        private Uuid7          $uuid7,
        private DeviceName     $name,
        private DeviceTypeName $typeName,
        private DeviceGenre    $deviceGenre,
        private MemorySize     $memory,
        private StorageSize    $storageSize,
    )
    {
    }

    public static function create(
        DeviceName     $name,
        DeviceTypeName $typeName,
        DeviceGenre    $deviceType,
        MemorySize     $memory,
        StorageSize    $storageSize,
    ): self
    {
        return new self(
            uuid7: Uuid7::create(),
            name: $name,
            typeName: $typeName,
            deviceGenre: $deviceType,
            memory: $memory,
            storageSize: $storageSize,
        );
    }

    public function getUuid7(): Uuid7
    {
        return $this->uuid7;
    }

    public function getName(): DeviceName
    {
        return $this->name;
    }

    public function getTypeName(): DeviceTypeName
    {
        return $this->typeName;
    }

    public function getDeviceGenre(): DeviceGenre
    {
        return $this->deviceGenre;
    }

    public function getMemory(): MemorySize
    {
        return $this->memory;
    }

    public function getStorage(): StorageSize
    {
        return $this->storageSize;
    }

    public function toArray(): array
    {
        return [
            'uuid' => $this->uuid7->value,
            'name' => $this->name->value,
            'typeName' => $this->typeName->value,
            'deviceType' => $this->deviceGenre->toName(),
            'memory' => $this->memory,
            'storageSize' => $this->storageSize,
        ];
    }
}