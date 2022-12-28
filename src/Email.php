<?php declare(strict_types = 1);

namespace JiriSmach\HukotApi;

use JiriSmach\HukotApi\Email\Alias;
use JiriSmach\HukotApi\Email\EmailInterface;
use JiriSmach\HukotApi\Email\Mailbox;

class Email
{
    private string $apiToken;

    public function __construct(
        string $apiToken
    ) {
        $this->apiToken = $apiToken;

    }

    public function listEmails(): array
    {
        $connection = new Connection($this->apiToken, 'emails');
        //https://api.hukot.net/rest/%api-token%/emails?[page=%pageNumber%]
        //type "get"
        return [];
    }

    /**
     * @param string $email
     * @return EmailInterface
     */
    public function getInfoAboutEmail(string $email): EmailInterface
    {
        $connection = new Connection($this->apiToken, 'email');
        //https://api.hukot.net/rest/%api-token%/email/
        //type "get"

        $response = [];

        $emailInterface = match ($response['type']) {
            EmailInterface::TYPE_MAILBOX => new Mailbox(),
            EmailInterface::TYPE_ALIAS => new Alias(),
        };

        $emailInterface->setName($email);

        return $emailInterface;
    }

    public function deleteMailboxOrAlias(string $email): void
    {
        $connection = new Connection($this->apiToken, 'email');
        //https://api.hukot.net/rest/%api-token%/email/
        //type "delete"
    }

    /**
     * @param EmailInterface $emailInterface
     */
    public function editMailboxOrAlias(EmailInterface $emailInterfaces): void
    {
        $connection = new Connection($this->apiToken, 'email');
        //https://api.hukot.net/rest/%api-token%/email/
        //type PUT
        //head "Content-Type:application/x-www-form-urlencoded" -d "autoresponder=1"
    }

    /**
     * @param Mailbox $mailbox
     */
    public function createMailbox(Mailbox $mailbox): void
    {
        $connection = new Connection($this->apiToken, 'email');
        //https://api.hukot.net/rest/%api-token%/email/
        //type PUT
        //head Content-Type:application/x-www-form-urlencoded" -d "autoresponder=1"
    }

    /**
     * @param Alias $alias
     */
    public function createAlias(Alias $alias): void
    {
        $connection = new Connection($this->apiToken, 'email');j
        //https://api.hukot.net/rest/%api-token%/email/
        //type PUT
        //head Content-Type:application/x-www-form-urlencoded" -d "autoresponder=1"
    }
}
