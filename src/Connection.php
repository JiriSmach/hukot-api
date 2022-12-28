<?php declare(strict_types=1);

namespace JiriSmach\HukotApi;

use GuzzleHTTP\Client;

class Connection
{
    private string $url;
    private const URL = 'https://api.hukot.net/rest/%api-token%/%method%';
    public function __construct(
        string $apiToken,
        string $method
    ) {
        $this->apiToken = $apiToken;
        $this->url = strtr(self::URL, '%api-token%', $apiToken);
        $this->url = strtr($this->url, '%method%', $method);
    }

    public function put()
    {
        $client = new Client([
            'base_uri'=> $this->url,
            'timeout' => 2.0
        ]);
        return $client->request('PUT', 'ip');
    }

    public function get()
    {
        $client = new Client([
            'base_uri'=> $this->url,
            'timeout' => 2.0
        ]);
        return $client->request('GET', 'ip');
    }

    public function post()
    {
        $client = new Client([
            'base_uri'=> $this->url,
            'timeout' => 2.0
        ]);
        return $client->request('POST', 'ip');
    }

    public function delete()
    {
        $client = new Client([
            'base_uri'=> $this->url,
            'timeout' => 2.0
        ]);
        return $client->request('DELETE', 'ip');
    
    }
}
