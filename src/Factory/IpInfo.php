<?php

namespace ZYKUtil\RecordIp\Factory;

use Illuminate\Support\Facades\Request;
use Jenssegers\Agent\Facades\Agent;

class IpInfo
{

    public $ip;
    public $device;
    public $deviceType;
    public $browser;
    public $browserVersion;
    public $platform;
    public $platformVersion;

    public function __construct()
    {
        $this->ip = $this->getClientIp();
        $this->device = Agent::device();
        $this->deviceType = $this->getDeviceType();
        $this->platform = Agent::platform();
        $this->platformVersion = Agent::version(Agent::platform());
        $this->browser = Agent::browser();
        $this->browserVersion = Agent::version(Agent::browser());
    }

    /**
     * Returns the client IP address.
     *
     * @return string
     */
    private function getClientIp()
    {
        $ip = Request::server('HTTP_X_FORWARDED_FOR');

        if ($ip) {
            $ips = explode(', ', $ip);
            $ip = $ips[0];
        } else {
            $ip = Request::getClientIp();
        }

        return $ip;
    }

    /**
     * 取得登入裝置種類。
     *
     * @return string
     */
    private function getDeviceType()
    {
        if (Agent::isTablet()) {
            return 'tablet';
        } else if (Agent::isMobile()) {
            return 'mobile';
        } else if (Agent::isDesktop()) {
            return 'desktop';
        } else {
            return 'unknown';
        }
    }
}
