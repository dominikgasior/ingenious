<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain;

use Ramsey\Uuid\UuidInterface;

final class ProductLine
{
    private UuidInterface $id;
    private Product $product;
    private int $quantity;

    public function __construct(
        UuidInterface $id,
        Product $product,
        int $quantity,
    ) {
        $this->id = $id;
        $this->product = $product;
        $this->quantity = $quantity;
    }
}
