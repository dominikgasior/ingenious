<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain;

use Ramsey\Uuid\UuidInterface;

final class Company
{
    private UuidInterface $id;
    private string $name;
    private Address $address;
    private Phone $phone;
    private Email $email;

    public function __construct(UuidInterface $id, string $name, Address $address, Phone $phone, Email $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
    }
}
