<?php declare(strict_types=1);

namespace JiriSmach\HukotApi;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use JiriSmach\HukotApi\Email\AbstractEmail;
use Psr\Http\Message\ResponseInterface;

class Connection
{
    private string $url;
    private string $apiToken;
    private array $urlParams = [];
    private const URL = 'https://api.hukot.net/rest/%api-token%/%method%';

    public function __construct(
        string $apiToken,
        string $method
    ) {
        $this->apiToken = $apiToken;
        $this->url = str_replace('%api-token%', $apiToken, self::URL);
        $this->url = str_replace('%method%', $method, $this->url);
    }

    /**
     * @param AbstractEmail $emailInterfaces
     * @return ResponseInterface
     * @throws ClientException
     * @throws ServerException
     */
    public function putRequest(AbstractEmail $emailInterfaces): ResponseInterface
    {
        $client = new Client();
        $request = new Request(
            'PUT',
            $this->getUrl(),
            null,
            $emailInterfaces->getJson()
        );

        return $client->send($request);
    }

    /**
     * @return ResponseInterface
     * @throws ClientException
     * @throws ServerException
     */
    public function getRequest(): ResponseInterface
    {
        $client = new Client();
        $request = new Request(
            'GET',
            $this->getUrl(),
        );

        return $client->send($request);
    }

    public function postRequest(AbstractEmail $emailInterfaces): ResponseInterface
    {
        $client = new Client();
        $request = new Request(
            'POST',
            $this->getUrl(),
            null,
            $emailInterfaces->getJson()
        );

        return $client->send($request);
    }

    /**
     * @param AbstractEmail $emailInterfaces
     * @return ResponseInterface
     * @throws ClientException
     * @throws ServerException
     */
    public function deleteRequest(AbstractEmail $emailInterfaces): ResponseInterface
    {
        $client = new Client();
        $request = new Request(
            'DELETE',
            $this->getUrl(),
            null,
            $emailInterfaces->getJson()
        );

        return $client->send($request);
    }

    /**
     * @param array $urlParams
     * @return void
     */
    public function setUrlParams(array $urlParams): void
    {
        $this->urlParams = $urlParams;
    }

    /**
     * @return string
     */
    private function getUrl(): string
    {
        $url_parts = parse_url($this->url);
        if (isset($url_parts['query'])) {
            parse_str($url_parts['query'], $this->urlParams);
        }

        $url_parts['query'] = http_build_query($this->urlParams);

        return $url_parts['scheme'] . '://' . $url_parts['host'] . $url_parts['path'] . '?' . $url_parts['query'];
    }
}
