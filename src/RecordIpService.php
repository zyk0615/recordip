<?php


namespace ZYKUtil\RecordIp;

use ZYKUtil\RecordIp\Enum\StatusTypeEnum;
use ZYKUtil\RecordIp\Exceptions\TypeErrorException;
use ZYKUtil\RecordIp\Factory\RecordIpFactory;

class RecordIpService
{
    protected $actorType;

    public function setActor($type): static
    {
        $this->actorType = $type;
        return $this;
    }

    public function getActor()
    {
        return $this->actorType;
    }

    /**
     * Record when success
     *
     * @param null $message
     *
     * @return bool
     * @throws TypeErrorException
     */
    public function success($message = null): bool
    {
        $actor = RecordIpFactory::create($this->actorType);
        return $actor->save(StatusTypeEnum::SUCCESS, $message);
    }

    /**
     * Record when failed
     *
     * @param null $message
     *
     * @return bool
     * @throws TypeErrorException
     */
    public function fail($message = null): bool
    {
        $actor = RecordIpFactory::create($this->actorType);
        return $actor->save(StatusTypeEnum::FAIL, $message);
    }
}
