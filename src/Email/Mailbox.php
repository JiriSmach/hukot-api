<?php declare(strict_types = 1);

namespace JiriSmach\HukotApi\Email;

class Mailbox extends AbstractEmail
{
    public function __construct(
    ) {
    }

    public function getType(): int
    {
        return self::TYPE_MAILBOX;
    }
}
