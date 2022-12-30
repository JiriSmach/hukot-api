<?php declare(strict_types=1);

namespace JiriSmach\Tests\HukotApi;

use PHPUnit\Framework\TestCase;
use JiriSmach\HukotApi\Email;
use GuzzleHttp\Exception\ClientException;

class EmailTest extends TestCase
{
    public function testListEmails()
    {
        $email = new Email('abcd');
        $this->expectException(ClientException::class);
        $email->listEmails();
    }
}
