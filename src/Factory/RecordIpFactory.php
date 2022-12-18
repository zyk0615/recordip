<?php

namespace ZYKUtil\RecordIp\Factory;

use ZYKUtil\RecordIp\Exceptions\TypeErrorException;
use Illuminate\Support\Arr;

class RecordIpFactory
{

    /**
     * @param int|string $type
     *
     * @return AbstractRecordIp
     * @throws TypeErrorException
     */
    public static function create(int|string $type): AbstractRecordIp
    {
        if (is_null($type)) {
            throw new TypeErrorException('actor type undefined.');
        }

        $types = config('recordip.types');

        if (!Arr::has($types, $type)) {
            throw new TypeErrorException();
        }

        return app($types[$type]);
    }
}
