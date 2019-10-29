<?php

namespace Rancher\Model;

use \ArrayAccess;

class HostAlias implements ArrayAccess
{
    /**
     * Container with all data
     *
     * @var array
     */
    protected $container = [];

    protected static $typeMap = [
        'hostnames' => 'string[]',
        'ip' => 'string',
    ];

    public static function typeMap()
    {
        return self::$typeMap;
    }

    protected static $setters = [
        'hostnames' => 'setHostnames',
        'ip' => 'setIp',
    ];

    public static function setters()
    {
        return self::$setters;
    }

    protected static $getters = [
        'hostnames' => 'getHostnames',
        'ip' => 'getIp',
    ];

    public static function getters()
    {
        return self::$getters;
    }

    public function __construct(array $data = null)
    {
        $this->container['hostnames'] = isset($data['hostnames']) ? $data['hostnames'] : null;
        $this->container['ip'] = isset($data['ip']) ? $data['ip'] : null;
    }

    /**
     * Gets hostnames
     * @return string[]
     */
    public function getHostnames()
    {
        return $this->container['hostnames'];
    }

    /**
     * Sets hostnames
     * @param string[] $hostnames
     * @return $this
     */
    public function setHostnames($hostnames)
    {
        $this->container['hostnames'] = $hostnames;

        return $this;
    }


    /**
     * Gets ip
     * @return string
     */
    public function getIp()
    {
        return $this->container['ip'];
    }

    /**
     * Sets ip
     * @param string $ip
     * @return $this
     */
    public function setIp($ip)
    {
        $this->container['ip'] = $ip;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
}
