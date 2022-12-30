<?php declare(strict_types=1);

namespace JiriSmach\HukotApi\Email;

class BaseEmail extends AbstractEmail
{
    public function getType(): int
    {
        return 0;
    }
}
