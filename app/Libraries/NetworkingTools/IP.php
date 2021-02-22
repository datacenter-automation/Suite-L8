<?php

namespace App\Libraries\NetworkingTools;

use JetBrains\PhpStorm\Pure;

class IP
{

    use PropertyTrait;

    const IP_V4 = 'IPv4';

    const IP_V6 = 'IPv6';

    const IP_V4_MAX_PREFIX_LENGTH = 32;

    const IP_V6_MAX_PREFIX_LENGTH = 128;

    const IP_V4_OCTETS = 4;

    const IP_V6_OCTETS = 16;

    /**
     * @var false|string
     */
    private string|false $in_addr;

    private mixed $bin;

    /**
     * @param string $ip
     *
     * @throws \Exception
     */
    public function __construct(string $ip)
    {
        if (! filter_var($ip, FILTER_VALIDATE_IP)) {
            throw new \Exception("Invalid IP address format");
        }

        $this->in_addr = inet_pton($ip);
    }

    /**
     * @return false|string
     */
    public function __toString()
    {
        return inet_ntop($this->in_addr);
    }

    /**
     * @param string $ip
     *
     * @return \App\Libraries\NetworkingTools\IP
     * @throws \Exception
     */
    public static function parse(string $ip): IP
    {
        if (str_starts_with($ip, '0x')) {
            $ip = substr($ip, 2);

            return self::parseHex($ip);
        } elseif (str_starts_with($ip, '0b')) {
            $ip = substr($ip, 2);

            return self::parseBin($ip);
        } else {
            if (is_numeric($ip)) {
                return self::parseLong($ip);
            }
        }

        return new self($ip);
    }

    /**
     * @param string $binIP
     *
     * @return \App\Libraries\NetworkingTools\IP
     * @throws \Exception
     */
    public static function parseBin(string $binIP): IP
    {
        if (! preg_match('/^([0-1]{32}|[0-1]{128})$/', $binIP)) {
            throw new \Exception("Invalid binary IP address format");
        }

        $in_addr = '';
        foreach (array_map('bindec', str_split($binIP, 8)) as $char) {
            $in_addr .= pack('C*', $char);
        }

        return new self(inet_ntop($in_addr));
    }

    /**
     * @param string $hexIP
     *
     * @return \App\Libraries\NetworkingTools\IP
     * @throws \Exception
     */
    public static function parseHex(string $hexIP): IP
    {
        if (! preg_match('/^([0-9a-fA-F]{8}|[0-9a-fA-F]{32})$/', $hexIP)) {
            throw new \Exception("Invalid hexadecimal IP address format");
        }

        return new self(inet_ntop(pack('H*', $hexIP)));
    }

    /**
     * @param string $longIP
     * @param string $version
     *
     * @return \App\Libraries\NetworkingTools\IP
     * @throws \Exception
     */
    public static function parseLong(string $longIP, string $version = self::IP_V4): IP
    {
        if ($version === self::IP_V4) {
            $ip = new self(long2ip($longIP));
        } else {
            $binary = [];

            for ($i = 0; $i < self::IP_V6_OCTETS; $i ++) {
                $binary[] = bcmod($longIP, 256);
                $longIP = bcdiv($longIP, 256, 0);
            }

            $ip = new self(inet_ntop(call_user_func_array('pack', array_merge(['C*'], array_reverse($binary)))));
        }

        return $ip;
    }

    /**
     * @param string $inAddr
     *
     * @return \App\Libraries\NetworkingTools\IP
     * @throws \Exception
     */
    public static function parseInAddr(string $inAddr): IP
    {
        return new self(inet_ntop($inAddr));
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        $version = '';

        if (filter_var(inet_ntop($this->in_addr), FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $version = self::IP_V4;
        } elseif (filter_var(inet_ntop($this->in_addr), FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $version = self::IP_V6;
        }

        return $version;
    }

    /**
     * @return int
     */
    #[Pure] public function getMaxPrefixLength(): int
    {
        return $this->getVersion() === self::IP_V4 ? self::IP_V4_MAX_PREFIX_LENGTH : self::IP_V6_MAX_PREFIX_LENGTH;
    }

    /**
     * @return int
     */
    #[Pure] public function getOctetsCount(): int
    {
        return $this->getVersion() === self::IP_V4 ? self::IP_V4_OCTETS : self::IP_V6_OCTETS;
    }

    /**
     * @return string
     */
    #[Pure] public function getReversePointer(): string
    {
        $reversePointer = '';

        if ($this->getVersion() === self::IP_V4) {
            $reverseOctets = array_reverse(explode('.', $this->__toString()));

            $reversePointer = implode('.', $reverseOctets) . '.in-addr.arpa';
        } else {
            $unpacked = unpack('H*hex', $this->in_addr);

            $reverseOctets = array_reverse(str_split($unpacked['hex']));

            $reversePointer = implode('.', $reverseOctets) . '.ip6.arpa';
        }

        return $reversePointer;
    }

    /**
     * @return bool|string
     */
    public function inAddr(): bool|string
    {
        return $this->in_addr;
    }

    /**
     * @return string
     */
    public function getBin(): string
    {
        $binary = [];

        foreach (unpack('C*', $this->in_addr) as $char) {
            $binary[] = str_pad(decbin($char), 8, '0', STR_PAD_LEFT);
        }

        return implode($binary);
    }

    /**
     * @return string
     */
    #[Pure] public function getHex(): string
    {
        return bin2hex($this->in_addr);
    }

    /**
     * @return int|string
     */
    #[Pure] public function getLong(): int|string
    {
        $long = 0;
        if ($this->getVersion() === self::IP_V4) {
            $long = ip2long(inet_ntop($this->in_addr));
        } else {
            $octet = self::IP_V6_OCTETS - 1;

            foreach ($chars = unpack('C*', $this->in_addr) as $char) {
                $long = bcadd($long, bcmul($char, bcpow(256, $octet --)));
            }
        }

        return $long;
    }

    /**
     * @param int $to
     *
     * @return \App\Libraries\NetworkingTools\IP
     * @throws \Exception
     */
    public function next(int $to = 1): IP
    {
        if ($to < 0) {
            throw new \Exception("Number must be greater than 0");
        }

        $unpacked = unpack('C*', $this->in_addr);

        for ($i = 0; $i < $to; $i ++) {
            for ($byte = count($unpacked); $byte >= 0; -- $byte) {
                if ($unpacked[$byte] < 255) {
                    $unpacked[$byte] ++;
                    break;
                } else {
                    $unpacked[$byte] = 0;
                }
            }
        }

        return new self(inet_ntop(call_user_func_array('pack', array_merge(['C*'], $unpacked))));
    }

    /**
     * @param int $to
     *
     * @return \App\Libraries\NetworkingTools\IP
     * @throws \Exception
     */
    public function prev(int $to = 1): IP
    {

        if ($to < 0) {
            throw new \Exception("Number must be greater than 0");
        }

        $unpacked = unpack('C*', $this->in_addr);

        for ($i = 0; $i < $to; $i ++) {
            for ($byte = count($unpacked); $byte >= 0; -- $byte) {
                if ($unpacked[$byte] == 0) {
                    $unpacked[$byte] = 255;
                } else {
                    $unpacked[$byte] --;
                    break;
                }
            }
        }

        return new self(inet_ntop(call_user_func_array('pack', array_merge(['C*'], $unpacked))));
    }
}
