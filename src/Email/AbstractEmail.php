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

    public function setForwarding(array $forwarding): void
    {
        $this->forwarding = $forwarding;
    }
    public function getAutoresponder(): bool
    {
        return $this->autoresponder;
    }
    public function setAutoresponder(bool $autoresponder): void
    {
        $this->autoresponder = $autoresponder;
    }
    public function getAutoresponderSubject(): string
    {
        return $this->autoresponderSubject;
    }
    public function setAutoresponderSubject(string $autoresponderSubject): void
    {
        $this->autoresponderSubject = $autoresponderSubject;
    }
    public function getAutoresponderText(): string
    {
        return $this->autoresponderText;
    }
    public function setAutoresponderText(string $autoresponderText): void
    {
        $this->autoresponderText = $autoresponderText;
    }
    public function getAntispam(): bool
    {
        return $this->antispam;
    }
    public function setAntispam(bool $antispam): void
    {
        $this->antispam = $antispam;
    }
    public function getAdvancedSpamFiltering(): bool
    {
        return $this->advancedSpamFiltering;
    }
    public function setAdvancedSpamFiltering(bool $advancedSpamFiltering): void
    {
        $this->advancedSpamFiltering = $advancedSpamFiltering;
    }
    public function getKeepSpam(): bool
    {
        return $this->keepSpam;
    }
    public function setKeepSpam(bool $keepSpam): void
    {
        $this->keepSpam = $keepSpam;
    }
    public function getSpamTreshold(): int
    {
        return $this->spamTreshold;
    }
    public function setSpamTreshold(int $spamTreshold): void
    {
        $this->spamTreshold = $spamTreshold;
    }
    public function getSpamHiTreshold(): int
    {
        return $this->spamHiTreshold;
    }
    public function setSpamHiTreshold(int $spamHiTreshold): void
    {
        $this->spamHiTreshold = $spamHiTreshold;
    }
    public function getDropHiScoringSpam(): bool
    {
        return $this->dropHiScoringSpam;
    }
    public function setDropHiScoringSpam(bool $dropHiScoringSpam): void
    {
        $this->dropHiScoringSpam = $dropHiScoringSpam;
    }
    public function getBlacklist(): array
    {
        return $this->blacklist;
    }
    public function setBlacklist(array $blacklist): void
    {
        $this->blacklist = $blacklist;
    }

    public function getJson(): string
    {
        $array = [];
        if ($this->getName()) {
            $array['name'] = $this->getName();
        }
        if ($this->getPassword()) {
            $array['password'] = $this->getPassword();
        }
        if ($this->getType()) {
            $array['type'] = $this->getType();
        }
        if ($this->getForwarding()) {
            $array['forwarding'] = $this->getForwarding();
        }
        if ($this->getAutoresponder()) {
            $array['autoresponder'] = $this->getAutoresponder();
        }
        if ($this->getAutoresponderSubject()) {
            $array['autoresponderSubject'] = $this->getAutoresponderSubject();
        }
        if ($this->getAutoresponderText()) {
            $array['autoresponderText'] = $this->getAutoresponderText();
        }
        if ($this->getAntispam()) {
            $array['antispam'] = $this->getAntispam();
        }
        if ($this->getAdvancedSpamFiltering()) {
            $array['advancedSpamFiltering'] = $this->getAdvancedSpamFiltering();
        }
        if ($this->getKeepSpam()) {
            $array['keepSpam'] = $this->getKeepSpam();
        }
        if ($this->getSpamTreshold()) {
            $array['spamTreshold'] = $this->getSpamTreshold();
        }
        if ($this->getSpamHiTreshold()) {
            $array['spamHiTreshold'] = $this->getSpamHiTreshold();
        }
        if ($this->getDropHiScoringSpam()) {
            $array['dropHiScoringSpam'] = $this->getDropHiScoringSpam();
        }
        if ($this->getBlacklist()) {
            $array['blacklist'] = $this->getBlacklist();
        }

        return \GuzzleHttp\json_encode($array);
    }
}
