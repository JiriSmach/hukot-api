<?php declare(strict_types=1);

namespace JiriSmach\HukotApi;

use GuzzleHTTP\Client;
use GuzzleHttp\Psr7\Request;
use JiriSmach\HukotApi\Email\AbstractEmail;
use JiriSmach\HukotApi\Email\EmailInterface;
use Psr\Http\Message\ResponseInterface;

class Connection
{
    private string $url;
    private string $apiToken;
    private const URL = 'https://api.hukot.net/rest/%api-token%/%method%';
    public function __construct(
        string $apiToken,
        string $method
    ) {
        $this->apiToken = $apiToken;
        $this->url = strtr(self::URL, '%api-token%', $apiToken);
        $this->url = strtr($this->url, '%method%', $method);
    }

    public function put(AbstractEmail $emailInterfaces): ResponseInterface
    {
        $client = new Client();
        $request = new Request(
            'PUT',
            $this->url,
            null,
            $emailInterfaces->getJson()
        );

        return $client->send($request);
    }

    public function get(): ResponseInterface
    {
        $client = new Client();
        $request = new Request(
            'GET',
            $this->url
        );

        return $client->send($request);
    }

    public function post(AbstractEmail $emailInterfaces): ResponseInterface
    {
        $client = new Client();
        $request = new Request(
            'POST',
            $this->url,
            null,
            $emailInterfaces->getJson()
        );

        return $client->send($request);
    }

    public function delete(AbstractEmail $emailInterfaces): ResponseInterface
    {
        $client = new Client();
        $request = new Request(
            'DELETE',
            $this->url,
            null,
            $emailInterfaces->getJson()
        );

        return $client->send($request);
    }
}
