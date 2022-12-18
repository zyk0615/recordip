<?php

namespace ZYKUtil\RecordIp\Factory;

use Illuminate\Support\Carbon;
use ZYKUtil\RecordIp\DBTrait;

abstract class AbstractRecordIp
{
    use DBTrait;

    protected string|int $type;

    public function __construct()
    {
        $this->connection = config('recordip.connection');
        $this->table = config('recordip.default_table');
    }

    /**
     * @param int | string $type
     * @return AbstractRecordIp
     */
    public function setType(int|string $type): static
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Save IP Info
     *
     * @param int $status
     * @param null $message
     *
     * @return bool
     */
    public function save(int $status, $message = null): bool
    {
        $ipInfo = new IpInfo();
        return $this->getDBQuery()->insert(
            [
                'type' => $this->type,
                'status' => $status,
                'ip' => $ipInfo->ip,
                'device' => $ipInfo->device,
                'device_type' => $ipInfo->deviceType,
                'platform' => $ipInfo->platform,
                'platform_version' => $ipInfo->platformVersion,
                'browser' => $ipInfo->browser,
                'browser_version' => $ipInfo->browserVersion,
                'message' => $message,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
    }
}
