## About zykutil/record-ip

In order to create ip record.Depends on jenssegers/agent package.

## Install

```
composer require zykutil/record-ip
```

## config/app.php

providers add

```
ZYKUtil\RecordIp\RecordIpServiceProvider::class
```

alias add

```
'RecordIp' => ZYKUtil\RecordIp\RecordIpFacade::class
```

## Copy the package config to your local config with the publish command:

```
php artisan vendor:publish --tag=zykutil-recordip --ansi --force
```

## Depends on your setting in env file

```
RI_DB_CONNECTION=mysql
RI_DEFAULT_TABLE=system_request_ip_records
```

## Migrate record table

```
php artisan ri:table
```

## Create your own RecordType

```
use ZYKUtil\RecordIp\Factory\AbstractRecordIp;

class FooType extends AbstractRecordIp
{
    public function __construct()
    {
        parent::__construct();
        $this->type = 'foo';
    }
}
```

## Set Type in config file

```
'types' => [
    'foo' => FooType::class
]
```

## Simply used

```
\RecordIp::setActor('foo')->success("ask success");

\RecordIp::setActor('foo')->fail("ask fail");
```
