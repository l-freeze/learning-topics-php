<?php
declare(strict_types=1);
namespace LearningTopics\Domain\Entity;
use Ramsey\Uuid\Uuid;
final class Device
{
    private const DEVICE_TYPE_PHONE = 1;
    private const DEVICE_TYPE_MOBILE_PHONE = 2;
    private const DEVICE_TYPE_GAME = 3;

    private function __construct(
        private string $uuid,
        private string $name,
        private string $typeName,
        private int    $deviceType,
        private int    $memory,
        private int    $storageSize,
    )
    {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTypeName(): string
    {
        return $this->typeName;
    }

    public function getDeviceType(): int
    {
        return $this->deviceType;
    }

    public function isMobilePhone(): bool
    {
        return $this->deviceType === self::DEVICE_TYPE_MOBILE_PHONE;
    }

    public function getMemory(): int
    {
        return $this->memory;
    }

    public function getStorageSize(): int
    {
        return $this->storageSize;
    }

    public function toArray(): array
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'typeName' => $this->typeName,
            'deviceType' => $this->deviceType,
            'memory' => $this->memory,
            'storageSize' => $this->storageSize,
        ];
    }

    public static function create(
        string $name,
        string $typeName,
        int $deviceType,
        int $memory,
        int $storageSize,
    ): self
    {
        return new self(
            uuid: Uuid::uuid7()->toString(),
            name: $name,
            typeName: $typeName,
            deviceType: $deviceType,
            memory: $memory,
            storageSize: $storageSize,
        );
    }
}