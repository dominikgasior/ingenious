<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain;

// TODO validation
final readonly class Email
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }
}
