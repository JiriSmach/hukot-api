<?php declare(strict_types=1);

namespace JiriSmach\HukotApi\Email;

abstract class AbstractEmail implements EmailInterface
{

    protected string $name;
    protected string $password;
    protected array $forwarding;
    protected bool $autoresponder;
    protected string $autoresponderSubject;
    protected string $autoresponderText;
    protected bool $antispam;
    protected bool $advancedSpamFiltering;
    protected bool $keepSpam;
    protected int $spamTreshold;
    protected int $spamHiTreshold;
    protected bool $dropHiScoringSpam;
    protected array $blacklist;
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    abstract public function getType(): int;
    public function getForwarding(): array
    {
        return $this->forwarding;
    }
    public function getAutoresponder(): bool
    {
        return $this->autoresponder;
    }
    public function getAutoresponderSubject(): string
    {
        return $this->autoresponderSubject;
    }
    public function getAutoresponderText(): string
    {
        return $this->autoresponderText;
    }
    public function getAntispam(): bool
    {
        return $this->antispam;
    }
    public function getAdvancedSpamFiltering(): bool
    {
        return $this->advancedSpamFiltering;
    }
    public function getKeepSpam(): bool
    {
        return $this->keepSpam;
    }
    public function getSpamTreshold(): int
    {
        return $this->spamTreshold;
    }
    public function getSpamHiTreshold(): int
    {
        return $this->spamHiTreshold;
    }
    public function getDropHiScoringSpam(): bool
    {
        return $this->dropHiScoringSpam;
    }
    public function getBlacklist(): array
    {
        return $this->blacklist;
    }

    protected function getJson(): string
    {
        $array = [
            'name' => $this->getName(),
            'password' => $this->getPassword(),
            'type' => $this->getType(),
            'forwarding' => $this->getForwarding(),
            'autoresponder' => $this->getAutoresponder(),
            'autoresponderSubject' => $this->getAutoresponderSubject(),
            'autoresponderText' => $this->getAutoresponderText(),
            'antispam' => $this->getAntispam(),
            'advancedSpamFiltering' => $this->getAdvancedSpamFiltering(),
            'keepSpam' => $this->getKeepSpam(),
            'spamTreshold' => $this->getSpamTreshold(),
            'spamHiTreshold' => $this->getSpamHiTreshold(),
            'dropHiScoringSpam' => $this->getDropHiScoringSpam(),
            'blacklist' => $this->getBlacklist(),
        ];

        return json_encode($array);
    }
}
