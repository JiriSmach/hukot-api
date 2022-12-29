<?php declare(strict_types = 1);

namespace JiriSmach\HukotApi\Email;

class Alias extends AbstractEmail
{

    public function __construct(
    ) {
    }

    public function getPassword(): string
    {
        return '';
    }

    public function getType(): int
    {
        return self::TYPE_ALIAS;
    }
}
