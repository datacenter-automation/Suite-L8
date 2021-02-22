<?php

namespace App\Libraries\NetworkingTools;

/**
 * Wake On Lan command send from PHP
 */
class WakeOnLan
{

    /**
     * @var string|array
     */
    private string|array $macAddr;

    /**
     * @var string
     */
    private string $broadcast;

    /**
     * @param string|null $mac
     * @param string|null $addr
     *
     * @throws \Exception
     */
    function __construct(public ?string $mac, public ?string $addr)
    {
        $this->setMacAddr(is_null($mac) ? '00:00:00:00:00:00' : $mac);
        $this->setBroadCast(is_null($addr) ? '255.255.255.255' : $addr);
    }

    /**
     * @param string $mac
     *
     * @throws \Exception
     */
    public function setMacAddr(string $mac)
    {
        $macFix = str_replace('-', ':', $mac);
        $macAddr = str_replace(':', '', $macFix);

        if (! ctype_xdigit($macAddr)) {
            throw new \Exception('Mac Address Invalid');
        }

        $this->macAddr = $macFix;
    }

    /**
     * @param string $broadcast
     */
    public function setBroadCast(string $broadcast)
    {
        $this->broadcast = $broadcast;
    }

    /**
     * @return string
     */
    public function WakeUp(): string
    {
        $ret = 'Return';
        $macAddr = str_replace(':', '', $this->macAddr);
        $macBinary = pack('H12', $macAddr);
        $magicPacket = str_repeat(chr(0xff), 6) . str_repeat($macBinary, 16);

        $host = escapeshellcmd($this->broadcast);
        // Exec string for Windows-based systems.
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $this->WakeUpWin($magicPacket);
            $ret .= ' Form Win';
        } else {
            $this->WakeUpNix($magicPacket);
            $ret .= ' Form Linux';
        }

        return 'awake';
    }

    /**
     * @param $magicPacket
     */
    private function WakeUpNix($magicPacket)
    {
        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        if ($sock) {
            $level = SOL_SOCKET; // to enable manipulation of options at the socket level (you may have to change this to 1)
            $optname = SO_BROADCAST; // to enable permission to transmit broadcast datagrams on the socket (you may have to change this to 6)
            $options = socket_set_option($sock, $level, $optname, true);
            // $options = socket_set_option($sock, 1, 6, true);
            // echo $options;
            if ($options >= 0) {
                $send_packet = socket_sendto($sock, $magicPacket, strlen($magicPacket), 0, $this->broadcast, 7);
                if (! $send_packet) {
                    echo socket_strerror(socket_last_error($sock));
                }
                socket_close($sock);
            }
        } else {
            echo "Socket ERROR";
        }
    }

    /**
     * @param $magicPacket
     */
    private function WakeUpWin($magicPacket)
    {
        if (! $fp = fsockopen('udp://' . $this->broadcast, 7)) {
            echo "Cannot open UDP socket";
            fclose($fp);
        }

        fwrite($fp, $magicPacket);
        fclose($fp);
    }
}
