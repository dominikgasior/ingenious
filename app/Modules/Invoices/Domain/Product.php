<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain;

use Money\Money;
use Ramsey\Uuid\UuidInterface;

final class Product
{
    private UuidInterface $id;
    private string $name;
    private Money $price; // Money value object is a known concept described in Enterprise Patterns and MDA

    public function __construct(UuidInterface $id, string $name, Money $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }
}
