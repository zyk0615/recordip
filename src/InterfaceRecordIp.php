<?php

namespace ZYKUtil\RecordIp;


interface InterfaceRecordIp
{
    public function setActor($type);

    public function getActor();

    /**
     * Record when success
     *
     * @param null $message
     *
     * @return mixed
     */
    public function success($message = null): mixed;

    /**
     * Record when failed
     *
     * @param null $message
     *
     * @return mixed
     */
    public function fail($message = null): mixed;
}
