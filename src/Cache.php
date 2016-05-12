<?php

namespace fgh151\tarantool;

use Tarantool\Client;
use Tarantool\Connection\SocketConnection;
use Tarantool\Packer\PurePacker;
use Tarantool\Tests\Adapter\Space;
use yii\base\InvalidConfigException;

/**
 * Class Cache
 * @package fgh151\tarantool
 *
 * @property Client $Client
 * @property Space $Space
 * @property string $SpaceName
 * @property string $Server
 * @property integer $Port
 */
class Cache extends \yii\caching\Cache
{

    public $SpaceName = 'Cache';
    public $Server = '127.0.0.1';
    public $Port = 3301;

    private $Client = null;
    private $Space = null;

    /**
     * Initializes the Cache component.
     * This method will initialize the [[db]] property to make sure it refers to a valid MongoDB connection.
     * @throws InvalidConfigException if [[db]] is invalid.
     */
    public function init()
    {
        parent::init();
        $this->Client = new Client(new SocketConnection($this->Server, $this->Port), new PurePacker());
        $this->Space = $this->Client->getSpace($this->SpaceName);
    }

    public function setValue($key, $value, $duration)
    {
        $result = $this->Space->select();
        var_dump($result->getData());


        // TODO: Implement setValue() method.
    }

    public function getValue($key)
    {
        // TODO: Implement getValue() method.
    }

    public function addValue($key, $value, $duration)
    {
        // TODO: Implement addValue() method.
    }

    public function deleteValue($key)
    {
        // TODO: Implement deleteValue() method.
    }

    public function flushValues()
    {
        // TODO: Implement flushValues() method.
    }


}