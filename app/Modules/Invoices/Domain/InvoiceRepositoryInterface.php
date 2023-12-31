<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain;

use Ramsey\Uuid\UuidInterface;

// TODO Adapter
interface InvoiceRepositoryInterface
{
    public function get(UuidInterface $id): Invoice;

    public function save(Invoice $invoice): void;
}
