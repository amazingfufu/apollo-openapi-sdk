<?php

namespace OrderHandler\ApolloOpenApi;

/**
 * Class Configure
 * @package OrderHandler\ApolloOpenApi
 */
class Configure
{

    private $defaultConfig = [

        'PortalAddress' => '',

        'Authorization' => '',

        'Logger' => \OrderHandler\ApolloOpenApi\Logger\NoOutputLogger::class,

    ];

    public static $_instance;

    private $config = [];

    private function __construct($config)
    {
        $this->config = array_merge($this->defaultConfig, $config);
    }

    private function __clone()
    {

    }

    public static function getInstance($config)
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }

    public function getPortalAddress()
    {
        return $this->config['PortalAddress'];
    }

    public function getAuthorization()
    {
        return $this->config['Authorization'];
    }

    public function getLogger(){
        return new $this->config['Logger'];
    }
}

