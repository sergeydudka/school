<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.11.2018
 * Time: 19:53
 */

namespace backend\tests\common;


use crudschool\common\helpers\JSONHelper;
use GuzzleHttp\Client;

class ApiRequestAdapter {
    private $config = [];
    private $appConfig = [];
    private $appParams = [];

    private static $client = [];

    /**
     * ApiRequestAdapter constructor.
     * @param array $config
     */
    public function __construct($config = []) {
        $this->config = $config;
        $this->appConfig = $GLOBALS['config'];
        $this->appParams = $this->appConfig['params'];
    }

    /**
     * @param string $key
     * @param mixed  $value
     * @return $this
     */
    public function setConfig($key, $value) {
        $this->config[$key] = $value;
        return $this;
    }

    /**
     * @param array $configs
     * @return $this
     */
    public function setConfigs($configs) {
        foreach ($configs as $key => $value) {
            $this->setConfig($key, $value);
        }
        return $this;
    }

    /**
     * @param bool $cache
     * @return Client
     */
    private function getClient($cache) {
        if ($cache) {
            $key = md5(serialize($this->config));
            if (array_key_exists($key, self::$client)) {
                return self::$client[$key];
            }
        }
        return self::$client[$key] = $this->createClient();
    }

    /**
     * @return Client
     */
    private function createClient() {
        return new Client($this->config);
    }

    /**
     * @param string $uri
     * @param string $method
     * @param bool   $cache
     * @param array  $params
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getResponse($uri, $method = 'GET', $cache = true, $params = []) {
        return $this->getClient($cache)
                    ->request($method, $this->getBasePath() . $uri,
                        array_merge(
                            $params,
                            [
                                'query' => [
                                    'test' => true
                                ],
                                'http_errors' => false
                            ]
                        )
                    );
    }

    /**
     * @param string $uri
     * @param string $method
     * @param bool   $cache
     * @param array  $params
     * @return array|bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getJsonResponse($uri, $method = 'GET', $cache = true, $params = []) {
        return JSONHelper::parse($this->getResponse($uri, $method, $cache, $params)->getBody()->getContents());
    }

    /**
     * @return mixed|null|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function userLogout() {
        if (isset($this->appParams['logoutUrl']) && $this->appParams['logoutUrl']) {
            return $this->getResponse($this->appParams['logoutUrl'], 'GET', false);
        }
        return null;
    }

    /**
     * @return mixed|null|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function userLogin() {
        if (isset($this->appParams['loginUrl']) && $this->appParams['loginUrl']) {
            return $this->getResponse($this->appParams['loginUrl'], 'GET', false);
        }
        return null;
    }

    /**
     * @return mixed|null|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMenu() {
        if (isset($this->appParams['menu']) && $this->appParams['menu']) {
            return $this->getResponse($this->getBasePath() . $this->appParams['menu']);
        }
        return null;
    }

    /**
     * @return string
     */
    public function getBasePath() {
        return $this->appConfig['components']['request']['baseUrl'] ?? '';
    }

    public function getFullPath() {

    }
}