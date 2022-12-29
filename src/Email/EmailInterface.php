<?php declare(strict_types=1);

namespace JiriSmach\HukotApi\Email;

interface EmailInterface
{
    const TYPE_MAILBOX = 1,
        TYPE_ALIAS = 2;
    public function getName(): string;
    public function getPassword(): string;
    public function getType(): int;
    public function getForwarding(): array;
    public function getAutoresponder(): bool;
    public function getAutoresponderSubject(): string;
    public function getAutoresponderText(): string;
    public function getAntispam(): bool;
    public function getAdvancedSpamFiltering(): bool;
    public function getKeepSpam(): bool;
    public function getSpamTreshold(): int;
    public function getSpamHiTreshold(): int;
    public function getDropHiScoringSpam(): bool;
    public function getBlacklist(): array;

}
