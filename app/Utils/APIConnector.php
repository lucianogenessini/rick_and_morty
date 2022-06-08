<?php

namespace App\Utils;


use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use HttpException;
use Illuminate\Support\Facades\Log;

class APIConnector
{
    protected static $instance;

    protected $base_url;

    public function __construct()
    {
        $this->base_url = config("app.api.url");
    }

    public static function getInstance()
    {
        return new APIConnector();
    }

    protected function apiURL($path)
    {
        if (!$this->base_url) {
            throw new HttpException(400, 'API url not defined');
        }
        return $this->base_url . $path;
    }

    protected function response(Response $response)
    {
        $result =  $response->json();
        if (config('app.debug')) {
            Log::debug(is_array($result) ? json_encode($result) : $result);
        }
        return $result;
    }

    protected function request($url, $query)
    {
        $request = Http::get($url, $query);
        return $request;
    }

    public function get($path, $query = [])
    {
        $url = $this->apiURL($path);
        $response = $this->request($url, $query);
        return $this->response($response);
    }

    public function list($path, $query = [])
    {
        $url = $this->apiURL($path);
        $response = $this->request()->get($url, $query);
        return $this->response($response);
    }
}