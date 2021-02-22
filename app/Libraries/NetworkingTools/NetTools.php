<?php

namespace App\Libraries\NetworkingTools;

class NetTools
{

    /**
     * @var IP
     */
    private $ip;

    /**
     * @var IP
     */
    private $netmask;

    /**
     * @param string $ip
     * @param $netmask
     */
    public function __construct(string $ip = '127.0.0.1', string $netmask = '255.255.255.0')
    {
        $this->setIP($ip);
        $this->setNetmask($netmask);
    }

    public function setIP($ip)
    {
        $this->ip = $ip;
    }

    public function getIP()
    {
        return $this->ip;
    }

    public function setNetmask($netmask)
    {
        $this->netmask = $netmask;
    }

    public function getNetmask(): IP
    {
        return $this->netmask;
    }

    /**
     * @param \App\Libraries\NetworkingTools\IP|null $ip
     * @param int                                    $ttl
     *
     * @return \App\Libraries\NetworkingTools\Ping
     * @throws \Exception
     */
    public function ping(IP $ip = null, int $ttl = 255): Ping
    {
        if (is_null($ip)) {
            return new Ping($this->ip, $ttl = 255);
        } else {
            return new Ping($ip, $ttl = 255);
        }
    }

    /**
     * @param \App\Libraries\NetworkingTools\IP|null $ip
     * @param \App\Libraries\NetworkingTools\IP|null $netmask
     *
     * @return \App\Libraries\NetworkingTools\Network
     * @throws \Exception
     */
    public function network(IP $ip = null, IP $netmask = null): Network
    {
        if (is_null($ip)) {
            $ip = $this->ip;
        }
        if (is_null($netmask)) {
            $netmask = $this->netmask;
        }

        return new Network($ip, $netmask);
    }

    /**
     * @param null $ip
     *
     * @return \App\Libraries\NetworkingTools\IP
     * @throws \Exception
     */
    public function ip($ip = null): IP
    {
        if (is_null($ip)) {
            $ip = $this->ip;
        }

        return new IP($ip);
    }

    /**
     * @param \App\Libraries\NetworkingTools\IP $firstIP
     * @param \App\Libraries\NetworkingTools\IP $lastIP
     *
     * @return \App\Libraries\NetworkingTools\Range
     * @throws \Exception
     */
    public function range(IP $firstIP, IP $lastIP): Range
    {
        return new Range($firstIP, $lastIP);
    }

    /**
     * @param null   $mac
     * @param string $addr
     *
     * @return \App\Libraries\NetworkingTools\WakeOnLan
     * @throws \Exception
     */
    public function WakeOnLan($mac = null, string $addr = "255.255.255.255"): WakeOnLan
    {
        return new WakeOnLan($mac, $addr);
    }
}
