<?php

namespace App\Libraries\NetworkingTools;

/**
 * @author  Safarov Alisher <alisher.safarov@outlook.com>
 * @link    https://github.com/S1lentium/IPTools
 * @version 1.0
 */
class Range implements \Iterator, \Countable
{

    use PropertyTrait;

    /**
     * @var \App\Libraries\NetworkingTools\IP
     */
    private IP $firstIP;

    /**
     * @var \App\Libraries\NetworkingTools\IP
     */
    private IP $lastIP;

    /**
     * @var int
     */
    private int $position = 0;

    /**
     * @param \App\Libraries\NetworkingTools\IP $firstIP
     * @param \App\Libraries\NetworkingTools\IP $lastIP
     *
     * @throws \Exception
     */
    public function __construct(IP $firstIP, IP $lastIP)
    {
        $this->setFirstIP(new IP($firstIP));
        $this->setLastIP(new IP($lastIP));
    }

    /**
     * @param string $data
     *
     * @return \App\Libraries\NetworkingTools\Range
     * @throws \Exception
     */
    public static function parse(string $data): Range
    {
        if (strpos($data, '/') || strpos($data, ' ')) {
            $network = Network::parse($data);
            $firstIP = $network->getFirstIP();
            $lastIP = $network->getLastIP();
        } elseif (strpos($data, '*')) {
            $firstIP = IP::parse(str_replace('*', '0', $data));
            $lastIP = IP::parse(str_replace('*', '255', $data));
        } elseif (strpos($data, '-')) {
            [$first, $last] = explode('-', $data, 2);
            $firstIP = IP::parse($first);
            $lastIP = IP::parse($last);
        } else {
            $firstIP = IP::parse($data);
            $lastIP = clone $firstIP;
        }

        return new self($firstIP, $lastIP);
    }

    /**
     * @param \App\Libraries\NetworkingTools\Network|\App\Libraries\NetworkingTools\Range|\App\Libraries\NetworkingTools\IP $find
     *
     * @return bool
     * @throws \Exception
     */
    public function contains(Network|Range|IP $find): bool
    {
        if ($find instanceof IP) {
            $within = ($find->inAddr() >= $this->firstIP->inAddr()) && ($find->inAddr() <= $this->lastIP->inAddr());
        } elseif ($find instanceof Range || $find instanceof Network) {
            /**
             * @var Network|Range $find
             */
            $within = ($find->getFirstIP()->inAddr() >= $this->firstIP->inAddr()) && ($find->getLastIP()->inAddr() <= $this->lastIP->inAddr());
        } else {
            throw new \Exception('Invalid type');
        }

        return $within;
    }

    /**
     * @param \App\Libraries\NetworkingTools\IP $ip
     *
     * @throws \Exception
     */
    public function setFirstIP(IP $ip)
    {
        if ($this->lastIP && $ip->inAddr() > $this->lastIP->inAddr()) {
            throw new \Exception('First IP is grater than second');
        }

        $this->firstIP = $ip;
    }

    /**
     * @param \App\Libraries\NetworkingTools\IP $ip
     *
     * @throws \Exception
     */
    public function setLastIP(IP $ip)
    {
        if ($this->firstIP && $ip->inAddr() < $this->firstIP->inAddr()) {
            throw new \Exception('Last IP is less than first');
        }

        $this->lastIP = $ip;
    }

    /**
     * @return \App\Libraries\NetworkingTools\IP
     */
    public function getFirstIP(): IP
    {
        return $this->firstIP;
    }

    /**
     * @return \App\Libraries\NetworkingTools\IP
     */
    public function getLastIP(): IP
    {
        return $this->lastIP;
    }

    /**
     * @return array|\App\Libraries\NetworkingTools\Network[]
     * @throws \Exception
     */
    public function getNetworks(): array
    {
        $span = $this->getSpanNetwork();

        $networks = [];

        if ($span->getFirstIP()->inAddr() === $this->firstIP->inAddr() && $span->getLastIP()->inAddr() === $this->lastIP->inAddr()) {
            $networks = [$span];
        } else {
            if ($span->getFirstIP()->inAddr() !== $this->firstIP->inAddr()) {
                $excluded = $span->exclude($this->firstIP->prev());

                /**
                 * @var Network $network
                 */
                foreach ($excluded as $network) {
                    if ($network->getFirstIP()->inAddr() >= $this->firstIP->inAddr()) {
                        $networks[] = $network;
                    }
                }
            }

            if ($span->getLastIP()->inAddr() !== $this->lastIP->inAddr()) {
                if (! $networks) {
                    $excluded = $span->exclude($this->lastIP->next());
                } else {
                    $excluded = array_pop($networks);
                    $excluded = $excluded->exclude($this->lastIP->next());
                }

                foreach ($excluded as $network) {
                    $networks[] = $network;
                    if ($network->getLastIP()->inAddr() === $this->lastIP->inAddr()) {
                        break;
                    }
                }
            }
        }

        return $networks;
    }

    /**
     * @return \App\Libraries\NetworkingTools\Network
     * @throws \Exception
     */
    public function getSpanNetwork(): Network
    {
        $xorIP = IP::parseInAddr($this->getFirstIP()->inAddr() ^ $this->getLastIP()->inAddr());

        preg_match('/^(0*)/', $xorIP->toBin(), $match);

        $prefixLength = strlen($match[1]);

        $ip = IP::parseBin(str_pad(substr($this->getFirstIP()->toBin(), 0, $prefixLength), $xorIP->getMaxPrefixLength(), '0'));

        return new Network($ip, Network::prefix2netmask($prefixLength, $ip->getVersion()));
    }

    /**
     * @return \App\Libraries\NetworkingTools\IP
     * @throws \Exception
     */
    public function current(): IP
    {
        return $this->firstIP->next($this->position);
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }

    public function next()
    {
        ++ $this->position;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function valid(): bool
    {
        return $this->firstIP->next($this->position)->inAddr() <= $this->lastIP->next($this->position)->inAddr();
    }

    /**
     * @return int
     */
    public function count(): int
    {
        if ($this->firstIP->getVersion() === IP::IP_V4) {
            $count = $this->lastIP->toLong() - $this->firstIP->toLong(); //??
        } else {
            $count = bcsub($this->lastIP->toLong(), $this->firstIP->toLong());
        }

        return $count;
    }
}
