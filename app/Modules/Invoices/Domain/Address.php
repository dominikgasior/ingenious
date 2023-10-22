<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain;

// TODO validation
final readonly class Address
{
    private string $streetAddress;
    private string $city;
    private string $zipCode;

    public function __construct(string $streetAddress, string $city, string $zipCode)
    {
        $this->streetAddress = $streetAddress;
        $this->city = $city;
        $this->zipCode = $zipCode;
    }
}
