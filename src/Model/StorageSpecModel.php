<?php

/**
 * StorageSpecModel
 *
 * @category Class
 * @package  Rancher
 * @author   Gerb Sterrenburg @ Bumbal
 * @link     https://github.com/freightlive/rancher-php-client
 */

namespace Rancher\Model;

use \ArrayAccess;

class StorageSpecModel implements ArrayAccess
{
    /**
     * Container with all data
     *
     * @var array
     */
    protected $container = [];

    /**
     * Properties that can be created
     *
     * @var array
     */
    protected static $canBeCreated = [
        'emptyDir',
        'volumeClaimTemplate',
    ];

    public static function canBeCreated()
    {
        return self::$canBeCreated;
    }

    /**
     * Properties that can be updated
     *
     * @var array
     */
    protected static $canBeUpdated = [
        'emptyDir',
        'volumeClaimTemplate',
    ];

    public static function canBeUpdated()
    {
        return self::$canBeUpdated;
    }

    protected static $typeMap = [
        'emptyDir' => '\Rancher\Model\EmptyDirVolumeSourceModel',
        'volumeClaimTemplate' => '\Rancher\Model\PersistentVolumeClaimModel',
    ];

    public static function typeMap()
    {
        return self::$typeMap;
    }

    protected static $setters = [
        'emptyDir' => 'setEmptyDir',
        'volumeClaimTemplate' => 'setVolumeClaimTemplate',
    ];

    public static function setters()
    {
        return self::$setters;
    }

    protected static $getters = [
        'emptyDir' => 'getEmptyDir',
        'volumeClaimTemplate' => 'getVolumeClaimTemplate',
    ];

    public static function getters()
    {
        return self::$getters;
    }

    public function __construct(array $data = null)
    {
        $this->container['emptyDir'] = isset($data['emptyDir']) ? $data['emptyDir'] : null;
        $this->container['volumeClaimTemplate'] = isset($data['volumeClaimTemplate']) ? $data['volumeClaimTemplate'] : null;
    }

    /**
     * Gets emptyDir
     * @return \Rancher\Model\EmptyDirVolumeSourceModel
     */
    public function getEmptyDir()
    {
        return $this->container['emptyDir'];
    }

    /**
     * Sets emptyDir
     * @param \Rancher\Model\EmptyDirVolumeSourceModel $emptyDir
     * @return $this
     */
    public function setEmptyDir($emptyDir)
    {
        $this->container['emptyDir'] = $emptyDir;

        return $this;
    }


    /**
     * Gets volumeClaimTemplate
     * @return \Rancher\Model\PersistentVolumeClaimModel
     */
    public function getVolumeClaimTemplate()
    {
        return $this->container['volumeClaimTemplate'];
    }

    /**
     * Sets volumeClaimTemplate
     * @param \Rancher\Model\PersistentVolumeClaimModel $volumeClaimTemplate
     * @return $this
     */
    public function setVolumeClaimTemplate($volumeClaimTemplate)
    {
        $this->container['volumeClaimTemplate'] = $volumeClaimTemplate;

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

