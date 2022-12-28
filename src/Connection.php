<?php declare(strict_types=1);

namespace JiriSmach\HukotApi;

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
}
