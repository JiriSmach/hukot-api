<?php declare(strict_types=1);

namespace JiriSmach\HukotApi;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use JiriSmach\HukotApi\Email\Alias;
use JiriSmach\HukotApi\Email\BaseEmail;
use JiriSmach\HukotApi\Email\EmailInterface;
use JiriSmach\HukotApi\Email\Mailbox;
use UnhandledMatchError;

class Email
{
    private string $apiToken;

    public function __construct(
        string $apiToken
    ) {
        $this->apiToken = $apiToken;

    }

    /**
     * @param array $array
     * @return EmailInterface
     * @throws UnhandledMatchError
     */
    private function createEntityFromArray(array $array): EmailInterface
    {
        $emailInterface = match ($array['type']) {
            EmailInterface::TYPE_MAILBOX => new Mailbox(),
            EmailInterface::TYPE_ALIAS => new Alias(),
        };

        $emailInterface->setName($array['email']);
        $emailInterface->setForwarding($array['forwarding']);
        $emailInterface->setAutoresponder($array['autoresponder']);
        $emailInterface->setAutoresponderSubject($array['autoresponderSubject']);
        $emailInterface->setAutoresponderText($array['autoresponderText']);
        $emailInterface->setAntispam($array['antispam']);
        $emailInterface->setAdvancedSpamFiltering($array['advancedSpamFiltering']);
        $emailInterface->setKeepSpam($array['keepSpam']);
        $emailInterface->setSpamTreshold($array['spamTreshold']);
        $emailInterface->setSpamHiTreshold($array['spamHiTreshold']);
        $emailInterface->setDropHiScoringSpam($array['dropHiScoringSpam']);
        $emailInterface->setBlacklist($array['blacklist']);

        return $emailInterface;
    }


    /**
     * @param int $pageNumber
     * @return array
     * @throws ClientException
     * @throws ServerException
     * @throws UnhandledMatchError
     */
    public function listEmails(int $pageNumber = 0): array
    {
        $connection = new Connection($this->apiToken, 'emails');
        $connection->setUrlParams(['page' => $pageNumber]);
        $responses = $connection->get()->getBody()->getContents();

        $emailInterface = [];
        foreach ($responses as $response) {
            $emailInterface[] = $this->createEntityFromArray($response);
        }

        return $emailInterface;
    }

    /**
     * @param string $email
     * @return EmailInterface
     * @throws ClientException
     * @throws ServerException
     * @throws UnhandledMatchError
     */
    public function getInfoAboutEmail(string $email): EmailInterface
    {
        $connection = new Connection($this->apiToken, 'email');
        $response = $connection->get()->getBody()->getContents();

        return $this->createEntityFromArray($response);
    }

    /**
     * @param string $email
     * @return void
     * @throws ClientException
     * @throws ServerException
     */
    public function deleteMailboxOrAlias(string $email): void
    {
        $connection = new Connection($this->apiToken, 'email');
        $baseMail = new BaseEmail();
        $baseMail->setName($email);
        $connection->delete($baseMail);
        //https://api.hukot.net/rest/%api-token%/email/
        //type "delete"
    }

    /**
     * @param EmailInterface $emailInterface
     * @throws ClientException
     * @throws ServerException
     */
    public function editMailboxOrAlias(EmailInterface $emailInterfaces): void
    {
        $connection = new Connection($this->apiToken, 'email');
        $connection->put($emailInterfaces);
        //https://api.hukot.net/rest/%api-token%/email/
        //type PUT
        //head "Content-Type:application/x-www-form-urlencoded" -d "autoresponder=1"
    }

    /**
     * @param Mailbox $mailbox
     * @throws ClientException
     * @throws ServerException
     */
    public function createMailbox(Mailbox $mailbox): void
    {
        $connection = new Connection($this->apiToken, 'email');
        $connection->put($mailbox);
        //https://api.hukot.net/rest/%api-token%/email/
        //type PUT
        //head Content-Type:application/x-www-form-urlencoded" -d "autoresponder=1"
    }

    /**
     * @param Alias $alias
     * @throws ClientException
     * @throws ServerException
     */
    public function createAlias(Alias $alias): void
    {
        $connection = new Connection($this->apiToken, 'email');
        $connection->put($alias);
        //https://api.hukot.net/rest/%api-token%/email/
        //type PUT
        //head Content-Type:application/x-www-form-urlencoded" -d "autoresponder=1"
    }
}
